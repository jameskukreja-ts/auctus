var auctusHistoryEl = wp.element.createElement,
registerAuctusHistoryBlock = wp.blocks.registerBlockType;

registerAuctusHistoryBlock( 'auctus/history-block', {
    title: 'Auctus History',

    icon: 'universal-access-alt',

    category: 'layout',

    edit: function() {
        return auctusHistoryEl( 'span', {}, '[auctus_history]' );
    },

    save: function() {
        return auctusHistoryEl( 'span', {}, '[auctus_history]' );
    },
} );
