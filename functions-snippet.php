<?php

/* The below code goes into functions.php for the Serene theme in Wordpress, created by Elegant Themes at www.elegantthemes.com. See README file for more information. The below code is written by Elegant Themes and contains my modifications where indicated. */

// BEGIN: For STT blog, add function stt_get_photog_id and modify et_postinfo_meta

if ( ! function_exists( 'stt_get_photog_id' ) ) : // iterate through user list to match display name and return ID
function stt_get_photog_id( $photog ) {
  $allusers = get_users();
  $photog_id = 0; // default to zero. This could be set to default to any user ID
  foreach ( $allusers as $eachuser ) :
    if ( $photog == $eachuser->display_name ) {
      $photog_id = $eachuser->ID;
    }
  endforeach;
  return $photog_id;
  }
endif;

if ( ! function_exists( 'et_postinfo_meta' ) ) :
function et_postinfo_meta() {
  $photog = get_post_meta( get_the_ID(), '_stt_photog', true ); // get photographer display name picked by metabox
	$photog_id = stt_get_photog_id( $photog ); // get photographer ID by iterating through list
  $photog_url = '<a href="' . get_author_posts_url( $photog_id ) . '">' . $photog . '</a>'; // create photographer link
  echo '<p class="meta-info">';
	// Translators: 1 is author, 2 is category list.
	if ( $photog == '' ) { // for no photographer print original Serene byline
    printf( __( 'Written by %1$s in %2$s', 'Serene' ),
		  et_get_the_author_posts_link(),
		  get_the_category_list(', ')
	  );  
  } else { // print byline to include photographer
    printf( __( 'Written by %1$s and photography by %2$s in %3$s', 'Serene' ),
		  et_get_the_author_posts_link(),
      $photog_url,
		  get_the_category_list(', ')
	  );
  }

	echo '</p> <!-- .meta-info -->';
}
endif;

// END EDITS FOR STT

?>
