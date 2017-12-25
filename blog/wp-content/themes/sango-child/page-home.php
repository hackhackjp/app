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

          <!-- 最新の投稿20件 -->

          <section class="entry-content cf">

            <?php
              $args = array('posts_per_page' => 20, 'offset' => 0, 'order' => 'DESC', 'orderby' => 'date');
              $newpost_query = new WP_Query($args);
            ?>
            <?php if ($newpost_query->have_posts()): ?>
              <?php while ($newpost_query->have_posts()): $newpost_query->the_post(); ?>
                <div>
                  <a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>">
                    <div style="width:20%; float:left;">
                    <?php if (has_post_thumbnail()): ?>
                      <?php the_post_thumbnail(array(100,100)); ?>
                    <?php else: ?>
                      <img src="<?php echo get_template_directory_uri(); ?>/img/noimage.png" />
                    <?php endif; ?>
                    </div>
                    <?php the_title(); ?>
                  </a>
                </div>
                <hr />
              <?php endwhile; ?>
            <?php endif; ?>
            <?php wp_reset_postdata(); ?>

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
