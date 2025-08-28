<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JapaneseCharactersSeeder extends Seeder
{
    public function run()
    {
        $hiragana = [
            [
                'character' => 'あ',
                'romaji' => 'a',
                'meaning' => 'Vowel A',
                'stroke_count' => 3,
                'jlpt_level' => 5,
                'examples' => [
                    ['word' => 'あさ', 'romaji' => 'asa', 'meaning' => 'morning'],
                    ['word' => 'あめ', 'romaji' => 'ame', 'meaning' => 'rain'],
                ],
            ],
            [
                'character' => 'い',
                'romaji' => 'i',
                'meaning' => 'Vowel I',
                'stroke_count' => 2,
                'jlpt_level' => 5,
                'examples' => [
                    ['word' => 'いぬ', 'romaji' => 'inu', 'meaning' => 'dog'],
                    ['word' => 'いえ', 'romaji' => 'ie', 'meaning' => 'house'],
                ],
            ],
            [
                'character' => 'う',
                'romaji' => 'u',
                'meaning' => 'Vowel U',
                'stroke_count' => 2,
                'jlpt_level' => 5,
                'examples' => [
                    ['word' => 'うみ', 'romaji' => 'umi', 'meaning' => 'sea'],
                    ['word' => 'うた', 'romaji' => 'uta', 'meaning' => 'song'],
                ],
            ],
            [
                'character' => 'え',
                'romaji' => 'e',
                'meaning' => 'Vowel E',
                'stroke_count' => 2,
                'jlpt_level' => 5,
                'examples' => [
                    ['word' => 'えき', 'romaji' => 'eki', 'meaning' => 'station'],
                    ['word' => 'えんぴつ', 'romaji' => 'enpitsu', 'meaning' => 'pencil'],
                ],
            ],
            [
                'character' => 'お',
                'romaji' => 'o',
                'meaning' => 'Vowel O',
                'stroke_count' => 3,
                'jlpt_level' => 5,
                'examples' => [
                    ['word' => 'おかね', 'romaji' => 'okane', 'meaning' => 'money'],
                    ['word' => 'おちゃ', 'romaji' => 'ocha', 'meaning' => 'tea'],
                ],
            ],
             [
                'character' => 'か',
                'romaji' => 'ka',
                'meaning' => 'Syllable KA',
                'stroke_count' => 3,
                'jlpt_level' => 5,
                'examples' => [
                    ['word' => 'かさ', 'romaji' => 'kasa', 'meaning' => 'umbrella'],
                    ['word' => 'かみ', 'romaji' => 'kami', 'meaning' => 'paper / hair'],
                ],
            ],
            [
                'character' => 'き',
                'romaji' => 'ki',
                'meaning' => 'Syllable KI',
                'stroke_count' => 4,
                'jlpt_level' => 5,
                'examples' => [
                    ['word' => 'き', 'romaji' => 'ki', 'meaning' => 'tree / spirit'],
                    ['word' => 'きた', 'romaji' => 'kita', 'meaning' => 'north'],
                ],
            ],
            [
                'character' => 'く',
                'romaji' => 'ku',
                'meaning' => 'Syllable KU',
                'stroke_count' => 1,
                'jlpt_level' => 5,
                'examples' => [
                    ['word' => 'くち', 'romaji' => 'kuchi', 'meaning' => 'mouth'],
                    ['word' => 'くも', 'romaji' => 'kumo', 'meaning' => 'cloud / spider'],
                ],
            ],
            [
                'character' => 'け',
                'romaji' => 'ke',
                'meaning' => 'Syllable KE',
                'stroke_count' => 3,
                'jlpt_level' => 5,
                'examples' => [
                    ['word' => 'けさ', 'romaji' => 'kesa', 'meaning' => 'this morning'],
                    ['word' => 'けむり', 'romaji' => 'kemuri', 'meaning' => 'smoke'],
                ],
            ],
            [
                'character' => 'こ',
                'romaji' => 'ko',
                'meaning' => 'Syllable KO',
                'stroke_count' => 2,
                'jlpt_level' => 5,
                'examples' => [
                    ['word' => 'こども', 'romaji' => 'kodomo', 'meaning' => 'child'],
                    ['word' => 'ここ', 'romaji' => 'koko', 'meaning' => 'here'],
                ],
            ],
             [
                'character' => 'さ',
                'romaji' => 'sa',
                'meaning' => 'Syllable SA',
                'stroke_count' => 3,
                'jlpt_level' => 5,
                'examples' => [
                    ['word' => 'さかな', 'romaji' => 'sakana', 'meaning' => 'fish'],
                    ['word' => 'さけ', 'romaji' => 'sake', 'meaning' => 'alcohol / salmon'],
                ],
            ],
            [
                'character' => 'し',
                'romaji' => 'shi',
                'meaning' => 'Syllable SHI',
                'stroke_count' => 1,
                'jlpt_level' => 5,
                'examples' => [
                    ['word' => 'しろ', 'romaji' => 'shiro', 'meaning' => 'white / castle'],
                    ['word' => 'した', 'romaji' => 'shita', 'meaning' => 'under / tongue'],
                ],
            ],
            [
                'character' => 'す',
                'romaji' => 'su',
                'meaning' => 'Syllable SU',
                'stroke_count' => 2,
                'jlpt_level' => 5,
                'examples' => [
                    ['word' => 'すし', 'romaji' => 'sushi', 'meaning' => 'sushi'],
                    ['word' => 'すき', 'romaji' => 'suki', 'meaning' => 'like / fond of'],
                ],
            ],
            [
                'character' => 'せ',
                'romaji' => 'se',
                'meaning' => 'Syllable SE',
                'stroke_count' => 3,
                'jlpt_level' => 5,
                'examples' => [
                    ['word' => 'せかい', 'romaji' => 'sekai', 'meaning' => 'world'],
                    ['word' => 'せんせい', 'romaji' => 'sensei', 'meaning' => 'teacher'],
                ],
            ],
            [
                'character' => 'そ',
                'romaji' => 'so',
                'meaning' => 'Syllable SO',
                'stroke_count' => 2,
                'jlpt_level' => 5,
                'examples' => [
                    ['word' => 'そら', 'romaji' => 'sora', 'meaning' => 'sky'],
                    ['word' => 'それ', 'romaji' => 'sore', 'meaning' => 'that'],
                ],
            ],
            [
                'character' => 'た',
                'romaji' => 'ta',
                'meaning' => 'Syllable TA',
                'stroke_count' => 4,
                'jlpt_level' => 5,
                'examples' => [
                    ['word' => 'たべる', 'romaji' => 'taberu', 'meaning' => 'to eat'],
                    ['word' => 'たのしい', 'romaji' => 'tanoshii', 'meaning' => 'fun / enjoyable'],
                ],
            ],
            [
                'character' => 'ち',
                'romaji' => 'chi',
                'meaning' => 'Syllable CHI',
                'stroke_count' => 3,
                'jlpt_level' => 5,
                'examples' => [
                    ['word' => 'ちいさい', 'romaji' => 'chiisai', 'meaning' => 'small'],
                    ['word' => 'ちず', 'romaji' => 'chizu', 'meaning' => 'map'],
                ],
            ],
            [
                'character' => 'つ',
                'romaji' => 'tsu',
                'meaning' => 'Syllable TSU',
                'stroke_count' => 1,
                'jlpt_level' => 5,
                'examples' => [
                    ['word' => 'つき', 'romaji' => 'tsuki', 'meaning' => 'moon'],
                    ['word' => 'つくえ', 'romaji' => 'tsukue', 'meaning' => 'desk'],
                ],
            ],
            [
                'character' => 'て',
                'romaji' => 'te',
                'meaning' => 'Syllable TE',
                'stroke_count' => 2,
                'jlpt_level' => 5,
                'examples' => [
                    ['word' => 'て', 'romaji' => 'te', 'meaning' => 'hand'],
                    ['word' => 'てがみ', 'romaji' => 'tegami', 'meaning' => 'letter'],
                ],
            ],
            [
                'character' => 'と',
                'romaji' => 'to',
                'meaning' => 'Syllable TO',
                'stroke_count' => 2,
                'jlpt_level' => 5,
                'examples' => [
                    ['word' => 'ともだち', 'romaji' => 'tomodachi', 'meaning' => 'friend'],
                    ['word' => 'とけい', 'romaji' => 'tokei', 'meaning' => 'clock / watch'],
                ],
            ],
            [
                'character' => 'な',
                'romaji' => 'na',
                'meaning' => 'Syllable NA',
                'stroke_count' => 4,
                'jlpt_level' => 5,
                'examples' => [
                    ['word' => 'なつ', 'romaji' => 'natsu', 'meaning' => 'summer'],
                    ['word' => 'なまえ', 'romaji' => 'namae', 'meaning' => 'name'],
                ],
            ],
            [
                'character' => 'に',
                'romaji' => 'ni',
                'meaning' => 'Syllable NI',
                'stroke_count' => 3,
                'jlpt_level' => 5,
                'examples' => [
                    ['word' => 'にほん', 'romaji' => 'nihon', 'meaning' => 'Japan'],
                    ['word' => 'にく', 'romaji' => 'niku', 'meaning' => 'meat'],
                ],
            ],
            [
                'character' => 'ぬ',
                'romaji' => 'nu',
                'meaning' => 'Syllable NU',
                'stroke_count' => 2,
                'jlpt_level' => 5,
                'examples' => [
                    ['word' => 'ぬの', 'romaji' => 'nuno', 'meaning' => 'cloth'],
                    ['word' => 'ぬすむ', 'romaji' => 'nusumu', 'meaning' => 'to steal'],
                ],
            ],
            [
                'character' => 'ね',
                'romaji' => 'ne',
                'meaning' => 'Syllable NE',
                'stroke_count' => 2,
                'jlpt_level' => 5,
                'examples' => [
                    ['word' => 'ねこ', 'romaji' => 'neko', 'meaning' => 'cat'],
                    ['word' => 'ねだん', 'romaji' => 'nedan', 'meaning' => 'price'],
                ],
            ],
            [
                'character' => 'の',
                'romaji' => 'no',
                'meaning' => 'Syllable NO',
                'stroke_count' => 1,
                'jlpt_level' => 5,
                'examples' => [
                    ['word' => 'のむ', 'romaji' => 'nomu', 'meaning' => 'to drink'],
                    ['word' => 'のり', 'romaji' => 'nori', 'meaning' => 'seaweed / glue (context dependent)'],
                ],
            ],
            [
                'character' => 'は',
                'romaji' => 'ha',
                'meaning' => 'Syllable HA',
                'stroke_count' => 3,
                'jlpt_level' => 5,
                'examples' => [
                    ['word' => 'はな', 'romaji' => 'hana', 'meaning' => 'flower / nose (context dependent)'],
                    ['word' => 'はは', 'romaji' => 'haha', 'meaning' => 'mother'],
                ],
            ],
            [
                'character' => 'ひ',
                'romaji' => 'hi',
                'meaning' => 'Syllable HI',
                'stroke_count' => 2,
                'jlpt_level' => 5,
                'examples' => [
                    ['word' => 'ひと', 'romaji' => 'hito', 'meaning' => 'person'],
                    ['word' => 'ひる', 'romaji' => 'hiru', 'meaning' => 'noon / daytime'],
                ],
            ],
            [
                'character' => 'ふ',
                'romaji' => 'fu',
                'meaning' => 'Syllable FU',
                'stroke_count' => 1,
                'jlpt_level' => 5,
                'examples' => [
                    ['word' => 'ふゆ', 'romaji' => 'fuyu', 'meaning' => 'winter'],
                    ['word' => 'ふね', 'romaji' => 'fune', 'meaning' => 'boat'],
                ],
            ],
            [
                'character' => 'へ',
                'romaji' => 'he',
                'meaning' => 'Syllable HE',
                'stroke_count' => 1,
                'jlpt_level' => 5,
                'examples' => [
                    ['word' => 'へや', 'romaji' => 'heya', 'meaning' => 'room'],
                    ['word' => 'へん', 'romaji' => 'hen', 'meaning' => 'strange'],
                ],
            ],
            [
                'character' => 'ほ',
                'romaji' => 'ho',
                'meaning' => 'Syllable HO',
                'stroke_count' => 4,
                'jlpt_level' => 5,
                'examples' => [
                    ['word' => 'ほし', 'romaji' => 'hoshi', 'meaning' => 'star'],
                    ['word' => 'ほん', 'romaji' => 'hon', 'meaning' => 'book'],
                ],
            ],
             [
                'character' => 'ま',
                'romaji' => 'ma',
                'meaning' => 'Syllable MA',
                'stroke_count' => 3,
                'jlpt_level' => 5,
                'examples' => [
                    ['word' => 'まど', 'romaji' => 'mado', 'meaning' => 'window'],
                    ['word' => 'まち', 'romaji' => 'machi', 'meaning' => 'town / city'],
                ],
            ],
            [
                'character' => 'み',
                'romaji' => 'mi',
                'meaning' => 'Syllable MI',
                'stroke_count' => 2,
                'jlpt_level' => 5,
                'examples' => [
                    ['word' => 'みず', 'romaji' => 'mizu', 'meaning' => 'water'],
                    ['word' => 'みみ', 'romaji' => 'mimi', 'meaning' => 'ear'],
                ],
            ],
            [
                'character' => 'む',
                'romaji' => 'mu',
                'meaning' => 'Syllable MU',
                'stroke_count' => 3,
                'jlpt_level' => 5,
                'examples' => [
                    ['word' => 'むし', 'romaji' => 'mushi', 'meaning' => 'insect'],
                    ['word' => 'むら', 'romaji' => 'mura', 'meaning' => 'village'],
                ],
            ],
            [
                'character' => 'め',
                'romaji' => 'me',
                'meaning' => 'Syllable ME',
                'stroke_count' => 2,
                'jlpt_level' => 5,
                'examples' => [
                    ['word' => 'め', 'romaji' => 'me', 'meaning' => 'eye'],
                    ['word' => 'めがね', 'romaji' => 'megane', 'meaning' => 'glasses'],
                ],
            ],
            [
                'character' => 'も',
                'romaji' => 'mo',
                'meaning' => 'Syllable MO',
                'stroke_count' => 3,
                'jlpt_level' => 5,
                'examples' => [
                    ['word' => 'もり', 'romaji' => 'mori', 'meaning' => 'forest'],
                    ['word' => 'もの', 'romaji' => 'mono', 'meaning' => 'thing / object'],
                ],
            ],

             [
                'character' => 'や',
                'romaji' => 'ya',
                'meaning' => 'Syllable YA',
                'stroke_count' => 3,
                'jlpt_level' => 5,
                'examples' => [
                    ['word' => 'やま', 'romaji' => 'yama', 'meaning' => 'mountain'],
                    ['word' => 'やさい', 'romaji' => 'yasai', 'meaning' => 'vegetable'],
                ],
            ],
            [
                'character' => 'ゆ',
                'romaji' => 'yu',
                'meaning' => 'Syllable YU',
                'stroke_count' => 2,
                'jlpt_level' => 5,
                'examples' => [
                    ['word' => 'ゆき', 'romaji' => 'yuki', 'meaning' => 'snow'],
                    ['word' => 'ゆめ', 'romaji' => 'yume', 'meaning' => 'dream'],
                ],
            ],
            [
                'character' => 'よ',
                'romaji' => 'yo',
                'meaning' => 'Syllable YO',
                'stroke_count' => 2,
                'jlpt_level' => 5,
                'examples' => [
                    ['word' => 'よる', 'romaji' => 'yoru', 'meaning' => 'night'],
                    ['word' => 'よみます', 'romaji' => 'yomimasu', 'meaning' => 'to read'],
                ],
            ],
             [
                'character' => 'ら',
                'romaji' => 'ra',
                'meaning' => 'Syllable RA',
                'stroke_count' => 2,
                'jlpt_level' => 5,
                'examples' => [
                    ['word' => 'らいねん', 'romaji' => 'rainen', 'meaning' => 'next year'],
                    ['word' => 'らくだ', 'romaji' => 'rakuda', 'meaning' => 'camel'],
                ],
            ],
            [
                'character' => 'り',
                'romaji' => 'ri',
                'meaning' => 'Syllable RI',
                'stroke_count' => 1,
                'jlpt_level' => 5,
                'examples' => [
                    ['word' => 'りんご', 'romaji' => 'ringo', 'meaning' => 'apple'],
                    ['word' => 'りゆう', 'romaji' => 'riyuu', 'meaning' => 'reason'],
                ],
            ],
            [
                'character' => 'る',
                'romaji' => 'ru',
                'meaning' => 'Syllable RU',
                'stroke_count' => 1,
                'jlpt_level' => 5,
                'examples' => [
                    ['word' => 'るす', 'romaji' => 'rusu', 'meaning' => 'absence'],
                    ['word' => 'るいじ', 'romaji' => 'ruiji', 'meaning' => 'similarity'],
                ],
            ],
            [
                'character' => 'れ',
                'romaji' => 're',
                'meaning' => 'Syllable RE',
                'stroke_count' => 2,
                'jlpt_level' => 5,
                'examples' => [
                    ['word' => 'れきし', 'romaji' => 'rekishi', 'meaning' => 'history'],
                    ['word' => 'れんしゅう', 'romaji' => 'renshuu', 'meaning' => 'practice'],
                ],
            ],
            [
                'character' => 'ろ',
                'romaji' => 'ro',
                'meaning' => 'Syllable RO',
                'stroke_count' => 1,
                'jlpt_level' => 5,
                'examples' => [
                    ['word' => 'ろうか', 'romaji' => 'rouka', 'meaning' => 'hallway'],
                    ['word' => 'ろしあ', 'romaji' => 'roshia', 'meaning' => 'Russia'],
                ],
            ],
            [
                'character' => 'わ',
                'romaji' => 'wa',
                'meaning' => 'Syllable WA',
                'stroke_count' => 2,
                'jlpt_level' => 5,
                'examples' => [
                    ['word' => 'わたし', 'romaji' => 'watashi', 'meaning' => 'I, me'],
                    ['word' => 'わかる', 'romaji' => 'wakaru', 'meaning' => 'to understand'],
                ],
            ],
            [
                'character' => 'を',
                'romaji' => 'wo',
                'meaning' => 'Syllable WO (used as grammatical particle)',
                'stroke_count' => 3,
                'jlpt_level' => 5,
                'examples' => [
                    ['word' => 'りんごをたべる', 'romaji' => 'ringo wo taberu', 'meaning' => 'to eat an apple'],
                    ['word' => 'ほんをよむ', 'romaji' => 'hon wo yomu', 'meaning' => 'to read a book'],
                ],
            ],
            [
                'character' => 'ん',
                'romaji' => 'n',
                'meaning' => 'Syllable N',
                'stroke_count' => 1,
                'jlpt_level' => 5,
                'examples' => [
                    ['word' => 'ほん', 'romaji' => 'hon', 'meaning' => 'book'],
                    ['word' => 'みかん', 'romaji' => 'mikan', 'meaning' => 'mandarin orange'],
                ],
            ],
              [
                'character' => 'が',
                'romaji' => 'ga',
                'meaning' => 'Syllable GA',
                'stroke_count' => 3,
                'jlpt_level' => 5,
                'examples' => [
                    ['word' => 'がっこう', 'romaji' => 'gakkou', 'meaning' => 'school'],
                    ['word' => 'がくせい', 'romaji' => 'gakusei', 'meaning' => 'student'],
                ],
            ],
            [
                'character' => 'ぎ',
                'romaji' => 'gi',
                'meaning' => 'Syllable GI',
                'stroke_count' => 3,
                'jlpt_level' => 5,
                'examples' => [
                    ['word' => 'ぎんこう', 'romaji' => 'ginkou', 'meaning' => 'bank'],
                    ['word' => 'ぎゅうにく', 'romaji' => 'gyuuniku', 'meaning' => 'beef'],
                ],
            ],
            [
                'character' => 'ぐ',
                'romaji' => 'gu',
                'meaning' => 'Syllable GU',
                'stroke_count' => 2,
                'jlpt_level' => 5,
                'examples' => [
                    ['word' => 'ぐあい', 'romaji' => 'guai', 'meaning' => 'condition'],
                    ['word' => 'ぐん', 'romaji' => 'gun', 'meaning' => 'army'],
                ],
            ],
            [
                'character' => 'げ',
                'romaji' => 'ge',
                'meaning' => 'Syllable GE',
                'stroke_count' => 3,
                'jlpt_level' => 5,
                'examples' => [
                    ['word' => 'げんき', 'romaji' => 'genki', 'meaning' => 'healthy, fine'],
                    ['word' => 'げつようび', 'romaji' => 'getsuyoubi', 'meaning' => 'Monday'],
                ],
            ],
            [
                'character' => 'ご',
                'romaji' => 'go',
                'meaning' => 'Syllable GO',
                'stroke_count' => 2,
                'jlpt_level' => 5,
                'examples' => [
                    ['word' => 'ごはん', 'romaji' => 'gohan', 'meaning' => 'meal, rice'],
                    ['word' => 'ごぜん', 'romaji' => 'gozen', 'meaning' => 'morning, A.M.'],
                ],
            ],

            // --- ZA ジュウオン ざじずぜぞ ---
            [
                'character' => 'ざ',
                'romaji' => 'za',
                'meaning' => 'Syllable ZA',
                'stroke_count' => 3,
                'jlpt_level' => 5,
                'examples' => [
                    ['word' => 'ざっし', 'romaji' => 'zasshi', 'meaning' => 'magazine'],
                ],
            ],
            [
                'character' => 'じ',
                'romaji' => 'ji',
                'meaning' => 'Syllable JI',
                'stroke_count' => 3,
                'jlpt_level' => 5,
                'examples' => [
                    ['word' => 'じしょ', 'romaji' => 'jisho', 'meaning' => 'dictionary'],
                    ['word' => 'じかん', 'romaji' => 'jikan', 'meaning' => 'time, hour'],
                ],
            ],
            [
                'character' => 'ず',
                'romaji' => 'zu',
                'meaning' => 'Syllable ZU',
                'stroke_count' => 2,
                'jlpt_level' => 5,
                'examples' => [
                    ['word' => 'ずっと', 'romaji' => 'zutto', 'meaning' => 'always'],
                ],
            ],
            [
                'character' => 'ぜ',
                'romaji' => 'ze',
                'meaning' => 'Syllable ZE',
                'stroke_count' => 3,
                'jlpt_level' => 5,
                'examples' => [
                    ['word' => 'ぜひ', 'romaji' => 'zehi', 'meaning' => 'certainly, by all means'],
                ],
            ],
            [
                'character' => 'ぞ',
                'romaji' => 'zo',
                'meaning' => 'Syllable ZO',
                'stroke_count' => 3,
                'jlpt_level' => 5,
                'examples' => [
                    ['word' => 'ぞう', 'romaji' => 'zou', 'meaning' => 'elephant'],
                ],
            ],

            // --- DA ジュウオン だぢづでど ---
            [
                'character' => 'だ',
                'romaji' => 'da',
                'meaning' => 'Syllable DA',
                'stroke_count' => 4,
                'jlpt_level' => 5,
                'examples' => [
                    ['word' => 'だいがく', 'romaji' => 'daigaku', 'meaning' => 'university'],
                    ['word' => 'だめ', 'romaji' => 'dame', 'meaning' => 'no good'],
                ],
            ],
            [
                'character' => 'ぢ',
                'romaji' => 'ji',
                'meaning' => 'Syllable JI (rare, alt. form)',
                'stroke_count' => 4,
                'jlpt_level' => 5,
                'examples' => [
                    ['word' => 'はなぢ', 'romaji' => 'hanaji', 'meaning' => 'nosebleed'],
                ],
            ],
            [
                'character' => 'づ',
                'romaji' => 'zu',
                'meaning' => 'Syllable ZU (rare, alt. form)',
                'stroke_count' => 3,
                'jlpt_level' => 5,
                'examples' => [
                    ['word' => 'つづく', 'romaji' => 'tsuzuku', 'meaning' => 'to continue'],
                ],
            ],
            [
                'character' => 'で',
                'romaji' => 'de',
                'meaning' => 'Syllable DE',
                'stroke_count' => 4,
                'jlpt_level' => 5,
                'examples' => [
                    ['word' => 'でんしゃ', 'romaji' => 'densha', 'meaning' => 'train'],
                    ['word' => 'でぐち', 'romaji' => 'deguchi', 'meaning' => 'exit'],
                ],
            ],
            [
                'character' => 'ど',
                'romaji' => 'do',
                'meaning' => 'Syllable DO',
                'stroke_count' => 4,
                'jlpt_level' => 5,
                'examples' => [
                    ['word' => 'どうぶつ', 'romaji' => 'doubutsu', 'meaning' => 'animal'],
                    ['word' => 'どようび', 'romaji' => 'doyoubi', 'meaning' => 'Saturday'],
                ],
            ],

            // --- BA / PA ジュウオン ばびぶべぼ ぱぴぷぺぽ ---
            [
                'character' => 'ば',
                'romaji' => 'ba',
                'meaning' => 'Syllable BA',
                'stroke_count' => 4,
                'jlpt_level' => 5,
                'examples' => [
                    ['word' => 'ばんごはん', 'romaji' => 'bangohan', 'meaning' => 'dinner'],
                ],
            ],
            [
                'character' => 'び',
                'romaji' => 'bi',
                'meaning' => 'Syllable BI',
                'stroke_count' => 4,
                'jlpt_level' => 5,
                'examples' => [
                    ['word' => 'びょういん', 'romaji' => 'byouin', 'meaning' => 'hospital'],
                ],
            ],
            [
                'character' => 'ぶ',
                'romaji' => 'bu',
                'meaning' => 'Syllable BU',
                'stroke_count' => 3,
                'jlpt_level' => 5,
                'examples' => [
                    ['word' => 'ぶんがく', 'romaji' => 'bungaku', 'meaning' => 'literature'],
                ],
            ],
            [
                'character' => 'べ',
                'romaji' => 'be',
                'meaning' => 'Syllable BE',
                'stroke_count' => 4,
                'jlpt_level' => 5,
                'examples' => [
                    ['word' => 'べんきょう', 'romaji' => 'benkyou', 'meaning' => 'study'],
                ],
            ],
            [
                'character' => 'ぼ',
                'romaji' => 'bo',
                'meaning' => 'Syllable BO',
                'stroke_count' => 4,
                'jlpt_level' => 5,
                'examples' => [
                    ['word' => 'ぼうし', 'romaji' => 'boushi', 'meaning' => 'hat'],
                ],
            ],
            [
                'character' => 'ぱ',
                'romaji' => 'pa',
                'meaning' => 'Syllable PA',
                'stroke_count' => 4,
                'jlpt_level' => 5,
                'examples' => [
                    ['word' => 'パン', 'romaji' => 'pan', 'meaning' => 'bread (usually katakana)'],
                ],
            ],
            [
                'character' => 'ぴ',
                'romaji' => 'pi',
                'meaning' => 'Syllable PI',
                'stroke_count' => 4,
                'jlpt_level' => 5,
                'examples' => [
                    ['word' => 'ぴかぴか', 'romaji' => 'pikapika', 'meaning' => 'shiny'],
                ],
            ],
            [
                'character' => 'ぷ',
                'romaji' => 'pu',
                'meaning' => 'Syllable PU',
                'stroke_count' => 3,
                'jlpt_level' => 5,
                'examples' => [
                    ['word' => 'ぷらす', 'romaji' => 'purasu', 'meaning' => 'plus'],
                ],
            ],
            [
                'character' => 'ぺ',
                'romaji' => 'pe',
                'meaning' => 'Syllable PE',
                'stroke_count' => 4,
                'jlpt_level' => 5,
                'examples' => [
                    ['word' => 'ぺん', 'romaji' => 'pen', 'meaning' => 'pen'],
                ],
            ],
            [
                'character' => 'ぽ',
                'romaji' => 'po',
                'meaning' => 'Syllable PO',
                'stroke_count' => 4,
                'jlpt_level' => 5,
                'examples' => [
                    ['word' => 'ぽいんと', 'romaji' => 'pointo', 'meaning' => 'point'],
                ],
            ],
        ];

        $katakana = [
            [
                'character' => 'ア',
                'romaji' => 'a',
                'meaning' => 'Vowel A',
                'stroke_count' => 2,
                'jlpt_level' => 5,
                'examples' => [
                    ['word' => 'アイス', 'romaji' => 'aisu', 'meaning' => 'ice / ice cream'],
                    ['word' => 'アメリカ', 'romaji' => 'amerika', 'meaning' => 'America'],
                ],
            ],
            [
                'character' => 'イ',
                'romaji' => 'i',
                'meaning' => 'Vowel I',
                'stroke_count' => 2,
                'jlpt_level' => 5,
                'examples' => [
                    ['word' => 'イタリア', 'romaji' => 'itaria', 'meaning' => 'Italy'],
                    ['word' => 'インク', 'romaji' => 'inku', 'meaning' => 'ink'],
                ],
            ],
            [
                'character' => 'ウ',
                'romaji' => 'u',
                'meaning' => 'Vowel U',
                'stroke_count' => 3,
                'jlpt_level' => 5,
                'examples' => [
                    ['word' => 'ウサギ', 'romaji' => 'usagi', 'meaning' => 'rabbit'],
                    ['word' => 'ウエスト', 'romaji' => 'uesuto', 'meaning' => 'west / waist'],
                ],
            ],
            [
                'character' => 'エ',
                'romaji' => 'e',
                'meaning' => 'Vowel E',
                'stroke_count' => 3,
                'jlpt_level' => 5,
                'examples' => [
                    ['word' => 'エレベーター', 'romaji' => 'erebeetaa', 'meaning' => 'elevator'],
                    ['word' => 'エネルギー', 'romaji' => 'enerugii', 'meaning' => 'energy'],
                ],
            ],
            [
                'character' => 'オ',
                'romaji' => 'o',
                'meaning' => 'Vowel O',
                'stroke_count' => 3,
                'jlpt_level' => 5,
                'examples' => [
                    ['word' => 'オレンジ', 'romaji' => 'orenji', 'meaning' => 'orange'],
                    ['word' => 'オートバイ', 'romaji' => 'ootobai', 'meaning' => 'motorbike'],
                ],
            ],
             [
                'character' => 'カ',
                'romaji' => 'ka',
                'meaning' => 'Syllable KA',
                'stroke_count' => 2,
                'jlpt_level' => 5,
                'examples' => [
                    ['word' => 'カメラ', 'romaji' => 'kamera', 'meaning' => 'camera'],
                    ['word' => 'カレー', 'romaji' => 'karee', 'meaning' => 'curry'],
                ],
            ],
            [
                'character' => 'キ',
                'romaji' => 'ki',
                'meaning' => 'Syllable KI',
                'stroke_count' => 3,
                'jlpt_level' => 5,
                'examples' => [
                    ['word' => 'キリン', 'romaji' => 'kirin', 'meaning' => 'giraffe'],
                    ['word' => 'キロ', 'romaji' => 'kiro', 'meaning' => 'kilo'],
                ],
            ],
            [
                'character' => 'ク',
                'romaji' => 'ku',
                'meaning' => 'Syllable KU',
                'stroke_count' => 1,
                'jlpt_level' => 5,
                'examples' => [
                    ['word' => 'クラブ', 'romaji' => 'kurabu', 'meaning' => 'club'],
                    ['word' => 'クラス', 'romaji' => 'kurasu', 'meaning' => 'class'],
                ],
            ],
            [
                'character' => 'ケ',
                'romaji' => 'ke',
                'meaning' => 'Syllable KE',
                'stroke_count' => 3,
                'jlpt_level' => 5,
                'examples' => [
                    ['word' => 'ケーキ', 'romaji' => 'keeki', 'meaning' => 'cake'],
                    ['word' => 'ケガ', 'romaji' => 'kega', 'meaning' => 'injury'],
                ],
            ],
            [
                'character' => 'コ',
                'romaji' => 'ko',
                'meaning' => 'Syllable KO',
                'stroke_count' => 2,
                'jlpt_level' => 5,
                'examples' => [
                    ['word' => 'コーヒー', 'romaji' => 'koohii', 'meaning' => 'coffee'],
                    ['word' => 'コピー', 'romaji' => 'kopii', 'meaning' => 'copy'],
                ],
            ],
             [
                'character' => 'サ',
                'romaji' => 'sa',
                'meaning' => 'Syllable SA',
                'stroke_count' => 3,
                'jlpt_level' => 5,
                'examples' => [
                    ['word' => 'サラダ', 'romaji' => 'sarada', 'meaning' => 'salad'],
                    ['word' => 'サイン', 'romaji' => 'sain', 'meaning' => 'signature / sign'],
                ],
            ],
            [
                'character' => 'シ',
                'romaji' => 'shi',
                'meaning' => 'Syllable SHI',
                'stroke_count' => 3,
                'jlpt_level' => 5,
                'examples' => [
                    ['word' => 'システム', 'romaji' => 'shisutemu', 'meaning' => 'system'],
                    ['word' => 'シャツ', 'romaji' => 'shatsu', 'meaning' => 'shirt'],
                ],
            ],
            [
                'character' => 'ス',
                'romaji' => 'su',
                'meaning' => 'Syllable SU',
                'stroke_count' => 2,
                'jlpt_level' => 5,
                'examples' => [
                    ['word' => 'スーパー', 'romaji' => 'suupaa', 'meaning' => 'supermarket'],
                    ['word' => 'スープ', 'romaji' => 'suupu', 'meaning' => 'soup'],
                ],
            ],
            [
                'character' => 'セ',
                'romaji' => 'se',
                'meaning' => 'Syllable SE',
                'stroke_count' => 2,
                'jlpt_level' => 5,
                'examples' => [
                    ['word' => 'セット', 'romaji' => 'setto', 'meaning' => 'set'],
                    ['word' => 'セーター', 'romaji' => 'seetaa', 'meaning' => 'sweater'],
                ],
            ],
            [
                'character' => 'ソ',
                'romaji' => 'so',
                'meaning' => 'Syllable SO',
                'stroke_count' => 2,
                'jlpt_level' => 5,
                'examples' => [
                    ['word' => 'ソファ', 'romaji' => 'sofa', 'meaning' => 'sofa'],
                    ['word' => 'ソース', 'romaji' => 'soosu', 'meaning' => 'sauce'],
                ],
            ],
             [
                'character' => 'タ',
                'romaji' => 'ta',
                'meaning' => 'Syllable TA',
                'stroke_count' => 3,
                'jlpt_level' => 5,
                'examples' => [
                    ['word' => 'タクシー', 'romaji' => 'takushii', 'meaning' => 'taxi'],
                    ['word' => 'タオル', 'romaji' => 'taoru', 'meaning' => 'towel'],
                ],
            ],
            [
                'character' => 'チ',
                'romaji' => 'chi',
                'meaning' => 'Syllable CHI',
                'stroke_count' => 3,
                'jlpt_level' => 5,
                'examples' => [
                    ['word' => 'チーズ', 'romaji' => 'chiizu', 'meaning' => 'cheese'],
                    ['word' => 'チケット', 'romaji' => 'chiketto', 'meaning' => 'ticket'],
                ],
            ],
            [
                'character' => 'ツ',
                'romaji' => 'tsu',
                'meaning' => 'Syllable TSU',
                'stroke_count' => 3,
                'jlpt_level' => 5,
                'examples' => [
                    ['word' => 'ツアー', 'romaji' => 'tsuaa', 'meaning' => 'tour'],
                    ['word' => 'ツリー', 'romaji' => 'tsurii', 'meaning' => 'tree (usually Christmas tree)'],
                ],
            ],
            [
                'character' => 'テ',
                'romaji' => 'te',
                'meaning' => 'Syllable TE',
                'stroke_count' => 3,
                'jlpt_level' => 5,
                'examples' => [
                    ['word' => 'テーブル', 'romaji' => 'teeburu', 'meaning' => 'table'],
                    ['word' => 'テレビ', 'romaji' => 'terebi', 'meaning' => 'television'],
                ],
            ],
            [
                'character' => 'ト',
                'romaji' => 'to',
                'meaning' => 'Syllable TO',
                'stroke_count' => 2,
                'jlpt_level' => 5,
                'examples' => [
                    ['word' => 'トマト', 'romaji' => 'tomato', 'meaning' => 'tomato'],
                    ['word' => 'トイレ', 'romaji' => 'toire', 'meaning' => 'toilet'],
                ],
            ],
             [
                'character' => 'ナ',
                'romaji' => 'na',
                'meaning' => 'Syllable NA',
                'stroke_count' => 2,
                'jlpt_level' => 5,
                'examples' => [
                    ['word' => 'ナイフ', 'romaji' => 'naifu', 'meaning' => 'knife'],
                    ['word' => 'ナンバー', 'romaji' => 'nanbaa', 'meaning' => 'number'],
                ],
            ],
            [
                'character' => 'ニ',
                'romaji' => 'ni',
                'meaning' => 'Syllable NI',
                'stroke_count' => 2,
                'jlpt_level' => 5,
                'examples' => [
                    ['word' => 'ニート', 'romaji' => 'niito', 'meaning' => 'NEET (unemployed youth)'],
                    ['word' => 'ニンジン', 'romaji' => 'ninjin', 'meaning' => 'carrot'],
                ],
            ],
            [
                'character' => 'ヌ',
                'romaji' => 'nu',
                'meaning' => 'Syllable NU',
                'stroke_count' => 2,
                'jlpt_level' => 5,
                'examples' => [
                    ['word' => 'ヌードル', 'romaji' => 'nuudoru', 'meaning' => 'noodle'],
                    ['word' => 'ヌー', 'romaji' => 'nuu', 'meaning' => 'gnu (animal)'],
                ],
            ],
            [
                'character' => 'ネ',
                'romaji' => 'ne',
                'meaning' => 'Syllable NE',
                'stroke_count' => 2,
                'jlpt_level' => 5,
                'examples' => [
                    ['word' => 'ネクタイ', 'romaji' => 'nekutai', 'meaning' => 'necktie'],
                    ['word' => 'ネコ', 'romaji' => 'neko', 'meaning' => 'cat (katakana form, often used for stylistic purposes)'],
                ],
            ],
            [
                'character' => 'ノ',
                'romaji' => 'no',
                'meaning' => 'Syllable NO',
                'stroke_count' => 1,
                'jlpt_level' => 5,
                'examples' => [
                    ['word' => 'ノート', 'romaji' => 'nooto', 'meaning' => 'notebook'],
                    ['word' => 'ノイズ', 'romaji' => 'noizu', 'meaning' => 'noise'],
                ],
            ],
             [
                'character' => 'ハ',
                'romaji' => 'ha',
                'meaning' => 'Syllable HA',
                'stroke_count' => 2,
                'jlpt_level' => 5,
                'examples' => [
                    ['word' => 'ハート', 'romaji' => 'haato', 'meaning' => 'heart'],
                    ['word' => 'ハンバーガー', 'romaji' => 'hanbaagaa', 'meaning' => 'hamburger'],
                ],
            ],
            [
                'character' => 'ヒ',
                'romaji' => 'hi',
                'meaning' => 'Syllable HI',
                'stroke_count' => 2,
                'jlpt_level' => 5,
                'examples' => [
                    ['word' => 'ヒーロー', 'romaji' => 'hiirou', 'meaning' => 'hero'],
                    ['word' => 'ヒント', 'romaji' => 'hinto', 'meaning' => 'hint'],
                ],
            ],
            [
                'character' => 'フ',
                'romaji' => 'fu',
                'meaning' => 'Syllable FU',
                'stroke_count' => 1,
                'jlpt_level' => 5,
                'examples' => [
                    ['word' => 'フルーツ', 'romaji' => 'furuutsu', 'meaning' => 'fruit'],
                    ['word' => 'フロント', 'romaji' => 'furonto', 'meaning' => 'front (desk)'],
                ],
            ],
            [
                'character' => 'ヘ',
                'romaji' => 'he',
                'meaning' => 'Syllable HE',
                'stroke_count' => 1,
                'jlpt_level' => 5,
                'examples' => [
                    ['word' => 'ヘア', 'romaji' => 'hea', 'meaning' => 'hair'],
                    ['word' => 'ヘリコプター', 'romaji' => 'herikoputaa', 'meaning' => 'helicopter'],
                ],
            ],
            [
                'character' => 'ホ',
                'romaji' => 'ho',
                'meaning' => 'Syllable HO',
                'stroke_count' => 4,
                'jlpt_level' => 5,
                'examples' => [
                    ['word' => 'ホテル', 'romaji' => 'hoteru', 'meaning' => 'hotel'],
                    ['word' => 'ホット', 'romaji' => 'hotto', 'meaning' => 'hot'],
                ],
            ],
             [
                'character' => 'マ',
                'romaji' => 'ma',
                'meaning' => 'Syllable MA',
                'stroke_count' => 2,
                'jlpt_level' => 5,
                'examples' => [
                    ['word' => 'マスク', 'romaji' => 'masuku', 'meaning' => 'mask'],
                    ['word' => 'マップ', 'romaji' => 'mappu', 'meaning' => 'map'],
                ],
            ],
            [
                'character' => 'ミ',
                'romaji' => 'mi',
                'meaning' => 'Syllable MI',
                'stroke_count' => 2,
                'jlpt_level' => 5,
                'examples' => [
                    ['word' => 'ミルク', 'romaji' => 'miruku', 'meaning' => 'milk'],
                    ['word' => 'ミーティング', 'romaji' => 'miitingu', 'meaning' => 'meeting'],
                ],
            ],
            [
                'character' => 'ム',
                'romaji' => 'mu',
                'meaning' => 'Syllable MU',
                'stroke_count' => 2,
                'jlpt_level' => 5,
                'examples' => [
                    ['word' => 'ムービー', 'romaji' => 'muubii', 'meaning' => 'movie'],
                    ['word' => 'ムード', 'romaji' => 'muudo', 'meaning' => 'mood'],
                ],
            ],
            [
                'character' => 'メ',
                'romaji' => 'me',
                'meaning' => 'Syllable ME',
                'stroke_count' => 2,
                'jlpt_level' => 5,
                'examples' => [
                    ['word' => 'メニュー', 'romaji' => 'menyuu', 'meaning' => 'menu'],
                    ['word' => 'メモ', 'romaji' => 'memo', 'meaning' => 'memo / note'],
                ],
            ],
            [
                'character' => 'モ',
                'romaji' => 'mo',
                'meaning' => 'Syllable MO',
                'stroke_count' => 2,
                'jlpt_level' => 5,
                'examples' => [
                    ['word' => 'モーター', 'romaji' => 'mootaa', 'meaning' => 'motor'],
                    ['word' => 'モデル', 'romaji' => 'moderu', 'meaning' => 'model'],
                ],
            ],
               [
                'character' => 'ヤ',
                'romaji' => 'ya',
                'meaning' => 'Syllable YA',
                'stroke_count' => 2,
                'jlpt_level' => 5,
                'examples' => [
                    ['word' => 'ヤマト', 'romaji' => 'yamato', 'meaning' => 'Yamato (name/brand)'],
                    ['word' => 'ヤード', 'romaji' => 'yaado', 'meaning' => 'yard'],
                ],
            ],
            [
                'character' => 'ユ',
                'romaji' => 'yu',
                'meaning' => 'Syllable YU',
                'stroke_count' => 2,
                'jlpt_level' => 5,
                'examples' => [
                    ['word' => 'ユニーク', 'romaji' => 'yuniiku', 'meaning' => 'unique'],
                    ['word' => 'ユーモア', 'romaji' => 'yuumoa', 'meaning' => 'humor'],
                ],
            ],
            [
                'character' => 'ヨ',
                'romaji' => 'yo',
                'meaning' => 'Syllable YO',
                'stroke_count' => 2,
                'jlpt_level' => 5,
                'examples' => [
                    ['word' => 'ヨット', 'romaji' => 'yotto', 'meaning' => 'yacht'],
                    ['word' => 'ヨーロッパ', 'romaji' => 'yooroppa', 'meaning' => 'Europe'],
                ],
            ],
              [
                'character' => 'ラ',
                'romaji' => 'ra',
                'meaning' => 'Syllable RA',
                'stroke_count' => 2,
                'jlpt_level' => 5,
                'examples' => [
                    ['word' => 'ラジオ', 'romaji' => 'rajio', 'meaning' => 'radio'],
                    ['word' => 'ラーメン', 'romaji' => 'raamen', 'meaning' => 'ramen'],
                ],
            ],
            [
                'character' => 'リ',
                'romaji' => 'ri',
                'meaning' => 'Syllable RI',
                'stroke_count' => 2,
                'jlpt_level' => 5,
                'examples' => [
                    ['word' => 'リスト', 'romaji' => 'risuto', 'meaning' => 'list'],
                    ['word' => 'リーダー', 'romaji' => 'riidaa', 'meaning' => 'leader'],
                ],
            ],
            [
                'character' => 'ル',
                'romaji' => 'ru',
                'meaning' => 'Syllable RU',
                'stroke_count' => 2,
                'jlpt_level' => 5,
                'examples' => [
                    ['word' => 'ルール', 'romaji' => 'ruuru', 'meaning' => 'rule'],
                    ['word' => 'ルビー', 'romaji' => 'rubii', 'meaning' => 'ruby'],
                ],
            ],
            [
                'character' => 'レ',
                'romaji' => 're',
                'meaning' => 'Syllable RE',
                'stroke_count' => 1,
                'jlpt_level' => 5,
                'examples' => [
                    ['word' => 'レストラン', 'romaji' => 'resutoran', 'meaning' => 'restaurant'],
                    ['word' => 'レベル', 'romaji' => 'reberu', 'meaning' => 'level'],
                ],
            ],
            [
                'character' => 'ロ',
                'romaji' => 'ro',
                'meaning' => 'Syllable RO',
                'stroke_count' => 2,
                'jlpt_level' => 5,
                'examples' => [
                    ['word' => 'ロボット', 'romaji' => 'robotto', 'meaning' => 'robot'],
                    ['word' => 'ローマ', 'romaji' => 'rooma', 'meaning' => 'Rome'],
                ],
            ],
            [
                'character' => 'ワ',
                'romaji' => 'wa',
                'meaning' => 'Syllable WA',
                'stroke_count' => 2,
                'jlpt_level' => 5,
                'examples' => [
                    ['word' => 'ワイン', 'romaji' => 'wain', 'meaning' => 'wine'],
                    ['word' => 'ワールド', 'romaji' => 'waarudo', 'meaning' => 'world'],
                ],
            ],
            [
                'character' => 'ヲ',
                'romaji' => 'wo',
                'meaning' => 'Syllable WO (used rarely, often as particle in old writing)',
                'stroke_count' => 3,
                'jlpt_level' => 5,
                'examples' => [
                    ['word' => 'ヲタク', 'romaji' => 'wotaku', 'meaning' => 'otaku (slang)'],
                ],
            ],
            [
                'character' => 'ン',
                'romaji' => 'n',
                'meaning' => 'Syllable N',
                'stroke_count' => 2,
                'jlpt_level' => 5,
                'examples' => [
                    ['word' => 'パン', 'romaji' => 'pan', 'meaning' => 'bread'],
                    ['word' => 'ジャパン', 'romaji' => 'japan', 'meaning' => 'Japan'],
                ],
            ],
             [
                'character' => 'ガ',
                'romaji' => 'ga',
                'meaning' => 'Katakana syllable GA',
                'stroke_count' => 3,
                'jlpt_level' => 5,
                'examples' => [
                    ['word' => 'ガラス', 'romaji' => 'garasu', 'meaning' => 'glass'],
                    ['word' => 'ガイド', 'romaji' => 'gaido', 'meaning' => 'guide'],
                ],
            ],
            [
                'character' => 'ギ',
                'romaji' => 'gi',
                'meaning' => 'Katakana syllable GI',
                'stroke_count' => 3,
                'jlpt_level' => 5,
                'examples' => [
                    ['word' => 'ギター', 'romaji' => 'gitaa', 'meaning' => 'guitar'],
                    ['word' => 'ギフト', 'romaji' => 'gifuto', 'meaning' => 'gift'],
                ],
            ],
            [
                'character' => 'グ',
                'romaji' => 'gu',
                'meaning' => 'Katakana syllable GU',
                'stroke_count' => 2,
                'jlpt_level' => 5,
                'examples' => [
                    ['word' => 'グループ', 'romaji' => 'guruupu', 'meaning' => 'group'],
                    ['word' => 'ゲーム', 'romaji' => 'geemu', 'meaning' => 'game'],
                ],
            ],
            [
                'character' => 'ゲ',
                'romaji' => 'ge',
                'meaning' => 'Katakana syllable GE',
                'stroke_count' => 3,
                'jlpt_level' => 5,
                'examples' => [
                    ['word' => 'ゲーム', 'romaji' => 'geemu', 'meaning' => 'game'],
                    ['word' => 'ゲート', 'romaji' => 'geeto', 'meaning' => 'gate'],
                ],
            ],
            [
                'character' => 'ゴ',
                'romaji' => 'go',
                'meaning' => 'Katakana syllable GO',
                'stroke_count' => 3,
                'jlpt_level' => 5,
                'examples' => [
                    ['word' => 'ゴルフ', 'romaji' => 'gorufu', 'meaning' => 'golf'],
                    ['word' => 'ゴミ', 'romaji' => 'gomi', 'meaning' => 'trash'],
                ],
            ],

            // --- ザ行 ---
            [
                'character' => 'ザ',
                'romaji' => 'za',
                'meaning' => 'Katakana syllable ZA',
                'stroke_count' => 3,
                'jlpt_level' => 5,
                'examples' => [
                    ['word' => 'ザ・ワールド', 'romaji' => 'za waarudo', 'meaning' => 'The World'],
                    ['word' => 'ザリガニ', 'romaji' => 'zarigani', 'meaning' => 'crayfish'],
                ],
            ],
            [
                'character' => 'ジ',
                'romaji' => 'ji',
                'meaning' => 'Katakana syllable JI',
                'stroke_count' => 2,
                'jlpt_level' => 5,
                'examples' => [
                    ['word' => 'ジーンズ', 'romaji' => 'jiinzu', 'meaning' => 'jeans'],
                    ['word' => 'ジム', 'romaji' => 'jimu', 'meaning' => 'gym'],
                ],
            ],
            [
                'character' => 'ズ',
                'romaji' => 'zu',
                'meaning' => 'Katakana syllable ZU',
                'stroke_count' => 2,
                'jlpt_level' => 5,
                'examples' => [
                    ['word' => 'ズボン', 'romaji' => 'zubon', 'meaning' => 'trousers'],
                    ['word' => 'サイズ', 'romaji' => 'saizu', 'meaning' => 'size'],
                ],
            ],
            [
                'character' => 'ゼ',
                'romaji' => 'ze',
                'meaning' => 'Katakana syllable ZE',
                'stroke_count' => 3,
                'jlpt_level' => 5,
                'examples' => [
                    ['word' => 'ゼロ', 'romaji' => 'zero', 'meaning' => 'zero'],
                    ['word' => 'ゼミ', 'romaji' => 'zemi', 'meaning' => 'seminar'],
                ],
            ],
            [
                'character' => 'ゾ',
                'romaji' => 'zo',
                'meaning' => 'Katakana syllable ZO',
                'stroke_count' => 3,
                'jlpt_level' => 5,
                'examples' => [
                    ['word' => 'ゾウ', 'romaji' => 'zou', 'meaning' => 'elephant'],
                    ['word' => 'ゾンビ', 'romaji' => 'zonbi', 'meaning' => 'zombie'],
                ],
            ],

            // --- ダ行 ---
            [
                'character' => 'ダ',
                'romaji' => 'da',
                'meaning' => 'Katakana syllable DA',
                'stroke_count' => 3,
                'jlpt_level' => 5,
                'examples' => [
                    ['word' => 'ダンス', 'romaji' => 'dansu', 'meaning' => 'dance'],
                    ['word' => 'ダイヤ', 'romaji' => 'daiya', 'meaning' => 'diamond'],
                ],
            ],
            [
                'character' => 'ヂ',
                'romaji' => 'ji (di)',
                'meaning' => 'Katakana syllable JI (rare, used in names)',
                'stroke_count' => 3,
                'jlpt_level' => 5,
                'examples' => [
                    ['word' => 'ヂヂミ', 'romaji' => 'chijimi/ jijimi', 'meaning' => 'Korean pancake (variant spelling)'],
                ],
            ],
            [
                'character' => 'ヅ',
                'romaji' => 'zu (du)',
                'meaning' => 'Katakana syllable ZU (rare, used in names)',
                'stroke_count' => 3,
                'jlpt_level' => 5,
                'examples' => [
                    ['word' => 'ヅラ', 'romaji' => 'dzura', 'meaning' => 'wig'],
                ],
            ],
            [
                'character' => 'デ',
                'romaji' => 'de',
                'meaning' => 'Katakana syllable DE',
                'stroke_count' => 3,
                'jlpt_level' => 5,
                'examples' => [
                    ['word' => 'データ', 'romaji' => 'deeta', 'meaning' => 'data'],
                    ['word' => 'デパート', 'romaji' => 'depaato', 'meaning' => 'department store'],
                ],
            ],
            [
                'character' => 'ド',
                'romaji' => 'do',
                'meaning' => 'Katakana syllable DO',
                'stroke_count' => 3,
                'jlpt_level' => 5,
                'examples' => [
                    ['word' => 'ドア', 'romaji' => 'doa', 'meaning' => 'door'],
                    ['word' => 'ドリンク', 'romaji' => 'dorinku', 'meaning' => 'drink'],
                ],
            ],

            // --- バ行 ---
            [
                'character' => 'バ',
                'romaji' => 'ba',
                'meaning' => 'Katakana syllable BA',
                'stroke_count' => 3,
                'jlpt_level' => 5,
                'examples' => [
                    ['word' => 'バナナ', 'romaji' => 'banana', 'meaning' => 'banana'],
                    ['word' => 'バス', 'romaji' => 'basu', 'meaning' => 'bus'],
                ],
            ],
            [
                'character' => 'ビ',
                'romaji' => 'bi',
                'meaning' => 'Katakana syllable BI',
                'stroke_count' => 2,
                'jlpt_level' => 5,
                'examples' => [
                    ['word' => 'ビール', 'romaji' => 'biiru', 'meaning' => 'beer'],
                    ['word' => 'ビデオ', 'romaji' => 'bideo', 'meaning' => 'video'],
                ],
            ],
            [
                'character' => 'ブ',
                'romaji' => 'bu',
                'meaning' => 'Katakana syllable BU',
                'stroke_count' => 2,
                'jlpt_level' => 5,
                'examples' => [
                    ['word' => 'ブルー', 'romaji' => 'buruu', 'meaning' => 'blue'],
                    ['word' => 'ブタ', 'romaji' => 'buta', 'meaning' => 'pig'],
                ],
            ],
            [
                'character' => 'ベ',
                'romaji' => 'be',
                'meaning' => 'Katakana syllable BE',
                'stroke_count' => 3,
                'jlpt_level' => 5,
                'examples' => [
                    ['word' => 'ベッド', 'romaji' => 'beddo', 'meaning' => 'bed'],
                    ['word' => 'ベルト', 'romaji' => 'beruto', 'meaning' => 'belt'],
                ],
            ],
            [
                'character' => 'ボ',
                'romaji' => 'bo',
                'meaning' => 'Katakana syllable BO',
                'stroke_count' => 3,
                'jlpt_level' => 5,
                'examples' => [
                    ['word' => 'ボール', 'romaji' => 'booru', 'meaning' => 'ball'],
                    ['word' => 'ボス', 'romaji' => 'bosu', 'meaning' => 'boss'],
                ],
            ],

            // --- パ行 ---
            [
                'character' => 'パ',
                'romaji' => 'pa',
                'meaning' => 'Katakana syllable PA',
                'stroke_count' => 3,
                'jlpt_level' => 5,
                'examples' => [
                    ['word' => 'パン', 'romaji' => 'pan', 'meaning' => 'bread'],
                    ['word' => 'パーティー', 'romaji' => 'paatii', 'meaning' => 'party'],
                ],
            ],
            [
                'character' => 'ピ',
                'romaji' => 'pi',
                'meaning' => 'Katakana syllable PI',
                'stroke_count' => 2,
                'jlpt_level' => 5,
                'examples' => [
                    ['word' => 'ピアノ', 'romaji' => 'piano', 'meaning' => 'piano'],
                    ['word' => 'ピンク', 'romaji' => 'pinku', 'meaning' => 'pink'],
                ],
            ],
            [
                'character' => 'プ',
                'romaji' => 'pu',
                'meaning' => 'Katakana syllable PU',
                'stroke_count' => 2,
                'jlpt_level' => 5,
                'examples' => [
                    ['word' => 'プール', 'romaji' => 'puuru', 'meaning' => 'pool'],
                    ['word' => 'プラン', 'romaji' => 'puran', 'meaning' => 'plan'],
                ],
            ],
            [
                'character' => 'ペ',
                'romaji' => 'pe',
                'meaning' => 'Katakana syllable PE',
                'stroke_count' => 3,
                'jlpt_level' => 5,
                'examples' => [
                    ['word' => 'ペン', 'romaji' => 'pen', 'meaning' => 'pen'],
                    ['word' => 'ペット', 'romaji' => 'petto', 'meaning' => 'pet'],
                ],
            ],
            [
                'character' => 'ポ',
                'romaji' => 'po',
                'meaning' => 'Katakana syllable PO',
                'stroke_count' => 3,
                'jlpt_level' => 5,
                'examples' => [
                    ['word' => 'ポスト', 'romaji' => 'posuto', 'meaning' => 'post, mailbox'],
                    ['word' => 'ポケット', 'romaji' => 'poketto', 'meaning' => 'pocket'],
                ],
            ],
        ];

          // Insert Hiragana
        foreach ($hiragana as $char) {
            DB::table('japanese_characters')->insert([
                'character' => $char['character'],
                'romaji' => $char['romaji'],
                'meaning' => $char['meaning'],
                'stroke_count' => $char['stroke_count'],
                'jlpt_level' => $char['jlpt_level'],
                'examples' => json_encode($char['examples'], JSON_UNESCAPED_UNICODE),
                'type' => 'hiragana', // Pastikan type di-set
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // Insert Katakana
        foreach ($katakana as $char) {
            DB::table('japanese_characters')->insert([
                'character' => $char['character'],
                'romaji' => $char['romaji'],
                'meaning' => $char['meaning'],
                'stroke_count' => $char['stroke_count'],
                'jlpt_level' => $char['jlpt_level'],
                'examples' => json_encode($char['examples'], JSON_UNESCAPED_UNICODE),
                'type' => 'katakana', // Pastikan type di-set
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

