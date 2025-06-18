<?php

declare(strict_types=1);

namespace Matrix\Controller;

use Matrix\Model\Page;
use Matrix\Model\Render;

abstract class AbstractController
{
    protected static Page $page;

    public function __construct(Page $page)
    {
        self::$page = $page;
    }

    protected function loadStaticTexts(string $file): array
    {
        $texts = [];
        if (is_file('../translations/' . $file)) {
            $texts = require '../translations/' . $file;
        }
        return $texts;
    }

    protected function render(string $view, array $arguments): string
    {
        $content = new Render(
            ['..', 'templates', $view],
            $arguments
        );

        $ui = $this->loadStaticTexts('ui_' . self::$page->getLang() . '.php');

        $layout = new Render(
            ['..', 'templates', 'layout.php'],
            ['page' => self::$page, 'ui' => $ui, 'content' => $content]
        );

        return $layout->__toString();
    }
}
