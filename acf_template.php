<?php
	/* Template Name: ACF Template */

	get_header();

	// #1. TEXT GROUP.

	// text field.
	echo '<br><h3> text field content:</h3>';
	$content = get_field( 'acf_text' );
	echo ! empty( $content ) ? $content : 'NOTHING to DISPLAY';

	// textarea field.
	echo '<br><br><h3> text area field content:</h3>';
	$textarea_content = get_field( 'acf_text_area' );
	if ( ! empty( $textarea_content ) ) {
		the_field( 'acf_text_area' );
	}

	// number field.
	echo '<br><br><h3> number field content:</h3>';
	$number_content = get_field( 'acf_number' );
	echo ! empty( $number_content ) ? $number_content : 0;

	// range field.
	echo '<br><br><h3>range value:</h3>';
	$range_val = get_field( 'acf_range' );
	echo ! empty( $range_val ) ? $range_val : 0;

	// email field.
	echo '<br><br><h3>e - mail:</h3>';
	$mail_content = get_field( 'acf_email' );
	echo ! empty( $mail_content ) ? $mail_content : 'dog@dog.com';

	// url field.
	echo '<br><br><h3>URL:</h3>';
	$url = get_field( 'acf_url' );
	echo ! empty( $url ) ? $url : site_url();

	// pass field.
	echo '<br><br><h3>Password:</h3>';
	$pass = get_field( 'acf_password' );
	echo ! empty( $pass ) ? $pass : 'qwerty';

	//#2. CONTENT GROUP

	// image with representation = image ID.
	echo '<br><br><h3>Image:</h3>';
	$im = get_field( 'acf_image' );
	echo ! empty( $im ) ? wp_get_attachment_image( $im, array( '100', '100' ) ) : ""; // with custom size.

	// file.
	echo '<br><br><h3>File:</h3>';
	$f = get_field( 'acf_file' );
	echo 'title: ' . ( ! empty( $f['title'] ) ? $f['title'] : "no name" ) . '<br>';
	echo 'size: ' . ( ! empty( $f['filesize'] ) ? $f['filesize'] : "0b" ) . '<br>';
	echo 'link: <a>' . ( ! empty( $f['link'] ) ? $f['link'] : "#" ) . '</a><br>';

	// editor.
	echo '<br><br><h3>Wysiwyg:</h3>';
	the_field( 'acf_editor' );

	// oembed.
	echo '<br><br><h3>Embed:</h3>';
	the_field( 'acf_embed' );

	// gallery with ID representation.
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
	<?php endif;

	//#3. CHOICE GROUP

	//Select.
	echo '<br><br><h3>Select:</h3>';
	$field_object = get_field_object( 'acf_select' );// get all data.
	$choises      = is_array( $field_object ) ? $field_object['choices'] : null;// get variants.
	$values       = is_array( $field_object ) ? $field_object['value'] : null;// get selected variants.
	$values       = null;
	$vals         = array();
	if ( is_array( $values ) ) {
		{
			foreach ( $values as $v ) {
				$vals[ $v['value'] ] = $v['label'];
			}
		}
		$values = $vals;// reformat seleceted variants to assoc. array.
		foreach ( $choises as $value ) { // bring to front all variants with color for selected values.
			if ( in_array( $value, $values ) ) {
				echo '<p style="color:#00FF00";><b>' . $value . '</b></p>';
			} else {
				echo '<p>' . $value . '</p>';
			}
		}
	}

	// Checkbox.
	echo '<br><br><h3>Check Box:</h3>';
	$obj_checkbox = get_field_object( 'acf_checkbox' );
	$values       = get_field( 'acf_checkbox' );
	$variants     = is_array( $obj_checkbox ) ? $obj_checkbox['choices'] : null;
	foreach ( $variants as $v ) {
		if ( in_array( $v, $values ) ) {
			echo '<p style="color:#00FF00";><b>' . $v . '</b></p>';
		} else {
			echo '<p>' . $v . '</p>';
		}
	}

	// Radio.
	echo '<br><br><h3>Radio Button:</h3>';
	$obj_radio = get_field_object( 'acf_radio' );
	$value     = get_field( 'acf_radio' );
	$variants  = is_array( $obj_radio ) ? $obj_radio['choices'] : null;
	foreach ( $variants as $v ) {
		if ( $v == $value ) {
			echo '<p style="color:#00FF00";><b>' . $v . '</b></p>';
		} else {
			echo '<p>' . $v . '</p>';
		}
	}

	// Button Group.
	echo '<br><br><h3>Button Group:</h3>';
	$obj_buttons = get_field_object( 'acf_buttongroup' );
	$value       = get_field( 'acf_buttongroup' );
	$variants    = is_array( $obj_buttons ) ? $obj_buttons['choices'] : null;
	foreach ( $variants as $v ) {
		if ( $v == $value ) {
			echo '<p style="color:#0000FF";><b>' . $v . '</b></p>';
		} else {
			echo '<p>' . $v . '</p>';
		}
	}

	// True - False.
	echo '<br><br><h3>True - False:</h3>';
	$obj     = get_field_object( 'acf_truefalse' );
	$message = is_array( $obj ) ? $obj['message'] : 'no message!';
	$value   = get_field( 'acf_truefalse' );
	if ( $value ) {
		echo '<p style="color:#00FFFF";><b>' . $message . '</b></p>';
	} else {
		echo '<p>' . $message . '</p>';
	}

	//#4. RELATION GROUP



	get_footer(); ?>