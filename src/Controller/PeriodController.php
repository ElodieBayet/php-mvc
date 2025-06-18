<?php

declare(strict_types=1);

namespace App\Controller;

use Matrix\Controller\AbstractController;
use Matrix\Http\Response;
use App\Repository\PeriodRepository;

class PeriodController extends AbstractController
{
    public function index(
        PeriodRepository $periodRepository
    ): Response {
        /** @var Period[] $periods */
        $periods = $periodRepository->findAllPeriodsAndDetails(parent::$page->getLang());

        /** @var array $texts */
        $texts = $this->loadStaticTexts(parent::$page->getId() . '_' . parent::$page->getLang() . '.php');

        $content = $this->render(
            'period_index.php',
            [
                'texts' => $texts,
                'periods' => $periods,
            ]
        );

        return new Response($content);
    }
}
