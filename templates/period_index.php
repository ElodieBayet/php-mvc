<?php
/** @var Period[] $periods */
$periods = $this['periods'];
?>
<section>
    <h2><?= $this['texts']['h2'] ?></h2>
    <?php if (!empty($periods)) : ?>
        <?php foreach ($periods as $period) : ?>
            <div class="divided">
                <h3><?= $period->getName() ?> <small class="light">&mdash; <?= $this['texts']['from'] . ' ' . $period->getBegin() . ' ' . $this['texts']['to'] . ' ' . ($period->getEnd() ?? $this['texts']['now']) ?></small></h3>
                <p class="light"><strong class="lighten"><?= $period->countCompositors() ?></strong> <?= $this['texts']['p'] ?></p>
                <p><?= $period->getDescription() ?></p>
            </div>
        <?php endforeach; ?>
    <?php else : ?>
        <p class="nothing"><?= $this['texts']['notfound'] ?? '(no text)' ?></p>
    <?php endif; ?>
</section>