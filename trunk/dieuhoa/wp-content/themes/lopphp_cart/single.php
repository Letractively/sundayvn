<?php
    get_template_part( 'header' );
    the_post();
    echo "<h2>";
    the_title();
    echo "</h2>";
?>
<p class="product-full-text">
    <?php
        the_content();
    ?>
            </p>
<?php
get_template_part( 'rightcol' );
get_template_part( 'footer' );
