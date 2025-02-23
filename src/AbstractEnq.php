<?php

namespace Brisko;

use Brisko\Contracts\EnqueueInterface;
use Brisko\Setup\Assets;

abstract class AbstractEnq implements EnqueueInterface
{
    /**
     * Theme Base css.
     */
    const CORE_CSS = 'brisko-core';
    protected $style_files;
    protected $css_files;

    /**
     * @return void
     */
    public function init()
    {
        add_action( 'wp_enqueue_scripts', [ $this, 'register' ] );
        add_action( 'wp_enqueue_scripts', [ $this, 'enqueue' ] );

		if (get_theme_mod( 'enqueue_user_assets', false ) ) {
			add_action('wp_enqueue_scripts', [ $this, 'enqueue_user_assets' ]);
		}
    }

    /**
     * Setup a style mod.
     *
     * @param string $handle  the enqueue handle example 'bootstrap'
     * @param string $mod     the theme_mod name example 'enable_bootstrap'
     * @param bool   $default true|false if this should be enabled by default.
     *
     * @return void
     */
    public static function enqueue_script( $handle, $mod, $default = false )
    {
        if ( true === get_theme_mod( $mod, $default ) ) {
            wp_enqueue_script( $handle );
        }
    }

    public function get_style_files( string $style = '' )
    {
        if ( empty( $style ) ) {
            return $this->style_files;
        }

        // get a single stylesheet url.
        if ( $style && isset( $this->style_files[ $style ] ) ) {
            $this->style_files[ $style ];
        }

        return null;
    }

    /**
     * Setup a style based on mod.
     *
     * @param string       $handle  the enqueue handle example 'bootstrap'
     * @param false|string $mod     the theme_mod name example 'enable_bootstrap', use false to override
     * @param bool         $default true|false if this should be enabled by default.
     *
     * @return void
     */
    public static function enqueue_style( $handle, $mod, $default = false )
    {
        if ( false === $mod ) {
            wp_enqueue_style( $handle );

            return;
        }

        if ( true === get_theme_mod( $mod, $default ) ) {
            wp_enqueue_style( $handle );
        }
    }

    /**
     * Setup a style based on mod.
     *
     * @param string $asset   the registered style name
     * @param string $mod     the theme_mod name example 'enable_bootstrap'
     * @param bool   $default true|false if this should be enabled by default.
     *
     * @return void
     */
    public function editor_style( $asset, $mod, $default = false )
    {
        if ( true === get_theme_mod( $mod, $default ) ) {
            add_editor_style( $this->style_files[ $asset ] );
        }
    }

    /**
     * Enqueue scripts.
     */
    abstract public function enqueue();

    /**
     * Register scripts.
     */
    abstract public function register();

    /**
     * Register a new script.
     *
     * @param string $handle    Name of the script. Should be unique.
     * @param string $src       path of the script relative to the Theme directory.
     * @param array  $deps      An array of registered script handles this script depends on.
     * @param bool   $in_footer Whether to enqueue the script before </body> instead of in the <head>.
     *
     * @see https://developer.wordpress.org/reference/functions/wp_register_script/
     *
     * @return void
     */
    protected static function register_script( $handle, $src, $deps = [], $in_footer = true )
    {
        wp_register_script( $handle, Assets::uri( $src ), $deps, md5( $handle ), $in_footer );
    }

    /**
     * Get element space padding or margin.
     *
     * @param string $theme_mod .
     * @param string $default   .
     *
     * @return string .
     */
    protected function element_mod( $theme_mod = 'footer_padding', $default = '16px' )
    {
        if ( get_theme_mod( $theme_mod ) ) {
            return implode( 'px ', get_theme_mod( $theme_mod ) ) . 'px';
        }

        return $default;
    }

    protected function set_css_files()
    {
        $brisko_css = $this->style_files();

        if ( ! $brisko_css ) {
            $this->css_files = null;
        } else {
            $this->css_files = $brisko_css;
        }

        return $this->css_files;
    }

    /**
     * Sanitize CSS.
     *
     * For now just strip_tags (the WordPress way) and preg_replace to escape < in certain cases but might do full CSS escaping in the future, see:
     * https://cheatsheetseries.owasp.org/cheatsheets/Cross_Site_Scripting_Prevention_Cheat_Sheet.html#rule-4-css-encode-and-strictly-validate-before-inserting-untrusted-data-into-html-style-property-values
     * https://github.com/twigphp/Twig/blob/3.x/src/Extension/EscaperExtension.php#L300-L319
     * https://github.com/laminas/laminas-escaper/blob/2.8.x/src/Escaper.php#L205-L221
     * https://plugins.svn.wordpress.org/autoptimize/tags/2.8.0/classes/autoptimizeStyles.php
     *
     * @param string $css the to be sanitized CSS.
     *
     * @return string sanitized CSS.
     */
    protected function sanitize_css( $css )
    {
        $css = wp_strip_all_tags( $css );
        if ( false !== strpos( $css, '<' ) ) {
            $css = preg_replace( '#<(\/?\w+)#', '\00003C$1', $css );
        }

        return $css;
    }

    /**
     * Setup static CSS files.
     *
     * @param null|string $style Style handle, e.g., 'bootstrap'.
     *
     * @return array
     */
    protected function style_files( $style = null )
    {
        return [];
    }

    /**
     * Check if the 'brisko_elements_loaded' action has been executed.
     *
     * Determine whether to load theme modifications by default.
     *
     * This method checks if the 'brisko_elements_loaded' action has been executed. If the action
     * has not been fired, it indicates that the Brisko Elements plugin is not active. In this case,
     * we need to load certain theme modifications like theme styles by default. However, if the
     * action has been fired, it means the plugin is active and can control theme mods, so we return
     * false to prevent default loading.
     *
     * @return bool Returns true if the 'brisko_elements_loaded' action has NOT been executed,
     *              indicating the need to load theme modifications by default. Returns false if
     *              the action has been fired, indicating that the plugin can control theme mods,
     *              and we should not load them by default.
     */
    protected static function maybe()
    {
        return ! did_action( 'brisko_elements_loaded' );
    }

	public function enqueue_user_assets()
	{
	    $user_assets_dir = WP_CONTENT_DIR . '/brisko/assets/';
	    $user_assets_url = content_url('/brisko/assets/');

		if (! get_theme_mod( 'enqueue_user_assets', false ) ) {
			return;
		}

	    // Allowed file types
	    $allowed_extensions = ['css', 'js'];

	    // Check if the directory exists
	    if (is_dir($user_assets_dir)) {
	        $files = scandir($user_assets_dir);
	        foreach ($files as $file) {
	            $file_path = $user_assets_dir . $file;
	            $file_url  = $user_assets_url . $file;

	            // Get file extension
	            $file_ext = pathinfo($file, PATHINFO_EXTENSION);

	            // Only process allowed file types
	            if (in_array($file_ext, $allowed_extensions) && is_file($file_path)) {
	                if ($file_ext === 'css') {
	                    wp_enqueue_style('brisko-site-' . sanitize_title($file), $file_url, [], filemtime($file_path));
	                } elseif ($file_ext === 'js') {
	                    wp_enqueue_script('brisko-site-' . sanitize_title($file), $file_url, [], filemtime($file_path), true);
	                }
	            }
	        }
	    }
	}
}
