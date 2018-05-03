<?php
/**
 * The template for displaying Author bios
 *
 * @package WordPress
 * @subpackage CORGAN
 * @since CORGAN 1.0
 */
?>

<div class="author_info scheme_dark author vcard" itemprop="author" itemscope itemtype="http://schema.org/Person">

	<div class="author_avatar" itemprop="image">
		<?php 
		$corgan_mult = corgan_get_retina_multiplier();
		echo get_avatar( get_the_author_meta( 'user_email' ), 120*$corgan_mult ); 
		?>
	</div><!-- .author_avatar -->

	<div class="author_description">
        <span class="about-author"><?php echo esc_html__('About author', 'corgan'); ?></span>
		<h4 class="author_title" itemprop="name"><?php echo wp_kses_data(sprintf(__('%s', 'corgan'), '<span class="fn">'.get_the_author().'</span>')); ?></h4>

		<div class="author_bio" itemprop="description">
			<?php echo wpautop(get_the_author_meta( 'description' )); ?>
		</div><!-- .author_bio -->

	</div><!-- .author_description -->

</div><!-- .author_info -->
