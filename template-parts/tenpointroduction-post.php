<article id="post-<?php the_ID(); ?>" class="p-article-layout p-article--archive" <?php post_class(); ?>>
  <?php include_once(ABSPATH . 'wp-admin/includes/plugin.php'); ?>
  <section class="p-tenpointroduction--wrapper">
    <a href="<?php the_permalink(); ?>">
      <div class="c-img--container">
        <?php if (has_post_thumbnail()) : ?><!-- アイキャッチ条件分岐 -->
          <?php the_post_thumbnail('archive_eyecatch'); ?>
          <?php else: ?><!-- アイキャッチ画像が無ければ指定したファイル画像を表示 -->
          <img src="<?php echo esc_url(get_template_directory_uri()); ?>/image/slide143.jpg" alt="" width="200" height="150" load="lazy">
        <?php endif; ?><!-- アイキャッチ表示 -->
      </div>
    </a>
    <div class="left">
      <h2>
        <?php the_title(); ?>
      </h2>
      <ul>
        <li>
          <?php 
            if (is_plugin_active('custom-field-suite/cfs.php')) {
              $address = CFS()->get('address');
              if(!empty($address)) {
                  echo esc_html($address);
                } else { 
                  echo 'アドレスを入力します';
                } 
            }else{
              echo 'プラグインCFSを有効化して住所を入力します';
            }
          ?>
        </li><!-- 住所 -->
        <li>
          <?php 
            if (is_plugin_active('custom-field-suite/cfs.php')) {
              $telephone = CFS()->get('telephone');
              if(!empty($telephone)) {
                  echo esc_html($telephone);
                } else { 
                  echo 'かすかべ夢らんどの電話番号を入力します';
                } 
            }else{
              echo 'プラグインCFSを有効化して電話番号を入力します';
            }
          ?>
        </li><!-- 電話 -->
        <li>
          <?php 
            if (is_plugin_active('custom-field-suite/cfs.php')) {
              $time = CFS()->get('time');
              if(!empty($time)) {
                  echo esc_html($time);
                } else { 
                  echo 'かすかべ夢らんどの営業時間を入力します';
                } 
            }else{
              echo 'プラグインCFSを有効化して営業時間を入力します';
            }
          ?>
        </li><!-- 営業時間 -->
      </ul>
    </div>
  </section>
</article>