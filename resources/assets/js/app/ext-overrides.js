/**
 * Ext.data.Connection override
 */
Ext.override(Ext.data.Connection, {
    listeners: {
        requestcomplete:  function(conn, res) { delete(Ajax.requestList[res.requestId]); },
        requestexception: function(conn, res) { delete(Ajax.requestList[res.requestId]); },
    },

    setOptions: function(opts, scope)
    {
        /**
         * Globally set headers for ajax requests
         *
         * Event example:
         * ----------------
         *  Ext.on('setAjaxDefaultHeaders', function(opts) {
         *      // delete options
         *      delete(opts['EXT-AJAX']);
         *
         *      // add options
         *      opts.yourAddHeader = 'header value'
         *  });
         */
        let newOpts = Cfg.ajaxHeaders();
        if (typeof opts.defaultHeaders === "object")
            newOpts = Ext.Object.merge(opts.defaultHeaders, newOpts);

        Ext.GlobalEvents.fireEvent('setAjaxDefaultHeaders', newOpts);
        opts.defaultHeaders = newOpts;

        return this.callParent(arguments);
    },

    request: function(...args)
    {
        const request = this.callParent(args);
        Ajax.requestList[request.id] = request;

        return request;
    }
});
