<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tetsu
 * Date: 12/01/15
 * Time: 18:02
 * To change this template use File | Settings | File Templates.
 */
class DictMatchingMethod
{
    const LEMMA = 'LEMMA';

    const PREFIX = 'PREFIX';

    const REGEX = 'REGEX';

    const STEM = 'STEM';

    const STRING_EXACT = 'STRING_EXACT';

    const SUBSTRING = 'SUBSTRING';

    const SUFFIX = 'SUFFIX';

    const WORD_EXACT = 'WORD_EXACT';

    static function valueOf($name) {
        $name = strtoupper($name);
        foreach(self::lists() as $value) {
            if($value == $name) return $value;
        }
        return self::LEMMA;
    }

    static function lists() {
        return array(
            self::LEMMA,
            self::PREFIX,
            self::REGEX,
            self::STEM,
            self::STRING_EXACT,
            self::SUBSTRING,
            self::SUFFIX,
            self::WORD_EXACT
        );
    }
}
