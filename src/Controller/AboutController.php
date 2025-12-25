<?php

declare(strict_types=1);

namespace App\Controller;

use Matrix\Controller\AbstractController;
use Matrix\Foundation\Route;
use Matrix\Http\Response;

class AboutController extends AbstractController
{
    #[Route(path: [
        'fr' => '/a-propos',
        'en' => '/about',
    ], methods: ['GET'], name: 'about_index')]
    public function index(): Response
    {
        /** @var array $texts */
        $texts = $this->loadStaticTexts(parent::$page->getId() . '_' . parent::$page->getLang() . '.php');

        $content = $this->render('about_index.php', ['texts' => $texts]);
        
        return new Response($content);
    }
}
