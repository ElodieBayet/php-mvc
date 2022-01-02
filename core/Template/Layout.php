<!DOCTYPE html>
<html lang="fr" class="nojs">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= $this['inset']['title'] ?> | PHP & MVC</title>
    <!-- Styles -->
        <link href="../../public/css/base-min.css" rel="stylesheet" type="text/css" media="screen">
        <link href="../../public/css/components-min.css" rel="stylesheet" type="text/css" media="screen">
        <link href="../../public/css/theme-min.css" rel="stylesheet" type="text/css" media="screen">
    <!-- Identity and parameters -->
        <meta name="description" content="<?= $this['inset']['desc'] ?>">
        <meta name="author" content="Elodie Bayet, www.elodiebayet.com">
        <meta name="copyright" content="Elodie Bayet © 2021">
        <meta name="theme-color" content="#242428">
        <link href="../../_manifest.json" rel="manifest" type="application/manifest+json">
        <link href="../../assets/trademark/phpmvc_favicon.png" rel="icon" type="image/png">
        <!--[if IE]><link href="../../assets/trademark/phpmvc_favicon.png" rel="shortcut icon" type="image/x-icon" /><![endif]-->
    <!-- Scripts -->
        <script type="module" src="../../public/js/main.js"></script>
    </head>
    <body>
        <header id="uihead" class="closed">
			<div class="inner">
				<div class="headline">
                    <a href="/" class="applogo" title="Retourner à l'accueil du site">
                        <span class="icon"><img src="../../assets/trademark/phpmvc_icon_wt.svg" alt="Icon PHP MVC"></span>
                        <span class="title">PHP &amp; MVC</span>
                    </a>
					<p>Exemple de développement MVC &amp; OOP en PHP</p>
				</div>
                <div class="navigation expand">
					<nav class="mainmenu">
                    <?php
                        $sub = true;
                        include 'Menu.php';
                    ?>
                    </nav>
                </div>
			</div>
			<div class="edge">&nbsp;</div>
			<div class="edge">&nbsp;</div>
            <button type="button"><span class="blind">Ouvrir le menu</span></button>
		</header>
        <main>
            <header>
                <h1><?= $this['inset']['title'] ?></h1>
                <div class="share">
                    <ul><!-- MEMO :  ':' is %3A  ;  '/' is %2F  ;  'space' is %20 -->
                        <li><!-- https://www.facebook.com/sharer.php?u=https%3A%2F%2F<yours-dns-here> -->
                            <a href="#" title="Partager sur Facebook" class="ideogram tooltip">
                                <span class="symbol"><img src="https://www.elodiebayet.com/store/icons/share_facebook_bl.svg" alt="Icon Facebook" width="32" height="32"></span>
                                <span class="tip top">Partager sur Facebook</span>
                            </a>
                        </li>
                        <li><!-- https://www.linkedin.com/shareArticle?mini=true&url=https%3A%2F%2F<your-dns-here>&title=<your-title-page-here>&source=<your-name-here> -->
                            <a href="#" title="Partager sur Linked In" class="ideogram tooltip">
                                <span class="symbol"><img src="https://www.elodiebayet.com/store/icons/share_linkedin_bl.svg" alt="Icon Linked in" width="32" height="32"></span>
                                <span class="tip top">Partager sur Linked In</span>
                            </a>
                        </li>
                        <li><!-- mailto:?Subject=<your-subject-here>&amp;Body=https%3A%2F%2F<your-dns-here> -->
                            <a href="#" title="Envoyer par E-mail" class="ideogram tooltip">
                                <span class="symbol"><img src="https://www.elodiebayet.com/store/icons/share_email_bl.svg" alt="Icon Email" width="32" height="32"></span>
                                <span class="tip top">Envoyer par Email</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </header>
            <noscript><strong>Le JavaScript n'est pas activé&nbsp;::</strong> L'application ne pourra pas fonctionner.</noscript>
            <!-- Page Content -->
            <?= $this['content'] ?>
        </main>
        <footer id="uifoot">
            <div class="headline">
                <div>
                    <a href="/" class="applogo" title="Retourner à l'accueil du site">
                        <span class="icon"><img src="../../assets/trademark/phpmvc_icon_wt.svg" alt="Icon PHP MVC"></span>
                        <span class="title">PHP &amp; MVC</span>
                    </a>
					<p>Exemple de développement MVC &amp; OOP en PHP</p>
                </div>
                <nav class="socialmenu">
                    <h3 class="blind">Menu social</h3>
                    <ul>
                        <li>
                            <a href="https://www.linkedin.com/in/elodiebayet" title="Voir le profil" target="_blank" rel="noreferrer" class="ideogram tooltip">
                                <span class="symbol"><img src="https://www.elodiebayet.com/store/icons/profile_linkedin_bl.svg" alt="Logo Linked In" width="28" height="28"></span>
                                <span class="tip top">Profil Linked In</span>
                            </a>
                        </li>
                        <li>
                            <a href="https://bitbucket.org/ElodieBayet" title="Voir le profil" target="_blank" rel="noreferrer" class="ideogram tooltip">
                                <span class="symbol"><img src="https://www.elodiebayet.com/store/icons/profile_bitbucket_bl.svg" alt="Logo Bitbucket" width="28" height="28"></span>
                                <span class="tip top">Profil Bitbucket</span>
                            </a>
                        </li>
                        <li>
                            <a href="https://github.com/ElodieBayet" title="Voir le profil" target="_blank" rel="noreferrer" class="ideogram tooltip">
                                <span class="symbol"><img src="https://www.elodiebayet.com/store/icons/profile_github_bl.svg" alt="Logo GitHub" width="28" height="28"></span>
                                <span class="tip top">Profil GitHub</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="navigation">
                <nav class="mainmenu">
                    <h3>Menu Principal</h3>
                    <?php
                        $sub = false;
                        include 'Menu.php';
                    ?>
                </nav>
            </div>
            <div id="author">
                <p>Développé par <strong>Elodie Bayet © 2018-2021</strong> - Tous droits réservés</p>
            </div>
        </footer>
    </body>
</html>