<div class="post-box-big" itemscope itemtype="http://schema.org/Article">
	<?php
	// Thumbnail
	if ( has_post_thumbnail() ) { // Set Featured Image
		?>
		<div class="thumb-wrap zoom-zoom">
			<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>">
				<img itemprop="image" class="entry-thumb zoom-it three" src="<?php echo maha_featured_url( get_the_ID() , 'full'); ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>"/>
			</a>
		</div>
		<?php
    } elseif( maha_first_post_image() ) { // Set myntra placeholder image
    	?>
		<div class="thumb-wrap zoom-zoom">
			<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>">
				<img itemprop="image" class="entry-thumb zoom-it three" src="http://assets.myntassets.com/v1455002125/placeholder_mmsxni.jpg" alt="<?php the_title(); ?>" title="<?php the_title(); ?>"/>
			</a>
		</div>
	<?php
   	}
	?>
	<h3 itemprop="name" class="entry-title">
		<a itemprop="url" href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>">
			<?php the_title();//the_title_limit( 40 ); ?>
		</a>
	</h3>
	<div class="post-category">
        <?php
	        $category = get_the_category();
	        if ($category) {
	        	echo '<div class="cat">' . $category[0]->name . '</div> ';
	        }
        ?> <!-- { echo '<a href="#" data-slug="' . $category[0]->slug . '">' . $category[0]->name . '</a> ';} -->
    </div>
	<?php
    	if ( get_field('subtitle', $key ) != '' ){
        	echo '<div class="meta-subtitle">';
				the_field( 'subtitle' );
			echo '</div>';
    	};
	?>
</div>
