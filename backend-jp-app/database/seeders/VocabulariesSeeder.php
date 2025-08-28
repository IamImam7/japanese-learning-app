<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class VocabulariesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
   public function run()
    {
        // Data Kosakata Dasar (JLPT N5 dan N4)
        $vocabularies = [
            // Keluarga dan Orang
            ['word' => '家族', 'reading' => 'かぞく', 'meaning' => 'keluarga', 'category' => 'noun', 'jlpt_level' => 5],
            ['word' => '父', 'reading' => 'ちち', 'meaning' => 'ayah (saat berbicara tentang sendiri)', 'category' => 'noun', 'jlpt_level' => 5],
            ['word' => '母', 'reading' => 'はは', 'meaning' => 'ibu (saat berbicara tentang sendiri)', 'category' => 'noun', 'jlpt_level' => 5],
            ['word' => 'お父さん', 'reading' => 'おとうさん', 'meaning' => 'ayah (saat menyapa atau tentang orang lain)', 'category' => 'noun', 'jlpt_level' => 5],
            ['word' => 'お母さん', 'reading' => 'おかあさん', 'meaning' => 'ibu (saat menyapa atau tentang orang lain)', 'category' => 'noun', 'jlpt_level' => 5],
            ['word' => '兄弟', 'reading' => 'きょうだい', 'meaning' => 'saudara kandung', 'category' => 'noun', 'jlpt_level' => 5],
            ['word' => '友達', 'reading' => 'ともだち', 'meaning' => 'teman', 'category' => 'noun', 'jlpt_level' => 5],
            ['word' => '先生', 'reading' => 'せんせい', 'meaning' => 'guru', 'category' => 'noun', 'jlpt_level' => 5],
            ['word' => '学生', 'reading' => 'がくせい', 'meaning' => 'pelajar/mahasiswa', 'category' => 'noun', 'jlpt_level' => 5],

            // Tempat
            ['word' => '家', 'reading' => 'いえ', 'meaning' => 'rumah', 'category' => 'noun', 'jlpt_level' => 5],
            ['word' => '学校', 'reading' => 'がっこう', 'meaning' => 'sekolah', 'category' => 'noun', 'jlpt_level' => 5],
            ['word' => '会社', 'reading' => 'かいしゃ', 'meaning' => 'perusahaan', 'category' => 'noun', 'jlpt_level' => 5],
            ['word' => '店', 'reading' => 'みせ', 'meaning' => 'toko', 'category' => 'noun', 'jlpt_level' => 5],
            ['word' => '駅', 'reading' => 'えき', 'meaning' => 'stasiun', 'category' => 'noun', 'jlpt_level' => 5],
            ['word' => '空港', 'reading' => 'くうこう', 'meaning' => 'bandara', 'category' => 'noun', 'jlpt_level' => 5],
            ['word' => '図書館', 'reading' => 'としょかん', 'meaning' => 'perpustakaan', 'category' => 'noun', 'jlpt_level' => 5],
            ['word' => '公園', 'reading' => 'こうえん', 'meaning' => 'taman', 'category' => 'noun', 'jlpt_level' => 5],

            // Makanan
            ['word' => '食べ物', 'reading' => 'たべもの', 'meaning' => 'makanan', 'category' => 'noun', 'jlpt_level' => 5],
            ['word' => '飲み物', 'reading' => 'のみもの', 'meaning' => 'minuman', 'category' => 'noun', 'jlpt_level' => 5],
            ['word' => '水', 'reading' => 'みず', 'meaning' => 'air', 'category' => 'noun', 'jlpt_level' => 5],
            ['word' => 'お茶', 'reading' => 'おちゃ', 'meaning' => 'teh', 'category' => 'noun', 'jlpt_level' => 5],
            ['word' => 'コーヒー', 'reading' => 'コーヒー', 'meaning' => 'kopi', 'category' => 'noun', 'jlpt_level' => 5],
            ['word' => 'ご飯', 'reading' => 'ごはん', 'meaning' => 'nasi/makanan', 'category' => 'noun', 'jlpt_level' => 5],
            ['word' => 'パン', 'reading' => 'パン', 'meaning' => 'roti', 'category' => 'noun', 'jlpt_level' => 5],
            ['word' => '果物', 'reading' => 'くだもの', 'meaning' => 'buah', 'category' => 'noun', 'jlpt_level' => 5],
            ['word' => '肉', 'reading' => 'にく', 'meaning' => 'daging', 'category' => 'noun', 'jlpt_level' => 5],
            ['word' => '魚', 'reading' => 'さかな', 'meaning' => 'ikan', 'category' => 'noun', 'jlpt_level' => 5],

            // Kata Kerja Dasar
            ['word' => '行く', 'reading' => 'いく', 'meaning' => 'pergi', 'category' => 'verb', 'jlpt_level' => 5],
            ['word' => '来る', 'reading' => 'くる', 'meaning' => 'datang', 'category' => 'verb', 'jlpt_level' => 5],
            ['word' => '帰る', 'reading' => 'かえる', 'meaning' => 'pulang', 'category' => 'verb', 'jlpt_level' => 5],
            ['word' => '食べる', 'reading' => 'たべる', 'meaning' => 'makan', 'category' => 'verb', 'jlpt_level' => 5],
            ['word' => '飲む', 'reading' => 'のむ', 'meaning' => 'minum', 'category' => 'verb', 'jlpt_level' => 5],
            ['word' => '見る', 'reading' => 'みる', 'meaning' => 'melihat', 'category' => 'verb', 'jlpt_level' => 5],
            ['word' => '聞く', 'reading' => 'きく', 'meaning' => 'mendengar', 'category' => 'verb', 'jlpt_level' => 5],
            ['word' => '話す', 'reading' => 'はなす', 'meaning' => 'berbicara', 'category' => 'verb', 'jlpt_level' => 5],
            ['word' => '読む', 'reading' => 'よむ', 'meaning' => 'membaca', 'category' => 'verb', 'jlpt_level' => 5],
            ['word' => '書く', 'reading' => 'かく', 'meaning' => 'menulis', 'category' => 'verb', 'jlpt_level' => 5],
            ['word' => '買う', 'reading' => 'かう', 'meaning' => 'membeli', 'category' => 'verb', 'jlpt_level' => 5],
            ['word' => '売る', 'reading' => 'うる', 'meaning' => 'menjual', 'category' => 'verb', 'jlpt_level' => 5],
            ['word' => '会う', 'reading' => 'あう', 'meaning' => 'bertemu', 'category' => 'verb', 'jlpt_level' => 5],
            ['word' => '勉強する', 'reading' => 'べんきょうする', 'meaning' => 'belajar', 'category' => 'verb', 'jlpt_level' => 5],
            ['word' => '働く', 'reading' => 'はたらく', 'meaning' => 'bekerja', 'category' => 'verb', 'jlpt_level' => 5],
            ['word' => '休む', 'reading' => 'やすむ', 'meaning' => 'beristirahat', 'category' => 'verb', 'jlpt_level' => 5],

            // Kata Sifat
            ['word' => '大きい', 'reading' => 'おおきい', 'meaning' => 'besar', 'category' => 'adjective', 'jlpt_level' => 5],
            ['word' => '小さい', 'reading' => 'ちいさい', 'meaning' => 'kecil', 'category' => 'adjective', 'jlpt_level' => 5],
            ['word' => '新しい', 'reading' => 'あたらしい', 'meaning' => 'baru', 'category' => 'adjective', 'jlpt_level' => 5],
            ['word' => '古い', 'reading' => 'ふるい', 'meaning' => 'lama', 'category' => 'adjective', 'jlpt_level' => 5],
            ['word' => 'いい/良い', 'reading' => 'いい/よい', 'meaning' => 'bagus', 'category' => 'adjective', 'jlpt_level' => 5],
            ['word' => '悪い', 'reading' => 'わるい', 'meaning' => 'buruk', 'category' => 'adjective', 'jlpt_level' => 5],
            ['word' => '暑い', 'reading' => 'あつい', 'meaning' => 'panas (cuaca)', 'category' => 'adjective', 'jlpt_level' => 5],
            ['word' => '寒い', 'reading' => 'さむい', 'meaning' => 'dingin (cuaca)', 'category' => 'adjective', 'jlpt_level' => 5],
            ['word' => '熱い', 'reading' => 'あつい', 'meaning' => 'panas (benda)', 'category' => 'adjective', 'jlpt_level' => 5],
            ['word' => '冷たい', 'reading' => 'つめたい', 'meaning' => 'dingin (benda)', 'category' => 'adjective', 'jlpt_level' => 5],
            ['word' => '難しい', 'reading' => 'むずかしい', 'meaning' => 'sulit', 'category' => 'adjective', 'jlpt_level' => 5],
            ['word' => '易しい', 'reading' => 'やさしい', 'meaning' => 'mudah', 'category' => 'adjective', 'jlpt_level' => 5],
            ['word' => '高い', 'reading' => 'たかい', 'meaning' => 'tinggi/mahal', 'category' => 'adjective', 'jlpt_level' => 5],
            ['word' => '安い', 'reading' => 'やすい', 'meaning' => 'murah', 'category' => 'adjective', 'jlpt_level' => 5],
            ['word' => '楽しい', 'reading' => 'たのしい', 'meaning' => 'menyenangkan', 'category' => 'adjective', 'jlpt_level' => 5],
            ['word' => '悲しい', 'reading' => 'かなしい', 'meaning' => 'sedih', 'category' => 'adjective', 'jlpt_level' => 5],

            // Warna
            ['word' => '色', 'reading' => 'いろ', 'meaning' => 'warna', 'category' => 'noun', 'jlpt_level' => 5],
            ['word' => '赤', 'reading' => 'あか', 'meaning' => 'merah', 'category' => 'noun', 'jlpt_level' => 5],
            ['word' => '青', 'reading' => 'あお', 'meaning' => 'biru', 'category' => 'noun', 'jlpt_level' => 5],
            ['word' => '緑', 'reading' => 'みどり', 'meaning' => 'hijau', 'category' => 'noun', 'jlpt_level' => 5],
            ['word' => '白', 'reading' => 'しろ', 'meaning' => 'putih', 'category' => 'noun', 'jlpt_level' => 5],
            ['word' => '黒', 'reading' => 'くろ', 'meaning' => 'hitam', 'category' => 'noun', 'jlpt_level' => 5],

            // Angka
            ['word' => '一', 'reading' => 'いち', 'meaning' => 'satu', 'category' => 'number', 'jlpt_level' => 5],
            ['word' => '二', 'reading' => 'に', 'meaning' => 'dua', 'category' => 'number', 'jlpt_level' => 5],
            ['word' => '三', 'reading' => 'さん', 'meaning' => 'tiga', 'category' => 'number', 'jlpt_level' => 5],
            ['word' => '四', 'reading' => 'よん/し', 'meaning' => 'empat', 'category' => 'number', 'jlpt_level' => 5],
            ['word' => '五', 'reading' => 'ご', 'meaning' => 'lima', 'category' => 'number', 'jlpt_level' => 5],
            ['word' => '六', 'reading' => 'ろく', 'meaning' => 'enam', 'category' => 'number', 'jlpt_level' => 5],
            ['word' => '七', 'reading' => 'なな/しち', 'meaning' => 'tujuh', 'category' => 'number', 'jlpt_level' => 5],
            ['word' => '八', 'reading' => 'はち', 'meaning' => 'delapan', 'category' => 'number', 'jlpt_level' => 5],
            ['word' => '九', 'reading' => 'きゅう/く', 'meaning' => 'sembilan', 'category' => 'number', 'jlpt_level' => 5],
            ['word' => '十', 'reading' => 'じゅう', 'meaning' => 'sepuluh', 'category' => 'number', 'jlpt_level' => 5],

            // Waktu
            ['word' => '時間', 'reading' => 'じかん', 'meaning' => 'waktu', 'category' => 'noun', 'jlpt_level' => 5],
            ['word' => '今日', 'reading' => 'きょう', 'meaning' => 'hari ini', 'category' => 'noun', 'jlpt_level' => 5],
            ['word' => '明日', 'reading' => 'あした', 'meaning' => 'besok', 'category' => 'noun', 'jlpt_level' => 5],
            ['word' => '昨日', 'reading' => 'きのう', 'meaning' => 'kemarin', 'category' => 'noun', 'jlpt_level' => 5],
            ['word' => '今', 'reading' => 'いま', 'meaning' => 'sekarang', 'category' => 'noun', 'jlpt_level' => 5],
            ['word' => '年', 'reading' => 'とし/ねん', 'meaning' => 'tahun', 'category' => 'noun', 'jlpt_level' => 5],
            ['word' => '月', 'reading' => 'つき/がつ', 'meaning' => 'bulan', 'category' => 'noun', 'jlpt_level' => 5],
            ['word' => '日', 'reading' => 'ひ/にち', 'meaning' => 'hari', 'category' => 'noun', 'jlpt_level' => 5],
            ['word' => '週間', 'reading' => 'しゅうかん', 'meaning' => 'minggu', 'category' => 'noun', 'jlpt_level' => 5],
            ['word' => '時', 'reading' => 'とき/じ', 'meaning' => 'waktu/jam', 'category' => 'noun', 'jlpt_level' => 5],
            ['word' => '分', 'reading' => 'ふん/ぷん', 'meaning' => 'menit', 'category' => 'noun', 'jlpt_level' => 5],
            ['word' => '秒', 'reading' => 'びょう', 'meaning' => 'detik', 'category' => 'noun', 'jlpt_level' => 5],

            // Arah
            ['word' => '上', 'reading' => 'うえ', 'meaning' => 'atas', 'category' => 'noun', 'jlpt_level' => 5],
            ['word' => '下', 'reading' => 'した', 'meaning' => 'bawah', 'category' => 'noun', 'jlpt_level' => 5],
            ['word' => '左', 'reading' => 'ひだり', 'meaning' => 'kiri', 'category' => 'noun', 'jlpt_level' => 5],
            ['word' => '右', 'reading' => 'みぎ', 'meaning' => 'kanan', 'category' => 'noun', 'jlpt_level' => 5],
            ['word' => '前', 'reading' => 'まえ', 'meaning' => 'depan', 'category' => 'noun', 'jlpt_level' => 5],
            ['word' => '後', 'reading' => 'うしろ', 'meaning' => 'belakang', 'category' => 'noun', 'jlpt_level' => 5],
            ['word' => '中', 'reading' => 'なか', 'meaning' => 'dalam', 'category' => 'noun', 'jlpt_level' => 5],
            ['word' => '外', 'reading' => 'そと', 'meaning' => 'luar', 'category' => 'noun', 'jlpt_level' => 5],

            // Kata Tanya
            ['word' => '何', 'reading' => 'なに/なん', 'meaning' => 'apa', 'category' => 'question', 'jlpt_level' => 5],
            ['word' => '誰', 'reading' => 'だれ', 'meaning' => 'siapa', 'category' => 'question', 'jlpt_level' => 5],
            ['word' => 'どこ', 'reading' => 'どこ', 'meaning' => 'di mana', 'category' => 'question', 'jlpt_level' => 5],
            ['word' => 'いつ', 'reading' => 'いつ', 'meaning' => 'kapan', 'category' => 'question', 'jlpt_level' => 5],
            ['word' => 'なぜ', 'reading' => 'なぜ', 'meaning' => 'mengapa', 'category' => 'question', 'jlpt_level' => 5],
            ['word' => 'どう', 'reading' => 'どう', 'meaning' => 'bagaimana', 'category' => 'question', 'jlpt_level' => 5],
            ['word' => 'どれ', 'reading' => 'どれ', 'meaning' => 'yang mana', 'category' => 'question', 'jlpt_level' => 5],
        ];

        foreach ($vocabularies as $vocab) {
            DB::table('vocabularies')->insert([
                'word' => $vocab['word'],
                'reading' => $vocab['reading'],
                'meaning' => $vocab['meaning'],
                'category' => $vocab['category'],
                'jlpt_level' => $vocab['jlpt_level'],
                'example_sentence' => null,
                'related_kanji' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
