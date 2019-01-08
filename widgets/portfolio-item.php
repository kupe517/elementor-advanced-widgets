<?php
namespace ElemntorAdvancedWidgets\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * @since 1.1.0
 */
class Portfolio_Item extends Widget_Base {

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
		return 'portfolio_item';
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
		return __( 'Portfolio Item', 'elementor-advanced-widgets' );
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
		return 'eicon-person';
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
			'section_images',
			[
				'label' => __( 'Images', 'elementor-advanced-widgets' ),
			]
		);

		$this->add_responsive_control(
			'align',
			[
				'label' => __( 'Photo Alignment', 'elementor-advanced-widgets' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left'    => [
						'title' => __( 'Left', 'elementor-advanced-widgets' ),
						'icon' => 'fa fa-align-left',
					],
					'right' => [
						'title' => __( 'Right', 'elementor-advanced-widgets' ),
						'icon' => 'fa fa-align-right',
					],
				],
				'prefix_class' => 'c-media%s-align-',
				'default' => '',
			]
		);

		$this->add_control(
			'primary_image',
			[
				'label' => __( 'Primary Image', 'elementor-advanced-widgets' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->add_control(
			'secondary_image',
			[
				'label' => __( 'Background Image', 'elementor-advanced-widgets' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_caption',
			[
				'label' => __( 'Caption', 'elementor-advanced-widgets' ),
			]
		);

		$this->add_control(
			'caption',
			[
				'label' => __( 'Text', 'elementor-advanced-widgets' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'Case Study', 'elementor-advanced-widgets' ),
			]
		);

		$this->add_control(
			'show_caption',
			[
				'label' => __( 'Show Caption', 'elementor-advanced-widgets' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'elementor-advanced-widgets' ),
				'label_off' => __( 'Hide', 'elementor-advanced-widgets' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->end_controls_section();

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
				'label' => __( 'Link', 'plugin-domain' ),
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

		$this->add_control(
			'button_text',
			[
				'label' => __( 'Button Text', 'elementor-advanced-widgets' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'Button Text', 'elementor-advanced-widgets' ),
			]
		);

		$this->end_controls_section();

		/*-----------------------------------------------------------------------------------*/
        /*	STYLE TAB
        /*-----------------------------------------------------------------------------------*/

		$this->start_controls_section(
			'section_Portfolio_Items_styles_general',
			[
				'label' => esc_html__( 'Title', 'elementor-advanced-widgets' ),
				'tab' => Controls_Manager::TAB_STYLE
			]
		);
		$this->add_control(
			'Portfolio_Item_title_color',
			[
				'label' => esc_html__( 'Title Color', 'elementor-advanced-widgets' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#000000',
				'selectors' => [
					'{{WRAPPER}} .c-excerpt__headline' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
      Group_Control_Typography::get_type(),
        [
            'name'                  => 'title_typography',
            'label'                 => esc_html__( 'Typography', 'elementor-advanced-widgets' ),
            'selector'              => '{{WRAPPER}} .c-excerpt__headline',
						'default' 							=> "'Open Sans', sans-serif",
        ]
    );

		$this->end_controls_section();

		$this->start_controls_section(
			'section_Portfolio_Items_styles_description',
			[
				'label' => esc_html__( 'Description', 'elementor-advanced-widgets' ),
				'tab' => Controls_Manager::TAB_STYLE
			]
		);
		$this->add_control(
			'Portfolio_Item_description_color',
			[
				'label' => esc_html__( 'Description Color', 'elementor-advanced-widgets' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#272727',
				'selectors' => [
					'{{WRAPPER}} .c-media__description' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
      Group_Control_Typography::get_type(),
        [
            'name'                  => 'description_typography',
            'label'                 => esc_html__( 'Typography', 'elementor-advanced-widgets' ),
            'selector'              => '{{WRAPPER}} .c-media__description',
						'default' 							=> "'Open Sans', sans-serif",
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

		$this->add_inline_editing_attributes( 'caption', 'none' );
		$this->add_render_attribute( 'caption', 'class', 'c-excerpt__caption' );

		$this->add_inline_editing_attributes( 'headline', 'basic' );

		$this->add_inline_editing_attributes( 'description', 'basic' );
		$this->add_render_attribute( 'description', 'class', 'c-media__description' );

		$this->add_inline_editing_attributes( 'href', 'none' );

		$this->add_inline_editing_attributes( 'button_text', 'none' );
		$this->add_render_attribute( 'button_text', 'class', 'button' );

		$target = $settings['link']['is_external'] ? ' target="_blank"' : '';
		$nofollow = $settings['link']['nofollow'] ? ' rel="nofollow"' : '';
		?>

		<div class="portfolio-item">
			<div class="portfolio-item-content">
				<div class="portfolio-item-content__bg" data-parallax='{"y" : -100}'></div>
				<div class="portfolio-item-content__image">
					<a href="<?php echo $settings['link']['url']; ?>" <?php echo $target .  $nofollow ?> class="c-media__primary">
						<img src="<?php echo $settings['primary_image']['url']; ?>">
					</a>
				</div>
			</div>

			<div class="portfolio-item-copy">
					<?php
						$title_html = sprintf( '<%1$s %2$s>%3$s</%1$s>', $settings['headline_tag'], $this->get_render_attribute_string( 'headline' ), $settings['headline'] );
						echo $title_html;
					?>
				<?php echo $settings['description']; ?>
				<a href="<?php echo $settings['link']['url']; ?>" <?php echo $target .  $nofollow ?> <?php echo $this->get_render_attribute_string( 'button_text' ); ?>>
					<?php echo $settings['button_text']; ?>
				</a>
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
		view.addInlineEditingAttributes( 'caption', 'none' );
		view.addInlineEditingAttributes( 'headline', 'basic' );
		view.addInlineEditingAttributes( 'description', 'basic' );
		view.addInlineEditingAttributes( 'href', 'none' );
		view.addInlineEditingAttributes( 'button_text', 'none' );
		var target = settings.link.is_external ? ' target="_blank"' : '';
		var nofollow = settings.link.nofollow ? ' rel="nofollow"' : '';
		#>
		<div class="portfolio-item">
			<div class="portfolio-item-content">
				<div class="portfolio-item-content__bg" data-parallax='{"y" : -100}'></div>
				<div class="portfolio-item-content__image">
					<a href="{{ settings.link.url }}"{{ target }}{{ nofollow }} class="c-media__primary">
						<img src="{{{ settings.primary_image.url }}}">
					</a>
				</div>
			</div>

			<div class="portfolio-item-copy">
				<h2>
					<#
						var title_html = '<' + settings.headline_tag  + ' ' + view.getRenderAttributeString( 'headline' ) + '>' + settings.headline + '</' + settings.headline_tag + '>';

						print( title_html );
					#>
				</h2>
				<p {{{ view.getRenderAttributeString( 'description' ) }}}>{{{ settings.description }}}</p>
				<a href="{{ settings.link.url }}"{{ target }}{{ nofollow }} class="button">
					{{{ settings.button_text }}}
				</a>
			</div>
		</div>
		<?php
	}
}
