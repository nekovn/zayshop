import {ModalHead} from "./modal.head";
import {ModalContent} from "./modal.content";
import {ModalFooter} from "./modal.footer";

class OpenModal {
    #functionId;

    #modal

    #modalBody;

    #modalHead;

    #modalContent;

    #modalFooter;

    #pathImage;

    constructor(functionId, pathImage = '') {
        this.#functionId = functionId;
        this.#modal = document.getElementById('modal-report');
        this.#modalBody = document.getElementById('modal-body');

        this.#modalHead = new ModalHead(this.#modal);
        this.#modalContent = new ModalContent();
        this.#modalFooter = new ModalFooter(this.#modal, this.#functionId);

        this.#pathImage = pathImage;
    }

    openModal(title, label, oldValue, input, submitBtn, url) {
        let textXhtml = '';
        Object.keys(label).forEach((key) => {
            if (key && label[key]) {
                let showText = '';
                if (Array.isArray(oldValue[key])) {
                    if (key === 'image_name') {
                        showText+= '<div class="row">';
                        oldValue[key].forEach((src) => {
                            showText+= '<div class="col-6 mb-2">';
                            showText+=`<img class='d-block card-img' src='${this.#pathImage}${src.name}' width='100' height='100'>`;
                            showText+= '</div>';
                        })
                        showText+= '</div>';
                    } else {
                        showText+= '<ul>';
                        oldValue[key].forEach((src) => {
                            showText+= `<li class="text-muted">${src.name}</li>`;
                        })
                        showText+= '</ul>';
                    }
                } else {
                    showText+= (key === 'image') ?
                        `<img class='d-block w-100 card-img' src='${this.#pathImage}${oldValue[key]}' width='300' height='250'>` :
                        `<p class='break-word' id='text-${key}'>${oldValue[key]}</p>`;
                }

                const showLabel = label[key] ? `<label class="form-label">${label[key]}</label>` : '';
                textXhtml+= `<div class="col-lg-6">${showLabel}${showText}</div>`;
            }
        });

        if (textXhtml) {
            this.openAttributeModal(textXhtml, title, input, submitBtn, url);
        }
    }

    openAttributeModal = (textXhtml, title, input, submitBtn, url) => {
        this.#modal.classList.add('show');
        this.#modalHead.areaTitle(title);
        this.#modalHead.areaCloseBtn();
        this.#modalHead.areaWindow();
        this.#modalContent.contentTextXhtml(textXhtml);
        this.#modalContent.contentFormXhtml(input);
        this.#modalContent.contentSetValueInput();
        this.#modalContent.createElmInputOldImage(input);
        this.#modalFooter.areaCancelBtn();
        this.#modalFooter.areaSubmitBtn(submitBtn, url);
    }

}

export {OpenModal}


