<?php get_header(); ?>
<main class="p-main--flex--archive">
  <h2>投稿一覧</h2>
  <div class="center">
    <div class="p-archive--wrapper">
      <!-- メインループ開始 -->
      <?php
        query_posts(
        Array(
          'category_name' => 'media',/* メディア */
          'post_type' => 'post',
          'orderby' => 'date',
          'order' => 'DESC',
          'posts_per_page' => '5'
          )
        );
        if (have_posts()) : while (have_posts()) : the_post();
      ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class('p-article-layout p-media-archive--layout'); ?>>
          <div class="p-media--content--wrapper">
            <div class="c-image--container">
              <?php if (has_post_thumbnail()) : ?><!-- アイキャッチがあれば表示する条件分岐 -->
                <?php the_post_thumbnail('archive_eyecatch'); ?>
                <?php else: ?><!-- アイキャッチ画像が無ければ指定したファイル画像を表示 -->
                  <img src="<?php echo esc_url(get_template_directory_uri()); ?>/image/noimage.jpg" alt="" width="" height="" load="lazy">
              <?php endif; ?>
            </div><!-- アイキャッチ画像 -->
            <div class="c-media--content--container">
              <h3>
                <?php echo the_title(); ?>
              </h3>
              <?php echo the_content(); ?>
            </div>
          </div>
          <a href="<?php echo the_permalink() ; ?>" id="c-button--info" class="c-button--info">
            <button>もっと見る</button>
          </a>
        </article>
      <?php endwhile; endif; wp_reset_query(); ?><!-- メインループ終了 -->
    </div>
  </div>
  <a id="c-button--sp" href="<?php echo home_url() ; ?>" class="c-button--archive">
    <button>トップページ</button>
  </a><!-- トップページへ戻るボタン -->
  <div class="c-background--menu"></div><!-- メニュー展開時の背景 -->
</main>
<?php get_footer(); ?>

