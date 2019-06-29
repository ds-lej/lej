/**
 * Initialize App
 */
Ext.on('LejAppInit', function(app) {
    app.endPagePreloader(
        Ext.create('Demo.Classes.Demo')
    );
});