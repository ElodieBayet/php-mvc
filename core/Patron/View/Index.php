<section>
    <h2>Description</h2>
    <div class="grid md">
        <div class="col-50">
            <h3>Utilité</h3>
            <p>Les patrons servent à documenter des bonnes pratiques basées sur l'expérience. Ils proposent des solutions à des problèmes qui peuvent être difficilement résolus par un seul composant : la description de la plupart des patrons implique plusieurs rôles qui peuvent être joués par plusieurs composants d'un logiciel. Par exemple, le patron Observer implique deux rôles qui sont le sujet et l'observateur.</p>
            <h3>Services</h3>
            <p>Les patrons apportent un vocabulaire commun entre l'architecte informatique et le programmeur. Si le programmeur connaît le patron de conception observer, alors l'architecte informatique n'aura pas besoin de lui donner de longues explications et le dialogue se limitera à “Ici, j'ai utilisé un Observer”</p>
        </div>
        <div class="col-50">
            <h3>Utilisation</h3>
            <p>En programmation informatique, les patrons de conception peuvent être utilisés avant, pendant, ou après le travail de programmation :</p>
            <ul class="list">
                <li><strong>utilisé avant</strong>, le programmeur utilisera le patron comme guide lors de l'écriture du code source ;</li>
                <li><strong>utilisé après</strong>, il servira comme exemple pour relier différents modules de code source déjà écrits, ce qui implique d'écrire le code source nécessaire à leur liaison, et le code qui les fera correspondre au patron de conception ;</li>
                <li><strong>utilisé pendant le travail de programmation</strong>, le programmeur constatera que le code qui vient d'être écrit a des points communs avec un patron existant et effectuera les modifications nécessaires pour que le code corresponde au patron.</li>
            </ul>
            <p>La bonne pratique consiste toutefois à n'utiliser un patron <strong>qu'une fois qu'il est clair que sa flexibilité est nécessaire</strong>.</p>
        </div>
    </div>
    <div>
        <h3>Types de patrons</h3>
        <ul class="list">
            <li><strong>Un patron de conception :</strong> est la meilleure solution connue à un problème de conception récurrent. Il suggère un arrangement, une manière d'organiser des modules ou des classes. Il décrit une organisation de classes fréquemment utilisée pour résoudre un problème récurrent. Le patron de conception parle d'instances, de rôles et de collaboration</li>
            <li><strong>Un patron d'architecture :</strong> est la meilleure solution connue à un problème d'architecture récurrent. Il apporte des solutions sur la manière de concevoir l'organisation à grande échelle <span class="light">– l'architecture –</span> d'un logiciel en faisant abstraction des détails. Il concerne la <strong>structure générale</strong> d'un logiciel, sa subdivision en unités plus petites, comporte des guides de bonnes pratiques et des règles générales qui ne peuvent pas être traduites directement en code source</li>
        </ul>
    </div>
</section>
<section>
    <h2>Quelques Patrons présentés ici</h2>
<?php if ($this['data']) : ?>
    <?php foreach ($this['data'] as $entity) :?>
    <div class="divided">
        <h3>
            <a href="/patron/<?= $entity->tag?>"><?=$entity->title?></a>
        </h3>
    </div>
    <?php endforeach; ?>
<?php else : ?>
        <p class="nothing">Aucun élément trouvé</p>
<?php endif; ?>

</section>