<?php
    // Imports the content of header.php to the template
    get_header();

    // Displaying posts via posts loop
    while(have_posts()) {
        the_post();?>
        <h2><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h2>
        <div><?php the_content(); ?></div>
        <hr>

    <?php } 

    // Imports the content of footer.php to the template
    get_footer();
?>