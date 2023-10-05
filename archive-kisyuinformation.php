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
        <?php get_template_part( 'template-parts/kisyuinfo', 'recommend' ); ?>
      <?php endwhile; wp_reset_postdata(); endif; ?><!-- サブループ終了 -->
    </section><!-- 当店のオススメ　セクション -->
    <section class="p-newmachine--wrapper">
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
        <?php 
          $post_date = strtotime(get_the_date('Y-m-d')); 
          $two_weeks_ago = strtotime('-2 weeks'); 
          if ($post_date >= $two_weeks_ago) : ?>
          <div class="c-new">
            <p>NEW</p>
          </div>
        <?php endif; ?><!-- 投稿から2週間のみNEWマークを表示 -->
        <?php 
          $two_month_ago = strtotime('-2 month'); // ２ヶ月前のUNIXタイムスタンプを取得
          if ($post_date >= $two_month_ago) : ?>
          <?php get_template_part( 'template-parts/kisyuinfo', 'newmachine' ); ?>
        <?php endif; ?><!-- 投稿から2ヶ月間のみ投稿を表示 -->
      <?php endwhile; wp_reset_postdata(); endif; ?><!-- サブループ終了 -->
    </section><!-- 最新機種セクション -->
    <a id="c-button--sp" href="<?php echo home_url('/schedule') ; ?>" class="c-button--kisyuinfo">
      <button>平方夢らんどの営業予定へ</button>
    </a><!-- 営業予定へボタン -->
    <a id="c-button--sp" href="<?php echo home_url('/floormap') ; ?>" class="c-button--kisyuinfo">
      <button>フロアマップへ</button>
    </a><!-- フロアマップへボタン -->
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

