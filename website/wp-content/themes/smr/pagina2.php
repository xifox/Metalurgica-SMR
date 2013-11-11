<?php
/**
 *
 * Template Name: SMR Servicios
 * @package WordPress
 * @subpackage smr
 * @since Twenty Thirteen
 */

get_header(); ?>

	<main id="primary" class="content-area">
		<div id="content no-servicios" class="wrapper site-content" role="main">
		<?php if ( have_posts() ) : ?>

			<?php while ( have_posts() ) : the_post(); ?>

<hr />
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

  <h1>
    <?php the_title(); ?>
  </h1>

  <div class="contenido">
    <?php the_content(); ?>

    <?php get_template_part( 'menu-servicios', get_post_format() ); ?>

    <div class="descripciones">
      <!--paginas hijas-->
        <?php /* Pages level [1] */?>
        <?php $argumentos = array(
          'sort_order' => 'ASC',
          'sort_column' => 'menu_order',
          'child_of' => $post->ID,
          'parent' => $post->ID,
          'post_type' => 'page',
          'post_status' => 'publish'
        ); 

        $paginas_hijas = get_pages($argumentos); 
        ?>
      <?php if($paginas_hijas) { ?>
        <?php foreach($paginas_hijas as $lh) : ?>
          <?php
            $lb_class = $lh->post_name;
            $lb_link = get_permalink( $lh->ID );
            $classes = array($lh->post_name);
          ?>

          <?php $str_class = ''; ?>
          <?php foreach (get_post_class($classes, $lh->ID) as $cl) : ?>
            <?php $str_class .= $cl . ' '; ?>
          <?php endforeach; ?>

          <div id="bloque-<?php echo $lh->ID; ?>" class="<?php echo 'servicios '.$lb_slug.' '.$lb_class; ?>">
            <div class="titulo-clientes">
              <a href="<?php echo $lb_link; ?>">
                    <?php echo $lh->post_title; ?>
              </a>
            </div>
          </div>
        <?php endforeach; ?>

        <div class="clear"></div>
      <?php } ?>
      <!-- paginas hijas -->
    </div>
    <div class="clear"></div>

  </div>

	<footer class="entry-meta">
	</footer><!-- .entry-meta -->
</article><!-- #post -->


<?php endwhile; ?>
		<?php endif; ?>
		</div><!-- #content -->
	</main><!-- #primary -->

<?php //get_sidebar(); ?>
<?php get_footer(); ?>
