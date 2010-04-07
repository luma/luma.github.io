<?php
add_action('wp_head', 'page_head');
add_action('wp_footer', 'page_foot');
get_header();
function page_head(){
?>
<style type="text/css" media="all">
.contentBody {
	margin-bottom: 0;
}

.topAside {
	margin: 30px 0 45px;
	padding-top: 2em;
	font-size: 107.14%;
}

article.topFeatured hgroup,
article.topFeatured .content {
	margin-left: 0;
}


.webkit article.topFeatured hgroup,
.webkit article.topFeatured .content,
.mozilla article.topFeatured hgroup,
.mozilla article.topFeatured .content {
	margin-left: 0;
}

article.topFeatured hgroup {
	margin-top: 2em;
	margin-bottom: 1em;
}

article.topFeatured h1 {
	font-size:40px;
	font-weight: lighter;
	line-height: 1.075;
	/*letter-spacing: .05em;*/
	margin-top: 0;
}

article.topFeatured h1 a:visited, article.topFeatured h1 a {
	color: #000;
	text-decoration: none;
}

article.topFeatured h1 a:link:hover, article.topFeatured h1 a:hover {
	color: #000;	
}

article.topFeatured .content {
	font-size: medium;
	margin-bottom: 1em;
}

article.topFeatured .content p {
	margin: 0;
	text-indent: 2em;
}

article.topFeatured .content p:first-child {
	text-indent: 0;
}

article.topFeatured .superiorTitle {
	font-size: 102%;
	letter-spacing: 0;
	margin: 0;
	text-transform: capitalize;
}

article.topFeatured .content h2 {
	font-size: 120%;
	line-height: 1.25;
	margin: .65em 0;
}

.webkit article.topFeatured .content,
.mozilla article.topFeatured .content {
	-webkit-column-count: 3;
	-webkit-column-gap: 18px;
	-moz-column-count: 3;
	-moz-column-gap: 18px;
	column-count: 3;
	column-gap: 18px;
}

.whitebg {
	border: 1px #fff solid !important;
}

#aboutia p {
	margin-top: 1.05em;
}

#latestArtilcles dl {
	margin: 0;
}

.more-link {
	margin-top: 1em;
}

ul.more-list {
	list-style: none;
	}

dl.entryList.small dt {
	font-weight: normal;
}

/*	.webkit article.topFeatured .content { */
	article.topFeatured .content {
		text-align: justify;
		-webkit-column-count: 3;
		-webkit-column-gap: 1.8em;
		-moz-column-count: 3;
 		-moz-column-gap: 1.8em;
		column-count: 3;
		column-gap: 1.8em;
	}

@media screen and (max-device-width: 480px) and (min-device-width: 320px){

	article.topFeatured hgroup,
	article.topFeatured .content {
		margin-left: 0;
	}

	article.topFeatured .content {
		-webkit-column-count: 1;
		-webkit-column-gap: 0;
		-moz-column-count: 1;
 		-moz-column-gap: 0;
		column-count: 1;
		column-gap: 0;
	}

	article.topFeatured h1 {
		font-size: 200%;
	}

	article.topFeatured .content p {
		margin-bottom: 1.5em;
		text-indent: 0;
	}

	#latestArtilcles {
		margin-top: 2.5em;
	}

	.contentBody figure img {
		margin-left: -10px;
		max-width: 320px;
	}

	.whitebg {
		border: none !important;
		background: #fff;
	}
}
</style>
<?php }
function page_foot(){?><?php }?>

<div class="contentBody wide">
<?php query_posts('category_name=Featured&showposts=1'); ?>
<?php while (have_posts()) : the_post(); ?>
<article <?php post_class('topFeatured') ?>>
<figure>
<dd><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><img src="<?php $fi = get_post_custom_values('featured_image'); echo $fi[0]?>" class="whitebg featuredImage" alt="<?php the_title()?>"/></a></dd>
</figure>
<hgroup>
<h2 class="superiorTitle"><?php the_time('F jS, Y') ?></h2>
<h1><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php $title = get_the_title(); the_title(); ?></a></h1>
</hgroup>
<div class="content entry">
<?php echo preg_replace('/\n/','<br />',get_the_excerpt()); ?> <a href="<?php the_permalink() ?>" class="more-link">Read <span class="verbose">"<?php the_title(); ?>"</span> more</a>
<!-- /.content entry--></div>
</article>
<?php endwhile; ?>

<aside class="lf w6c topAside">

<section class="lu w2c first-child" id="aboutia">
<h3>ABOUT ME</h3>
<div class="content">
<p>We specialise in developing and deploying Bright Ideas and concepts online. We can design and build custom web apps, ecommerce, cms, and mobile solutions for your business.</p>
<p>We love what we do and we think you'll love what we can do for you.</p>
<ul class="more-list">
	<li><a href="<?php bloginfo('siteurl'); ?>/about/">Read About How we can Help <em>You</em></a></li>
	<li><a href="<?php bloginfo('siteurl'); ?>/contact/">Get in Touch</a></li>
</ul>
<!-- /.content --></div>
<!--/.lu .w2c--></section>

<section class="lu w4c" id="latestArtilcles">
<h3>LATEST ARTICLES</h3>
<div class="content">
<dl class="entryList small">
<?php
query_posts('showposts=3');
if ( have_posts() ) : while ( have_posts() ) : the_post();
?><dt><a href="<?php the_permalink() ?>" class='tk-proxima-nova-condensed'><?php the_title(); ?></a></dt>
<dd><?php echo preg_replace('/\n/','<br />', preg_replace('/<p>(.+?)<\/p>/','$1',get_the_excerpt())); ?> <a href="<?php the_permalink() ?>" class="more-link">Read <span class="verbose">"<?php the_title(); ?>"</span> more</a></dd>
<?php
endwhile;endif;
wp_reset_query();
?></dl>

<div class="more-link"><a href="<?php bloginfo('siteurl'); ?>/thoughts/">Archive</a></div>

<!-- /.content --></div>
<!--/.lu .w2c--></section>

<!--/.lf .w6c　.topAside--></aside>

<!-- /.contentBody --></div>

<?php get_footer()?>