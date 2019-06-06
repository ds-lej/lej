/**
 * LejApp application
 *
 * Events:
 *  Ext.on('LejAppInit', function() {
 *      // init your extensions
 *  });
 */
Ext.application({
    name: 'LejApp',
    init: function() { Ext.GlobalEvents.fireEvent('LejAppInit'); }
});