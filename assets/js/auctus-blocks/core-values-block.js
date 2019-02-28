var auctusCoreValuesEl = wp.element.createElement,
registerAuctusCoreValuesBlock = wp.blocks.registerBlockType;

registerAuctusCoreValuesBlock( 'auctus/core-values-block', {
    title: 'Auctus Core Values',

    icon: 'universal-access-alt',

    category: 'layout',

    edit: function() {
        return auctusCoreValuesEl( 'span', {}, '[auctus_core_values]' );
    },

    save: function() {
        return auctusCoreValuesEl( 'span', {}, '[auctus_core_values]' );
    },
} );