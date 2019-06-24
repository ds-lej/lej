/**
 * Mixin - NProgress control
 */
Ext.define('Lej.Mixins.NProgressControl',
{
    isNProgressControl: false,

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
    }
});