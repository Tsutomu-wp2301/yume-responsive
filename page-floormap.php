<?php
if (is_singular('kisyuinformation')) {
    // カスタム投稿タイプ用のヘッダーを表示
    get_template_part('custom-header');
  } elseif (is_page('floormap')) {
    // カスタム投稿タイプのアーカイブページ用のヘッダーを表示
    get_template_part('custom-header');
} else {
    // 通常のヘッダーを表示
    get_header();
}
?>
<main class="p-main--flex">
  <?php if( have_posts() ) : ?>
    <?php  
      while( have_posts() ) : 
      the_post();
    ?>
    <h2 class="p-title--home  show-underline">
      <?php the_title(); ?>
    </h2>
      <?php the_content(); ?>
  <?php endwhile;  endif; ?>
  <h2 class="p-title--home  show-underline">新機種情報</h2>
  <?php /* サブループ開始 */
  $kisyuinfo_args = array(
      'post_type'       => 'kisyuinformation',  /* カスタム投稿タイプはスラッグを記載*/
      'posts_per_page'  => '10',  /* 表示数 */
      'category_name'   =>'',  /* カテゴリーのスラッグ名 */
      'order'           =>'DESC',  /* 昇順はASC、降順はDESC */
      'orderby'         =>'date',  /* 何を基準に並び替えるか */
      'paged'           => get_query_var('paged') // ページネーションのために追加
  );
  $kisyuinfo_query = new WP_Query($kisyuinfo_args);
  if($kisyuinfo_query->have_posts()) : 
  ?>
  <?php while($kisyuinfo_query->have_posts()) :
  $kisyuinfo_query->the_post();
  ?>
    <div class="vw">
      <?php 
      $post_date = strtotime(get_the_date('Y-m-d')); 
      $two_weeks_ago = strtotime('-2 weeks'); 
      if ($post_date >= $two_weeks_ago) : ?>
        <div class="c-new">
          <p>NEW</p>
        </div>
      <?php endif; ?><!-- 投稿から2週間のみNEWマークを表示 -->
    </div>
    <?php 
    $post_date = strtotime(get_the_date('Y-m-d')); 
    $two_month_ago = strtotime('-2 month'); 
    if ($post_date >= $two_month_ago) : ?>
      <?php get_template_part( 'template-parts/kisyuinfo', 'newmachine' ); ?>
    <?php endif; ?><!-- 投稿から2ヶ月間のみ投稿を表示 -->
  <?php endwhile; wp_reset_postdata(); endif; ?><!-- サブループ終了 -->

  <a id="c-button--sp" href="<?php echo home_url('/kisyuinformation') ; ?>" class="c-button--kisyuinfo">
    <button>平方夢らんどの新機種情報へ</button>
  </a><!-- 新機種情報へボタン -->
  <a id="c-button--sp" href="<?php echo home_url('/schedule') ; ?>" class="c-button--kisyuinfo">
    <button>平方夢らんどの営業予定へ</button>
  </a><!-- 新機種情報へボタン -->
  <div class="c-background--menu"></div><!-- メニュー展開時の背景 -->
</main>
<?php
  if (is_singular('kisyuinformation')) {
      // カスタム投稿タイプ用のフッターを表示
      get_template_part('custom-footer');
  }
  if (is_page('floormap')) {
      // 固定ページfloormapでもカスタムフッターを表示
      get_template_part('custom-footer');
  } else {
      // 通常のヘッダーを表示
      get_footer();
  }
?>

