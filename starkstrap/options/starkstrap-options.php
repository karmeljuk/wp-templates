<?php

function starkstrap_get_default_options() {  
    $options = array(  
        'logo' => ''  
    );  
    return $options;  
}  

function starkstrap_options_init() {  
    $starkstrap_options = get_option( 'theme_starkstrap_options' );  
  
    // Are our options saved in the DB?  
    if ( false === $starkstrap_options ) {  
        // If not, we'll save our default options  
        $starkstrap_options = starkstrap_get_default_options();  
        add_option( 'theme_starkstrap_options', $starkstrap_options ); 
    } 
    
 
    // In other case we don't need to update the DB  
}  
  
// Initialize Theme options  
add_action( 'after_setup_theme', 'starkstrap_options_init' ); 

// Add "Starkstrap Options" link to the "Appearance" menu  
function starkstrap_menu_options() {  
// add_theme_page( $page_title, $menu_title, $capability, $menu_slug, $function);  
add_theme_page('Starkstrap Options', 'Starkstrap Options', 'edit_theme_options', 'starkstrap-settings', 'starkstrap_admin_options_page');  
}  
// Load the Admin Options page  
add_action('admin_menu', 'starkstrap_menu_options');  

function starkstrap_admin_options_page() {  
    ?>  
        <!-- 'wrap','submit','icon32','button-primary' and 'button-secondary' are classes  
        for a good WP Admin Panel viewing and are predefined by WP CSS -->  

        <div class="wrap">  

            <div id="icon-themes" class="icon32"><br /></div>  

            <h2><?php _e( 'Starkstrap Options', 'starkstrap' ); ?></h2>  

            <!-- If we have any error by submiting the form, they will appear here -->  
            <?php settings_errors( 'starkstrap-settings-errors' ); ?>  

            <form id="form-starkstrap-options" action="options.php" method="post" enctype="multipart/form-data">  

                <?php  
                    settings_fields('theme_starkstrap_options');  
                    do_settings_sections('starkstrap');  
                ?>  

                <p class="submit">  
                    <input name="theme_starkstrap_options[submit]" id="submit_options_form" type="submit" class="button-primary" value="<?php esc_attr_e('Save Settings', 'starkstrap'); ?>" />  
                    <input name="theme_starkstrap_options[reset]" type="submit" class="button-secondary" value="<?php esc_attr_e('Reset Defaults', 'starkstrap'); ?>" />  
                </p>  

            </form>  

        </div>  
    <?php  
}  

function starkstrap_options_settings_init() {  
    register_setting( 'theme_starkstrap_options', 'theme_starkstrap_options', 'starkstrap_options_validate' );  

    // Add a form section for the Logo  
    add_settings_section('starkstrap_settings_header', __( 'Logo Options', 'starkstrap' ), 'starkstrap_settings_header_text', 'starkstrap');  

    // Add Logo uploader  
    add_settings_field('starkstrap_setting_logo',  __( 'Logo', 'starkstrap' ), 'starkstrap_setting_logo', 'starkstrap', 'starkstrap_settings_header');  
    
    // Add Current Image Preview  
    add_settings_field('starkstrap_setting_logo_preview',  __( 'Logo Preview', 'starkstrap' ), 'starkstrap_setting_logo_preview', 'starkstrap', 'starkstrap_settings_header');  

}  
add_action( 'admin_init', 'starkstrap_options_settings_init' );  

function starkstrap_settings_header_text() {  
    ?>  
        <p><?php _e( 'Manage Logo Options for Starkstrap Theme.', 'starkstrap' ); ?></p>  
    <?php  
}  

function starkstrap_setting_logo() {  
    $starkstrap_options = get_option( 'theme_starkstrap_options' );  
    ?>  
        <input type="hidden" id="logo_url" name="theme_starkstrap_options[logo]" value="<?php echo esc_url( $starkstrap_options['logo'] ); ?>" />  
        <input id="upload_logo_button" type="button" class="button" value="<?php _e( 'Upload Logo', 'starkstrap' ); ?>" />  
        <?php if ( '' != $starkstrap_options['logo'] ): ?>  
            <input id="delete_logo_button" name="theme_wptuts_options[delete_logo]" type="submit" class="button" value="<?php _e( 'Delete Logo', 'starkstrap' ); ?>" />  
        <?php endif; ?> 
        <span class="description"><?php _e('Upload an image for the banner.', 'starkstrap' ); ?></span>  
    <?php  
}  

function starkstrap_options_validate( $input ) {  
    $default_options = starkstrap_get_default_options();  
    $valid_input = $default_options;  

    $submit = ! empty($input['submit']) ? true : false;  
    $reset = ! empty($input['reset']) ? true : false;  

    if ( $submit )  
        $valid_input['logo'] = $input['logo'];  
    elseif ( $reset )  
        $valid_input['logo'] = $default_options['logo'];  

    return $valid_input;  
}  

function starkstrap_options_enqueue_scripts() {  
    wp_register_script( 'starkstrap-upload', get_template_directory_uri() .'/options/js/starkstrap-upload.js', array('jquery','media-upload','thickbox') );  
  
    if ( 'appearance_page_starkstrap-settings' == get_current_screen() -> id ) {  
        wp_enqueue_script('jquery');  
  
        wp_enqueue_script('thickbox');  
        wp_enqueue_style('thickbox');  
  
        wp_enqueue_script('media-upload');  
        wp_enqueue_script('starkstrap-upload');  
  
    }  
  
}  
add_action('admin_enqueue_scripts', 'starkstrap_options_enqueue_scripts');

function starkstrap_options_setup() {  
    global $pagenow;  
  
    if ( 'media-upload.php' == $pagenow || 'async-upload.php' == $pagenow ) {  
        // Now we'll replace the 'Insert into Post Button' inside Thickbox  
        add_filter( 'gettext', 'replace_thickbox_text'  , 1, 3 ); 
    } 
} 
add_action( 'admin_init', 'starkstrap_options_setup' ); 
 
function replace_thickbox_text($translated_text, $text, $domain) { 
    if ('Insert into Post' == $text) { 
        $referer = strpos( wp_get_referer(), 'starkstrap-settings' ); 
        if ( $referer != '' ) { 
            return __('I want this to be my logo!', 'starkstrap' );  
        }  
    }  
    return $translated_text;  
} 

function starkstrap_setting_logo_preview() {  
    $starkstrap_options = get_option( 'theme_starkstrap_options' );  ?>  
    <div id="upload_logo_preview" style="min-height: 100px;">  
         <img style="max-width:100%;" src="<?php echo esc_url($starkstrap_options['logo'] ); ?>" />
    </div>  
    <?php  
}  

$default_options = starkstrap_get_default_options();  
$valid_input = $default_options;  

$starkstrap_options = get_option('theme_starkstrap_options');  

$submit = ! empty($input['submit']) ? true : false;  
$reset = ! empty($input['reset']) ? true : false;  
$delete_logo = ! empty($input['delete_logo']) ? true : false;  

if ( $submit ) {  
    if ( $starkstrap_options['logo'] != $input['logo'] && $starkstrap_options['logo'] != '' )  
        delete_image( $starkstrap_options['logo'] );  

    $valid_input['logo'] = $input['logo'];  
}  
elseif ( $reset ) {  
    delete_image( $starkstrap_options['logo'] );  
    $valid_input['logo'] = $default_options['logo'];  
}  
elseif ( $delete_logo ) {  
    delete_image( $starkstrap_options['logo'] );  
    $valid_input['logo'] = '';  
}  

return $valid_input;  

