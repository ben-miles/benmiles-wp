<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<?php wp_head(); ?>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<title><?php is_front_page() ? bloginfo('description') . ' - ' . bloginfo('name') : wp_title(' - ',TRUE,'right') . bloginfo('name'); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Web Design & Development Portfolio of Ben Miles">
    <meta name="author" content="Ben Miles">
    <link rel="icon" href="/wp-content/themes/benmiles-wp/img/ben-miles_favicon.png">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="<?php echo get_post_type() . ' ' . get_post_field('post_name'); ?>">
	
<header id="site-header">
	<div class="container-new">

		<!-- Branding -->
		<?php if(is_front_page()){ ?>
		<a class="brand-new" href="#intro" target="_self">
		<?php } else {; ?>
		<a class="brand-new" href="<?php bloginfo('url'); ?>" target="_self">
		<?php } ?>
			<?php displaySVG( 'ben-miles_logo' ); ?>
			<h1 class="site-title"><?php bloginfo('name'); ?></h1>
			<h2 class="site-description"><?php bloginfo('description'); ?></h2>
		</a>

		<!-- Mobile Menu Toggle -->
		<button class="btn" id="nav-toggle" type="button" aria-expanded="false" aria-label="Toggle Navigation">
			<svg width="100" height="100" viewBox="0 0 100 100">
				<path class="line line1" d="M 20,29.000046 H 80.000231 C 80.000231,29.000046 94.498839,28.817352 94.532987,66.711331 94.543142,77.980673 90.966081,81.670246 85.259173,81.668997 79.552261,81.667751 75.000211,74.999942 75.000211,74.999942 L 25.000021,25.000058" />
				<path class="line line2" d="M 20,50 H 80" />
				<path class="line line3" d="M 20,70.999954 H 80.000231 C 80.000231,70.999954 94.498839,71.182648 94.532987,33.288669 94.543142,22.019327 90.966081,18.329754 85.259173,18.331003 79.552261,18.332249 75.000211,25.000058 75.000211,25.000058 L 25.000021,74.999942" />
			</svg>
		</button>
			
		<!-- Navigation -->
		<nav id="nav">
			<ul>
			<?php if(is_front_page()){ ?>
				<li class="nav-item">
					<a class="nav-link" href="#about" target="_self">About</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#portfolio" target="_self">Portfolio</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#contact" target="_self">Contact</a>
				</li>
			<?php } else {; ?>
				<li class="nav-item">
					<a class="nav-link" href="/about" target="_self">About</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="/portfolio" target="_self">Portfolio</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="/contact" target="_self">Contact</a>
				</li>
			<?php } ?>
			</ul>
		</nav>
		
	</div>
</header>