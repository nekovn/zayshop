import {TFooter} from "./tfooter";
import {XhrParam} from "../../services/xhr/xhr_param";
import {XHRCrudMethod} from "../../services/xhr/xhr_method";
import {OpenModal} from "../../services/modal/modal";

class TBody extends TFooter {
    /**
     * 画面処理ID
     */
    #functionId;

    /**
     * タイムアウトを設定する
     * @type {number}
     */
    #timeout = 800;

    #selectAll;

    #hasElm;

    #urlResponse;

    #modal

    #modalBody;

    #timer;

    #pathImage;

    constructor(functionId, per_page, urlResponse, pathImage = '') {
        super(`${functionId}`, per_page);
        this.#functionId = functionId;
        this.#pathImage = pathImage;
        this.#selectAll = document.getElementById("select-all");
        this.#modal = document.getElementById('modal-report');
        this.#modalBody = document.getElementById('modal-body');
        this.#urlResponse = urlResponse;
        this.#hasElm = [];
        this.selectAll();
        this.dropdownBtn();
    }

    selectAll = () => {
        this.#selectAll.addEventListener('change', (e) => {
            const inputCheckbox = document.querySelectorAll('input[type=checkbox]');
            if (this.#selectAll.checked) {
                inputCheckbox.forEach((element) => element.checked = true)
            } else {
                inputCheckbox.forEach((element) => element.checked = false)
            }
        })
    }

    /**
     * 落ちるボタンをクリックすると
     */
    dropdownBtn = () => {
        const allDropdownMenu = document.querySelectorAll('.dropdown-menu');
        const textEnd = document.querySelectorAll('.text-end');
        const DROP_CLASS = 'show';
        textEnd.forEach((elm) => {
            elm.addEventListener('click', ({target}) => {
                //if click out, then off dropdown
                if (!target.parentNode.classList.contains('dropdown')) target.parentNode.classList.remove(DROP_CLASS);

                const dropdownMenu = target.parentNode.querySelector('.dropdown-menu');
                allDropdownMenu.forEach(el => el !== dropdownMenu && el.classList.remove(DROP_CLASS));
                if (dropdownMenu) {
                    dropdownMenu.classList.toggle(DROP_CLASS);
                    const dropClass = dropdownMenu.classList.contains(DROP_CLASS);
                    if (dropClass) {
                        this.dropdownItem(dropdownMenu);
                    }

                }


            })
        })

    }

    /**
     * 落ちるボタンの中で落ちるアイテムをクリックすると
     * @param dropdownMenu
     */
    dropdownItem = (dropdownMenu) => {
        dropdownMenu.querySelectorAll('.dropdown-item').forEach((elm) => {
            elm.addEventListener('click', (e) => {
                //stop duplicate call event
                e.stopImmediatePropagation();
                const target = e.target;
                const id = target.getAttribute('data-id');
                const type = target.getAttribute('data-type');
                switch (type) {
                    case 'see':
                        this.see(id);
                        break;
                    case 'edit':
                        this.edit(id);
                        break;
                    case 'sendmail':
                        this.sendmail(id);
                        break;

                }
                dropdownMenu.classList.remove('show');

            })
        })
    }


    sendmail = (id) => {
        if (id) {
            const url = `${this.#urlResponse}/open-sendmail`;
            const xhrParam = new XhrParam(url, {id});
            clearTimeout(this.#timer);
            this.#timer = setTimeout(() => {
                const successHandler = (res) => {
                    if (res.result) {
                        const title = res.data.title;
                        const label = res.data.label;
                        const submitBtn = res.data.submitBtn;
                        const oldValue = res.data.old;
                        const input = res.data.input;
                        const url = res.data.url;
                        if (title && label) {
                            const modal = new OpenModal(this.#functionId, this.#pathImage);
                            modal.openModal(title, label, oldValue, input, submitBtn, url);
                        }
                    }
                }
                XHRCrudMethod.store(xhrParam, successHandler);
            }, this.#timeout)
        }
    }


    /**
     * 詳細見る
     * @param id
     */
    see = (id) => {
        if (id) {
            const url = `${this.#urlResponse}/open`;
            const xhrParam = new XhrParam(url, {id});
            clearTimeout(this.#timer);
            this.#timer = setTimeout(() => {
                const successHandler = (res) => {
                    if (res.result) {
                        const title = res.data.title;
                        const label = res.data.label;
                        const oldValue = res.data.old;
                        const submitBtn = res.data.submitBtn;
                        const url = res.data.url;
                        if (title && label && oldValue) {
                            const modal = new OpenModal(this.#functionId, this.#pathImage);
                            modal.openModal(title, label, oldValue, '', submitBtn, url);
                        }
                    }
                }
                XHRCrudMethod.store(xhrParam, successHandler);
            }, this.#timeout)
        }
    }

    edit = (id) => {
        if (id) {
            const url = `${this.#urlResponse}/open-edit`;
            const xhrParam = new XhrParam(url, {id});
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
        }
    }


}

export {TBody};
