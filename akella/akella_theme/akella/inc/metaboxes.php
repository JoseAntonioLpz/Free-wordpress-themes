<?php
/**
 * Akella metaboxes.
 *
 * @package Akella
 */

/**
 * Add post visibility settings meta box.
 */
function akella_add_visibility_settings_meta_box() {
  $screens = array( 'post' );

  foreach ( $screens as $screen ) {
    add_meta_box(
      'akella_visibility_settings',                  // $id
      esc_html__( 'Visibility Settings', 'akella' ), // $title
      'akella_visibility_settings_callback',         // $callback
      $screen,                                      // $post_type
      'normal',                                     // $context
      'high'                                        // $priority
    );
  }
}
add_action( 'add_meta_boxes', 'akella_add_visibility_settings_meta_box' );

$visibility_settings_field = array(
  'id'      => 'visibility_settings_select',
  'desc'    => esc_html__( 'Select where do you want to display the entry, if needed.', 'akella' ),
  'type'    => 'select',
  'options' => array (
    '1' => array (
      'label' => esc_html__( 'Non Selected', 'akella' ),
      'value' => 'none'
    ),
    '2' => array (
      'label' => esc_html__( 'Header Featured Content', 'akella' ),
      'value' => 'featured'
    )
  )
);

/**
 * Visibility settings callback.
 */
function akella_visibility_settings_callback() {
  global $post, $visibility_settings_field;
  wp_nonce_field( basename( __FILE__ ), 'akella_visibility_settings_nonce' );
  $meta_value = get_post_meta( $post->ID, $visibility_settings_field['id'], true );

  echo '<p class="description">'.$visibility_settings_field['desc'].'</p>';
  echo '<select name="'.$visibility_settings_field['id'].'" id="'.$visibility_settings_field['id'].'">';
  foreach ( $visibility_settings_field['options'] as $option ) {
    echo '<option', $meta_value == $option['value'] ? ' selected="selected"' : '', ' value="'.$option['value'].'">'.$option['label'].'</option>';
  }
  echo '</select>';
}

/**
 * Save visibility settings meta box.
 */
function akella_save_visibility_settings_meta_box( $post_id ) {
  global $post, $visibility_settings_field;

  // Verify the nonce before proceeding.
  if ( ! isset( $_POST[ 'akella_visibility_settings_nonce' ] ) || ! wp_verify_nonce( $_POST[ 'akella_visibility_settings_nonce' ], basename( __FILE__ ) ) ) {
    return $post_id;
  }

  // Stop WP from clearing custom fields on autosave.
  if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
    return $post_id;
  }

  if ( 'page' == $_POST[ 'post_type' ] ) {
    if ( ! current_user_can( 'edit_page', $post_id ) ) {
      return $post_id;
    }
  } else {
    if ( ! current_user_can( 'edit_post', $post_id ) ) {
      return $post_id;
    }
  }

  if ( ! isset( $_POST[ $visibility_settings_field['id'] ] ) ) {
    return $post_id;
  }

  foreach ( $visibility_settings_field as $field ) {
    $old = get_post_meta( $post_id, $visibility_settings_field['id'], true );
    $new = sanitize_text_field( $_POST[ $visibility_settings_field['id'] ] );

    if ( $new && $new != $old ) {
      update_post_meta( $post_id, $visibility_settings_field['id'], $new );
    } elseif ( '' == $new && $old ) {
      delete_post_meta( $post_id, $visibility_settings_field['id'], $old );
    }
  }
}
add_action( 'save_post', 'akella_save_visibility_settings_meta_box' );
