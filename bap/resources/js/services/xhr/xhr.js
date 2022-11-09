/**
 * 非同期通信実行クラス
 * @classdesc @js/services/xhr/xhr.js
 */
import {XhrParam} from "./xhr_param";
import {Spinner} from "../load/spinner";

class XHR extends XhrParam{
    /**
     * csrf token
     * @type {string}
     */
    static csrf = document.querySelector("meta[name='csrf-token']").getAttribute("content");

    /**
     * リクエスト要求メソッドパラメータチェック
     * @param xhrParam
     */
    static checkConfig(xhrParam) {
        if (!(xhrParam instanceof XhrParam)) {
            throw new SyntaxError('Param không chính xác.');
        }
        if (!(xhrParam.url)) {
            throw new SyntaxError('URL không chính xác.')
        }
    }

    /**
     * GETメソッド実行
     * @param xhrParam
     * @param responsePlain
     * @return {Promise}
     */
    static get(xhrParam, responsePlain = false) {
        XHR.checkConfig(xhrParam);
        let spinner = new Spinner();
        spinner.show();
        return new Promise((resolve, reject) => {
            window.superagent
                  .get(xhrParam.url)
                  .set('Content-Type', 'application/json')
                  .set('X-Requested-With', 'XMLHttpRequest')
                  .set('X-CSRF-TOKEN', this.csrf)
                  .query(xhrParam.params)
                  .end((err,res) => {
                      spinner.hide();
                      if (err) {
                          reject(err);
                      } else {
                          if(responsePlain) {
                              resolve(res.text)
                          } else {
                              resolve(JSON.parse(res.text));
                          }
                      }
                  })
        })
    }

    static post(xhrParam) {
        this.checkConfig(xhrParam);
        let spinner = new Spinner();
        spinner.show();
        return new Promise((resolve, reject) => {
            window.superagent
                  .post(xhrParam.url)
                  .set('Content-Type', 'application/json')
                  .set('X-Requested-With', 'XMLHttpRequest')
                  .set('X-CSRF-TOKEN', this.csrf)
                  .send(xhrParam.params)
                  .end((err,res) => {
                      spinner.hide();
                      if (err) {
                          reject(err);
                      } else {
                          resolve(JSON.parse(res.text));
                      }
                  });
        });
    }
}
export {XHR}
