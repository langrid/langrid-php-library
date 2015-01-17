<?php

// 言語グリッドPHPライブラリをインポート
require_once dirname(__FILE__). '/../MultilingualStudio.php';

// 使用するサービスのWSDLのURLを指定
$url = 'http://langrid.org/service_manager/wsdl/kyoto1.langrid:KyotoUJServer';

try{
    // 該当するサービスタイプ(今回はTranslation)を指定して，クライアントを作成
    $client = ClientFactory::createTranslationClient($url);

    // サービス認証情報の設定．※※必ずUserIDとパスワードを設定※※
    $client->setUserId('someUserId');
    $client->setPassword('somePassword');
    // クライアントから外部への接続にプロキシが必要であれば，以下の様に指定する．
    // $client->setProxy('proxy.yournetwork.org','8080');


    // APIマニュアルのメソッド情報に基づき，サービスを呼び出す．
    $result = $client->translate(
        Language::get('ja'),
        Language::get('en'),
        '今日は良い天気です．');

    echo $result;
    //var_dump($result);
    // -> It's fine today.

} catch(Exception $e) {
    var_dump($e);
}
