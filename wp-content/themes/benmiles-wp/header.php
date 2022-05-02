<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<?php wp_head(); ?>
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
<body>
	
<!-- nav -->
<nav class="navbar navbar-toggleable-md fixed-top">
    <div class="container">

        <!-- Mobile Menu Toggle -->
        <button class="btn btn-default navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa fa-bars" aria-hidden="true"></i>
        </button>

        <!-- Branding -->
		<?php if(is_front_page()){ ?>
        <a class="brand navbar-brand scroll" data-section="hey" href="#hey" target="_self">
		<?php } else {; ?>
		<a class="brand navbar-brand scroll" href="<?php bloginfo('url'); ?>" target="_self">
		<?php } ?>
            <h1 id="site-title"><?php bloginfo('name'); ?></h1>
			<h2 id="site-description"><?php bloginfo('description'); ?></h2>
        </a>

        <!-- Menu Items -->
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mr-auto">
                <?php
                    echo menu_item( "Portfolio", "portfolio" );
                    echo menu_item( "About", "about" );
                    echo menu_item( "Contact", "footer" );
                ?>
            </ul>
        </div>

    </div>
</nav>
<!-- nav -->