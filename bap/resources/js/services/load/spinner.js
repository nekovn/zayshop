/**
 * スピナー表示設定
 * @classdesc @js/services/load/spinner.js
 */
class Spinner {

    /**
     * エリアセレクター
     */
    #areaSelector;

    constructor() {
        this.#areaSelector = document.getElementById('loading');
    }

    show() {
        this.#areaSelector.classList.add('show');
    }

    hide() {
        this.#areaSelector.classList.remove('show');
    }
}
export {Spinner}
