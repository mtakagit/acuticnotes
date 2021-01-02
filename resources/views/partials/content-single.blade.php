<article @php post_class() @endphp>
  <div class="single">
    <nav class="nav_home">
      <a href="/">
        <img
          src="<?= get_template_directory_uri(); ?>/assets/images/icon_back.svg"
          alt="BACK"
        >
      </a>
    </nav>
    <nav class="nav_pages">
      <div class="nav_pagesIn">
        <a href="/about" class="nav_about">About us</a>
      </div>
      <ul class="nav_list">
        <li>
          <a href="/about" class="nav_tw">
            <img
              src="<?= get_template_directory_uri(); ?>/assets/images/icon_twitter.svg"
              alt="tweet"
            >
          </a>
        </li>
        <li>
          <a href="/about" class="nav_fb">
            <img
              src="<?= get_template_directory_uri(); ?>/assets/images/icon_fb.svg"
              alt="share"
            >
          </a>
        </li>
      </ul>
    </nav>
    <header class="single_header">
      <div class="single_headerIn">
      @include('partials/entry-meta')
      </div>
    </header>
    <div class="single_content">
      <div class="single_titleBlk">
        <h1 class="single_title">{!! get_the_title() !!}</h1>
        <?php
          $url = get_post_meta( get_the_ID(), 'special_url', true );
          echo '<a href="'.$url.'" class="single_special">Special page</a>';
        ?>
      </div>
      <div class="work_description">
        @php the_content() @endphp
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
            
              // Do something with the data
              echo ' <li class="work_shopItem"><a href="'.$desc.'" class="work_shopLink">'.$title,'</a></li>';
            }
            
          ?>
        </ul>
      </div>
    </div>
    <div class="nav_prev">
      <span class="nav_prevIn">
        <?php previous_post_link('%link', '%title', true); ?>
      </span>
    </div>
    <div class="nav_next">
      <span class="nav_nextIn">
        <?php next_post_link('%link', '%title', true); ?>
      </span>
    </div>
  </div>
</article>
