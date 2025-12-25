<?php

declare(strict_types=1);

namespace App\Controller;

use Matrix\Controller\AbstractController;
use Matrix\Foundation\HttpErrorException;
use Matrix\Foundation\Route;
use Matrix\Http\Request;
use Matrix\Http\Response;
use App\Repository\CompositorRepository;
use App\Repository\PeriodRepository;

class CompositorController extends AbstractController
{
    #[Route(path: [
        'fr' => '/compositeurs',
        'en' => '/compositors',
    ], methods: ['GET'], name: 'compositors_index')]
    public function index(
        Request $request,
        CompositorRepository $compositorRepository,
        PeriodRepository $periodRepository,
    ): Response {
        $compositors = $compositorRepository->findAllCompositors();
        $periods = $periodRepository->findAllPeriods(parent::$page->getLang());

        /** @var array $texts */
        $texts = $this->loadStaticTexts(parent::$page->getId() . '_' . parent::$page->getLang() . '.php');

        $content = $this->render(
            'compositor_index.php',
            [
                'texts' => $texts,
                'compositors' => $compositors,
                'periods' => $periods,
                'path' => $request->getPath()
            ]
        );

        return new Response($content);
    }

    #[Route(path: [
        'fr' => '/compositeurs/{slug}',
        'en' => '/compositors/{slug}',
    ], methods: ['GET'], validation: '[A-Za-z0-9\-]+', name: 'compositor_view')]
    public function view(
        CompositorRepository $compositorRepository,
        PeriodRepository $periodRepository,
        string $slug
    ): Response {
        $compositor = $compositorRepository->findCompositorByTag($slug);

        if (null === $compositor) {
            throw new HttpErrorException("No compositor found for route '$slug'", Response::HTTP_NOT_FOUND);
        }

        $periods = $periodRepository->findPeriodsByCompositor($compositor, parent::$page->getLang());

        $previousCompositor = $compositorRepository->findSiblingByBirthDate(
            $compositor->getBirth(),
            CompositorRepository::OLD
        );
        $nextCompositor = $compositorRepository->findSiblingByBirthDate(
            $compositor->getBirth(),
            CompositorRepository::YOUNG
        );

        /** @var array $texts */
        $texts = $this->loadStaticTexts(parent::$page->getId() . '_view_' . parent::$page->getLang() . '.php');

        parent::$page->overloadTitle($compositor->getFirstname() . ' ' . $compositor->getLastname());
        parent::$page->overloadDescription($compositor->getFirstname() . ' ' . $compositor->getLastname());
        /** @todo Avoid dichotomous language distincton : Consider isoLanguageCodes */
        parent::$page->overloadVersionsByLang([
            (parent::$page->getLang() === 'fr') ? 'en' : 'fr' => $compositor->getTag()
        ]);
        parent::$page->setH1($compositor->getFirstname() . ' ' . $compositor->getLastname());

        $content = $this->render(
            'compositor_view.php',
            [
                'texts' => $texts,
                'compositor' => $compositor,
                'previous' => $previousCompositor,
                'next' => $nextCompositor,
                'periods' => $periods,
                'lang' => parent::$page->getLang(),
            ]
        );

        return new Response($content);
    }
}
