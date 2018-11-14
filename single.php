<?php get_header(); ?>

<?php if (have_posts()) { ?>

  <?php while (have_posts()) : the_post(); ?>

    <!-- Page Header -->
    <?php if ( has_post_thumbnail() ) { ?>
        
      <header class="masthead" style="background-image: url('<?php echo get_the_post_thumbnail_url( get_the_ID(),'post-header-wide' ) ; ?>')">
    
    <?php } else { ?>
        
      <header class="masthead" style="background-image: url('<?php bloginfo('template_directory'); ?>/images/default/banner.jpg')">
    
    <?php } ?>

      <div class="overlay"></div>
        <div class="container">
          <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
              <div class="post-heading">
                <h1><?php the_title(); ?></h1>
                <h2 class="subheading"><?php the_excerpt('Read the rest of this entry &raquo;'); ?></h2>
                <span class="meta">Posted on <?php the_time('F jS, Y') ?></span>
              </div>
            </div>
          </div>
        </div>
      
      </header>

      <!-- Post Content -->
      <article>
        <div class="container">
          <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
              <?php the_content('Read the rest of this entry &raquo;'); ?>
              <?php wp_link_pages(); ?>
            </div>
          </div>
        </div>
      </article>

    <?php endwhile; ?>

<?php } else { ?>
      
  <?php get_template_part ( 'nopost' ) ; ?>
        
<?php } ?>

<?php get_footer(); ?>
