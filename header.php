<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Primary Meta Tags -->
    <title><?php wp_title('|', true, 'right'); ?></title>
    <meta name="title" content="<?php wp_title('|', true, 'right'); ?>">
    <meta name="description" content="<?php echo get_bloginfo('description'); ?>">
    
    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?php echo get_permalink(); ?>">
    <meta property="og:title" content="<?php wp_title('|', true, 'right'); ?>">
    <meta property="og:description" content="<?php echo get_bloginfo('description'); ?>">
    <meta property="og:image" content="<?php echo get_theme_file_uri('assets/images/og-image.jpg'); ?>">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="<?php echo get_permalink(); ?>">
    <meta property="twitter:title" content="<?php wp_title('|', true, 'right'); ?>">
    <meta property="twitter:description" content="<?php echo get_bloginfo('description'); ?>">
    <meta property="twitter:image" content="<?php echo get_theme_file_uri('assets/images/og-image.jpg'); ?>">

    <!-- Theme Color -->
    <meta name="theme-color" content="#162641">
    <meta name="msapplication-navbutton-color" content="#162641">
    <meta name="apple-mobile-web-app-status-bar-style" content="#162641">
    
    <!-- Favicon -->
    <link rel="icon" href="<?php echo get_theme_file_uri('assets/images/favicon.ico'); ?>" type="image/x-icon">
    <link rel="apple-touch-icon" href="<?php echo get_theme_file_uri('assets/images/apple-touch-icon.png'); ?>">

    <?php wp_head(); ?>
    
    <!-- Meta Pixel Code -->
    <script>
    !function(f,b,e,v,n,t,s)
    {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
    n.callMethod.apply(n,arguments):n.queue.push(arguments)};
    if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
    n.queue=[];t=b.createElement(e);t.async=!0;
    t.src=v;s=b.getElementsByTagName(e)[0];
    s.parentNode.insertBefore(t,s)}(window, document,'script',
    'https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '2619201314945084');
    fbq('track', 'PageView');
    </script>
    <noscript>
        <img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=2619201314945084&ev=PageView&noscript=1" alt="Facebook Pixel" />
    </noscript>
    <!-- End Meta Pixel Code -->
</head>

<body <?php body_class(); ?>>
    <a class="skip-main" href="#main-content">Skip to main content</a>
    
    <header>
        <div class="header_wrap">
            <div class="logo">
                <a href="<?php echo home_url(); ?>" aria-label="Ahava Medical Home">
                    <img src="<?php echo get_theme_file_uri('assets/images/Ahava-Primary-Logo-2023-Color.png'); ?>" alt="Ahava Medical Logo" width="200" height="50"/>
                </a>
            </div>

            <button class="accessibility-hidden" aria-expanded="false" aria-controls="navbar" onclick="toggle('navbar')">
                Toggle Navigation Menu
            </button>
            
            <nav class="nav" id="navbar" aria-label="Main navigation">
                <?php 
                    wp_nav_menu( array(
                        'menu' => 'Main menu',
                        'container' => false,
                        'menu_class' => 'nav-menu',
                        'fallback_cb' => false
                    ) );
                ?>
                
                <a class="request_appointment mobile_appointment" href="/request-appointment/" aria-label="Request an appointment">REQUEST APPOINTMENT</a>
            </nav>

            <button class="accessibility-hidden" aria-expanded="false" aria-controls="search-wrapper" onclick="toggle('search-wrapper')">
                Toggle Search
            </button>
            
            <div class="search-wrapper" id="search-wrapper" role="search" aria-label="Site search">
                <button id="open-search" aria-label="Open search">
                    <svg fill="#1b7b54" height="64" width="64" viewBox="-19.54 -19.54 527.48 527.48" xml:space="preserve" stroke="#1b7b54" stroke-width="18.0708" aria-hidden="true">
                        <path d="M0,203.25c0,112.1,91.2,203.2,203.2,203.2c51.6,0,98.8-19.4,134.7-51.2l129.5,129.5c2.4,2.4,5.5,3.6,8.7,3.6 s6.3-1.2,8.7-3.6c4.8-4.8,4.8-12.5,0-17.3l-129.6-129.5c31.8-35.9,51.2-83,51.2-134.7c0-112.1-91.2-203.2-203.2-203.2 S0,91.15,0,203.25z M381.9,203.25c0,98.5-80.2,178.7-178.7,178.7s-178.7-80.2-178.7-178.7s80.2-178.7,178.7-178.7 S381.9,104.65,381.9,203.25z"/>
                    </svg>
                </button>
                <div class="search-hidden">
                    <?php echo do_shortcode('[searchandfilter id="2244"]'); ?>
                </div>
            </div>

            <a class="request_appointment" href="/request-appointment/" aria-label="Request an appointment">REQUEST APPOINTMENT</a>

            <button class="mob-btn toggle-menu" aria-label="Toggle mobile menu">
                <span></span>
            </button>
        </div>
    </header>
    
    <main id="main-content">

        
