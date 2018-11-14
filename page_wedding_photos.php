<?php 
/* 
	Template Name: Wedding Photos
*/ 
?>

<?php get_header(); ?>

	<div class="content_frame">
		
		<div class="content_left_wide">
		
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			
				<div id="page">
				
					<div class="image">
						<?php if ( has_post_thumbnail() ) { ?>
							<?php the_post_thumbnail ( 'post-header-wide' ) ; ?>
						<?php } else { ?>
							<img src="<?php bloginfo('template_directory'); ?>/images/default/header.jpg" alt="<?php the_title(); ?>" />
						<?php } ?>
						<h1>
							<span>
								David &amp; Mary Lodwig, 4<sup>th</sup> July 2015
							</span>
						</h1>
					</div>
					
					<p><?php the_excerpt('Read the rest of this entry &raquo;'); ?></p>
					
					<?php if ( post_password_required() ) { ?>
					
						<h2>Password Required</h2>
						
						<p>You'll need to enter the password on your invitation, thank you card, or whatever medium we've sent it to you in to view
						our wedding pictures.</p>
						
						<form action="<?php echo esc_url( site_url( 'wp-login.php?action=postpass', 'login_post' ) ) ?>" method="post" class="form-inline">
							<div class="form-group">
								<input name="post_password" id="<?php echo 'pwbox-'.( empty( $post->ID ) ? rand() : $post->ID ) ; ?>" 
									type="password" size="20" maxlength="20" class="form-control" placeholder="Password">
							</div>
							<button type="submit" name="Submit" class="btn btn-primary">Sign In</button>
						</form>
						
						<p><small><br />You'll need to have cookies enabled for this to work though!</small></p>
						
					<?php } ?>
					
					<?php if ( ! post_password_required() ) { ?>
						
						<?php the_content('<p>Read the rest of this page &raquo;</p>'); ?>
						
					<?php } ?>
					
					<div id="links">
					
						<?php wp_link_pages ( array ( 
							'before' => '<p class="left"><strong>Pages:</strong> ', 
							'after' => '</p>', 
							'next_or_number' => 'number'
						) ) ; ?>
						
						<?php wp_link_pages ( array ( 
							'before' => '<p class="right">', 
							'after' => '</p>', 
							'next_or_number' => 'next',
							'nextpagelink'     => '&nbsp;&nbsp;Next page',
							'previouspagelink' => 'Previous page' 
						) ) ; ?>
						
						<div id="clear"></div>
					
					</div>
				
				</div>
				
			<?php endwhile; endif; ?>
			
		</div>
		
	</div>
	
	<div class="visual_clear"></div>

<?php get_footer(); ?>