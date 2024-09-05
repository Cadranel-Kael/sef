/**
 * Compiler configuration
 *
 * @see {@link https://roots.io/sage/docs sage documentation}
 * @see {@link https://bud.js.org/learn/config bud.js configuration guide}
 *
 * @type {import('@roots/bud').Config}
 */
export default async(app) => {
  /**
   * Application assets & entrypoints
   *
   * @see {@link https://bud.js.org/reference/bud.entry}
   * @see {@link https://bud.js.org/reference/bud.assets}
   */
    app
    .entry('app', ['@scripts/app', '@styles/app'])
    .entry('editor', ['@scripts/editor', '@styles/editor'])
    .assets(['images', 'fonts']);

  /**
   * Set public path
   *
   * @see {@link https://bud.js.org/reference/bud.setPublicPath}
   */
    app.setPublicPath('/app/themes/sef/public/');

  /**
   * Development server settings
   *
   * @see {@link https://bud.js.org/reference/bud.setUrl}
   * @see {@link https://bud.js.org/reference/bud.setProxyUrl}
   * @see {@link https://bud.js.org/reference/bud.watch}
   */
    app
    .setUrl('http://localhost:3000')
    .setProxyUrl('https://sef.test')
    .watch(['resources/views', 'app']);

  /**
   * Generate WordPress `theme.json`
   *
   * @note This overwrites `theme.json` on every build.
   *
   * @see {@link https://bud.js.org/extensions/sage/theme.json}
   * @see {@link https://developer.wordpress.org/block-editor/how-to-guides/themes/theme-json}
   */
    app.wpjson
    .setOption('styles', {
        typography: {
            fontFamily: `"Open Sans", sans-serif`,
            name: "Open Sans",
            slug: "open-sans",
            fontFace: [{
                fontFamily: "Open Sans",
                src: ["file:./resources/fonts/OpenSans.ttf"],
            }],
        },
    })
    .setSettings({
        background: {
            backgroundImage: true,
        },
        color: {
            custom: false,
            customDuotone: false,
            customGradient: false,
            defaultDuotone: false,
            defaultGradients: false,
            defaultPalette: false,
            palette: [
            {
                name: 'White',
                slug: 'white',
                color: '#FFFFFF',
            },
            {
                name: 'Primary',
                slug: 'primary',
                color: '#FFF137',
            },
            {
                name: 'Black',
                slug: 'black',
                color: '#2F2F2F',
            },
            ],
        },
        lineHeight: {
            'body': 1.6,
            'heading': 1.1
        },
        spacing: {
            padding: true,
            units: ['px', '%', 'em', 'rem', 'vw', 'vh'],
            blockGap: true,
        },
        layout: {
        },
        typography: {
            customFontSize: true,
        },
    })
};
