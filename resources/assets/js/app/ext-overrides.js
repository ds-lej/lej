/**
 * Globally set headers for ajax requests
 *
 * Event example:
 *      Ext.on('setAjaxDefaultHeaders', function(opts) {
 *          // delete options
 *          delete(opts['EXT-AJAX']);
 *
 *          // add options
 *          opts.yourAddHeader = 'header value'
 *      });
 */
Ext.override(Ext.data.Connection, {
    setOptions: function(opts, scope)
    {
        let newOpts = Cfg.ajaxHeaders();
        if (typeof opts.defaultHeaders === "object")
            newOpts = Ext.Object.merge(opts.defaultHeaders, newOpts);

        Ext.GlobalEvents.fireEvent('setAjaxDefaultHeaders', newOpts);
        opts.defaultHeaders = newOpts;

        return this.callParent(arguments);
    }
});
