<?php

/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
|
| Composer provides a convenient, automatically generated class loader for
| our theme. We will simply require it into the script here so that we
| don't have to worry about manually loading any of our classes later on.
|
*/

if (!file_exists($composer = __DIR__ . '/vendor/autoload.php')) {
    wp_die(__('Error locating autoloader. Please run <code>composer install</code>.', 'sage'));
}

require $composer;

/*
|--------------------------------------------------------------------------
| Register The Bootloader
|--------------------------------------------------------------------------
|
| The first thing we will do is schedule a new Acorn application container
| to boot when WordPress is finished loading the theme. The application
| serves as the "glue" for all the components of Laravel and is
| the IoC container for the system binding all of the various parts.
|
*/
if (!function_exists('\Roots\bootloader')) {
    wp_die(
        __('You need to install Acorn to use this theme.', 'sage'),
        '',
        [
            'link_url' => 'https://roots.io/acorn/docs/installation/',
            'link_text' => __('Acorn Docs: Installation', 'sage'),
        ]
    );
}

\Roots\bootloader()->boot();

/*
|--------------------------------------------------------------------------
| Register Sage Theme Files
|--------------------------------------------------------------------------
|
| Out of the box, Sage ships with categorically named theme files
| containing common functionality and setup to be bootstrapped with your
| theme. Simply add (or remove) files from the array below to change what
| is registered alongside Sage.
|
*/

collect(['setup', 'filters'])
    ->each(function ($file) {
        if (!locate_template($file = "app/{$file}.php", true, true)) {
            wp_die(
            /* translators: %s is replaced with the relative file path */
                sprintf(__('Error locating <code>%s</code> for inclusion.', 'sage'), $file)
            );
        }
    });

function get_navigation_links(string $location): array
{
    global $wp;
    $locations = get_nav_menu_locations();
    $menuId = $locations[$location] ?? null;
    if (is_null($menuId)) {
        return [];
    }

    $items = wp_get_nav_menu_items($menuId);

    foreach ($items as $key => $item) {
        $items[$key] = new stdClass();
        $items[$key]->url = $item->url;
        $items[$key]->label = $item->title;
        if (home_url($wp->request) . '/' === $item->url) {
            $items[$key]->active = true;
        } else {
            $items[$key]->active = false;
        }
    }

    return $items;
}

function add_file_types_to_uploads($file_types): array
{
    $new_filetypes = array();
    $new_filetypes['svg'] = 'image/svg+xml';
    return array_merge($file_types, $new_filetypes);
}

add_filter('upload_mimes', 'add_file_types_to_uploads');

function remove_posts_menu(): void
{
    remove_menu_page('edit.php');
}

add_action('admin_menu', 'remove_posts_menu');

function kc_pagination($pages = '', $range = 2)
{
    $showitems = ($range * 2) + 1;

    global $paged;
    if (empty($paged)) {
        $paged = 1;
    }

    if ($pages == '') {
        global $wp_query;
        $pages = $wp_query->max_num_pages;
        if (!$pages) {
            $pages = 1;
        }
    }

    if (1 != $pages) {
        echo "<div class='pagination'>";
        if ($paged > 2 && $paged > $range + 1 && $showitems < $pages) {
            echo "<a class='pagination__item' href='" . get_pagenum_link(1) . "'>&laquo;</a>";
        }
        if ($paged > 1 && $showitems < $pages) {
            echo "<a class='pagination__item' href='" . get_pagenum_link($paged - 1) . "'>&lsaquo;</a>";
        }

        for ($i = 1; $i <= $pages; $i++) {
            if (1 != $pages && (!($i >= $paged + $range + 1 || $i <= $paged - $range - 1) || $pages <= $showitems)) {
                echo ($paged == $i) ?
                    "<span class='pagination__item pagination__current'>" .
                    $i .
                    "</span>" :
                    "<a href='" .
                    get_pagenum_link($i) .
                    "' class='pagination__item pagination__inactive' >" .
                    $i .
                    "</a>";
            }
        }

        if ($paged < $pages && $showitems < $pages) {
            echo "<a class='pagination__item' href='" . get_pagenum_link($paged + 1) . "'>&rsaquo;</a>";
        }
        if ($paged < $pages - 1 && $paged + $range - 1 < $pages && $showitems < $pages) {
            echo "<a class='pagination__item' href='" . get_pagenum_link($pages) . "'>&raquo;</a>";
        }
        echo "</div>\n";
    }
}

add_filter('hf_hide_admin_menu', '__return_false');

/**
 * Validate HTML Forms.
 *
 * @param string $error
 * @param \HTML_Forms\Form $form
 * @param array $data
 * @return string
 */
add_filter('hf_validate_form', function ($error, $form, $data) {
    if ($form->slug !== 'request-home') {
        return $error;
    }

    if (empty($data['first_name']) || empty($data['last_name'])) {
        return 'required_field_missing';
    }

    if (empty($data['email'] || !is_email($data['email']))) {
        return 'invalid_email';
    }

    if (empty($data['terms'])) {
        return 'invalid_terms';
    }

    $recaptcha = new \ReCaptcha\ReCaptcha(
        env('RECAPTCHA_PRIVATE_KEY')
    );

    $response = $recaptcha->setExpectedHostname(
        wp_parse_url(home_url(), PHP_URL_HOST)
    )->verify(
        $data['g-recaptcha-response'] ?? '',
        $_SERVER['REMOTE_ADDR']
    );

    if (!$response->isSuccess()) {
        return 'invalid_captcha';
    }

    return $error;
}, 10, 3);

/**
 * Customize the HTML Forms invalid captcha error.
 *
 * @return string
 */
add_filter('hf_form_message_invalid_captcha', function () {
    return __('Invalid recaptcha response.', 'html-forms');
});

/**
 * Customize the HTML Forms invalid terms error.
 *
 * @return string
 */
add_filter('hf_form_message_invalid_terms', function () {
    return __('You must agree to the terms of service.', 'html-forms');
});


add_filter( 'gform_disable_css', '__return_true' );
