<ul>
    <li>
        <a href="/" title="Aller sur la page" <?= $this['inset']['route']===''?'class="selected"':''?>>Les Design Patterns</a>
    </li>
    <li>
        <a href="/gang-of-four" title="Aller sur la page" <?= $this['inset']['route']==='gang-of-four'?'class="selected"':'' ?>>Le Gang of Four</a>
    </li>
    <li <?= $sub ? 'class="sub"':''?>>
        <a href="/patron" title="Aller sur la page" <?= $this['inset']['route']==='patron'?'class="selected"':'' ?>>Les Patrons</a>
        <?php if ($sub) : ?>
        <ul>
            <li>
                <a href="/patron/model-view-controller" title="Aller sur la page" <?= $this['inset']['route']==='model-view-controller'?'class="selected"':'' ?>>Modèle-Vue-Contrôleur</a>
            </li>
            <li>
                <a href="/patron/model-view-viewmodel" title="Aller sur la page" <?= $this['inset']['route']==='model-view-viewmodel'?'class="selected"':'' ?>>Modèle-Vue-VueModèle</a>
            </li>
            <li>
                <a href="/patron/model-view-presentation" title="Aller sur la page" <?= $this['inset']['route']==='model-view-presentation'?'class="selected"':'' ?>>Modèle-Vue-Présentation</a>
            </li>
        </ul>
        <?php endif; ?>
    </li>
    <li>
        <a href="/info" title="Aller sur la page" <?= $this['inset']['route']==='info'?'class="selected"':'' ?>>Informations</a>
    </li>
</ul>