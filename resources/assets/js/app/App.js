/**
 * LejApp application
 */
Ext.application({
    name: 'LejApp',

    mixins: {
        NProgressControl: 'Lej.Mixins.NProgressControl',
        PagePreloader: 'Lej.Mixins.PagePreloader',
    },

    init: function()
    {
        /**
         * Initial application
         *
         * Event example:
         * ----------------
         *  Ext.on('LejAppInit', function(app) {
         *      // init your extensions
         *  });
         */
        Ext.GlobalEvents.fireEvent('LejAppInit', this);
    },

    launch: function()
    {
        /**
         * Launch application
         *
         * Event example:
         * ----------------
         *  Ext.on('LejAppLaunch', function(app) {
         *      // init your extensions
         *  });
         */
        Ext.GlobalEvents.fireEvent('LejAppLaunch', this);

        this.NProgressControl();
    }
});