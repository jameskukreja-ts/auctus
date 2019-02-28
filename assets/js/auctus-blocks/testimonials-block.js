var auctusTestimonialsEl = wp.element.createElement,
registerAuctusTestimonialsBlock = wp.blocks.registerBlockType;

registerAuctusTestimonialsBlock( 'auctus/testimonials-block', {
    title: 'Auctus Testimonials',

    icon: 'universal-access-alt',

    category: 'layout',

    edit: function() {
        return auctusTestimonialsEl( 'span', {}, '[auctus_testimonials]' );
    },

    save: function() {
        return auctusTestimonialsEl( 'span', {}, '[auctus_testimonials]' );
    },
} );
