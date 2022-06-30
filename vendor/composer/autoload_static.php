<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInite80901de46850d3f5555f8660274fb5b
{
    public static $files = array (
        '29af0ce36fd30ec1dd601a83530e7f7c' => __DIR__ . '/../..' . '/src/Customize/helpers.php',
        '0c3a3a5eed75282a80ae6f26209f2c76' => __DIR__ . '/../..' . '/src/inc/template-tags.php',
    );

    public static $prefixLengthsPsr4 = array (
        'B' => 
        array (
            'Brisko\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Brisko\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Brisko\\Actions' => __DIR__ . '/../..' . '/src/Actions.php',
        'Brisko\\Brisko' => __DIR__ . '/../..' . '/src/Brisko.php',
        'Brisko\\Contracts\\EnqueueInterface' => __DIR__ . '/../..' . '/src/Contracts/EnqueueInterface.php',
        'Brisko\\Contracts\\SettingsInterface' => __DIR__ . '/../..' . '/src/Contracts/SettingsInterface.php',
        'Brisko\\Contracts\\SetupInterface' => __DIR__ . '/../..' . '/src/Contracts/SetupInterface.php',
        'Brisko\\Contracts\\ViewInterface' => __DIR__ . '/../..' . '/src/Contracts/ViewInterface.php',
        'Brisko\\Customize\\Build' => __DIR__ . '/../..' . '/src/Customize/Build.php',
        'Brisko\\Customize\\Controls\\Control' => __DIR__ . '/../..' . '/src/Customize/Controls/Control.php',
        'Brisko\\Customize\\Controls\\HeaderControl' => __DIR__ . '/../..' . '/src/Customize/Controls/HeaderControl.php',
        'Brisko\\Customize\\Controls\\SeparatorControl' => __DIR__ . '/../..' . '/src/Customize/Controls/SeparatorControl.php',
        'Brisko\\Customize\\Controls\\ToggleControl' => __DIR__ . '/../..' . '/src/Customize/Controls/ToggleControl.php',
        'Brisko\\Customize\\Customizer' => __DIR__ . '/../..' . '/src/Customize/Customizer.php',
        'Brisko\\Customize\\Sections' => __DIR__ . '/../..' . '/src/Customize/Sections.php',
        'Brisko\\Customize\\Settings\\Advanced' => __DIR__ . '/../..' . '/src/Customize/Settings/Advanced.php',
        'Brisko\\Customize\\Settings\\Blog' => __DIR__ . '/../..' . '/src/Customize/Settings/Blog.php',
        'Brisko\\Customize\\Settings\\Footer' => __DIR__ . '/../..' . '/src/Customize/Settings/Footer.php',
        'Brisko\\Customize\\Settings\\General' => __DIR__ . '/../..' . '/src/Customize/Settings/General.php',
        'Brisko\\Customize\\Settings\\Header' => __DIR__ . '/../..' . '/src/Customize/Settings/Header.php',
        'Brisko\\Customize\\Settings\\Layout' => __DIR__ . '/../..' . '/src/Customize/Settings/Layout.php',
        'Brisko\\Customize\\Settings\\Navigation' => __DIR__ . '/../..' . '/src/Customize/Settings/Navigation.php',
        'Brisko\\Customize\\Settings\\Pages' => __DIR__ . '/../..' . '/src/Customize/Settings/Pages.php',
        'Brisko\\Customize\\Settings\\Pro' => __DIR__ . '/../..' . '/src/Customize/Settings/Pro.php',
        'Brisko\\Customize\\Settings\\SelectiveRefresh' => __DIR__ . '/../..' . '/src/Customize/Settings/SelectiveRefresh.php',
        'Brisko\\Customize\\Traits\\SettingsTrait' => __DIR__ . '/../..' . '/src/Customize/Traits/SettingsTrait.php',
        'Brisko\\Element' => __DIR__ . '/../..' . '/src/Element.php',
        'Brisko\\Footer' => __DIR__ . '/../..' . '/src/Footer.php',
        'Brisko\\Layout' => __DIR__ . '/../..' . '/src/Layout.php',
        'Brisko\\Navigation' => __DIR__ . '/../..' . '/src/Navigation.php',
        'Brisko\\Options' => __DIR__ . '/../..' . '/src/Options.php',
        'Brisko\\Setup\\Activate' => __DIR__ . '/../..' . '/src/Setup/Activate.php',
        'Brisko\\Setup\\Assets' => __DIR__ . '/../..' . '/src/Setup/Assets.php',
        'Brisko\\Setup\\Body' => __DIR__ . '/../..' . '/src/Setup/Body.php',
        'Brisko\\Setup\\Compat' => __DIR__ . '/../..' . '/src/Setup/Compat.php',
        'Brisko\\Setup\\Head' => __DIR__ . '/../..' . '/src/Setup/Head.php',
        'Brisko\\Setup\\Jetpack' => __DIR__ . '/../..' . '/src/Setup/Jetpack.php',
        'Brisko\\Setup\\Scripts' => __DIR__ . '/../..' . '/src/Setup/Scripts.php',
        'Brisko\\Setup\\Styles' => __DIR__ . '/../..' . '/src/Setup/Styles.php',
        'Brisko\\SiteHeader' => __DIR__ . '/../..' . '/src/SiteHeader.php',
        'Brisko\\Template' => __DIR__ . '/../..' . '/src/Template.php',
        'Brisko\\Theme' => __DIR__ . '/../..' . '/src/Theme.php',
        'Brisko\\Traits\\Singleton' => __DIR__ . '/../..' . '/src/Traits/Singleton.php',
        'Brisko\\View\\Archive' => __DIR__ . '/../..' . '/src/View/Archive.php',
        'Brisko\\View\\CanvasPage' => __DIR__ . '/../..' . '/src/View/CanvasPage.php',
        'Brisko\\View\\Excerpt' => __DIR__ . '/../..' . '/src/View/Excerpt.php',
        'Brisko\\View\\FullWidthPage' => __DIR__ . '/../..' . '/src/View/FullWidthPage.php',
        'Brisko\\View\\HomePage' => __DIR__ . '/../..' . '/src/View/HomePage.php',
        'Brisko\\View\\IndexPage' => __DIR__ . '/../..' . '/src/View/IndexPage.php',
        'Brisko\\View\\Page' => __DIR__ . '/../..' . '/src/View/Page.php',
        'Brisko\\View\\Page404' => __DIR__ . '/../..' . '/src/View/Page404.php',
        'Brisko\\View\\Search' => __DIR__ . '/../..' . '/src/View/Search.php',
        'Brisko\\View\\Sidebar' => __DIR__ . '/../..' . '/src/View/Sidebar.php',
        'Brisko\\View\\Single' => __DIR__ . '/../..' . '/src/View/Single.php',
        'Brisko\\View\\Thumbnail' => __DIR__ . '/../..' . '/src/View/Thumbnail.php',
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInite80901de46850d3f5555f8660274fb5b::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInite80901de46850d3f5555f8660274fb5b::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInite80901de46850d3f5555f8660274fb5b::$classMap;

        }, null, ClassLoader::class);
    }
}
