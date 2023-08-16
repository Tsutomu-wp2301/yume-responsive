<?php get_header(); ?>
<main class="p-main--flex">
  <?php if( have_posts() ) : ?>
    <?php  
      while( have_posts() ) : 
      the_post();
    ?>
    <article id="post-<?php the_ID(); ?>" class="p-article-layout p-article--page p-article-layout--page" <?php post_class(); ?>>
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
      <?php the_content(); ?>
    </article>
  <?php endwhile;  endif; ?>
  <div class="c-background--menu"></div><!-- メニュー展開時の背景 -->
</main>
<?php get_footer(); ?>

