<?php
/**
 * Soma Theme Customizer
 *
 * @package somalite
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */

if ( ! function_exists( 'somalite_customize_register' ) ) :
function somalite_customize_register( $wp_customize ) {

    require( get_template_directory() . '/inc/customizer/custom-controls/control-custom-content.php' );  

    //Top Header Bar Settings
    $wp_customize->add_section(
        'soma_top_bar_settings',
        array (
            'priority'      => 25,
            'capability'    => 'edit_theme_options',
            'theme_supports'=> '',
            'title'         => __( 'Top Header Settings', 'somalite' )
        )
    );

    // top phone
    $wp_customize->add_setting(
        'sm_topbar_phone',
        array(
            'type' => 'theme_mod',
            'default'           => '',
            'sanitize_callback' => 'somalite_sanitize_html'
        )
    );

    $wp_customize->add_control(
        'sm_topbar_phone',
        array(
            'settings'      => 'sm_topbar_phone',
            'section'       => 'soma_top_bar_settings',
            'type'          => 'textbox',
            'label'         => __( 'Topbar Phone Number', 'somalite' ),
            'description'   => __( 'Add your phone number.', 'somalite' )
        )
    );

    $wp_customize->selective_refresh->add_partial( 'sm_topbar_phone', array(
        'selector'            => 'span.topbar-phone',   
        'settings'            => 'sm_topbar_phone',     
        'render_callback'     => 'somalite_topbar_phone_render_callback',
        'fallback_refresh'    => false, 
    ));

    // top social icon1
    $wp_customize->add_setting(
        'sm_topbar_icon1',
        array(
            'type' => 'theme_mod',
            'default'           => '',
            'sanitize_callback' => 'somalite_sanitize_html'
        )
    );

    $wp_customize->add_control(
        'sm_topbar_icon1',
        array(
            'settings'      => 'sm_topbar_icon1',
            'section'       => 'soma_top_bar_settings',
            'type'          => 'textbox',
            'label'         => __( 'Topbar Icon 1', 'somalite' ),
            'description'   => __( 'Add fontawesome code here eg fa-envelope.', 'somalite' )
        )
    );

    // top social icon1_url
    $wp_customize->add_setting(
        'sm_topbar_icon1_url',
        array(
            'type' => 'theme_mod',
            'default'           => '',
            'sanitize_callback' => 'somalite_sanitize_url'
        )
    );

    $wp_customize->add_control(
        'sm_topbar_icon1_url',
        array(
            'settings'      => 'sm_topbar_icon1_url',
            'section'       => 'soma_top_bar_settings',
            'type'          => 'textbox',
            'label'         => __( 'Topbar Icon 1 Url', 'somalite' ),
            'description'   => __( 'Add icon url', 'somalite' )
        )
    );

    // top social icon2
    $wp_customize->add_setting(
        'sm_topbar_icon2',
        array(
            'type' => 'theme_mod',
            'default'           => '',
            'sanitize_callback' => 'somalite_sanitize_html'
        )
    );

    $wp_customize->add_control(
        'sm_topbar_icon2',
        array(
            'settings'      => 'sm_topbar_icon2',
            'section'       => 'soma_top_bar_settings',
            'type'          => 'textbox',
            'label'         => __( 'Topbar Icon 2', 'somalite' ),
            'description'   => __( 'Add fontawesome code here eg fa-envelope.', 'somalite' )
        )
    );

    // top social icon2_url
    $wp_customize->add_setting(
        'sm_topbar_icon2_url',
        array(
            'type' => 'theme_mod',
            'default'           => '',
            'sanitize_callback' => 'somalite_sanitize_url'
        )
    );

    $wp_customize->add_control(
        'sm_topbar_icon2_url',
        array(
            'settings'      => 'sm_topbar_icon2_url',
            'section'       => 'soma_top_bar_settings',
            'type'          => 'textbox',
            'label'         => __( 'Topbar Icon 2 Url', 'somalite' ),
            'description'   => __( 'Add icon url', 'somalite' )
        )
    );

    // top social icon3
    $wp_customize->add_setting(
        'sm_topbar_icon3',
        array(
            'type' => 'theme_mod',
            'default'           => '',
            'sanitize_callback' => 'somalite_sanitize_html'
        )
    );

    $wp_customize->add_control(
        'sm_topbar_icon3',
        array(
            'settings'      => 'sm_topbar_icon3',
            'section'       => 'soma_top_bar_settings',
            'type'          => 'textbox',
            'label'         => __( 'Topbar Icon 3', 'somalite' ),
            'description'   => __( 'Add fontawesome code here eg fa-envelope.', 'somalite' )
        )
    );


    // top social icon3_url
    $wp_customize->add_setting(
        'sm_topbar_icon3_url',
        array(
            'type' => 'theme_mod',
            'default'           => '',
            'sanitize_callback' => 'somalite_sanitize_url'
        )
    );

    $wp_customize->add_control(
        'sm_topbar_icon3_url',
        array(
            'settings'      => 'sm_topbar_icon3_url',
            'section'       => 'soma_top_bar_settings',
            'type'          => 'textbox',
            'label'         => __( 'Topbar Icon 3 Url', 'somalite' ),
            'description'   => __( 'Add icon url', 'somalite' )
        )
    );

    
    // General Settings
    $wp_customize->add_section(
        'soma_general_settings',
        array (
            'priority'      => 25,
            'capability'    => 'edit_theme_options',
            'theme_supports'=> '',
            'title'         => __( 'General Settings', 'somalite' )
        )
    );

    // Home Background Image 
    $wp_customize->add_setting(
        'sm_theme_home_bg',
        array(
            'type' => 'theme_mod',
            'sanitize_callback' => 'somalite_sanitize_image'
        )
    );

    $wp_customize->add_control(
      new WP_Customize_Image_Control(
          $wp_customize,
          'sm_theme_home_bg',
          array(
              'settings'      => 'sm_theme_home_bg',
              'section'       => 'soma_general_settings',
              'label'         => __( 'Home Background Image', 'somalite' ),
              'description'   => __( 'Upload background image for your home section', 'somalite' )
          )
      )
    );

    // Home Section Heading text 
    $wp_customize->add_setting(
        'sm_home_heading_text',
        array(            
            'default'           => '',
            'sanitize_callback' => 'somalite_sanitize_html',
            'transport' => 'postMessage',
        )
    );

    $wp_customize->add_control(
        'sm_home_heading_text',
        array(
            'settings'      => 'sm_home_heading_text',
            'section'       => 'soma_general_settings',
            'type'          => 'textbox',
            'label'         => __( 'Heading Text', 'somalite' ),
            'description'   => __( 'heading for the home section', 'somalite' ),
        )
    );

    $wp_customize->selective_refresh->add_partial( 'sm_home_heading_text', array(
        'selector'            => '.promo-section h1',   
        'settings'            => 'sm_home_heading_text',     
        'render_callback'     => 'somalite_home_heading_text_render_callback',
        'fallback_refresh'    => false, 
    ));

    // Home Section SubHeading text
    $wp_customize->add_setting(
        'sm_home_subheading_text',
        array(            
            'default'           => '',
            'sanitize_callback' => 'somalite_sanitize_html',
            'transport' => 'postMessage',
        )
    );

    $wp_customize->add_control(
        'sm_home_subheading_text',
        array(
            'settings'      => 'sm_home_subheading_text',
            'section'       => 'soma_general_settings',
            'type'          => 'textarea',
            'label'         => __( 'SubHeading Text', 'somalite' ),
            'description'   => __( 'Subheading for the home section', 'somalite' ),
        )
    );

    $wp_customize->selective_refresh->add_partial( 'sm_home_subheading_text', array(
        'selector'            => '.promo-section p',   
        'settings'            => 'sm_home_subheading_text',     
        'render_callback'     => 'somalite_home_subheading_text_render_callback',
        'fallback_refresh'    => false, 
    ));

    // Home Section Button text 
    $wp_customize->add_setting(
        'sm_home_button_text',
        array( 
            'type' => 'theme_mod',           
            'default'           => '',
            'sanitize_callback' => 'somalite_sanitize_html',
            
        )
    );

    $wp_customize->add_control(
        'sm_home_button_text',
        array(
            'settings'      => 'sm_home_button_text',
            'section'       => 'soma_general_settings',
            'type'          => 'textbox',
            'label'         => __( 'Button Text', 'somalite' ),
            'description'   => __( 'Button text for the home section', 'somalite' ),
        )
    );  


    // Home Section Button url 
    $wp_customize->add_setting(
        'sm_home_button_url',
        array(
            'type' => 'theme_mod',
            'default'           => '',
            'sanitize_callback' => 'somalite_sanitize_url'
        )
    );

    $wp_customize->add_control(
        'sm_home_button_url',
        array(
            'settings'      => 'sm_home_button_url',
            'section'       => 'soma_general_settings',
            'type'          => 'textbox',
            'label'         => __( 'Button URL', 'somalite' ),
            'description'   => __( 'Button URL for the home section, you can paste youtube or vimeo video url also', 'somalite' ),
        )
    );


    // Home Section Button2 text
    $wp_customize->add_setting(
        'sm_home_button2_text',
        array(
            'type' => 'theme_mod',
            'default'           => '',
            'sanitize_callback' => 'somalite_sanitize_html'
        )
    );

    $wp_customize->add_control(
        'sm_home_button2_text',
        array(
            'settings'      => 'sm_home_button2_text',
            'section'       => 'soma_general_settings',
            'type'          => 'textbox',
            'label'         => __( 'Button 2 Text', 'somalite' ),
            'description'   => __( 'Button 2 text for the home section', 'somalite' ),
        )
    );


    // Home Section Button2 url 
    $wp_customize->add_setting(
        'sm_home_button2_url',
        array(
            'type' => 'theme_mod',
            'default'           => '',
            'sanitize_callback' => 'somalite_sanitize_url'
        )
    );

    $wp_customize->add_control(
        'sm_home_button2_url',
        array(
            'settings'      => 'sm_home_button2_url',
            'section'       => 'soma_general_settings',
            'type'          => 'textbox',
            'label'         => __( 'Button 2 URL', 'somalite' ),
            'description'   => __( 'Button 2 URL for the home section, you can paste youtube or vimeo video url also', 'somalite' ),
        )
    );


    // Parallax Scroll for background image 
    $wp_customize->add_setting(
        'sm_home_parallax',
        array(
            'type' => 'theme_mod',
            'default'           => true,
            'sanitize_callback' => 'somalite_sanitize_checkbox_selection'
        )
    );

    $wp_customize->add_control(
        'sm_home_parallax',
        array(
            'settings'      => 'sm_home_parallax',
            'section'       => 'soma_general_settings',
            'type'          => 'checkbox',
            'label'         => __( 'Enable Parallax scroll:', 'somalite' ),
            'description'   => __( 'Choose whether to show a parallax scroll feature for the Home Background image', 'somalite' ),           
        )
    );

    //Header Styles
    $wp_customize->add_section(
        'soma_header_styles_settings',
        array (
            'priority'      => 25,
            'capability'    => 'edit_theme_options',
            'theme_supports'=> '',
            'title'         => __( 'Header Styles', 'somalite' )
        )
    );
    
    $wp_customize->add_setting(
        'sm_header_styles',
        array(
            'type' => 'theme_mod',
            'default'           => 'style1',
            'sanitize_callback' => 'somalite_sanitize_header_style_radio_selection'
        )
    );

    $wp_customize->add_control(
        'sm_header_styles',
        array(
            'settings'      => 'sm_header_styles',
            'section'       => 'soma_header_styles_settings',
            'type'          => 'radio',
            'label'         => __( 'Choose Header Style:', 'somalite' ),
            'description'   => '',
            'choices' => array(
                            'style1' => __('Default Header Style - This will show default header suitable for general website ', 'somalite'),
                            'style2' => __('Shop Header Style - This header style will show header suitable for ecommerce website', 'somalite'),
                            ),
        )
    );
    

    //Sticky Header Settings
    $wp_customize->add_section(
        'soma_sticky_header_settings',
        array (
            'priority'      => 25,
            'capability'    => 'edit_theme_options',
            'theme_supports'=> '',
            'title'         => __( 'Sticky Header & Logo Settings', 'somalite' )
        )
    );

    //enable sticky menu
    $wp_customize->add_setting(
        'sm_sticky_menu',
        array(
            'type' => 'theme_mod',
            'default'           => false,
            'sanitize_callback' => 'somalite_sanitize_checkbox_selection'
        )
    );

    $wp_customize->add_control(
        'sm_sticky_menu',
        array(
            'settings'      => 'sm_sticky_menu',
            'section'       => 'soma_sticky_header_settings',
            'type'          => 'checkbox',
            'label'         => __( 'Enable Sticky Header Feature:', 'somalite' ),
            'description'   => __( 'Choose whether to enable a sticky header feature for the site', 'somalite' ),            
        )
    );

    // Mobile logo
    $wp_customize->add_setting(
        'sm_theme_content_logo',
        array(
            'type' => 'theme_mod',
            'sanitize_callback' => 'somalite_sanitize_image'
        )
    );

    $wp_customize->add_control(
      new WP_Customize_Image_Control(
          $wp_customize,
          'sm_theme_content_logo',
          array(
              'settings'      => 'sm_theme_content_logo',
              'section'       => 'soma_sticky_header_settings',
              'label'         => __( 'Logo for Mobile Menu', 'somalite' ),
              'description'   => __( 'Upload logo for small screen devices. Recommended height is 60px', 'somalite' )
          )
      )
    );

    // Page settings
    $wp_customize->add_section(
        'soma_page_settings',
        array (
            'priority'      => 25,
            'capability'    => 'edit_theme_options',
            'theme_supports'=> '',
            'title'         => __( 'Page Settings', 'somalite' )
        )
    );

    // Background selection
    $wp_customize->add_setting(
        'sm_bg_radio',
        array(
            'type' => 'theme_mod',
            'default'           => 'color',
            'sanitize_callback' => 'somalite_sanitize_radio_bg_selection'
        )
    );

    $wp_customize->add_control(
        'sm_bg_radio',
        array(
            'settings'      => 'sm_bg_radio',
            'section'       => 'soma_page_settings',
            'type'          => 'radio',
            'label'         => __( 'Choose Page Title Background Color or Background Image:', 'somalite' ),
            'description'   => __('This setting will change the background of the page title area.', 'somalite'),
            'choices' => array(
                            'color' => __('Background Color','somalite'),
                            'image' => __('Background Image','somalite'),
                            ),
        )
    );

    // Background color
    $wp_customize->add_setting(
        'sm_bg_color',
        array(
            'type' => 'theme_mod',
            'default'           => '#dd3333',
            'sanitize_callback' => 'sanitize_hex_color'
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
        $wp_customize,
        'sm_bg_color',
        array(
        'label'      => __( 'Select Background Color', 'somalite' ),
        'description'   => __('This setting will add background color to the page title area if Background Color was selected above.', 'somalite'),
        'section'    => 'soma_page_settings',
        'settings'   => 'sm_bg_color',
        ) )
    );


    // Background Image
    $wp_customize->add_setting(
        'sm_bg_image',
        array(
            'type' => 'theme_mod',
            'sanitize_callback' => 'somalite_sanitize_image'
        )
    );

    $wp_customize->add_control(
      new WP_Customize_Image_Control(
          $wp_customize,
          'sm_bg_image',
          array(
              'settings'      => 'sm_bg_image',
              'section'       => 'soma_page_settings',
              'label'         => __( 'Select Background Image', 'somalite' ),
              'description'   => __('This setting will add the background image to the page title area if Background Image was selected above.', 'somalite'),
          )
      )
    );

    // overlay bg
    $wp_customize->add_setting(
        'sm_bg_radio_overlay',
        array(
            'type' => 'theme_mod',
            'default'           => true,
            'sanitize_callback' => 'somalite_sanitize_checkbox_selection'
        )
    );

    $wp_customize->add_control(
        'sm_bg_radio_overlay',
        array(
            'settings'      => 'sm_bg_radio_overlay',
            'section'       => 'soma_page_settings',
            'type'          => 'checkbox',
            'label'         => __( 'Add Dark Overlay over background Image:', 'somalite' ),
            'description'   => __('This setting will add the dark overlay over background image to the page title area if Background Image was selected above.', 'somalite'),           
        )
    );


    // Color Settings 
    $wp_customize->add_section(
        'soma_color_settings',
        array (
            'priority'      => 25,
            'capability'    => 'edit_theme_options',
            'theme_supports'=> '',
            'title'         => __( 'Color Settings', 'somalite' )
        )
    );

    //Heading Color
    $wp_customize->add_setting(
        'sm_headings_color',
        array(
            'type' => 'theme_mod',
            'default'           => '#dd3333',
            'sanitize_callback' => 'sanitize_hex_color'
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
        $wp_customize,
        'sm_headings_color',
        array(
        'label'      => __( 'Select Headings Color', 'somalite' ),
        'section'    => 'soma_color_settings',
        'settings'   => 'sm_headings_color',
        ) )
    );

    //Page Heading Color
    $wp_customize->add_setting(
        'sm_page_heading_color',
        array(
            'type' => 'theme_mod',
            'default'           => '#ffffff',
            'sanitize_callback' => 'sanitize_hex_color'
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
        $wp_customize,
        'sm_page_heading_color',
        array(
        'label'      => __( 'Select Page Title Heading Color', 'somalite' ),
        'section'    => 'soma_color_settings',
        'settings'   => 'sm_page_heading_color',
        ) )
    );

    // Link Color
    $wp_customize->add_setting(
        'sm_link_color',
        array(
            'type' => 'theme_mod',
            'default'           => '#b5b4b4',
            'sanitize_callback' => 'sanitize_hex_color'
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
        $wp_customize,
        'sm_link_color',
        array(
        'label'      => __( 'Select Link Color', 'somalite' ),
        'section'    => 'soma_color_settings',
        'settings'   => 'sm_link_color',
        ) )
    );

    // Link Hover Color
    $wp_customize->add_setting(
        'sm_link_hover_color',
        array(
            'type' => 'theme_mod',
            'default'           => '#dd3333',
            'sanitize_callback' => 'sanitize_hex_color'
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
        $wp_customize,
        'sm_link_hover_color',
        array(
        'label'      => __( 'Select Link Hover Color', 'somalite' ),
        'section'    => 'soma_color_settings',
        'settings'   => 'sm_link_hover_color',
        ) )
    );

    // CTA Button Hover Color
    $wp_customize->add_setting(
        'sm_cta_btn_hover_color',
        array(
            'type' => 'theme_mod',
            'default'           => '#dd3333',
            'sanitize_callback' => 'sanitize_hex_color'
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
        $wp_customize,
        'sm_cta_btn_hover_color',
        array(
        'label'      => __( 'Select Call to Action Section Button Hover Color', 'somalite' ),
        'section'    => 'soma_color_settings',
        'settings'   => 'sm_cta_btn_hover_color',
        ) )
    );  

    $wp_customize->add_setting(
        'sm_cta_content_color',
        array(
            'type' => 'theme_mod',
            'default'           => '#555555',
            'sanitize_callback' => 'sanitize_hex_color'
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
        $wp_customize,
        'sm_cta_content_color',
        array(
        'label'      => __( 'Select Call to Action Section Content Color', 'somalite' ),
        'section'    => 'soma_color_settings',
        'settings'   => 'sm_cta_content_color',
        ) )
    );  


    // Google Fonts Settings
    $wp_customize->add_section(
        'soma_fonts_settings',
        array (
            'priority'      => 25,
            'capability'    => 'edit_theme_options',
            'theme_supports'=> '',
            'title'         => __( 'Fonts Settings', 'somalite' )
        )
    );   

    // Body font name 
    $wp_customize->add_setting(
        'sm_body_font_name',
        array(
            'type' => 'theme_mod',
            'default'           => __('Lato:400,300,700,900','somalite'),
            'sanitize_callback' => 'somalite_sanitize_text',            
        )
    );

    $wp_customize->add_control(
        'sm_body_font_name',
        array(
            'settings'      => 'sm_body_font_name',
            'section'       => 'soma_fonts_settings',
            'type'          => 'textbox',
            'label'         => __( 'Body Font Name', 'somalite' ),
            'description'   => __( 'Enter font name with complete font styles. More info on how to add fonts, please see the documentation of this theme', 'somalite' ),
        )
    );

    // Body font family 
    $wp_customize->add_setting(
        'sm_body_font_family',
        array(
            'type' => 'theme_mod',
            'default'           => __('Lato, sans-serif','somalite'),
            'sanitize_callback' => 'somalite_sanitize_text',            
        )
    );

    $wp_customize->add_control(
        'sm_body_font_family',
        array(
            'settings'      => 'sm_body_font_family',
            'section'       => 'soma_fonts_settings',
            'type'          => 'textbox',
            'label'         => __( 'Body Font Family', 'somalite' ),
            'description'   => __( 'Enter font family for Body. More info on how to add font family, please see the documentation of this theme', 'somalite' ),
        )
    ); 

    // Headings font name 
    $wp_customize->add_setting(
        'sm_heading_font_name',
        array(
            'type' => 'theme_mod',
            'default'           => __('Lato:400,300,700,900','somalite'),
            'sanitize_callback' => 'somalite_sanitize_text',            
        )
    );

    $wp_customize->add_control(
        'sm_heading_font_name',
        array(
            'settings'      => 'sm_heading_font_name',
            'section'       => 'soma_fonts_settings',
            'type'          => 'textbox',
            'label'         => __( 'Headings Font Name', 'somalite' ),
            'description'   => __( 'Enter font name for Headings with complete font styles. More info on how to add fonts, please see the documentation of this theme', 'somalite' ),
        )
    );

    // Headings font family 
    $wp_customize->add_setting(
        'sm_heading_font_family',
        array(
            'type' => 'theme_mod',
            'default'           => __('Lato, sans-serif','somalite'),
            'sanitize_callback' => 'somalite_sanitize_text',            
        )
    );

    $wp_customize->add_control(
        'sm_heading_font_family',
        array(
            'settings'      => 'sm_heading_font_family',
            'section'       => 'soma_fonts_settings',
            'type'          => 'textbox',
            'label'         => __( 'Headings Font Family', 'somalite' ),
            'description'   => __( 'Enter font family for Headings. More info on how to add font family, please see the documentation of this theme', 'somalite' ),
        )
    ); 

    // Body font size
    $wp_customize->add_setting(
        'sm_body_font_size',
        array(
            'type' => 'theme_mod',
            'default'           => '14',
            'sanitize_callback' => 'absint',            
        )
    );

    $wp_customize->add_control(
        'sm_body_font_size',
        array(
            'settings'      => 'sm_body_font_size',
            'section'       => 'soma_fonts_settings',
            'type'          => 'textbox',
            'label'         => __( 'Body Font Size (px)', 'somalite' ),
            'description'   => '',
        )
    );

    // H1 font size 
   $wp_customize->add_setting(
        'sm_h1_font_size',
        array(
            'type' => 'theme_mod',
            'default'           => '34',
            'sanitize_callback' => 'absint',            
        )
    );

    $wp_customize->add_control(
        'sm_h1_font_size',
        array(
            'settings'      => 'sm_h1_font_size',
            'section'       => 'soma_fonts_settings',
            'type'          => 'textbox',
            'label'         => __( 'Heading H1 Font Size (px)', 'somalite' ),
            'description'   => '',
        )
    );

    // H2 font size 
   $wp_customize->add_setting(
        'sm_h2_font_size',
        array(
            'type' => 'theme_mod',
            'default'           => '30',
            'sanitize_callback' => 'absint',            
        )
    );

    $wp_customize->add_control(
        'sm_h2_font_size',
        array(
            'settings'      => 'sm_h2_font_size',
            'section'       => 'soma_fonts_settings',
            'type'          => 'textbox',
            'label'         => __( 'Heading H2 Font Size (px)', 'somalite' ),
            'description'   => '',
        )
    ); 

    // H3 font size 
   $wp_customize->add_setting(
        'sm_h3_font_size',
        array(
            'type' => 'theme_mod',
            'default'           => '25',
            'sanitize_callback' => 'absint',            
        )
    );

    $wp_customize->add_control(
        'sm_h3_font_size',
        array(
            'settings'      => 'sm_h3_font_size',
            'section'       => 'soma_fonts_settings',
            'type'          => 'textbox',
            'label'         => __( 'Heading H3 Font Size (px)', 'somalite' ),
            'description'   => '',
        )
    );

    // H4 font size 
   $wp_customize->add_setting(
        'sm_h4_font_size',
        array(
            'type' => 'theme_mod',
            'default'           => '18',
            'sanitize_callback' => 'absint',            
        )
    );

    $wp_customize->add_control(
        'sm_h4_font_size',
        array(
            'settings'      => 'sm_h4_font_size',
            'section'       => 'soma_fonts_settings',
            'type'          => 'textbox',
            'label'         => __( 'Heading H4 Font Size (px)', 'somalite' ),
            'description'   => '',
        )
    ); 

    // H5 font size 
   $wp_customize->add_setting(
        'sm_h5_font_size',
        array(
            'type' => 'theme_mod',
            'default'           => '16',
            'sanitize_callback' => 'absint',            
        )
    );

    $wp_customize->add_control(
        'sm_h5_font_size',
        array(
            'settings'      => 'sm_h5_font_size',
            'section'       => 'soma_fonts_settings',
            'type'          => 'textbox',
            'label'         => __( 'Heading H5 Font Size (px)', 'somalite' ),
            'description'   => '',
        )
    );

     // H6 font size 
   $wp_customize->add_setting(
        'sm_h6_font_size',
        array(
            'type' => 'theme_mod',
            'default'           => '14',
            'sanitize_callback' => 'absint',            
        )
    );

    $wp_customize->add_control(
        'sm_h6_font_size',
        array(
            'settings'      => 'sm_h6_font_size',
            'section'       => 'soma_fonts_settings',
            'type'          => 'textbox',
            'label'         => __( 'Heading H6 Font Size (px)', 'somalite' ),
            'description'   => '',
        )
    );    

    
    if(somalite_is_woocommerce_activated()){
         //Shop Settings
        $wp_customize->add_section(
            'soma_shop_settings',
            array (
                'priority'      => 25,
                'capability'    => 'edit_theme_options',
                'theme_supports'=> '',
                'title'         => __( 'Shop Settings', 'somalite' )
            )
        );

        // cart menu
        $wp_customize->add_setting(
            'sm_menu_cart',
            array(
                'type' => 'theme_mod',
                'default'           => false,
                'sanitize_callback' => 'somalite_sanitize_checkbox_selection'
            )
        );

        $wp_customize->add_control(
            'sm_menu_cart',
            array(
                'settings'      => 'sm_menu_cart',
                'section'       => 'soma_shop_settings',
                'type'          => 'checkbox',
                'label'         => __( 'Show Menu Cart:', 'somalite' ),
                'description'   => __( 'This will add a cart icon in primary menu of website', 'somalite' ),
            )
        );

        
        // Add to cart button styles
        $wp_customize->add_setting(
            'sm_addcart_styles',
            array(
                'type' => 'theme_mod',
                'default'           => 'center',
                'sanitize_callback' => 'somalite_sanitize_shop_addcart_styles_selection'
            )
        );

        $wp_customize->add_control(
            'sm_addcart_styles',
            array(
                'settings'      => 'sm_addcart_styles',
                'section'       => 'soma_shop_settings',
                'type'          => 'radio',
                'label'         => __( 'Select Add to Cart Button Style:', 'somalite' ),
                'description'   => __('This will change the add to cart button position on every product item listing','somalite'),
                'choices' => array(
                                'left' => __('Left Align Button', 'somalite'),
                                'center' => __('Center Button', 'somalite'),                                
                                ),
            )
        );         
                   
    }

    
     //Blog Settings
    $wp_customize->add_section(
        'soma_blog_settings',
        array (
            'priority'      => 25,
            'capability'    => 'edit_theme_options',
            'theme_supports'=> '',
            'title'         => __( 'Blog Settings', 'somalite' )
        )
    );

    // Blog styles
    $wp_customize->add_setting(
        'sm_blog_style',
        array(
            'type' => 'theme_mod',
            'default'           => 'style2',
            'sanitize_callback' => 'somalite_sanitize_blog_style_radio_selection'
        )
    );

    $wp_customize->add_control(
        'sm_blog_style',
        array(
            'settings'      => 'sm_blog_style',
            'section'       => 'soma_blog_settings',
            'type'          => 'radio',
            'label'         => __( 'Select Blog Style:', 'somalite' ),
            'description'   => '',
            'choices' => array(
                            'style1' => __('1 Column BLog Style', 'somalite'),
                            'style2' => __('2 Columns Blog Style', 'somalite'),
                            ),
        )
    );
    

    //Footer Settings
    $wp_customize->add_section(
        'soma_footer_settings',
        array (
            'priority'      => 25,
            'capability'    => 'edit_theme_options',
            'theme_supports'=> '',
            'title'         => __( 'Footer Settings', 'somalite' )
        )
    );

    // Copyright text
    $wp_customize->add_setting(
        'sm_copyright_text',
        array(
            'type' => 'theme_mod',
            'default'           => __( 'Copyrights 2017 Soma Lite. All Rights Reserved', 'somalite' ),
            'sanitize_callback' => 'somalite_sanitize_textarea'
        )
    );

    $wp_customize->add_control(
        'sm_copyright_text',
        array(
            'settings'      => 'sm_copyright_text',
            'section'       => 'soma_footer_settings',
            'type'          => 'textarea',
            'label'         => __( 'Footer copyright text', 'somalite' ),
            'description'   => __( 'Copyright text to be displayed in the footer. HTML allowed.', 'somalite' )
        )
    );
    

    // Preloader Settings
    $wp_customize->add_section(
        'soma_preloader_settings',
        array (
            'priority'      => 25,
            'capability'    => 'edit_theme_options',
            'theme_supports'=> '',
            'title'         => __( 'Preloader Settings', 'somalite' )
        )
    );

    // Preloader Enable radio button 
    $wp_customize->add_setting(
        'sm_preloader_display',
        array(
            'type' => 'theme_mod',
            'default'           => true,
            'sanitize_callback' => 'somalite_sanitize_checkbox_selection'
        )
    );

    $wp_customize->add_control(
        'sm_preloader_display',
        array(
            'settings'      => 'sm_preloader_display',
            'section'       => 'soma_preloader_settings',
            'type'          => 'checkbox',
            'label'         => __( 'Enable Preloader for site:', 'somalite' ),
            'description'   => __( 'Choose whether to show a preloader before a site opens', 'somalite' ),            
        )
    ); 

    // Image for preloader 
    $wp_customize->add_setting(
        'sm_preloader_image',
        array(
            'type' => 'theme_mod',
            'sanitize_callback' => 'somalite_sanitize_image'
        )
    );

    $wp_customize->add_control(
      new WP_Customize_Image_Control(
          $wp_customize,
          'sm_preloader_image',
          array(
              'settings'      => 'sm_preloader_image',
              'section'       => 'soma_preloader_settings',
              'label'         => __( 'Preloader Image', 'somalite' ),
              'description'   => __( 'Upload image for preloader', 'somalite' )
          )
      )
    );

    // Documentation 
    $wp_customize->add_section(
        'soma_doc_settings',
        array(
            'priority'      => 200,
            'capability'    => 'edit_theme_options',
            'theme_supports'=> '',
            'title'         => __( 'Soma Documentation', 'somalite' ),
            'description' => '<p class="customize-control-title">' .__('Check Complete documention of this theme','somalite'). '</p><h3>' .'<a target="_blank" href="https://www.spiraclethemes.com/soma-documentation/">'. __('View Documentation','somalite'). '</a></h3>',         
        )
    );    
    
    // Documentation information 
    $wp_customize->add_setting(
        'sm_doc_text',
        array(
            'type' => 'info', 
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'esc_attr',                                   
        )
    );

    $wp_customize->add_control(
        new Somalite_Documentation(
            $wp_customize,
            'sm_doc_text',
            array(
                'settings'      => 'sm_doc_text',
                'section'       => 'soma_doc_settings',                            
            )
        )
    ); 


    //Upgrade Pro
    $wp_customize->add_section(
        'soma_buy_settings',
        array(
           'priority'      => 200,
            'capability'    => 'edit_theme_options',
            'theme_supports'=> '',
            'title'         => __( 'Buy Pro Version', 'somalite' ),
            'description' => '<p class="customize-control-title">' .__('Buy Pro version of this theme for extra features and dedicated support','somalite'). '</p><h3>' .'<a target="_blank" href="https://www.spiraclethemes.com/soma-premium-wordpress-theme/">'. __('Buy Pro Version','somalite'). '</a></h3>',         
        )
    );   
       
    
    $wp_customize->add_setting(
        'sm_buy_text',
        array(
            'type' => 'info', 
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'esc_attr',                                   
        )
    );
    
    $wp_customize->add_control(
        new Somalite_Documentation(
            $wp_customize,
            'sm_buy_text',
            array(
                'settings'      => 'sm_buy_text',
                'section'       => 'soma_buy_settings',                           
            )
        )
    );

}
endif;

