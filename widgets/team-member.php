<?php
namespace ElemntorAdvancedWidgets\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * @since 1.1.0
 */
class Team_Member extends Widget_Base {

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
		return 'team-member';
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
		return __( 'Team Member', 'elementor-advanced-widgets' );
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
			'section_content',
			[
				'label' => __( 'Content', 'elementor-advanced-widgets' ),
			]
		);

		$this->add_control(
			'image',
			[
				'label' => __( 'Choose Image', 'elementor-advanced-widgets' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->add_control(
			'name',
			[
				'label' => __( 'Name', 'elementor-advanced-widgets' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'Name', 'elementor-advanced-widgets' ),
			]
		);

		$this->add_control(
			'title',
			[
				'label' => __( 'Job Title', 'elementor-advanced-widgets' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'Job Title', 'elementor-advanced-widgets' ),
			]
		);

		$this->add_control(
			'bio',
			[
				'label' => __( 'Bio', 'elementor-advanced-widgets' ),
				'type' => Controls_Manager::WYSIWYG,
				'default' => __( 'Bio', 'elementor-advanced-widgets' ),
			]
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'section_team_members_styles_general',
			[
				'label' => esc_html__( 'Team Member Styles', 'elementor-advanced-widgets' ),
				'tab' => Controls_Manager::TAB_STYLE
			]
		);

		$this->add_control(
			'team_member_title_color',
			[
				'label' => esc_html__( 'Job Title Color', 'elementor-advanced-widgets' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#272727',
				'selectors' => [
					'{{WRAPPER}} .team-member-title' => 'color: {{VALUE}};',
				],
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

		$this->add_inline_editing_attributes( 'name', 'none' );
		$this->add_inline_editing_attributes( 'title', 'basic' );
		$this->add_inline_editing_attributes( 'bio', 'advanced' );
		?>

		<?php echo '<img src="' . $settings['image']['url'] . '" alt="">'; ?>
		<h2 <?php echo $this->get_render_attribute_string( 'name' ); ?>><?php echo $settings['name']; ?></h2>
		<div class="team-member-title" <?php echo $this->get_render_attribute_string( 'title' ); ?>><?php echo $settings['title']; ?></div>
		<div <?php echo $this->get_render_attribute_string( 'bio' ); ?>><?php echo $settings['bio']; ?></div>
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
		view.addInlineEditingAttributes( 'name', 'none' );
		view.addInlineEditingAttributes( 'title', 'basic' );
		view.addInlineEditingAttributes( 'bio', 'advanced' );
		#>
		<img src="{{{ settings.image.url }}}">
		<h2 {{{ view.getRenderAttributeString( 'name' ) }}}>{{{ settings.name }}}</h2>
		<div {{{ view.getRenderAttributeString( 'title' ) }}}>{{{ settings.title }}}</div>
		<div {{{ view.getRenderAttributeString( 'bio' ) }}}>{{{ settings.bio }}}</div>
		<?php
	}
}
