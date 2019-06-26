/**
 * Ext.data.Connection override
 */
Ext.override(Ext.data.Connection, {

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
        const me = this;
        const request = this.callParent(args);

        request.then(
            function(res){me.requestComplete(res);},
            function(res){me.requestComplete(res);}
        );
        Ajax.requestList[request.id] = request;

        return request;
    },

    requestComplete: function(response)
    {
        this.isRedirect(response);
        this.deleteActiveRequest(response.requestId);
    },

    deleteActiveRequest: function(requestId)
    {
        delete(Ajax.requestList[requestId]);
    },

    isRedirect: function(response)
    {
        const redirect = response.getResponseHeader('RedirectTo');
        return redirect ? Lej.redirect(redirect) : false;
    }
});
