<?php 
/* 
	Template Name: Wedding
*/ 
?>

<!DOCTYPE html>
<html lang="en"><head>

    	<meta charset="utf-8">
    	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
    	<meta name="description" content="">
    	<meta name="author" content="David J. Lodwig">

    	<title>David & Mary</title>

    	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">
	
    	<!-- Custom CSS -->
    	<link href="<?php bloginfo('template_directory'); ?>/wedding/wedding.css" rel="stylesheet">

    	<!-- Custom Fonts -->
    	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
	
    	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    	<!--[if lt IE 9]>
        	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        	<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    	<![endif]-->
	
		

	</head>

	<body id="page-top" class="index">

    	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

			<?php if ( post_password_required() ) { ?>
			
				<section>
        			<div class="container">
            			<h2>David Lodwig &amp; Mary Hall</h2>
						<p>Enter the password on your inviation to visit our wedding page</p>
                    	<form action="<?php echo esc_url( site_url( 'wp-login.php?action=postpass', 'login_post' ) ) ?>" method="post" class="form-inline">
							<div class="form-group">
								<input name="post_password" id="<?php echo 'pwbox-'.( empty( $post->ID ) ? rand() : $post->ID ) ; ?>" type="password" size="20" maxlength="20" class="form-control" placeholder="Password">
							</div>
							<button type="submit" name="Submit" class="btn btn-primary">Sign In</button>
						</form>
						<p><small><br />You'll need to have cookies enabled for this to work though!</small></p>
        			</div>
				</section>
			
			<?php } ?>
			
			<?php if ( ! post_password_required() ) { ?>
		
				<!-- Navigation -->
				<nav class="navbar navbar-fixed-top">
					<div class="container">
						<!-- Brand and toggle get grouped for better mobile display -->
						<div class="navbar-header page-scroll">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
							<a class="navbar-brand" href="#page-top">David Lodwig &amp; Mary Hall</a>
						</div>
					
						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
							<ul class="nav navbar-nav navbar-right">
								<li class="hidden"><a href="#page-top"></a></li>
								<li class="page-scroll"><a href="#location">Location</a></li>
								<li class="page-scroll"><a href="#accomodation">Accomodation</a></li>
								<li class="page-scroll"><a href="#gift">Gift List</a></li>
								<li class="page-scroll"><a href="#rsvp">RSVP</a></li>
								<li class="page-scroll"><a href="#questions">Questions?</a></li>
							</ul>
						</div>
						<!-- /.navbar-collapse -->
					</div>
					<!-- /.container-fluid -->
				</nav>
		
				
				<!-- Header -->
				<header>
					<div class="container">
						<div class="row">
							<div class="col-lg-2">
							</div>
							<div class="col-lg-8">
								<div class="intro-text">
                    				<span class="parents">Mr & Mrs Jeremy Hall,</span> <br />
									invite you to join them for the ceremony <br />
									and celebrations of the marriage of their daughter <br />
									<span class="couple">Mary Elizabeth</span> <br />
									to <br />
									<span class="couple">Mr David James Lodwig</span> <br />
									and to start them off on their adventure <br />
									(on or off their tandem) together in life.
                    			</div>
                			</div>
							<div class="col-lg-2">
							</div>
            			</div>
        			</div>
    			</header>
	
				
				<!-- Location Section (POST 1525) -->
				<?php $LocationPage = get_post ( 1525 ) ; ?>
		
				<section class="success" id="location">
        			<div class="container">
            			<h2 align="center">Location</h2>
                    	<hr class="bike-light">
						<?php echo apply_filters ('the_content', $LocationPage->post_content ) ; ?>
        			</div>
				</section>
				<!-- End Location Section --->
	
		
				<!-- Accomodation Section -->
				<?php $AccomodationPage = get_post ( 1527 ) ; ?>
				
    			<section id="accomodation">
        			<div class="container">
            			<h2 align="center">Accommodation</h2>
                    	<hr class="bike-primary">
						<?php echo apply_filters ('the_content', $AccomodationPage->post_content ) ; ?>
					</div>
				</section>
				<!-- End Accomodation Section --->
		
		
				<!-- Gift Section -->
				<?php $GiftPage = get_post ( 1529 ) ; ?>
				
				<section class="success" id="gift">
					<div class="container">
						<h2 align="center">Gift List</h2>
                	    <hr class="bike-light">
						<?php echo apply_filters ('the_content', $GiftPage->post_content ) ; ?>
        			</div>
    			</section>
				<!-- End Gift Section --->
				
				<!-- RSVP Section -->
				<?php $RsvpPage = get_post ( 1531 ) ; ?>
				
				<section id="rsvp">
        			<div class="container">
            			<h2 align="center">RSVP</h2>
                    	<hr class="bike-primary">
						<?php echo apply_filters ('the_content', $RsvpPage->post_content ) ; ?>
						<div align="center">
							<iframe src="https://docs.google.com/forms/d/1XPAjm-oq60sOKDzBvstc-K1zi0-us0uXZCfMuPmp82Q/viewform?embedded=true" 
							width="760" height="875" frameborder="0" marginheight="0" marginwidth="0">
						Loading...</iframe>
						</div>
        			</div>
    			</section>
				<!-- End RSVP Section --->
				
				<!-- Questions Section -->
				<?php $QuestionsPage = get_post ( 1575 ) ; ?>
				
				<section class="success" id="questions">
        			<div class="container">
            			<h2 align="center">Questions?</h2>
                    	<hr class="bike-light">
						<?php echo apply_filters ('the_content', $QuestionsPage->post_content ) ; ?>
        			</div>
    			</section>
				<!-- End Questions Section --->
				
				<!-- Footer -->
				<footer class="text-center">
					<div class="footer-below">
            			<div class="container">
                			<div class="row">
                    			<div class="col-lg-12">
                        			Designed & Developed by David J. Lodwig
                    			</div>
                			</div>
            			</div>
        			</div>
    			</footer>

				<!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
    			<div class="scroll-top page-scroll visible-xs visble-sm">
        			<a class="btn btn-primary" href="#page-top">
        	    		<i class="fa fa-chevron-up"></i>
        			</a>
    			</div>
	
			<?php } ?>
	
		<?php endwhile; endif; ?>

    	<!-- jQuery -->
    	<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>

    	<!-- Bootstrap Core JavaScript -->
    	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>

    	<!-- Plugin JavaScript -->
    	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    	<script src="<?php bloginfo('template_directory'); ?>/wedding/classie.js"></script>
    	<script src="<?php bloginfo('template_directory'); ?>/wedding/cbpAnimatedHeader.js"></script>

    	<!-- Contact Form JavaScript -->
    	<script src="<?php bloginfo('template_directory'); ?>/wedding/jqBootstrapValidation.js"></script>

    	<!-- Custom Theme JavaScript -->
    	<script src="<?php bloginfo('template_directory'); ?>/wedding/wedding.js"></script>

	</body>

</html>