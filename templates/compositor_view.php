<section>
    <h2><?= $this['texts']['h2'] ?? '(no text)' ?></h2>
    <div class="grid md">
        <figure class="col-50">
            <img src="<?= $this['compositor']->figure ?>" alt="">
        </figure>
        <div class="col-50">
            <h3><?= $this['texts']['h3'] ?? '(no text)' ?></h3>
            <ul class="list">
                <li><span class="light"><?= $this['texts']['origin'] ?></span> <?= $this['compositor']->origin ?></li>
                <li><span class="light"><?= $this['texts']['life'] ?></span> ± <?= $this['compositor']->getLife() . ' ' . $this['texts']['years'] ?></li>
                <li><span class="light"><?= $this['texts']['born'] ?></span> <?= $this['compositor']->getBirthFormated($this['lang']) ?></li>
                <li><span class="light"><?= $this['texts']['dead'] ?></span> <?=  $this['compositor']->getDeathFormated($this['lang']) ?></li>
            </ul>
            <h4><?= $this['texts']['periods'] ?></h4>
            <?php if (isset($this['periods'])) : ?>
                <ul class="list">
                <?php foreach ($this['periods'] as $period) : ?>
                    <li><?= $period->name ?>&nbsp;: <span class="light"><?= $this['texts']['from'] . ' ' . $period->begin . ' ' . $this['texts']['to'] . ' ' . $period->end ?></span></li>
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
if (isset($this['compositor']->previous)) {
    echo    '<div id="previous" class="bypass">
                <a href="' . $this['compositor']->previous->route . '" title="Aller à la page" class="holder">
                    <span class="cursor">&nbsp;</span>
                    <span class="label">' . $this['compositor']->previous->lastname . '</span>
                </a>
            </div>';
}
// Ancient
if (isset($this['compositor']->next)) {
    echo    '<div id="next" class="bypass">
                <a href="' . $this['compositor']->next->route . '" title="Aller à la page" class="holder">
                    <span class="cursor">&nbsp;</span>
                    <span class="label">' . $this['compositor']->next->lastname . '</span>
                </a>
            </div>';
}
?>