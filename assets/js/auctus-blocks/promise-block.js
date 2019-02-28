var auctusPromiseEl = wp.element.createElement,
registerAuctusPromiseBlock = wp.blocks.registerBlockType;

registerAuctusPromiseBlock( 'auctus/promise-block', {
    title: 'Auctus Promise',

    icon: 'universal-access-alt',

    category: 'layout',

    edit: function() {
        return auctusPromiseEl( 'span', {}, '[auctus_promise]' );
    },

    save: function() {
        return auctusPromiseEl( 'span', {}, '[auctus_promise]' );
    },
} );
