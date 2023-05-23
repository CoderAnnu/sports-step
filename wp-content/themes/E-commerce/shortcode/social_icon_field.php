<?php
add_filter('admin_init', 'register_my_general_settings_fields');
function register_my_general_settings_fields()
{
    register_setting('general', '_social_link_youtube', 'esc_attr');
    register_setting('general', '_social_link_twitter', 'esc_attr');
    register_setting('general', '_social_link_facebook', 'esc_attr');
    register_setting('general', '_social_link_instagram', 'esc_attr');

    add_settings_field('_social_link_youtube', '<label for="_social_link_youtube">' . __('Youtube', 'stg') . '</label>', 'general_settings_social_link_youtube_html', 'general');
    add_settings_field('_social_link_twitter', '<label for="_social_link_twitter">' . __('Twitter', 'stg') . '</label>', 'general_settings_social_link_twitter', 'general');
    add_settings_field('_social_link_facebook', '<label for="_social_link_facebook">' . __('Facebook', 'stg') . '</label>', 'general_settings_social_link_facebook', 'general');
    add_settings_field('_social_link_instagram', '<label for="_social_link_instagram">' . __('Instagram', 'stg') . '</label>', 'general_settings_social_link_instagram', 'general');
}

function general_settings_social_link_youtube_html()
{   
    $value = get_option('_social_link_youtube', '');
    echo '<input type="text" id="_social_link_youtube" name="_social_link_youtube" value="' . $value . '" />';
}

function general_settings_social_link_twitter()
{
    $value = get_option('_social_link_twitter', '');
    echo '<input type="text" id="_social_link_twitter" name="_social_link_twitter" value="' . $value . '" />';
}

function general_settings_social_link_facebook()
{
    $value = get_option('_social_link_facebook', '');
    echo '<input type="text" id="_social_link_facebook" name="_social_link_facebook" value="' . $value . '" />';
}


function general_settings_social_link_instagram()
{
    $value = get_option('_social_link_instagram', '');
    echo '<input type="text" id="_social_link_instagram" name="_social_link_instagram" value="' . $value . '" />';
}
