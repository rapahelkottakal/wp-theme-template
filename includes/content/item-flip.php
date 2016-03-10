<div class="post-box-big no-padding" itemscope itemtype="http://schema.org/Article">
	<?php
	// Thumbnail
	if ( has_post_thumbnail() ) { // Set Featured Image
		?>
		<div class="thumb-wrap flip-n-click">
			<div class="front">
				<img itemprop="image" src="<?php echo maha_featured_url( get_the_ID() , 'full'); ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>"/>
			</div>
			<div class="back">
				<?php the_content(); ?>
			</div>
		</div>
		<?php
    } elseif( maha_first_post_image() ) { // Set myntra placeholder image
    	?>
		<div class="thumb-wrap">
			<?php
			if( get_field('c_url') != '' ):
				echo '<a href="' . get_field('c_url') . '" target="_blank" rel="bookmark" title="' . get_title() . '">';
			endif;
			?>
				<img itemprop="image" class="entry-thumb zoom-it three" src="http://assets.myntassets.com/v1455002125/placeholder_mmsxni.jpg" alt="<?php the_title(); ?>" title="<?php the_title(); ?>"/>
			<?php
			if( get_field('c_url') != '' ):
				echo '</a>';
			endif;
			?>
		</div>
	<?php
   	}
	?>
</div>
