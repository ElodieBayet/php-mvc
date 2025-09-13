<?php
/** @var Period[] $periods */
$periods = $this['periods'];
/** @var Compositor[] $compositors */
$compositors = $this['compositors'];
?>
<section>
    <h2><?= $this['texts']['h2'] ?? '(no text)' ?></h2>
    <?php if (!empty($periods)) : ?>
        <div id="filter">
            <h4><?= $this['texts']['filter'] ?? '(no text)' ?></h4>
            <ul class="listitem center">
            <?php foreach ($periods as $period) : ?>
                <li>
                    <a href="#<?= $period->getTag() ?>" title="<?= $this['texts']['onperiod'] ?>" class="link toggle"><span>&nbsp;</span><?= $period->getName() ?></a>
                </li>
            <?php endforeach; ?>
                <li>
                    <a href="#reseter" class="link anchor disabled"><span>&nbsp;</span><?= $this['texts']['reset'] ?? '(no text)' ?></a>
                </li>
            </ul>
        </div>
    <?php endif; ?>
    <?php if (!empty($compositors)) : ?>
        <div class="grid md">
        <?php foreach ($compositors as $compositor) : ?>
            <?php
                $linkedPeriods = array_filter($periods, fn($period) => in_array($period->getId(), $compositor->getPeriodIds()));
            ?>
            <div class="col-50 topic" data-filter="<?= join(' ', array_map(fn($period) => $period->getTag(), $linkedPeriods)) ?>">
                <a href="./<?= $this['path'][1] . '/' . $compositor->getTag() ?>" class="route">
                    <span class="blind"><?= $compositor->getFirstname() . ' ' . $compositor->getLastname() ?></span>
                </a>
                <h4 aria-hidden="true"><?= $compositor->getFirstname() . ' ' . $compositor->getLastname() ?></h4>
                <p class="light"><?= $this['texts']['born'] ?> <strong><?= $compositor->getBirthFormated($this['path'][0]) ?></strong> &mdash; <?= $this['texts']['dead'] ?> <strong><?= $compositor->getDeathFormated($this['path'][0]) ?></strong></p>
                <ul class="listitem apart">
                <?php foreach ($linkedPeriods as $period) : ?>
                    <li><?= $period->getName() ?></li>
                <?php endforeach; ?>
                </ul>
            </div>
        <?php endforeach; ?>
        </div>
    <?php else : ?>
        <p class="nothing"><?= $this['texts']['notfound'] ?? '(no text)' ?></p>
    <?php endif; ?>
</section>