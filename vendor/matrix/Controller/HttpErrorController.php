<?php

declare(strict_types=1);

namespace Matrix\Controller;

use Matrix\Controller\AbstractController;
use Matrix\Http\Response;

class HttpErrorController extends AbstractController
{
    public function index(string $httpErrorName): Response
    {
        /** @var array $texts */
        $texts = $this->loadStaticTexts(parent::$page->getId() . '_' . parent::$page->getLang() . '.php');

        $errorKey = implode(explode('-', $httpErrorName));

        if (true === array_key_exists($errorKey, $texts)) {
            $texts = $texts[$errorKey];
        } else {
            $texts['h1'] = "Erreur";
            $texts['h2'] = "Contenu indéterminé";
            $texts['p'] = "Imposible d'aboutir à un résultat";
        }

        parent::$page->setTitle($texts['h1']);
        parent::$page->setDescription($texts['p']);

        $content = $this->render('http_error.php', ['texts' => $texts]);

        return new Response($content, Response::{'HTTP_' . strtoupper($httpErrorName)});
    }
}
