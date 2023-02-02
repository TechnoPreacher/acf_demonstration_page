<?php
	/* Template Name: ACF Template */
?>

<?php get_header(); ?>


<?php
	//#1. TEXT GROUP

	//text field
	echo '<br><h3> text field content:</h3>';
	$content = get_field( 'acf_text' );
	echo ! empty( $content ) ? $content : 'NOTHING to DISPLAY';

	//textarea field
	echo '<br><br><h3> text area field content:</h3>';
	$textarea_content = get_field( 'acf_text_area' );
	if ( ! empty( $textarea_content ) ) {
		the_field( 'acf_text_area' );
	}

	//number field
	echo '<br><br><h3> number field content:</h3>';
	$number_content = get_field( 'acf_number' );
	echo ! empty( $number_content ) ? $number_content : 0;

	//range field
	echo '<br><br><h3>range value:</h3>';
	$range_val = get_field( 'acf_range' );
	echo ! empty( $range_val ) ? $range_val : 0;

	//email field
	echo '<br><br><h3>e - mail:</h3>';
	$mail_content = get_field( 'acf_email' );
	echo ! empty( $mail_content ) ? $mail_content : 'dog@dog.com';

	//url field
	echo '<br><br><h3>URL:</h3>';
	$url = get_field( 'acf_url' );
	echo ! empty( $url ) ? $url : site_url();

	//pass field
	echo '<br><br><h3>Password:</h3>';
	$pass = get_field( 'acf_password' );
	echo ! empty( $pass ) ? $pass : 'qwerty';

	//#2. CONTENT GROUP

	//image with representation = image ID
	echo '<br><br><h3>Image:</h3>';
	$im = get_field( 'acf_image' );
	echo ! empty( $im ) ? wp_get_attachment_image( $im, array( '100', '100' ) ) : ""; // with custom size.

	//file
	echo '<br><br><h3>File:</h3>';
	$f = get_field( 'acf_file' );
	echo 'title: ' . ( ! empty( $f['title'] ) ? $f['title'] : "no name" ) . '<br>';
	echo 'size: ' . ( ! empty( $f['filesize'] ) ? $f['filesize'] : "0b" ) . '<br>';
	echo 'link: <a>' . ( ! empty( $f['link'] ) ? $f['link'] : "#" ) . '</a><br>';

	//editor
	echo '<br><br><h3>Wysiwyg:</h3>';
	the_field( 'acf_editor' );

	//oembed
	echo '<br><br><h3>Embed:</h3>';
	the_field( 'acf_embed' );

	//gallery with ID representation.
	echo '<br><br><h3>Gallery:</h3>';
	$images = get_field( 'acf_gallery' );
	if ( ! empty( $images ) ): ?>
        <table>
            <tr>
				<?php foreach ( $images as $image_id ): ?>
                    <th>
						<?php echo wp_get_attachment_image( $image_id,
							'medium' ); // (thumbnail, medium, large, full or custom size) ?>
                    </th>
				<?php endforeach; ?>
            </tr>
        </table>
	<?php endif; ?>
<?php get_footer(); ?>