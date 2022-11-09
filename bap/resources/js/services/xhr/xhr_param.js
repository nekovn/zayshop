/**
 * XHRパラメータ
 * @classdesc @js/services/xhr/xhr-param.js
 */

class XhrParam {
    /**
     * スピナー表示設定
     */
    #spinnerParam;

    /**
     * 添付ファイル
     */
    #attaches = [];

    /**
     * URL
     */
    #url = '';
    /**
     * リクエストパラメータ
     */
    #params = {};

    constructor(url, params = {}, attaches = []) {
        this.#url = url;
        this.#params = params;
        this.#attaches = attaches;
    }

    /**
     * スピナー表示設定
     * @return {object}
     */
    get spinnerPram() {
        return this.#spinnerParam;
    }

    /**
     * 添付ファイルを返す
     * @return {*[]}
     */
    get attaches() {
        return this.#attaches;
    }

    /**
     * URLを返す。
     * @return {string}
     */
    get url() {
        return this.#url;
    }

    /**
     * リクエストパラメータを返す。
     * @return {object}
     */
    get params() {
        return this.#params;
    }
}
export {XhrParam}
