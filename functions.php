<?php

/**
 * Light Shade Studio Works Theme Functions
 */

// --- SETUP THEME ---
add_action('after_setup_theme', 'lightshadestudioworks_setup');
function lightshadestudioworks_setup()
{
    load_theme_textdomain('lightshadestudioworks', get_template_directory() . '/languages');
    add_theme_support('title-tag');
    add_theme_support('automatic-feed-links');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo');
    add_theme_support('html5', array('search-form', 'comment-list', 'comment-form', 'gallery', 'caption', 'style', 'script', 'navigation-widgets'));
    add_theme_support('responsive-embeds');
    add_theme_support('align-wide');
    add_theme_support('wp-block-styles');
    add_theme_support('editor-styles');
    add_theme_support('block-templates');
    add_editor_style('editor-style.css');
    add_theme_support('appearance-tools');
    add_theme_support('woocommerce');

    global $content_width;
    if (!isset($content_width)) {
        $content_width = 1920;
    }
    register_nav_menus(array('main-menu' => esc_html__('Main Menu', 'lightshadestudioworks')));
}

require_once get_template_directory() . '/inc/class-tailwind-nav-walker.php';

// --- ADMIN NOTICES ---
add_action('admin_notices', 'lightshadestudioworks_notice');
function lightshadestudioworks_notice()
{
    $user_id = get_current_user_id();
    if (!$user_id || !current_user_can('manage_options') || get_user_meta($user_id, 'lightshadestudioworks_notice_dismissed_2026', true)) {
        return;
    }
    $dismiss_url = add_query_arg(array('lightshadestudioworks_dismiss' => '1', 'lightshadestudioworks_nonce' => wp_create_nonce('lightshadestudioworks_dismiss_notice')), admin_url());
    echo '<div class="notice notice-info"><p><a href="' . esc_url($dismiss_url) . '" class="alignright" style="text-decoration:none"><big>' . esc_html__('×', 'lightshadestudioworks') . '</big></a><big><strong>' . esc_html__('📝 Thank you for using lightshadestudioworks!', 'lightshadestudioworks') . '</strong></big><p>' . esc_html__('Powering over 10k websites! Buy me a sandwich! 🥪', 'lightshadestudioworks') . '</p><a href="https://github.com/webguyio/lightshadestudioworks/issues/57" class="button-primary" target="_blank" rel="noopener noreferrer"><strong>' . esc_html__('How do you use lightshadestudioworks?', 'lightshadestudioworks') . '</strong></a> <a href="https://opencollective.com/lightshadestudioworks" class="button-primary" style="background-color:green;border-color:green" target="_blank" rel="noopener noreferrer"><strong>' . esc_html__('Donate', 'lightshadestudioworks') . '</strong></a> <a href="https://wordpress.org/support/theme/lightshadestudioworks/reviews/#new-post" class="button-primary" style="background-color:purple;border-color:purple" target="_blank" rel="noopener noreferrer"><strong>' . esc_html__('Review', 'lightshadestudioworks') . '</strong></a> <a href="https://github.com/webguyio/lightshadestudioworks/issues" class="button-primary" style="background-color:orange;border-color:orange" target="_blank" rel="noopener noreferrer"><strong>' . esc_html__('Support', 'lightshadestudioworks') . '</strong></a></p></div>';
}

add_action('admin_init', 'lightshadestudioworks_notice_dismissed');
function lightshadestudioworks_notice_dismissed()
{
    $user_id = get_current_user_id();
    if (isset($_GET['lightshadestudioworks_dismiss'], $_GET['lightshadestudioworks_nonce']) && wp_verify_nonce($_GET['lightshadestudioworks_nonce'], 'lightshadestudioworks_dismiss_notice') && current_user_can('manage_options')) {
        add_user_meta($user_id, 'lightshadestudioworks_notice_dismissed_2026', 'true', true);
    }
}

