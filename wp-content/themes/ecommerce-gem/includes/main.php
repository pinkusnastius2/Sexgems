<?php
/**
 * Load files.
 *
 * @package eCommerce_Gem
 */

// Customizer additions.
require_once trailingslashit( get_template_directory() ) . '/includes/customizer/customizer.php';

// Load core functions.
require_once trailingslashit( get_template_directory() ) . '/includes/customizer/core.php';

// Load helper functions.
require_once trailingslashit( get_template_directory() ) . '/includes/helpers.php';

// Custom template tags for this theme.
require_once trailingslashit( get_template_directory() ) . '/includes/template-tags.php';

// Custom functions that act independently of the theme templates.
require_once trailingslashit( get_template_directory() ) . '/includes/template-functions.php';

// Load widgets.
require_once trailingslashit( get_template_directory() ) . '/includes/widgets/widgets.php';

// Load hooks.
require_once trailingslashit( get_template_directory() ) . '/includes/hooks.php';

// Load woo-commerce overrides.
require_once trailingslashit( get_template_directory() ) . '/includes/woo-overrides.php';