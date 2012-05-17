<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tetsu
 * Date: 12/01/15
 * Time: 17:35
 * To change this template use File | Settings | File Templates.
 */
class DependencyLabel
{
    // 同格関係を表すラベル。
    const APPOSITION = 'APPOSITION';

    // 依存関係を表すラベル。
    const DEPENDENCY = 'DEPENDENCY';

    // 並列関係を表すラベル。
    const PARALLEL = 'PARALLEL';

    // 不明なラベル
    const INVALID_TYPE = 'INVALID_TYPE';

    static function valueOf($name) {
        foreach(self::lists() as $value) {
            if($value == $name) return $value;
        }
        return self::INVALID_TYPE;
    }

    static function lists() {
        return array(
            self::APPOSITION,
            self::DEPENDENCY,
            self::PARALLEL
        );
    }
}
