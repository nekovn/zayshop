import {THeader} from "./thead";

class LogPage extends THeader{
    /**
     * 画面処理
     */
    #functionId;

    #urlResponse;
    /**
     *
     * @param functionId
     */
    constructor(functionId) {
        const currentUrl = new URL(window.location.href);
        const getParam = currentUrl.searchParams.get('per_page');
        const urlResponse = '/admin/log';
        super(`${functionId}`, getParam, urlResponse);
        this.showRow();
        this.searchItem();
        this.reLoad(urlResponse);
        this.findSortData();
        this.delete(false);
    }
}
new LogPage('log-page')
