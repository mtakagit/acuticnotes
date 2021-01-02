<div @php post_class() @endphp>
  <div class="work_img">
    <a href="{{ get_permalink() }}">
      <?= wp_get_attachment_image( get_post_meta( get_the_ID(), 'wiki_test_image_id', 1 ), 'medium' ); ?>
    </a>
  </div>
  <div class="work_head">
    <h2 class="work_ttl"><a href="{{ get_permalink() }}">{!! get_the_title() !!}</a></h2>
    <time class="work_date" datetime="{{ get_post_time('c', true) }}">{{ get_the_date() }}</time>
  </div>
  <div class="work_shop">
    <h3 class="work_shopTtl">
      Buy online:
    </h3>
    <ul class="work_shopList">
    <?php 
    $entries = get_post_meta( get_the_ID(), 'wiki_test_repeat_group', true );

    foreach ( (array) $entries as $key => $entry ) {
    
      $img = $title = $desc = $caption = '';
    
      if ( isset( $entry['title'] ) ) {
        $title = esc_html( $entry['title'] );
      }
    
      if ( isset( $entry['description'] ) ) {
        $desc = wpautop( $entry['description'] );
      }
    
    
      $caption = isset( $entry['image_caption'] ) ? wpautop( $entry['image_caption'] ) : '';
    
      // Do something with the data
      echo ' <li class="work_shopItem"><a href="'.$desc.'" class="work_shopLink">'.$title,'</a></li>';
    }
    
    ?>
    
    </ul>
  </div>
</div>
