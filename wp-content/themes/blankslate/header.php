<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
    <head>
        <meta http-equiv="content-type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
        <link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/favicon.ico" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title><?php wp_title(' | ', true, 'right'); ?></title>
        <meta name="description" content="">
        <!--<meta name="viewport" content="width=device-width">-->
        <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/style.css">
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
        <script src="<?php bloginfo('template_directory'); ?>/js/vendor/modernizr-2.6.1.min.js"></script>
        <script type="text/javascript" src="//use.typekit.net/yuw4ike.js"></script>
    	<script type="text/javascript">try{Typekit.load();}catch(e){}</script>
        <?php wp_head(); ?>
    </head>
	
	<body <?php body_class(); ?>>
		<div id="wrapper" class="hfeed">
			<header>
				<nav>
					<a href="<?php echo get_page_link(7); ?>" title="Portfolio" <?php if ( is_page('7') ) { ?>  class="active" <?php }; ?>>Portfolio</a>
					<a href="<?php echo get_page_link(9); ?>" title="Meet Will" <?php if ( is_page('9') ) { ?>  class="active" <?php }; ?>>Meet Will</a>
					<a href="<?php echo home_url() ?>/" title="<?php bloginfo( 'name' ) ?>" rel="home" class="home_link"><?php bloginfo( 'name' ) ?></a>
					<a href="http://www.centralvapropertyexpert.com" title="Real Estate" target="_self">Real Estate</a>
					<a href="http://www.centralvapropertyexpert.com/blog" title="Blog" target="_self">Blog</a>
					<a href="<?php echo get_page_link(14); ?>" title="Contact" <?php if ( is_page('14') ) { ?>  class="active" <?php }; ?>>Contact</a>
				</nav>

			</header>
			
			<div id="container">
