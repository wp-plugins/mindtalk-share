<?php
/*
    Plugin Name: Mindtalk for Wordpress
    Plugin URI: https://github.com/temon/mindtalk-wordpress
    Description: Mindtalk is a social channel. This plugins is Add Mindtalk share button and widget on Wordpress.
    Author: Eko Prastyo
    Author URI: http://jajanapa.com
    Version: 0.1

    Copyright (C) 2013, Eko Prastyo
    All rights reserved.

    Redistribution and use in source and binary forms, with or without modification, are permitted provided that the following conditions are met:

    Redistributions of source code must retain the above copyright notice, this list of conditions and the following disclaimer.
    Redistributions in binary form must reproduce the above copyright notice, this list of conditions and the following disclaimer in the documentation and/or other materials provided with the distribution.
    Neither the name of Alex Moss or pleer nor the names of its contributors may be used to endorse or promote products derived from this software without specific prior written permission.
    THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.

*/

// define the URL
define ('ON_MINDTALK_DIR', WP_PLUGIN_DIR.'/mindtalk-for-wordpress/');
define ('ON_MINDTALK_URL', WP_PLUGIN_URL.'/mindtalk-for-wordpress/');

// Checking page if is admin page
if(is_admin()){

    // call function for admin menu
    add_action('admin_menu', 'on_mindtalk_options');

    // function for mindtalk for wordpress options
    function on_mindtalk_options(){

        // add a new setting submenu
        add_options_page('Mindtalk Options', 'Mindtalk Button', 'manage_options', 'mindtalk-button', 'on_mindtalk_panel');

    }

    // adding the filter for tinyMCE
    add_filter('mce_external_plugins', "on_mindtalkplugin_register");
    add_filter('mce_buttons', 'on_mindtalk_add_button', 0);
    add_action('wp_ajax_add_button', 'wp_ajaxaddbutton');

    /**
     * ajax for adding mindtalk
     */
    function wp_ajaxaddbutton(){
        require_once(ON_MINDTALK_DIR.'tinymce/dialog.php');
        die();
    }

    /**
     * add separator ont tinyMCE
     *
     * @param array $buttons
     * @return array
     */
    function on_mindtalk_add_button($buttons)
    {
        array_push($buttons, "separator", "mindtalkplugin");
        return $buttons;
    }

    /**
     * register plugin mindtalk on tinyMCE
     *
     * @param array $plugin_array
     * @return array
     */
    function on_mindtalkplugin_register($plugin_array)
    {
        $url    = ON_MINDTALK_URL."tinymce/editor_plugin.js";

        $plugin_array["mindtalkplugin"] = $url;
        return $plugin_array;
    }



} else {

    // add button to content area.
    add_filter('the_content', 'on_mindtalk');

    /**
     * adding to content
     *
     * @param string $content
     * @return string
     */
    function on_mindtalk($content) {

//     check condition of page and setting plugin
        if ((is_single() && get_option('on_mindtalk_posts') == 'on') ||
            (is_page() && get_option('on_mindtalk_pages') == 'on') ||
            ((is_home() || is_front_page()) && get_option('on_mindtalk_homepage') == 'on')) {

            $url       = (get_option('on_mindtalk_url') == '')     ? get_permalink():get_option('on_mindtalk_url');
            $title   = (get_option('on_mindtalk_title') == '') ? get_the_title():get_option('on_mindtalk_title');

            $top        = (get_option('on_mindtalk_top') == 'on')    ? '<div><dg:share message="'.$title.'" url="'.$url.'"> m | Talk </dg:share></div>':'';
            $bottom     = (get_option('on_mindtalk_bottom') == 'on') ? '<div><dg:share message="'.$title.'" url="'.$url.'"> m | Talk </dg:share></div>':'';

            $content    = $top.$content.$bottom;
        }

        return $content;
    }

    // add js script of mindtalk to wp_footer
    add_action ('wp_footer','on_mindtalk_script');
    function on_mindtalk_script() {
        //$language   = (get_option('on_mindtalk_lang') != 'en-US')? "\n{lang: '".get_option('on_mindtalk_lang')."'}\n": '';
        echo "<!-- Mindtalk  -->\n";
        echo '<script type="text/javascript" src="'.ON_MINDTALK_URL.'mindtalk/dg.share.js"></script>';
        echo "<!-- end Mindtalk  -->\n";
    }


    // script for display button anywhere.
    function the_mindtalk_advance(){

        $title   = (get_option('on_midntalk_title')  == '') ? get_the_title():get_option('on_mindtalk_title');
        $url   = (get_option('on_mindtalk_url')  == '') ? get_permalink():get_option('on_mindtalk_url');

        $button     = '<dg:share message="'.$title.'" url="'. $url .'"> m | Talk </dg:share>';

        echo $button;
    }

    /**
     * Function for display the shortcode.
     *
     * @param type $onShortcode
     * @return string
     */
    function on_mindtalk_shortcode($onShortcode) {
        extract(shortcode_atts(array(
            "url"       => get_option('on_midntalk_url', ''),
            "title"  => get_option('on_midntalk_title', ''),
        ), $onShortcode));

        $title   = ($title == '') ? get_the_title():$title;
        $url   = ($url == '') ? get_permalink():$url;

        $output     = "<!-- Mindtalk Advance -->\n";
        $output    .= '<dg:share message="'.$title.'" url="'. $url .'"> m | Talk </dg:share>';

        return $output;
    }

    add_filter('widget_text', 'do_shortcode');
    add_shortcode('mindtalk', 'on_mindtalk_shortcode');

}


