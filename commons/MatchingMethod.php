<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tetsu
 * Date: 12/01/15
 * Time: 16:03
 * To change this template use File | Settings | File Templates.
 */
class MatchingMethod
{
    // 完全一致
    const COMPLETE = 'COMPLETE';
    // 包含。 プロパティが集合の場合に、そこに含むべき要素を指定する場合に使用する。
    const IN = 'IN';
    // 言語パスマッチング。 先頭と末尾の一致をとり、中間は出現順序のみ付き合わせる
    const LANGUAGE_PATH = 'LANGUAGE_PATH';
    // 部分一致
    const PARTIAL = 'PARTIAL';
    // 前方一致
    const PREFIX = 'PREFIX';
    // 正規表現マッチング
    const REGEX = 'REGEX';
    // 後方一致
    const SUFFIX = 'SUFFIX';

    static function valueOf($name = 'COMPLETE') {
        foreach(self::lists() as $value) {
            if($value == $name) return $value;
        }
        return self::COMPLETE;
    }

    static function lists(){
        return array(
            self::COMPLETE,
            self::IN,
            self::LANGUAGE_PATH,
            self::PARTIAL,
            self::PREFIX,
            self::REGEX,
            self::SUFFIX
        );
    }
}
