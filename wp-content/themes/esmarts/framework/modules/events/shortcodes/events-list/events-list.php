<?php
namespace ElatedCore\CPT\Shortcodes\EventsList;

use ElatedCore\CPT\Shortcodes\EventsList\EventsQuery\EventsQuery;
use ElatedCore\Lib;

class EventsList implements Lib\ShortcodeInterface {
	private $base;
	
	public function __construct() {
		$this->base = 'eltdf_events_list';
		
		add_action( 'vc_before_init', array( $this, 'vcMap' ) );
	}
	
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {
		vc_map(
			array(
				'name'                      => esc_html__( 'Elated Events List', 'esmarts' ),
				'base'                      => $this->getBase(),
				'category'                  => esc_html__( 'by ELATED', 'esmarts' ),
				'icon'                      => 'icon-wpb-events-list extended-custom-icon',
				'allowed_container_element' => 'vc_row',
				'params'                    => array_merge(
					array(
						array(
							'type'       => 'dropdown',
							'param_name' => 'type',
							'heading'    => esc_html__( 'Type', 'esmarts' ),
							'value'      => array(
								esc_html__( 'List', 'esmarts' )   => 'list',
								esc_html__( 'Simple', 'esmarts' ) => 'simple'
							),
							'save_always' => true,
							'group'       => esc_html__( 'Layout Options', 'esmarts' )
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'columns',
							'heading'     => esc_html__( 'Number of Columns', 'esmarts' ),
							'value'       => array(
								esc_html__( 'Default', 'esmarts' ) => '',
								esc_html__( 'One', 'esmarts' )     => 'one',
								esc_html__( 'Two', 'esmarts' )     => 'two',
								esc_html__( 'Three', 'esmarts' )   => 'three',
								esc_html__( 'Four', 'esmarts' )    => 'four',
								esc_html__( 'Five', 'esmarts' )    => 'five',
								esc_html__( 'Six', 'esmarts' )     => 'six'
							),
							'description' => esc_html__( 'Default value is Three', 'esmarts' ),
							'group'       => esc_html__( 'Layout Options', 'esmarts' )
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'image_size',
							'heading'     => esc_html__( 'Image Proportions', 'esmarts' ),
							'value'       => array(
								esc_html__( 'Original', 'esmarts' )  => 'full',
								esc_html__( 'Square', 'esmarts' )    => 'square',
								esc_html__( 'Landscape', 'esmarts' ) => 'landscape',
								esc_html__( 'Portrait', 'esmarts' )  => 'portrait'
							),
							'save_always' => true,
							'group'       => esc_html__( 'Layout Options', 'esmarts' )
						),
					),
					EventsQuery::getInstance()->queryVCParams()
				)
			)
		);
	}
	
	public function render( $atts, $content = null ) {
		$default_atts = array(
			'type'       => 'list',
			'columns'    => '',
			'image_size' => ''
		);
		
		$eventsQuery = EventsQuery::getInstance();
		
		$default_atts = array_merge( $default_atts, $eventsQuery->getShortcodeAtts() );
		$params       = shortcode_atts( $default_atts, $atts );
		
		$queryResults = $eventsQuery->buildQueryObject( $params );
		
		$params['query']  = $queryResults;
		$params['caller'] = $this;
		
		$params['type'] = ! empty( $params['type'] ) ? $params['type'] : $default_atts['type'];
		$params['holder_classes'] = 'eltdf-el-' . $params['type'];
		
		$itemClass[] = 'eltdf-events-list-item';
		
		switch ( $params['columns'] ) {
			case 'one':
				$itemClass[] = 'eltdf-grid-col-12';
				break;
			case 'two':
				$itemClass[] = 'eltdf-grid-col-6';
				break;
			case 'three':
				$itemClass[] = 'eltdf-grid-col-4';
				break;
			case 'four':
				$itemClass[] = 'eltdf-grid-col-3';
				$itemClass[] = 'eltdf-grid-col-ipad-landscape-6';
				$itemClass[] = 'eltdf-grid-col-ipad-portrait-12';
				break;
			default:
				$itemClass[] = 'eltdf-grid-col-4';
				break;
		}
		
		$params['item_class'] = implode( ' ', $itemClass );
		
		$params['image_size'] = $this->getImageSize( $params );
		
		ob_start();
		
		esmarts_elated_get_module_template_part( 'templates/events-list-holder', 'events/shortcodes/events-list', '', $params );
		
		$html = ob_get_contents();
		
		ob_end_clean();
		
		return $html;
	}
	
	private function getImageSize( $params ) {
		
		if ( ! empty( $params['image_size'] ) ) {
			$image_size = $params['image_size'];
			
			switch ( $image_size ) {
				case 'landscape':
					$thumb_size = 'esmarts_elated_image_landscape';
					break;
				case 'portrait':
					$thumb_size = 'esmarts_elated_image_portrait';
					break;
				case 'square':
					$thumb_size = 'esmarts_elated_image_square';
					break;
				case 'full':
					$thumb_size = 'full';
					break;
				case 'custom':
					$thumb_size = 'custom';
					break;
				default:
					$thumb_size = 'full';
					break;
			}
			
			return $thumb_size;
		}
	}
}