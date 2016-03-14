<?php 

/* Template Name: Home */

get_header();
global $post;

$gender = (isset($_GET['gender'])) ? $_GET['gender'] : '';


?>
<style type="text/css">

.story-alert {
    width: 100%;
    z-index: 9999;
    color: gray;
    margin: 50px 0;
    font-size: 18px;
    text-align: center;
    display: none;
}

.up-up-child .meta-subtitle {
	display: block !important;
	margin: 2% 5%;
	margin-top: 0;
}

h3.entry-title {
	font-family: "Whitney", Arial, sans-serif;
	margin: 2% 5%;
    margin-bottom: 1px;
}

img.entry-thumb {
    border-top-left-radius: 2px;
    border-top-right-radius: 2px;
}

.post-category {
	padding: 0 5%;
}

.post-category div.cat {
	background-color: #e23129;
	color: #FFF;
	padding: 1px 4px;
	border-radius: 2px;
	text-transform: uppercase;
	font-size: 11px;
	display: inline;
}

.no-padding {
	padding: 0;
}

.col-sm-4 {
	padding-left: 2.5px;
    padding-right: 2.5px;
}
</style>
<script type="text/javascript">
var postIds = new Array();
</script>

<div class="page-container container">
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<?php the_content(); ?>
	<?php endwhile; endif; ?>
</div>

<div class="feed-wrapper">

<div class="feed-container container">
	<div class="row">

		<?php

		$categoryList = array(
				// 'style_tips' => '6381',
				// 'style_tips_old' => '4195',

				// 'hot_off_the_web' => '3567',

				// 'style_help' => '4752', //active
				// 'lg_lessons' => '4750', //active
				// 'daily_fix' => '7',
				// 'assisted_shopping' => '4741', //active
				// 'features' => '4755',

				// 'vocab' => '6382',

				// 'videos' => '4754',
				// 'myntra_tv' => '2',

				// 'celeb_style' => '6379',
				// 'celeb_style_old' => '4742',

				// 'beauty_n_grooming' => '4746', //active

				// 'trends_to_try' => '4753', //active
				// 'trends' => '6345',

				// 'quiz' => '4751',

				'fashion_guides' => '628', //active

				// 'fashion_trivia' => '5058',
				// 'did_you_know' => '4743',

				// 'makeover' => '6396',

				// 'footwear_diaries' => '6380',
			);

		$categories = implode(',', $categoryList);


		$args = array(
					'post_type' => 'post',
				    'post_status' => 'publish',
				    'orderby' => 'rand',
				    // 'order' => 'DESC',
				    // 'cat' => '2751', //quiz
				    'posts_per_page' => '9',
				    // 'tag_slug__and' => $tags_array
			);

		$args['cat'] = $categories;

		if ($gender != '') {
			$args['tag_slug__and'] = $gender;
		}

		query_posts($args);

		?>

		<?php
		// Initialize counter
		$counter = 0;

		// Setup Loop
		if ( have_posts() ) :

	        while ( have_posts() ) : the_post();
	   			// Increment Counter
	    		$counter++;
	    		$post->i_summary = get_sub_field('block_summary');

	    		$date_change = '2015-11-24';

	    		$date_post = $post->post_date;

	        	?>
	        	<script type="text/javascript">
	        	postIds.push(<?php echo $post->ID; ?>);
	        	</script>
				<div <?php post_class("up-up-child col-xs-12 col-sm-4"); ?>>
					<?php
					$this_category = get_the_category();
					$category_id = $this_category[0]->cat_ID;
					if ( $category_id == 4754 || $category_id == 2 || $category_id == 4741 ) :
						get_template_part ( 'includes/content/item', 'normal' );
					elseif ($category_id == 3567):
						get_template_part ( 'includes/content/item', 'curated' );
					// elseif ($date_post > $date_change):
					// 	get_template_part ( 'includes/content/item', 'image' );
					elseif ($date_post < $date_change):
						get_template_part ( 'includes/content/item', 'normal' );
					else:
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
        else:

            echo '<div class="col-sm-12 message">';
			_e( 'Sorry, no posts were found', MAHA_TEXT_DOMAIN );
			echo '</div>';
		endif;
		?>

		<?php wp_reset_query(); ?>

	</div>
	
	<?php
	// End of container
	?>
</div>
</div>
<script type="text/javascript">
jQuery( function($) {

var lastScrollOffset = 0,
	gender = '<?php echo $gender; ?>',
	category = '<?php echo $categories ?>',
	next_offset = 9;

//Alert div var
var alert = $("<div>", { class: 'story-alert', style: 'display:none' });

//Ajax next load
var load_next_posts = function(){
		// console.log(next_offset);
        $.ajax({
            type       : "GET",
            data       : {offset: next_offset, gender: gender, category: category, posted: postIds },
            dataType   : "html",
            url        : "http://www.myntra.com/lookgood/wp-content/themes/Curated/loop-handler.php",
            beforeSend : function(){
            	// console.log(postIds);
                alert.html('<img src="http://www.myntra.com/lookgood/wp-content/themes/Curated/images/loader.gif" /> Loading... Please Wait').insertAfter('.page-wrapper').fadeIn();
            },
            success    : function(data){
                var $data = $(data),
	                $postDivs = $data.find('.posted');

	            //add post ids to posted ids list
	            $postDivs.each(function() {
	            	postIds.push($(this).data('id'));
	            	// console.log($(this).data('id'));
	            });

                // console.log('ids', $data.find('.posted'));
                if( $data.find('.type-post').size() != 0 ) {
                    next_offset = next_offset + 9;
                    $('.feed-container').append( $data );
                    alert.fadeOut( function() { $(this).remove(); });
					//$('html, body').animate({ scrollTop: lastScrollOffset + 100 }, 700);
                    checkForPosts = true;
                } else {
                    alert.html('That\'s all folks!').delay(1200).fadeOut( function() { $(this).remove(); });
                }
            },
            error     : function(jqXHR, textStatus, errorThrown) {
                console.log(jqXHR + " :: " + textStatus + " :: " + errorThrown);
            }
    });
};

var checkIfPageEnd = function() {

	//get document height
	var docHeight = $('html').height();

	//get window hight
	var windowSize = $(window).height();

	//get window scroll offset
	var scrollOffset = $(window).scrollTop();

	//bottom of document after factering window height and a buffer of 100
	var bottomOffset = docHeight - windowSize - 100;

	if ( scrollOffset > bottomOffset ) {
		return true;
	} else {
		return false;
	};

};

var checkForPosts = true;

$(window).scroll( function() {
	if ( checkIfPageEnd() ) {
		if( checkForPosts ) {
			lastScrollOffset = $(window).scrollTop();
			checkForPosts = false;
			load_next_posts();
		};
	};
});

});
</script>

<?php get_footer(); ?>