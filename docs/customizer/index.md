# Custom Theme Customization Options

This code example demonstrates how to add custom theme customization options. 
This allow you to extend the theme's functionality and provide users with additional control over their website's appearance and behavior.

## Table of Contents

1. [Introduction](#introduction)
2. [Adding Custom Sections](#adding-custom-sections)
3. [Adding Custom Controls](#adding-custom-controls)
4. [Usage](#usage)

## Introduction

Custom theme customization options are essential for tailoring the user experience to specific preferences. In this example, we'll add a new customization section called "Advanced Company Settings" with a toggle control to enable or disable a feature.

## Adding Custom Sections

Custom sections in the WordPress Customizer group related settings together. 
Here, we add a new section named "Advanced Company Settings" to the theme's customization options using the `brisko_sections` filter.

```php

add_filter( 'brisko_sections', function ($sections) {

	$sections['acme'] = 'Advanced Company Settings';

	return $sections;
} );

```

> notice that we use `acme` as the key we will need that value for the action hook.

## Adding Custom Setting and Control
> using the hook `brisko_customizer_setting`, we can easily add a new setting.

Custom controls define the actual customization options within a section. 
In our example, we'll add a toggle control that allows users to enable or disable a feature.
We also add a custom Separator `Brisko\Customize\Controls\Control` which helps in keeping our Settings organized.

```php
add_action( 'brisko_customizer_setting', function ( $wp_customize ) {

     // brisko_section_{$sectionkey}
	$section = 'brisko_section_acme';

	// Separator for Settings.
	( new Brisko\Customize\Controls\Control() )->separator(
		$wp_customize,
		esc_html__( 'Acme Options and Features', 'brisko' ),
		$section,
		'Acme Options'
	);


	// Disable Tracker.
	$wp_customize->add_setting(
		'disable_acme_tracker',
		[
			'default'           => false,
			'capability'        => 'edit_theme_options',
			'transport'         => 'postMessage',
			'sanitize_callback' => 'brisko_sanitize_checkbox',
		]
	);

	$wp_customize->add_control(
		new Brisko\Customize\Controls\ToggleControl(
			$wp_customize,
			'disable_acme_tracker',
			[
				'label'   => esc_html__( 'Disable Acme Tracker', 'brisko-elements' ),
				'section' => $section,
				'type'    => 'light',
				// light, ios, flat.
			]
		)
	);

} );
```

In this code:

- We create a setting named `'disable_acme_tracker'`, which will store the user's choice to enable or disable the advanced feature.
- We add a toggle control to the "Advanced Company Settings" section, allowing users to control the feature with a checkbox.
- We set the `sanitize_callback` to ensure the value is a boolean (true or false).

## Usage

To use these customization options, follow these steps:

1. Navigate to the WordPress Customizer by going to "Appearance" -> "Customize" in your WordPress dashboard.
2. Look for the "Advanced Company Settings" section.
3. Inside this section, you'll find the "Enable Advanced Feature" option.
4. Toggle the checkbox to enable or disable the advanced feature according to your preference.
5. Click the "Publish" button to save your changes.

These customization options provide website owners with control over the advanced feature, allowing them to tailor their site's functionality to their specific needs.
