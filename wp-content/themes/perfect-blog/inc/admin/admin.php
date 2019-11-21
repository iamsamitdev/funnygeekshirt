<?php
//about theme info
add_action( 'admin_menu', 'perfect_blog_abouttheme' );
function perfect_blog_abouttheme() {    	
	add_theme_page( esc_html__('About Blog Theme', 'perfect-blog'), esc_html__('About Blog Theme', 'perfect-blog'), 'edit_theme_options', 'perfect_blog_guide', 'perfect_blog_mostrar_guide');   
}

// Add a Custom CSS file to WP Admin Area
function perfect_blog_admin_theme_style() {
   wp_enqueue_style('custom-admin-style', get_template_directory_uri() .'/inc/admin/admin.css');
}
add_action('admin_enqueue_scripts', 'perfect_blog_admin_theme_style');

//guidline for about theme
function perfect_blog_mostrar_guide() {
	//custom function about theme customizer
	$return = add_query_arg( array()) ;
?>
 <div class="wrapper-info">
	<div class="header">
	 	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/admin/images/logo.png" alt="" />
 		<p><?php esc_html_e('Most of our outstanding theme is elegant, responsive, multifunctional, SEO friendly has amazing features and functionalities that make them highly demanding for designers and bloggers, who ought to excel in web development domain. Our Themeshopy has got everything that an individual and group need to be successful in their venture.', 'perfect-blog'); ?></p>
		<div class="main-button">
			<a href="<?php echo esc_url( PERFECT_BLOG_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Buy Now', 'perfect-blog'); ?></a>
			<a href="<?php echo esc_url( PERFECT_BLOG_LIVE_DEMO ); ?>"><?php esc_html_e('Live Demo', 'perfect-blog'); ?></a>
			<a href="<?php echo esc_url( PERFECT_BLOG_PRO_DOC ); ?>" target="_blank"><?php esc_html_e('Pro Documentation', 'perfect-blog'); ?></a>
		</div>
	</div>
	<div class="button-bg">
		<button class="tablink" onclick="openPage('Home', this, '')"><?php esc_html_e('Lite Theme Setup', 'perfect-blog'); ?></button>
		<button class="tablink" onclick="openPage('Contact', this, '')"><?php esc_html_e('Premium Theme info', 'perfect-blog'); ?></button>
	</div>
	<div id="Home" class="tabcontent tab1">
	  	<h3><?php esc_html_e('How to set up homepage', 'perfect-blog'); ?></h3>
	  	<div class="sec-button">
			<a href="<?php echo esc_url( PERFECT_BLOG_FREE_DOC ); ?>" target="_blank"><?php esc_html_e('Documentation', 'perfect-blog'); ?></a>
			<a href="<?php echo esc_url( PERFECT_BLOG_CONTACT ); ?>"><?php esc_html_e('Support', 'perfect-blog'); ?></a>
			<a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>"><?php esc_html_e('Start Customizing', 'perfect-blog'); ?></a>
		</div>
	  	<div class="documentation">
		  	<div class="image-docs">
				<ul>
					<li> <b><?php esc_html_e('Step 1.', 'perfect-blog'); ?></b> <?php esc_html_e('Follow these instructions to setup Home page.', 'perfect-blog'); ?></li>
					<li> <b><?php esc_html_e('Step 2.', 'perfect-blog'); ?></b> <?php esc_html_e(' Create Page to set template: Go to Dashboard >> Pages >> Add New Page.Label it "home" or anything as you wish. Then select template "home-page" from template dropdown.', 'perfect-blog'); ?></li>
				</ul>
		  	</div>
		  	<div class="doc-image">
		  		<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/admin/images/home-page-template.png" alt="" />	
		  	</div>
		  	<div class="clearfixed">
				<div class="doc-image1">
					<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/admin/images/set-front-page.png" alt="" />	
			    </div>
			    <div class="image-docs1">
				    <ul>
						<li> <b><?php esc_html_e('Step 3.', 'perfect-blog'); ?></b> <?php esc_html_e('Set the front page: Go to Setting >> Reading >> Set the front page display static page to home page', 'perfect-blog'); ?></li>
					</ul>
			  	</div>
			</div>
		</div>
	</div>

	<div id="Contact" class="tabcontent">
	 	<h3><?php esc_html_e('Premium Theme Info', 'perfect-blog'); ?></h3>
	  	<div class="sec-button">
			<a href="<?php echo esc_url( PERFECT_BLOG_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Buy Now', 'perfect-blog'); ?></a>
			<a href="<?php echo esc_url( PERFECT_BLOG_LIVE_DEMO ); ?>"><?php esc_html_e('Live Demo', 'perfect-blog'); ?></a>
			<a href="<?php echo esc_url( PERFECT_BLOG_PRO_DOC ); ?>" target="_blank"><?php esc_html_e('Pro Documentation', 'perfect-blog'); ?></a>
		</div>
	  	<div class="features-section">
	  		<div class="col-4">
	  			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/admin/images/screenshot.jpg" alt="" />
	  			<p><?php esc_html_e( 'The premium WordPress blog theme will encourage you to draft your thoughts in a beautiful way. The theme will give your visitors the pleasure of reading peacefully. You can use this site as an online magazine or newsletter. Through this theme, you can design a site to share your travel adventures and excursions, food knowledge and new food exploring journeys in the town, fashion observations, lifestyle ways, sports enthusiasm, environment protection and conservation ways and anything you wish to start a blog on. The premium blogging theme has ample amount of space for writing and adding images and videos to your post. If you are an author, you can use this whole space just for writing. The theme is so designed that even if you use it only for writing it wont look mundane. It will still give the fresh look to your site and will encourage visitors to find more content to read.', 'perfect-blog' ); ?></p>
	  		</div>
	  		<div class="col-4">
	  			<h4><?php esc_html_e( 'Theme Features', 'perfect-blog' ); ?></h4>
				<ul>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Theme options using customizer API', 'perfect-blog' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Responsive Design', 'perfect-blog' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Favicon, Logo, Title and Tagline Customization', 'perfect-blog' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Support to Add Custom CSS/JS', 'perfect-blog' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'SEO Friendly', 'perfect-blog' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Pagination Option.', 'perfect-blog' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Compatible With Different WordPress Famous Plugins Like Contact Form 7 and Woocommerce', 'perfect-blog' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Enable-Disable Options on All Sections', 'perfect-blog' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Pagination Option', 'perfect-blog' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Compatible With Different WordPress Famous Plugins Like Contact Form 7 and Woocommerce', 'perfect-blog' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Enable-Disable Options on All Sections', 'perfect-blog' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Footer Customization Options', 'perfect-blog' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Fully Integrated with Font Awesome Icon', 'perfect-blog' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Short Codes', 'perfect-blog' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Background Image Option', 'perfect-blog' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Custom Page Templates', 'perfect-blog' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Featured Product Images, HD Images and Video display', 'perfect-blog' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Allow To Set Site Title, Tagline, Logo', 'perfect-blog' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Make Post About Firms News, Events, Achievements and So On.', 'perfect-blog' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Left and Right Sidebar', 'perfect-blog' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Sticky Post & Comment Threads', 'perfect-blog' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Parallax Image-Background Section', 'perfect-blog' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Custom Backgrounds, Colors, Headers, Logo & Menu', 'perfect-blog' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Customizable Home Page', 'perfect-blog' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Full-Width Template', 'perfect-blog' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Gallery, Banner & Post Type Plugin Functionality', 'perfect-blog' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Advance Social Media Feature', 'perfect-blog' ); ?></li>
				</ul>
			</div>
		</div>
	</div>

<script type="text/javascript">
	function openPage(pageName,elmnt,color) {
	    var i, tabcontent, tablinks;
		    tabcontent = document.getElementsByClassName("tabcontent");
		    for (i = 0; i < tabcontent.length; i++) {
		        tabcontent[i].style.display = "none";
	    }
	    tablinks = document.getElementsByClassName("tablink");
		    for (i = 0; i < tablinks.length; i++) {
		        tablinks[i].style.backgroundColor = "";
	    }
	    document.getElementById(pageName).style.display = "block";
	    elmnt.style.backgroundColor = color;

	}
	// Get the element with id="defaultOpen" and click on it
	document.getElementById("defaultOpen").click();
</script>
<?php } ?>