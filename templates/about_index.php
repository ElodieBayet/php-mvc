<section>
    <h2><?= $this['texts']['project']['h2']?></h2>
    <p><?= $this['texts']['project']['p'] ?></p>
    <div class="grid md">
        <div class="col-50">
            <h3><?= $this['texts']['project']['blocks'][0]['h3'] ?></h3>
            <ul class="list">
                <?php foreach ($this['texts']['project']['blocks'][0]['li'] as $li) : ?>
                    <li><?= $li ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
        <div class="col-50">
            <h3><?= $this['texts']['project']['blocks'][1]['h3'] ?></h3>
            <div class="grid sm">
                <div class="col-33 badge">
                    <div class="icon"><img src="https://www.elodiebayet.com/assets/icons/icon_php.svg" alt=""></div>
                    <div class="title">
                        <p>PHP</p>
                    </div>
                </div>
                <div class="col-33 badge">
                    <div class="icon"><img src="https://www.elodiebayet.com/assets/icons/icon_mysql.svg" alt=""></div>
                    <div class="title">
                        <p>MySQL</p>
                    </div>
                </div>
                <div class="col-33 badge">
                    <div class="icon"><img src="https://www.elodiebayet.com/assets/icons/icon_sql.svg" alt=""></div>
                    <div class="title">
                        <p>SQL</p>
                    </div>
                </div>
                <div class="col-33 badge">
                    <div class="icon"><img src="https://www.elodiebayet.com/assets/icons/icon_js.svg" alt=""></div>
                    <div class="title">
                        <p>JavaScript</p>
                    </div>
                </div>
                <div class="col-33 badge">
                    <div class="icon"><img src="https://www.elodiebayet.com/assets/icons/icon_html.svg" alt=""></div>
                    <div class="title">
                        <p>HTML 5</p>
                    </div>
                </div>
                <div class="col-33 badge">
                    <div class="icon"><img src="https://www.elodiebayet.com/assets/icons/icon_git.svg" alt=""></div>
                    <div class="title">
                        <p>Git</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section>
    <h2><?= $this['texts']['theme']['h2']?></h2>
    <p><?= $this['texts']['theme']['p'] ?></p>
    <h3><?= $this['texts']['theme']['blocks'][0]['h3'] ?></h3>
    <div class="columns">
        <?php foreach ($this['texts']['theme']['blocks'][0]['p'] as $p) : ?>
            <p><?= $p ?></p>
        <?php endforeach; ?>
    </div>
</section>