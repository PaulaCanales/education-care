<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Education_Care
 */

?>
<style>
	.featured-thumb{
		background-size: cover;
    	background-repeat: no-repeat;
		height: 400px;
		opacity: 0.7;
		transition: .5s ease;
		backface-visibility: hidden;
	}
	.middle {
		transition: .5s ease;
		opacity: 0;
		position: absolute;
		top: 200px;
		left: 50%;
		transform: translate(-50%, -50%);
		-ms-transform: translate(-50%, -50%)
	}

	.featured-thumb:hover .image {
		opacity: 0.3;
	}

	.featured-thumb:hover .middle {
		opacity: 1;
	}

	.text {
		background-color: #77B227;
		color: white;
		font-size: 25px;
		padding: 16px 32px;
		text-align: center;
	}
</style>

<article id="post-<?php the_ID(); ?>" <?php post_class('blog-single-item'); ?>>
	<div class="single-wrap">
		<?php if ( has_post_thumbnail() ) : ?>
		<?php $thumbnail_data = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' );
		$thumbnail_url = $thumbnail_data[0];?>

		<?php else: ?>
		<?php $thumbnail_url= "http://localhost/wordpress/emprendizajeuach/wp-content/uploads/2017/08/default01.png"?>
		
		<?php endif; ?>

		<div class="featured-thumb" style="background-image:url('<?php echo $thumbnail_url ?>')">
			<div class="middle">
				 <?php
				if ( is_single() ) :
					the_title( '<div class="text">', '</div>' );
				else :
					the_title( '<div class="text"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></div>' );
				endif; ?>


			</div>
		</div>

		<div class="content-wrap">
	        <header class="entry-header">

	            <div class="entry-meta">
	                <span class="day"><?php echo esc_html( get_the_date('d') ); ?></span>
	                <span class="month"><?php echo esc_html( get_the_date('M') ); ?></span>
	            </div>

	        </header>

	        <footer class="entry-footer">
	        	<?php printf( esc_html_x( 'By %s', 'post author', 'education-care' ), '<span class="byline"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>' ); ?>
	            

	            <?php 
	            /* translators: used between list items, there is a space after the comma */
				$categories_list = get_the_category_list( esc_html__( ', ', 'education-care' ) );
				if ( $categories_list && education_care_categorized_blog() ) {
					printf( '<span class="categories">%1$s</span>', $categories_list ); // WPCS: XSS OK.
				} ?>
	        </footer>

	        <div class="entry-content">
	            
	        	<?php
	        		the_content( sprintf(
	        			/* translators: %s: Name of current post. */
	        			wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'education-care' ), array( 'span' => array( 'class' => array() ) ) ),
	        			the_title( '<span class="screen-reader-text">"', '"</span>', false )
	        		) );
	        	?>
	            
	        </div><!-- .entry-content -->

	        <?php if ( get_edit_post_link() ) : ?>
	        	<footer class="entry-footer">
	        		<?php
	        			edit_post_link(
	        				sprintf(
	        					/* translators: %s: Name of current post */
	        					esc_html__( 'Edit %s', 'education-care' ),
	        					the_title( '<span class="screen-reader-text">"', '"</span>', false )
	        				),
	        				'<span class="edit-link">',
	        				'</span>'
	        			);
	        		?>
	        	</footer><!-- .entry-footer -->
	        <?php endif; ?>
		</div><!-- .content-wrap -->
	</div>
</article><!-- #post-## -->
