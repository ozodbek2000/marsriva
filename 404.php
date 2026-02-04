<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package marsriva
 */

get_header();
?>

<style>
    /* ─── Reset & Base ─── */
    .error-404-wrapper {
        min-height: 60vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 60px 20px;
        box-sizing: border-box;
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, sans-serif;
    }

    /* ─── Card Container ─── */
    .error-404-card {
        max-width: 680px;
        width: 100%;
        text-align: center;
    }

    /* ─── Big 404 Number ─── */
    .error-404-code {
        font-size: clamp(100px, 22vw, 200px);
        font-weight: 800;
        line-height: 1;
        margin: 0 0 10px;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        letter-spacing: -8px;
        filter: drop-shadow(0 4px 12px rgba(102, 126, 234, 0.35));
    }

    /* ─── Illustration / Icon ─── */
    .error-404-icon {
        width: 120px;
        height: 120px;
        margin: 0 auto 28px;
    }

    .error-404-icon svg {
        width: 100%;
        height: 100%;
    }

    /* ─── Heading ─── */
    .error-404-title {
        font-size: clamp(22px, 4vw, 30px);
        font-weight: 700;
        color: #1a1a2e;
        margin: 0 0 12px;
    }

    /* ─── Description ─── */
    .error-404-description {
        font-size: 16px;
        color: #6b7280;
        line-height: 1.6;
        margin: 0 0 36px;
        max-width: 480px;
        margin-left: auto;
        margin-right: auto;
    }

    /* ─── Search Form ─── */
    .error-404-search {
        display: flex;
        gap: 10px;
        max-width: 460px;
        margin: 0 auto 40px;
    }

    .error-404-search input[type="text"],
    .error-404-search input[type="search"] {
        flex: 1;
        padding: 14px 20px;
        border: 2px solid #e5e7eb;
        border-radius: 12px;
        font-size: 15px;
        color: #1a1a2e;
        background: #f9fafb;
        outline: none;
        transition: border-color 0.25s, background 0.25s, box-shadow 0.25s;
        box-sizing: border-box;
    }

    .error-404-search input[type="text"]:focus,
    .error-404-search input[type="search"]:focus {
        border-color: #667eea;
        background: #fff;
        box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.15);
    }

    .error-404-search input[type="text"]::placeholder,
    .error-404-search input[type="search"]::placeholder {
        color: #9ca3af;
    }

    .error-404-search button[type="submit"] {
        padding: 14px 24px;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: #fff;
        border: none;
        border-radius: 12px;
        font-size: 15px;
        font-weight: 600;
        cursor: pointer;
        transition: opacity 0.2s, transform 0.15s;
        white-space: nowrap;
    }

    .error-404-search button[type="submit"]:hover {
        opacity: 0.88;
        transform: translateY(-1px);
    }

    .error-404-search button[type="submit"]:active {
        transform: translateY(0);
    }

    /* ─── Quick Links ─── */
    .error-404-links-title {
        font-size: 13px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 1.2px;
        color: #9ca3af;
        margin: 0 0 16px;
    }

    .error-404-links {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 10px;
        margin-bottom: 44px;
    }

    .error-404-links a {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 10px 18px;
        border: 2px solid #e5e7eb;
        border-radius: 30px;
        font-size: 14px;
        font-weight: 500;
        color: #374151;
        text-decoration: none;
        background: #fff;
        transition: border-color 0.2s, color 0.2s, background 0.2s, box-shadow 0.2s;
    }

    .error-404-links a:hover {
        border-color: #667eea;
        color: #667eea;
        background: #f5f3ff;
        box-shadow: 0 2px 8px rgba(102, 126, 234, 0.18);
    }

    .error-404-links a .link-icon {
        font-size: 16px;
        line-height: 1;
    }

    /* ─── Back Home Button ─── */
    .error-404-home-btn {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 14px 32px;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: #fff;
        font-size: 16px;
        font-weight: 600;
        text-decoration: none;
        border-radius: 14px;
        box-shadow: 0 4px 14px rgba(102, 126, 234, 0.4);
        transition: opacity 0.2s, transform 0.15s, box-shadow 0.2s;
    }

    .error-404-home-btn:hover {
        opacity: 0.9;
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(102, 126, 234, 0.45);
    }

    .error-404-home-btn:active {
        transform: translateY(0);
    }

    /* ─── Responsive ─── */
    @media (max-width: 480px) {
        .error-404-wrapper {
            padding: 40px 16px;
        }

        .error-404-search {
            flex-direction: column;
        }

        .error-404-links {
            gap: 8px;
        }
    }
