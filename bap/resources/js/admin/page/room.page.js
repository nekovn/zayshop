import {THeader} from "./thead";

class RoomPage extends THeader {
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
        const urlResponse = '/admin/room';
        const pathImage = '/assets/images/room/';
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
new RoomPage('room-page')
