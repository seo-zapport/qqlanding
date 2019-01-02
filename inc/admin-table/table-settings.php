<?php
/**
 *
 *
 * @since 1.0.0
 * @package QQLanding
 */

class QQLanginTableSettings {

	public $tabs 		= array();
	public $sections 	= array();
	public $fields 		= array();
	
	public function admin_menu_pages(){
		add_submenu_page( 'edit.php?post_type=qqlanding-matchx', __( 'Settings','qqlanding' ),__( 'Settings','qqlanding' ), 'manage_options', 'matchx_settings', array( $this, 'match_settings' ) );
	}

	public function match_settings(){
		$active_tab = isset( $_GET['tab'] ) && array_key_exists( $_GET['tab'], $this->tabs ) ? sanitize_text_field( $_GET['tab'] ) : 'general';
		require_once get_template_directory() . '/inc/admin-table/table-settings-template.php';
	}

	public function admin_init(){
		$this->tabs 	= $this->get_tabs();
		$this->sections = $this->get_sections();
		$this->fields 	= $this->get_fields();
		$this->fields 	= $this->initialize_settings();
	}

	public function get_tabs(){
		$tabs = array(
			'general'		=> __( 'General Settings', 'qqlanding' )
		);

		return apply_filters( 'qqlanding_settings_tabs', $tabs );
	}

	public function get_sections(){
		$sections = array(
			array(
				'id'		=> 'qqlanding_general_settings',
				'title'		=> __( 'General Settings', 'qqlanding' ),
				'tab'		=> 'general',
			)
		);

		return apply_filters( 'qqlanding_settings_sections', $sections );
	}

	public function get_fields(){

		$fields = array(
			'qqlanding_general_settings'		=> array(
				array(
					'name'					=> 'columns',
					'label'					=> __( 'Number of Columns', 'qqlanding' ),
					'description'			=> __( 'Enter the number of columns you like to have in the frontpage view.', 'qqlanding', 'qqlanding' ),
					'min'					=> 1,
					'max'					=> 12,
					'step'					=> 1,
					'type'					=> 'number',
					'sanitize_callback'		=> 'intval'
				),
				array(
					'name'					=> 'limit',
					'label'					=> __( 'Row limit', 'qqlanding' ),
					'description'			=> __( 'This is a new test settings', 'qqlanding' ),
					'type'					=> 'text',
					'sanitize_callback'		=> 'intval'
				)
			)
		);
		return apply_filters( 'qqlanding_settings_fields', $fields );
	}

	public function initialize_settings(){

		foreach ($this->sections as $section) {
			$page_hook = "qqlanding_{$section['tab']}_settings";

			if ( false == get_option($section['id']) ) {
				 add_option( $section['id'] );
			}

            if ( isset( $section['description'] ) && ! empty( $section['description'] ) ) {
                $section['description'] = sprintf( '<div class="inside">%s</div>', $section['description'] );
                $callback = create_function( '', 'echo "' . str_replace( '"', '\"', $section['description'] ) . '";' );
            } elseif ( isset( $section['callback'] ) ) {
                $callback = $section['callback'];
            } else {
                $callback = null;
            }

            add_settings_section( $section['id'], $section['title'], $callback, $page_hook );

            //Fields
			$fields = $this->fields[ $section['id'] ];

			foreach ($fields as $option) {
				$name = $option['name'];
				$type = isset( $option['type'] ) ? $option['type'] : 'text';
				$label = isset( $option['label'] ) ? $option['label'] : '';
				$callback = isset( $option['callback'] ) ? $option['callback'] : array( $this, 'callback_' . $type );
				$args = array(
                    'id'                => $name,
                    'class'             => isset( $option['class'] ) ? $option['class'] : $name,
                    'label_for'         => "{$section['id']}[{$name}]",
                    'description'       => isset( $option['description'] ) ? $option['description'] : '',
                    'name'              => $label,
                    'section'           => $section['id'],
                    'size'              => isset( $option['size'] ) ? $option['size'] : null,
                    'options'           => isset( $option['options'] ) ? $option['options'] : '',
                    'sanitize_callback' => isset( $option['sanitize_callback'] ) ? $option['sanitize_callback'] : '',
                    'type'              => $type,
                    'placeholder'       => isset( $option['placeholder'] ) ? $option['placeholder'] : '',
                    'min'               => isset( $option['min'] ) ? $option['min'] : '',
                    'max'               => isset( $option['max'] ) ? $option['max'] : '',
                    'step'              => isset( $option['step'] ) ? $option['step'] : ''		
				);
				//var_dump($args);
				add_settings_field( "{$section['id']}[{$name}]", $label, $callback, $page_hook, $section['id'], $args );
			}

			//Create our settings in the option table
			register_setting( $page_hook, $section['id'], array($this, 'sanitize_options') );
		}
	}

    public function callback_number( $args ) {
	
        $value       = esc_attr( $this->get_option( $args['id'], $args['section'], 0 ) );
        $size        = isset( $args['size'] ) && ! is_null( $args['size'] ) ? $args['size'] : 'regular';
        $type        = isset( $args['type'] ) ? $args['type'] : 'number';
        $placeholder = empty( $args['placeholder'] ) ? '' : ' placeholder="' . $args['placeholder'] . '"';
        $min         = empty( $args['min'] ) ? '' : ' min="' . $args['min'] . '"';
        $max         = empty( $args['max'] ) ? '' : ' max="' . $args['max'] . '"';
        $step        = empty( $args['max'] ) ? '' : ' step="' . $args['step'] . '"';
		
        $html        = sprintf( '<input type="%1$s" class="%2$s-number" id="%3$s[%4$s]" name="%3$s[%4$s]" value="%5$s"%6$s%7$s%8$s%9$s/>', $type, $size, $args['section'], $args['id'], $value, $placeholder, $min, $max, $step );
        $html       .= $this->get_field_description( $args );
		
        echo $html;
		
    }

