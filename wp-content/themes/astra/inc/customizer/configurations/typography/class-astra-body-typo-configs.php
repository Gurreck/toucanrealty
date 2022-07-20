<?php
/**
 * Styling Options for Astra Theme.
 *
 * @package     Astra
 * @author      Astra
 * @copyright   Copyright (c) 2020, Astra
 * @link        https://wpastra.com/
 * @since       Astra 1.0.15
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Astra_Body_Typo_Configs' ) ) {

	/**
	 * Customizer Sanitizes Initial setup
	 */
	class Astra_Body_Typo_Configs extends Astra_Customizer_Config_Base {

		/**
		 * Register Body Typography Customizer Configurations.
		 *
		 * @param Array                $configurations Astra Customizer Configurations.
		 * @param WP_Customize_Manager $wp_customize instance of WP_Customize_Manager.
		 * @since 1.4.3
		 * @return Array Astra Customizer Configurations with updated configurations.
		 */
		public function register_configuration( $configurations, $wp_customize ) {

			$typo_section = astra_has_gcp_typo_preset_compatibility() ? 'section-typography' : 'section-body-typo';

			$_configs = array(

				/**
				 * Option: Body font family.
				 */
				array(
					'name'      => ASTRA_THEME_SETTINGS . '[ast-body-font-settings]',
					'default'   => astra_get_option( 'ast-body-font-settings' ),
					'type'      => 'control',
					'control'   => 'ast-settings-group',
					'title'     => __( 'Body Font', 'astra' ),
					'section'   => $typo_section,
					'transport' => 'postMessage',
					'priority'  => 6,
				),

				/**
				 * Option: Font Family
				 */
				array(
					'name'        => 'body-font-family',
					'parent'      => ASTRA_THEME_SETTINGS . '[ast-body-font-settings]',
					'type'        => 'sub-control',
					'control'     => 'ast-font',
					'font_type'   => 'ast-font-family',
					'ast_inherit' => __( 'Default System Font', 'astra' ),
					'default'     => astra_get_option( 'body-font-family' ),
					'section'     => $typo_section,
					'priority'    => 6,
					'title'       => __( 'Font Family', 'astra' ),
					'connect'     => ASTRA_THEME_SETTINGS . '[body-font-weight]',
					'variant'     => ASTRA_THEME_SETTINGS . '[body-font-variant]',
				),

				/**
				 * Option: Font Variant
				 */
				array(
					'name'              => 'body-font-variant',
					'type'              => 'sub-control',
					'parent'            => ASTRA_THEME_SETTINGS . '[ast-body-font-settings]',
					'control'           => 'ast-font-variant',
					'sanitize_callback' => array( 'Astra_Customizer_Sanitizes', 'sanitize_font_variant' ),
					'default'           => astra_get_option( 'body-font-variant' ),
					'ast_inherit'       => __( 'Default', 'astra' ),
					'help'              => __( 'Selected variants will load from Google.', 'astra' ),
					'section'           => $typo_section,
					'priority'          => 6,
					'title'             => __( 'Variants', 'astra' ),
					'variant'           => ASTRA_THEME_SETTINGS . '[body-font-family]',
					'context'           => array(
						array(
							'setting'  => ASTRA_THEME_SETTINGS . '[body-font-family]',
							'operator' => '!=',
							'value'    => 'inherit',
						),
					),
				),

				/**
				 * Option: Font Weight
				 */
				array(
					'name'              => 'body-font-weight',
					'type'              => 'sub-control',
					'parent'            => ASTRA_THEME_SETTINGS . '[ast-body-font-settings]',
					'control'           => 'ast-font',
					'font_type'         => 'ast-font-weight',
					'sanitize_callback' => array( 'Astra_Customizer_Sanitizes', 'sanitize_font_weight' ),
					'default'           => astra_get_option( 'body-font-weight' ),
					'ast_inherit'       => __( 'Default', 'astra' ),
					'section'           => $typo_section,
					'priority'          => 15,
					'title'             => __( 'Weight', 'astra' ),
					'connect'           => 'body-font-family',
				),

				/**
				 * Option: Body Text Transform
				 */
				array(
					'name'     => 'body-text-transform',
					'type'     => 'sub-control',
					'parent'   => ASTRA_THEME_SETTINGS . '[ast-body-font-settings]',
					'control'  => 'ast-select',
					'section'  => $typo_section,
					'default'  => astra_get_option( 'body-text-transform' ),
					'priority' => 20,
					'lazy'     => true,
					'title'    => __( 'Text Transform', 'astra' ),
					'choices'  => array(
						''           => __( 'Default', 'astra' ),
						'none'       => __( 'None', 'astra' ),
						'capitalize' => __( 'Capitalize', 'astra' ),
						'uppercase'  => __( 'Uppercase', 'astra' ),
						'lowercase'  => __( 'Lowercase', 'astra' ),
					),
				),

				/**
				 * Option: Body Font Size
				 */
				array(
					'name'        => 'font-size-body',
					'type'        => 'sub-control',
					'parent'      => ASTRA_THEME_SETTINGS . '[ast-body-font-settings]',
					'control'     => 'ast-responsive-slider',
					'section'     => $typo_section,
					'default'     => astra_get_option( 'font-size-body' ),
					'priority'    => 10,
					'lazy'        => true,
					'title'       => __( 'Size', 'astra' ),
					'suffix'      => 'px',
					'input_attrs' => array(
						'min' => 0,
					),
					'units'       => array(
						'px' => 'px',
					),
				),

				/**
				 * Option: Body Line Height
				 */
				array(
					'name'              => 'body-line-height',
					'type'              => 'sub-control',
					'parent'            => ASTRA_THEME_SETTINGS . '[ast-body-font-settings]',
					'control'           => 'ast-slider',
					'section'           => $typo_section,
					'lazy'              => true,
					'default'           => astra_get_option( 'body-line-height' ),
					'sanitize_callback' => array( 'Astra_Customizer_Sanitizes', 'sanitize_number_n_blank' ),
					'priority'          => 25,
					'title'             => __( 'Line Height', 'astra' ),
					'suffix'            => 'em',
					'input_attrs'       => array(
						'min'  => 1,
						'step' => 0.01,
						'max'  => 5,
					),
				),

				/**
				 * Option: Hedings font family.
				 */
				array(
					'name'      => ASTRA_THEME_SETTINGS . '[ast-headings-font-settings]',
					'default'   => astra_get_option( 'ast-headings-font-settings' ),
					'type'      => 'control',
					'control'   => 'ast-settings-group',
					'title'     => __( 'Headings Font', 'astra' ),
					'section'   => $typo_section,
					'divider'   => array( 'ast_class' => 'ast-bottom-divider' ),
					'transport' => 'postMessage',
					'priority'  => 10,
				),

				/**
				 * Option: Headings Font Family
				 */
				array(
					'name'      => 'headings-font-family',
					'type'      => 'sub-control',
					'parent'    => ASTRA_THEME_SETTINGS . '[ast-headings-font-settings]',
					'control'   => 'ast-font',
					'font_type' => 'ast-font-family',
					'divider'   => array( 'ast_class' => 'ast-top-divider' ),
					'default'   => astra_get_option( 'headings-font-family' ),
					'title'     => __( 'Font Family', 'astra' ),
					'section'   => $typo_section,
					'priority'  => 26,
					'connect'   => ASTRA_THEME_SETTINGS . '[headings-font-weight]',
					'variant'   => ASTRA_THEME_SETTINGS . '[headings-font-variant]',
				),

				/**
				 * Option: Font Variant
				 */
				array(
					'name'              => 'headings-font-variant',
					'type'              => 'sub-control',
					'help'              => __( 'Selected variants will load from Google.', 'astra' ),
					'parent'            => ASTRA_THEME_SETTINGS . '[ast-headings-font-settings]',
					'control'           => 'ast-font-variant',
					'sanitize_callback' => array( 'Astra_Customizer_Sanitizes', 'sanitize_font_variant' ),
					'default'           => astra_get_option( 'headings-font-variant' ),
					'ast_inherit'       => __( 'Default', 'astra' ),
					'section'           => $typo_section,
					'priority'          => 26,
					'title'             => __( 'Variants', 'astra' ),
					'variant'           => ASTRA_THEME_SETTINGS . '[headings-font-family]',
					'context'           => array(
						array(
							'setting'  => ASTRA_THEME_SETTINGS . '[headings-font-family]',
							'operator' => '!=',
							'value'    => 'inherit',
						),
					),
				),

				/**
				 * Option: Headings Font Weight
				 */
				array(
					'name'              => 'headings-font-weight',
					'type'              => 'sub-control',
					'parent'            => ASTRA_THEME_SETTINGS . '[ast-headings-font-settings]',
					'control'           => 'ast-font',
					'font_type'         => 'ast-font-weight',
					'sanitize_callback' => array( 'Astra_Customizer_Sanitizes', 'sanitize_font_weight' ),
					'default'           => astra_get_option( 'headings-font-weight' ),
					'title'             => __( 'Weight', 'astra' ),
					'section'           => $typo_section,
					'priority'          => 26,
					'connect'           => 'headings-font-family',
				),

				/**
				 * Option: Headings Text Transform
				 */
				array(
					'name'     => 'headings-text-transform',
					'type'     => 'sub-control',
					'parent'   => ASTRA_THEME_SETTINGS . '[ast-headings-font-settings]',
					'control'  => 'ast-select',
					'section'  => $typo_section,
					'title'    => __( 'Text Transform', 'astra' ),
					'lazy'     => true,
					'default'  => astra_get_option( 'headings-text-transform' ),
					'priority' => 26,
					'choices'  => array(
						''           => __( 'Inherit', 'astra' ),
						'none'       => __( 'None', 'astra' ),
						'capitalize' => __( 'Capitalize', 'astra' ),
						'uppercase'  => __( 'Uppercase', 'astra' ),
						'lowercase'  => __( 'Lowercase', 'astra' ),
					),
				),

				/**
				 * Option: Heading <H1> Line Height
				 */
				array(
					'name'              => 'headings-line-height',
					'section'           => $typo_section,
					'default'           => astra_get_option( 'headings-line-height' ),
					'sanitize_callback' => array( 'Astra_Customizer_Sanitizes', 'sanitize_number_n_blank' ),
					'type'              => 'sub-control',
					'parent'            => ASTRA_THEME_SETTINGS . '[ast-headings-font-settings]',
					'lazy'              => true,
					'control'           => 'ast-slider',
					'title'             => __( 'Line Height', 'astra' ),
					'transport'         => 'postMessage',
					'priority'          => 26,
					'suffix'            => 'em',
					'input_attrs'       => array(
						'min'  => 1,
						'step' => 0.01,
						'max'  => 5,
					),
					'divider'           => array( 'ast_class' => 'ast-bottom-divider' ),
				),

				/**
				 * Option: Paragraph Margin Bottom
				 */
				array(
					'name'              => ASTRA_THEME_SETTINGS . '[para-margin-bottom]',
					'type'              => 'control',
					'control'           => 'ast-slider',
					'default'           => astra_get_option( 'para-margin-bottom' ),
					'sanitize_callback' => array( 'Astra_Customizer_Sanitizes', 'sanitize_number_n_blank' ),
					'transport'         => 'postMessage',
					'section'           => $typo_section,
					'priority'          => 31,
					'title'             => __( 'Paragraph Margin Bottom', 'astra' ),
					'suffix'            => 'em',
					'lazy'              => true,
					'input_attrs'       => array(
						'min'  => 0.5,
						'step' => 0.01,
						'max'  => 5,
					),
					'divider'           => array( 'ast_class' => 'ast-top-divider' ),
				),

				/**
				 * Option: Underline links in entry-content.
				 */
				array(
					'name'      => ASTRA_THEME_SETTINGS . '[underline-content-links]',
					'default'   => astra_get_option( 'underline-content-links' ),
					'type'      => 'control',
					'control'   => 'ast-toggle-control',
					'section'   => $typo_section,
					'priority'  => 32,
					'divider'   => array( 'ast_class' => 'ast-top-divider' ),
					'title'     => __( 'Underline Content Links', 'astra' ),
					'transport' => 'postMessage',
				),
			);

			if ( astra_has_gcp_typo_preset_compatibility() ) {

				/**
				 * Option: H1 Typography Section.
				 */
				$_configs[] = array(
					'name'      => ASTRA_THEME_SETTINGS . '[ast-heading-h1-typo]',
					'default'   => astra_get_option( 'ast-heading-h1-typo' ),
					'type'      => 'control',
					'control'   => 'ast-settings-group',
					'title'     => __( 'H1 Font', 'astra' ),
					'section'   => $typo_section,
					'transport' => 'postMessage',
					'priority'  => 30,
				);

				/**
				 * Option: H2 Typography Section.
				 */
				$_configs[] = array(
					'name'      => ASTRA_THEME_SETTINGS . '[ast-heading-h2-typo]',
					'default'   => astra_get_option( 'ast-heading-h2-typo' ),
					'type'      => 'control',
					'control'   => 'ast-settings-group',
					'title'     => __( 'H2 Font', 'astra' ),
					'section'   => $typo_section,
					'transport' => 'postMessage',
					'priority'  => 30,
				);

				/**
				 * Option: H3 Typography Section.
				 */
				$_configs[] = array(
					'name'      => ASTRA_THEME_SETTINGS . '[ast-heading-h3-typo]',
					'default'   => astra_get_option( 'ast-heading-h3-typo' ),
					'type'      => 'control',
					'control'   => 'ast-settings-group',
					'title'     => __( 'H3 Font', 'astra' ),
					'section'   => $typo_section,
					'transport' => 'postMessage',
					'priority'  => 30,
				);

				/**
				 * Option: H4 Typography Section.
				 */
				$_configs[] = array(
					'name'      => ASTRA_THEME_SETTINGS . '[ast-heading-h4-typo]',
					'default'   => astra_get_option( 'ast-heading-h4-typo' ),
					'type'      => 'control',
					'control'   => 'ast-settings-group',
					'title'     => __( 'H4 Font', 'astra' ),
					'section'   => $typo_section,
					'transport' => 'postMessage',
					'priority'  => 30,
				);

				/**
				 * Option: H5 Typography Section.
				 */
				$_configs[] = array(
					'name'      => ASTRA_THEME_SETTINGS . '[ast-heading-h5-typo]',
					'default'   => astra_get_option( 'ast-heading-h5-typo' ),
					'type'      => 'control',
					'control'   => 'ast-settings-group',
					'title'     => __( 'H5 Font', 'astra' ),
					'section'   => $typo_section,
					'transport' => 'postMessage',
					'priority'  => 30,
				);

				/**
				 * Option: H6 Typography Section.
				 */
				$_configs[] = array(
					'name'      => ASTRA_THEME_SETTINGS . '[ast-heading-h6-typo]',
					'default'   => astra_get_option( 'ast-heading-h6-typo' ),
					'type'      => 'control',
					'control'   => 'ast-settings-group',
					'title'     => __( 'H6 Font', 'astra' ),
					'section'   => $typo_section,
					'transport' => 'postMessage',
					'priority'  => 30,
				);
			}

			return array_merge( $configurations, $_configs );
		}
	}
}

new Astra_Body_Typo_Configs();