add_action( 'customize_register', 'somalite_customize_register' );


/**
* Render callback for sm_topbar_phone
*
* 
* @return mixed
*/
if ( ! function_exists( 'somalite_topbar_phone_render_callback' ) ) :
function somalite_topbar_phone_render_callback(){
    return wp_kses_post( get_theme_mod( 'sm_topbar_phone' ) );
}
endif;


/**
* Render callback for sm_home_heading_text
*
* 
* @return mixed
*/
if ( ! function_exists( 'somalite_home_heading_text_render_callback' ) ) :
function somalite_home_heading_text_render_callback() {
    return wp_kses_post( get_theme_mod( 'sm_home_heading_text' ) );
}
endif;

/**
* Render callback for sm_home_subheading_text
*
* 
* @return mixed
*/
if ( ! function_exists( 'somalite_home_subheading_text_render_callback' ) ) :
function somalite_home_subheading_text_render_callback() {
    return wp_kses_post( get_theme_mod( 'sm_home_subheading_text' ) );
}
endif;


/**
 * Sanitize text box.
 *
 * @param string $input
 * @return string
 */
if ( ! function_exists( 'somalite_sanitize_text' ) ) :
function somalite_sanitize_text( $input ) {
    return esc_html( $input );
}
endif;


/**
 * Sanitize Slider radio option1 buttons
 *
 * @param string $input
 * @return string
 */
