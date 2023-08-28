<?php get_header(); ?>
<main class="p-main--flex">
  <?php if( have_posts() ) : ?>
    <?php  
      while( have_posts() ) : 
      the_post();
    ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class('p-article-layout p-single--layout'); ?>>
      <h2>
        <?php
          $post_title = get_the_title();
          if (!empty($post_title)) {
            echo esc_html($post_title);
          } else {
            echo '投稿のタイトルが表示されます';
          }
        ?>
      </h2>
      <div class="p-post--content--wrapper">
        <?php the_content(); ?>
      </div>

      <a id="c-button--sp" href="<?php echo home_url('category/media') ; ?>" class="c-button--archive margin-top100">
        <button>記事一覧</button>
      </a><!-- 記事一覧アーカイブページへ -->
    </article>
  <?php endwhile;  endif; ?>
  <div class="c-background--menu"></div><!-- メニュー展開時の背景 -->
</main>
<?php get_footer(); ?>

