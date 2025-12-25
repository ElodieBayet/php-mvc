<?php

declare(strict_types=1);

namespace Matrix\Foundation;

use Matrix\Http\Request;
use Matrix\Model\Language;
use Matrix\Model\Page;
use Matrix\Model\Navigation;

abstract class AbstractFactory
{
    private static function getIdByRoute(array $routes, string $path): null|string
    {
        foreach ($routes as $route) {
            if ($route->getPath() === '/' . $path) {
                return $route->getCode();
            }
        }

        return null;
    }

    /**
     * Build Main and Second navigations for current language
     */
    public static function pageNavigations(Page $page, Request $request, array $appSitemap): void
    {
        foreach ($appSitemap as $section => $routes) {
            foreach ($routes as $id => $route) {
                /** @todo Avoid blind deduction of keys 'route' and 'label' : Consider AbstractCore resolution of app structure */
                $add = 'add' . ucfirst($section);
                if (method_exists($page, $add)) {
                    $navigation = new Navigation(
                        code: $id,
                        path: $route[$request->getLocale()]['path'],
                        label: $route[$request->getLocale()]['label']
                    );
                    $page->$add($navigation);
                }
                if ($route[$request->getLocale()]['path'] === '/' . $request->getPath()[0]) {
                    $page->setSection($section);
                }
            }
        }
    }

    public static function pageIdentity(Page $page, Request $request): void
    {
        /** @var string $path */
        $path = $request->getPath()[0];

        /** @var null|string $id */
        $id = self::getIdByRoute($page->getMains(), $path) ?? self::getIdByRoute($page->getSeconds(), $path) ?? Page::HTTP_ERROR_ID;

        $page->setId($id);
    }

    /**
     * Build metadata for current page
     */
    public static function pageMeta(Page $page, array $appSitemap): void
    {
        if (null !== $page->getSection()) {
            $details = $appSitemap[$page->getSection()][$page->getId()][$page->getLang()];
            $page->setTitle($details['label']);
            $page->setDescription($details['description']);
        }
    }

    /**
     * Build language versions for current page
     */
    public static function pageVersions(Page $page, array $appLanguages, array $appSitemap): void
    {
        foreach ($appSitemap as $section => $routes) {
            $id = $page->getId();
            if (array_key_exists($id, $routes)) {
                foreach ($routes[$id] as $isoCode => $version) {
                    $language = new Language(
                        isoCode: $isoCode,
                        label: substr($appLanguages[$isoCode]['label'], 0, 3),
                        title: $appLanguages[$isoCode]['label'],
                        navigation: new Navigation(
                            code: $id,
                            path: $version['path'],
                            label: $version['label']
                        )
                    );
                    $page->addVersions($language);
                }
            }
        }
    }
}