/**
 * Ajax
 */
Ext.define('Lej.Ajax', {
    extend: 'Ext.data.Connection',
    singleton: true,
    alternateClassName: 'Ajax',

    method: 'POST',
    url: Cfg.api(),
    // defaultHeaders: Cfg.ajaxHeaders(),
});