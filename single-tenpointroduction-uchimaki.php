<?php get_header(); ?>
<main class="p-main--flex">
  <?php if( have_posts() ) : ?>
    <?php  
      while( have_posts() ) : 
      the_post();
    ?>
    <article id="post-<?php the_ID(); ?>" class="p-article-layout--singlepage p-article--page" <?php post_class(); ?>>
      <div class="p-h2--flex">
        <h2 class="p-title--home margin-top--page">
          <?php
            $post_title = get_the_title();
            if (!empty($post_title)) {
              echo esc_html($post_title);
            } else {
              echo '投稿のタイトルが表示されます';
            }
          ?>
        </h2>
      </div>
      <?php
          echo do_shortcode('[smartslider3 slider="5"]');
      ?>
      <?php include_once(ABSPATH . 'wp-admin/includes/plugin.php'); ?>
      <section class="p-tenpointroduction--wrapper--singlepage">
        <ul class="p-tenpointroduction">
          <li>
            <ul>
              <li>
                <?php 
                  if (is_plugin_active('custom-field-suite/cfs.php')) {
                    $address = CFS()->get('address');
                    if(!empty($address)) {
                        echo esc_html($address);
                      } else { 
                        echo 'かすかべ夢らんどのアドレスを入力します';
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
          </li>
          <li>
            <ul>
              <li>
                <?php 
                  if (is_plugin_active('custom-field-suite/cfs.php')) {
                    $scale = CFS()->get('scale');
                    if(!empty($scale)) {
                        echo esc_html($scale);
                      } else { 
                        echo 'かすかべ夢らんどの設置台数を入力します';
                      } 
                  }else{
                    echo 'プラグインCFSを有効化して設置台数を入力します';
                  }
                ?>
              <li><!-- 設置台数 -->
              <li class="none">
                <?php 
                  if (is_plugin_active('custom-field-suite/cfs.php')) {
                    $parking = CFS()->get('parking');
                    if(!empty($parking)) {
                        echo esc_html($parking);
                      } else { 
                        echo 'かすかべ夢らんどの駐車場台数を入力します';
                      } 
                  }else{
                    echo 'プラグインCFSを有効化して駐車場台数を入力します';
                  }
                ?>
              </li><!-- 駐車場台数 -->
            </ul>
          </li>
        </ul>
      </section>
      <?php the_content(); ?>
      <a id="c-button--sp" href="<?php echo home_url() ; ?>" class="c-button--archive margin-top100">
        <button>トップページ</button>
      </a><!-- トップページへ戻るボタン -->
    </article>
  <?php endwhile;  endif; ?>
  <div class="c-background--menu"></div><!-- メニュー展開時の背景 -->
</main>
<?php get_footer(); ?>

