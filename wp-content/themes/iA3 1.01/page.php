<?php
/*
Template Name: Page-template
*/
add_action('wp_head', 'page_head');
add_action('wp_footer', 'page_foot');
get_header();
function page_head(){?><?php }
function page_foot(){?><?php }?>

<div class="contentBody">
<?php if (have_posts()): while (have_posts()): the_post(); ?>
<article>
<h1 class="contentTitle"><?php the_title(); ?></h1>
<div class="content">
<?php the_content(); ?>
</div>
</article>
<?php endwhile; endif; ?>

<?php if(comments_open()): ?>
<section id="comments">
<?php comments_template(); ?>
</section>
<?php endif; ?>

</div><!-- /.contentBody -->
<?php get_footer(); ?>