</style>

    <main id="primary" class="site-main">

        <div class="error-404-wrapper">
            <div class="error-404-card">

                <!-- 404 Code -->
                <h1 class="error-404-code">404</h1>

                <!-- SVG Illustration -->
                <div class="error-404-icon">
                    <svg viewBox="0 0 120 120" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <!-- Planet -->
                        <circle cx="60" cy="60" r="42" fill="url(#grad1)" opacity="0.15"/>
                        <circle cx="60" cy="60" r="32" fill="url(#grad1)" opacity="0.25"/>
                        <!-- Orbit ring -->
                        <ellipse cx="60" cy="60" rx="52" ry="18" stroke="url(#grad1)" stroke-width="2.5" stroke-dasharray="6 4" opacity="0.5" transform="rotate(-20 60 60)"/>
                        <!-- Satellite -->
                        <circle cx="104" cy="42" r="5" fill="#764ba2"/>
                        <rect x="99" y="38" width="3" height="2" rx="0.5" fill="#667eea" opacity="0.8"/>
                        <rect x="102" y="38" width="3" height="2" rx="0.5" fill="#667eea" opacity="0.8"/>
                        <!-- Stars -->
                        <circle cx="18" cy="25" r="2" fill="#667eea" opacity="0.6"/>
                        <circle cx="100" cy="18" r="1.5" fill="#764ba2" opacity="0.5"/>
                        <circle cx="12" cy="75" r="1.5" fill="#764ba2" opacity="0.4"/>
                        <circle cx="108" cy="80" r="2" fill="#667eea" opacity="0.45"/>
                        <circle cx="30" cy="100" r="1" fill="#667eea" opacity="0.35"/>
                        <circle cx="90" cy="105" r="1.5" fill="#764ba2" opacity="0.3"/>
                        <!-- Astronaut body -->
                        <circle cx="60" cy="55" r="11" fill="#fff" stroke="#e5e7eb" stroke-width="1.5"/>
                        <!-- Helmet visor -->
                        <circle cx="60" cy="55" r="7" fill="url(#grad1)" opacity="0.35"/>
                        <!-- Eyes -->
                        <circle cx="57" cy="54" r="1.2" fill="#1a1a2e"/>
                        <circle cx="63" cy="54" r="1.2" fill="#1a1a2e"/>
                        <!-- Smile -->
                        <path d="M57.5 57.5 Q60 59.5 62.5 57.5" stroke="#1a1a2e" stroke-width="1" fill="none" stroke-linecap="round"/>
                        <!-- Arms -->
                        <line x1="49" y1="55" x2="42" y2="65" stroke="#fff" stroke-width="3.5" stroke-linecap="round"/>
                        <line x1="71" y1="55" x2="78" y2="65" stroke="#fff" stroke-width="3.5" stroke-linecap="round"/>
                        <!-- Legs -->
                        <line x1="55" y1="64" x2="52" y2="76" stroke="#fff" stroke-width="3.5" stroke-linecap="round"/>
                        <line x1="65" y1="64" x2="68" y2="76" stroke="#fff" stroke-width="3.5" stroke-linecap="round"/>
                        <!-- Defs -->
                        <defs>
                            <linearGradient id="grad1" x1="0%" y1="0%" x2="100%" y2="100%">
                                <stop offset="0%" stop-color="#667eea"/>
                                <stop offset="100%" stop-color="#764ba2"/>
                            </linearGradient>
                        </defs>
                    </svg>
                </div>

                <!-- Title -->
                <h2 class="error-404-title">
                    <?php esc_html_e( 'Lost in space?', 'marsriva' ); ?>
                </h2>

                <!-- Description -->
                <p class="error-404-description">
                    <?php esc_html_e( "The page you're looking for has drifted into a black hole. Let's get you back on track.", 'marsriva' ); ?>
                </p>

                <!-- Search -->
                <div class="error-404-search">
                    <?php
                    $args = array(
                        'echo'       => false,
                        'class_name' => '',
                    );
                    $search_form = get_search_form( $args );
                    // Strip the outer <form> wrapper and re-wrap cleanly
                    ?>
                    <input type="search" name="s" placeholder="<?php echo esc_attr__( 'Search something...', 'marsriva' ); ?>">
                    <button type="submit" onclick="location.href='<?php echo esc_url( home_url( '/' ) ); ?>?s=' + encodeURIComponent(document.querySelector('.error-404-search input').value)">
                        <?php esc_html_e( 'Search', 'marsriva' ); ?>
                    </button>
                </div>

                <!-- Quick Navigation Links -->
                <p class="error-404-links-title">
                    <?php esc_html_e( 'Or jump to', 'marsriva' ); ?>
                </p>
                <nav class="error-404-links" aria-label="<?php esc_attr_e( 'Quick navigation', 'marsriva' ); ?>">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                        <span class="link-icon">🏠</span>
                        <?php esc_html_e( 'Home', 'marsriva' ); ?>
                    </a>
                    <a href="<?php echo esc_url( get_permalink( get_option( 'page_on_load' ) ) ); ?>">
                        <span class="link-icon">📄</span>
                        <?php esc_html_e( 'About', 'marsriva' ); ?>
                    </a>
                    <?php
                    // Blog page
                    if ( get_option( 'page_for_posts' ) ) :
                    ?>
                        <a href="<?php echo esc_url( get_permalink( get_option( 'page_for_posts' ) ) ); ?>">
                            <span class="link-icon">📝</span>
                            <?php esc_html_e( 'Blog', 'marsriva' ); ?>
                        </a>
                    <?php endif; ?>
                    <a href="<?php echo esc_url( get_permalink( get_option( 'page_on_load' ) ) ); ?>">
                        <span class="link-icon">📬</span>
                        <?php esc_html_e( 'Contact', 'marsriva' ); ?>
                    </a>
                </nav>

                <!-- Back Home CTA -->
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="error-404-home-btn">
                    ← <?php esc_html_e( 'Back to Homepage', 'marsriva' ); ?>
                </a>

            </div><!-- .error-404-card -->
        </div><!-- .error-404-wrapper -->

    </main><!-- #main -->

<?php
get_footer();
?>