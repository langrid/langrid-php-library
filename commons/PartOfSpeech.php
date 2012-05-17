<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tetsu
 * Date: 12/01/15
 * Time: 17:02
 * To change this template use File | Settings | File Templates.
 */
class PartOfSpeech
{
    // 形容詞
    const adjective = 'adjective ';

    // 副詞
    const adverb = 'adverb';

    // 名詞
    const noun = 'noun';

    const noun_common = 'noun.common';

    const noun_other = 'noun.other';

    const noun_pronoun = 'noun.pronoun';

    const noun_proper = 'noun.proper';

    const other = 'other';

    const unknown = 'unknown';

    const verb = 'verb';

    /*
     * @param type: type文字列
     * @return PartOfSpeech Part Of Speechのタイプ　不明時はunknown
     */
    static function getPartOfSpeech(/*String*/ $name = 'unknown') {
        foreach(self::lists() as $value) {
            if($value == $name) return $value;
        }
        return self::unknown;
    }

    static function lists(){
        return array(
            self::adjective,
            self::adverb,
            self::noun,
            self::noun_common,
            self::noun_other,
            self::noun_pronoun,
            self::noun_proper,
            self::other,
            self::unknown,
            self::verb
        );
    }
}
