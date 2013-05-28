function init() {
	tinyMCEPopup.resizeToInnerSize();
}

function onshortcodesubmit() {
	
	var tagtext;
	
	var on_shortcode = document.getElementById('onshortcode_panel');
	
	// who is active ?
	if (on_shortcode.className.indexOf('current') != -1) {
		var mindtalk_url        = document.getElementById('mindtalk_url').value;
		var mindtalk_title      = document.getElementById('mindtalk_title').value;

            if(mindtalk_url != '')      { mindtalk_url = ' url="'+mindtalk_url+'"'; } else { mindtalk_url = ''; }
            if(mindtalk_title != '') { mindtalk_title = ' title="'+mindtalk_title+'"'; } else { mindtalk_title = ''; }
                
            tagtext = "[mindtalk"+mindtalk_url+mindtalk_title+"]"
                
        }

        if(window.tinyMCE) {
                window.tinyMCE.execInstanceCommand('content', 'mceInsertContent', false, tagtext);
                tinyMCEPopup.editor.execCommand('mceRepaint');
                tinyMCEPopup.close();
        }
	return;
}