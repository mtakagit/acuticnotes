<div class="work_img">
 <?= wp_get_attachment_image( get_post_meta( get_the_ID(), 'wiki_test_image_id', 1 ), 'medium' ); ?>
   </div>
   <dl class="credit">
     <dt>Release Date:</dt>
<dd class="work_date" datetime="{{ get_post_time('c', true) }}">{{ get_the_date() }}</dd>
<?php 
    $entries = get_post_meta( get_the_ID(), 'wiki_test_textareacode', true );
      echo $entries;
    ?>
    </dl>