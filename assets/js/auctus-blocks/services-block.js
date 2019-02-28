var auctusServicesEl = wp.element.createElement,
registerAuctusServicesBlock = wp.blocks.registerBlockType;

registerAuctusServicesBlock( 'auctus/services-block', {
    title: 'Auctus Services',

    icon: 'universal-access-alt',

    category: 'layout',

    edit: function() {
        return auctusServicesEl( 'span', {}, '[auctus_services]' );
    },

    save: function() {
        return auctusServicesEl( 'span', {}, '[auctus_services]' );
    },
} );
