<?php get_header(); ?>
<main class="p-main--flex--archive archive-margin">
  <h2>投稿一覧</h2>
  <div class="center">
    <div class="p-archive--wrapper">
      <!-- メインループ開始 -->
      <?php
        if (have_posts()) : 
          while (have_posts()) : the_post();
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
        <?php endwhile; ?>
      <?php endif; ?><!-- メインループ終了 -->
    </div>
  </div>
  <nav class="p-navigation">
    <?php if (function_exists('wp_pagenavi')) {wp_pagenavi();} ?>
  </nav>
  <nav class="p-navigation--sp">
    <P><?php previous_posts_link('<< 前へ'); ?></P>
    <P><?php next_posts_link('次へ >>'); ?></P>
  </nav>
  
  <a id="c-button--sp" href="<?php echo home_url() ; ?>" class="c-button--archive">
    <button>トップページ</button>
  </a><!-- トップページへ戻るボタン -->
  <div class="c-background--menu"></div><!-- メニュー展開時の背景 -->
</main>
<?php get_footer(); ?>

