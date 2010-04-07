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

<link rel="icon" href="/wp-content/themes/luma/favicon.ico" type="image/ico" />    
<link rel="shortcut icon" type="image/x-icon" href="/wp-content/themes/luma/favicon.ico" />

<?php wp_head(); ?>
<script type="text/javascript" src="http://use.typekit.com/ojl1xmc.js"></script>
<script type="text/javascript">try{Typekit.load();}catch(e){}</script>
</head>
<body>
<header>
<div class="lf w6c">
<div class="lu w2c first-child">
<h1 class="siteid"><a href="<?php bloginfo('siteurl'); ?>/" class="sprite"><span class="rptext"><?php bloginfo('name'); ?></span></a></h1>
<!--/.lu .w2c--></div>
<div class="lu w4c">
<a href="#" id="iMenu" class="forRMB">Menu</a>
<nav class="mainNav">
<ul class="lf w4c">  
	<li class='first-item<?php if (is_page('Who Are We')) { ?> current-page<?php } ?>'><a href="<?php bloginfo('siteurl'); ?>/who-are-we/">Who Are We</a></li>
	<li<?php if (is_page('What We Do')) { ?> class='current-page'<?php } ?>><a href="<?php bloginfo('siteurl'); ?>/what-we-do/">What We Do</a></li>
	<li<?php if (is_category('Portfolio') || in_category('7') && !(is_single() || is_home()) ) { ?> class='current-page'<?php } ?>><a href="<?php bloginfo('siteurl'); ?>/portfolio/">Our Work</a></li>
	<li>
		<?php if ( is_page('Our Thoughts') ) {?>
		<li><em><a href="<?php bloginfo('siteurl'); ?>/thoughts/">Our Thoughts</a></em></li>
		<?php }else{?>
		<li><a href="<?php bloginfo('siteurl'); ?>/thoughts/">Our Thoughts</a></li>
		<?php }?>
	</li>
	<li class='last-item<?php if (is_page('Contact')) { ?> current-page<?php } ?>'><a href="<?php bloginfo('siteurl'); ?>/contact/">Get in Touch</a></li>
</ul>
</nav>
<!--/.lu .w3c--></div>
<!--/.lf .w6c--></div>
</header>