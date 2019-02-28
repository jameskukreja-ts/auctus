var auctusTeamEl = wp.element.createElement,
registerAuctusTeamBlock = wp.blocks.registerBlockType;

registerAuctusTeamBlock( 'auctus/team-block', {
    title: 'Auctus Team',

    icon: 'universal-access-alt',

    category: 'layout',

    edit: function() {
        return auctusTeamEl( 'span', {}, '[auctus_team]' );
    },

    save: function() {
        return auctusTeamEl( 'span', {}, '[auctus_team]' );
    },
} );
