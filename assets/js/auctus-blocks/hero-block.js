var auctusHeroEl = wp.element.createElement,
registerAuctusHeroBlock = wp.blocks.registerBlockType;

registerAuctusHeroBlock( 'auctus/hero-block', {
    title: 'Auctus Hero',

    icon: 'universal-access-alt',

    category: 'layout',

    edit: function() {
        return auctusHeroEl( 'span', {}, '[auctus_hero]' );
    },

    save: function() {
        return auctusHeroEl( 'span', {}, '[auctus_hero]' );
    },
} );
