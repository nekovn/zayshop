<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * 検索条件保持する場合の戻る
     * https://qiita.com/toontoon/items/eb9de17f65c198112f24
     * $request->getSession()->flashでフラッシュデータに保存した場合、old関数で取得できません
     * $request->getSession()->flashInputでフラッシュデータに保存した場合、old関数を使って取得します
     * redirect()->withInput(): luu data vao session
     * flashInput == redirect()->withInput(): cho nen ta co dung duoc old();
     * @access public
     * @param $values array :key:field名　
     */
    protected function backRedirect(Request $request, $sessionKey = null, $router, $values= [])
    {
        if ($request->session()->get($sessionKey)) {
            //old('key');
            $request->session()->flashInput($sessionKey? $request->session()->get($sessionKey):$values);
        }
        //候補(こうほ) : goi y tim kiem
        // 301で返すのはURLの正規化目的、このページは候補に表示する必要無し
        // キャッシュは保存しないようにする(GETでURLが同じだとPHP処理が走らない為)
        return redirect(route($router), Response::HTTP_MOVED_PERMANENTLY)
                ->withHeaders([
                    'Cache-Control' => 'no-store'
                ]);

    }
}
