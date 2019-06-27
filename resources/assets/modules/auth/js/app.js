require('./app/Login');

/**
 * Demonstrates a simple login form.
 */
Ext.on('LejAppInit', function(app) {
    app.endPagePreloader(
        Ext.create({ xtype: 'xLogin' })
    );
});