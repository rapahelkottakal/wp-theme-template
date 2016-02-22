<?php 

/* Template Name: Flip n click */

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

.feed-wrapper {
    padding-top: 30px;
    background-color: #F5F5F5;
}

.up-up-child .meta-subtitle {
	display: block !important;
	margin: 2% 5%;
}

.post-box-big {
	background-color: #FFFFFF;
	padding-bottom: 10px;
	border-radius: 2px;
}

h3.entry-title {
	font-family: "Whitney", Arial, sans-serif;
	margin: 8% 5%;
	margin-bottom: 5px;
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

.post-box-big {
    background-color: transparent;
}

.back img {
	width: 100%;
}
</style>

<div class="page-container container">
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<?php 
		$page_id = get_the_ID();
		the_content();
	?>
	<?php endwhile; endif; ?>
</div>

<div class="feed-wrapper">

<div class="feed-container container">
	<div class="row">

		<?php

		$categoryList = array();

		if ($page_id == 80565): //style tips
			$categoryList['vocab'] = '6382';
		endif;

		$categories = implode(',', $categoryList);


		$args = array(
					'post_type' => 'post',
				    'post_status' => 'publish',
				    'orderby' => 'date',
				    'order' => 'DESC',
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

	        	?>
				<div <?php post_class("up-up-child col-xs-12 col-sm-4"); ?>>
					<?php
						get_template_part ( 'includes/content/item', 'flip' );
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
<script src="https://cdn.rawgit.com/nnattawat/flip/v1.0.19/dist/jquery.flip.min.js"></script>
<script type="text/javascript">
jQuery( function($) {

$.fn.fixHeight = function() {

	return this.each(function() {
		//select feature and get its height
		var imageHeight = $(this).find('.front img').outerHeight();

		console.log(imageHeight);

		//set same height to this
		$(this).outerHeight(imageHeight);
	});
}

var cardHeight = $('.flip-n-click').first().find('.front img').outerHeight();

// console.log(cardHeight);

$('.flip-n-click').fixHeight().flip();

$(window).resize(function() {
	cardHeight = $('.flip-n-click').first().find('.front img').outerHeight();
	$('.flip-n-click').fixHeight();
});

var lastScrollOffset = 0,
	gender = '<?php echo $gender; ?>',
	category = '<?php echo $categories ?>',
	next_offset = 9;

//Alert div var
var alert = $("<div>", { class: 'story-alert', style: 'display:none' });

//Ajax next load
var load_next_posts = function(){
		console.log(next_offset);
        $.ajax({
            type       : "GET",
            data       : {offset: next_offset, gender: gender, category: category },
            dataType   : "html",
            url        : "http://www.myntra.com/lookgood/wp-content/themes/Curated/loop-handler-fliper.php",
            beforeSend : function(){
                alert.html('<img src="http://www.myntra.com/lookgood/wp-content/themes/Curated/images/loader.gif" /> Loading... Please Wait').insertAfter('.page-wrapper').fadeIn();
            },
            success    : function(data){
                $data = $(data);

                // console.log('ajax success', $data);
                if( $data.find('.type-post').size() != 0 ) {

                	//enable flip-n-click
                	$data.find('.flip-n-click').outerHeight(cardHeight).flip();

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