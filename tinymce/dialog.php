<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Mindtalk Share Shortcode Panel</title>
    <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php echo get_option('blog_charset'); ?>" />
    <script language="javascript" type="text/javascript" src="<?php echo get_option('siteurl') ?>/wp-includes/js/tinymce/tiny_mce_popup.js"></script>
    <script language="javascript" type="text/javascript" src="<?php echo get_option('siteurl') ?>/wp-includes/js/tinymce/utils/mctabs.js"></script>
    <script language="javascript" type="text/javascript" src="<?php echo get_option('siteurl') ?>/wp-includes/js/tinymce/utils/form_utils.js"></script>
    <script language="javascript" type="text/javascript" src="<?php echo ON_MINDTALK_URL; ?>tinymce/tinymce.js"></script>
</head>
<body id="link" style="display: none">
<form name="on_tabs" action="#">
    <div class="tabs">
    </div>

    <div class="panel_wrapper">
        <!-- gallery panel -->
        <div id="onshortcode_panel" class="panel current">
            <br />

            <table border="0" cellpadding="2" cellspacing="0">
                <tr>
                    <td nowrap="nowrap"><label for="mindtalk_url"><?php _e("Entry Custom URL:"); ?></label></td>
                    <td>
                        <input type="text" id="mindtalk_url" name="mindtalk_url"/>
                    </td>
                </tr>
                <tr>
                    <td nowrap="nowrap"><label for="mindtalk_title"><?php _e("Entry Custom Title:"); ?></label></td>
                    <td>
                        <input type="text" id="mindtalk_title" name="mindtalk_title"/>
                    </td>
                </tr>
            </table>

        </div>

    </div>


    </div>

    <div class="mceActionPanel">
        <div style="float: left">
            <input type="button" id="cancel" name="cancel" value="Cancel" onClick="tinyMCEPopup.close();" />
        </div>

        <div style="float: right">
            <input type="submit" id="insert" name="insert" value="Insert" onClick="onshortcodesubmit();" />
        </div>
    </div>
</form>
</body>