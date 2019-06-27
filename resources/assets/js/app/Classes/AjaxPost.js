/**
 * AjaxPost
 *
 * @extends Ext.data.Connection
 * @mixin Lej.Mixins.Ajax
 */
Ext.define('Lej.AjaxPost', {
    extend: 'Ext.data.Connection',
    mixins: {
        ajax: 'Lej.Mixins.Ajax',
    },
    singleton: true,
    alternateClassName: 'AjaxPost',
    method: 'POST',
});
