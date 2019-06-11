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
     *
     * @return {number}
     */
    setIntervalCount: function(callback, timeout, count)
    {
        if (typeof count !== "number")
            count = 1;
        let cnt = 0;
        const interval = setInterval(function() {
            cnt++;
            callback();
            if (cnt >= count)
                clearInterval(interval);
        }, timeout);

        return interval;
    },

    /**
     * setInterval() by kill time
     *
     * @param {function} callback
     * @param {number}   timeout
     * @param {number}   timeup   - time to destroy setInterval()
     *
     * @return {number}
     */
    setIntervalUp: function(callback, timeout, timeup)
    {
        const interval = setInterval(callback, timeout);
        setTimeout(function(){clearInterval(interval);}, timeup);

        return interval;
    }
});
