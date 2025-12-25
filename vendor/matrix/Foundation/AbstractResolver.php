<?php

declare(strict_types=1);

namespace Matrix\Foundation;

use Matrix\Controller\AbstractController;
use Matrix\Foundation\HttpErrorException;
use Matrix\Http\Request;
use Matrix\Http\Response;
use Matrix\Model\Page;

abstract class AbstractResolver
{
    public static function controller(Request $request, Page $page): object
    {
        /** @var string $id */
        $id = $page->getId();

        if (Page::HTTP_ERROR_ID === $id) {
            throw new HttpErrorException("Can't find controller for '" . $request->getPath()[0] . "'", Response::HTTP_NOT_FOUND);
        }

        $className = implode(
            array_map(
                fn(string $word): string => ucfirst($word),
                explode('-', $id)
            )
        );

        $controller = 'App\\Controller\\' . $className . 'Controller';

        return new $controller($page);
    }

    public static function method(Request $request, AbstractController $controller): \ReflectionMethod
    {
        $reflectionClass = new \ReflectionClass($controller::class);
        $method = null;

        $method = array_find($reflectionClass->getMethods(), function($method) use ($request) {
            return array_find($method->getAttributes(Route::class, \ReflectionAttribute::IS_INSTANCEOF), function($attribute) use ($request) {
                $routeInstance = $attribute->newInstance();
                $slug = implode('/', $request->getPath());
                return $routeInstance->isMethodMatch($request->getMethod()) && $routeInstance->isUrlMatch('/' . $slug, $request->getLocale());
            });
        });

        if (null === $method) {
            throw new HttpErrorException("Can't find destination for '" . implode('/', $request->getPath()) . "'", Response::HTTP_NOT_FOUND);
        }

        return $method;
    }

    public static function arguments(Request $request, \ReflectionMethod $method): array
    {
        $arguments = [];

        foreach ($method->getParameters() as $param) {
            if (!$param->getType()->isBuiltin()) {
                $className = $param->getType()->getName();
                $arguments[] = new $className();
            } else {
                /** @todo Avoid raw table index to determine page hierarchy : Consider Request by auto-counting hierarchy */
                $arguments[] = array_key_exists(1, $request->getPath()) ? $request->getPath()[1] : $request->getPath()[0]; 
            };
        }

        /** @todo Avoid uncontrolled arguments return : Check integrity of arguments against Request and throw bad request if not */

        return $arguments;
    }

    public static function httpErrorResponse(Page $page, HttpErrorException $httpErrorException): Response
    {
        $page->setId(Page::HTTP_ERROR_ID);

        /** @var Controller */
        $className = 'Matrix\\Controller\\HttpErrorController';

        /** @var HttpErrorController $controller */
        $controller = new $className($page);

        $response = $controller->index($httpErrorException);

        return $response;
    }
}
