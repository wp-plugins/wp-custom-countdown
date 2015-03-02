( function() {
	tinymce.PluginManager.add( 'wcc_button', function( editor, url ) {

		// Add a button that opens a window
		editor.addButton( 'wcc_button_key', {
			title: 'Wordpress Custom CountDown',
			icon: 'custom_icon dashicons dashicons-marker',
			onclick: function() {
				// Open window
				editor.windowManager.open( {
					title: 'Wordpress Custom CountDown',
                                        width : 400,
                                        height : 300,
					body: [{
						type: 'listbox',
						name: 'theme',
						label: 'Theme',
						'values': [
								{text: 'Flat Colors', value: 'flat-colors'},
								{text: 'Flat Colors Wide', value: 'flat-colors-wide'},
                                                                {text: 'Flat Colors Very Wide', value: 'flat-colors-very-wide'},
                                                                {text: 'Flat Colors Black', value: 'flat-colors-black'},
                                                                {text: 'Black', value: 'black'},
                                                                {text: 'Black Wide', value: 'black-wide'},
                                                                {text: 'Black Very Wide', value: 'black-very-wide'},
                                                                {text: 'Black Black', value: 'black-black'},
                                                                {text: 'White', value: 'white'},
                                                                {text: 'White Wide', value: 'white-wide'},
                                                                {text: 'White Very WIde', value: 'white-very-wide'},
                                                                {text: 'White Black', value: 'white-black'}
							]
					},
                                        {
                                                type: 'textbox',
						name: 'end',
						label: 'End Time',
                                                value: '1',
                                                tooltip: 'Enter expire time in Hour. Default: 1 Hour.'
					},
                                        {
                                                type: 'textbox',
                                                name: 'bg',
                                                label: 'Background Color',
                                                value: '#fff',
                                                tooltip: 'Enter the color code with #'
                                                    
                                        },
                                        {
                                                type: 'textbox',
                                                name: 'padding',
                                                label: 'Padding',
                                                value: '5',
                                                tooltip: 'Enter only padding number, without px'
                                                    
                                        }],
					onsubmit: function( e ) {
						// Insert content when the window form is submitted
                                                var d = new Date();
                                                var d = d.getTime();
						var shortcode = '[wpc_countdown';
						shortcode += ' theme="' + e.data.theme + '"';
                                                shortcode += ' now="' + d + '"';
						shortcode += ' end="' + e.data.end + '"';
                                                shortcode += ' bg="' + e.data.bg + '"';
                                                shortcode += ' padding="' + e.data.padding + '"';
						shortcode += ']';
						editor.insertContent( shortcode );
					}
				} );
			}
		} );
	} );
} )();