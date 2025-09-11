<?php

declare(strict_types=1);

namespace Matrix\Foundation;

use Matrix\Foundation\AbstractCore;
use Matrix\Foundation\AbstractFactory;
use Matrix\Foundation\AbstractResolver;
use Matrix\Foundation\HttpErrorException;
use Matrix\Http\Request;
use Matrix\Http\Response;
use Matrix\Model\Page;

/**
 * Http Kernel of application
 */
final class HttpCore extends AbstractCore
{
    public function handle(): Response
    {
        $isoLanguagesCode = array_keys(parent::$appLanguages);
        $request = new Request(languages: $isoLanguagesCode);
        $page = new Page($request->getLocale());

        // Implement Page
        AbstractFactory::pageRoutes($page, $request, parent::$appSitemap);
        AbstractFactory::pageIdentity($page, $request);
        AbstractFactory::pageVersions($page, parent::$appLanguages, parent::$appSitemap);
        AbstractFactory::pageMeta($page, parent::$appSitemap);

        return $this->resolve($request, $page);
    }

    public function resolve(Request $request, Page $page): Response
    {
        /** @var Controller $controller */
        $controller;

        /** @var Response $response */
        $response;

        try {
            $controller = AbstractResolver::controller($request, $page);
            $method = AbstractResolver::method($request, $controller);
            $arguments = AbstractResolver::arguments($request, $controller, $method);
            $response = $controller->$method(...$arguments);
        } catch (HttpErrorException $httpException) {
            // Errors threw from resolver or controllers
            if ($this->isDebugging()) {
                echo "<pre>HttpCore ::<br>" . $httpException->getMessage() . "</pre>";
                exit;
            }
            $response = AbstractResolver::httpErrorResponse($page, $httpException->getHttpType());
        } catch (\Exception $exception) {
            // Unexpected errors
            if ($this->isDebugging()) {
                echo "<pre>HttpCore ::<br>" . $exception->getMessage() . "</pre>";
                exit;
            }
            header('Location: /unavailable.php', true, 307);
            exit;
        }

        return $response;
    }
}
