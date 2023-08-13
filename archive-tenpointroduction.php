<?php get_header(); ?>
<main class="p-main--flex--archive">
  <h2>店舗一覧</h2>
  <P>　夢らんどグループは埼玉県に4店舗、地域密着型のエンターテイメントパーラー
として展開中です。老若男女問わず幅広い世代のお客様にご支持を頂いております。
パチンコ・スロットで遊ぶなら夢らんど♪　お近くの夢らんどへGO！</p>
<div class="center">
    <div class="p-archive--wrapper">
      <?php if( have_posts() ) : ?>
        <?php  
          while( have_posts() ) : 
          the_post();
        ?>
        <?php get_template_part( 'template-parts/tenpointroduction', 'post' ); ?><!-- 店舗紹介のテンプレート -->
      <?php endwhile;  endif; ?>
    </div>
  </div>
  <a id="c-button--sp" href="<?php echo home_url() ; ?>" class="c-button--archive">
    <button>トップページ</button>
  </a><!-- トップページへ戻るボタン -->
  <a href="<?php echo esc_url(home_url('tenpointroduction')); ?>">店舗一覧</a>
  <div class="c-background--menu"></div><!-- メニュー展開時の背景 -->
</main>
<?php get_footer(); ?>

