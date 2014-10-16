<?php
/*
Plugin Name: Photographer Byline
Plugin URI: /wp-content/plugins/photog-byline
Description: Photographer byline to be included above the copy alongside author byline
Version: 1.0
Author: David Kissinger
Author URI: http://DavidKDaily.com
License: GPLv2
*/

/* This plugin is a modification for sotheresthatblog.com a lifestyle blog by David Kissinger and Charla Avery.
* This source code is available on github: ________
* To function properly, this plugin relies on mods to the functions.php file, where indicated.
* Future goals for this plugin are to refactor the mods out of functions.php and package everything into the plugin itself.
* Comments and pull requests are welcome! 
* www.DavidKDaily.com
*/
add_action( 'add_meta_boxes', 'dkd_id_photog_create' );

function dkd_id_photog_create() {
  add_meta_box( 'photog-by', 'Photographer', 'dkd_id_photog', 'post', 'normal', 'high' );
}

function dkd_id_photog( $post ) {
  echo "<p>Photographer credited on this post. Must be a registered user of any permissions level. If there is no photographer listed on this post, then the byline will only show the author.</p>";
  $allusers = get_users();  
  // determine if a photographer is picked and display. 
  $stt_photog = get_post_meta( $post->ID, '_stt_photog', true );
  if (! $stt_photog ) {
    echo "There is no photographer on this post.<br />";
  } else {
    echo "<h4>The current photographer on this post is $stt_photog </h4><br />";
  }
  echo "Check the photographer on this post:"; // display list for writer to select photographer
  ?> 
  <p>Photographer
  <select name="stt_photog">
    <option value="" <?php selected( $stt_photog, "none" ); ?>>
      none
    </option>
    <?php 
    foreach ( $allusers as $eachuser ) : // display list of users on dropdown pick list 
      $listed_user = $eachuser->display_name; ?>
      <option value="<?php echo $listed_user ?>" <?php selected( $stt_photog, $listed_user ); ?>>
        <?php echo esc_html( $listed_user ); ?>
      </option>
    <?php endforeach; ?>
  </select>
  </p>
  <?php  
}

add_action( 'save_post', 'stt_save_photog' ); // hook to save selected photographer in post meta

function stt_save_photog( $post_id ) {
  if (isset( $_POST['stt_photog'] ) ) {
    update_post_meta( $post_id, '_stt_photog', strip_tags( $_POST['stt_photog'] ) );
  }
}

?>