    public function callback_text( $args ) {
	
        $value       = esc_attr( $this->get_option( $args['id'], $args['section'], '' ) );
        $size        = isset( $args['size'] ) && ! is_null( $args['size'] ) ? $args['size'] : 'regular';
        $type        = isset( $args['type'] ) ? $args['type'] : 'text';
        $placeholder = empty( $args['placeholder'] ) ? '' : ' placeholder="' . $args['placeholder'] . '"';
		
        $html        = sprintf( '<input type="%1$s" class="%2$s-text" id="%3$s[%4$s]" name="%3$s[%4$s]" value="%5$s"%6$s/>', $type, $size, $args['section'], $args['id'], $value, $placeholder );
        $html       .= $this->get_field_description( $args );
		
        echo $html;
		
    }

    public function callback_checkbox( $args ) {
	
        $value = esc_attr( $this->get_option( $args['id'], $args['section'], 0 ) );
		
        $html  = '<fieldset>';
        $html  .= sprintf( '<label for="%1$s[%2$s]">', $args['section'], $args['id'] );
        $html  .= sprintf( '<input type="hidden" name="%1$s[%2$s]" value="0" />', $args['section'], $args['id'] );
        $html  .= sprintf( '<input type="checkbox" class="checkbox" id="%1$s[%2$s]" name="%1$s[%2$s]" value="1" %3$s />', $args['section'], $args['id'], checked( $value, 1, false ) );
        $html  .= sprintf( '%1$s</label>', $args['description'] );
        $html  .= '</fieldset>';
		
        echo $html;
		
    }

    public function callback_multicheck( $args ) {
	
        $value = $this->get_option( $args['id'], $args['section'], array() );
		
        $html  = '<fieldset>';
        $html .= sprintf( '<input type="hidden" name="%1$s[%2$s]" value="" />', $args['section'], $args['id'] );
        foreach ( $args['options'] as $key => $label ) {
            $checked  = in_array( $key, $value ) ? 'checked="checked"' : '';
            $html    .= sprintf( '<label for="%1$s[%2$s][%3$s]">', $args['section'], $args['id'], $key );
            $html    .= sprintf( '<input type="checkbox" class="checkbox" id="%1$s[%2$s][%3$s]" name="%1$s[%2$s][%3$s]" value="%3$s" %4$s />', $args['section'], $args['id'], $key, $checked );
            $html    .= sprintf( '%1$s</label><br>',  $label );
        }
        $html .= $this->get_field_description( $args );
        $html .= '</fieldset>';
		
        echo $html;
		
    }

    public function callback_radio( $args ) {
	
        $value = $this->get_option( $args['id'], $args['section'], '' );
		
        $html  = '<fieldset>';
        foreach ( $args['options'] as $key => $label ) {
            $html .= sprintf( '<label for="%1$s[%2$s][%3$s]">',  $args['section'], $args['id'], $key );
            $html .= sprintf( '<input type="radio" class="radio" id="%1$s[%2$s][%3$s]" name="%1$s[%2$s]" value="%3$s" %4$s />', $args['section'], $args['id'], $key, checked( $value, $key, false ) );
            $html .= sprintf( '%1$s</label><br>', $label );
        }
        $html .= $this->get_field_description( $args );
        $html .= '</fieldset>';
		
        echo $html;
		
    }

    public function callback_select( $args ) {
	
        $value = esc_attr( $this->get_option( $args['id'], $args['section'], '' ) );
        $size  = isset( $args['size'] ) && ! is_null( $args['size'] ) ? $args['size'] : 'regular';
		
        $html  = sprintf( '<select class="%1$s" name="%2$s[%3$s]" id="%2$s[%3$s]">', $size, $args['section'], $args['id'] );
        foreach ( $args['options'] as $key => $label ) {
            $html .= sprintf( '<option value="%s"%s>%s</option>', $key, selected( $value, $key, false ), $label );
        }
        $html .= sprintf( '</select>' );
        $html .= $this->get_field_description( $args );
		
        echo $html;
		
    }

    public function get_field_description( $args ) {
	
        if ( ! empty( $args['description'] ) ) {
            $description = sprintf( '<p class="description">%s</p>', $args['description'] );
        } else {
            $description = '';
        }
		
        return $description;
		
    }

   	public function sanitize_options( $options ) {
	
        if ( ! $options ) {
            return $options;
        }
		
        foreach ( $options as $option_slug => $option_value ) {		
            $sanitize_callback = $this->get_sanitize_callback( $option_slug );
			
            // If callback is set, call it
            if ( $sanitize_callback ) {
                $options[ $option_slug ] = call_user_func( $sanitize_callback, $option_value );
                continue;
            }			
        }
		
        return $options;
		
    }
    
    public function get_sanitize_callback( $slug = '' ) {
	
        if ( empty( $slug ) ) {
            return false;
        }
		
        // Iterate over registered fields and see if we can find proper callback
        foreach ( $this->fields as $section => $options ) {
            foreach ( $options as $option ) {
                if ( $option['name'] != $slug ) {
                    continue;
                }
				
                // Return the callback name
                return isset( $option['sanitize_callback'] ) && is_callable( $option['sanitize_callback'] ) ? $option['sanitize_callback'] : false;
            }
        }
		
        return false;
		
    }

    public function get_option( $option, $section, $default = '' ) {
	
        $options = get_option( $section );
		
        if ( ! empty( $options[ $option ] ) ) {
            return $options[ $option ];
        }
		
        return $default;
		
    }
}