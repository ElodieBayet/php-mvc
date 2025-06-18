<section>
    <h2><?= $this['texts']['h2'] ?></h2>
    <?php if (isset($this['periods'])) : ?>
        <?php foreach ($this['periods'] as $period) : ?>
            <div class="divided">
                <h3><?= $period->name ?> <small class="light">&mdash; <?= $this['texts']['from'] . ' ' . $period->begin . ' ' . $this['texts']['to'] . ' ' . ($period->end ?? $this['texts']['now']) ?></small></h3>
                <p class="light"><strong class="lighten"><?= $period->totalCompositors ?></strong> <?= $this['texts']['p'] ?></p>
                <p><?= $period->description ?></p>
            </div>
        <?php endforeach; ?>
    <?php else : ?>
        <p class="nothing"><?= $this['texts']['notfound'] ?? '(no text)' ?></p>
    <?php endif; ?>
</section>