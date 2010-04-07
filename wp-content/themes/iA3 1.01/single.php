<?php
/*
Template Name: Single
*/
add_action('wp_head', 'page_head');
add_action('wp_footer', 'page_foot');
get_header();
function page_head(){?><?php }
function page_foot(){?><?php }?>

<?php if (have_posts()): while (have_posts()): the_post(); ?>
<div class="contentBody blogEntry">
<nav class="blogSerial asideBlock">
<?php ia3_prevnext()?>
</nav>
<article>
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

<!--nav class="similarEntries">
<h2 class="superiorTitle">WE RECOMMEND:</h2>
<?php //similar_posts();?>
</nav-->

<?php if(comments_open()): ?>
<section id="comments">
<?php comments_template(); ?>
</section>
<?php endif; ?>


</div><!-- /.contentBody -->

<?php endwhile; endif; get_footer(); ?>