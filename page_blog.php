<?php 
/* 
	Template Name: Blog Archive
*/ 
?>

<?php get_header(); ?>

<?php if (have_posts()) : ?>
    
    <header class="masthead" style="background-image: url('<?php echo get_the_post_thumbnail_url( get_the_ID(),'post-header-wide' ) ; ?>')">
      <div class="overlay"></div>
        <div class="container">
          <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
              <div class="post-heading">
                <h1><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h1>
                <h2 class="subheading"><?php the_excerpt('Read the rest of this entry &raquo;'); ?></h2>
                <span class="meta">Posted on <?php the_time('F jS, Y') ?></span>
              </div>
            </div>
          </div>
        </div>
      </header>

      <!-- Main Content -->

      <div class="container">
        <div class="row">
          <div class="col-lg-9 col-md-12 mx-auto">

            <?php while (have_posts()) : the_post(); ?>
              
              <div class="row">
                
                <div class="col-md-auto">
                  <?php if ( has_post_thumbnail() ) { ?>
                    <?php the_post_thumbnail () ; ?>
                  <?php } else { ?>
                    <img src="<?php bloginfo('template_directory'); ?>/images/default/thumb.jpg" alt="<?php the_title(); ?>" />
                  <?php } ?>
                </div>

                <div class="col post-preview">
                  <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>">
                    <h2 class="post-title">
                     <?php the_title(); ?>
                    </h2>
                    <h3 class="post-subtitle"><?php the_excerpt('Read the rest of this entry &raquo;'); ?></h3>
                  </a>
                  <p class="post-meta">Posted on <?php the_time('F jS, Y') ?></p>
                </div>
              </div>
                
              <hr>
              
            <?php endwhile; ?>

            <!-- Pager -->
            <div class="clearfix">
              <a class="btn btn-primary float-right" href="http://www.davelodwig.co.uk/blog/">Everything Else</a>
            </div>
          </div>
        </div>
      </div>

  <?php else : ?>
      
    <div class="content_frame">
      <div class="content_left">
        <h1>Not Found</h1>
        <p>Sorry, but you are looking for something that isn't here.</p>
      </div>
    </div>
        
  <?php endif; ?>

<?php get_footer(); ?>