( function( editor, components, i18n, element ) {

	var el = element.createElement;
	var registerBlockType = wp.blocks.registerBlockType;
	var InspectorControls = wp.editor.InspectorControls;
    var TextControl = wp.components.TextControl;
    var TextareaControl = wp.components.TextareaControl;

    // console.log(TextControl);
    var withState = wp.compose.withState;

 	var MediaUpload = wp.editor.MediaUpload;

	registerBlockType( 'auctus/services-block', {
		title: 'Auctus Services',
		description: 'Image block.',
		icon: 'video-alt3',
		category: 'layout',
		
		attributes: {
			pageText: {
                type: 'string',
                source: 'attribute',
                selector: 'span',
                attribute: 'pagetext'
            },
            buttonText: {
                type: 'string',
                source: 'attribute',
                selector: 'span',
                attribute: 'buttontext'
            }
		},


		edit: withState({status: ''}) (function( props ) {
		    
		    var attributes = props.attributes;

			var ServiceText = function( text ) {
                return props.setAttributes({
                    pageText: text
                });
            };

            var ServiceButtonText = function( text ) {
                return props.setAttributes({
                    buttonText: text
                });
            };

            console.log('in Edit');
            console.log(attributes);
            // var bgUrl = typeof(attributes.bgImg) == "undefined" || !attributes.bgImg ? "Hello" : attributes.bgImg; 
            var pageText = typeof(attributes.pageText) == "undefined" || attributes.pageText === null ? "" : attributes.pageText; 
            var buttonText = typeof(attributes.buttonText) == "undefined" || attributes.buttonText === null ? "" : attributes.buttonText; 

			return [
                el( 'span', {}, '[auctus_services buttonText="'+buttonText+'" pageText="'+pageText+'"]',
    				el( InspectorControls, { key: 'inspector' },
    					
                        el( components.PanelBody, {
                                title: 'Page Text',
                                initialOpen: true,
                            },
                            el( TextareaControl, {
                                onChange: ServiceText,
                                value: pageText
                            })
                        ),
                        el( components.PanelBody, {
                                title: 'Button Text',
                                initialOpen: true,
                            },
                            el( TextControl, {
                                onChange: ServiceButtonText,
                                value: buttonText
                            })
                        ),
    
    				)
                )
			];
		}),


		save: function( props ) {
            
            var attributes = props.attributes;
            var pageText = typeof(attributes.pageText) == "undefined" || attributes.pageText === null ? "" : attributes.pageText; 
            var buttonText = typeof(attributes.buttonText) == "undefined" || attributes.buttonText === null ? "" : attributes.buttonText; 
            console.log('in Save');
            console.log(attributes);
            return el( 'span', {pagetext:pageText, buttontext:buttonText}, '[auctus_services buttonText="'+buttonText+'" pageText="'+pageText+'"]' );

		},


	} );

} )(
	window.wp.editor,
	window.wp.components,
	window.wp.i18n,
	window.wp.element,
);