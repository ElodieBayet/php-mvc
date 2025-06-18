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
            // Resolve Controller
            $controller = AbstractResolver::controller($request, $page);
            // Resolve Method in Controler
            $method = AbstractResolver::method($request, $controller);
            // Resolve Arguments in Method
            $arguments = AbstractResolver::arguments($request, $controller, $method);
            // Build response
            $response = $controller->$method(...$arguments);
        } catch (HttpErrorException $httpException) {
            if ($this->isDebugging()) {
                echo '<pre>' . $httpException . '</pre>';
                exit;
            }
            $response = AbstractResolver::httpErrorResponse($request, $page, $httpException->getHttpType());
        } catch (\Exception $exception) {
            if ($this->isDebugging()) {
                echo '<pre>' . $exception . '</pre>';
                exit;
            }
            header('Location: /unavailable.php', true, 307);
            exit;
        }

        return $response;
    }
}
