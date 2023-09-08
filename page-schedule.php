<?php get_header(); ?>
<main class="p-main--flex">
  <?php if( have_posts() ) : ?>
    <?php  
      while( have_posts() ) : 
      the_post();
    ?>
    <article id="post-<?php the_ID(); ?>" class="p-article-layout p-article--page p-article-layout--page p-article-layout--page--schedule" <?php post_class(); ?>>
      <?php the_content(); ?>
      <ui class="c-example">
        <li class="c-tenkyu">店休日</li>
        <li class="c-sinsou">新台入替</li>
        <li class="c-normal">通常営業</li>
      </ui>
    </article>
  <?php endwhile;  endif; ?>

  <h2 class="p-title--home size24">平方夢らんどニュース</h2>
  <?php
    // ターム 'hirayume-news' のカスタム投稿を取得
    $args = array(
      'post_type' => 'hirayume-news', // カスタム投稿タイプ名
      'posts_per_page' => -1, // すべての投稿を取得
    );
    $query = new WP_Query($args);

    if ($query->have_posts()) :
    while ($query->have_posts()) : $query->the_post();
    $post_date = strtotime(get_the_date('Y-m-d'));
    $two_weeks_ago = strtotime('-2 weeks');

    // 投稿日から2週間以内の投稿を表示
    if ($post_date >= $two_weeks_ago) :
  ?>
  <section class="p-hirayume-news--container">
    <h3>
      <?php the_title(); ?>
    </h3>
    <?php the_content(); ?>
  </section>
  <?php
    endif;
    endwhile;
    wp_reset_postdata(); // カスタムクエリをリセット
    endif;
  ?>

  <h2 class="p-title--home size24">おすすめ機種</h2>
  <section class="p-recommendation--wrapper">
      <!-- <h3>当店のオススメ</h3> -->
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

  <a id="c-button--sp" href="<?php echo home_url('/kisyuinformation') ; ?>" class="c-button--kisyuinfo">
    <button>平方夢らんどの新機種情報へ</button>
  </a><!-- 新機種情報へボタン -->
  <div class="c-background--menu"></div><!-- メニュー展開時の背景 -->
</main>
<?php
  if (is_singular('kisyuinformation')) {
      // カスタム投稿タイプ用のフッターを表示
      get_template_part('custom-footer');
  }
  if (is_page('schedule')) {
      // 固定ページscheduleでもカスタムフッターを表示
      get_template_part('custom-footer');
  } else {
      // 通常のヘッダーを表示
      get_footer();
  }
?>

