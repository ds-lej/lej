/**
 * Page preloader control
 */
Ext.define('Lej.Mixins.PagePreloader',
{
    pagePreloaderId: 'app_preloader',

    getPagePreloader:     function() { return Ext.get(this.pagePreloaderId); },
    destroyPagePreloader: function() { this.getPagePreloader().destroy();    },

    endPagePreloader: function(showElement = null, duration = 800)
    {
        if (typeof duration !== "number")
            duration = 800;
        duration = parseInt(duration/2);

        this.getPagePreloader().fadeOut({
            opacity: 0,
            easing: 'easeOut',
            duration: duration,
            remove: true,
            useDisplay: true
        });

        if (showElement)
        {
            try {
                const fadeInEl = showElement.getEl();
                fadeInEl.hide();
                setTimeout(function()
                {
                    fadeInEl
                        .fadeOut({ duration: 0, })
                        .fadeIn({ duration: duration });
                }, duration);
            }
            catch (e) { Cfg.dump(e); }
        }
    }
});