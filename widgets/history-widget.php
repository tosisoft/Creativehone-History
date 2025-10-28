<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Elementor List Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Creative_History_Widget extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve list widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name(): string {
		return 'Creative History';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve list widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget title.
	 */
	public function get_title(): string {
		return esc_html__( 'Creative History', 'creativehone-history' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve list widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget icon.
	 */
	public function get_icon(): string {
		return 'eicon-history';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the list widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return array Widget categories.
	 */
	public function get_categories(): array {
		return [ 'general' ];
	}

	/**
	 * Get widget keywords.
	 *
	 * Retrieve the list of keywords the list widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return array Widget keywords.
	 */
	public function get_keywords(): array {
		return [ 'history', 'creative', 'hone' ];
	}

	/**
	 * Get custom help URL.
	 *
	 * Retrieve a URL where the user can get more information about the widget.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget help URL.
	 */
	public function get_custom_help_url(): string {
		return 'https://developers.elementor.com/docs/widgets/';
	}

	/**
	 * Get widget promotion data.
	 *
	 * Retrieve the widget promotion data.
	 *
	 * @since 1.0.0
	 * @access protected
	 * @return array Widget promotion data.
	 */
	protected function get_upsale_data(): array {
		return [
			'condition' => true,
			'image' => esc_url( ELEMENTOR_ASSETS_URL . 'images/go-pro.svg' ),
			'image_alt' => esc_attr__( 'Upgrade', 'creativehone-history' ),
			'title' => esc_html__( 'Promotion heading', 'creativehone-history' ),
			'description' => esc_html__( 'Get the premium version of the widget with additional styling capabilities.', 'creativehone-history' ),
			'upgrade_url' => esc_url( 'https://example.com/upgrade-to-pro/' ),
			'upgrade_text' => esc_html__( 'Upgrade Now', 'creativehone-history' ),
		];
	}

	/**
	 * Whether the widget requires inner wrapper.
	 *
	 * Determine whether to optimize the DOM size.
	 *
	 * @since 1.0.0
	 * @access protected
	 * @return bool Whether to optimize the DOM size.
	 */
	public function has_widget_inner_wrapper(): bool {
		return false;
	}

	/**
	 * Whether the element returns dynamic content.
	 *
	 * Determine whether to cache the element output or not.
	 *
	 * @since 1.0.0
	 * @access protected
	 * @return bool Whether to cache the element output.
	 */
	protected function is_dynamic_content(): bool {
		return false;
	}

	/**
	 * Register list widget controls.
	 *
	 * Add input fields to allow the user to customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function register_controls() {
	    // Content Tab
	    $this->start_controls_section(
	        'content_section',
	        [
	            'label' => __('History Timeline', 'creativehone-history'),
	            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
	        ]
	    );

	    $repeater = new \Elementor\Repeater();

	    $repeater->add_control(
	        'time',
	        [
	            'label'   => __('Time', 'creativehone-history'),
	            'type'    => \Elementor\Controls_Manager::TEXT,
	            'default' => __('10:00 AM', 'creativehone-history'),
	            'label_block' => true,
	        ]
	    );

	    $repeater->add_control(
	        'heading',
	        [
	            'label'   => __('Heading', 'creativehone-history'),
	            'type'    => \Elementor\Controls_Manager::TEXT,
	            'default' => __('Event Title', 'creativehone-history'),
	            'label_block' => true,
	        ]
	    );

	    $repeater->add_control(
	        'description',
	        [
	            'label'   => __('Description', 'creativehone-history'),
	            'type'    => \Elementor\Controls_Manager::TEXTAREA,
	            'default' => __('This is the description of the event.', 'creativehone-history'),
	            'label_block' => true,
	        ]
	    );

	    $this->add_control(
	        'history_timeline',
	        [
	            'label'       => __('Timeline Items', 'creativehone-history'),
	            'type'        => \Elementor\Controls_Manager::REPEATER,
	            'fields'      => $repeater->get_controls(),
	            'title_field' => '{{{ time }}} - {{{ heading }}}',
	        ]
	    );

	    $this->end_controls_section();

	    // STYLE TAB STARTS HERE
	    $this->start_controls_section(
	        'style_section',
	        [
	            'label' => __('Timeline Style', 'creativehone-history'),
	            'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
	        ]
	    );

	    // Time Color
	    $this->add_control(
	        'time_color',
	        [
	            'label'     => __('Time Color', 'creativehone-history'),
	            'type'      => \Elementor\Controls_Manager::COLOR,
	            'selectors' => [
	                '{{WRAPPER}} time' => 'color: {{VALUE}};',
	            ],
	        ]
	    );

	    // Heading Color
	    $this->add_control(
	        'heading_color',
	        [
	            'label'     => __('Heading Color', 'creativehone-history'),
	            'type'      => \Elementor\Controls_Manager::COLOR,
	            'selectors' => [
	                '{{WRAPPER}} .timeline ol li .details h3' => 'color: {{VALUE}};',
	            ],
	        ]
	    );

	    // Description Color
	    $this->add_control(
	        'description_color',
	        [
	            'label'     => __('Description Color', 'creativehone-history'),
	            'type'      => \Elementor\Controls_Manager::COLOR,
	            'selectors' => [
	                '{{WRAPPER}} .timeline ol li .details p' => 'color: {{VALUE}};',
	            ],
	        ]
	    );


	    // Line Vertical Color
	    $this->add_control(
	        'line_vertical_color',
	        [
	            'label'     => __('Line Vertical Color', 'creativehone-history'),
	            'type'      => \Elementor\Controls_Manager::COLOR,
	            'selectors' => [
	                '{{WRAPPER}} .timeline ol::before' => 'background-color: {{VALUE}};',
	            ],
	        ]
	    );


	    // Line Horizontal Color
	    $this->add_control(
	        'line_horizontal_color',
	        [
	            'label'     => __('Line Horizontal Color', 'creativehone-history'),
	            'type'      => \Elementor\Controls_Manager::COLOR,
	            'selectors' => [
	                '{{WRAPPER}} .timeline ol li .time-wrapper::before' => 'background-color: {{VALUE}};',
	            ],
	        ]
	    );


	     //Circle Color
	    $this->add_control(
	        'circle_color',
	        [
	            'label'     => __('Circle Color', 'creativehone-history'),
	            'type'      => \Elementor\Controls_Manager::COLOR,
	            'selectors' => [
	                '{{WRAPPER}} .timeline ol li .time-wrapper::after' => 'background-color: {{VALUE}};',
	            ],
	        ]
	    );

	    // Background Color
	    $this->add_control(
	        'background_color',
	        [
	            'label'     => __('Background Color', 'creativehone-history'),
	            'type'      => \Elementor\Controls_Manager::COLOR,
	            'selectors' => [
	                '{{WRAPPER}} .in-view' => 'background-color: {{VALUE}};',
	            ],
	        ]
	    );

	    // Line Vertical position
	    $this->add_control(
	        'line_vertical_position',
	        [
	            'label'     => __('Line Vertical Position', 'creativehone-history'),
	            'type'      => \Elementor\Controls_Manager::DIMENSIONS,
	            'size_units' => ['px', '%', 'em', 'rem', 'vw'],
	            'default'    => [
		            'left' => '0', // Default value
		            'unit' => 'px', // Default unit
		        ],
	            'selectors' => [
	                '{{WRAPPER}} .timeline ol::before' => 'left: {{LEFT}}{{UNIT}};',
	            ],
	        ]
	    );

	    // Add Font Controls
		$this->add_group_control(
		    \Elementor\Group_Control_Typography::get_type(),
		    [
		        'name'     => 'time_typography',
		        'label'    => __('Time Typography', 'creativehone-history'),
		        'selector' => '{{WRAPPER}} time',
		    ]
		);

		$this->add_group_control(
		    \Elementor\Group_Control_Typography::get_type(),
		    [
		        'name'     => 'heading_typography',
		        'label'    => __('Heading Typography', 'creativehone-history'),
		        'selector' => '{{WRAPPER}} .timeline ol li .details h3',
		    ]
		);

		$this->add_group_control(
		    \Elementor\Group_Control_Typography::get_type(),
		    [
		        'name'     => 'description_typography',
		        'label'    => __('Description Typography', 'creativehone-history'),
		        'selector' => '{{WRAPPER}} .timeline ol li .details p',
		    ]
		);

		// Alignment Control
		$this->add_control(
		    'text_alignment',
		    [
		        'label' => __('Text Alignment', 'creativehone-history'),
		        'type' => \Elementor\Controls_Manager::CHOOSE,
		        'options' => [
		            'left' => [
		                'title' => __('Left', 'creativehone-history'),
		                'icon' => 'eicon-text-align-left',
		            ],
		            'center' => [
		                'title' => __('Center', 'creativehone-history'),
		                'icon' => 'eicon-text-align-center',
		            ],
		            'right' => [
		                'title' => __('Right', 'creativehone-history'),
		                'icon' => 'eicon-text-align-right',
		            ],
		        ],
		        'default' => 'left',
		        'selectors' => [
		            '{{WRAPPER}} .in-view' => 'text-align: {{VALUE}};',
		        ],
		    ]
		);

	    $this->end_controls_section();
	}



	/**
	 * Render list widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {
	    $settings = $this->get_settings_for_display();

	    if (!empty($settings['history_timeline'])) {
	        echo '<section class="timeline"><ol>';
	        foreach ($settings['history_timeline'] as $item) {
	        	echo '<li class="in-view"><div class="item-inner"><div class="time-wrapper">';
	            echo '<time>' . esc_html($item['time']) . '</time>';
	            echo '</div><div class="details">';
	            echo '<h3>' . esc_html($item['heading']) . '</h3>';
	            echo '<p>' . esc_html($item['description']) . '</p>';
	            echo "</div></div></li>";
	        }
	        echo '</ol></section>';
	    }
	}


	/**
	 * Render list widget output in the editor.
	 *
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function content_template(): void {
		?>
		<#
		html_tag = {
			'ordered': 'ol',
			'unordered': 'ul',
			'other': 'ul',
		};
		view.addRenderAttribute( 'list', 'class', 'creativehone-history' );
		#>
		<{{{ html_tag[ settings.marker_type ] }}} {{{ view.getRenderAttributeString( 'list' ) }}}>
			<# _.each( settings.list_items, function( item, index ) {
				const repeater_setting_key = view.getRepeaterSettingKey( 'text', 'list_items', index );
				view.addRenderAttribute( repeater_setting_key, 'class', 'creativehone-history-text' );
				view.addInlineEditingAttributes( repeater_setting_key );
				#>
				<li {{{ view.getRenderAttributeString( repeater_setting_key ) }}}>
					<# const title = item.text; #>
					<# if ( item.link ) { #>
						<# view.addRenderAttribute( `link_${index}`, item.link ); #>
						<a href="{{ item.link.url }}" {{{ view.getRenderAttributeString( `link_${index}` ) }}}>
							{{{title}}}
						</a>
					<# } else { #>
						{{{title}}}
					<# } #>
				</li>
			<# } ); #>
		</{{{ html_tag[ settings.marker_type ] }}}>
		<?php
	}

}
