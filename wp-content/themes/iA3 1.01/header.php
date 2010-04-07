<!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>" />
<meta name="viewport" content="width=320" />
<title><?php bloginfo('name'); ?><?php wp_title(); ?></title>
<meta name="description" content="<?php
if(is_home()):
echo 'Description for top page';
else: if (have_posts()): while (have_posts()): the_post();
echo strip_tags(get_the_excerpt()); endwhile; endif; endif;?>" />
<link rel="alternate" type="application/atom+xml" title="<?php bloginfo('name'); ?> Atom Feed (<?php bloginfo('language'); ?>)" href="<?php bloginfo('atom_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<!--link rel="shortcut icon" type="image/vnd.microsoft.icon" href="/favicon.ico" /-->
<link rel="apple-touch-icon" href="<?php bloginfo('template_url'); ?>/img/apple-touch-icon.png" />
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="all" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/bundle.js.php"></script>
<?php wp_head(); ?>
</head>
<body>
<header>
<div class="lf w6c">
<div class="lu w2c first-child">
<h1 class="siteid"><a href="<?php bloginfo('siteurl'); ?>/" class="sprite"><span class="rptext"><?php bloginfo('name'); ?></span></a></h1>
<!--/.lu .w2c--></div>
<div class="lu w3c">
<a href="#" id="iMenu" class="forRMB">Menu</a>
<nav class="mainNav">
<ul class="lf w3c">
<li class="lu w1c first-child"><span class="category">CATEGORYNAME</span>
	<ul>
	<?php if(is_single()){?>
	<li><em><a href="<?php bloginfo('siteurl'); ?>/archive/">Archive</a></em></li>
	<?php }else{?>
	<li><a href="<?php bloginfo('siteurl'); ?>/archive/">Archive</a></li>
	<?php }?>
	<li><a href="<?php bloginfo('siteurl'); ?>/about/">About</a></li>
	<li><a href="<?php bloginfo('siteurl'); ?>/gallery/">Gallery</a></li>
	</ul>
</li>
<li class="lu w1c"><span class="category">CATEGORYNAME</span>
	<ul>
	<li><a href="<?php bloginfo('siteurl'); ?>/tweets/">Tweets</a></li>
	<li><a href="<?php bloginfo('siteurl'); ?>/path/">Page Name</a></li>
	<li><a href="<?php bloginfo('siteurl'); ?>/path/">Page Name</a></li>
	</ul>
</li>
<li class="lu w1c"><span class="category">CATEGORYNAME</span>
	<ul>
	<li><a href="<?php bloginfo('siteurl'); ?>/path/">Page Name</a></li>
	<li><a href="<?php bloginfo('siteurl'); ?>/path/">Page Name</a></li>
	<li><a href="<?php bloginfo('siteurl'); ?>/path/">Page Name</a></li>
	</ul>
</li>
</ul>
</nav>
<!--/.lu .w3c--></div>
<div class="lu w1c">
<a href="#" id="iLang" class="forRMB">Other Lang</a>
<nav class="langSelector">
<ul>
<li><span class="category">Related Site</span>
	<ul>
	<li><a href="<?php bloginfo('siteurl'); ?>/">This Site</a></li>
	<li><a href="http://example.com/">Other Site</a></li>
	<li><a href="http://example.com/">Other Site</a></li>
	</ul>
</li>
</ul>
</nav>
<!--/.lu .w1c--></div>
<!--/.lf .w6c--></div>
</header>