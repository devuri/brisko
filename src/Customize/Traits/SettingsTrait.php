<?php

namespace Brisko\Customize\Traits;

use ReflectionClass;

trait SettingsTrait
{
    /**
     * Customizer transport.
     *
     * @var $transport
     */
    public static $transport = 'postMessage';

    public static $capability = 'edit_theme_options';

    /**
     * Brisko Section name only.
     */
    public static function short_name()
    {
        $class = new ReflectionClass( new self() );

        return strtolower( $class->getShortName() );
    }

    /**
     * Brisko Section.
     */
    public static function section()
    {
        return 'brisko_section_' . self::short_name();
    }

    /**
     * Brisko Section.
     */
    public static function install_plugin()
    {
        $css_style = self::info_css_style();

        $button  = '<a href="' . esc_url( network_admin_url( 'plugin-install.php?tab=search&type=tag&s=brisko' ) ) . '" class="button button-secondary">';
        $button .= __( 'Install Plugin', 'brisko' );
        $button .= '</a>';

        // render info.
        return \sprintf(
            // translators: %2$s: Plugin info.
            __( '<p style="%1$s"> %2$s </p> %3$s', 'brisko' ),
            $css_style,
            'Get ' . ucwords( self::short_name() ) . ' Options and Custom features. Install the Brisko Elements Plugin.',
            $button
        );
    }

    protected static function info_css_style()
    {
        return 'padding: 16px;border-radius: 2px;font-style: italic;';
    }

    protected static function info_note( $wp_customize, $id, $info = '' )
    {
        $note_id   = 'info_message_' . $id;
        $css_style = self::info_css_style();

        $wp_customize->add_setting(
            $note_id,
            [
                'sanitize_callback' => '__return_false',
                'default'           => null,
            ]
        );

        $wp_customize->add_control(
            $note_id,
            [
                'description' => '<p style="' . $css_style . '">' . $info . '</p>',
                'section'     => self::section(),
                'type'        => 'hidden',
            ]
        );
    }
}
