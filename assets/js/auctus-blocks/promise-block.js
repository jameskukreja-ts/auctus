( function( editor, components, i18n, element ) {

	var el = element.createElement;
	var registerBlockType = wp.blocks.registerBlockType;
	var InspectorControls = wp.editor.InspectorControls;
    var TextareaControl = wp.components.TextareaControl;
    // console.log(TextareaControl);
    var withState = wp.compose.withState;

 var MediaUpload = wp.editor.MediaUpload;

	registerBlockType( 'auctus/promise-block', {
		title: 'Auctus Promise',
		description: 'Image block.',
		icon: 'video-alt3',
		category: 'layout',
		
		attributes: {
			img: {
				type: 'string',
				source: 'html',
                // default:'Test',
				selector: 'img',
				attribute: 'src',
			},
			signatureImg: {
				type: 'string',
				source: 'html',
                // default:'Test',
				selector: 'img',
				attribute: 'src',
			},
            boldText: {
                type: 'string',
                source: 'html'
            },
            plainText: {
                type: 'string',
                source: 'html'
            }

		},


		edit: withState({status: ''}) (function( props ) {
		    
		    var attributes = props.attributes;
		    
		    var PromiseImg = function( media ) {
				
                return props.setAttributes({
					img: media.url
				});
			};

			var PromiseSignatureImg = function( media ) {
				
                return props.setAttributes({
					signatureImg: media.url
				});
			};


            var PromiseBoldText = function( text ) {
                return props.setAttributes({
                    boldText: text
                });
            };

            var PromisePlainText = function( text ) {
                return props.setAttributes({
                    plainText: text
                });
            };

            // var bgUrl = typeof(attributes.bgImg) == "undefined" || !attributes.bgImg ? "Hello" : attributes.bgImg; 
            var img = typeof(attributes.img) == "undefined" || attributes.img === null ? "" : attributes.img; 
            var signatureImg = typeof(attributes.signatureImg) == "undefined" || attributes.signatureImg === null ? "" : attributes.signatureImg; 
            var boldText = typeof(attributes.boldText) == "undefined" || attributes.boldText === null ? "" : attributes.boldText; 
            var plainText = typeof(attributes.plainText) == "undefined" || attributes.plainText === null ? "" : attributes.plainText; 

			return [
                el( 'span', {}, '[auctus_promise img="'+img+'" boldText="'+boldText+'" signatureImg="'+signatureImg+'" plainText="'+plainText+'"]',
    				el( InspectorControls, { key: 'inspector' },
    					
                        el( components.PanelBody, {
                                title: 'Bold Text',
                                initialOpen: true,
                            },
                            el( TextareaControl, {
                                onChange: PromiseBoldText,
                                value: boldText
                            })
                        ),
                        el( components.PanelBody, {
                                title: 'Plain Text',
                                initialOpen: true,
                            },
                            el( TextareaControl, {
                                onChange: PromisePlainText,
                                value: plainText
                            })
                        ),
                        el( components.PanelBody, {
        						title: 'Promise Image',
        						className: 'image-block',
        						initialOpen: true,
    					    },
    
    						el( MediaUpload, {
    							onSelect: PromiseImg,
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
                            el('img', {src: attributes.img, alt:'Promise Image'}),
                        ),

                        el( components.PanelBody, {
        						title: 'Signature Image',
        						className: 'image-block',
        						initialOpen: true,
    					    },
    
    						el( MediaUpload, {
    							onSelect: PromiseSignatureImg,
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
                            el('img', {src: attributes.signatureImg, alt:'Signature Image'}),
                        )
    				)
                )
			];
		}),


		save: function( props ) {
            
            var attributes = props.attributes;
            var img = typeof(attributes.img) == "undefined" || attributes.img === null ? "" : attributes.img; 
            var signatureImg = typeof(attributes.signatureImg) == "undefined" || attributes.signatureImg === null ? "" : attributes.signatureImg; 
            var boldText = typeof(attributes.boldText) == "undefined" || attributes.boldText === null ? "" : attributes.boldText; 
            var plainText = typeof(attributes.plainText) == "undefined" || attributes.plainText === null ? "" : attributes.plainText; 

            return el( 'span', {}, '[auctus_promise img="'+img+'" boldText="'+boldText+'" signatureImg="'+signatureImg+'" plainText="'+plainText+'"]' );

		},


	} );

} )(
	window.wp.editor,
	window.wp.components,
	window.wp.i18n,
	window.wp.element,
);