/**
 * Function for display the Plugin Panel Options.
 */
function on_mindtalk_panel() { ?>

    <div class="wrap">
        <div id="icon-options-general" class="icon32"><br></div>
        <h2>Mindtalk Options</h2>

        <div style="float: right; width: 300px; padding: 5px; background-color: #FFFBCC; border: 1px solid #E6DB55; color: #555;">
            <h3>Thanks mas bro</h3>
            <p>Thanks a lot for using my plugin, happy mindtalking and blogging. contact me at : <a href="http://jajanapa.com">Eko Prastyo</a></p>
        </div>

        <form method="post" action="options.php" id="options" style="float: left;">
            <?php wp_nonce_field('update-options') ?>

            <h3>Setting General</h3>

            <table class="form-table">
                <tbody>

                <tr valign="top">
                    <th scope="row">Display position</th>
                    <td>
                        <?php $checked_top = (get_option('on_mindtalk_top') == 'on') ? ' checked="yes"' : ''; ?>
                        <label id="on_mindtalk_top" ><input type="checkbox" id="on_mindtalk_top" name="on_mindtalk_top"<?php echo $checked_top; ?> /> Top of content</label>
                        <br />
                        <?php $checked_bottom = (get_option('on_mindtalk_bottom') == 'on') ? ' checked="yes"' : ''; ?>
                        <label id="on_mindtalk_bottom" ><input type="checkbox" id="on_mindtalk_bottom" name="on_mindtalk_bottom"<?php echo $checked_bottom; ?> /> Bottom of content</label>

                    </td>
                </tr>

                <tr valign="top">
                    <th scope="row">Show on </th>
                    <td>
                        <?php $checked_posts = (get_option('on_mindtalk_posts') == 'on') ? ' checked="yes"' : ''; ?>
                        <label id="on_mindtalk_posts" ><input type="checkbox" id="on_mindtalk_posts" name="on_mindtalk_posts"<?php echo $checked_posts; ?> /> Post</label>

                        <br/>

                        <?php $checked_pages = (get_option('on_mindtalk_pages') == 'on') ? ' checked="yes"' : ''; ?>
                        <label id="on_mindtalk_pages" ><input type="checkbox" id="on_mindtalk_pages" name="on_mindtalk_pages"<?php echo $checked_pages; ?> /> Pages</label>

                        <br/>

                        <?php $checked_home = (get_option('on_mindtalk_homepage') == 'on') ? ' checked="yes"' : ''; ?>
                        <label id="on_mindtalk_homepage" ><input type="checkbox" id="on_mindtalk_homepage" name="on_mindtalk_homepage"<?php echo $checked_home; ?> /> Home Page</label>
                    </td>
                </tr>

                </tbody>
            </table>

            <input type="hidden" name="action" value="update" />
            <input type="hidden" name="page_options" value="on_mindtalk_posts, on_mindtalk_pages, on_mindtalk_homepage, on_mindtalk_top, on_mindtalk_bottom" />
            <div class="submit"><input type="submit" class="button-primary" name="submit" value="Save Settings"></div>


        </form>

    </div>

<?php } ?>