if ( ! function_exists( 'somalite_sanitize_slider_option1_selection' ) ) :
function somalite_sanitize_slider_option1_selection( $input ) {
    $valid = array(
        'single' => __('Single Background Image','somalite'),
         'slider' => __('Slider Images','somalite'),
     );

     if ( array_key_exists( $input, $valid ) ) {
        return $input;
     } else {
        return '';
     }
}
endif;

/**
 * Sanitize radio option buttons
 *
 * @param string $input
 * @return string
 */
if ( ! function_exists( 'somalite_sanitize_radio_selection' ) ) :
function somalite_sanitize_radio_selection( $input ) {
    $valid = array(
        'yes' => __('Yes', 'somalite'),
        'no' => __('No', 'somalite'),
     );

     if ( array_key_exists( $input, $valid ) ) {
        return $input;
     } else {
        return '';
     }
}
endif;

/**
 * Sanitize checkbox option buttons
 *
 * @param string $input
 * @return bool
 */
if ( ! function_exists( 'somalite_sanitize_checkbox_selection' ) ) :
function somalite_sanitize_checkbox_selection( $input ) {
    return ( ( isset( $input ) && true == $input ) ? true : false );
}
endif;

/**
 * Sanitize blog sidebar radio option 
 *
 * @param string $input
 * @return string
 */
