<?php
/**
 * Biography themes init file
 *
 * @package Biography
 * @since Biography 1.0.0
 */

/**
 * Customizer additions.
 */
require trailingslashit( get_template_directory() ).'inc/customizer/customizer.php';

/**
 * Include Functions
 */
require trailingslashit( get_template_directory() ).'inc/extra-functions.php';

/**
 * Include Hooks
 */
require trailingslashit( get_template_directory() ).'inc/hooks/excerpt.php';

require trailingslashit( get_template_directory() ).'inc/hooks/init.php';

require trailingslashit( get_template_directory() ).'inc/hooks/header.php';

require trailingslashit( get_template_directory() ).'inc/hooks/footer.php';

require trailingslashit( get_template_directory() ).'inc/hooks/posts-navigation.php';

require trailingslashit( get_template_directory() ).'inc/hooks/featured-slider/featured-main-hook.php';

require trailingslashit( get_template_directory() ).'inc/hooks/homepage-service.php';

require trailingslashit( get_template_directory() ).'inc/hooks/homepage-review.php';

require trailingslashit( get_template_directory() ).'inc/hooks/homepage-testimonial.php';

require trailingslashit( get_template_directory() ).'inc/hooks/homepage-history.php';

require trailingslashit( get_template_directory() ).'inc/hooks/front-page.php';

require trailingslashit( get_template_directory() ).'inc/tgm-plugin/tgm-hook.php';

// Load customizer theme pro link
require get_template_directory() . '/inc/customizer/upgrade-to-pro/class-customize.php';