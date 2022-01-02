<section>
    <h2><?= $this['data']->title ?? 'Titre non trouvé.'?></h2>
    <h3>Description</h3>
    <?= $this['data']->explanation ?? '<p>Description non trouvée.</p>' ?>
    <div class="grid md">
        <figure class="col-50">
            <img src="../../assets/fig/<?= $this['data']->figure ?? 'default_figure_640x640.jpg'?>" alt="Image" width="1024" height="680">
            <figcaption>Schéma <?= $this['data']->title ?? ''?></figcaption>
        </figure>
        <div class="col-50">
            <h3>Détails</h3>
            <?= $this['data']->details ?? '<p>Détails non trouvés.</p>' ?>
        </div>
    </div>
</section>
<!-- Static implementation according to the sub-menu order -->
<div id="next" class="bypass">
    <a href="./model-view-viewmodel" title="Aller à la page" class="holder">
        <span class="cursor">&nbsp;</span>
        <span class="label">Model-View-VueModel</span>
    </a>
</div>