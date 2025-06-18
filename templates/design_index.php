<section>
    <h2><?= $this['texts']['oop']['h2']?></h2>
    <p><?= $this['texts']['oop']['p'] ?></p>
    <h3><?= $this['texts']['oop']['blocks'][0]['h3'] ?></h3>
    <div class="columns">
        <?php foreach ($this['texts']['oop']['blocks'][0]['p'] as $p) : ?>
            <p><?= $p ?></p>
        <?php endforeach; ?>
    </div>
    <hr class="line">
    <h3><?= $this['texts']['oop']['blocks'][1]['h3'] ?></h3>
    <div class="columns">
        <?php foreach ($this['texts']['oop']['blocks'][1]['p'] as $p) : ?>
            <p><?= $p ?></p>
        <?php endforeach; ?>
    </div>
</section>
<section>
    <h2><?= $this['texts']['mvc']['h2'] ?></h2>
    <p><?= $this['texts']['mvc']['p'] ?></p>
    <div class="grid md">
        <div class="col-50">
            <h3><?= $this['texts']['mvc']['blocks'][0]['h3'] ?></h3>
            <?php foreach ($this['texts']['mvc']['blocks'][0]['p'] as $p) : ?>
                <p><?= $p ?></p>
            <?php endforeach; ?>
            <ul class="list">
                <?php foreach ($this['texts']['mvc']['blocks'][0]['li'] as $li) : ?>
                    <li><?= $li ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
        <div class="col-50">
            <h3><?= $this['texts']['mvc']['blocks'][1]['h3'] ?></h3>
            <?php foreach ($this['texts']['mvc']['blocks'][1]['p'] as $p) : ?>
                <p><?= $p ?></p>
            <?php endforeach; ?>
            <ul class="list">
                <?php foreach ($this['texts']['mvc']['blocks'][1]['li'] as $li) : ?>
                    <li><?= $li ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
        <figure class="col-50">
            <img src="../assets/img/schema_mvc.jpg">
            <figcaption>Schéma <?= $this['texts']['mvc']['h2'] ?></figcaption>
        </figure>
        <div class="col-50">
            <h3><?= $this['texts']['mvc']['blocks'][2]['h3'] ?></h3>
            <ul class="list">
                <?php foreach ($this['texts']['mvc']['blocks'][2]['li'] as $li) : ?>
                    <li><?= $li ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
    <div>
        <p><em>Sources :</em><a href="https://fr.wikibooks.org/wiki/Patrons_de_conception" target="_blank" rel="noreferer">Wikibooks : Patrons de Conception</a> &amp; <a href="https://fr.wikipedia.org/wiki/Patron_de_conception" hreflang="fr" target="_blank" rel="noreferer">Wikipédia : Patron de conception</a></p>
    </div>
</section>