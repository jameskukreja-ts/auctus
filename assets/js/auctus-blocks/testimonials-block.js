( function( editor, components, i18n, element ) {

	var el = element.createElement;
	var registerBlockType = wp.blocks.registerBlockType;
	var InspectorControls = wp.editor.InspectorControls;
    var TextControl = wp.components.TextControl;
    var TextareaControl = wp.components.TextareaControl;

    // console.log(TextControl);
    var withState = wp.compose.withState;

 	var MediaUpload = wp.editor.MediaUpload;

	registerBlockType( 'auctus/testimonials-block', {
		title: 'Auctus Testimonials',
		description: 'Image block.',
		icon: 'video-alt3',
		category: 'layout',
		
		attributes: {
			text: {
                type: 'string',
                source: 'html'
            },
            buttonText: {
                type: 'string',
                source: 'html'
            }
		},


		edit: withState({status: ''}) (function( props ) {
		    
		    var attributes = props.attributes;

			var TestimonialText = function( text ) {
                return props.setAttributes({
                    pageText: text
                });
            };

            var TestimonialButtonText = function( text ) {
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
                el( 'span', {}, '[auctus_testimonials buttonText="'+buttonText+'" pageText="'+pageText+'"]',
    				el( InspectorControls, { key: 'inspector' },
    					
                        el( components.PanelBody, {
                                title: 'Page Text',
                                initialOpen: true,
                            },
                            el( TextareaControl, {
                                onChange: TestimonialText,
                                value: pageText
                            })
                        ),
                        el( components.PanelBody, {
                                title: 'Button Text',
                                initialOpen: true,
                            },
                            el( TextControl, {
                                onChange: TestimonialButtonText,
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

            return el( 'span', {}, '[auctus_testimonials buttonText="'+buttonText+'" pageText="'+pageText+'"]' );

		},


	} );

} )(
	window.wp.editor,
	window.wp.components,
	window.wp.i18n,
	window.wp.element,
);
