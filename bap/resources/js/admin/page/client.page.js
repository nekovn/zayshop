import {THeader} from "./thead";

class ClientPage extends THeader {
    /**
     * 画面処理ID
     */
    #functionId;

    /**
     *
     * @param functionId
     */
    constructor(functionId) {
        const currentUrl = new URL(window.location.href);
        const getParam = currentUrl.searchParams.get('per_page');
        const urlResponse = '/admin/client';
        const pathImage = '/assets/images/client/';
        super(`${functionId}`, getParam, urlResponse, pathImage);
        this.showRow();
        this.searchItem();
        this.selectStatus();
        this.reLoad(urlResponse);
        this.findSortData();
        this.changeStatus();
        this.delete();
        this.create();
    }
}
new ClientPage('client-page')