// --- FRONTEND HELPERS ---
add_action('wp_footer', 'lightshadestudioworks_footer');
function lightshadestudioworks_footer()
{
?>
    <script>
        (function() {
            const ua = navigator.userAgent.toLowerCase();
            const html = document.documentElement;
            if (/(iphone|ipod|ipad)/.test(ua)) {
                html.classList.add('ios', 'mobile');
            } else if (/android/.test(ua)) {
                html.classList.add('android', 'mobile');
            } else {
                html.classList.add('desktop');
            }
            if (/chrome/.test(ua) && !/edg|brave/.test(ua)) {
                html.classList.add('chrome');
            } else if (/safari/.test(ua) && !/chrome/.test(ua)) {
                html.classList.add('safari');
            } else if (/edg/.test(ua)) {
                html.classList.add('edge');
            } else if (/firefox/.test(ua)) {
                html.classList.add('firefox');
            } else if (/brave/.test(ua)) {
                html.classList.add('brave');
            } else if (/opr|opera/.test(ua)) {
                html.classList.add('opera');
            }
        })();
    </script>
<?php
}

add_filter('document_title_separator', 'lightshadestudioworks_document_title_separator');
function lightshadestudioworks_document_title_separator($sep)
{
    return esc_html('|');
}

add_filter('the_title', 'lightshadestudioworks_title');
function lightshadestudioworks_title($title)
{
    return ($title == '') ? esc_html('...') : wp_kses_post($title);
}

function lightshadestudioworks_schema_type()
{
    $schema = 'https://schema.org/';
    $type = is_single() ? "Article" : (is_author() ? 'ProfilePage' : (is_search() ? 'SearchResultsPage' : 'WebPage'));
    echo 'itemscope itemtype="' . esc_url($schema) . esc_attr($type) . '"';
}

add_filter('nav_menu_link_attributes', 'lightshadestudioworks_schema_url', 10);
function lightshadestudioworks_schema_url($atts)
{
    $atts['itemprop'] = 'url';
    return $atts;
}

if (!function_exists('lightshadestudioworks_wp_body_open')) {
    function lightshadestudioworks_wp_body_open()
    {
        do_action('wp_body_open');
    }
}

add_action('wp_body_open', 'lightshadestudioworks_skip_link', 5);
function lightshadestudioworks_skip_link()
{
    echo '<a href="#content" class="skip-link screen-reader-text">' . esc_html__('Skip to the content', 'lightshadestudioworks') . '</a>';
}

add_filter('the_content_more_link', 'lightshadestudioworks_read_more_link');
function lightshadestudioworks_read_more_link()
{
    if (!is_admin()) {
        return ' <a href="' . esc_url(get_permalink()) . '" class="more-link">' . sprintf(__('...%s', 'lightshadestudioworks'), '<span class="screen-reader-text">  ' . esc_html(get_the_title()) . '</span>') . '</a>';
    }
}

add_filter('excerpt_more', 'lightshadestudioworks_excerpt_read_more_link');
function lightshadestudioworks_excerpt_read_more_link($more)
{
    if (!is_admin()) {
        global $post;
        return ' <a href="' . esc_url(get_permalink($post->ID)) . '" class="more-link">' . sprintf(__('...%s', 'lightshadestudioworks'), '<span class="screen-reader-text">  ' . esc_html(get_the_title()) . '</span>') . '</a>';
    }
}

add_filter('big_image_size_threshold', '__return_false');
add_filter('intermediate_image_sizes_advanced', 'lightshadestudioworks_image_insert_override');
function lightshadestudioworks_image_insert_override($sizes)
{
    unset($sizes['medium_large'], $sizes['1536x1536'], $sizes['2048x2048']);
    return $sizes;
}

