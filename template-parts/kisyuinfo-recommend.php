<div class="p-recommend--archive--container">
  <div class="c-recommend--kisyuinformation">
    <div class="c-kisyutitle--flex">
      <div class="c-kisyu-title">
        <p>
          <?php
            $post_title = get_the_title();
            if (!empty($post_title)) {
              echo esc_html($post_title);
            } else {
              echo '機種のタイトル';
            }
          ?>
        </p>
      </div>
      <div class="c-kisyu-number">
        <p>
          <?php include_once(ABSPATH . 'wp-admin/includes/plugin.php'); ?>
          <?php 
            if (is_plugin_active('custom-field-suite/cfs.php')) {
              $dai_number = CFS()->get('dai_number');
              if(!empty($dai_number)) {
                  echo esc_html($dai_number);
                } else { 
                  echo '遊技台番号を入力';
                } 
            }else{
              echo 'プラグインCFSを有効化してください';
            }
          ?>
        </p>
      </div>
    </div>
    <div class="kyoutai-tilt">
      <?php if (has_post_thumbnail()) : ?><!-- アイキャッチがあれば表示する条件分岐 -->
        <?php the_post_thumbnail('archive_eyecatch'); ?>
        <?php else: ?><!-- アイキャッチ画像が無ければ指定した画像を表示 -->
        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/imge/dummy-image.png" alt="" width="" height="" load="lazy">
      <?php endif; ?>
    </div>
    <div class="c-tap"></div>
    <a class="stretched-link" href="<?php the_permalink();?>"></a>
  </div>
</div>