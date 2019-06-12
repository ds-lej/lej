/**
 * Ajax
 */
Ext.define('Lej.Ajax', {
    extend: 'Ext.data.Connection',
    singleton: true,
    alternateClassName: 'Ajax',

    method: 'POST',
    url: Cfg.urlExt(),

    requestList: {},

    loadingCnt: function()
    {
        let cnt = 0;
        for (let req in this.requestList)
        {
            if (this.isLoading(this.requestList[req]))
                cnt++;
            else
                delete(this.requestList[req]);
        }
        return cnt;
    }
});
