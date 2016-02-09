<div class="post-box-big no-padding" itemscope itemtype="http://schema.org/Article">
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
</div>
