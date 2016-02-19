<?php 

// Our include
define('WP_USE_THEMES', false);
require_once('../../../wp-load.php');

// Our variables
$offset = (isset($_GET['offset'])) ? $_GET['offset'] : 0;

$gender = (isset($_GET['gander'])) ? $_GET['gender'] : '';
$category = (isset($_GET['category'])) ? $_GET['category'] : '';

?>

	<div class="row">

		<?php

		$args = array(
				'post_type' => 'post',
				'post_status' => 'publish',
				'orderby' => 'date',
				'order' => 'DESC',
				'posts_per_page' => '9',

			);

		$args['cat'] = $category;
		$args['offset'] = $offset;
		$args['tag_slug__and'] = $gender;


		query_posts($args);

		?>

		<?php
		// Initialize counter
		$counter = 0;
		// Setup Loop
		if ( have_posts() ) :

	        while ( have_posts() ) : the_post();
		    	// Increment Counter
		    	$counter ++;
	    		$post->i_summary = get_sub_field('block_summary');
	        
	        	?>
				<div <?php post_class("up-up-child col-xs-12 col-sm-4"); ?>>
					<?php
						get_template_part ( 'includes/content/item', 'curated' );
					?>
	        	</div>
	            <?php
	            // Row div creator if divisable by 2
				if ($counter % 3 == 0) {
					echo '</div><div class="row">';
				}
	        endwhile;
		endif;
		?>

		<?php wp_reset_query(); ?>

	</div>