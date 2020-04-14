<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package BusinesStar
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="post-item">
		<?php if( is_sticky() ){ ?>
	    	<div class="favourite"><i class="fa fa-star"></i></div>
		<?php } ?>

		<?php if ( has_post_thumbnail() ) { ?>
			<figure>
			    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
			</figure>
		<?php } ?>

		<div class="entry-container">
			
			<header class="entry-header">
				<?php
				if ( is_single() ) :
					the_title( '<h1 class="entry-title">', '</h1>' );
				else :
					the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
				endif; ?>
			</header><!-- .entry-header -->

			<?php if ( 'post' === get_post_type() ) : ?>
				<div class="entry-meta">
					<?php businesstar_posted_on();
					businesstar_entry_meta(); ?>
				</div><!-- .entry-meta -->
			<?php endif; ?>

			<div class="entry-content">
				<?php the_excerpt(); ?>
			</div><!-- .entry-content -->

			<?php $blog_readmore_text = businesstar_get_option( 'blog_readmore_text' );?>
			<div class="read-more">
				<a class="btn" href="<?php the_permalink();?>"><?php echo esc_html($blog_readmore_text);?></a>
			</div><!-- .read-more -->
		</div><!-- .entry-container -->
	</div><!-- .post-item -->
</article><!-- #post-## -->
