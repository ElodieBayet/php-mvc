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
            new HttpErrorException("Can't find controller for '" . $request->getPath()[0] . "'", HttpErrorException::HTTP_NOT_FOUND);
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

    public static function method(Request $request, AbstractController $controller): string
    {
        /** @todo Avoid dichotomous method resolution : Allow multiple routes */
        $method = array_key_exists(1, $request->getPath()) ? 'view' : 'index';

        if (!method_exists($controller, $method)) {
            throw new \Exception("Can't find $method in '" . $controller::class . "'");
        }

        return $method;
    }

    public static function arguments(Request $request, AbstractController $controller, string $endpoint): array
    {
        $arguments = [];
        $class = new \ReflectionClass($controller::class);
        $method = $class->getMethod($endpoint);

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

    public static function httpErrorResponse(Request $request, Page $page, string $httpErrorName): Response
    {
        $page->setId(Page::HTTP_ERROR_ID);
        /** @var Controller  */
        $className = 'Matrix\\Controller\\HttpErrorController';
        /** @var HttpErrorController $controller */
        $controller = new $className($page);

        $response = $controller->index($httpErrorName);

        return $response;
    }
}