if ( ! function_exists( 'somalite_sanitize_blog_sidebar_radio_selection' ) ) :
function somalite_sanitize_blog_sidebar_radio_selection(  $input ){
    $valid = array(
        'right' => __( 'Right', 'somalite' ),        
     );

     if ( array_key_exists( $input, $valid ) ) {
        return $input;
     } else {
        return '';
     }
}
endif;

/**
 * Sanitize Shop styles radio buttons
 *
 * @param string $input
 * @return string
 */
if ( ! function_exists( 'somalite_sanitize_shop_styles_selection' ) ) :
function somalite_sanitize_shop_styles_selection( $input ) {
    $valid = array(
        'default' => __('Full Width', 'somalite'),
        'right' => __('Rignt Sidebar', 'somalite'),
        'left' => __('Left Sidebar', 'somalite'),
     );

     if ( array_key_exists( $input, $valid ) ) {
        return $input;
     } else {
        return '';
     }
}
endif;

/**
 * Sanitize Shop Add to cart styles radio buttons
 *
 * @param string $input
 * @return string
 */
if ( ! function_exists( 'somalite_sanitize_shop_addcart_styles_selection' ) ) :
function somalite_sanitize_shop_addcart_styles_selection( $input ){
    $valid = array(
        'left' => __('Left Align Button', 'somalite'),
        'center' => __('Center Button', 'somalite'), 
     );

     if ( array_key_exists( $input, $valid ) ) {
        return $input;
     } else {
        return '';
     }
}
endif;



