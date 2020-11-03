<!DOCTYPE html>
<html <?php language_attributes(); ?> > <!-- Gets the language setting from WP settings -->
<head>
    <meta charset="<?php bloginfo('charset'); ?>"> <!-- Gets the correct character set for the defined language -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <title> tags are added via functions.php --> 

    <!-- Adds the WordPress generated stuff that belongs to head section (css-files, scripts-files); What to generate is defined in functions.php  -->
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>> <!-- Adds useful classes depending of the page (type) -->