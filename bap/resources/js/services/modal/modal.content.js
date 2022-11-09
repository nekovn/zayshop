import {checkFormatFileImage} from "../../utilities/composition/checkFormatFileImage";
import {Toaster} from "../toastr/notifications";

class ModalContent {
    //LabelとText
    #modalBodyText;

    //LabelとInput
    #modalBodyForm;

    //Formのcsrf
    #csrf;

    //Text
    #textTitle;
    #textImage;

    //Input
    #inputTitle;
    #inputImage;


    constructor() {
        this.#modalBodyText = document.getElementById('modal-body-text');
        this.#modalBodyForm = document.getElementById('modal-body-form');
        this.#csrf = this.#modalBodyForm.querySelector("input[name='_token']");
    }

    /**
     * 元イメージを取得する為に、エレメントを作成する
     * @param input
     */
    createElmInputOldImage = (input) => {
        if (input) {
            const inputImage = document.getElementById('input-image');
            const dataImage = inputImage?.getAttribute('data-image');
            if(dataImage && dataImage.length) {
                const inputCurrentImage = document.createElement('input');
                const attribute = {'type': 'hidden', 'name': 'old_image', 'value': dataImage};
                for (const key in attribute) {
                    inputCurrentImage.setAttribute(key, attribute[key]);
                }
                this.#modalBodyForm.append(inputCurrentImage);
            }
        }

    }

    /**
     * 文字を表示するだけ
     * @param text
     */
    contentTextXhtml(text) {
        this.#modalBodyText.innerHTML = '';
        this.#modalBodyText.innerHTML += text;
    }

    /**
     * フォームのインプットを表示する
     * @param input
     */
    contentFormXhtml(input) {
        this.#modalBodyForm.innerHTML = '';
        // this.#modalBodyForm.append(this.#csrf);
        if (input) {
            this.#modalBodyForm.innerHTML += input;
        }
    }

    /**
     * 編集する時、フォームのインプットに元データを表示する
     * input : Window chrome,edge,firefoxをサポート
     * propertychange : IE8をサポート
     * orientationchange : Android IOSをサポート
     */
    contentSetValueInput() {
        this.#inputTitle = document.getElementById('input-title');
        this.#inputImage = document.getElementById('input-image');
        this.#inputTitle?.addEventListener('input', this.eventInputTitle);//Window chrome,edge,firefox
        this.#inputTitle?.addEventListener('propertychange', this.eventInputTitle);//IE8
        this.#inputTitle?.addEventListener('orientationchange', this.eventInputTitle);//Android IOS

        this.#inputImage?.addEventListener('change', this.eventChangeImage);//Window chrome,edge,firefox
        this.#inputImage?.addEventListener('orientationchange', this.eventChangeImage);//Android IOS

    }

    eventInputTitle = (e) => {
        e.stopImmediatePropagation();
        this.#textTitle = document.getElementById('text-title');
        if (this.#textTitle) this.#textTitle.innerHTML = e.currentTarget.value;
    }

    eventChangeImage = (e) => {
        e.stopImmediatePropagation();
        if (window.File && window.FileReader && window.FileList && window.Blob) {
            const currentFile = e.currentTarget.files;
            if(currentFile && currentFile.length) {
                const textImage = document.getElementById('area-image');
                const div = document.createElement('div');
                div.setAttribute('class', 'row');
                div.setAttribute('id', 'div-image');
                for (let i=0; i<currentFile.length; i++) {
                    if (!currentFile[i].type.match("image")) continue;
                    const imageUpload = currentFile[i];
                    // ロードイメージ
                    const reader = new FileReader();
                    reader.addEventListener('load', () => {
                        if(textImage) {
                            textImage.src = reader.result;
                        } else {
                            this.createAreaImage(div, textImage, reader.result, currentFile.length)
                        }

                        // this.#inputImage.setAttribute('value', reader.result)
                    })
                    reader.readAsDataURL(imageUpload);

                }

            }
        } else {
            Toaster.showError(fw.i18n.messages['E.error.format.image']);
        }

    }

    /**
     * クリエイトで、画像アップロードする時、画像エレメントを作成して、表示する
     * @param div
     * @param textImage
     * @param imageSource
     * @param lengthImg
     */
    createAreaImage = (div, textImage, imageSource, lengthImg) => {
        if (!textImage) {
            const idDiv = document.getElementById('div-image');

            let img = `<div class="col-6 mt-2"><img class="d-block card-img" id="data-image" width="100" height="100" src="${imageSource}"></div>`;
            div.insertAdjacentHTML('beforeend', img);
            this.#inputImage.parentNode.append(div);

            if (lengthImg === 1) {
                idDiv?.parentNode.removeChild(idDiv);
            }

        }
    }
}

export {ModalContent}


