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
      <section class="p-question--yumeland">
        <h3>
          夢らんど全般に関するQ&A
        </h3>
        <ul class="p-qalist--wrapper">
          <li class="c-qalist"><p>夢らんどの社名はなんですか？</p>
            <ul class="c-qalist__inner">
              <li>「株式会社太平」です。お客様に夢を提供できる空間づくりをコンセプトに店舗展開しております。詳しくは、企業情報をご覧ください。
              </li>
            </ul>
          </li>
          <li class="c-qalist"><p>子供を連れてお店に行けますか？</p>
            <ul class="c-qalist__inner"><li>法律により禁止されています。18歳未満の方のご入場はできません。</li></ul>
          </li>
          <li class="c-qalist"><p>新店のオープン情報はありますか？</p>
            <ul class="c-qalist__inner">
              <li>予定が決まり次第、随時HPやp-worldにてご案内いたします。</li>
            </ul>
          </li>
          <!-- <li class="c-qalist"><p>店舗の詳しい情報を知りたいです。</p>
            <ul class="c-qalist__inner">
              <li>店舗一覧ページ、または以下のURLからp-worldのホームページをご確認ください。
                <a href="">スーパー夢らんど</a>
                <a href="">かすかべ夢らんど</a>
                <a href="">内牧夢らんど</a>
                <a href="">平方夢らんど</a>
              </li>
            </ul>
          </li> -->
          <li class="c-qalist"><p>開店前に並ぶにはどうしたらいい？</p>
            <ul class="c-qalist__inner"><li>店舗情報からアクセス方法をご覧ください。</li></ul>
          </li>
          <li class="c-qalist"><p>店舗へのアクセス方法は？</p>
            <ul class="c-qalist__inner"><li>9：45より店舗正面入口にて入場順番券をお配りしております。</li></ul>
          </li>
          <li class="c-qalist"><p>開店・閉店時間はお店ごとに違うの？</p>
            <ul class="c-qalist__inner">
              <li>店舗情報から営業時間をご確認ください。</li>
            </ul>
          </li>
          <li class="c-qalist"><p>店休日、時間差の開店はあるの？</p>
            <ul class="c-qalist__inner"><li>店休情報をご覧ください。</li></ul>
          </li>
        </ul>
      </section>
      <section class="p-question--play">
        <h3>
          遊技全般に関するQ&A
        </h3>
        <ul class="p-qalist--wrapper">
          <li class="c-qalist"><p>遊技中に食事に行っても大丈夫？</p>
            <ul class="c-qalist__inner">
              <li>40分間の休憩をとることができます。<br>遊技台上部の呼び出しボタンにてスタッフをお呼びください。</li>
            </ul>
          </li>
          <li class="c-qalist"><p>貯玉って何？</p>
            <ul class="c-qalist__inner">
              <li>店舗ごとに発行している会員カードに出玉を預けることができます。<br>翌日以降、お客様のご都合に合わせて景品交換が可能です。</li>
            </ul>
          </li>
          <li class="c-qalist"><p>１円と４円パチンコの遊技台に何か違いがありますか？</p>
            <ul class="c-qalist__inner">
              <li>遊技台に違いはありません。１玉あたりの貸し出し料金が違います。</li>
            </ul>
          </li>
          <li class="c-qalist"><p>飲酒しながら遊技しても大丈夫ですか？</p>
            <ul class="c-qalist__inner">
              <li>お断りさせていただいております。</li>
            </ul>
          </li>
          <li class="c-qalist"><p>パチンコやスロットのやり方がわからないのですが・・</p>
            <ul class="c-qalist__inner">
              <li>遊技方法はもちろん、ご不明な点はお気軽にスタッフへお尋ねください。<br>スタッフが丁寧にご案内いたします。</li>
            </ul>
          </li>
          <li class="c-qalist"><p>店内で電子タバコは吸えますか？</p>
            <ul class="c-qalist__inner">
              <li>夢らんどグループでは、紙タバコ・電子タバコ共に全館禁煙とさせていただいております。<br>所定の喫煙スペースをご利用ください。</li>
            </ul>
          </li>
          <li class="c-qalist"><p>遊技台の音量が大きいのですが・・</p>
            <ul class="c-qalist__inner">
              <li>音量を調節させていただきます。<br>お気軽にスタッフへお声がけください。</li>
            </ul>
          </li>
          <li class="c-qalist"><p>ホール側でパチンコの大当りを制御できますか？</p>
            <ul class="c-qalist__inner">
              <li>違法行為にあたりますので、大当りや出玉に関する一切の制御はできません。</li>
            </ul>
          </li>
          <li class="c-qalist"><p>車椅子での遊技はできますか？</p>
            <ul class="c-qalist__inner">
              <li>各遊技台の椅子の取り外しを行います。<br>お気軽にスタッフへお声がけください。</li>
            </ul>
          </li>
          <li class="c-qalist"><p>精算し忘れたカードは後日精算できますか？</p>
            <ul class="c-qalist__inner">
              <li>精算は当日に限り有効です。<br>翌日以降はご遊技のみ可能です。</li>
            </ul>
          </li>
        </ul>
      </section>
    </article>
  <?php endwhile;  endif; ?>
  <a id="c-button--sp" href="<?php echo home_url() ; ?>" class="c-button--archive">
    <button>トップページ</button>
  </a><!-- トップページへ戻るボタン -->
    
  <div class="c-background--menu"></div><!-- メニュー展開時の背景 -->
</main>
<?php get_footer(); ?>

