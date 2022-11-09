import {THeader} from "./thead";
class ContactPage extends THeader{
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
        const urlResponse = '/admin/contact';
        super(`${functionId}`, getParam, urlResponse);
        this.showRow();
        this.searchItem();
        this.selectStatus();
        this.reLoad(urlResponse);
        this.findSortData();
        this.changeStatus();
        this.delete();
    }

}
new ContactPage('contact-page')
