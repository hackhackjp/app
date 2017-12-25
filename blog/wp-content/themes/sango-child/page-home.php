<?php get_header(); ?>
<div id="content"<?php column_class();?>>
  <div id="inner-content" class="wrap cf">
    <main id="main" class="m-all t-2of3 d-5of7 cf">
      <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <article id="entry" <?php post_class('cf'); ?>>
          <header class="article-header entry-header">
            <?php if (has_post_thumbnail()): //アイキャッチ?>
              <p class="post-thumbnail">
                <?php the_post_thumbnail('large');?>
              </p>
            <?php endif; ?>
          </header>

          <section class="entry-content cf">
            <?php
              $args = array(
                'posts_per_page' => 20 // 表示件数の指定
              );
              $posts = get_posts( $args );
              foreach ( $posts as $post ): // ループの開始
                setup_postdata( $post ); // 記事データの取得
            ?>
            <hr />
            <div>
              <div style="float:left; width:40%;">
                <?php the_post_thumbnail(array(200,100)); ?>
              </div>
              <div style="float:right; width:60%;">
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
              </div>
            </div>
            <div style="text-align:right;">
              <?php the_category(' | '); ?>&nbsp;<?php the_time('Y/m/d'); ?>
            </div>

<?php
endforeach; // ループの終了
wp_reset_postdata(); // 直前のクエリを復元する
?>
          </section>

            <footer class="article-footer">
              <aside>
                <div class="footer-contents">
                  <?php insert_social_buttons();?>
                </div>
              </aside>
            </footer>

            <?php insert_json_ld();//構造化データ ?>
          </article>
        <?php endwhile; ?>
      <?php else : ?>
        <?php get_template_part('content', 'not-found'); ?>
      <?php endif; ?>
    </main>
    <?php get_sidebar(); ?>
  </div>
</div>
<?php get_footer(); ?>
