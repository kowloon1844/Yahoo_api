<html>
    <head>
        <meta http-equiv="Content-type" content="text/html; charset=UTF-8">
        <title>ショッピングデモサイト - 設定した値で商品リストを表示する（モジュール作成用）</title>
        <link rel="stylesheet" type="text/css" href="../css/prototype.css"/>
    </head>
    <body>
        <h1><a href="./ItemSearchListModulePage.php">ショッピングデモサイト - 設定した値で商品リストを表示する（モジュール作成用）</a></h1>
<?php
/** @mainpage
 *  指定したキーワードで商品を検索、表示
 */

/**
 * @file
 * @brief ItemSearchListModule.phpを利用して、商品の検索結果を検索、表示
 *
 * ItemSearchListModule.phpを利用して、
 * 指定したキーワードで商品を検索し,その結果をブログパーツ風に表示します。
 */
   
//ItemSearchListModule.phpを読み込み
include_once("./ItemSearchListModule.php");
   

/**
 * ItemSearchListModule呼び出し
 *
 * 設定例
 * $obj = new ItemSearchListModule(array(
 *     "appid"         => アプリケーションID //必須,
 *     "query"         => 検索キーワード     //必須,
 *     "category_id"   => カテゴリID,        //任意
 *     "affiliate_type"=>"アフィリエイトタイプ yid or vc",
 *     "affiliate_id"  =>"アリフィリエイトIDを指定します",
 *     "sort"          => "ソート順を指定します"
 * ));
 * 
 * 指定できるパラメータの一覧は
 * http://developer.yahoo.co.jp/shopping/itemsearch/V1/itemSearch.html
 * を参照してください。
 *
 * パラメータを追加する場合は
 * "リクエストパラメータ名" => "値"
 * としてください。
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
new ItemSearchListModule(array(
                     "appid" => "<dj00aiZpPUhpcTVFSU40R3cyZCZzPWNvbnN1bWVyc2VjcmV0Jng9ODg->",
                     "query" => "PC",
                     "hits" => 5
                 ));
?>
    </body>
<!-- Begin Yahoo! JAPAN Web Services Attribution Snippet -->
<a href="http://developer.yahoo.co.jp/about">
<img src="http://i.yimg.jp/images/yjdn/yjdn_attbtn2_105_17.gif" width="105" height="17" title="Webサービス by Yahoo! JAPAN" alt="Webサービス by Yahoo! JAPAN" border="0" style="margin:15px 15px 15px 15px"></a>
<!-- End Yahoo! JAPAN Web Services Attribution Snippet -->

</html>

