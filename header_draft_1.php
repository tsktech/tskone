<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package TSKOne
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1 shrink-to-fit=no">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>


<body <?php body_class(); ?>>
<?php
	/*$headerSticky = null;
	if (get_theme_mod( 'sticky_setting', true )) {
		$headerSticky = " fixed-top";
	}*/
	// $fixed = (stanleywp_option('disable_fixed_navbar') == '1' ? 'fixed-top' : '');
	$headerSticky = (get_theme_mod( 'sticky_setting' ) == true ? ' fixed-top' : null);
	// var_dump($headerSticky);
?>


<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'tskone' ); ?></a>
<!-- 	<div class="top-bar">
      For sles inquiries, call +1(866)965-1533 or <a href="#">Request a free demo</a>
    </div> -->

	<div class="banner">
		<h1>Sample Banner</h1>
	</div>

	<header id="masthead" class="site-header container-fluid">
		<!-- <h1 class="display-1 m-0">Heelo Transform</h1>
		<p class="lead">Customise the Header</p>
 -->
		<!-- <div class="container" id="topContent" >
			Heelo Transform Customise the Header
		</div> --><!-- #topContent.container -->
		<nav id="menu" class="navbar<?php echo $headerSticky; ?> navbar-expand-lg navbar-light bg-light" role="navigation" >
			<div class="container">
				<div class="site-branding navbar-brand">
					<?php
					the_custom_logo();
					if ( is_front_page() && is_home() ) :
						?>
						<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
						<?php
					else :
						?>
						<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
						<?php
					endif;
					$tskone_description = get_bloginfo( 'description', 'display' );
					if ( $tskone_description || is_customize_preview() ) :
						?>
						<p class="site-description"><?php echo $tskone_description; /* WPCS: xss ok. */ ?></p>
					<?php endif; ?>
				</div><!-- .site-branding -->
				<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
					data-target="#bs4navbar" aria-controls="bs4navbar" aria-expanded="false"
						aria-label="Toggle Navigation">
						<span class="navbar-toggler-icon"></span>
				</button>
				<?php
					wp_nav_menu([
						'menu'				=> 'primary',
						'theme_location'	=> 'primary',
						'container'			=> 'div',
						'container_id'		=> 'bs4navbar',
						'container_class'	=> 'collapse navbar-collapse',
						'meni_id'			=> 'main-menu',
						'menu_class'		=> 'navbar-nav ml-auto',
						'depth'				=> 2, // 1 = no dropdowns, 2 = with dropdowns.
						'fallback_cb'		=> 'WP_Bootstrap_Navwalker::fallback',
						'walker'			=> new WP_Bootstrap_Navwalker()
					]);
				?>
			</div><!-- .container -->
		</nav><!-- #menu .navbar -->
	</header><!-- #masthead -->

	<div id="content" class="site-content container">
		<div class="row">
