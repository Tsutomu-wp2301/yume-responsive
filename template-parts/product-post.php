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
      </h3><!-- 投稿のタイトルを表示 -->
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
      </div><!-- NEWマークを表示させる -->
    </div>
    <?php
      $categories = get_the_category(); // 標準投稿のカテゴリーの配列を取得
      $category_links = array(); // カテゴリーリンクを格納するための配列
      foreach ($categories as $category) {
        $category_links[] = '<a href="' . get_category_link($category->term_id) . '">' . $category->name . '</a>'; // カテゴリーリンクを配列に追加
      }
      $category_list = implode(', ', $category_links); // カテゴリーリンクをカンマで区切って結合
      echo '<span>' . $category_list . '</span>'; // <span>要素でカテゴリーリンクを表示
    ?><!-- 標準投稿のカテゴリーをリンク付きで表示する -->
    <?php
      $tags = get_the_tags();
      if ($tags) {
        echo '<div class="p-tag-container">';
        foreach ($tags as $tag) {
            echo '<a href="' . get_tag_link($tag->term_id) . '" class="p-tag">' . $tag->name . '</a>';
        }
        echo '</div>';
      }
    ?><!-- 標準投稿のタグを表示する -->
    <p><?php echo esc_html(mb_substr(get_the_excerpt(),0,80)) . '...'; ?></p>
    <a href="<?php the_permalink(); ?>" class="c-button--announce-item">詳しく見る</a>
  </div>
</section>