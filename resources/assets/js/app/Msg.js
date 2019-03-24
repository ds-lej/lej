/**
 * Messages methods
 */
Ext.define('Lej.Msg', {
    alternateClassName: 'Msg',
    singleton: true,

    ajaxError: function(response)
    {
        var data = Ext.decode(response.responseText);

        Ext.Msg.show({
            title: 'Error! '+ response.status,
            message: (typeof data.message !== "undefined") ? data.message : response.statusText,
            icon: Ext.Msg.ERROR
        });
    }
});
