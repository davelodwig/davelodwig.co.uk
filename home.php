<?php get_header(); ?>

<?php if (have_posts()) : ?>
    
  <header class="masthead" style="background-image: url('<?php bloginfo('template_directory'); ?>/img/about-bg.jpg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="post-heading">
            <h1>Blog</h1>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Main Content -->

  <div class="container">
    <div class="row">
      <div class="col">

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
          
          <div class="btn btn-primary alignleft"><?php next_posts_link( 'Older posts' ); ?></div>
          <div class="btn btn-primary alignright"><?php previous_posts_link( 'Newer posts' ); ?></div>

        </div>
      
      </div>
      
      <div class="col-lg-3 col-md-3 mx-auto">

        <h3>Categories</h3>
        <ul>
          
          <?php wp_list_categories( array ( 'orderby' => 'name', 'depth' => 1, 'exclude' => 30, 'title_li' => '' ) ) ; ?>

        </ul>

        <h3>By Date</h3>
        <ul>

          <?php 
            $args = array(
              'type'            => 'monthly',
              'limit'           => '',
              'format'          => 'html', 
              'before'          => '',
              'after'           => '',
              'show_post_count' => false,
              'echo'            => 1,
              'order'           => 'DESC',
              'post_type'     => 'post'
            );

            wp_get_archives( $args ); 
          ?>

        </ul>

      </div>

    </div>

  </div>

<?php else : ?>
      
  <div class="container">
    <h1>Not Found</h1>
    <p>Sorry, but you are looking for something that isn't here.</p>
  </div>
        
<?php endif; ?>

<?php get_footer(); ?>