add_action('widgets_init', 'lightshadestudioworks_widgets_init');
function lightshadestudioworks_widgets_init()
{
    register_sidebar(array(
        'name' => esc_html__('Sidebar Widget Area', 'lightshadestudioworks'),
        'id' => 'primary-widget-area',
        'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
        'after_widget' => '</li>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));
}

add_action('wp_head', 'lightshadestudioworks_pingback_header');
function lightshadestudioworks_pingback_header()
{
    if (is_singular() && pings_open()) {
        printf('<link rel="pingback" href="%s">' . "\n", esc_url(get_bloginfo('pingback_url')));
    }
}

add_action('comment_form_before', 'lightshadestudioworks_enqueue_comment_reply_script');
function lightshadestudioworks_enqueue_comment_reply_script()
{
    if (get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}

function lightshadestudioworks_custom_pings($comment)
{
?>
    <li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>"><?php comment_author_link(); ?></li>
<?php
}

add_filter('get_comments_number', 'lightshadestudioworks_comment_count', 0);
function lightshadestudioworks_comment_count($count)
{
    if (!is_admin()) {
        global $id;
        $get_comments = get_comments('status=approve&post_id=' . $id);
        $comments_by_type = separate_comments($get_comments);
        return count($comments_by_type['comment']);
    }
    return $count;
}

// --- ASSETS & BLOCKS ---
function lightshadestudioworks_resources()
{
    wp_enqueue_style('theme-main-activation', get_stylesheet_uri());
    wp_enqueue_style(
        'theme-tailwind-utilities',
        get_template_directory_uri() . '/assets/css/lightshadestudioworks-tailwindcss.css',
        array('theme-main-activation'),
        filemtime(get_template_directory() . '/assets/css/lightshadestudioworks-tailwindcss.css')
    );
}
add_action('wp_enqueue_scripts', 'lightshadestudioworks_resources');


function lightshadestudioworks_render_my_custom_block($attributes, $content)
{
    ob_start();
    include __DIR__ . '/blocks/my-custom-block/render.php';
    return ob_get_clean();
}
function lightshadestudioworks_render_my_custom_block_two($attributes, $content)
{
    ob_start();
    include __DIR__ . '/blocks/my-custom-block-two/render.php';
    return ob_get_clean();
}

function lightshadestudioworks_register_blocks()
{
    register_block_type(__DIR__ . '/blocks/my-custom-block', array('render_callback' => 'lightshadestudioworks_render_my_custom_block'));
    register_block_type(__DIR__ . '/blocks/my-custom-block-two', array('render_callback' => 'lightshadestudioworks_render_my_custom_block_two'));
}
add_action('init', 'lightshadestudioworks_register_blocks');

// --- CUSTOMIZER ---
add_action('customize_register', 'lightshadestudioworks_register_full_customizer');
function lightshadestudioworks_register_full_customizer($wp_customize)
{
    $wp_customize->add_section('lightshadestudioworks_theme_colors', array('title' => __('Theme Color Palette', 'lightshadestudioworks'), 'priority' => 30));
    $wp_customize->add_setting('color_scheme_select', array('default' => 'scheme_1', 'transport' => 'postMessage', 'sanitize_callback' => 'sanitize_text_field'));
    $wp_customize->add_control('color_scheme_select', array('label' => __('Select Base Color Scheme', 'lightshadestudioworks'), 'section' => 'lightshadestudioworks_theme_colors', 'type' => 'select', 'choices' => ['scheme_1' => 'Scheme 1 (Pastel)', 'scheme_2' => 'Scheme 2 (Dark)', 'scheme_3' => 'Scheme 3 (Ocean)']));

    $colors = ['primary_60' => 'Primary (60%)', 'secondary_30' => 'Secondary (30%)', 'accent_10' => 'Accent (10%)'];
    foreach ($colors as $id => $label) {
        $wp_customize->add_setting($id, array('default' => ($id == 'primary_60') ? '#ffe9ec' : (($id == 'secondary_30') ? '#f4f4f4' : '#000000'), 'sanitize_callback' => 'sanitize_hex_color', 'transport' => 'postMessage'));
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, $id, array('label' => $label, 'section' => 'lightshadestudioworks_theme_colors', 'settings' => $id)));
    }
}

function lightshadestudioworks_get_color_scheme_values()
{
    $scheme = get_theme_mod('color_scheme_select', 'scheme_1');
    $schemes = ['scheme_1' => ['#ffe9ec', '#f4f4f4', '#000000'], 'scheme_2' => ['#2d3436', '#636e72', '#ffffff'], 'scheme_3' => ['#0984e3', '#74b9ff', '#ffffff']];
    $defaults = isset($schemes[$scheme]) ? $schemes[$scheme] : $schemes['scheme_1'];
    return [get_theme_mod('primary_60', $defaults[0]), get_theme_mod('secondary_30', $defaults[1]), get_theme_mod('accent_10', $defaults[2])];
}

function lightshadestudioworks_enqueue_dynamic_css()
{
    list($c60, $c30, $c10) = lightshadestudioworks_get_color_scheme_values();
    $css = ":root, html, body, .editor-styles-wrapper, .block-editor-iframe__body, .block-editor__container, .widgets-editor, .widgets-editor .editor-styles-wrapper, .edit-widgets, .edit-widgets .block-editor-wrapper, .wp-block-widgets { --color-60: {$c60}; --color-30: {$c30}; --color-10: {$c10}; }";
    wp_register_style('lightshadestudioworks-dynamic-vars', false);
    wp_enqueue_style('lightshadestudioworks-dynamic-vars');
    wp_add_inline_style('lightshadestudioworks-dynamic-vars', $css);
}
add_action('wp_enqueue_scripts', 'lightshadestudioworks_enqueue_dynamic_css');
add_action('admin_enqueue_scripts', 'lightshadestudioworks_enqueue_dynamic_css');
add_action('enqueue_block_editor_assets', 'lightshadestudioworks_enqueue_dynamic_css');

// --- CUSTOMIZER PREVIEW ---
add_action('customize_preview_init', 'lightshadestudioworks_theme_customizer_live_preview');
function lightshadestudioworks_theme_customizer_live_preview()
{
    wp_enqueue_script('customize-preview');
    $schemes = ['scheme_1' => ['#ffe9ec', '#f4f4f4', '#000000'], 'scheme_2' => ['#2d3436', '#636e72', '#ffffff'], 'scheme_3' => ['#0984e3', '#74b9ff', '#ffffff']];
    $json_schemes = json_encode($schemes);
    $script = "(function() { 
        if (!window.wp || !window.wp.customize) return;
        const schemes = {$json_schemes};
        function updatePreviewVars(colors) { document.documentElement.style.setProperty('--color-60', colors[0]); document.documentElement.style.setProperty('--color-30', colors[1]); document.documentElement.style.setProperty('--color-10', colors[2]); }
        wp.customize('color_scheme_select', function(value) { value.bind(function(newval) { const colors = schemes[newval]; if (colors) updatePreviewVars(colors); }); });
        wp.customize('primary_60', function(value) { value.bind(function(newval) { document.documentElement.style.setProperty('--color-60', newval); }); });
        wp.customize('secondary_30', function(value) { value.bind(function(newval) { document.documentElement.style.setProperty('--color-30', newval); }); });
        wp.customize('accent_10', function(value) { value.bind(function(newval) { document.documentElement.style.setProperty('--color-10', newval); }); });
    })();";
    wp_add_inline_script('customize-preview', $script);
}

