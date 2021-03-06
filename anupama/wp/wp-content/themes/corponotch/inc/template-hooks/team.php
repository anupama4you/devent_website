<?php
/**
 * Team hook
 *
 * @package corponotch
 */

if ( ! function_exists( 'corponotch_add_team_section' ) ) :
    /**
    * Add team section
    *
    *@since CorpoNotch 1.0.0
    */
    function corponotch_add_team_section() {

        // Check if team is enabled on frontpage
        $team_enable = apply_filters( 'corponotch_section_status', 'enable_team', '' );

        if ( ! $team_enable )
            return false;

        // Get team section details
        $section_details = array();
        $section_details = apply_filters( 'corponotch_filter_team_section_details', $section_details );

        if ( empty( $section_details ) ) 
            return;

        // Render team section now.
        corponotch_render_team_section( $section_details );
    }
endif;

if ( ! function_exists( 'corponotch_get_team_section_details' ) ) :
    /**
    * team section details.
    *
    * @since CorpoNotch 1.0.0
    * @param array $input team section details.
    */
    function corponotch_get_team_section_details( $input ) {

        // Content type.
        $content = array();
        $page_ids = array();
        $position = array();

        for ( $i = 1; $i <= 4; $i++ )  :
            $page_id = corponotch_theme_option( 'team_content_page_' . $i );

            if ( ! empty( $page_id ) ) :
                $page_ids[] = $page_id;
                $position[] = corponotch_theme_option( 'team_position_' . $i );
            endif;

        endfor;
        
        $args = array(
            'post_type'         => 'page',
            'post__in'          =>  ( array ) $page_ids,
            'posts_per_page'    => 4,
            'orderby'           => 'post__in',
            );                    


        // Run The Loop.
        $query = new WP_Query( $args );
        if ( $query->have_posts() ) : 
            $i = 0;
            while ( $query->have_posts() ) : $query->the_post();
                $page_post['title']     = get_the_title();
                $page_post['url']       = get_the_permalink();
                $page_post['position']  = ! empty( $position[ $i ] ) ? $position[ $i ] : '';
                $page_post['image']     = has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_id(), 'corponotch-medium' ) : '';

                // Push to the main array.
                array_push( $content, $page_post );
                $i++;
            endwhile;
        endif;
        wp_reset_postdata();
            
        if ( ! empty( $content ) )
            $input = $content;
       
        return $input;
    }
endif;
// team section content details.
add_filter( 'corponotch_filter_team_section_details', 'corponotch_get_team_section_details' );


if ( ! function_exists( 'corponotch_render_team_section' ) ) :
  /**
   * Start team section
   *
   * @return string team content
   * @since CorpoNotch 1.0.0
   *
   */
   function corponotch_render_team_section( $content_details = array() ) {
        if ( empty( $content_details ) )
            return;

        $column = corponotch_theme_option( 'team_column', 'column-4' );
        $title = corponotch_theme_option( 'team_title', '' );
        $sub_title = corponotch_theme_option( 'team_sub_title', '' );

        ?>
        <div class="page-section team-section relative">
            <div class="wrapper">
                 <?php if ( ! empty( $title ) || ! empty( $sub_title ) ) : ?>
                    <div class="section-header align-center">
                        <?php if ( ! empty( $sub_title ) ) : ?>
                            <p class="sub-title"><?php echo esc_html( $sub_title ); ?></p>
                        <?php endif;

                        if ( ! empty( $title ) ) : ?>
                            <h2 class="section-title"><?php echo esc_html( $title ); ?></h2>
                        <?php endif; ?>
                    </div><!-- .section-header -->
                <?php endif; ?>

                <div class="section-content <?php echo esc_attr( $column ); ?>">
                    <?php foreach ( $content_details as $content ) : ?>
                        <article class="hentry <?php echo ! empty( $content['image'] ) ? '' : 'no-featured-image'; ?>">
                            <div class="post-wrapper">
                                <?php if ( ! empty( $content['image'] ) ) : ?>
                                    <div class="team-image">
                                        <a href="<?php echo esc_url( $content['url'] ); ?>">
                                            <img src="<?php echo esc_url( $content['image'] ); ?>" alt="<?php echo esc_attr( $content['title'] ) ?>">
                                        </a>
                                    </div><!-- .team-image -->
                                <?php endif; ?>

                                <div class="entry-container">
                                    <?php if ( ! empty( $content['title'] ) ) : ?>
                                        <header class="entry-header">
                                            <h2 class="entry-title"><a href="<?php echo esc_url( $content['url'] ); ?>"><?php echo esc_html( $content['title'] ); ?></a></h2>
                                        </header>
                                    <?php endif; ?>

                                    <?php if ( ! empty( $content['position'] ) ) : ?>
                                        <h6 class="position"><?php echo esc_html( $content['position'] ); ?></h6>
                                    <?php endif; ?>

                                </div><!-- .entry-container -->
                            </div><!-- .post-wrapper -->
                        </article>
                    <?php endforeach; ?>
                </div><!-- .section-content -->
            </div><!-- .wrapper -->
        </div><!-- #team-posts -->
    <?php 
    }
endif;