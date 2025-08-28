<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StrokeOrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $hiraganaCharacters = [
    'あ','い','う','え','お',
    'か','き','く','け','こ',
    'さ','し','す','せ','そ',
    'た','ち','つ','て','と',
    'な','に','ぬ','ね','の',
    'は','ひ','ふ','へ','ほ',
    'ま','み','む','め','も',
    'や','ゆ','よ',
    'ら','り','る','れ','ろ',
    'わ','を','ん',
    // kalau mau tambahin dakuten/handakuten:
    'が','ぎ','ぐ','げ','ご',
    'ざ','じ','ず','ぜ','ぞ',
    'だ','ぢ','づ','で','ど',
    'ば','び','ぶ','べ','ぼ',
    'ぱ','ぴ','ぷ','ぺ','ぽ',
];

$hiraganaStrokeOrders = [];

// --- Katakana ---
$katakanaCharacters = [
    'ア','イ','ウ','エ','オ',
    'カ','キ','ク','ケ','コ',
    'サ','シ','ス','セ','ソ',
    'タ','チ','ツ','テ','ト',
    'ナ','ニ','ヌ','ネ','ノ',
    'ハ','ヒ','フ','ヘ','ホ',
    'マ','ミ','ム','メ','モ',
    'ヤ','ユ','ヨ',
    'ラ','リ','ル','レ','ロ',
    'ワ','ヲ','ン',
    // dakuten / handakuten
    'ガ','ギ','グ','ゲ','ゴ',
    'ザ','ジ','ズ','ゼ','ゾ',
    'ダ','ヂ','ヅ','デ','ド',
    'バ','ビ','ブ','ベ','ボ',
    'パ','ピ','プ','ペ','ポ',
];

// --- Kanji ---
$kanjiCharacters = [
    "安","一","飲","右","雨","駅","円","音","下","何",
    "花","会","外","学","間","帰","気","休","金","九",
    "空","月","犬","見","言","五","午","後","語","口",
    "校","行","高","国","今","左","三","山","四","子",
    "市","字","時","耳","七","社","車","手","週","十",
    "出","書","女","小","上","食","人","生","西","先",
    "千","川","前","早","草","足","村","大","男","中",
    "昼","虫","朝","町","天","店","田","電","土","東",
    "道","読","南","二","日","入","年","買","白","八",
    "晩","百","父","文","聞","母","北","本","毎","万",
    "名","木","目","夜","友","来","立","力","林","六",
    "話"
];

$katakanaStrokeOrders = [];
foreach ($katakanaCharacters as $char) {
    $katakanaStrokeOrders[$char] = "https://raw.githubusercontent.com/IamImam7/kanji.gif/master/katakana/gif/150x150/{$char}.gif";
}


foreach ($hiraganaCharacters as $char) {
    $hiraganaStrokeOrders[$char] = "https://raw.githubusercontent.com/IamImam7/kanji.gif/master/hiragana/gif/150x150/{$char}.gif";
}

$kanjiStrokeOrders = [];
foreach ($kanjiCharacters as $char) {
    $kanjiStrokeOrders[$char] = "https://raw.githubusercontent.com/IamImam7/kanji.gif/master/kanji/gif/150x150/{$char}.gif";
}


// lalu update ke DB
foreach ($hiraganaStrokeOrders as $character => $strokeOrder) {
    DB::table('japanese_characters')
        ->where('character', $character)
        ->where('type', 'hiragana')
        ->update(['stroke_order' => $strokeOrder]);
}
    foreach ($katakanaStrokeOrders as $character => $strokeOrder) {
    DB::table('japanese_characters')
        ->where('character', $character)
        ->where('type', 'katakana')
        ->update(['stroke_order' => $strokeOrder]);
}
foreach ($kanjiStrokeOrders as $character => $strokeOrder) {
    DB::table('japanese_characters')
        ->where('character', $character)
        ->where('type', 'kanji')
        ->update(['stroke_order' => $strokeOrder]);
}
$this->command->info('Stroke order data has been added successfully!');
    }
}
