/**
 * Ajax
 *
 * @extends Ext.data.Connection
 * @mixin Lej.Mixins.Ajax
 */
Ext.define('Lej.Ajax', {
    extend: 'Ext.data.Connection',
    mixins: {
        ajax: 'Lej.Mixins.Ajax',
    },
    singleton: true,
    alternateClassName: 'Ajax',
});