/**
 * Sanitize Shop row items select
 *
 * @param string $input
 * @return string
 */
if ( ! function_exists( 'somalite_sanitize_shop_row_items_selection' ) ) :
function somalite_sanitize_shop_row_items_selection( $input ) {
    $valid = array(        
        '3' =>  __('3', 'somalite'),        
     );

     if ( array_key_exists( $input, $valid ) ) {
        return $input;
     } else {
        return '';
     }
}
endif;



/**
 * Sanitize Footer Widgets Number select
 *
 * @param string $input
 * @return string
 */
if ( ! function_exists( 'somalite_sanitize_footer_widgets_radio_selection' ) ) :
function somalite_sanitize_footer_widgets_radio_selection( $input ){
    $valid = array(
        '4' =>  __('4', 'somalite'),
        '3' =>  __('3', 'somalite'),        
     );

     if ( array_key_exists( $input, $valid ) ) {
        return $input;
     } else {
        return '';
     }
}
endif;



/**
 * Sanitize radio bg option buttons
 *
 * @param string $input
 * @return string
 */
if ( ! function_exists( 'somalite_sanitize_radio_bg_selection' ) ) :
function somalite_sanitize_radio_bg_selection( $input ) {
    $valid = array(        
        'color' => __('Background Color','somalite'),
        'image' =>  __('Background Image','somalite'),
     );

     if ( array_key_exists( $input, $valid ) ) {
        return $input;
     } else {
        return '';
     }
}
endif;