// --- NAV MENU FILTERS ---
function add_additional_class_on_a($classes, $item, $args)
{
    if (isset($args->link_class)) $classes['class'] = $args->link_class;
    return $classes;
}
add_filter('nav_menu_link_attributes', 'add_additional_class_on_a', 10, 3);

// --- CUSTOMIZER SETTINGS (EXTENDED) ---
add_action('customize_register', 'lightshadestudioworks_customizer_settings');
function lightshadestudioworks_customizer_settings($wp_customize)
{
    if (!class_exists('LSW_Customize_Heading_Control')) {
        class LSW_Customize_Heading_Control extends WP_Customize_Control
        {
            public $type = 'heading';
            public function render_content()
            {
                echo '<h3 style="margin: 20px 0 10px; padding-bottom: 5px; border-bottom: 1px solid #ccc; text-transform: uppercase; font-size: 13px;">' . esc_html($this->label) . '</h3>';
            }
        }
    }
    // ... [Remaining Customizer Settings truncated for brevity, merge with your full code block]
}

// --- SETUP PAGES ON ACTIVATION ---

// 1. Setup Theme Supports
// --- SETUP PAGES ON ACTIVATION ---

// Ensure we don't have duplicate setup functions
// Keep only your primary lightshadestudioworks_setup function
// Remove 'lightshadestudioworks_setups' entirely

// --- SETUP PAGES ON ACTIVATION ---



// --- 2. PAGE CREATION LOGIC ---


// 1. SET THE FLAG ON ACTIVATION

