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
			buttonText: {
                type: 'string',
                source: 'attribute',
                selector: 'span',
                attribute: 'buttontext',

            },
            bgImg: {
				type: 'string',
                source: 'attribute',
                selector: 'span',
                attribute: 'bgimg',
			}
            
		},


		edit: withState({status: ''}) (function( props ) {
		    
		    var attributes = props.attributes;
            console.log('props');
            console.log(props);
		    
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
            // var bgImg = typeof(attributes.bgImg) == "undefined" || !attributes.bgImg ? "Hello" : attributes.bgImg; 
            var bgImg = typeof(attributes.bgImg) == "undefined" || attributes.bgImg === null ? "" : attributes.bgImg; 
            var buttonText = typeof(attributes.buttonText) == "undefined" || attributes.buttonText === null ? "" : attributes.buttonText; 

			return [
                el( 'span', {}, '[auctus_hero bgImg="'+bgImg+'" buttonText="'+buttonText+'"]',
                // el( 'span', {}, '[auctus_hero]',

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

            var bgImg = typeof(attributes.bgImg) == "undefined" || attributes.bgImg === null ? "" : attributes.bgImg; 
            var buttonText = typeof(attributes.buttonText) == "undefined" || attributes.buttonText === null ? "" : attributes.buttonText; 
            
            
            return el( 'span', {bgimg: bgImg, buttontext : buttonText}, '[auctus_hero bgImg="'+bgImg+'" buttonText="'+buttonText+'"]' );
            // return el( 'span', {
            //     class:bgImg,
            //     id:buttonText
            // }, '[auctus_hero]');

		},


	} );

} )(
	window.wp.editor,
	window.wp.components,
	window.wp.i18n,
	window.wp.element,
);