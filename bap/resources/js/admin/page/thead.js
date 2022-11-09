import {XhrParam} from "../../services/xhr/xhr_param";
import {XHRCrudMethod} from "../../services/xhr/xhr_method";
import {TBody} from "./tbody";
import {OpenModal} from "../../services/modal/modal";
import {Toaster} from "../../services/toastr/notifications";

class THeader extends TBody {
    /**
     * 画面処理ID
     */
    #functionId;

    /**
     * タイムアウトを設定する
     * @type {number}
     */
    #timeout = 1000;

    /**
     * URLを設定する
     */
    #searchURL;

    /**
     * パラメータを取得
     */
    #getParam;

    #statusVal = false;

    #form;

    #getStatusURL;

    #changeStatusURL;

    #sortURL;

    #deleteURL;

    #createURL;

    #getStatus;

    #changeStatus;

    #table;

    #tbody;

    #tr;

    #selectAll;

    #search;

    #showRowId;

    #per_page;

    #pagination;

    #reload;

    #delete;

    #create;

    #sort;

    #timer;

    #dataResult;

    #pathImage;

    /**
     *
     * @param functionId
     * @param getParam
     * @param urlResponse
     * @param pathImage
     */
    constructor(functionId, getParam, urlResponse, pathImage = '') {
        const per_page = getParam ? `&per_page=${getParam}` : '';
        super(`${functionId}`, per_page, urlResponse, pathImage);
        this.#functionId = functionId;
        this.#pathImage = pathImage;
        this.#searchURL = `${urlResponse}/search`;
        this.#getStatusURL = `${urlResponse}/get-status`;
        this.#changeStatusURL = `${urlResponse}/change-status`;
        this.#deleteURL = `${urlResponse}/delete`;
        this.#sortURL = `${urlResponse}/sort`;
        this.#createURL = `${urlResponse}/open-create`;
        this.#getParam = getParam;

        this.#form = document.getElementById(`form-${this.#functionId}`);
        this.#getStatus = document.getElementById(`${this.#functionId}-get-status`);
        this.#changeStatus = document.getElementById(`${this.#functionId}-change-status`);
        this.#table = document.getElementById(`${this.#functionId}-table`);
        this.#tbody = this.#table?.getElementsByTagName('tbody')[0];
        this.#tr = this.#tbody?.getElementsByTagName('tr')[0];
        this.#dataResult = this.#tr?.getAttribute('data-result');
        this.#selectAll = document.getElementById("select-all");
        this.#search = document.getElementById(`${this.#functionId}-search`);
        this.#showRowId = document.getElementById(`${this.#functionId}-show-row`);
        this.#per_page = document.getElementById(`${this.#functionId}-per_page`);
        this.#pagination = document.getElementById(`${this.#functionId}-pagination`);
        this.#reload = document.getElementById(`${this.#functionId}-reload`);
        this.#delete = document.getElementById(`${this.#functionId}-delete`);
        this.#create = document.getElementById(`${this.#functionId}-create`);
        this.#sort = document.getElementById(`${this.#functionId}-sort`);
    }

    /**
     * 検索する
     */
    searchItem = () => {
        this.#search?.addEventListener('input', this.eventInputSearch);//Window chrome,edge,firefox
        this.#search?.addEventListener('propertychange', this.eventInputSearch);//IE8
        this.#search?.addEventListener('orientationchange', this.eventInputSearch);//Android IOS
    }