add_action('after_switch_theme', 'lsw_set_activation_flag');
function lsw_set_activation_flag()
{
    set_transient('lsw_theme_just_activated', true, 60);
}

// 2. REDIRECT ON ADMIN INIT
add_action('admin_init', 'lsw_redirect_after_activation');
function lsw_redirect_after_activation()
{
    // Check if the flag exists
    if (get_transient('lsw_theme_just_activated')) {

        // Ensure we aren't already on the page to prevent an infinite loop
        if (isset($_GET['page']) && $_GET['page'] == 'lsw-setup-wizard') {
            return;
        }

        // Clean up the transient
        delete_transient('lsw_theme_just_activated');

        // Perform the redirect
        wp_safe_redirect(admin_url('admin.php?page=lsw-setup-wizard'));
        exit;
    }
}
// 4. MENU REGISTRATION
add_action('admin_menu', 'lsw_register_all_menu_pages');
function lsw_register_all_menu_pages()
{
    add_submenu_page(null, 'Theme Setup', 'Theme Setup', 'manage_options', 'lsw-setup-wizard', 'lsw_setup_wizard_content');
    add_management_page('Default Pages', 'Default Pages', 'manage_options', 'lsw-default-pages', 'lsw_default_pages_content');
}
function lsw_setup_wizard_content() {
?>
    <div class="wrap" style="max-width: 600px; margin-top: 50px; text-align: center; background: #fff; padding: 40px; border: 1px solid #ccd0d4; border-radius: 5px;">
        <h1>Welcome to Light Shade Studio Works!</h1>
        <p>Would you like to automatically create the default <strong>Home</strong> and <strong>Services</strong> pages?</p>
        <form method="post">
            <?php wp_nonce_field('lsw_setup_action', 'lsw_nonce'); ?>
            <input type="submit" name="lsw_run_setup" class="button button-primary button-hero" value="Yes, create pages">
            <a href="<?php echo esc_url(admin_url()); ?>" class="button button-hero">No, thanks</a>
        </form>
    </div>
<?php
}
// --- 2. THE MANUAL TOOL DISPLAY FUNCTION ---
function lsw_default_pages_content()
{
    $created = (isset($_GET['status']) && $_GET['status'] == 'created');
?>
    <div class="wrap">
        <h1>Default Pages Setup</h1>
        <?php if ($created) : ?>
            <div class="updated">
                <p>Pages created successfully! <a href="<?php echo admin_url('edit.php?post_type=page'); ?>">View your pages</a></p>
            </div>
        <?php else : ?>
            <p>If you missed creating the default pages during theme setup, you can do so here.</p>
            <form method="post">
                <?php wp_nonce_field('lsw_setup_action', 'lsw_nonce'); ?>
                <input type="submit" name="lsw_run_manual_setup" class="button button-primary" value="Create Default Pages">
            </form>
        <?php endif; ?>
    </div>
<?php
}

// --- TGM PLUGIN ACTIVATION (EXAMPLE) ---
require_once get_template_directory() . '/inc/class-tgm-plugin-activation.php';
add_action( 'tgmpa_register', 'lasw_install_plugins' );

function lasw_install_plugins() {
    $plugins = array(
        array(
            'name'      => 'Axis Folio',
            'slug'      => 'axis-folio',
            'source'           => get_template_directory() . '/inc/plugins/axis-folio.zip',
            'required'  => true,
        ),
        // Add more plugins here as needed
    );

    $config = array(
        'id'           => 'lsw-theme', // Unique ID for hashing notices for multiple instances of TGMPA.
        'menu'         => 'tgmpa-install-plugins', // Menu slug.
        'has_notices'  => false, // Show admin notices or not.
        'dismiss_msg'  => false, // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => false, // Automatically activate plugins after installation or not.
    );

    tgmpa( $plugins, $config );
}





