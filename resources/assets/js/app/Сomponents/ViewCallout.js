/**
 * Component ViewCallout
 *
 * @extends Ext.container.Container
 */
Ext.define('Ext.Components.ViewCallout', {
    extend: 'Ext.container.Container',
    xtype: 'xCmp.ViewCallout',

    config: {
        calloutTypes: {
            error: {
                borderLeft: '3px solid #c30',
                background: '#f5dad8',
            }
        }
    },

    style: {
        borderRadius: '2px'
    },
    margin: '0 0 10 0',
    padding: '6 8',
    hidden: true,

    calloutType: 'error',
    html: '',

    constructor: function(config)
    {
        this.initConfig(config);
        this.callParent();

        this.setType(this.calloutType);
    },

    updateAndShow: function(html)
    {
        this.update(html);
        this.show();
    },

    setType: function(calloutType)
    {
        const styles = this.calloutTypes[calloutType];

        if (! styles)
            return;
        for (const style in styles)
            this.setStyle(style, styles[style]);

        return this;
    }
});