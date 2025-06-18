<?php

declare(strict_types=1);

namespace App\Controller;

use Matrix\Controller\AbstractController;
use Matrix\Http\Response;

class AboutController extends AbstractController
{
    public function index(): Response
    {
        /** @var array $texts */
        $texts = $this->loadStaticTexts(parent::$page->getId() . '_' . parent::$page->getLang() . '.php');

        $content = $this->render('about_index.php', ['texts' => $texts]);
        
        return new Response($content);
    }
}