// Update your import function to use a copy
function lsw_import_theme_image($image_filename)
{
    // 1. Check if we already have this image in the Media Library
    $existing = new WP_Query([
        'post_type'      => 'attachment',
        'post_status'    => 'inherit',
        'posts_per_page' => 1,
        'meta_query'     => [[
            'key'     => '_wp_attached_file',
            'value'   => $image_filename,
            'compare' => 'LIKE'
        ]]
    ]);

    if ($existing->have_posts()) {
        return $existing->post->ID; // Return existing ID
    }

    // 2. If not found, proceed with the actual import
    require_once(ABSPATH . 'wp-admin/includes/image.php');
    require_once(ABSPATH . 'wp-admin/includes/file.php');
    require_once(ABSPATH . 'wp-admin/includes/media.php');

    $file_path = get_template_directory() . '/assets/images/' . $image_filename;
    if (!file_exists($file_path)) return null;

    // Use a temp copy so we don't delete/move the source file
    $temp_path = get_temp_dir() . $image_filename;
    copy($file_path, $temp_path);

    $file_array = [
        'name'     => $image_filename,
        'tmp_name' => $temp_path
    ];

    $attachment_id = media_handle_sideload($file_array, 0);
    @unlink($temp_path); // Clean up

    return is_wp_error($attachment_id) ? null : $attachment_id;
}
// --- 3. UPDATED FORM HANDLER ---
// Ensure this handles the 'lsw_run_manual_setup' correctly
require_once get_template_directory() . '/inc/page-templates.php';
function lightshadestudioworks_create_default_pages()
{
    // 1. Import all images
    $images = [
        '{HEADER_HOME_BANNER}'  => lsw_import_theme_image('header-banner-home.jpg'),
        '{POSITIVE_FIRST_LEFT}' => lsw_import_theme_image('positive-first-left.jpg'),
        '{POSITIVE_FIRST_RIGHT}' => lsw_import_theme_image('positive-second-right.jpg'),
        '{POSITIVE_BOTTOM}'     => lsw_import_theme_image('positive-bottom.jpg'),
    ];

    // 2. Prepare HTML Content
    $home_content = lightshadestudioworks_render_home();

    // 3. Replace placeholders with real URLs
    foreach ($images as $placeholder => $attachment_id) {
        $url = $attachment_id ? wp_get_attachment_url($attachment_id) : '';
        $home_content = str_replace($placeholder, esc_url($url), $home_content);
    }

    // 4. Define Pages
    $pages = [
        'Home' => [
            'slug'    => 'home',
            'content' => $home_content
        ]
    ];

    // 5. Insert/Update Pages
    foreach ($pages as $title => $data) {
        $existing_page = get_page_by_path($data['slug'], OBJECT, 'page');

        $post_data = [
            'post_title'   => $title,
            'post_name'    => $data['slug'],
            'post_content' => $data['content'],
            'post_status'  => 'publish',
            'post_type'    => 'page'
        ];

        if ($existing_page) {
            $post_data['ID'] = $existing_page->ID;
            $page_id = wp_update_post($post_data);
        } else {
            $page_id = wp_insert_post($post_data);
            if ($page_id) {
                update_option('show_on_front', 'page');
                update_option('page_on_front', $page_id);
            }
        }
        
        // Set featured image if available, but skip it for the Home page because the content already includes the banner cover block.
        if ($page_id && $data['img_id'] && $data['slug'] !== 'home') {
            set_post_thumbnail($page_id, $data['img_id']);
        }
        wp_safe_redirect(admin_url('admin.php?page=tgmpa-install-plugins'));
        exit;
    }

    update_option('lsw_pages_created', true);
}
// 2. RELIABLE MEDIA HANDLING

// 3. FORM HANDLER
add_action('admin_init', 'lsw_handle_form_submissions');
function lsw_handle_form_submissions()
{
    if (isset($_POST['lsw_run_setup']) || isset($_POST['lsw_run_manual_setup'])) {
        if (!isset($_POST['lsw_nonce']) || !wp_verify_nonce($_POST['lsw_nonce'], 'lsw_setup_action')) {
            wp_die('Security check failed.');
        }
        lightshadestudioworks_create_default_pages();
        $redirect_url = isset($_POST['lsw_run_setup'])
            ? admin_url('admin.php?page=lsw-setup-wizard&status=created')
            : admin_url('tools.php?page=lsw-default-pages&status=created');
        wp_safe_redirect($redirect_url);
        exit;
    }
}



