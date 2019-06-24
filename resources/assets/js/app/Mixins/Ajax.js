/**
 * Mixin - Ajax
 */
Ext.define('Lej.Mixins.Ajax', {

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
