<?php
/*
Template Name: Single
*/
add_action('wp_head', 'page_head');
add_action('wp_footer', 'page_foot');
get_header();
function page_head(){?><?php }
function page_foot(){?><?php }?>

<?php 
	$fi = get_post_custom_values('featured_image');
	$featured_article = !is_null($fi);
?>

<?php if (have_posts()): while (have_posts()): the_post(); ?>
<div class="contentBody blogEntry<?php if ($featured_article) { ?> featured<?php } ?>">
<nav class="blogSerial asideBlock">
<?php ia3_prevnext()?>
</nav>


<?php 
	if ( $featured_article ) {
?>
<article <?php echo post_class() ?>>
<figure class='featured'>
<dd><img src="<?php echo $fi[0]?>" class="whitebg featuredImage" alt="<?php the_title()?>"/></dd>
</figure>
<?php } else { ?>
<article>
<?php } ?>

<hgroup>
<h1 class="contentTitle"><?php the_title(); ?></h1>
<h2 class="postDate date"><?php echo date('l, F jS, Y', strtotime($post->post_date)); ?><?php edit_post_link('&raquo; Edit This Post', '&nbsp;&nbsp;&nbsp;'); ?></h2>
</hgroup>
<div class="asideBlock">
<!-- /.asideBlock --></div>
<div class="content entry">
<?php
the_content();
?>
</div>
</article>

<nav class="similarEntries">
<h2 class="superiorTitle">WE RECOMMEND:</h2>
<?php //similar_posts();?>
</nav

<?php if(comments_open()): ?>
<section id="comments">
<?php comments_template(); ?>
</section>
<?php endif; ?>


</div><!-- /.contentBody -->

<?php endwhile; endif; get_footer(); ?>