/**
 * Sanitize blog style radio option
 *
 * @param string $input
 * @return string
 */
if ( ! function_exists( 'somalite_sanitize_blog_style_radio_selection' ) ) :
function somalite_sanitize_blog_style_radio_selection( $input ) {
    $valid = array(        
        'style1' => __('1 Column BLog Style', 'somalite'),
        'style2' => __('2 Columns Blog Style', 'somalite'),
     );

     if ( array_key_exists( $input, $valid ) ) {
        return $input;
     } else {
        return '';
     }
}
endif;

/**
 * Sanitize Header style radio option
 *
 * @param string $input
 * @return string
 */
if ( ! function_exists( 'somalite_sanitize_header_style_radio_selection' ) ) :
function somalite_sanitize_header_style_radio_selection( $input ) {
    $valid = array(        
        'style1' => __('Default Header Style - This will show default header suitable for general website ', 'somalite'),
        'style2' => __('Shop Header Style - This header style will show header suitable for ecommerce website', 'somalite'),
     );

     if ( array_key_exists( $input, $valid ) ) {
        return $input;
     } else {
        return '';
     }
}
endif;


/**
 * URL sanitization.
 *
 * @see esc_url_raw() https://developer.wordpress.org/reference/functions/esc_url_raw/
 *
 * @param string $url URL to sanitize.
 * @return string Sanitized URL.
 */
