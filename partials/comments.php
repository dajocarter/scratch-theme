<?php if ( comments_open() && get_comments() ) : ?>
<div class="comments">
  <?php foreach( get_comments() as $comment ) : ?>
    <div class="comment">
      <div class="comment-image">
        <?php echo get_avatar($comment->user_id); ?>
      </div>
      <div class="comment-content">
        <p class="bold"><?php echo $comment->comment_author; ?></p>
        <p><?php echo get_comment_text($comment->comment_ID); ?></p>
        <p class="comment-detail">Posted on <?php echo date('F j, Y', strtotime($comment->comment_date)); ?></p>
      </div>
    </div>
    </div>
  <?php endforeach; ?>
<?php endif; ?>
