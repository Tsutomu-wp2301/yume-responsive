<?php get_header(); ?>
  <main class="p-main--flex">
    <article class="p-article-layout p-article-layout--frontpage">
      <section class="p-tenkyu">
        <div class="p-h2--flex">
          <h2 class="p-title--home">営 業 情 報</h2>
        </div>
        <ul class="content">
          <?php
            query_posts(
            Array(
              'category_name' => 'tenkyu',
              'post_type' => 'post',
              'orderby' => 'date',
              'order' => 'DESC',
              'posts_per_page' => '2'
              )
            );
            if (have_posts()) : while (have_posts()) : the_post();
          ?>
          <li>
            <div class="p-tenkyu--honbun">
              <?php the_content(); ?>
            </div>
          </li>
          <?php endwhile; endif; wp_reset_query(); ?>
        </ul>
      </section><!-- 営業情報セクション -->
      <section>
        <div class="p-h2--flex">
          <h2 class= "p-title--home">メディア掲載情報</h2>
        </div>
        <?php
          query_posts(
          Array(
            'category_name' => 'media',/* メディア情報 */
            'post_type' => 'post',
            'orderby' => 'date',
            'order' => 'DESC',
            'posts_per_page' => '6'
            )
          );
          if (have_posts()) : while (have_posts()) : the_post();
        ?>
        <?php get_template_part('template-parts/media','postsp')?><!-- sp用テンプレート -->
        <?php get_template_part('template-parts/media','posttab')?><!-- tab/pc用テンプレート -->
        <?php endwhile; endif; wp_reset_query(); ?>
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
              <?php
                query_posts(
                Array(
                  'category_name' => 'media',
                  'post_type' => 'post',
                  'orderby' => 'date',
                  'order' => 'DESC',
                  'posts_per_page' => '5'
                  )
                );
                if (have_posts()) : while (have_posts()) : the_post();
              ?>
              <?php get_template_part('template-parts/media','posttitle')?>
              <?php endwhile; endif; wp_reset_query(); ?>
            </li><!--すべて-->
            <li id="media-list--super" class="hide">
              <?php
                query_posts(
                Array(
                  'category_name' => 'super',
                  'post_type' => 'post',
                  'orderby' => 'date',
                  'order' => 'DESC',
                  'posts_per_page' => '5'
                  )
                );
                if (have_posts()) : while (have_posts()) : the_post();
              ?>
              <?php get_template_part('template-parts/media','posttitle')?>
              <?php endwhile; endif; wp_reset_query(); ?>
            </li><!--スーパー-->
            <li id="media-list--kasukabe" class="hide">
              <?php
                query_posts(
                Array(
                  'category_name' => 'kasukabe',
                  'post_type' => 'post',
                  'orderby' => 'date',
                  'order' => 'DESC',
                  'posts_per_page' => '5'
                  )
                );
                if (have_posts()) : while (have_posts()) : the_post();
              ?>
              <?php get_template_part('template-parts/media','posttitle')?>
              <?php endwhile; endif; wp_reset_query(); ?>
            </li><!--かすかべ-->
            <li id="media-list--hirakata" class="hide">
              <?php
                query_posts(
                Array(
                  'category_name' => 'hirakata',
                  'post_type' => 'post',
                  'orderby' => 'date',
                  'order' => 'DESC',
                  'posts_per_page' => '5'
                  )
                );
                if (have_posts()) : while (have_posts()) : the_post();
              ?>
              <?php get_template_part('template-parts/media','posttitle')?>
              <?php endwhile; endif; wp_reset_query(); ?>
            </li><!--平方-->
            <li id="media-list--uchimaki" class="hide">
              <?php
                query_posts(
                Array(
                  'category_name' => 'uchimaki',
                  'post_type' => 'post',
                  'orderby' => 'date',
                  'order' => 'DESC',
                  'posts_per_page' => '5'
                  )
                );
                if (have_posts()) : while (have_posts()) : the_post();
              ?>
              <?php get_template_part('template-parts/media','posttitle')?>
              <?php endwhile; endif; wp_reset_query(); ?>
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
          <?php
            query_posts(
            Array(
              'category_name' => 'news',/* ニュース */
              'post_type' => 'post',
              'orderby' => 'date',
              'order' => 'DESC',
              'posts_per_page' => '3'
              )
            );
            if (have_posts()) : while (have_posts()) : the_post();
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
            <a id="c-button--more--sp" href="<?php the_permalink(); ?>" class="c-button--more"><button>もっと見る</button></a><!-- もっと見るボタン -->
          </li>
          <div class="c-news--line c-news--line--tab"></div>
          <?php endwhile; endif; wp_reset_query(); ?> 
        </ul>
        <a id="c-button--sp" href="<?php echo home_url() ; ?>/category/news/" class="c-button--archive">
          <button>NEWS一覧</button>
        </a><!-- メディアボタン -->
      </section><!-- 夢らんどニュースのセクション -->
    </article>
    <div class="c-background--menu"></div><!-- メニュー展開時の背景 -->
  </main>
<?php get_footer(); ?>