if ( ! function_exists( 'somalite_sanitize_url' ) ) :
function somalite_sanitize_url( $url ) {
    return esc_url_raw( $url );
}
endif;

/**
 * Select sanitization
 * @see sanitize_key()               https://developer.wordpress.org/reference/functions/sanitize_key/
 * @see $wp_customize->get_control() https://developer.wordpress.org/reference/classes/wp_customize_manager/get_control/
 *
 * @param string               $input   Slug to sanitize.
 * @param WP_Customize_Setting $setting Setting instance.
 * @return string Sanitized slug if it is a valid choice; otherwise, the setting default.
 */
if ( ! function_exists( 'somalite_sanitize_select' ) ) :
function somalite_sanitize_select( $input, $setting ) {

    // Ensure input is a slug.
    $input = sanitize_key( $input );

    // Get list of choices from the control associated with the setting.
    $choices = $setting->manager->get_control( $setting->id )->choices;

    // If the input is a valid key, return it; otherwise, return the default.
    return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}
endif;

/**
 * Sanitize textarea.
 *
 * @param string $input
 * @return string
 */
if ( ! function_exists( 'somalite_sanitize_textarea' ) ) :
function somalite_sanitize_textarea( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
}
endif;

/**
 * Sanitize image.
 *
 * @param string               $image   Image filename.
 * @param WP_Customize_Setting $setting Setting instance.
 * @return string The image filename if the extension is allowed; otherwise, the setting default.
 */
