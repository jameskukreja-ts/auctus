( function( editor, components, i18n, element ) {

	var el = element.createElement;
	var registerBlockType = wp.blocks.registerBlockType;
	var InspectorControls = wp.editor.InspectorControls;
    var TextControl = wp.components.TextControl;
    // console.log(TextControl);
    var withState = wp.compose.withState;

 var MediaUpload = wp.editor.MediaUpload;

	registerBlockType( 'auctus/hero-block', {
		title: 'Auctus Hero',
		description: 'Image block.',
		icon: 'video-alt3',
		category: 'layout',
		
		attributes: {
			bgImg: {
				type: 'string',
				source: 'html',
                // default:'Test',
				selector: 'img',
				attribute: 'src',
			},
            buttonText: {
                type: 'string',
                source: 'html'
            }
		},


		edit: withState({status: ''}) (function( props ) {
		    
		    var attributes = props.attributes;
		    
		    var HeroBgImg = function( media ) {
				
                return props.setAttributes({
					bgImg: media.url
				});
			};

            var HeroButtonText = function( buttonProps ) {
                return props.setAttributes({
                    buttonText: buttonProps
                });
            };

            console.log('in Edit');
            console.log(attributes);
            // var bgUrl = typeof(attributes.bgImg) == "undefined" || !attributes.bgImg ? "Hello" : attributes.bgImg; 
            var bgUrl = typeof(attributes.bgImg) == "undefined" || attributes.bgImg === null ? "" : attributes.bgImg; 
            var buttonText = typeof(attributes.buttonText) == "undefined" || attributes.buttonText === null ? "" : attributes.buttonText; 

			return [
                el( 'span', {}, '[auctus_hero bgImg="'+bgUrl+'" buttonText="'+buttonText+'"]',
    				el( InspectorControls, { key: 'inspector' },
    					
                        el( components.PanelBody, {
                                title: 'Button Text',
                                initialOpen: true,
                            },
                            el( TextControl, {
                                onChange: HeroButtonText,
                                value: buttonText
                            })
                        ),
                        el( components.PanelBody, {
        						title: 'Background Image',
        						className: 'image-block',
        						initialOpen: true,
    					    },
    
    						el( MediaUpload, {
    							onSelect: HeroBgImg,
    							type: 'image',
    							render: function( obj ) {
    								return el( components.Button, {
    									    className: 'components-icon-button image-block-btn is-button is-default is-large',
    									    onClick: obj.open
    									},
    									el( 'span', {},
    									    'Select image'
    									)
                                        
    								);
    							}
    						}),
                            el('img', {src: attributes.bgImg, alt:'Hero Background Image'}),
                        )
    				)
                )
			];
		}),


		save: function( props ) {
            
            var attributes = props.attributes;
            var bgUrl = typeof(attributes.bgImg) == "undefined" || attributes.bgImg === null ? "" : attributes.bgImg; 
            var buttonText = typeof(attributes.buttonText) == "undefined" || attributes.buttonText === null ? "" : attributes.buttonText; 

            return el( 'span', {}, '[auctus_hero bgImg="'+bgUrl+'" buttonText="'+buttonText+'"]' );

		},


	} );

} )(
	window.wp.editor,
	window.wp.components,
	window.wp.i18n,
	window.wp.element,
);