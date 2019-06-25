/**
 * Lej - main helper class
 */
Ext.define('Lej', {
    singleton: true,

    /**
     * setInterval() by the count the iterations
     *
     * @param {function} callback
     * @param {number}   timeout
     * @param {number}   count    - iterations count
     * @param {function} destructCallback
     * @param args
     *
     * @return {number}
     */
    setIntervalCount: function(callback, timeout, count, destructCallback=null, ...args)
    {
        if (typeof count !== "number")
            count = 1;
        let cnt = 0;
        const interval = setInterval(function()
        {
            cnt++;
            callback(...args);
            if (cnt >= count)
            {
                clearInterval(interval);
                if (typeof destructCallback === "function")
                    destructCallback(...args);
            }
        }, timeout, ...args);

        return interval;
    },

    /**
     * setInterval() by kill time
     *
     * @param {function} callback
     * @param {number}   timeout
     * @param {number}   timeup   - time to destroy setInterval()
     * @param {function} destructCallback
     * @param args
     *
     * @return {number}
     */
    setIntervalUp: function(callback, timeout, timeup, destructCallback=null, ...args)
    {
        let t = Date.now() + ((typeof timeup !== "number") ? 0 : timeup);

        const interval = setInterval(function()
        {
            if (Date.now() >= t)
            {
                clearInterval(interval);
                if (typeof destructCallback === "function")
                    destructCallback(...args);
            }
            else
                callback(...args);
        }, timeout, ...args);

        return interval;
    },

    redirect: function(to)
    {
        if (window.location.pathname === to)
            return false;
        window.location.href = to;
        if (typeof NProgress === "object" && ! NProgress.isStarted())
            NProgress.start();
        return true;
    },

    decode: function(data)
    {
        try {
            return Ext.decode(data);
        }
        catch (e) {
            Cfg.log('Not type JSON! TypeOf='+(typeof data));
            return {};
        }
    }
});
