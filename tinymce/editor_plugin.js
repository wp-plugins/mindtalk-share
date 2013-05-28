(function() {
    tinymce.create('tinymce.plugins.mindtalkplugin', {
 
        init : function(ed, url){
            
            ed.addCommand('mceonpanel', function() {
            
                    ed.windowManager.open({
                            file : url + '/dialog.php',
                            width : 450,
                            height : 200,
                            inline : 1
                    }, {
                            plugin_url : url, // Plugin absolute URL
                    });
                    
            });
            
            ed.addButton('mindtalkplugin', {
                title   : 'Insert Mindtalk share Button',
                cmd     : 'mceonpanel',              
                image   : url + "/mindtalk-button.png"
            });
        },
        
        /* plugin info */
        getInfo : function() {
			
            return {
				
                longname : 'Add Mindtalk Share Button',
                author : 'Jajan Apa',
                authorurl : 'http://jajanapa.com',
                infourl : 'http://jajanapa.com',
                version : "0.1"
				
            };
			
        }
        /* end plugin info */
    });
 
    tinymce.PluginManager.add('mindtalkplugin', tinymce.plugins.mindtalkplugin);
 
})();