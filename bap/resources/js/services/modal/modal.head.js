class ModalHead {
    #modal

    #modalTitle;

    #modalClose;


    constructor(modal) {
        this.#modalTitle = document.getElementById('modal-title');
        this.#modalClose = document.getElementById('modal-close');
        this.#modal = modal;
    }

    /**
     * Modalでタイトルエリアを表示する
     * @param title
     */
    areaTitle = (title) => {
        this.#modalTitle.innerHTML = '';
        this.#modalTitle.innerHTML += title;
    }

    /**
     * ModalでXボタンをクリックすると、ポップ画面を閉じる
     */
    areaCloseBtn = () => {
        this.#modalClose.addEventListener('click', (e) => {
            e.stopImmediatePropagation();
            this.#modal.classList.remove('show');
        })
    }

    /**
     * 外のセレクターをクッリクすると、ポップ画面を閉じる
     */
    areaWindow = () => {
        window.onclick = (e) => {
            if (e.target === this.#modal) {
                e.stopImmediatePropagation();
                this.#modal.classList.remove('show');
            }
        }
    }
}
export {ModalHead}
