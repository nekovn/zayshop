/**
 * XmlHttpRequestに関する処理を定義する。
 * @classdesc @js/services/xhr_method.js
 */
import {XHR} from "./xhr";
import {Toaster} from "../toastr/notifications";
class XHRCrudMethod extends XHR {

    static store(xhrParam, successHandler) {
        return XHR.post(xhrParam)
            .then((res) => {
                successHandler(res);
            })
            .catch((err) => {
                this.fail();
                console.log(err);
            })
    }

    static get(xhrParam, successHandler) {
        return XHR.get(xhrParam)
            .then((res) => {
                successHandler(res);
            })
            .catch((err) => {
                this.fail();
                console.log(err);
            })


    }

    static fail() {
        Toaster.showError(fw.i18n.messages['E.system.error']);
    }
}

export {XHRCrudMethod}
