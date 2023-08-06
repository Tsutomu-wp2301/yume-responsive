<!-- 記事のタイトルを表示するテンプレート -->
<div class="p-post--list--wrapper">
  <span>
    <?php
      $d_year = get_the_time('Y');
      $d_month = get_the_time('m');
      $d_day = get_the_time('d');
      $d_youbi = get_the_time('D');
      echo $d_year."年".$d_month."月".$d_day."日(".$d_youbi.")";
    ?>
  </span><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
</div>