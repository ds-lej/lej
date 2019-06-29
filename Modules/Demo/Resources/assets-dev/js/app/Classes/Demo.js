/**
 * Demo
 */
Ext.define('Demo.Classes.Demo', {
    extend: 'Ext.container.Viewport',

    layout: 'fit',

    constructor: function()
    {
        this.createView();
        this.callParent();
    },

    createView: function()
    {
        this.items = [{
            xtype: 'panel',
            requires: [
                'Ext.layout.container.Border'
            ],
            layout: 'border',
            width: '100%',
            height: 400,

            bodyBorder: false,

            defaults: {
                collapsible: true,
                split: true,
                bodyPadding: 10
            },
            items: [{
                title: 'Footer',
                region: 'south',
                height: 100,
                minHeight: 75,
                maxHeight: 150,
                html: '<p>Footer content</p>'
            },{
                title: 'Navigation',
                region:'west',
                floatable: false,
                margin: '5 0 0 0',
                width: 125,
                minWidth: 100,
                maxWidth: 250,

                defaults: {
                    xtype: 'button',
                    margin: '1 0 3 1'
                },

                items: [{
                    text: 'Laravel',
                    href: 'https://laravel.com/'
                },{
                    text: 'ExtJS',
                    href: 'https://www.sencha.com/products/extjs/'
                },
                    this.authBtn()
                ]
            },{
                title: 'Main Content',
                collapsible: false,
                region: 'center',
                margin: '5 0 0 0',
                layout: 'center',
                items: [{
                    style: 'text-align: center;',
                    minHeight: 160,
                    html: '<h1 style="font-size: 84px;">L E J</h1><div style="font-size: 34px; font-style: italic;">Laravel & ExtJS</div>'
                }]
            }]
        }];
    },

    authBtn: function()
    {
        const _btn = {
            iconCls: 'fa fa-sign-out',
            text: 'Logout',
            iconAlign: 'right',
            handler: function()
            {
                AjaxPost.request({
                    url: Cfg.url('logout')
                });
            }
        };

        return _btn;
    }
});