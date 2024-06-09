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

add_theme_support('editor-styles');
add_editor_style(asset('editor.css')->relativePath(get_theme_file_path()));

function human_time_diff_fr($from, $to = ''): array|string
{
    if (empty($to)) {
        $to = current_time('timestamp');
    }

    $diff = human_time_diff($from, $to);

    $translation = [
        'seconds' => 'secondes',
        'second' => 'seconde',
        'minutes' => 'minutes',
        'minute' => 'minute',
        'hours' => 'heures',
        'hour' => 'heure',
        'days' => 'jours',
        'day' => 'jour',
        'weeks' => 'semaines',
        'week' => 'semaine',
        'months' => 'mois',
        'month' => 'mois',
        'years' => 'ans',
        'year' => 'an',
    ];

    foreach ($translation as $en => $fr) {
        $diff = str_replace($en, $fr, $diff);
    }

    return $diff;
}
