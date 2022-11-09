class ModalFooter {
    #functionId;

    #modal

    #modalCancel;

    #modalSubmit;

    #modalBodyForm;

    constructor(modal, functionId) {
        this.#functionId = functionId;
        this.#modalCancel = document.getElementById('modal-cancel');
        this.#modalSubmit = document.getElementById('modal-submit');
        this.#modalBodyForm = document.querySelector(`form[name=${this.#functionId}-form]`)
        this.#modal = modal;
    }

    /**
     * ModalでCancelボタンをクリックすると、ポップ画面を閉じる
     */
    areaCancelBtn = () => {
        this.#modalCancel.addEventListener('click', (e) => {
            e.stopImmediatePropagation();
            this.#modal.classList.remove('show');
        })
    }

    /**
     * ModalでSubmitボタンを表示する
     */
    areaSubmitBtn = (submitBtn, url) => {
        this.#modalSubmit.classList.remove('show');
        const action = window.location.href;
        if (submitBtn && url) {
            this.#modalSubmit.innerHTML = '';
            this.#modalSubmit.innerHTML += submitBtn;
            this.#modalSubmit.classList.add('show');
            this.#modalBodyForm?.setAttribute('action', url);
            this.submitForm();
        } else {
            this.#modalBodyForm?.setAttribute('action', action);
        }
    }

    /**
     * サブミットボタンをクリックする
     */
    submitForm = () => {
        this.#modalSubmit.addEventListener('click', (e) => {
            e.stopImmediatePropagation();
            this.#modalBodyForm.submit();
        })
    }



}
export {ModalFooter}
