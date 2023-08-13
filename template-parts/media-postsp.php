<!-- sp/tab版　メディア情報一覧用テンプレート -->
<div id="p-content--wrapper" class="p-content--flex">
  <div class="p-media--flex">
    <div class="p-date--wrapper">
      <span class="date">
        <p>
          <?php
          $d_year = get_the_time('Y');
          $d_month = get_the_time('m');
          $d_day = get_the_time('d');
          $d_youbi = get_the_time('D');
          echo $d_year."年".$d_month."月".$d_day."日(".$d_youbi.")";
          ?>
        </p>
        <span class="c-category">
          <?php
          echo get_the_category_list( ' ／ ' );
          ?>
        </span>
      </span>
    </div>
    <a href="<?php the_permalink(); ?>">
      <?php the_post_thumbnail(); ?>
    </a>
    <div class="p-content__text--flex">
      <div class="c-title">
        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
      </div>
      <div class="p-content">
        <?php echo '　'.mb_substr(strip_tags($post-> post_content),0,150)?>
      </div>
    </div>
  </div>
  <a href="<?php echo the_permalink() ; ?>" id="c-button--info" class="c-button--info"><button>もっと見る</button></a>
  <div class="c-media--line"></div>
</div>
