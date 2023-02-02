<?php
	/* Template Name: ACF Template */
?>

<?php get_header(); ?>


<?php
	//text block
	$content = get_field( 'acf_text' );
	echo ! empty( $content ) ? $content : 'NOTHING to DISPLAY';
?>

<?php get_footer(); ?>