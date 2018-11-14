<?php 
/* 
  Template Name: About Me
*/ 
?>
<?php get_header(); ?>

  <?php while (have_posts()) : the_post(); ?>

    <header class="masthead" style="background-image: url('<?php bloginfo('template_directory'); ?>/img/about-bg.jpg')">
  
      <div class="overlay"></div>
        <div class="container">
          <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
              <div class="post-heading">
                <h1><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h1>
              </div>
            </div>
          </div>
        </div>
      </header>

      <!-- Main Content -->

      <div class="container">
        <div class="row">
          <div class="col-lg-9 col-md-12 mx-auto">

            <div class="row">
                
                <div class="col-md-auto">
                  <?php if ( has_post_thumbnail() ) { ?>
                    <?php the_post_thumbnail () ; ?>
                  <?php } else { ?>
                    <img src="<?php bloginfo('template_directory'); ?>/images/default/thumb.jpg" alt="<?php the_title(); ?>" />
                  <?php } ?>
                </div>

                <div class="col post-preview">
                  <?php the_content(); ?></h3>
                  
                </div>
              </div>
                
              <hr>
              
            
          </div>
        </div>
      </div>

  <?php endwhile; ?>

<?php get_footer(); ?>