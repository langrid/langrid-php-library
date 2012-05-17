<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tetsu
 * Date: 12/01/15
 * Time: 17:21
 * To change this template use File | Settings | File Templates.
 */
class ConceptualRelation
{
    // Part-of関係
    const HOLONYMS = 'HOLONYMS';

    // 上位概念
    const HYPERNYMS = 'HYPERNYMS';

    // 下位概念
    const HYPONYMS = 'HYPONYMS';

    // Part-of関係
    const MERONYMS = 'MERONYMS';

    const INVALID_TYPE = 'INVALID_TYPE';

    /*
     * @param name: 返される定数の名前
     * @return ConceptualRelation
     */
    static function valueOf($name) {
        foreach(self::lists() as $value) {
            if($value == $name) return $value;
        }
        return self::INVALID_TYPE;
    }

    /*
     * @return Array<ConceptualRelation>
     */
    static function lists(){
        return array(
            self::HOLONYMS,
            self::HYPERNYMS,
            self::HYPONYMS,
            self::MERONYMS
        );
    }
}
