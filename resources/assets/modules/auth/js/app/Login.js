/**
 * Login view
 *
 * @class Auth.Login
 * @extends Ext.container.Viewport
 */
Ext.define('Auth.Login', {
    extend: 'Ext.container.Viewport',
    xtype: 'xLogin',

    urlLogin:  Cfg.url('login'),
    urlLogout: Cfg.url('logout'),

    cls: 'lej-login-body',
    layout: {
        type: 'vbox',
        align: 'center',
        pack: 'center',
    },
    formLogin: null,
    loadMask: null,
    errorTip: null,

    constructor: function()
    {
        const me = this;

        if (window.location.pathname === '/')
        {
            var mainPanel = new Ext.panel.Panel({
                renderTo: document.body,
                height: 100,
                width: 200,
                title: 'Foo',
                items: [{
                    xtype: 'button',
                    margin: 10,
                    iconCls: 'fa-sign-out',
                    text: 'Logout',
                    scale: 'medium',
                    iconAlign: 'right',
                    handler: function()
                    {
                        AjaxPost.request({
                            url: me.urlLogout
                        });
                    }
                }]
            });
        }
        else
        {
            this.createFormLogin();
            this.items = [this.formLogin];
            this.callParent();
        }
    },

    createFormLogin: function()
    {
        this.formLogin = Ext.create({
            xtype: 'form',
            reference: 'form',

            title: 'Login',
            width: 320,
            frame: true,
            bodyPadding: 10,
            bodyCls: 'lej-login-form-body',
            cls: 'lej-shadow-1',

            layout: 'anchor',
            defaults: {
                anchor: '100%',
                labelWidth: 110
            },
            defaultType: 'textfield',

            items: [{
                allowBlank: false,
                fieldLabel: 'Login',
                name: 'login',
                emptyText: 'login'
            }, {
                allowBlank: false,
                fieldLabel: 'Password',
                name: 'password',
                emptyText: 'password',
                inputType: 'password'
            }, {
                xtype:'checkbox',
                fieldLabel: 'Remember me',
                name: 'remember'
            }],

            buttons: [{
                text: 'Login',
                formBind: true,
                scope: this,
                handler: function()
                {
                    this.createLoadMask();
                    this.createErrorTip();
                    this.submitFormLogin();
                }
            }]
        });
    },

    createLoadMask: function()
    {
        if (this.loadMask)
            return;

        this.loadMask = Ext.create({
            xtype: 'loadmask',
            msg: 'Please wait...',
            target: this.formLogin
        });
    },

    createErrorTip: function()
    {
        if (this.errorTip)
            return;

        this.errorTip = Ext.create({
            xtype: 'tooltip',
            target: this.formLogin,
            title: 'Failed:',
            width: this.formLogin.width,
            autoHide: false,
            anchor: 'bottom',
            mouseOffset: [-11, -2],
            closable: true,
            constrainPosition: false,
            cls: 'errors-tip'
        });

        this.errorTip.clearListeners();
    },

    submitFormLogin: function()
    {
        const me = this;

        this.formLogin.getForm().submit({
            url: me.urlLogin,

            success: function()
            {
                Ext.toast({
                    html: 'Successful entry. Redirects ...',
                    align: 't'
                });
            },

            failure: function(form, action)
            {
                me.loadMask.hide();
                if (action.result)
                {
                    me.errorTip.update(action.result.message);
                    me.errorTip.show();
                }
            }
        });

        me.loadMask.show();
    }
});