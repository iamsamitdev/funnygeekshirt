<?php
/**
 * Perfect Blog Theme Customizer
 *
 * @package perfect-blog
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function perfect_blog_customize_register( $wp_customize ) {	

	//add home page setting pannel
	$wp_customize->add_panel( 'perfect_blog_panel_id', array(
	    'priority' => 10,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'Theme Settings', 'perfect-blog' ),
	    'description' => __( 'Description of what this panel does.', 'perfect-blog' ),
	) );

	// Add the Theme Color Option section.
	$wp_customize->add_section( 'perfect_blog_theme_color_option', 
		array( 'panel' => 'perfect_blog_panel_id', 'title' => esc_html__( 'Theme Color Option', 'perfect-blog' ) )
	);

  	$wp_customize->add_setting( 'perfect_blog_theme_color_first', array(
	    'default' => '#e37e86',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'perfect_blog_theme_color_first', array(
  		'label' => 'First Color Option',
  		'description' => __('One can change complete theme color on just one click.', 'perfect-blog'),
	    'section' => 'perfect_blog_theme_color_option',
	    'settings' => 'perfect_blog_theme_color_first',
  	)));

  	$wp_customize->add_setting( 'perfect_blog_theme_color_second', array(
	    'default' => '#101631',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'perfect_blog_theme_color_second', array(
  		'label' => 'Second Color Option',
  		'description' => __('One can change complete theme color on just one click.', 'perfect-blog'),
	    'section' => 'perfect_blog_theme_color_option',
	    'settings' => 'perfect_blog_theme_color_second',
  	)));

	//Layouts
	$wp_customize->add_section( 'perfect_blog_left_right', array(
    	'title'      => __( 'Layout Settings', 'perfect-blog' ),
		'priority'   => 30,
		'panel' => 'perfect_blog_panel_id'
	) );

	$wp_customize->add_setting('perfect_blog_theme_options',array(
        'default' => __('Default','perfect-blog'),
        'sanitize_callback' => 'perfect_blog_sanitize_choices'
	));
	$wp_customize->add_control('perfect_blog_theme_options',array(
        'type' => 'radio',
        'label' => __('Container Box','perfect-blog'),
        'description' => __('Here you can change the Width layout. ','perfect-blog'),
        'section' => 'perfect_blog_left_right',
        'choices' => array(
            'Default' => __('Default','perfect-blog'),
            'Container' => __('Container','perfect-blog'),
            'Box Container' => __('Box Container','perfect-blog'),
        ),
	) );

	// Add Settings and Controls for Layout
	$wp_customize->add_setting('perfect_blog_layout_options',array(
	        'default' => __('Right Sidebar','perfect-blog'),
	        'sanitize_callback' => 'perfect_blog_sanitize_choices'	        
	    )
    );
	$wp_customize->add_control('perfect_blog_layout_options',
	    array(
	        'type' => 'radio',
	        'label' => __('Sidebar Layouts','perfect-blog'),
	        'section' => 'perfect_blog_left_right',
	        'choices' => array(
	            'Left Sidebar' => __('Left Sidebar','perfect-blog'),
	            'Right Sidebar' => __('Right Sidebar','perfect-blog'),
	            'One Column' => __('One Column','perfect-blog'),
	            'Three Columns' => __('Three Columns','perfect-blog'),
	            'Four Columns' => __('Four Columns','perfect-blog'),
	            'Grid Layout' => __('Grid Layout','perfect-blog')
	        ),
	) );

	$font_array = array(
        '' => 'No Fonts',
        'Abril Fatface' => 'Abril Fatface', 
        'Acme' => 'Acme', 
        'Anton' => 'Anton',
        'Architects Daughter' =>'Architects Daughter', 
        'Arimo' => 'Arimo', 
        'Arsenal' => 'Arsenal', 
        'Arvo' => 'Arvo', 
        'Alegreya' => 'Alegreya',
        'Alfa Slab One' =>  'Alfa Slab One', 
        'Averia Serif Libre' =>  'Averia Serif Libre',
        'Bangers' => 'Bangers', 
        'Boogaloo' => 'Boogaloo',
        'Bad Script' => 'Bad Script', 
        'Bitter' =>  'Bitter', 
        'Bree Serif' => 'Bree Serif', 
        'BenchNine' => 'BenchNine',
        'Cabin' => 'Cabin', 
        'Cardo' => 'Cardo', 
        'Courgette' => 'Courgette', 
        'Cherry Swash' => 'Cherry Swash', 
        'Cormorant Garamond' => 'Cormorant Garamond', 
        'Crimson Text' => 'Crimson Text',
        'Cuprum' => 'Cuprum', 
        'Cookie' => 'Cookie', 
        'Chewy' => 'Chewy', 
        'Days One' => 'Days One',
        'Dosis' => 'Dosis', 
        'Droid Sans' => 'Droid Sans',
        'Economica' =>  'Economica',
        'Fredoka One' => 'Fredoka One', 
        'Fjalla One' => 'Fjalla One', 
        'Francois One' => 'Francois One', 
        'Frank Ruhl Libre' => 'Frank Ruhl Libre', 
        'Gloria Hallelujah' => 'Gloria Hallelujah',
        'Great Vibes' =>  'Great Vibes', 
        'Handlee' => 'Handlee',
        'Hammersmith One' =>'Hammersmith One', 
        'Inconsolata' => 'Inconsolata', 
        'Indie Flower' => 'Indie Flower', 
        'IM Fell English SC' => 'IM Fell English SC',
        'Julius Sans One' => 'Julius Sans One', 
        'Josefin Slab' => 'Josefin Slab', 
        'Josefin Sans' => 'Josefin Sans',
        'Kanit' => 'Kanit', 
        'Lobster' =>  'Lobster', 
        'Lato' => 'Lato', 
        'Lora' =>'Lora',
        'Libre Baskerville' =>  'Libre Baskerville', 
        'Lobster Two' => 'Lobster Two',
        'Merriweather' => 'Merriweather', 
        'Monda' => 'Monda', 
        'Montserrat' => 'Montserrat', 
        'Muli' => 'Muli', 
        'Marck Script' => 'Marck Script', 
        'Noto Serif' => 'Noto Serif', 
        'Open Sans' => 'Open Sans', 
        'Overpass' => 'Overpass', 
        'Overpass Mono' =>  'Overpass Mono', 
        'Oxygen' => 'Oxygen', 
        'Orbitron' => 'Orbitron',
        'Patua One' => 'Patua One', 
        'Pacifico' =>  'Pacifico',
        'Padauk' => 'Padauk',
        'Playball' =>  'Playball', 
        'Playfair Display' => 'Playfair Display',
        'PT Sans' => 'PT Sans', 
        'Philosopher' => 'Philosopher', 
        'Permanent Marker' => 'Permanent Marker', 
        'Poiret One' => 'Poiret One', 
        'Quicksand' => 'Quicksand', 
        'Quattrocento Sans' =>'Quattrocento Sans',
        'Raleway' => 'Raleway', 
        'Rubik' => 'Rubik', 
        'Rokkitt' => 'Rokkitt', 
        'Russo One' => 'Russo One', 
        'Righteous' => 'Righteous', 
        'Slabo' => 'Slabo', 
        'Source Sans Pro' => 'Source Sans Pro',
        'Shadows Into Light Two' => 'Shadows Into Light Two',
        'Shadows Into Light' => 'Shadows Into Light',
        'Sacramento' => 'Sacramento', 
        'Shrikhand' => 'Shrikhand',
        'Tangerine' => 'Tangerine', 
        'Ubuntu' => 'Ubuntu', 
        'VT323' => 'VT323', 
        'Varela Round' => 'Varela Round',
        'Vampiro One' => 'Vampiro One', 
        'Vollkorn' => 'Vollkorn', 
        'Volkhov' => 'Volkhov', 
        'Yanone Kaffeesatz' =>'Yanone Kaffeesatz', 
    );

	//Typography
	$wp_customize->add_section( 'perfect_blog_typography', array(
    	'title'      => __( 'Typography', 'perfect-blog' ),
		'priority'   => 30,
		'panel' => 'perfect_blog_panel_id'
	) );
	
	// This is Paragraph Color picker setting
	$wp_customize->add_setting( 'perfect_blog_paragraph_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'perfect_blog_paragraph_color', array(
		'label' => __('Paragraph Color', 'perfect-blog'),
		'section' => 'perfect_blog_typography',
		'settings' => 'perfect_blog_paragraph_color',
	)));

	//This is Paragraph FontFamily picker setting
	$wp_customize->add_setting('perfect_blog_paragraph_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'perfect_blog_sanitize_choices'
	));
	$wp_customize->add_control(
	    'perfect_blog_paragraph_font_family', array(
	    'section'  => 'perfect_blog_typography',
	    'label'    => __( 'Paragraph Fonts','perfect-blog'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	$wp_customize->add_setting('perfect_blog_paragraph_font_size',array(
		'default'	=> '12px',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('perfect_blog_paragraph_font_size',array(
		'label'	=> __('Paragraph Font Size','perfect-blog'),
		'section'	=> 'perfect_blog_typography',
		'setting'	=> 'perfect_blog_paragraph_font_size',
		'type'	=> 'text'
	));

	// This is "a" Tag Color picker setting
	$wp_customize->add_setting( 'perfect_blog_atag_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'perfect_blog_atag_color', array(
		'label' => __('"a" Tag Color', 'perfect-blog'),
		'section' => 'perfect_blog_typography',
		'settings' => 'perfect_blog_atag_color',
	)));

	//This is "a" Tag FontFamily picker setting
	$wp_customize->add_setting('perfect_blog_atag_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'perfect_blog_sanitize_choices'
	));
	$wp_customize->add_control(
	    'perfect_blog_atag_font_family', array(
	    'section'  => 'perfect_blog_typography',
	    'label'    => __( '"a" Tag Fonts','perfect-blog'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	// This is "a" Tag Color picker setting
	$wp_customize->add_setting( 'perfect_blog_li_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'perfect_blog_li_color', array(
		'label' => __('"li" Tag Color', 'perfect-blog'),
		'section' => 'perfect_blog_typography',
		'settings' => 'perfect_blog_li_color',
	)));

	//This is "li" Tag FontFamily picker setting
	$wp_customize->add_setting('perfect_blog_li_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'perfect_blog_sanitize_choices'
	));
	$wp_customize->add_control(
	    'perfect_blog_li_font_family', array(
	    'section'  => 'perfect_blog_typography',
	    'label'    => __( '"li" Tag Fonts','perfect-blog'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	// This is H1 Color picker setting
	$wp_customize->add_setting( 'perfect_blog_h1_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'perfect_blog_h1_color', array(
		'label' => __('H1 Color', 'perfect-blog'),
		'section' => 'perfect_blog_typography',
		'settings' => 'perfect_blog_h1_color',
	)));

	//This is H1 FontFamily picker setting
	$wp_customize->add_setting('perfect_blog_h1_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'perfect_blog_sanitize_choices'
	));
	$wp_customize->add_control(
	    'perfect_blog_h1_font_family', array(
	    'section'  => 'perfect_blog_typography',
	    'label'    => __( 'H1 Fonts','perfect-blog'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	//This is H1 FontSize setting
	$wp_customize->add_setting('perfect_blog_h1_font_size',array(
		'default'	=> '50px',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('perfect_blog_h1_font_size',array(
		'label'	=> __('H1 Font Size','perfect-blog'),
		'section'	=> 'perfect_blog_typography',
		'setting'	=> 'perfect_blog_h1_font_size',
		'type'	=> 'text'
	));

	// This is H2 Color picker setting
	$wp_customize->add_setting( 'perfect_blog_h2_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'perfect_blog_h2_color', array(
		'label' => __('h2 Color', 'perfect-blog'),
		'section' => 'perfect_blog_typography',
		'settings' => 'perfect_blog_h2_color',
	)));

	//This is H2 FontFamily picker setting
	$wp_customize->add_setting('perfect_blog_h2_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'perfect_blog_sanitize_choices'
	));
	$wp_customize->add_control(
	    'perfect_blog_h2_font_family', array(
	    'section'  => 'perfect_blog_typography',
	    'label'    => __( 'h2 Fonts','perfect-blog'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	//This is H2 FontSize setting
	$wp_customize->add_setting('perfect_blog_h2_font_size',array(
		'default'	=> '45px',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('perfect_blog_h2_font_size',array(
		'label'	=> __('h2 Font Size','perfect-blog'),
		'section'	=> 'perfect_blog_typography',
		'setting'	=> 'perfect_blog_h2_font_size',
		'type'	=> 'text'
	));

	// This is H3 Color picker setting
	$wp_customize->add_setting( 'perfect_blog_h3_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'perfect_blog_h3_color', array(
		'label' => __('h3 Color', 'perfect-blog'),
		'section' => 'perfect_blog_typography',
		'settings' => 'perfect_blog_h3_color',
	)));

	//This is H3 FontFamily picker setting
	$wp_customize->add_setting('perfect_blog_h3_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'perfect_blog_sanitize_choices'
	));
	$wp_customize->add_control(
	    'perfect_blog_h3_font_family', array(
	    'section'  => 'perfect_blog_typography',
	    'label'    => __( 'h3 Fonts','perfect-blog'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	//This is H3 FontSize setting
	$wp_customize->add_setting('perfect_blog_h3_font_size',array(
		'default'	=> '36px',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('perfect_blog_h3_font_size',array(
		'label'	=> __('h3 Font Size','perfect-blog'),
		'section'	=> 'perfect_blog_typography',
		'setting'	=> 'perfect_blog_h3_font_size',
		'type'	=> 'text'
	));

	// This is H4 Color picker setting
	$wp_customize->add_setting( 'perfect_blog_h4_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'perfect_blog_h4_color', array(
		'label' => __('h4 Color', 'perfect-blog'),
		'section' => 'perfect_blog_typography',
		'settings' => 'perfect_blog_h4_color',
	)));

	//This is H4 FontFamily picker setting
	$wp_customize->add_setting('perfect_blog_h4_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'perfect_blog_sanitize_choices'
	));
	$wp_customize->add_control(
	    'perfect_blog_h4_font_family', array(
	    'section'  => 'perfect_blog_typography',
	    'label'    => __( 'h4 Fonts','perfect-blog'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	//This is H4 FontSize setting
	$wp_customize->add_setting('perfect_blog_h4_font_size',array(
		'default'	=> '30px',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('perfect_blog_h4_font_size',array(
		'label'	=> __('h4 Font Size','perfect-blog'),
		'section'	=> 'perfect_blog_typography',
		'setting'	=> 'perfect_blog_h4_font_size',
		'type'	=> 'text'
	));

	// This is H5 Color picker setting
	$wp_customize->add_setting( 'perfect_blog_h5_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'perfect_blog_h5_color', array(
		'label' => __('h5 Color', 'perfect-blog'),
		'section' => 'perfect_blog_typography',
		'settings' => 'perfect_blog_h5_color',
	)));

	//This is H5 FontFamily picker setting
	$wp_customize->add_setting('perfect_blog_h5_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'perfect_blog_sanitize_choices'
	));
	$wp_customize->add_control(
	    'perfect_blog_h5_font_family', array(
	    'section'  => 'perfect_blog_typography',
	    'label'    => __( 'h5 Fonts','perfect-blog'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	//This is H5 FontSize setting
	$wp_customize->add_setting('perfect_blog_h5_font_size',array(
		'default'	=> '25px',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('perfect_blog_h5_font_size',array(
		'label'	=> __('h5 Font Size','perfect-blog'),
		'section'	=> 'perfect_blog_typography',
		'setting'	=> 'perfect_blog_h5_font_size',
		'type'	=> 'text'
	));

	// This is H6 Color picker setting
	$wp_customize->add_setting( 'perfect_blog_h6_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'perfect_blog_h6_color', array(
		'label' => __('h6 Color', 'perfect-blog'),
		'section' => 'perfect_blog_typography',
		'settings' => 'perfect_blog_h6_color',
	)));

	//This is H6 FontFamily picker setting
	$wp_customize->add_setting('perfect_blog_h6_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'perfect_blog_sanitize_choices'
	));
	$wp_customize->add_control(
	    'perfect_blog_h6_font_family', array(
	    'section'  => 'perfect_blog_typography',
	    'label'    => __( 'h6 Fonts','perfect-blog'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	//This is H6 FontSize setting
	$wp_customize->add_setting('perfect_blog_h6_font_size',array(
		'default'	=> '18px',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('perfect_blog_h6_font_size',array(
		'label'	=> __('h6 Font Size','perfect-blog'),
		'section'	=> 'perfect_blog_typography',
		'setting'	=> 'perfect_blog_h6_font_size',
		'type'	=> 'text'
	));

	//Top Bar
	$wp_customize->add_section('perfect_blog_topbar_header',array(
		'title'	=> __('Social Icon link','perfect-blog'),
		'description'	=> __('Add Top Bar Content here','perfect-blog'),
		'priority'	=> null,
		'panel' => 'perfect_blog_panel_id',
	) );

	$wp_customize->add_setting('perfect_blog_skipe_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	) );
	$wp_customize->add_control('perfect_blog_skipe_url',array(
		'label'	=> __('Add Skipe link','perfect-blog'),
		'section'	=> 'perfect_blog_topbar_header',
		'setting'	=> 'perfect_blog_skipe_url',
		'type'		=> 'url'
	) );

	$wp_customize->add_setting('perfect_blog_facebook_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	) );
	$wp_customize->add_control('perfect_blog_facebook_url',array(
		'label'	=> __('Add Facebook link','perfect-blog'),
		'section'	=> 'perfect_blog_topbar_header',
		'setting'	=> 'perfect_blog_facebook_url',
		'type'	=> 'url'
	) );

	$wp_customize->add_setting('perfect_blog_twitter_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	) );
	$wp_customize->add_control('perfect_blog_twitter_url',array(
		'label'	=> __('Add Twitter link','perfect-blog'),
		'section'	=> 'perfect_blog_topbar_header',
		'setting'	=> 'perfect_blog_twitter_url',
		'type'	=> 'url'
	) );

	$wp_customize->add_setting('perfect_blog_pint_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	) );
	$wp_customize->add_control('perfect_blog_pint_url',array(
		'label'	=> __('Add Pintrest link','perfect-blog'),
		'section'	=> 'perfect_blog_topbar_header',
		'setting'	=> 'perfect_blog_pint_url',
		'type'	=> 'url'
	) );

	//home page slider
	$wp_customize->add_section( 'perfect_blog_slidersettings' , array(
    	'title'      => __( 'Slider Settings', 'perfect-blog' ),
		'priority'   => null,
		'panel' => 'perfect_blog_panel_id'
	) );

	$wp_customize->add_setting('perfect_blog_slider_hide_show',array(
      'default' => 'false',
      'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('perfect_blog_slider_hide_show',array(
	  'type' => 'checkbox',
	  'label' => __('Show / Hide slider','perfect-blog'),
	  'section' => 'perfect_blog_slidersettings',
	));

	for ( $count = 1; $count <= 4; $count++ ) {

		// Add color scheme setting and control.
		$wp_customize->add_setting( 'perfect_blog_slidersettings_page' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'perfect_blog_sanitize_dropdown_pages'
		) );

		$wp_customize->add_control( 'perfect_blog_slidersettings_page' . $count, array(
			'label'    => __( 'Select Slide Image Page', 'perfect-blog' ),
			'section'  => 'perfect_blog_slidersettings',
			'type'     => 'dropdown-pages'
		) );
	}

	//Category section
  	$wp_customize->add_section('perfect_blog_cat_section',array(
	    'title' => __('Category post Section','perfect-blog'),
	    'description' => '',
	    'priority'  => null,
	    'panel' => 'perfect_blog_panel_id',
	)); 

	$wp_customize->add_setting('perfect_blog_cat_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('perfect_blog_cat_title',array(
		'label'	=> __('Section Title','perfect-blog'),
		'section'=> 'perfect_blog_cat_section',
		'setting'=> 'perfect_blog_cat_title',
		'type'=> 'text'
	));

	$categories = get_categories();
	$cats = array();
	$i = 0;
	$cat_post[]= 'select';
	foreach($categories as $category){
		if($i==0){
			$default = $category->slug;
			$i++;
		}
		$cat_post[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('perfect_blog_category',array(
	    'default' => 'select',
	    'sanitize_callback' => 'perfect_blog_sanitize_choices',
  	));
  	$wp_customize->add_control('perfect_blog_category',array(
	    'type'    => 'select',
	    'choices' => $cat_post,
	    'label' => __('Select Category to display Latest Post','perfect-blog'),
	    'section' => 'perfect_blog_cat_section',
	));

	//Blog Post
	$wp_customize->add_section('perfect_blog_blog_post',array(
		'title'	=> __('Blog Page Settings','perfect-blog'),
		'panel' => 'perfect_blog_panel_id',
	));	

	$wp_customize->add_setting('perfect_blog_date_hide',array(
       'default' => 'false',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('perfect_blog_date_hide',array(
       'type' => 'checkbox',
       'label' => __('Post Date','perfect-blog'),
       'section' => 'perfect_blog_blog_post'
    ));

    $wp_customize->add_setting('perfect_blog_comment_hide',array(
       'default' => 'false',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('perfect_blog_comment_hide',array(
       'type' => 'checkbox',
       'label' => __('Comments','perfect-blog'),
       'section' => 'perfect_blog_blog_post'
    ));

    $wp_customize->add_setting('perfect_blog_author_hide',array(
       'default' => 'false',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('perfect_blog_author_hide',array(
       'type' => 'checkbox',
       'label' => __('Author','perfect-blog'),
       'section' => 'perfect_blog_blog_post'
    ));

    $wp_customize->add_setting('perfect_blog_tags_hide',array(
       'default' => 'false',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('perfect_blog_tags_hide',array(
       'type' => 'checkbox',
       'label' => __('Single Post Tags','perfect-blog'),
       'section' => 'perfect_blog_blog_post'
    ));

    $wp_customize->add_setting( 'perfect_blog_excerpt_number', array(
		'default'              => 20,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'absint',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'perfect_blog_excerpt_number', array(
		'label'       => esc_html__( 'Excerpt length','perfect-blog' ),
		'section'     => 'perfect_blog_blog_post',
		'type'        => 'textfield',
		'settings'    => 'perfect_blog_excerpt_number',
		'input_attrs' => array(
			'step'             => 2,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting('perfect_blog_button_text',array(
		'default'=> 'Read complete post',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('perfect_blog_button_text',array(
		'label'	=> __('Add Button Text','perfect-blog'),
		'section'=> 'perfect_blog_blog_post',
		'type'=> 'text'
	));

	//footer
	$wp_customize->add_section('perfect_blog_footer_section',array(
		'title'	=> __('Footer Text','perfect-blog'),
		'description'	=> __('Add some text for footer like copyright etc.','perfect-blog'),
		'priority'	=> null,
		'panel' => 'perfect_blog_panel_id',
	));
	
	$wp_customize->add_setting('perfect_blog_footer_copy',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field',
	));	
	$wp_customize->add_control('perfect_blog_footer_copy',array(
		'label'	=> __('Copyright Text','perfect-blog'),
		'section'	=> 'perfect_blog_footer_section',
		'type'		=> 'text'
	));
}
add_action( 'customize_register', 'perfect_blog_customize_register' );	

// logo resize
load_template( trailingslashit( get_template_directory() ) . '/inc/logo/logo-resizer.php' );


/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class Perfect_Blog_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'Perfect_Blog_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new Perfect_Blog_Customize_Section_Pro(
				$manager,
				'example_1',
				array(
					'priority'   => 9,
					'title'    => esc_html__( 'Blog Pro Theme', 'perfect-blog' ),
					'pro_text' => esc_html__( 'Go Pro',         'perfect-blog' ),
					'pro_url'  => esc_url('https://www.themeshopy.com/themes/premium-wordpress-blog-theme/'),
				)
			)
		);
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'perfect-blog-customize-controls', trailingslashit( get_template_directory_uri() ) . '/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'perfect-blog-customize-controls', trailingslashit( get_template_directory_uri() ) . '/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
Perfect_Blog_Customize::get_instance();