    /**
     * Searchのinputイベント
     * @param e
     */
    eventInputSearch = (e) => {
        //stop duplicate call event
        e.stopImmediatePropagation()
        if (this.#dataResult !== "empty") {
            const search = e.currentTarget.value;
            const status = this.#getStatus?.getAttribute('data-status');
            const sort = this.#sort.value;
            // const text = this.#sort.options[e.selectedIndex].text;
            const xhrParam = new XhrParam(this.#searchURL, {search, 'per_page': this.#getParam, status, sort})
            clearTimeout(this.#timer);
            this.#timer = setTimeout(() => {
                const successHandler = (res) => {
                    if (res.result && res.data.xhtml.length) {
                        this.showXhtml(res.data);
                        this.#selectAll.checked = false;
                        this.dropdownBtn();
                    }
                };
                XHRCrudMethod.store(xhrParam, successHandler);
            }, this.#timeout)
        }
    }

    /**
     * Rowセレクトを選択する時、row行によって、データを表示する
     */
    showRow = () => {
        this.#showRowId?.addEventListener('change', this.eventChangeShowRow);
        this.#showRowId?.addEventListener('orientationchange', this.eventChangeShowRow);//Android IOS
    }

    /**
     * showRowのchangeイベント
     * @param e
     */
    eventChangeShowRow = (e) => {
        e.stopImmediatePropagation();
        if (this.#dataResult !== "empty") {
            const currentValue = e.currentTarget.value;
            if (currentValue) {
                this.#per_page.setAttribute('value', currentValue)
                this.#form.submit();
            }
        }
    }

    /**
     * ステータスを選択する
     */
    selectStatus = () => {
        this.#getStatus?.addEventListener('click', (e) => {
            e.stopImmediatePropagation();
            if (this.#getStatusURL && this.#dataResult !== "empty") {
                const sort = this.#sort.value;
                const xhrParam = new XhrParam(this.#getStatusURL, {'status': this.#statusVal, sort})
                clearTimeout(this.#timer);
                this.#timer = setTimeout(() => {
                    const successHandler = (res) => {
                        if (res.result && res.data.xhtml.length) {
                            this.#search.value = '';
                            this.#selectAll.checked = false;
                            this.showXhtml(res.data);
                            this.setBtnStatus(res.data.number, this.#statusVal);
                            this.#getStatus.setAttribute('data-status', this.#statusVal);
                            this.#statusVal = !this.#statusVal
                            this.dropdownBtn();
                        }
                    }
                    XHRCrudMethod.store(xhrParam, successHandler);
                }, this.#timeout)
            }
        })
    }

    /**
     * 背景ステータスを設定する
     * @param statusVal
     * @return {string}
     */
    setBgStatus = (statusVal) => {
        return statusVal ? 'bg-azure-lt' : 'bg-red-lt';
    }

    /**
     * innerHTMLを設定する
     * @param element
     * @param value
     */
    setInnerHtml = (element, value) => {
        if (element) {
            element.innerHTML = '';
            element.innerHTML += value;
        }
    }
    /**
     * tbodyとpaginationを表示する
     * @param data
     */
    showXhtml = (data) => {
        this.setInnerHtml(this.#tbody, data.xhtml);
        this.setInnerHtml(this.#pagination, data.pagination);
    }

    /**
     * 再読み込み
     */
    reLoad = (urlResponse) => {
        this.#reload?.addEventListener('click', () => window.location.href = urlResponse);
    }

    /**
     * 並び順をする
     */
    findSortData = () => {
        this.#sort?.addEventListener('change', this.eventFindSortData);
        this.#sort?.addEventListener('orientationchange', this.eventInputSearch);//Android IOS
    }

    /**
     * 並び順のchangeイベント
     * @param e
     */
    eventFindSortData = (e) => {
        //stop duplicate call event
        e.stopImmediatePropagation();
        if (this.#dataResult !== "empty") {
            const currentValue = e.currentTarget.value;
            const status = this.#getStatus?.getAttribute('data-status');
            if (currentValue && currentValue !== 'default') {
                const xhrParam = new XhrParam(this.#sortURL, {sort: currentValue, status});
                clearTimeout(this.#timer);
                this.#timer = setTimeout(() => {
                    const successHandler = (res) => {
                        if (res.result) {
                            this.showXhtml(res.data);
                            this.#search.value = '';
                            this.dropdownBtn();
                        }
                    }
                    XHRCrudMethod.store(xhrParam, successHandler);
                }, this.#timeout)
            }
        }
    }

    /**
     * ステータスをチェンジする
     */
    changeStatus = () => {
        this.#changeStatus?.addEventListener('click', (e) => {
            e.stopImmediatePropagation();
            const {id} = this.getIdChecked();
            if (id.length) {
                const xhrParam = new XhrParam(this.#changeStatusURL, {id, 'status': this.#statusVal});
                clearTimeout(this.#timer);
                this.#timer = setTimeout(() => {
                    const successHandler = (res) => {
                        if (res.result) {
                            this.#tbody.querySelectorAll('td[title=status]').forEach((elm) => {
                                const dataId = elm?.getAttribute('data-id');
                                const dataStatus = elm?.getAttribute('data-status');
                                if (res.data.id.includes(dataId)) {
                                    this.setHtmlStatus(elm, dataStatus);
                                }
                            })

                            //ステータスボタンHTMLを設定する
                            this.setBtnStatus(res.data.number, this.#statusVal);

                            //チェックされた項目をfalseに設定する
                            this.#tbody.querySelectorAll('input[type=checkbox]:checked').forEach((elm) => {
                                const dataId = elm?.getAttribute('data-id');
                                if (res.data.id.includes(dataId)) {
                                    elm.checked = false;
                                }
                            })
                            //正常トーストが表示する
                            Toaster.showSuccess(fw.i18n.messages['S.status']);
                            this.#selectAll.checked = false;
                        }
                    }
                    XHRCrudMethod.store(xhrParam, successHandler);
                }, this.#timeout)
            }

        });
    }


