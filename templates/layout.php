<?php
/** @var Page $page */
$page = $this['page'];
?>
<!DOCTYPE html>
<html lang="<?= $page->getLang() ?>" class="nojs">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?= $page->getTitle() ?> | PHP & MVC</title>
<!-- Styles -->
	<link href="https://demo.elodiebayet.com/neptune/assets/css/common.css" rel="stylesheet" type="text/css" media="screen">
	<link href="https://demo.elodiebayet.com/neptune/assets/css/theme.css" rel="stylesheet" type="text/css" media="screen">
	<link href="https://demo.elodiebayet.com/neptune/assets/css/chronographic.css" rel="stylesheet" type="text/css" media="screen">
	<link href="/assets/css/phpmvc.css" rel="stylesheet" type="text/css" media="screen">
<!-- Identity and parameters -->
	<meta name="description" content="<?= $page->getDescription() ?>">
	<meta name="author" content="Elodie Bayet, www.elodiebayet.com">
	<meta name="copyright" content="Elodie Bayet © 2025">
	<meta name="theme-color" content="#0c7f8e">
	<link rel="icon" href="https://www.elodiebayet.com/shared/trademark/elodie_bayet_side_favicon.png" type="image/png">
<!-- Sharing Properties -->
	<meta property="og:title" content="<?= $page->getTitle() ?> | PHP & MVC">
	<meta property="og:type" content="website">
	<meta property="og:url" content="https://demo.elodiebayet.com<?= $_SERVER['REQUEST_URI']; ?>">
	<meta property="og:description" content="<?= $page->getDescription() ?>">
	<meta property="og:image" content="https://www.elodiebayet.com/assets/ads/elodiebayet_websitebanner.jpg">
	<meta property="og:image:type" content="image/jpeg">
	<meta property="og:image:width" content="1200">
	<meta property="og:image:height" content="380">
<!-- Scripts -->
	<script type="module" src="/assets/js/main.js" id="jsMain"></script>
</head>
<body id="<?= $page->getId() ?>">
	<header id="uihead" class="closed">
		<div class="inner">
			<div class="headline">
				<a href="/" class="applogo" title="<?= $this['ui']['returnto'] . ' : ' . $this['ui']['home'] ?>">
					<span class="icon"><img src="https://www.elodiebayet.com/shared/trademark/elodie_bayet_side_icon_wt.svg" alt=""></span>
					<span class="title" aria-hidden="true">PHP &amp; MVC</span>
				</a>
				<p><?= $this['ui']['baseline'] ?></p>
			</div>
			<div class="navigation">
				<nav class="mainmenu">
					<h3 class="blind"><?= $this['ui']['main'] ?></h3>
					<ul>
						<?php foreach ($page->getMains() as $navigation) : ?>
						<li>
							<a href="/<?= $page->getLang() . $navigation->getPath() ?>" title="<?= $this['ui']['gotopage'] ?>" <?= $page->getId() === $navigation->getCode() ? 'class="selected"' : '' ?>><?= $navigation->getLabel() ?></a>
						</li>
						<?php endforeach; ?>
					</ul>
				</nav>
				<nav class="langmenu">
					<h3 class="blind"><?= $this['ui']['languages'] ?></h3>
					<ul>
					<?php foreach ($page->getVersions() as $version) : ?>
						<li>
							<a 	href="<?= $page->getLang() === $version->getIsoCode() ? '#' : '/' . $version->getIsoCode() . $version->getNavigation()->getPath() ?>" 
								title="<?= $this['ui']['switchlang'] ?>" 
								<?= $page->getLang() === $version->getIsoCode() ? 'class="selected"' : '' ?>><?= $version->getLabel() ?>
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
			<h1><?= $page->getH1() ?></h1>
			<p><?= $this['ui']['subtitle'] ?></p>
			<a href="https://github.com/ElodieBayet/php-mvc" class="tab url"><span class="github">&nbsp;</span><?= $this['ui']['seeproject'] ?> GitHub</a>
		</header>
		<noscript><?= $this['ui']['jsoff'] ?></noscript>
		<?= $this['content'] ?>
	</main>
	<footer id="uifoot">
		<div class="headline">
			<div>
				<a href="/" class="applogo" title="<?= $this['ui']['returnto'] . ' : ' . $this['ui']['home'] ?>">
					<span class="icon"><img src="https://www.elodiebayet.com/shared/trademark/elodie_bayet_side_icon_wt.svg" alt=""></span>
					<span class="title">PHP &amp; MVC</span>
				</a>
			</div>
			<nav class="secondmenu">
				<h3 class="blind"><?= $this['ui']['second'] ?></h3>
				<ul>
					<?php foreach ($page->getSeconds() as $navigation) : ?>
					<li <?= $page->getId() === $navigation->getCode() ? 'class="selected"' : '' ?>>
						<a href="/<?= $page->getLang() . $navigation->getPath() ?>" title="<?= $this['ui']['gotopage'] ?>"><?= $navigation->getLabel() ?></a>
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