<?php

function ia3_prevnext(){
if(get_previous_post()):previous_post_link('%link', '&laquo; <span class="label">Previous</span>');else:?><span class="disabled">&laquo; Previous</span><?php endif;?>
<span class="delimiter"> | </span>
<?php if(get_next_post()):next_post_link('%link', '<span class="label">Next</span> &raquo;');else:?><span class="disabled">Next &raquo;</span><?php endif;
}

function ia3_big_prevnext(){
?>	
<nav class="bigBlogSerial">
<div class="lf w4c">
<div class="lu w2c prev">
<?php if(get_previous_post()):
$prevpost = get_previous_post();
previous_post_link('%link', '<div class="linkLabel">&laquo; <span class="label">Previous Post</span></div><div class="postTitle">'.$prevpost->post_title.'</div><div class="excerpt">'.$prevpost->post_excerpt.'</div>'); ?>
<?php endif;?>&nbsp;
<!--/.lu .w2c--></div>
<div class="lu w2c next">
<?php if(get_next_post()):
$nextpost = get_next_post();
next_post_link('%link', '<div class="linkLabel"><span class="label">Next Post</span> &raquo;</div><div class="postTitle">'.$nextpost->post_title.'</div><div class="excerpt">'.$nextpost->post_excerpt.'</div>'); ?>
<?php endif;?>
<!--/.lu .w2c--></div>
<!--/.lf .w4c--></div>
</nav>
<?php }

function ia3_comment($comment, $args, $depth) {
$GLOBALS['comment'] = $comment; ?>
<li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
<div id="comment-<?php comment_ID(); ?>">
<div class="comment-author vcard">
<?php echo get_avatar($comment,$size='32',$default='<path_to_url>' ); ?>
<?php printf(__('<cite class="fn">%s</cite> <span class="says">says:</span>'), get_comment_author_link()) ?>
</div>
<?php if ($comment->comment_approved == '0') : ?>
<em><?php _e('Your comment is awaiting moderation.') ?></em>
<br />
<?php endif; ?>
<div class="comment-meta commentmetadata"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php printf(__('%1$s at %2$s'), get_comment_date(),  get_comment_time()) ?></a><?php edit_comment_link(__('(Edit)'),'  ','') ?></div>
<?php comment_text() ?>
<div class="reply">
<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
</div>
</div>
<?php
}