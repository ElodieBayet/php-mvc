<!DOCTYPE html>
<html lang="<?= $this['page']->getLang() ?>" class="nojs">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?= $this['page']->getTitle() ?> | PHP & MVC</title>
<!-- Styles -->
	<link href="https://demo.elodiebayet.com/neptune/assets/css/common.css" rel="stylesheet" type="text/css" media="screen">
	<link href="https://demo.elodiebayet.com/neptune/assets/css/theme.css" rel="stylesheet" type="text/css" media="screen">
	<link href="https://demo.elodiebayet.com/neptune/assets/css/chronographic.css" rel="stylesheet" type="text/css" media="screen">
	<link href="/assets/css/phpmvc.css" rel="stylesheet" type="text/css" media="screen">
<!-- Identity and parameters -->
	<meta name="description" content="<?= $this['page']->getDescription() ?>">
	<meta name="author" content="Elodie Bayet, www.elodiebayet.com">
	<meta name="copyright" content="Elodie Bayet © 2025">
	<meta name="theme-color" content="#0c7f8e">
	<link rel="icon" href="https://www.elodiebayet.com/shared/trademark/elodie_bayet_side_favicon.png" type="image/png">
<!-- Sharing Properties -->
	<meta property="og:title" content="<?= $this['page']->getTitle() ?> | PHP & MVC">
	<meta property="og:type" content="website">
	<meta property="og:url" content="https://demo.elodiebayet.com<?= $_SERVER['REQUEST_URI']; ?>">
	<meta property="og:description" content="<?= $this['page']->getDescription() ?>">
	<meta property="og:image" content="https://www.elodiebayet.com/assets/ads/elodiebayet_websitebanner.jpg">
	<meta property="og:image:type" content="image/jpeg">
	<meta property="og:image:width" content="1200">
	<meta property="og:image:height" content="380">
<!-- Scripts -->
	<script type="module" src="/assets/js/main.js" id="jsMain"></script>
<!-- Audience Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=G-XB8CY5WC7N"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){ dataLayer.push(arguments); }
		gtag('js', new Date());
		gtag('config', 'G-XB8CY5WC7N');
	</script>
</head>
<body id="<?= $this['page']->getId() ?>">
	<header id="uihead" class="closed">
		<div class="inner">
			<div class="headline">
				<a href="./" class="applogo" title="<?= $this['ui']['returnto'] . ' : ' . $this['ui']['home'] ?>">
					<span class="icon"><img src="https://www.elodiebayet.com/shared/trademark/elodie_bayet_side_icon_wt.svg" alt=""></span>
					<span class="title" aria-hidden="true">PHP &amp; MVC</span>
				</a>
			</div>
			<div class="navigation">
				<nav class="mainmenu">
					<h3 class="blind"><?= $this['ui']['main'] ?></h3>
					<ul>
						<?php foreach ($this['page']->getMains() as $route) : ?>
						<li>
							<a href="/<?= $this['page']->getLang() . $route->getSlug() ?>" title="<?= $this['ui']['gotopage'] ?>" <?= $this['page']->getId() === $route->getCode() ? 'class="selected"' : '' ?>><?= $route->getLabel() ?></a>
						</li>
						<?php endforeach; ?>
					</ul>
				</nav>
				<nav class="langmenu">
					<h3 class="blind"><?= $this['ui']['languages'] ?></h3>
					<ul>
					<?php foreach ($this['page']->getVersions() as $version) : ?>
						<li>
							<a 	href="<?= $this['page']->getLang() === $version->getIsoCode() ? '#' : '/' . $version->getIsoCode() . $version->getRoute()->getSlug() ?>" 
								title="<?= $this['ui']['switchlang'] ?>" 
								<?= $this['page']->getLang() === $version->getIsoCode() ? 'class="selected"' : '' ?>><?= $version->getLabel() ?>
							</a>
						</li>
					<?php endforeach; ?>
					</ul>
				</nav>
			</div>
		</div>
		<div class="edge">&nbsp;</div>
		<div class="edge">&nbsp;</div>
		<button type="button"><span class="blind"><?= $this['ui']['openmenu'] ?></span></button>
	</header>
	<main>
		<header>
			<h1><?= $this['page']->getH1() ?></h1>
			<a href="#" class="tab url"><span class="github">&nbsp;</span><?= $this['ui']['seeproject'] ?> GitHub</a>
		</header>
		<noscript><?= $this['ui']['jsoff'] ?></noscript>
		<?= $this['content'] ?>
	</main>
	<footer id="uifoot">
		<div class="headline">
			<div>
				<a href="./" class="applogo" title="Retourner à l'accueil du site">
					<span class="icon"><img src="https://www.elodiebayet.com/shared/trademark/elodie_bayet_side_icon_wt.svg" alt=""></span>
					<span class="title">PHP &amp; MVC</span>
				</a>
			</div>
			<nav class="secondmenu">
				<h3 class="blind"><?= $this['ui']['second'] ?></h3>
				<ul>
					<?php foreach ($this['page']->getSeconds() as $route) : ?>
					<li <?= $this['page']->getId() === $route->getCode() ? 'class="selected"' : '' ?>>
						<a href="/<?= $this['page']->getLang() . $route->getSlug() ?>" title="<?= $this['ui']['gotopage'] ?>"><?= $route->getLabel() ?></a>
					</li>
					<?php endforeach; ?>
				</ul>
			</nav>
		</div>
		<div id="author">
			<p><?= $this['ui']['author'] ?></p>
		</div>
	</footer>
</body>
</html>