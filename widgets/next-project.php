<?php
namespace ElemntorAdvancedWidgets\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * @since 1.1.0
 */
class Next_Project extends Widget_Base {

	/**
	 * Retrieve the widget name.
	 *
	 * @since 1.1.0
	 *
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'Next_Project';
	}

	/**
	 * Retrieve the widget title.
	 *
	 * @since 1.1.0
	 *
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Next Project', 'elementor-advanced-widgets' );
	}

	/**
	 * Retrieve the widget icon.
	 *
	 * @since 1.1.0
	 *
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-call-to-action';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	 *
	 * Used to determine where to display the widget in the editor.
	 *
	 * Note that currently Elementor supports only one category.
	 * When multiple categories passed, Elementor uses the first one.
	 *
	 * @since 1.1.0
	 *
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'general' ];
	}

	/**
	 * Register the widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.1.0
	 *
	 * @access protected
	 */
	protected function _register_controls() {

		$this->start_controls_section(
			'section_headline',
			[
				'label' => __( 'Headline', 'elementor-advanced-widgets' ),
			]
		);

		$this->add_control(
			'headline',
			[
				'label' => __( 'Headline', 'elementor-advanced-widgets' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'Headline', 'elementor-advanced-widgets' ),
			]
		);

		$this->add_control(
			'headline_tag',
			[
				'label' => __( 'Headline HTML Tag', 'elementor-advanced-widgets' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'h1' => 'H1',
					'h2' => 'H2',
					'h3' => 'H3',
					'h4' => 'H4',
					'h5' => 'H5',
					'h6' => 'H6',
					'div' => 'div',
					'span' => 'span',
					'p' => 'p',
				],
				'default' => 'h2',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_description',
			[
				'label' => __( 'Description', 'elementor-advanced-widgets' ),
			]
		);

		$this->add_control(
			'description',
			[
				'label' => __( 'Description', 'elementor-advanced-widgets' ),
				'type' => Controls_Manager::WYSIWYG,
				'default' => __( 'Description', 'elementor-advanced-widgets' ),
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_button',
			[
				'label' => __( 'Button', 'elementor-advanced-widgets' ),
			]
		);

		$this->add_control(
			'link',
			[
				'label' => __( 'Link', 'elementor-advanced-widgets' ),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'elementor-advanced-widgets' ),
				'show_external' => true,
				'default' => [
					'url' => '',
					'is_external' => false,
					'nofollow' => false,
				],
			]
		);

		$this->end_controls_section();

		/*-----------------------------------------------------------------------------------*/
        /*	STYLE TAB
        /*-----------------------------------------------------------------------------------*/

		$this->start_controls_section(
			'section_Next_Projects_styles_general',
			[
				'label' => esc_html__( 'Title', 'elementor-advanced-widgets' ),
				'tab' => Controls_Manager::TAB_STYLE
			]
		);
		$this->add_control(
			'Next_Project_title_color',
			[
				'label' => esc_html__( 'Title Color', 'elementor-advanced-widgets' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .next-project__info-title' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
      Group_Control_Typography::get_type(),
        [
            'name'                  => 'title_typography',
            'label'                 => esc_html__( 'Typography', 'elementor-advanced-widgets' ),
            'selector'              => '{{WRAPPER}} .next-project__info-title',
						'default' 							=> "'Poppins', sans-serif",
        ]
    );

		$this->end_controls_section();

		$this->start_controls_section(
			'section_Next_Projects_styles_description',
			[
				'label' => esc_html__( 'Description', 'elementor-advanced-widgets' ),
				'tab' => Controls_Manager::TAB_STYLE
			]
		);
		$this->add_control(
			'Next_Project_description_color',
			[
				'label' => esc_html__( 'Description Color', 'elementor-advanced-widgets' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .next-project__info-description' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
      Group_Control_Typography::get_type(),
        [
            'name'                  => 'description_typography',
            'label'                 => esc_html__( 'Typography', 'elementor-advanced-widgets' ),
            'selector'              => '{{WRAPPER}} .next-project__info-description',
						'default' 							=> "'Poppins', sans-serif",
        ]
    );

		$this->end_controls_section();
	}

	/**
	 * Render the widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.1.0
	 *
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();


		$this->add_inline_editing_attributes( 'headline', 'basic' );

		$this->add_inline_editing_attributes( 'description', 'basic' );
		$this->add_render_attribute( 'description', 'class', 'next-project__info-description' );

		$this->add_inline_editing_attributes( 'href', 'none' );

		$target = $settings['link']['is_external'] ? ' target="_blank"' : '';
		$nofollow = $settings['link']['nofollow'] ? ' rel="nofollow"' : '';
		?>

		<div class="next-project">

			<div class="next-project--content">

				<div class="next-project__header">
					<span>Next Project</span>
				</div>

				<div class="next-project__info">
					<div class="next-project__info--container">
						<div class="next-project__info-title">
							<?php
								$title_html = sprintf( '<%1$s %2$s>%3$s</%1$s>', $settings['headline_tag'], $this->get_render_attribute_string( 'headline' ), $settings['headline'] );
								echo $title_html;
							?>
						</div>
						<?php echo $settings['description']; ?>
					</div>
				</div>

				<div class="next-project__cta">
					<div class="next-project__cta-button">
						<a href="<?php echo $settings['link']['url']; ?>" <?php echo $target .  $nofollow ?>>
							<svg xmlns="http://www.w3.org/2000/svg" width="57" height="57" viewBox="0 0 57 57">
								<g fill="none" fill-rule="evenodd" transform="translate(2.3 2.23)">
									<circle cx="26.218" cy="26.236" r="26.124" stroke="#FFF" stroke-width="3" />
									<polygon fill="#FFF" points="24.402 17.16 22.289 19.274 29.148 26.133 22.289 32.992 24.402 35.105 33.375 26.133" />
								</g>
							</svg>
						</a>
					</div>
				</div>

			</div>

		</div>
		<?php
	}

	/**
	 * Render the widget output in the editor.
	 *
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	 *
	 * @since 1.1.0
	 *
	 * @access protected
	 */
	protected function _content_template() {
		?>
		<#
		view.addInlineEditingAttributes( 'headline', 'basic' );
		view.addInlineEditingAttributes( 'description', 'basic' );
		view.addInlineEditingAttributes( 'href', 'none' );
		var target = settings.link.is_external ? ' target="_blank"' : '';
		var nofollow = settings.link.nofollow ? ' rel="nofollow"' : '';
		#>

		<div class="next-project">

			<div class="next-project--content">

				<div class="next-project__header">
					<span>Next Project</span>
				</div>

				<div class="next-project__info">
					<div class="next-project__info-title">
						<#
							var title_html = '<' + settings.headline_tag  + ' ' + view.getRenderAttributeString( 'headline' ) + '>' + settings.headline + '</' + settings.headline_tag + '>';

							print( title_html );
						#>
					</div>
					<div {{{ view.getRenderAttributeString( 'description' ) }}}>{{{ settings.description }}}</div>
				</div>

				<div class="next-project__cta">
					<div class="next-project__cta-button">
						<a href="{{ settings.link.url }}"{{ target }}{{ nofollow }}>
							<svg xmlns="http://www.w3.org/2000/svg" width="57" height="57" viewBox="0 0 57 57">
								<g fill="none" fill-rule="evenodd" transform="translate(2.3 2.23)">
									<circle cx="26.218" cy="26.236" r="26.124" stroke="#FFF" stroke-width="3" />
									<polygon fill="#FFF" points="24.402 17.16 22.289 19.274 29.148 26.133 22.289 32.992 24.402 35.105 33.375 26.133" />
								</g>
							</svg>
						</a>
					</div>
				</div>

			</div>

		</div>
		<?php
	}
}
