<?php
if( ! function_exists( 'biography_excerpt_length' ) ) :

    /**
     * Excerpt length
     *
     * @since  Biography 1.0.0
     *
     * @param null
     * @return int
     */
    function biography_excerpt_length( ){
        $biography_customizer_saved_values = biography_get_all_options(1);
        $biography_excerpt_length = $biography_customizer_saved_values['biography-excerpt-length'];
        return absint( $biography_excerpt_length );
    }

endif;
add_filter( 'excerpt_length', 'biography_excerpt_length', 999 );