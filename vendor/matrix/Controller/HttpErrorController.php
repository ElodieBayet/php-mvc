<?php

declare(strict_types=1);

namespace Matrix\Controller;

use Matrix\Controller\AbstractController;
use Matrix\Foundation\HttpErrorException;
use Matrix\Http\Response;

class HttpErrorController extends AbstractController
{
    public function index(HttpErrorException $httpErrorException): Response
    {
        /** @var array $texts */
        $texts = $this->loadStaticTexts(parent::$page->getId() . '_' . parent::$page->getLang() . '.php');

        $errorKey = (string) $httpErrorException->getHttpCode();

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

        return new Response($content, $httpErrorException->getHttpCode());
    }
}
