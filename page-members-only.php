<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Join Template
 */

get_header(); ?>

	<div class="nlc-join">
		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

					<?php twentyfifteen_post_thumbnail(); ?>

					<header class="entry-header">
						<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
					</header><!-- .entry-header -->

					<div class="entry-content">
						<p><em><span style="color: #c00;">This page can be only be viewed by current Council Members.</span></em></p>
						<p>If you have a passion for luxury, we welcome you to <a href="<?php echo home_url() . '/join/'; ?>">Join Us</a>!</p>

						<?php the_content(); ?>
					</div><!-- .entry-content -->

					<?php edit_post_link( __( 'Edit', 'twentyfifteen' ), '<footer class="entry-footer"><span class="edit-link">', '</span></footer><!-- .entry-footer -->' ); ?>

				</article><!-- #post-## -->

			<?php endwhile; ?>

			</main><!-- .site-main -->
		</div><!-- .content-area -->
	</div><!-- .nlc-homepage -->

<?php get_footer(); ?>
