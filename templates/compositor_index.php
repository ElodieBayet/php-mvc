<section>
    <h2><?= $this['texts']['h2'] ?? '(no text)' ?></h2>
    <?php if (isset($this['periods'])) : ?>
        <div id="filter">
            <h4><?= $this['texts']['filter'] ?? '(no text)' ?></h4>
            <ul class="listitem center">
            <?php foreach ($this['periods'] as $period) : ?>
                <li>
                    <a href="#<?= $period->route ?>" title="<?= $this['texts']['onperiod'] ?>" class="link toggle"><span>&nbsp;</span><?= $period->name ?></a>
                </li>
            <?php endforeach; ?>
                <li>
                    <a href="#reseter" class="link anchor disabled"><span>&nbsp;</span><?= $this['texts']['reset'] ?? '(no text)' ?></a>
                </li>
            </ul>
        </div>
    <?php endif; ?>
    <?php if (isset($this['compositors'])) : ?>
        <div class="grid md">
        <?php foreach ($this['compositors'] as $compositor) : ?>
            <?php
                $periods = [];
                $periods = array_filter($this['periods'], fn($period) => $period->id === $compositor->period_id);
            ?>
            <div class="col-50 topic" data-filter="<?= join(' ', array_map(fn($period) => $period->route, $periods)) ?>">
                <a href="./<?= $this['path'][1] . '/' . $compositor->route ?>" class="route">
                    <span class="blind"><?= $compositor->firstname . ' ' . $compositor->lastname ?></span>
                </a>
                <h4 aria-hidden="true"><?= $compositor->firstname . ' ' . $compositor->lastname ?></h4>
                <p class="light"><?= $this['texts']['born'] ?> <strong><?= $compositor->getBirthFormated($this['path'][0]) ?></strong> &mdash; <?= $this['texts']['dead'] ?> <strong><?= $compositor->getDeathFormated($this['path'][0]) ?></strong></p>
                <ul class="listitem apart">
                <?php foreach ($periods as $period) : ?>
                    <li><?= $period->name ?></li>
                <?php endforeach; ?>
                </ul>
            </div>
        <?php endforeach; ?>
        </div>
    <?php else : ?>
        <p class="nothing"><?= $this['texts']['notfound'] ?? '(no text)' ?></p>
    <?php endif; ?>
</section>