<?php

declare(strict_types=1);

namespace App\Controller;

use Matrix\Controller\AbstractController;
use Matrix\Http\Response;
use App\Repository\CompositorRepository;
use App\Repository\PeriodRepository;

class HomeController extends AbstractController
{
    public function index(
        PeriodRepository $periodRepository,
        CompositorRepository $compositorRepository,
    ): Response {
        $periods = $periodRepository->findAllPeriods(parent::$page->getLang());
        foreach ($periods as $period) {
            $period->setCompositors(
                $compositorRepository->findCompositorsByPeriod($period->getId())
            );
        }

        /** @var array $texts */
        $texts = $this->loadStaticTexts(parent::$page->getId() . '_' . parent::$page->getLang() . '.php');

        $content = $this->render(
            'home_index.php',
            [
                'texts' => $texts,
                'periods' => $periods,
            ]
        );

        return new Response($content);
    }
}
