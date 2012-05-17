<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tetsu
 * Date: 12/01/15
 * Time: 15:49
 * To change this template use File | Settings | File Templates.
 */
class Language
{
    private $tag;
    private $name;

    function Language($tag, $name) {
        $this->tag = $tag;
        $this->name = $name;
    }


    function equals(Language $other) {
        return $other instanceof Language &&
            $this->getTag() == $other->tag;
    }

    function getTag() {
        return $this->tag;
    }

    public function getName()
    {
        return $this->name;
    }

    function __toString()
    {
        return $this->getTag();
    }


    static $languages;

    static function get($tag) {
        if(!self::$languages) {
            self::createLanguageMapper();
        }
        return @self::$languages[($tag)];
    }

    private static function createLanguageMapper() {
        self::$languages = array(
            'ab' => new Language('ab', 'Abkhazian'),
            'aa' => new Language('aa', 'Afar'),
            'af' => new Language('af', 'Afrikaans'),
            'ak' => new Language('ak', 'Akan'),
            'sq' => new Language('sq', 'Albanian'),
            'am' => new Language('am', 'Amharic'),
            'ar' => new Language('ar', 'Arabic'),
            'an' => new Language('an', 'Aragonese'),
            'hy' => new Language('hy', 'Armenian'),
            'as' => new Language('as', 'Assamese'),
            'av' => new Language('av', 'Avaric'),
            'ae' => new Language('ae', 'Avestan'),
            'ay' => new Language('ay', 'Aymara'),
            'az' => new Language('az', 'Azerbaijani'),
            'bm' => new Language('bm', 'Bambara'),
            'ba' => new Language('ba', 'Bashkir'),
            'eu' => new Language('eu', 'Basque'),
            'bn' => new Language('bn', 'Bengali'),
            'dz' => new Language('dz', 'Bhutani'),
            'bh' => new Language('bh', 'Bihari'),
            'bi' => new Language('bi', 'Bislama'),
            'nb' => new Language('nb', 'Bokmål, Norwegian'),
            'bs' => new Language('bs', 'Bosnian'),
            'br' => new Language('br', 'Breton'),
            'bg' => new Language('bg', 'Bulgarian'),
            'my' => new Language('my', 'Burmese'),
            'be' => new Language('be', 'Byelorussian(Belarussian)'),
            'km' => new Language('km', 'Cambodian'),
            'ca' => new Language('ca', 'Catalan'),
            'ch' => new Language('ch', 'Chamorro'),
            'ce' => new Language('ce', 'Chechen'),
            'ny' => new Language('ny', 'Chichewa'),
            'zh-CN' => new Language('zh-CN', 'Chinese(Simplified)'),
            'zh-TW' => new Language('zh-TW', 'Chinese(Traditional)'),
            'zh' => new Language('zh', 'Chinese'),
            'cu' => new Language('cu', 'Church Slavic'),
            'cv' => new Language('cv', 'Chuvash'),
            'kw' => new Language('kw', 'Cornish'),
            'co' => new Language('co', 'Corsican'),
            'cr' => new Language('cr', 'Cree'),
            'hr' => new Language('hr', 'Croatian'),
            'cs' => new Language('cs', 'Czech'),
            'da' => new Language('da', 'Danish'),
            'dv' => new Language('dv', 'Divehi'),
            'nl' => new Language('nl', 'Dutch'),
            'en-GB' => new Language('en-GB', 'English(United Kingdom)'),
            'en-US' => new Language('en-US', 'English(United States)'),
            'en' => new Language('en', 'English'),
            'eo' => new Language('eo', 'Esperanto'),
            'et' => new Language('et', 'Estonian'),
            'ee' => new Language('ee', 'Ewe'),
            'fo' => new Language('fo', 'Faroese'),
            'fj' => new Language('fj', 'Fiji'),
            'fi' => new Language('fi', 'Finnish'),
            'fr' => new Language('fr', 'French'),
            'fy' => new Language('fy', 'Frisian'),
            'ff' => new Language('ff', 'Fulah'),
            'gl' => new Language('gl', 'Galician'),
            'lg' => new Language('lg', 'Ganda'),
            'ka' => new Language('ka', 'Georgian'),
            'de' => new Language('de', 'German'),
            'el' => new Language('el', 'Greek'),
            'kl' => new Language('kl', 'Greenlandic'),
            'gn' => new Language('gn', 'Guarani'),
            'gu' => new Language('gu', 'Gujarati'),
            'ht' => new Language('ht', 'Haitian'),
            'ha' => new Language('ha', 'Hausa'),
//	'iw' => 'Hebrew',
            'he' => new Language('he', 'Hebrew'),
            'hz' => new Language('hz', 'Herero'),
            'hi' => new Language('hi', 'Hindi'),
            'ho' => new Language('ho', 'Hiri Motu'),
            'hu' => new Language('hu', 'Hungarian'),
            'is' => new Language('is', 'Icelandic'),
            'io' => new Language('io', 'Ido'),
            'ig' => new Language('ig', 'Igbo'),
            'id' => new Language('id', 'Indonesian'),
            'ia' => new Language('ia', 'Interlingua'),
            'ie' => new Language('ie', 'Interlingue'),
            'iu' => new Language('iu', 'Inuktitut'),
            'ik' => new Language('ik', 'Inupiak'),
            'ga' => new Language('ga', 'Irish(Irish Gaelic)'),
            'it' => new Language('it', 'Italian'),
            'ja' => new Language('ja', 'Japanese'),
            'jv' => new Language('jv', 'Javanese'),
            'kn' => new Language('kn', 'Kannada'),
            'kr' => new Language('kr', 'Kanuri'),
            'ks' => new Language('ks', 'Kashmiri'),
            'kk' => new Language('kk', 'Kazakh'),
            'ki' => new Language('ki', 'Kikuyu'),
            'ky' => new Language('ky', 'Kirghiz'),
            'rn' => new Language('rn', 'Kirundi'),
            'rw' => new Language('rw', 'Kiyarwanda'),
            'kv' => new Language('kv', 'Komi'),
            'kg' => new Language('kg', 'Kongo'),
            'ko' => new Language('ko', 'Korean'),
            'kj' => new Language('kj', 'Kuanyama'),
            'ku' => new Language('ku', 'Kurdish'),
            'lo' => new Language('lo', 'Laotian'),
            'la' => new Language('la', 'Latin'),
            'lv' => new Language('lv', 'Latvian Lettish'),
            'li' => new Language('li', 'Limburgan'),
            'ln' => new Language('ln', 'Lingala'),
            'lt' => new Language('lt', 'Lithuanian'),
            'lu' => new Language('lu', 'Luba-Katanga'),
            'lb' => new Language('lb', 'Luxemburgish'),
            'mk' => new Language('mk', 'Macedonian'),
            'mg' => new Language('mg', 'Malagasy'),
            'ms' => new Language('ms', 'Malay'),
            'ml' => new Language('ml', 'Malayalam'),
            'mt' => new Language('mt', 'Maltese'),
            'gv' => new Language('gv', 'Manx Gaelic'),
            'mi' => new Language('mi', 'Maori'),
            'mr' => new Language('mr', 'Marathi'),
            'mh' => new Language('mh', 'Marshallese'),
            'mo' => new Language('mo', 'Moldavian'),
            'mn' => new Language('mn', 'Mongolian'),
            'na' => new Language('na', 'Nauru'),
            'nv' => new Language('nv', 'Navajo'),
            'nd' => new Language('nd', 'Ndebele, North'),
            'nr' => new Language('nr', 'Ndebele, South'),
            'ng' => new Language('ng', 'Ndonga'),
            'ne' => new Language('ne', 'Nepali'),
            'se' => new Language('se', 'Northern Sámi'),
            'nn' => new Language('nn', 'Norwegian Nynorsk'),
            'no' => new Language('no', 'Norwegian'),
            'oc' => new Language('oc', 'Occitan'),
            'oj' => new Language('oj', 'Ojibwa'),
            'or' => new Language('or', 'Oriya'),
            'om' => new Language('om', 'Oromo'),
            'os' => new Language('os', 'Ossetian'),
            'pi' => new Language('pi', 'Pali'),
            'ps' => new Language('ps', 'Pashto'),
            'fa' => new Language('fa', 'Persian'),
            'pl' => new Language('pl', 'Polish'),
            'pt-BR' => new Language('pt-BR', 'Portugese(Brazil)'),
            'pt-PT' => new Language('pt-PT', 'Portugese(Portugal)'),
            'pt' => new Language('pt', 'Portuguese'),
            'pa' => new Language('pa', 'Punjabi'),
            'qu' => new Language('qu', 'Quechua'),
            'rm' => new Language('rm', 'Rhaeto-Romance'),
            'ro' => new Language('ro', 'Romanian'),
            'ru' => new Language('ru', 'Russian'),
            'sm' => new Language('sm', 'Samoan'),
            'sg' => new Language('sg', 'Sangho'),
            'sa' => new Language('sa', 'Sanskrit'),
            'sc' => new Language('sc', 'Sardinian'),
            'gd' => new Language('gd', 'Scots Gaelic(Scottish Gaelic)'),
            'sr' => new Language('sr', 'Serbian'),
            'sh' => new Language('sh', 'Serbo-Croatian'),
            'st' => new Language('st', 'Sesotho'),
            'tn' => new Language('tn', 'Setswana'),
            'sn' => new Language('sn', 'Shona'),
            'ii' => new Language('ii', 'Sichuan Yi'),
            'sd' => new Language('sd', 'Sindhi'),
            'si' => new Language('si', 'Singhalese'),
            'ss' => new Language('ss', 'Siswati'),
            'sk' => new Language('sk', 'Slovak'),
            'sl' => new Language('sl', 'Slovenian'),
            'so' => new Language('so', 'Somali'),
            'es' => new Language('es', 'Spanish'),
            'su' => new Language('su', 'Sudanese'),
            'sw' => new Language('sw', 'Swahili'),
            'sv' => new Language('sv', 'Swedish'),
            'tl' => new Language('tl', 'Tagalog'),
            'ty' => new Language('ty', 'Tahitian'),
            'tg' => new Language('tg', 'Tajik'),
            'ta' => new Language('ta', 'Tamil'),
            'tt' => new Language('tt', 'Tatar'),
            'te' => new Language('te', 'Telugu'),
            'th' => new Language('th', 'Thai'),
            'bo' => new Language('bo', 'Tibetan'),
            'ti' => new Language('ti', 'Tigrinya'),
            'to' => new Language('to', 'Tonga'),
            'ts' => new Language('ts', 'Tsonga'),
            'tr' => new Language('tr', 'Turkish'),
            'tk' => new Language('tk', 'Turkmen'),
            'tw' => new Language('tw', 'Twi'),
            'ug' => new Language('ug', 'Uigur'),
            'uk' => new Language('uk', 'Ukrainian'),
            'ur' => new Language('ur', 'Urdu'),
            'uz' => new Language('uz', 'Uzbek'),
            've' => new Language('ve', 'Venda'),
            'vi' => new Language('vi', 'Vietnamese'),
            'vo' => new Language('vo', 'Volapük'),
            'wa' => new Language('wa', 'Walloon'),
            'cy' => new Language('cy', 'Welsh'),
            'wo' => new Language('wo', 'Wolof'),
            'xh' => new Language('xh', 'Xhosa'),
            'yi' => new Language('yi', 'Yiddish'),
            'yo' => new Language('yo', 'Yorouba'),
            'za' => new Language('za', 'Zhuang'),
            'zu' => new Language('zu', 'Zulu'),
        );
    }
}
