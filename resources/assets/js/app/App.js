/**
 * LejApp application
 */
Ext.application({
    name: 'LejApp',

    isNProgressControl: false,
    preloaderId: 'app_preloader',

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
    },

    NProgressControl: function()
    {
        if (this.isNProgressControl)
            return;

        this.isNProgressControl = true;
        if (typeof NProgress !== "object" || NProgress.status === null)
            return;

        let loadCnt = Ajax.loadingCnt();
        let interval = Lej.setIntervalUp(function()
        {
            let newLoadCnt = Ajax.loadingCnt();
            if (NProgress.status === null || ! newLoadCnt)
            {
                if (NProgress.status !== null)
                    NProgress.done();
                clearInterval(interval);
            }
            else
            {
                let status = (1 - NProgress.status) / newLoadCnt;
                let loadedCnt = loadCnt - newLoadCnt;
                if (! loadedCnt)
                    return;
                loadCnt = newLoadCnt;
                if (loadedCnt > 0)
                    NProgress.set((NProgress.status + status) * loadedCnt);
            }
        }, 500, 60000, function()
        {
            if (NProgress.status !== null)
                NProgress.done();
            clearInterval(interval);
        });
    },

    destroyPreloader: function()
    {
        let preloader = Ext.get(this.preloaderId);
        preloader.destroy();
    }
});