> **Note**
> This is the development version and contains features that may be in various stages of development. If you want to use this on a live website, download here: [Brisko](https://wordpress.org/themes/brisko/).

> For documentation details, please refer to the [official documentation](https://docs.wpbrisko.com/).

# Brisko WordPress Theme

### Modern, minimalist design, high-performance WordPress Block & Elementor Starter Theme

> **IMPORTANT**
> `define( 'BRISKO_ADMIN_USER', 1 );` allows full control over the website. It is set to user ID 1 by default but can be changed to any valid user ID. This functions similarly to a "sudo" user, allowing that user to bypass certain restrictions like locked blocks and patterns.

Brisko is a lightweight and easy-to-use WordPress theme optimized for speed and fully compatible with the Block Editor and Elementor. It is designed for various applications, including personal blogs, business websites, agencies, portfolios, charities, and more.

With its modern architecture, Brisko now fully supports block-based styling, theme.json, and an improved main options handler. It also introduces enhanced support for block headers and footers.




## Key Features
- **Block Editor Support** – Full compatibility with WordPress block editor (FSE mode supported).
- **Elementor Support** – Works seamlessly with Elementor for advanced page-building.
- **Lightweight & Fast** – Optimized for performance without unnecessary bloat.
- **Customizable** – Offers settings for global styles, color schemes, page width, navigation, and more.
- **Theme.json Support** – Allows better global style management.
- **Bootstrap Grid Only** – Retains Bootstrap’s grid system while removing unnecessary styles.
- **Standalone Autoloader** – Improved file structure for better efficiency.
- **Additional Hooks & Actions** – More flexibility with `brisko_after_body_open`, `brisko_customizer_setting`, and `brisko_entry_meta` hooks.
- **Enqueue Extra Assets** – Option to include additional scripts and styles.
- **Disable WP Auto-P** – Removes extra paragraph (`<p>`) tags in posts and pages.

> Brisko 6.0 introduces major changes, including **block-based styling, Bootstrap grid-only integration, improved theme settings, and FSE mode support**. This version enhances flexibility and performance, making Brisko a powerful choice for modern WordPress websites.

## Quick Start
### How to Install Brisko
1. Download from the WordPress Theme Directory: [Download Brisko](https://wordpress.org/themes/brisko/)
2. Search for "Brisko" in the WordPress backend and install directly: [Adding New Themes](https://wordpress.org/support/article/using-themes/#adding-new-themes)
3. Download the latest .zip release from GitHub: [Releases](https://github.com/devuri/brisko/releases) and rename it to `brisko.zip` before uploading.
4. Enable **Pure Content Mode** to bypass `the_content` and use `get_the_content` instead ([#124](https://github.com/devuri/brisko/issues/124)).

### How to Create a Child Theme
- Use **Child Theme Generator Plugin**: [Download Plugin](https://wordpress.org/plugins/child-theme-generator/)
- Read the official WordPress documentation: [How to Create a Child Theme](https://developer.wordpress.org/themes/advanced-topics/child-themes/#how-to-create-a-child-theme)
- Brisko Blog: Basic Brisko child theme example: [GitHub Repository](https://github.com/devuri/brisko-blog)

## Customizer Settings
Brisko provides an extensive set of customization options, allowing you to control various aspects of your theme:

### **General Customization**
- Global link and button colors
- Set page and blog width
- Disable/Enable page titles
- Disable/Enable sidebar
- Custom footer text

### **Single Post Options**
- Disable/Enable featured image
- Disable/Enable post categories & tags
- Disable/Enable previous and next post navigation

### **Advanced Settings**
- Disable/Enable theme styles
- Disable/Enable site title and tagline
- Disable/Enable built-in menu and navigation
- Disable/Enable Brisko styles
- Disable/Enable Bootstrap grid
- Enable Block Header & Block Footer
- Disable WP Auto-P to remove extra `<p>` tags

## Custom Headers and Footers
- Supports Full Site Editing (FSE) for custom headers and footers
- Works with **Elementor Pro’s Theme Builder** ([Watch Tutorial](https://www.youtube.com/watch?v=Q7fyn0MMe_s))
- Compatible with **Header, Footer & Blocks Plugin** ([Download Plugin](https://wordpress.org/plugins/header-footer-elementor))

## Built-in Hooks and Actions
Brisko includes various action and filter hooks for enhanced customization.

### **Action Hooks**
- `brisko_after_body_open`
- `brisko_customizer_setting`
- `brisko_entry_meta`
- `brisko_before_header`, `brisko_after_header`
- `brisko_before_footer`, `brisko_after_footer`
- `brisko_page_header`, `brisko_page_footer`
- `brisko_before_comments`, `brisko_after_comments`

### **Filter Hooks**
- `brisko_copyright`
- `brisko_poweredby`
- `brisko_sections` (Customizer sections)

Get a visual reference of Brisko’s theme actions with the [Brisko Hooks Display Plugin](https://wordpress.org/plugins/brisko-hooks-display/).

## Theme Documentation
For detailed documentation, visit the [official documentation page](https://docs.wpbrisko.com/).

## License
Brisko WordPress Theme, Copyright 2025 Uriel Wilson.

Distributed under the **GNU GPL v2.0**: [Read More](http://www.gnu.org/licenses/old-licenses/gpl-2.0.en.html)

## Credits
- [WordPress Underscores](http://underscores.me/)
- [Bootstrap Grid](http://getbootstrap.com/)
- [SmoothScroll](https://github.com/gblazex/smoothscroll-for-websites)
