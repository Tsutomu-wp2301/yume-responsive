<?php get_header(); ?>
  <main class="p-main--flex">
    <article class="p-article-layout p-article-layout--frontpage">
      <section class="p-tenkyu">
        <div class="p-h2--flex">
          <h2 class="p-title--home">営 業 情 報</h2>
        </div>
        <ul class="content">
        <?php /* サブループ開始 */
          $tenkyu_args = array(
            'post_type'       => 'post',  /* 出力する投稿タイプ */
            'posts_per_page'  => '2',  /* 表示数 */
            'category_name'   =>'tenkyu','',  /* categoryのスラッグ*/
            'order'           =>'DESC',  /* 昇順はASC、降順はDESC */
            'orderby'         =>'date',  /* 並び替えの基準 */
            'paged'           => get_query_var('paged') // ページネーションのために追加
          );
          $tenkyu_query = new WP_Query($tenkyu_args);
          if($tenkyu_query->have_posts()) : 
        ?>
        <?php while($tenkyu_query->have_posts()) :
          $tenkyu_query->the_post();
        ?>
          <li>
            <div class="p-tenkyu--honbun">
              <?php the_content(); ?>
            </div>
          </li>
          <?php endwhile; wp_reset_postdata(); endif; ?><!-- サブループ終了 -->
        </ul>
      </section><!-- 営業情報セクション -->
      <section>
        <ul class="p-eyecatch--container">
          <li>
            <img class="c-eyecatch" src="<?php echo get_template_directory_uri(); ?>/image/blogImage1.png" alt="ブログ" width="">
          </li>
          <h2>スタッフブログ</h2>
          <li>
            <img class="c-eyecatch" src="<?php echo get_template_directory_uri(); ?>/image/jobImage.png" alt="採用情報" width="">
          </li>
          <h2>夢らんどの採用情報</h2>
        </ul>

      </section><!-- 求人情報・ブログへのリンク -->
      <section>
        <div class="p-h2--flex">
          <h2 class= "p-title--home">メディア掲載情報</h2>
        </div>
        <?php /* サブループ開始 */
          $media_args = array(
            'post_type'       => 'post',  /* 出力する投稿タイプ */
            'posts_per_page'  => '6',  /* 表示数 */
            'category_name'   =>'media','',  /* categoryのスラッグ*/
            'order'           =>'DESC',  /* 昇順はASC、降順はDESC */
            'orderby'         =>'date',  /* 並び替えの基準 */
            'paged'           => get_query_var('paged') // ページネーションのために追加
          );
          $media_query = new WP_Query($media_args);
          if($media_query->have_posts()) : 
        ?>
        <?php while($media_query->have_posts()) :
          $media_query->the_post();
        ?>
          <?php get_template_part('template-parts/media','postsp')?><!-- sp用テンプレート -->
          <?php get_template_part('template-parts/media','posttab')?><!-- tab/pc用テンプレート -->
        <?php endwhile; wp_reset_postdata(); endif; ?><!-- サブループ終了 -->
      </section><!-- メディア掲載情報セクション -->
      <section class="p-media-list--wrapper">
        <div class="p-media-list">
          <ul class="p-media-list__tab">
            <li id="media-tab--all">すべて</li>
            <li id="media-tab--super">スーパー</li>
            <li id="media-tab--kasukabe">春日部</li>
            <li id="media-tab--hirakata">平　方</li>
            <li id="media-tab--uchimaki">内　牧</li>
          </ul>
          <ul class="p-media-list__content">
            <li id="media-list--all" class="hide select">
              <?php /* サブループ開始 */
                $media_args = array(
                  'post_type'       => 'post',  /* 出力する投稿タイプ */
                  'posts_per_page'  => '5',  /* 表示数 */
                  'category_name'   =>'media','',  /* categoryのスラッグ*/
                  'order'           =>'DESC',  /* 昇順はASC、降順はDESC */
                  'orderby'         =>'date',  /* 並び替えの基準 */
                );
                $media_query = new WP_Query($media_args);
                if($media_query->have_posts()) : 
              ?>
              <?php while($media_query->have_posts()) :
                $media_query->the_post();
              ?>
                <?php get_template_part('template-parts/media','posttitle')?>
              <?php endwhile; wp_reset_postdata(); endif; ?><!-- サブループ終了 -->
            </li><!--すべて-->
            <li id="media-list--super" class="hide">
              <?php /* サブループ開始 */
                $super_args = array(
                  'post_type'       => 'post',  /* 出力する投稿タイプ */
                  'posts_per_page'  => '5',  /* 表示数 */
                  'category_name'   =>'super','',  /* categoryのスラッグ*/
                  'order'           =>'DESC',  /* 昇順はASC、降順はDESC */
                  'orderby'         =>'date',  /* 並び替えの基準 */
                );
                $super_query = new WP_Query($super_args);
                if($super_query->have_posts()) : 
              ?>
              <?php while($super_query->have_posts()) :
                $super_query->the_post();
              ?>
                <?php get_template_part('template-parts/media','posttitle')?>
              <?php endwhile; wp_reset_postdata(); endif; ?><!-- サブループ終了 -->
            </li><!--スーパー-->
            <li id="media-list--kasukabe" class="hide">
              <?php /* サブループ開始 */
                $kasukabe_args = array(
                  'post_type'       => 'post',  /* 出力する投稿タイプ */
                  'posts_per_page'  => '5',  /* 表示数 */
                  'category_name'   =>'kasukabe','',  /* categoryのスラッグ*/
                  'order'           =>'DESC',  /* 昇順はASC、降順はDESC */
                  'orderby'         =>'date',  /* 並び替えの基準 */
                );
                $kasukabe_query = new WP_Query($kasukabe_args);
                if($kasukabe_query->have_posts()) : 
              ?>
              <?php while($kasukabe_query->have_posts()) :
                $kasukabe_query->the_post();
              ?>
                <?php get_template_part('template-parts/media','posttitle')?>
              <?php endwhile; wp_reset_postdata(); endif; ?><!-- サブループ終了 -->
            </li><!--かすかべ-->
            <li id="media-list--hirakata" class="hide">
              <?php /* サブループ開始 */
                $hirakata_args = array(
                  'post_type'       => 'post',  /* 出力する投稿タイプ */
                  'posts_per_page'  => '5',  /* 表示数 */
                  'category_name'   =>'hirakata','',  /* categoryのスラッグ*/
                  'order'           =>'DESC',  /* 昇順はASC、降順はDESC */
                  'orderby'         =>'date',  /* 並び替えの基準 */
                );
                $hirakata_query = new WP_Query($hirakata_args);
                if($hirakata_query->have_posts()) : 
              ?>
              <?php while($hirakata_query->have_posts()) :
                  $hirakata_query->the_post();
              ?>
                <?php get_template_part('template-parts/media','posttitle')?>
              <?php endwhile; wp_reset_postdata(); endif; ?><!-- サブループ終了 -->
            </li><!--平方-->
            <li id="media-list--uchimaki" class="hide">
              <?php /* サブループ開始 */
                $uchimaki_args = array(
                  'post_type'       => 'post',  /* 出力する投稿タイプ */
                  'posts_per_page'  => '5',  /* 表示数 */
                  'category_name'   =>'uchimaki','',  /* categoryのスラッグ*/
                  'order'           =>'DESC',  /* 昇順はASC、降順はDESC */
                  'orderby'         =>'date',  /* 並び替えの基準 */
                );
                $uchimaki_query = new WP_Query($uchimaki_args);
                if($uchimaki_query->have_posts()) : 
              ?>
              <?php while($uchimaki_query->have_posts()) :
                $uchimaki_query->the_post();
              ?>
                <?php get_template_part('template-parts/media','posttitle')?>
              <?php endwhile; wp_reset_postdata(); endif; ?><!-- サブループ終了 -->
            </li><!--内牧-->
          </ul>
          <a id="c-button--sp" href="<?php echo home_url() ; ?>/category/media/" class="c-button--archive">
            <button>メディア情報一覧</button>
          </a><!-- メディアボタン -->
        </div>
      </section><!-- メディア情報リストのセクション -->
      <section>
        <div class="p-h2--flex">
          <h2 class= "p-title--home">夢らんどニュース</h2>
        </div>
        <ul class="p-news--content">
          <?php /* サブループ開始 */
            $news_args = array(
              'post_type'       => 'post',  /* 出力する投稿タイプ */
              'posts_per_page'  => '3',  /* 表示数 */
              'category_name'   =>'news','',  /* categoryのスラッグ*/
              'order'           =>'DESC',  /* 昇順はASC、降順はDESC */
              'orderby'         =>'date',  /* 並び替えの基準 */
              'date_query'      => array(  /* 日付クエリを追加 */
                array(
                    'after' => date('Y-m-d', strtotime('-1 year')),  /* 1年前までの投稿を取得 */
                ),
              ),
            );
            $news_query = new WP_Query($news_args);
            if($media_query->have_posts()) : 
          ?>
          <?php while($news_query->have_posts()) :
            $news_query->the_post();
          ?>
            <li>
              <div class="time">
                <?php
                  $d_year = get_the_time('Y');
                  $d_month = get_the_time('m');
                  $d_day = get_the_time('d');
                  $d_youbi = get_the_time('D');
                  echo $d_year."年".$d_month."月".$d_day."日(".$d_youbi.")";
                ?>
              </div>
              <div class="title p-news--title">
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
              </div>
              <div class="p-news--flex clearfix">
                <a href="<?php the_permalink(); ?>">
                  <?php the_post_thumbnail(); ?>
                </a>
                <p class="p-news--text">
                  <?php echo nl2br(mb_substr(strip_tags($post-> post_content),0,130)); ?>
                </p>
              </div>
              <!-- <a id="c-button--more--sp" href="<?php the_permalink(); ?>" class="c-button--more"><button>もっと見る</button></a> --><!-- もっと見るボタン -->
            </li>
            <div class="c-news--line c-news--line--tab"></div>
          <?php endwhile; wp_reset_postdata(); endif; ?><!-- サブループ終了 -->
        </ul>
        <a id="c-button--sp" href="<?php echo home_url() ; ?>/category/news/" class="c-button--archive">
          <button>NEWS一覧</button>
        </a><!-- メディアボタン -->
      </section><!-- 夢らんどニュースのセクション -->
    </article>
    <div class="c-background--menu"></div><!-- メニュー展開時の背景 -->
  </main>
<?php get_footer(); ?>

