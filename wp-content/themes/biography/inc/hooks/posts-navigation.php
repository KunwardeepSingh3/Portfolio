<?php

if ( ! function_exists( 'biography_numeric_posts_navigation' ) ) :

    /**
     * Numeric navigation options
     *
     * @since  Biography 1.0.9
     *
     * @param null
     * @return int
     */
    function biography_numeric_posts_navigation() {
        global $wp_query;
        $big = 999999999; // need an unlikely integer
        $translated = esc_html__( 'Page', 'biography' ); // Supply translatable string\
        $args = array(
            'base'               => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
            'format'             => '?paged=%#%',
            'total'              => $wp_query->max_num_pages,
            'current'            => max( 1, get_query_var('paged') ),
            'show_all'           => False,
            'prev_next'          => True,
            'prev_text'          => '<i class="fa fa-angle-left"></i>',
            'next_text'          => '<i class="fa fa-angle-right"></i>',
            'before_page_number' => '<span class="screen-reader-text">'.$translated.' </span>'
        );
        echo paginate_links( $args);
    }
endif;

if ( ! function_exists( 'biography_posts_navigation' ) ) :

    /**
     * Posts navigation options
     *
     * @since  Biography 1.0.0
     *
     * @param null
     * @return int
     */
    function biography_posts_navigation() {
        global $biography_customizer_saved_options;
        $biography_pagination_options = $biography_customizer_saved_options['biography-pagination-options'];

        switch ( $biography_pagination_options ) {
            case 'default':
                the_posts_navigation();
                break;

            case 'numeric':
                biography_numeric_posts_navigation();
                break;

            default:
                break;
        }

    }
endif;
add_action( 'biography_action_posts_navigation', 'biography_posts_navigation' );