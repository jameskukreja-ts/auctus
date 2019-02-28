var auctusNavEl = wp.element.createElement,
registerAuctusNavBlock = wp.blocks.registerBlockType;

registerAuctusNavBlock( 'auctus/nav-block', {
    title: 'Auctus Nav',

    icon: 'universal-access-alt',

    category: 'layout',

    edit: function() {
        return auctusNavEl( 'span', {}, '[auctus_nav]' );
    },

    save: function() {
        return auctusNavEl( 'span', {}, '[auctus_nav]' );
    },
} );
