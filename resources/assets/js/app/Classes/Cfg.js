/**
 * All configuration for application
 */
Ext.define('Lej.Cfg', {
    alternateClassName: 'Cfg',
    singleton: true,

    config: {
        url: '/',
        urlApi: '/api',
        urlExt: '/ext',

        trayClockTimeFormat: 'G:i D',

        xsrfCookieName: 'XSRF-TOKEN',
        xsrfHeaderName: 'X-XSRF-TOKEN',
        ajaxExtName: 'EXT-AJAX',
    },

    constructor: function(config) { this.initConfig(config); },

    applyUrl:    function(url) {},
    applyUrlApi: function(url) {},
    applyUrlExt: function(url) {},

    getUrl:    function (url) { return this.mergeUrl(this.config.url, url);    },
    getUrlApi: function (url) { return this.mergeUrl(this.config.urlApi, url); },
    getUrlExt: function (url) { return this.mergeUrl(this.config.urlExt, url); },

    url:    function(url) { return this.getUrl(url);    },
    urlApi: function(url) { return this.getUrlApi(url); },
    urlExt: function(url) { return this.getUrlExt(url); },

    getCookie: function (name) { return Ext.util.Cookies.get(name); },

    dump: function (...data) { console.log(...data); },
    log:  function (...data) { this.dump(...data);   },

    mergeUrl: function(urlLeft, urlRight)
    {
        return urlRight ? (urlLeft.replace(/\/+$/, '') +'/'+ urlRight.replace(/^\/+/, '')) : urlLeft;
    },

    ajaxHeaders: function(headers)
    {
        let hD = {};
        hD[this.getXsrfHeaderName()] = this.getCookie(this.getXsrfCookieName());
        hD[this.getAjaxExtName()] = true;
        return (Ext.isObject(headers) ? Ext.Object.merge(headers, hD) : hD);
    }
});
