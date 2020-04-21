<?php

/** @mainpage
 *  商品検索リストモジュール
 */
 
/**
 * @file
 * @brief 商品検索リストモジュール
 *
 * 商品検索APIを利用し、指定したキーワードで商品を検索します。
 * そしてその結果をhtmlに整形して表示します。
 *
 * PHP version 5
 */

require_once("../common/common.php");
/**
 * @class
 * @brief 指定したキーワードで商品を検索、表示
 *
 * このクラスは、商品検索APIを利用して、
 * 引数に指定されたキーワードやその他の検索条件を使用して、APIにアクセスし、その結果をhtmlで表示します。
 * phpのページに、数行のphpコードを書くことでブログパーツのように商品の検索結果を表示させることができます。
 */
class ItemSearchListModule
{
    /**
     * @brief 引数を元に商品検索APIにアクセスし、結果を表示
     *
     * 引数を元に商品検索APIにアクセスし、その結果をhtmlに整形して表示します。
     * 引数$paramにリクエストパラメータ名=>値と書くことで検索条件を追加することができます。
     * 指定できるパラメータの一覧は
     * http://developer.yahoo.co.jp/webapi/shopping/shopping/v1/itemsearch.html
     * を参照してください。
     *
     * @param array $param　apiにアクセスする際の検索条件を指定します。
     *
     * $param = array(
     *     "appid"         => アプリケーションID //必須,
     *     "query"         => 検索キーワード     //必須,
     *     "category_id"   => カテゴリID,        //任意
     *     "affiliate_type"=>"アフィリエイトタイプ yid or vc",
     *     "affiliate_id"  =>"アリフィリエイトIDを指定します",
     *     "sort"          => "ソート順を指定します"
     * );
     *
     * Yahoo! JAPANアフィリエイトサンプル
     * new ItemSearchListModule(array(
     *                    "appid"         => "<あなたのアプリケーションID>",
     *                    "query"         => "スニーカー",
     *                    "affiliate_type"=>"yid",
     *                    "affiliate_id"  =>"EOipIudsX6dXJlfi8JXmsCA-",
     *                    "hits"          => 3
     * ));
     * バリューコマースアフィリエイトサンプル
     * new ItemSearchListModule(array(
     *                    "appid"         => "<あなたのアプリケーションID>",
     *                    "query"         => "スニーカー",
     *                    "affiliate_type"=>"vc",
     *                    "affiliate_id"  =>"http://ck.jp.ap.valuecommerce.com/servlet/referral?sid=2219441&pid=874350257&vc_url=",
     *                    "hits"          => 3
     * ));
     */
    function __construct($param = array())
    {
        $results = array();
        if ($param['query'] != "") {
            $query4url = rawurlencode($param['query']);
            try {
                $url = "http://shopping.yahooapis.jp/ShoppingWebService/V1/itemSearch?appid=dj00aiZpPUhpcTVFSU40R3cyZCZzPWNvbnN1bWVyc2VjcmV0Jng9ODg-&query=PC&hits=50&category_id=14249&condition=new";
                $xml = simplexml_load_file($url);
                if ($xml["totalResultsReturned"] != 0) {
                    $results = $xml->Result->Hit;
                }
            } catch(Exception $e) {
            }
        }
        
        $result['query'] = $param['query'];
        $result["results"] = $results;
        ItemSearchListModule::display($result);
    }

    /**
     * @brief htmlを組み立てて表示
     *
     * 引数に指定された値からhtmlに整形して出力します。
     *
     * @param array $param html内で表示する値
     *
     * $param = array(
     *     "query" => string //検索キーワード,
     *     "results" => object //検索結果
     * );
     */
    function display($param = array())
    {
        $html = array();
        $html []= "<div class=\"YahooShoppingAPISDK\">"; 
        $html []= "<div class=\"ItemSearchListModule\">";
        $html []= "<h1>「" . h($param['query']) . "」の検索結果</h1>";
        foreach ($param["results"] as $result) {
            $html []= "<div class=\"Item\">";
            $html []= "<p><a href=\"" . h($result->Url) . "\"><img src=\"" . h($result->Image->Small) . "\" /></a></p>";
            $html []= "<h2><a href=\"". h($result->Url) . "\">" . h($result->Name) . "</a></h2>";
            if (!is_null($result->PriceLabel->SalePrice)) {
                $html []= "<p class=\"Price\">". h($result->Price). "円</p>";
            }
            $html []= "<p class=\"JanCode\">". 'JAN Code:'. h($result->JanCode). "</p>";
            $html []= "<p class=\"Review\">". 'レビュー平均:'. h($result->Review->Rate). "</p>";
            $html []= "<p class=\"Review\">". 'レビュー件数'. h($result->Review->Count). "</p>";
            $html []= "</div>";
        }
        $html []= "</div>";
        $html []= "</div>";
        echo join("\n", $html);
    }
}
?>
