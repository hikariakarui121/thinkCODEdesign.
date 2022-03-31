<?php get_header(); ?>
<section id="top" class="top">
  <div class="top__inner h-inner">
    <img class="top__visual" src="<?php echo get_template_directory_uri();?>/img/top/main-visual.jpg" alt="">
    <div class="top__container">
      <div class="top__title">News</div>
      <ul class="top__items">
      <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <li class="top__item"><a>
          <div class="top__date"><?php echo get_the_date('Y.m.d') ;?></div>
          <div class="top__discription"><?php the_title(); ?></div>
        </a></li>
        <?php endwhile; ?>
        <?php else: ?>
          <p>記事が見つかりません</p>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</section>
<section id="message" class="message">
  <div class="message__inner inner animationTarget">
    <div class="message__title textAnimation">Message</div>
    <div class="message__container animationTarget ">
      <div class="message__text">
        <p>理想を叶える、誰かの架け橋に！</p>
        <p>ホームページは第１印象、誰かのきっかけになるサイトだから、デザイン・利用しやすさ・サイトへの思いを載せて、しっかり届くサイトに仕上げたいと思っています。</p>
        <p>だから、デザイン・UI/UX ・コンテンツのすべてに
          こだわったサイトをご提供します。</p>
      </div>
      <div class="message__image">
        <img src="<?php echo get_template_directory_uri();?>/img/top/icon-hand.png" alt="">
      </div>
    </div>
  </div>
</section>
<section id="service" class="service">
  <div class="service__inner inner animationTarget">
    <h2 class="service__title title textAnimation">Service</h2>
    <div class="service__items cards service-container">
      <div class="cards__item card">
        <img class="card__img" src="<?php echo get_template_directory_uri();?>/img/top/corporate.jpg" alt="コーポレートサイト">
        <div class="card__itemTitle">コーポレートサイト</div>
      </div>
      <div class="cards__item card">
        <img class="card__img" src="<?php echo get_template_directory_uri();?>/img/top/ec.jpg" alt="ECサイト">
        <div class="card__itemTitle">ECサイト</div>
      </div>
      <div class="cards__item card">
        <img class="card__img" src="<?php echo get_template_directory_uri();?>/img/top/landing.jpg" alt="LP">
        <div class="card__itemTitle">ランディングページ</div>
      </div>
      <div class="cards__item card smartphone">
        <img class="card__img" src="<?php echo get_template_directory_uri();?>/img/top/sns.jpg" alt="SNS">
        <div class="card__itemTitle">SNS・Line構築</div>
      </div>
    </div>
    <div class="service__paragraph">
      <p>サイト制作に加え、SEO対策・MEO対策なども対応しています。</p>
      <p>また、LineのLstepを使った来店促進やSNS運用なども対応可能です。</p>
    </div>
    <div class="service__view view">
      <a href="">View more</a>
    </div>
  </div>
</section>
<section id="works" class="works">
  <div class="works__inner inner animationTarget">
    <h2 class="works__title title textAnimation">Works</h2>
    <div class="works__items cards">
      <?php 
        if( is_mobile() ){
          $num = 4;
        } else {
          $num = 3;
        }
        $args =array(
          'post_type'=>'works',
          'posts_per_page'=> $num,
          'order' => 'ASC'
        );
        $the_query =new WP_Query($args);if($the_query->have_posts()):?>
        <?php while($the_query->have_posts()):$the_query->the_post(); ?>
          <div class="cards__item card">
            <a>
              <div class="card__image">
                <?php if(has_post_thumbnail()): ?>
                  <?php echo get_the_post_thumbnail( $post_id, 'large', array( 'class' => 'card__img card__img--zoom') ); ?>
                <?php  else: ?>
                  <img class="card__img card__img--zoom" src="<?php echo get_template_directory_uri();?>/img/top/noimage.jpg" alt="no-image">
                <?php endif; ?>
              </div>
            </a>
            <div class="card__itemTitle"><?php the_title();?></div>
          </div>
          <?php endwhile; ?>
          <?php else: ?>
          <p>記事が見つかりません</p>
          <?php wp_reset_query();endif; ?>
    </div>
    <div class="works__paragraph">
      <p>企業サイト・クリニック・飲食など業種に関わらず、作成が可能です。</p>
      <p>デザイン〜コーディング迄まで一気通貫で対応します。</p>
    </div>
    <div class="works__view view">
      <a href="">View more</a>
    </div>
  </div>
</section>
<section id="blog" class="blog">
  <div class="blog__inner inner animationTarget">
    <h2 class="blog__title title textAnimation">Blog</h2>
    <div class="blog__items cards-blog">
    <?php 
        $args =array(
          'post_type'=>'blog',
          'posts_per_page'=> 4,
          'order' => 'ASC'
        );
        $the_query =new WP_Query($args);if($the_query->have_posts()):?>
        <?php while($the_query->have_posts()):$the_query->the_post(); ?>

      <div class="cards-blog__item card-blog">
        <?php if(has_post_thumbnail()): ?>
          <?php echo get_the_post_thumbnail( $post_id, 'large', array( 'class' => 'card-blog__img') ); ?>
        <?php  else: ?>
          <img class="card-blog__img" src="<?php echo get_template_directory_uri();?>/img/top/noimage.jpg" alt="no-image">
        <?php endif; ?>
        <div class="card-blog__itemTitle">
          <div class="card-blog__date"><?php echo get_the_date('Y.m.d') ;?></div>
          <div class="card-blog__discription"><?php the_title(); ?></div>
        </div>
      </div>
      <?php endwhile; ?>
      <?php wp_reset_query();endif; ?>
    </div>
    <div class="blog__view view"><a href="">View more</a></div>
  </div>
</section>
<section id="contact" class="contact">
  <div class="contact__inner inner animationTarget">
    <div class="contact__title">Contact</div>
    <div class="contact__button"><a href="mailto:contact@thinkcode-design.com">お問い合わせはこちら</a></div>
    <div class="contact__text">弊社にサイト制作の依頼をお考えの方をはじめ、<br>「こういったことはできるのか？」<br class="sp">「まずは相談だけしたい」<br>などちょっとした質問なども歓迎しております。</div>
    <div class="contact__call">
      <p class="contact__callText">お電話はこちら</p>
      <div class="contact__callButton">
        <a href="tel:08093502511">080-9350-2511</a>
      </div>
    </div>
  </div>
</section>
<?php get_footer(); ?>