<?php
/** @var Period[] $periods */
$periods = $this['periods'];
?>
<section>
    <h2><?= $this['texts']['h2'] ?? '(no text)' ?></h2>
    <p><?= $this['texts']['p'] ?? '(no text)' ?></p>
    <div id="chronographic">
    <?php if (!empty($periods)) : ?>
        <?php foreach ($periods as $period) : ?>
        <div data-begin="<?= $period->getBegin() ?>" data-delay="<?= $period->getDuration() ?>" data-target="">
            <a href="#" class="route" title="<?= $this['texts']['details'] ?>"><span class="blind"><?= $period->getName() ?></span></a>
            <h3 aria-hidden="true"><?= $period->getName() ?></h3>
            <ul class="list">
            <?php if (!empty($period->getCompositors())) : ?>
                <?php foreach ($period->getCompositors() as $compositor) : ?>
                    <li><?= $compositor->getFirstname() . ' ' . $compositor->getLastname() ?></li>
                <?php endforeach; ?>
            <?php else : ?>
                <li><?= $this['texts']['nodata'] ?? '(no text)' ?></li>
            </ul>
            <?php endif; ?>
        </div>
        <?php endforeach; ?>
    <?php else : ?>
        <p class="nothing"><?= $this['texts']['notfound'] ?? '(no text)' ?></p>
    <?php endif; ?>
    </div>
</section>