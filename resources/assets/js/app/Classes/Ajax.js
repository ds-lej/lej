/**
 * Ajax
 */
Ext.define('Lej.Ajax', {
    extend: 'Ext.data.Connection',
    mixins: {
        ajax: 'Lej.Mixins.Ajax',
    },
    singleton: true,
    alternateClassName: 'Ajax',
});
