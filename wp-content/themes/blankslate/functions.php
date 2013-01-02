<?php
add_action('after_setup_theme', 'blankslate_setup');
function blankslate_setup(){
    load_theme_textdomain('blankslate', get_template_directory() . '/languages');
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'post-thumbnails' );
    global $content_width;
    if ( ! isset( $content_width ) ) $content_width = 640;
    register_nav_menus(
        array( 'main-menu' => __( 'Main Menu', 'blankslate' ) )
        );
}
add_action('comment_form_before', 'blankslate_enqueue_comment_reply_script');
function blankslate_enqueue_comment_reply_script()
{
    if(get_option('thread_comments')) { wp_enqueue_script('comment-reply'); }
}
add_filter('the_title', 'blankslate_title');
function blankslate_title($title) {
    if ($title == '') {
        return 'Untitled';
    } else {
        return $title;
    }
}
add_filter('wp_title', 'blankslate_filter_wp_title');
function blankslate_filter_wp_title($title)
{
    return $title . esc_attr(get_bloginfo('name'));
}
add_filter('comment_form_defaults', 'blankslate_comment_form_defaults');
function blankslate_comment_form_defaults( $args )
{
    $req = get_option( 'require_name_email' );
    $required_text = sprintf( ' ' . __('Required fields are marked %s', 'blankslate'), '<span class="required">*</span>' );
    $args['comment_notes_before'] = '<p class="comment-notes">' . __('Your email is kept private.', 'blankslate') . ( $req ? $required_text : '' ) . '</p>';
    $args['title_reply'] = __('Post a Comment', 'blankslate');
    $args['title_reply_to'] = __('Post a Reply to %s', 'blankslate');
    return $args;
}
add_action( 'init', 'blankslate_set_default_widgets' );
function blankslate_set_default_widgets() {
    if ( is_admin() && isset( $_GET['activated'] ) ) {
        update_option( 'sidebars_widgets', $preset_widgets );
    }
}
add_action( 'init', 'blankslate_add_shortcodes' );
function blankslate_add_shortcodes() {
    add_filter('widget_text', 'do_shortcode');
    add_shortcode('wp_caption', 'fixed_img_caption_shortcode');
    add_shortcode('caption', 'fixed_img_caption_shortcode');
}



add_action( 'init', 'wpse36779_add_shortcode' );
/**
 * Adds the shortcode
 * 
 * @ uses add_shortcode
 */
function wpse36779_add_shortcode()
{
    add_shortcode( 'multigallery', 'wpse36779_shortcode_cb' );
}

/**
 * The shortcode callback function
 *
 * @ uses do_shortcode
 */
function wpse36779_shortcode_cb( $atts )
{
    $atts = shortcode_atts(
        array(
            'id' => false
            ),
        $atts 
        );

    if( ! $atts['id'] )
    {   
        // no list of ids? Just send back a gallery
        return do_shortcode( '[gallery]' );
    }
    else
    {
        $ids = array_map( 'trim', explode( ',', $atts['id'] ) );
        $out = '';
        foreach( $ids as $id )
        {
            if( $id )
                $out .= do_shortcode( sprintf( '[gallery id="%s" link="file"]', absint( $id ) ) );
        }
    }
    return $out;
}


add_filter( 'post_gallery', 'wpse18689_post_gallery', 100, 2 );
function wpse18689_post_gallery( $gallery, $attr )
{
    if ( ! is_array( $attr ) || array_key_exists( 'wpse18689_passed', $attr ) ) {
        return '';
    }
    $attr['wpse18689_passed'] = true;

    if ( false !== strpos( $attr['id'], ',' ) ) {
        $id_attr = shortcode_atts( array(
            'id' => 'this',
            'order' => 'ASC',
            'orderby'    => 'menu_order ID',
            ), $attr );
        $all_attachment_ids = array();
        $post_ids = explode( ',', $id_attr['id'] );
        foreach ( $post_ids as $post_id ) {
            if ( 'this' == $post_id ) {
                $post_id = $GLOBALS['post']->ID;
            }
            $post_attachments = get_children( array(
                'post_parent' => $post_id,
                'post_status' => 'inherit',
                'post_type' => 'attachment',
                'numberposts' => 5000,
                'post_mime_type' => 'image',
                'order' => $id_attr['order'],
                'orderby' => $id_attr['orderby'],
                ), ARRAY_A );
            $all_attachment_ids = array_merge( $all_attachment_ids, array_keys( $post_attachments ) );
        }
        $attr['include'] = implode( ',', $all_attachment_ids );
        $attr['id'] = null;
    }

    return gallery_shortcode( $attr );
}


function my_post_image_html( $html, $post_id, $post_image_id ) {
    $html = '' . $html . '';
    return $html;
}

add_filter( 'post_thumbnail_html', 'my_post_image_html', 100, 3 );


