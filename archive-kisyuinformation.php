<?php
if (is_singular('kisyuinformation')) {
    // カスタム投稿タイプ用のヘッダーを表示
    get_template_part('custom-header');
  } elseif (is_post_type_archive('kisyuinformation')) {
    // カスタム投稿タイプのアーカイブページ用のヘッダーを表示
    get_template_part('custom-header');
} else {
    // 通常のヘッダーを表示
    get_header();
}
?>
<main class="p-main--flex">
  <article class="p-kisyuinformation--archive">
    <h2 class="p-title--home  show-underline">新機種情報</h2>
    <section class="p-recommendation--wrapper">
      <h3>当店のオススメ</h3>
      <?php /* サブループ開始 */
        $kisyuinformation_args = array(
          'post_type'      => 'kisyuinformation',
          'posts_per_page' => 3,
          'order'          => 'DESC',
          'orderby'        => 'date',
          'tax_query'      => array(
              array(
                  'taxonomy' => 'recommendation', // タームが属するタクソノミー名を指定
                  'field'    => 'slug', // タームをスラッグで指定
                  'terms'    => 'recommend', // 'recommendation' タームのスラッグを指定
              ),
          ),
        );
      $kisyuinformation_query = new WP_Query($kisyuinformation_args);
      if($kisyuinformation_query->have_posts()) : 
      ?>
      <?php while($kisyuinformation_query->have_posts()) :
      $kisyuinformation_query->the_post();
      ?>
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
                          echo '機種タイトル';
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
          </div>
        </div>


      <?php endwhile; wp_reset_postdata(); endif; ?><!-- サブループ終了 -->
    </section>
    <section class="new-machine--wrapper">
      <h3>最新機種</h3>
      <?php /* サブループ開始 */
        $newmachine_args = array(
          'post_type'      => 'kisyuinformation',
          'posts_per_page' => 10,
          'order'          => 'DESC',
          'orderby'        => 'date',
          'paged'          => get_query_var('paged')
        );
      $newmachine_query = new WP_Query($newmachine_args);
      if($newmachine_query->have_posts()) : 
      ?>
      <?php while($newmachine_query->have_posts()) :
      $newmachine_query->the_post();
      ?>
      
        <?php the_content(); ?>

      <?php endwhile; wp_reset_postdata(); endif; ?><!-- サブループ終了 -->
    </section>
    <a id="c-button--sp" href="<?php echo home_url() ; ?>" class="c-button--archive">
      <button>新機種情報へ</button>
    </a><!-- トップページへ戻るボタン -->
    <a id="c-button--sp" href="https://pachiseven.jp/machines/6414#mpanel2" class="c-button--archive">
      <button>パチセブン機種情報へ</button>
    </a><!-- トップページへ戻るボタン -->
  </article>
</main>
<?php
if (is_singular('kisyuinformation')) {
    // カスタム投稿タイプ用のヘッダーを表示
    get_template_part('custom-footer');
  } elseif (is_post_type_archive('kisyuinformation')) {
    // カスタム投稿タイプのアーカイブページ用のヘッダーを表示
    get_template_part('custom-footer');
} else {
    // 通常のヘッダーを表示
    get_footer();
}
?>

