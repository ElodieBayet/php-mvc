<?php

declare(strict_types=1);

namespace App\Controller;

use Matrix\Controller\AbstractController;
use Matrix\Foundation\HttpErrorException;
use Matrix\Http\Request;
use Matrix\Http\Response;
use App\Repository\CompositorRepository;
use App\Repository\PeriodRepository;

class CompositorController extends AbstractController
{
    public function index(
        Request $request,
        CompositorRepository $compositorRepository,
        PeriodRepository $periodRepository,
    ): Response {
        /** @var Compositor[] $compositors */
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

    public function view(
        CompositorRepository $compositorRepository,
        PeriodRepository $periodRepository,
        string $slug
    ): Response {
        /** @var null|Compositor $compositor */
        $compositor = $compositorRepository->findCompositorByRoute($slug);
        $periods = $periodRepository->findAllPeriodsByCompositor($compositor->id, parent::$page->getLang());

        if (null === $compositor) {
            throw new HttpErrorException("No compositor found for route '$slug'", HttpErrorException::HTTP_NOT_FOUND);
        }

        if (null !== $compositor) {
            $compositor->previous = $compositorRepository->findSibling(
                $compositor->birth,
                CompositorRepository::OLD
            );
            $compositor->next = $compositorRepository->findSibling(
                $compositor->birth,
                CompositorRepository::YOUNG
            );
        }

        /** @var array $texts */
        $texts = $this->loadStaticTexts(parent::$page->getId() . '_view_' . parent::$page->getLang() . '.php');

        parent::$page->overloadTitle($compositor->firstname . ' ' . $compositor->lastname);
        parent::$page->overloadDescription($compositor->firstname . ' ' . $compositor->lastname);
        /** @todo Avoid dichotomous language distincton : Consider isoLanguageCodes */
        parent::$page->overloadVersionsByLang([
            (parent::$page->getLang() === 'fr') ? 'en' : 'fr' => $compositor->route
        ]);
        parent::$page->setH1($compositor->firstname . ' ' . $compositor->lastname);

        $content = $this->render(
            'compositor_view.php',
            [
                'texts' => $texts,
                'compositor' => $compositor,
                'periods' => $periods,
                'lang' => parent::$page->getLang(),
            ]
        );

        return new Response($content);
    }
}
