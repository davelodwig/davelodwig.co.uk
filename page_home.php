<?php 
/* 
  Template Name: Blog Home
*/ 
?>

<?php get_header(); ?>

<?php if (have_posts()) : ?>
    
    <?php 
      $topquery = new WP_Query( array (     
        'posts_per_page' => 1,
        'tax_query' => array( 
          array(
          'taxonomy' => 'post_format',
          'field'    => 'slug',
          'terms'    => array( 'post-format-image' ),
          'operator' => 'NOT IN'
        ) )
      ) );

      while ( $topquery->have_posts() ) : $topquery->the_post();
        
        $do_not_duplicate = $post->ID; ?>
    
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
                  <h1><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h1>
                  <h2 class="subheading"><?php the_excerpt('Read the rest of this entry &raquo;'); ?></h2>
                  <span class="meta">Posted on <?php the_time('F jS, Y') ?></span>
                </div>
              </div>
            </div>
          </div>
        </header>
      
      <?php endwhile; ?>

      <!-- Main Content -->

      <div class="container">
        <div class="row">
          <div class="col-lg-9 col-md-12 mx-auto">

            <?php 
              $bottomquery = new WP_Query( array (     
                'posts_per_page' => 5,
                'tax_query' => array( 
                array(
                  'taxonomy' => 'post_format',
                  'field'    => 'slug',
                  'terms'    => array( 'post-format-image' ),
                  'operator' => 'NOT IN'
                ) )
              ) );

              while ( $bottomquery->have_posts() ) : $bottomquery->the_post(); ?>

                <?php if ( $post->ID == $do_not_duplicate ) continue; ?>

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