function fixed_img_caption_shortcode($attr, $content = null) {
    $output = apply_filters('img_caption_shortcode', '', $attr, $content);
    if ( $output != '' ) return $output;
    extract(shortcode_atts(array(
        'id'=> '',
        'align'	=> 'alignnone',
        'width'	=> '',
        'caption' => ''), $attr));
    if ( 1 > (int) $width || empty($caption) )
        return $content;
    if ( $id ) $id = 'id="' . esc_attr($id) . '" ';
    return '<div ' . $id . 'class="wp-caption ' . esc_attr($align)
    . '">'
    . do_shortcode( $content ) . '<p class="wp-caption-text">'
    . $caption . '</p></div>';
}
add_action( 'widgets_init', 'blankslate_widgets_init' );
function blankslate_widgets_init() {
    register_sidebar( array (
        'name' => __('Sidebar Widget Area', 'blankslate'),
        'id' => 'primary-widget-area',
        'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
        'after_widget' => "</li>",
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
        ) );
}
$preset_widgets = array (
    'primary-aside'  => array( 'search', 'pages', 'categories', 'archives' ),
    );
function blankslate_get_page_number() {
    if (get_query_var('paged')) {
        print ' | ' . __( 'Page ' , 'blankslate') . get_query_var('paged');
    }
}
function blankslate_catz($glue) {
    $current_cat = single_cat_title( '', false );
    $separator = "\n";
    $cats = explode( $separator, get_the_category_list($separator) );
    foreach ( $cats as $i => $str ) {
        if ( strstr( $str, ">$current_cat<" ) ) {
            unset($cats[$i]);
            break;
        }
    }
    if ( empty($cats) )
        return false;
    return trim(join( $glue, $cats ));
}
function blankslate_tag_it($glue) {
    $current_tag = single_tag_title( '', '',  false );
    $separator = "\n";
    $tags = explode( $separator, get_the_tag_list( "", "$separator", "" ) );
    foreach ( $tags as $i => $str ) {
        if ( strstr( $str, ">$current_tag<" ) ) {
            unset($tags[$i]);
            break;
        }
    }
    if ( empty($tags) )
        return false;
    return trim(join( $glue, $tags ));
}
function blankslate_commenter_link() {
    $commenter = get_comment_author_link();
    if ( ereg( '<a[^>]* class=[^>]+>', $commenter ) ) {
        $commenter = preg_replace( '/(<a[^>]* class=[\'"]?)/', '\\1url ' , $commenter );
    } else {
        $commenter = preg_replace( '/(<a )/', '\\1class="url "' , $commenter );
    }
    $avatar_email = get_comment_author_email();
    $avatar = str_replace( "class='avatar", "class='photo avatar", get_avatar( $avatar_email, 80 ) );
    echo $avatar . ' <span class="fn n">' . $commenter . '</span>';
}
function blankslate_custom_comments($comment, $args, $depth) {
    $GLOBALS['comment'] = $comment;
    $GLOBALS['comment_depth'] = $depth;
    ?>
    <li id="comment-<?php comment_ID() ?>" <?php comment_class() ?>>
        <div class="comment-author vcard"><?php blankslate_commenter_link() ?></div>
        <div class="comment-meta"><?php printf(__('Posted %1$s at %2$s', 'blankslate' ), get_comment_date(), get_comment_time() ); ?><span class="meta-sep"> | </span> <a href="#comment-<?php echo get_comment_ID(); ?>" title="<?php _e('Permalink to this comment', 'blankslate' ); ?>"><?php _e('Permalink', 'blankslate' ); ?></a>
            <?php edit_comment_link(__('Edit', 'blankslate'), ' <span class="meta-sep"> | </span> <span class="edit-link">', '</span>'); ?></div>
            <?php if ($comment->comment_approved == '0') { echo '\t\t\t\t\t<span class="unapproved">'; _e('Your comment is awaiting moderation.', 'blankslate'); echo '</span>\n'; } ?>
            <div class="comment-content">
                <?php comment_text() ?>
            </div>
            <?php
            if($args['type'] == 'all' || get_comment_type() == 'comment') :
                comment_reply_link(array_merge($args, array(
                    'reply_text' => __('Reply','blankslate'),
                    'login_text' => __('Login to reply.', 'blankslate'),
                    'depth' => $depth,
                    'before' => '<div class="comment-reply-link">',
                    'after' => '</div>'
                    )));
            endif;
            ?>
            <?php }
            function blankslate_custom_pings($comment, $args, $depth) {
                $GLOBALS['comment'] = $comment;
                ?>
                <li id="comment-<?php comment_ID() ?>" <?php comment_class() ?>>
                    <div class="comment-author"><?php printf(__('By %1$s on %2$s at %3$s', 'blankslate'),
                        get_comment_author_link(),
                        get_comment_date(),
                        get_comment_time() );
                        edit_comment_link(__('Edit', 'blankslate'), ' <span class="meta-sep"> | </span> <span class="edit-link">', '</span>'); ?></div>
                        <?php if ($comment->comment_approved == '0') { echo '\t\t\t\t\t<span class="unapproved">'; _e('Your trackback is awaiting moderation.', 'blankslate'); echo '</span>\n'; } ?>
                        <div class="comment-content">
                            <?php comment_text() ?>
                        </div>
                        <?php }
