<?php
if (is_singular('kisyuinformation')) {
    // カスタム投稿タイプ用のヘッダーを表示
    get_template_part('custom-header');
} else {
    // 通常のヘッダーを表示
    get_header();
}
?>
<main class="p-main--flex">
  <article>
    <?php if( have_posts() ) : ?>
    <?php  
      while( have_posts() ) : 
        the_post();
    ?>
      <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
      <section class="p-kisyuinfo--wrapper">
        <h2 class="p-title--home  show-underline">機種情報</h2>
        <h3>
          <?php
            $post_title = get_the_title();
            if (!empty($post_title)) {
              echo esc_html($post_title);
            } else {
              echo '投稿のタイトルが表示されます';
            }
          ?>
          <div class="p-term--container">
            <?php 
              the_terms(get_the_ID(), 'recommendation');
              the_terms(get_the_ID(), 'yugisyu');
              the_terms(get_the_ID(), 'specifications');
              the_terms(get_the_ID(), 'style'); 
            ?>
          </div>
        </h3>
        <?php the_content(); ?> 
        <?php include_once(ABSPATH . 'wp-admin/includes/plugin.php'); ?>
        <div class="p-kisyuinfo--layout">
          <div class="c-kisyuinfo--item--place">
            <p class="c-kisyuinfo--label">設置台番号</p>
            <p>
              <?php 
                if (is_plugin_active('custom-field-suite/cfs.php')) {
                  $dai_number = CFS()->get('dai_number');
                  if(!empty($dai_number)) {
                      echo esc_html($dai_number);
                    } else { 
                      echo '設置場所の番号を入力します';
                    } 
                }else{
                  echo 'プラグインCFSを有効化してください';
                }
              ?><!-- 遊技台番号 -->
            </p>
          </div>
          <ul class="p-kisyuinfo--container">
            <li class="p-kisyuinfo">
              <ul class="p-kisyuinfo--left">
                <li class="c-kisyuinfo--item">
                  <p>遊技種</p>
                  <p>
                    <?php 
                      if (is_plugin_active('custom-field-suite/cfs.php')) {
                        $yugisyu = CFS()->get('yugisyu');
                        if(!empty($yugisyu)) {
                            echo esc_html($yugisyu);
                          } else { 
                            echo '遊技種を入力します';
                          } 
                      }else{
                        echo 'プラグインCFSを有効化してください';
                      }
                    ?><!-- 遊技種 -->
                  </p>
                </li><!-- 遊技種 -->
                <li class="c-kisyuinfo--item">
                  <p>タイプ</p>
                  <p>
                    <?php 
                      if (is_plugin_active('custom-field-suite/cfs.php')) {
                        $spec = CFS()->get('spec');
                        if(!empty($spec)) {
                            echo esc_html($spec);
                          } else { 
                            echo 'タイプを入力します';
                          } 
                      }else{
                        echo 'プラグインCFSを有効化してください';
                      }
                    ?><!-- タイプ -->
                  </p>
                </li><!-- タイプ -->
                <li class="c-kisyuinfo--item">
                  <p>導入日</p>
                  <p>
                    <?php 
                      if (is_plugin_active('custom-field-suite/cfs.php')) {
                        $arrival = CFS()->get('arrival');
                        if(!empty($arrival)) {
                            echo esc_html($arrival);
                          } else { 
                            echo '導入日を入力します';
                          } 
                      }else{
                        echo 'プラグインCFSを有効化してください';
                      }
                    ?>
                  </p>
                </li><!-- 導入日 -->
              </ul>
            </li>
            <li class="p-kisyuinfo">
              <ul class="p-kisyuinfo--right">
                <?php 
                  if (is_plugin_active('custom-field-suite/cfs.php')) {
                    // カスタムフィールドを取得
                    $probability = CFS()->get('probability');
                    $rush = CFS()->get('rush');
                    $continu = CFS()->get('continu');
                    $zyunzou = CFS()->get('zyunzou');
                    $limit = CFS()->get('limit');
                    
                    // 各カスタムフィールドが空欄でないかチェックしてから表示
                    if(!empty($probability)) {
                      echo '<li class="c-kisyuinfo--item">';
                      echo '<p>大当り確率</p>';
                      echo '<p>' . esc_html($probability) . '</p>';
                      echo '</li>';
                    }
                    
                    if(!empty($rush)) {
                      echo '<li class="c-kisyuinfo--item">';
                      echo '<p>RUSH突入率</p>';
                      echo '<p>' . esc_html($rush) . '</p>';
                      echo '</li>';
                    }
                    
                    if(!empty($continu)) {
                      echo '<li class="c-kisyuinfo--item">';
                      echo '<p>RUSH継続率</p>';
                      echo '<p>' . esc_html($continu) . '</p>';
                      echo '</li>';
                    }
                    
                    if(!empty($zyunzou)) {
                      echo '<li class="c-kisyuinfo--item">';
                      echo '<p>純増枚数</p>';
                      echo '<p>' . esc_html($zyunzou) . '</p>';
                      echo '</li>';
                    }
                    
                    if(!empty($limit)) {
                      echo '<li class="c-kisyuinfo--item">';
                      echo '<p>天井</p>';
                      echo '<p>' . esc_html($limit) . '</p>';
                      echo '</li>';
                    }
                  } else {
                    echo '<li class="c-kisyuinfo--item">';
                    echo '<p>プラグインCFSを有効化してください</p>';
                    echo '</li>';
                  }
                ?>
              </ul>
            </li>
          </ul>
        </div>
      </section>
    <?php endwhile; endif; ?><!-- ループ終了 -->
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
} else {
    // 通常のヘッダーを表示
    get_footer();
}
?>