if ( ! function_exists( 'somalite_sanitize_image' ) ) :
function somalite_sanitize_image( $image, $setting ) {
    /*
     * Array of valid image file types.
     *
     * The array includes image mime types that are included in wp_get_mime_types()
     */
    $mimes = array(
        'jpg|jpeg|jpe' => 'image/jpeg',
        'gif'          => 'image/gif',
        'png'          => 'image/png',
        'bmp'          => 'image/bmp',
        'tif|tiff'     => 'image/tiff',
        'ico'          => 'image/x-icon'
    );
    // Return an array with file extension and mime_type.
    $file = wp_check_filetype( $image, $mimes );
    // If $image has a valid mime_type, return it; otherwise, return the default.
    return ( $file['ext'] ? $image : $setting->default );
}
endif;

/**
 * Sanitize the Sidebar Position value.
 *
 * @param string $position.
 * @return string (left|right).
 */
if ( ! function_exists( 'somalite_sanitize_sidebar_position' ) ) :
function somalite_sanitize_sidebar_position( $position ) {
    if ( ! in_array( $position, array( 'left', 'right' ) ) ) {
        $position = 'right';
    }
    return $position;
}
endif;


/**
 * HTML sanitization
 *
 * @see wp_filter_post_kses() https://developer.wordpress.org/reference/functions/wp_filter_post_kses/
 *
 * @param string $html HTML to sanitize.
 * @return string Sanitized HTML.
 */
if ( ! function_exists( 'somalite_sanitize_html' ) ) :
function somalite_sanitize_html( $html ) {
    return wp_filter_post_kses( $html );
}
endif;

/**
 * CSS sanitization.
 *
 * @see wp_strip_all_tags() https://developer.wordpress.org/reference/functions/wp_strip_all_tags/
 *
 * @param string $css CSS to sanitize.
 * @return string Sanitized CSS.
 */
if ( ! function_exists( 'somalite_sanitize_css' ) ) :
function somalite_sanitize_css( $css ) {
    return wp_strip_all_tags( $css );
}
endif;

/**
 * Enqueue the customizer stylesheet.
 */
if ( ! function_exists( 'somalite_enqueue_customizer_stylesheets' ) ) :
function somalite_enqueue_customizer_stylesheets() {
    wp_register_style( 'customizer-css', get_template_directory_uri() . '/inc/customizer/assets/customizer.css', NULL, NULL, 'all' );
    wp_enqueue_style( 'customizer-css' );
}
endif;

add_action( 'customize_controls_print_styles', 'somalite_enqueue_customizer_stylesheets' );
