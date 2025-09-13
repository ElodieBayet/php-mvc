<?php
/** @var Period[] $periods */
$periods = $this['periods'];
/** @var Compositor $compositor */
$compositor = $this['compositor'];
/** @var Compositor $previous */
$previous = $this['previous'];
/** @var Compositor $next */
$next = $this['next'];
?>
<section>
    <h2><?= $this['texts']['h2'] ?? '(no text)' ?></h2>
    <div class="grid md">
        <figure class="col-50">
            <img src="<?= $compositor->getFigure() ?>" alt="">
        </figure>
        <div class="col-50">
            <h3><?= $this['texts']['h3'] ?? '(no text)' ?></h3>
            <ul class="list">
                <li><span class="light"><?= $this['texts']['origin'] ?></span> <?= $compositor->getOrigin() ?></li>
                <li><span class="light"><?= $this['texts']['life'] ?></span> ± <?= $compositor->getLife() . ' ' . $this['texts']['years'] ?></li>
                <li><span class="light"><?= $this['texts']['born'] ?></span> <?= $compositor->getBirthFormated($this['lang']) ?></li>
                <li><span class="light"><?= $this['texts']['dead'] ?></span> <?=  $compositor->getDeathFormated($this['lang']) ?></li>
            </ul>
            <h4><?= $this['texts']['periods'] ?></h4>
            <?php if (!empty($periods)) : ?>
                <ul class="list">
                <?php foreach ($periods as $period) : ?>
                    <li><?= $period->getName() ?>&nbsp;: <span class="light"><?= $this['texts']['from'] . ' ' . $period->getBegin() . ' ' . $this['texts']['to'] . ' ' . $period->getEnd() ?></span></li>
                <?php endforeach; ?>
                </ul>
            <?php else : ?>
                <p class="nothing"><?= $this['texts']['notfound'] ?? '(no text)'  ?></p>
            <?php endif; ?>
        </div>
    </div>
</section>
<?php
// Recent
if (null !== $previous) {
    echo    '<div id="previous" class="bypass">
                <a href="' . $previous->getTag() . '" title="Aller à la page" class="holder">
                    <span class="cursor">&nbsp;</span>
                    <span class="label">' . $previous->getLastname() . '</span>
                </a>
            </div>';
}
// Ancient
if (null !== $next) {
    echo    '<div id="next" class="bypass">
                <a href="' . $next->getTag() . '" title="Aller à la page" class="holder">
                    <span class="cursor">&nbsp;</span>
                    <span class="label">' . $next->getLastname() . '</span>
                </a>
            </div>';
}
?>