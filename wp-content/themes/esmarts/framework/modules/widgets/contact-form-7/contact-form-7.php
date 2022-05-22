<?php

class eSmartsElatedClassContactForm7Widget extends eSmartsElatedClassWidget {
	public function __construct() {
		parent::__construct(
			'eltdf_contact_form_7_widget',
			esc_html__( 'Elated Contact Form 7 Widget', 'esmarts' ),
			array( 'description' => esc_html__( 'Add contact form 7 to widget areas', 'esmarts' ) )
		);
		
		$this->setParams();
	}
	
	protected function setParams() {
		$cf7 = get_posts( 'post_type="wpcf7_contact_form"&numberposts=-1' );
		
		$contact_forms = array();
		if ( $cf7 ) {
			foreach ( $cf7 as $cform ) {
				$contact_forms[ $cform->ID ] = $cform->post_title;
			}
		} else {
			$contact_forms[0] = esc_html__( 'No contact forms found', 'esmarts' );
		}
		
		$this->params = array(
			array(
				'type'  => 'textfield',
				'name'  => 'extra_class',
				'title' => esc_html__( 'Extra Class Name', 'esmarts' )
			),
			array(
				'type'  => 'textfield',
				'name'  => 'widget_title',
				'title' => esc_html__( 'Widget Title', 'esmarts' )
			),
			array(
				'type'    => 'dropdown',
				'name'    => 'contact_form_skin',
				'title'   => esc_html__( 'Contact Form Skin', 'esmarts' ),
				'options' => array(
					''            => esc_html__( 'Default', 'esmarts' ),
					'boxed-solid' => esc_html__( 'Boxed Solid', 'esmarts' )
				)
			),
			array(
				'type'  => 'textfield',
				'name'  => 'contact_title',
				'title' => esc_html__( 'Contact Form Title', 'esmarts' )
			),
			array(
				'type'  => 'textfield',
				'name'  => 'contact_description',
				'title' => esc_html__( 'Contact Form Description', 'esmarts' )
			),
			array(
				'type'  => 'textfield',
				'name'  => 'contact_mark',
				'title' => esc_html__( 'Contact Form Mark', 'esmarts' )
			),
			array(
				'type'    => 'dropdown',
				'name'    => 'contact_form',
				'title'   => esc_html__( 'Select Contact Form 7', 'esmarts' ),
				'options' => $contact_forms
			),
			array(
				'type'    => 'dropdown',
				'name'    => 'contact_form_style',
				'title'   => esc_html__( 'Contact Form 7 Style', 'esmarts' ),
				'options' => array(
					''                   => esc_html__( 'Default', 'esmarts' ),
					'cf7_custom_style_1' => esc_html__( 'Custom Style 1', 'esmarts' ),
					'cf7_custom_style_2' => esc_html__( 'Custom Style 2', 'esmarts' ),
					'cf7_custom_style_3' => esc_html__( 'Custom Style 3', 'esmarts' ),
					'cf7_custom_style_4' => esc_html__( 'Custom Style 4', 'esmarts' )
				)
			)
		);
	}
	
	public function widget( $args, $instance ) {
		$extra_class = ! empty( $instance['extra_class'] ) ? esc_attr( $instance['extra_class'] ) : '';
		$extra_class .= ! empty( $instance['contact_form_skin'] ) ? ' eltdf-cf7-skin-' . esc_attr( $instance['contact_form_skin'] ) : '';
		?>
		<div class="widget eltdf-contact-form-7-widget <?php echo esc_attr( $extra_class ); ?>">
			<?php if ( ! empty( $instance['widget_title'] ) ) {
				echo wp_kses_post( $args['before_title'] ) . esc_html( $instance['widget_title'] ) . wp_kses_post( $args['after_title'] );
			} ?>
			<div class="eltdf-cf7-content-holder">
				<div class="eltdf-cf7-content-inner">
					<?php if ( ! empty( $instance['contact_mark'] ) ) { ?>
						<h4 class="eltdf-cf7-mark"><?php echo esc_html( $instance['contact_mark'] ); ?></h4>
					<?php } ?>
					<?php if ( ! empty( $instance['contact_title'] ) ) { ?>
						<h4 class="eltdf-cf7-title"><?php echo esc_html( $instance['contact_title'] ); ?></h4>
					<?php } ?>
					<?php if ( ! empty( $instance['contact_description'] ) ) { ?>
						<p class="eltdf-cf7-description"><?php echo esc_html( $instance['contact_description'] ); ?></p>
					<?php } ?>
					<?php if ( ! empty( $instance['contact_form'] ) ) {
						echo do_shortcode( '[contact-form-7 id="' . esc_attr( $instance['contact_form'] ) . '" html_class="' . esc_attr( $instance['contact_form_style'] ) . '"]' );
					} ?>
				</div>
			</div>
		</div>
		<?php
	}
}