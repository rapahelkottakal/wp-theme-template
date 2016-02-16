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

	    		$date_change = '2015-11-24';

	    		$date_post = $post->post_date;
	        
	        	?>
				<div <?php post_class("up-up-child col-xs-12 col-sm-4"); ?>>
					<?php
					$this_category = get_the_category();
					$category_id = $this_category[0]->cat_ID;
					if ( $category_id == 4754 || $category_id == 2 || $category_id == 4741 ) :
						get_template_part ( 'includes/content/item', 'normal' );
					elseif ($date_post > $date_change):
						get_template_part ( 'includes/content/item', 'image' );
					elseif ($date_post < $date_change):
						get_template_part ( 'includes/content/item', 'normal' );
					endif;
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