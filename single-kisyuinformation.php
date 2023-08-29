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
<?php /* サブループ開始 */
  $kisyuinformation_args = array(
      'post_type'       => 'kisyuinformation',  /* カスタム投稿タイプのスラッグ */
      'posts_per_page'  => '10',  /* 表示数 */
      'category_name'   =>'','',  /* カテゴリーのスラッグ名 */
      'order'           =>'DESC',  /* 昇順はASC、降順はDESC */
      'orderby'         =>'date',  /* 何を基準に並び替えるか */
      'paged'           => get_query_var('paged') // ページネーションのために追加
  );
  $kisyuinformation_query = new WP_Query($kisyuinformation_args);
  if($kisyuinformation_query->have_posts()) : 
  ?>
  <?php while($kisyuinformation_query->have_posts()) :
  $kisyuinformation_query->the_post();
  ?>
  <?php
    $post_title = get_the_title();
    if (!empty($post_title)) {
      echo esc_html($post_title);
    } else {
      echo '投稿のタイトルが表示されます';
    }
  ?>
  <?php the_content(); ?> 
<?php endwhile; wp_reset_postdata(); endif; ?><!-- サブループ終了 -->
 
  <a id="c-button--sp" href="<?php echo home_url() ; ?>" class="c-button--archive">
    <button>新機種情報へ</button>
  </a><!-- トップページへ戻るボタン -->
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

