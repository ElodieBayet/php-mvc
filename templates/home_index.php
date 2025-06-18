<section>
    <h2><?= $this['texts']['h2'] ?? '(no text)' ?></h2>
    <p><?= $this['texts']['p'] ?? '(no text)' ?></p>
    <div id="chronographic">
    <?php if (isset($this['periods'])) : ?>
        <?php foreach ($this['periods'] as $period) : ?>
        <div data-begin="<?= $period->begin ?>" data-delay="<?= $period->getDuration() ?>" data-target="">
            <a href="#" class="route" title="<?= $this['texts']['details'] ?>"><span class="blind"><?= $period->name ?></span></a>
            <h3 aria-hidden="true"><?= $period->name ?></h3>
            <ul class="list">
            <?php if (!empty($period->compositors)) : ?>
                <?php foreach ($period->compositors as $compositor) : ?>
                    <li><?= $compositor->firstname . ' ' . $compositor->lastname ?></li>
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