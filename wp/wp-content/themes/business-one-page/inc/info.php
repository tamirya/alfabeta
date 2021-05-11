<?php
/**
 * Business One Page Theme Info
 *
 * @package Business_One_Page
 */

function business_one_page_customizer_theme_info( $wp_customize ) {
	
    $wp_customize->add_section( 'theme_info' , array(
		'title'       => __( 'Information Links' , 'business-one-page' ),
		'priority'    => 6,
		));

	$wp_customize->add_setting('theme_info_theme',array(
		'default' => '',
		'sanitize_callback' => 'wp_kses_post',
		));
    
   	$theme_info = '';
	$theme_info .= '<h3 class="sticky_title">' . __( 'Need help?', 'business-one-page' ) . '</h3>';
    $theme_info .= '<span class="sticky_info_row"><label class="row-element">' . __( 'View demo', 'business-one-page' ) . ': </label><a href="' . esc_url( 'https://raratheme.com/previews/?theme=business-one-page' ) . '" target="_blank">' . __( 'here', 'business-one-page' ) . '</a></span><br />';
	
	$theme_info .= '<span class="sticky_info_row"><label class="row-element">' . __( 'View documentation', 'business-one-page' ) . ': </label><a href="' . esc_url( 'https://raratheme.com/documentation/business-one-page/' ) . '" target="_blank">' . __( 'here', 'business-one-page' ) . '</a></span><br />';
    
    $theme_info .= '<span class="sticky_info_row"><label class="row-element">' . __( 'Support ticket', 'business-one-page' ) . ': </label><a href="' . esc_url( 'https://raratheme.com/support-ticket/' ) . '" target="_blnak">' . __( 'here', 'business-one-page' ) . '</a></span><br />';
	
	$theme_info .= '<span class="sticky_info_row"><label class="more-detail row-element">' . __( 'More Details', 'business-one-page' ) . ': </label><a href="' . esc_url( 'https://raratheme.com/wordpress-themes/' ) . '" target="_blank">' . __( 'here', 'business-one-page' ) . '</a></span><br />';

	$wp_customize->add_control( new Theme_Info_Custom_Control( $wp_customize ,'theme_info_theme',array(
		'label' => __( 'About Business One Page' , 'business-one-page' ),
		'section' => 'theme_info',
		'description' => $theme_info
		)));

	$wp_customize->add_setting('theme_info_more_theme',array(
		'default' => '',
		'sanitize_callback' => 'wp_kses_post',
		));
    
    $theme_info = '<a class="upgrade-pro" target="_blank" href="' . esc_url( 'https://raratheme.com/wordpress-themes/business-one-page-pro/') . '"><img src="' . esc_url( get_template_directory_uri() . '/images/upgrade.png' ) . '" alt="UPGRADE TO BUSINESS ONE PAGE PRO" /></a>';
	
	$wp_customize->add_control( new Theme_Info_Custom_Control( $wp_customize ,'theme_info_more_theme',array(
		'label' => __( 'Pro Version' , 'business-one-page' ),
		'section' => 'theme_info',
		'description' => $theme_info
		)));

	$wp_customize->add_setting('theme_info_pro_theme',array(
		'default' => '',
		'sanitize_callback' => 'wp_kses_post',
		));

}
add_action( 'customize_register', 'business_one_page_customizer_theme_info' );


if( class_exists( 'WP_Customize_control' ) ){

	class Theme_Info_Custom_Control extends WP_Customize_Control
	{
    	/**
       	* Render the content on the theme customizer page
       	*/
       	public function render_content()
       	{
       		?>
       		<label>
       			<strong class="customize-text_editor"><?php echo esc_html( $this->label ); ?></strong>
       			<br />
       			<span class="customize-text_editor_desc">
       				<?php echo wp_kses_post( $this->description ); ?>
       			</span>
       		</label>
       		<?php
       	}
    }//editor close
}//class close

if( class_exists( 'WP_Customize_Section' ) ) :
/**
 * Adding Go to Pro Section in Customizer
 * https://github.com/justintadlock/trt-customizer-pro
 */
class Business_One_Page_Customize_Section_Pro extends WP_Customize_Section {

	/**
	 * The type of customize section being rendered.
	 *
	 * @since  1.0.0
	 * @access public
	 * @var    string
	 */
	public $type = 'pro-section';

	/**
	 * Custom button text to output.
	 *
	 * @since  1.0.0
	 * @access public
	 * @var    string
	 */
	public $pro_text = '';

	/**
	 * Custom pro button URL.
	 *
	 * @since  1.0.0
	 * @access public
	 * @var    string
	 */
	public $pro_url = '';

	/**
	 * Add custom parameters to pass to the JS via JSON.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function json() {
		$json = parent::json();

		$json['pro_text'] = $this->pro_text;
		$json['pro_url']  = esc_url( $this->pro_url );

		return $json;
	}

	/**
	 * Outputs the Underscore.js template.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	protected function render_template() { ?>
		<li id="accordion-section-{{ data.id }}" class="accordion-section control-section control-section-{{ data.type }} cannot-expand">
			<h3 class="accordion-section-title">
				{{ data.title }}
				<# if ( data.pro_text && data.pro_url ) { #>
					<a href="{{ data.pro_url }}" class="button button-secondary alignright" target="_blank">{{ data.pro_text }}</a>
				<# } #>
			</h3>
		</li>
	<?php }
}
endif;

add_action( 'customize_register', 'business_one_page_sections_pro' );
function business_one_page_sections_pro( $manager ) {
	// Register custom section types.
	$manager->register_section_type( 'Business_One_Page_Customize_Section_Pro' );

	// Register sections.
	$manager->add_section(
		new Business_One_Page_Customize_Section_Pro(
			$manager,
			'business_one_page_view_pro',
			array(
				'title'    => esc_html__( 'Pro Available', 'business-one-page' ),
                'priority' => 5, 
				'pro_text' => esc_html__( 'VIEW PRO THEME', 'business-one-page' ),
				'pro_url'  => 'https://raratheme.com/wordpress-themes/business-one-page-pro/'
			)
		)
	);
}