    /**
     * 行を削除する
     *
     */
    delete = (hasStatus = true) => {
        this.#delete?.addEventListener('click', (e) => {
            e.stopImmediatePropagation();
            const {id, arrImage} = this.getIdChecked();
            if (id.length) {
                const status = hasStatus ? this.#statusVal : '';
                const image = arrImage ? arrImage : '';
                const xhrParam = new XhrParam(this.#deleteURL, {id, status, image});
                clearTimeout(this.#timer);
                this.#timer = setTimeout(() => {
                    const successHandler = (res) => {
                        if (res.result) {
                            //ステータスボタンHTMLを設定する
                            if (res.data.number.length) {
                                this.setBtnStatus(res.data.number, this.#statusVal);
                            }
                            //行を削除する
                            this.#tbody.querySelectorAll('input[type=checkbox]:checked').forEach((elm) => {
                                const dataId = elm?.getAttribute('data-id');
                                if (res.data.id.includes(dataId)) {
                                    elm.closest("tr").remove();
                                }
                            })
                            //正常トーストが表示する
                            Toaster.showSuccess(fw.i18n.messages['S.delete']);
                            this.#selectAll.checked = false;
                        }
                    }
                    XHRCrudMethod.store(xhrParam, successHandler);
                }, this.#timeout)
            }
        })
    }

    /**
     * 作成ボタンをクリックする
     */
    create = () => {
        this.#create?.addEventListener('click', (e) => {
            e.stopImmediatePropagation();
            const xhrParam = new XhrParam(this.#createURL);
            clearTimeout(this.#timer);
            this.#timer = setTimeout(() => {
                const successHandler = (res) => {
                    if (res.result) {
                        const title = res.data.title;
                        const input = res.data.input;
                        const submitBtn = res.data.submitBtn;
                        const url = res.data.url;
                        if (input && title && submitBtn) {
                            const modal = new OpenModal(this.#functionId, this.#pathImage);
                            modal.openAttributeModal('', title, input, submitBtn, url);
                        }
                    }
                }
                XHRCrudMethod.get(xhrParam, successHandler);
            }, this.#timeout)

        })
    }

    /**
     * チェックされたIDを取得する
     * @return {{arrImage: *[], id: *[]}}
     */
    getIdChecked = () => {
        let id = [];
        let arrImage = [];
        this.#tbody.querySelectorAll('input[type=checkbox]:checked').forEach((elm) => {
            const dataId = elm?.getAttribute('data-id');
            const dataImage = elm?.getAttribute('data-image');
            id.push(dataId);
            arrImage.push(dataImage);
        });
        return {id, arrImage};
    }

    /**
     * ステータスボタンHTMLを設定する
     * @param textNumber
     * @param statusVal
     */
    setBtnStatus = (textNumber, statusVal) => {
        this.#getStatus.innerHTML = '';
        const textButton = statusVal ? fw.i18n.code['Status.show'] : fw.i18n.code['Status.not.show'];
        const textColor = statusVal ? "bg-azure-lt" : "bg-red-lt";
        this.#getStatus.innerHTML = `<span class='badge ${textColor} me-1'>${textNumber}</span>${textButton}`
    }
    /**
     * TbodyのステータスカラムHTMLを表示する
     * @param elm
     * @param dataStatus
     */
    setHtmlStatus = (elm, dataStatus) => {
        elm.innerHTML = '';
        const textHTML = dataStatus === '1' ? fw.i18n.code['Status.not.show'] : fw.i18n.code['Status.show'];
        const classIcon = dataStatus === '1' ? "bg-danger" : "bg-success";

        if (dataStatus === '1') {
            elm.setAttribute('data-status', '0');
        } else {
            elm.setAttribute('data-status', '1');
        }

        elm.innerHTML = `<span class='badge ${classIcon} me-1'></span>${textHTML}`;
    }

}

export {THeader};
