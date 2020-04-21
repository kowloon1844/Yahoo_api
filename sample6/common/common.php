<?php

/** @mainpage
 * Yahoo!ショッピングWeb APISDK共通関数
 */

/**
 * @file
 * @brief Yahoo!ショッピングWeb APISDK共通関数
 *
 * Yahoo!ショッピングWeb APISDKで、共通で使用する関数を集めたファイルです。
 *
 * PHP version 5
 *
 */


/**
 * @brief 特殊文字を HTML エンティティに変換する
 *
 * これは、htmlspecialchars()を使いやすくするための関数です。
 * htmlspecialchars() http://jp.php.net/htmlspecialcharsより
 *   文字の中には HTML において特殊な意味を持つものがあり、
 *   それらの本来の値を表示したければ HTML の表現形式に変換してやらなければなりません。
 *   この関数は、これらの変換を行った結果の文字列を返します。
 *
 *   '&' (アンパサンド) は '&amp;' になります。
 *   ENT_QUOTES が設定されている場合のみ、 ''' (シングルクオート) は '&#039;'になります。
 *   '<' (小なり) は '&lt;' になります。
 *   '>' (大なり) は '&gt;' になります。
 *   ''' (シングルクオート) は '&#039;'になります。
 *
 * echo h("<>&'\""); //&lt;&gt;&amp;&#039;&quotと出力します。
 *
 * @param string $str 変換したい文字列
 * 
 * @return string html用に変換した文字列
 * 
 */
function h($str)
{
    return htmlspecialchars($str, ENT_QUOTES);
}

/**
 * 引数$paramからurlパラメータを生成します。
 *
 * 引数$paramからurlパラメータを生成します。
 * キーを引数$param値をurlエンコードします。
 * 値が""である場合はクエリに含めず、処理を飛ばします。
 *
 * @param array $param urlパラメータに含める文字列 キーにリクエストパラメータを、値にパラメータの値を入れます。
 * $param = array(
 *   リクエストパラメータ=>パラメータの値
 * );
 *
 * $urlparameter = buildQuery(array(
 *                           "appid" => "<あなたのアプリケーションID>",
 *                           "query" => "スニーカー",
 *                           "category_id" => "",
 *                           "hit" => 5
 *                            ));
 * 
 * echo $urlparameter; //appid=<あなたのアプリケーションID>&query=%A5%B9%A5%CB%A1%BC%A5%AB%A1%BC&category_id=&hit=5
 *
 * 上記の例では、category_idは値が「""」のためurlパラメータに含まれません。
 *
 * @return string  URLエンコードされた文字列を返します。
 */
function buildQuery($param)
{
    $tmp = array();
    foreach($param as $key => $value){
        $tmp [] = $key . "=" . rawurlencode($value);
    }
    return join("&", $tmp);
}
?>
