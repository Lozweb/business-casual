<?php
/**
 * @package Business Casual
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <header class="entry-header text-center">
    <?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>

    <?php if ( 'post' == get_post_type() ) : ?>
    <div class="entry-meta">
      <?php business_casual_posted_on(); ?>
    </div><!-- .entry-meta -->
    <?php endif; ?>
  </header><!-- .entry-header -->

  <div class="entry-content">
    <?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'business-casual' ) ); ?>
    <?php
      wp_link_pages( array(
        'before' => '<div class="page-links">' . __( 'Pages:', 'business-casual' ),
        'after'  => '</div>',
      ) );
    ?>
  </div><!-- .entry-content -->

  <footer class="entry-footer text-center">
    <?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search ?>
      <?php
        /* translators: used between list items, there is a space after the comma */
        $categories_list = get_the_category_list( __( ', ', 'business-casual' ) );
        if ( $categories_list && business_casual_categorized_blog() ) :
      ?>
      <span class="cat-links">
        <?php printf( __( 'Posted in %1$s', 'business-casual' ), $categories_list ); ?>
      </span>
      <?php endif; // End if categories ?>

      <?php
        /* translators: used between list items, there is a space after the comma */
        $tags_list = get_the_tag_list( '', __( ', ', 'business-casual' ) );
        if ( $tags_list ) :
      ?>
      <span class="tags-links">
        <?php printf( __( 'Tagged %1$s', 'business-casual' ), $tags_list ); ?>
      </span>
      <?php endif; // End if $tags_list ?>
    <?php endif; // End if 'post' == get_post_type() ?>

    <?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
    <span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'business-casual' ), __( '1 Comment', 'business-casual' ), __( '% Comments', 'business-casual' ) ); ?></span>
    <?php endif; ?>

    <?php edit_post_link( __( 'Edit', 'business-casual' ), '<span class="edit-link">', '</span>' ); ?>
    <hr/>
  </footer><!-- .entry-footer -->
</article><!-- #post-## -->
