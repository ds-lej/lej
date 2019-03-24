/**
 * All configuration for application
 */
Ext.define('Lej.Cfg', {
    alternateClassName: 'Cfg',
    singleton: true,

    config: {
        url: '/',
        urlApi: '/api',

        trayClockTimeFormat: 'G:i D',
    },

    applyUrl:    function(url) {},
    applyUrlApi: function(url) {},

    getUrl:    function (url) { return this.mergeUrl(this.config.url, url);    },
    getUrlApi: function (url) { return this.mergeUrl(this.config.urlApi, url); },

    url:    function(url) { return this.getUrl(url);    },
    urlApi: function(url) { return this.getUrlApi(url); },
    getApi: function(url) { return this.getUrlApi(url); },
    api:    function(url) { return this.getUrlApi(url); },

    getCookie: function (name) { return Ext.util.Cookies.get(name); },

    dump: function (...data) { console.log(...data); },
    log:  function (...data) { this.dump(...data);   },

    mergeUrl: function(urlLeft, urlRight)
    {
        return urlRight ? (urlLeft.replace(/\/+$/, '') +'/'+ urlRight.replace(/^\/+/, '')) : urlLeft;
    },
});
