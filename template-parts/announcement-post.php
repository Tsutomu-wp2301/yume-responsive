<section class="p-archive__item--wrapper">
  <?php if(has_post_thumbnail()) : ?>
  <?php the_post_thumbnail('archive_thumbnail',array('class' => 'c-post--thumbnail')); ?>
    <?php else : ?>
      <img src='<?php echo esc_url(get_template_directory_uri()); ?>/image/hamburger.png'>
    <?php endif; ?>
  <div class="p-news__archive__item">
    <div class="p-flex--new">
      <h3>
        <?php include_once(ABSPATH . 'wp-admin/includes/plugin.php'); ?>
        <?php
          $post_title = get_the_title();
          if (!empty($post_title)) {
            echo esc_html($post_title);
          } else {
            echo '投稿のタイトルが表示されます';
          }
        ?>
      </h3>
      <div class="p-new-mark">
        <?php
          $day  = 3000; // NEWマークを表示させる期間の日数を入れます
          $today = date_i18n('U');
          $post_day = get_the_time('U');
          $term = date('U',($today - $post_day)) / 86400;
          if( $day > $term ){
              echo 'NEW';
          }
        ?>
      </div>
    </div>
    <span>
      <?php the_terms( get_the_ID(), 'news-category' ); ?>
    </span><!-- カスタム投稿のカテゴリーを表示する -->
    <div class="p-taxonomy--style-tag">
    <?php
      $tag_terms = get_the_terms( get_the_ID(), 'news-tag' ); // タームを取得
      if ( $tag_terms && ! is_wp_error( $tag_terms ) ) {
        foreach ( $tag_terms as $tag ) {
          echo '<a href="' . get_term_link( $tag ) . '">' . $tag->name . '</a>'; // リンク付きのテキストとしてタームを表示
        }
      }
    ?>
    </div><!-- カスタム投稿のタグを表示する -->
    <p><?php echo esc_html(mb_substr(get_the_excerpt(),0,80)) . '...'; ?></p>
    <a href="<?php the_permalink(); ?>" class="c-button--announce-item">詳しく見る</a>
  </div>
</section>