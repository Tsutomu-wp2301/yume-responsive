<section class="p-archive__item--wrapper">
  <?php if(has_post_thumbnail()) : ?>
  <?php the_post_thumbnail('archive_thumbnail',array('class' => 'c-post--thumbnail-search')); ?>
    <?php else : ?>
      <img src='<?php echo exc_url(get_template_directory_uri()); ?>/image/hamburger.png'>
    <?php endif; ?>
  <div class="p-archive__item">
    <div class="p-flex--new">
      <h3><?php the_title(); ?></h3>
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
    <h4>
      <?php include_once(ABSPATH . 'wp-admin/includes/plugin.php'); ?>
      <?php 
        if (is_plugin_active('custom-field-suite/cfs.php')) {
          $h2_menu = CFS()->get('h2_menu',$id);
          if(!empty($h2_menu)) {
            echo esc_html($h2_menu); 
          } else { 
            echo '商品ページの見出しを入力します2';
          }
        }else{
          echo 'プラグインCFSを有効にし、商品ページの見出しを入力します';
        }
      ?>
    </h4>
    <p><?php echo esc_html(mb_substr(get_the_excerpt(),0,80)) . '...'; ?></p>
    <a href="<?php the_permalink(); ?>" class="c-button--archive p-stretched--link">詳しく見る</a>
  </div>
</section>