<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\JapaneseCharacter;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KanjiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Data Kanji JLPT N5 (sekitar 80 kanji dasar)
        $kanji = [
            ['character' => '一', 'romaji' => 'ichi', 'meaning' => 'satu', 'stroke_count' => 1, 'jlpt_level' => 5, 'examples' => ['一人 (ひとり): satu orang', '一つ (ひとつ): satu benda']],
            ['character' => '二', 'romaji' => 'ni', 'meaning' => 'dua', 'stroke_count' => 2, 'jlpt_level' => 5, 'examples' => ['二つ (ふたつ): dua benda', '二日 (ふつか): hari kedua']],
            ['character' => '三', 'romaji' => 'san', 'meaning' => 'tiga', 'stroke_count' => 3, 'jlpt_level' => 5, 'examples' => ['三つ (みっつ): tiga benda', '三日 (みっか): hari ketiga']],
            ['character' => '四', 'romaji' => 'shi/yon', 'meaning' => 'empat', 'stroke_count' => 5, 'jlpt_level' => 5, 'examples' => ['四つ (よっつ): empat benda', '四日 (よっか): hari keempat']],
            ['character' => '五', 'romaji' => 'go', 'meaning' => 'lima', 'stroke_count' => 4, 'jlpt_level' => 5, 'examples' => ['五つ (いつつ): lima benda', '五日 (いつか): hari kelima']],
            ['character' => '六', 'romaji' => 'roku', 'meaning' => 'enam', 'stroke_count' => 4, 'jlpt_level' => 5, 'examples' => ['六つ (むっつ): enam benda', '六日 (むいか): hari keenam']],
            ['character' => '七', 'romaji' => 'shichi/nana', 'meaning' => 'tujuh', 'stroke_count' => 2, 'jlpt_level' => 5, 'examples' => ['七つ (ななつ): tujuh benda', '七日 (なのか): hari ketujuh']],
            ['character' => '八', 'romaji' => 'hachi', 'meaning' => 'delapan', 'stroke_count' => 2, 'jlpt_level' => 5, 'examples' => ['八つ (やっつ): delapan benda', '八日 (ようか): hari kedelapan']],
            ['character' => '九', 'romaji' => 'kyū/ku', 'meaning' => 'sembilan', 'stroke_count' => 2, 'jlpt_level' => 5, 'examples' => ['九つ (ここのつ): sembilan benda', '九日 (ここのか): hari kesembilan']],
            ['character' => '十', 'romaji' => 'jū', 'meaning' => 'sepuluh', 'stroke_count' => 2, 'jlpt_level' => 5, 'examples' => ['十 (とお): sepuluh benda', '十日 (とおか): hari kesepuluh']],
            ['character' => '百', 'romaji' => 'hyaku', 'meaning' => 'seratus', 'stroke_count' => 6, 'jlpt_level' => 5, 'examples' => ['百円 (ひゃくえん): 100 yen']],
            ['character' => '千', 'romaji' => 'sen', 'meaning' => 'seribu', 'stroke_count' => 3, 'jlpt_level' => 5, 'examples' => ['千円 (せんえん): 1,000 yen']],
            ['character' => '万', 'romaji' => 'man', 'meaning' => 'sepuluh ribu', 'stroke_count' => 3, 'jlpt_level' => 5, 'examples' => ['一万円 (いちまんえん): 10,000 yen']],
            ['character' => '円', 'romaji' => 'en', 'meaning' => 'yen, lingkaran', 'stroke_count' => 4, 'jlpt_level' => 5, 'examples' => ['五百円 (ごひゃくえん): 500 yen']],
            ['character' => '時', 'romaji' => 'ji/toki', 'meaning' => 'waktu, jam', 'stroke_count' => 10, 'jlpt_level' => 5, 'examples' => ['時間 (じかん): waktu', '何時 (なんじ): jam berapa?']],
            ['character' => '間', 'romaji' => 'kan/ken/ma', 'meaning' => 'interval, ruang', 'stroke_count' => 12, 'jlpt_level' => 5, 'examples' => ['人間 (にんげん): manusia', '時間 (じかん): waktu']],
            ['character' => '上', 'romaji' => 'jō/uē/kami', 'meaning' => 'atas, naik', 'stroke_count' => 3, 'jlpt_level' => 5, 'examples' => ['上 (うえ): di atas', '上手 (じょうず): pandai']],
            ['character' => '下', 'romaji' => 'ka/ge/shita', 'meaning' => 'bawah, turun', 'stroke_count' => 3, 'jlpt_level' => 5, 'examples' => ['下 (した): di bawah', '下手 (へた): tidak pandai']],
            ['character' => '左', 'romaji' => 'sa/hidari', 'meaning' => 'kiri', 'stroke_count' => 5, 'jlpt_level' => 5, 'examples' => ['左手 (ひだりて): tangan kiri']],
            ['character' => '右', 'romaji' => 'yū/migi', 'meaning' => 'kanan', 'stroke_count' => 5, 'jlpt_level' => 5, 'examples' => ['右手 (みぎて): tangan kanan']],
            ['character' => '中', 'romaji' => 'chū/naka', 'meaning' => 'tengah, dalam', 'stroke_count' => 4, 'jlpt_level' => 5, 'examples' => ['中 (なか): di dalam', '一日中 (いちにちじゅう): sepanjang hari']],
            ['character' => '大', 'romaji' => 'dai/ōkii', 'meaning' => 'besar', 'stroke_count' => 3, 'jlpt_level' => 5, 'examples' => ['大学 (だいがく): universitas', '大きい (おおきい): besar']],
            ['character' => '小', 'romaji' => 'shō/chīsai', 'meaning' => 'kecil', 'stroke_count' => 3, 'jlpt_level' => 5, 'examples' => ['小さい (ちいさい): kecil', '小学校 (しょうがっこう): sekolah dasar']],
            ['character' => '月', 'romaji' => 'gatsu/tsuki', 'meaning' => 'bulan', 'stroke_count' => 4, 'jlpt_level' => 5, 'examples' => ['一月 (いちがつ): Januari', '月曜日 (げつようび): hari Senin']],
            ['character' => '日', 'romaji' => 'nichi/hi', 'meaning' => 'hari, matahari', 'stroke_count' => 4, 'jlpt_level' => 5, 'examples' => ['日曜日 (にちようび): hari Minggu', '日本 (にほん): Jepang']],
            ['character' => '年', 'romaji' => 'nen/toshi', 'meaning' => 'tahun', 'stroke_count' => 6, 'jlpt_level' => 5, 'examples' => ['来年 (らいねん): tahun depan', '今年 (ことし): tahun ini']],
            ['character' => '早', 'romaji' => 'sō/hayai', 'meaning' => 'awal, cepat', 'stroke_count' => 6, 'jlpt_level' => 5, 'examples' => ['早い (はやい): cepat/awal']],
            ['character' => '木', 'romaji' => 'moku/ki', 'meaning' => 'pohon, kayu', 'stroke_count' => 4, 'jlpt_level' => 5, 'examples' => ['木 (き): pohon', '木曜日 (もくようび): hari Kamis']],
            ['character' => '林', 'romaji' => 'rin/hayashi', 'meaning' => 'hutan', 'stroke_count' => 8, 'jlpt_level' => 5, 'examples' => ['森林 (しんりん): hutan (besar)']],
            ['character' => '山', 'romaji' => 'san/yama', 'meaning' => 'gunung', 'stroke_count' => 3, 'jlpt_level' => 5, 'examples' => ['山 (やま): gunung', '富士山 (ふじさん): Gunung Fuji']],
            ['character' => '川', 'romaji' => 'sen/kawa', 'meaning' => 'sungai', 'stroke_count' => 3, 'jlpt_level' => 5, 'examples' => ['川 (かわ): sungai', '小川 (おがわ): sungai kecil']],
            ['character' => '土', 'romaji' => 'do/tsuchi', 'meaning' => 'tanah', 'stroke_count' => 3, 'jlpt_level' => 5, 'examples' => ['土曜日 (どようび): hari Sabtu']],
            ['character' => '空', 'romaji' => 'kū/sora', 'meaning' => 'langit, kosong', 'stroke_count' => 8, 'jlpt_level' => 5, 'examples' => ['空気 (くうき): udara', '空 (そら): langit']],
            ['character' => '田', 'romaji' => 'den/ta', 'meaning' => 'sawah', 'stroke_count' => 5, 'jlpt_level' => 5, 'examples' => ['山田 (やまだ): nama keluarga']],
            ['character' => '天', 'romaji' => 'ten/ama', 'meaning' => 'surga, langit', 'stroke_count' => 4, 'jlpt_level' => 5, 'examples' => ['天気 (てんき): cuaca']],
            ['character' => '生', 'romaji' => 'sei/ikiru/umareru', 'meaning' => 'hidup, lahir', 'stroke_count' => 5, 'jlpt_level' => 5, 'examples' => ['先生 (せんせい): guru', '生きる (いきる): hidup']],
            ['character' => '花', 'romaji' => 'ka/hana', 'meaning' => 'bunga', 'stroke_count' => 7, 'jlpt_level' => 5, 'examples' => ['花 (はな): bunga', '花見 (はなみ): melihat bunga sakura']],
            ['character' => '草', 'romaji' => 'sō/kusa', 'meaning' => 'rumput', 'stroke_count' => 9, 'jlpt_level' => 5, 'examples' => ['草 (くさ): rumput']],
            ['character' => '虫', 'romaji' => 'chū/mushi', 'meaning' => 'serangga', 'stroke_count' => 6, 'jlpt_level' => 5, 'examples' => ['虫 (むし): serangga']],
            ['character' => '犬', 'romaji' => 'ken/inu', 'meaning' => 'anjing', 'stroke_count' => 4, 'jlpt_level' => 5, 'examples' => ['犬 (いぬ): anjing']],
            ['character' => '人', 'romaji' => 'jin/nin/hito', 'meaning' => 'orang', 'stroke_count' => 2, 'jlpt_level' => 5, 'examples' => ['日本人 (にほんじん): orang Jepang', '一人 (ひとり): satu orang']],
            ['character' => '男', 'romaji' => 'dan/nan/otoko', 'meaning' => 'pria', 'stroke_count' => 7, 'jlpt_level' => 5, 'examples' => ['男 (おとこ): pria']],
            ['character' => '女', 'romaji' => 'jo/nyo/onna', 'meaning' => 'wanita', 'stroke_count' => 3, 'jlpt_level' => 5, 'examples' => ['女 (おんな): wanita', '彼女 (かのじょ): dia (perempuan)']],
            ['character' => '子', 'romaji' => 'shi/ko', 'meaning' => 'anak', 'stroke_count' => 3, 'jlpt_level' => 5, 'examples' => ['子供 (こども): anak', '男子 (だんし): anak laki-laki']],
            ['character' => '目', 'romaji' => 'moku/me', 'meaning' => 'mata', 'stroke_count' => 5, 'jlpt_level' => 5, 'examples' => ['目 (め): mata']],
            ['character' => '耳', 'romaji' => 'ji/mimi', 'meaning' => 'telinga', 'stroke_count' => 6, 'jlpt_level' => 5, 'examples' => ['耳 (みみ): telinga']],
            ['character' => '口', 'romaji' => 'kō/kuchi', 'meaning' => 'mulut', 'stroke_count' => 3, 'jlpt_level' => 5, 'examples' => ['口 (くち): mulut']],
            ['character' => '手', 'romaji' => 'shu/te', 'meaning' => 'tangan', 'stroke_count' => 4, 'jlpt_level' => 5, 'examples' => ['手 (て): tangan', '上手 (じょうず): pandai']],
            ['character' => '足', 'romaji' => 'soku/ashi', 'meaning' => 'kaki', 'stroke_count' => 7, 'jlpt_level' => 5, 'examples' => ['足 (あし): kaki']],
            ['character' => '見', 'romaji' => 'ken/miru', 'meaning' => 'melihat', 'stroke_count' => 7, 'jlpt_level' => 5, 'examples' => ['見る (みる): melihat', '見学 (けんがく): tur/observasi']],
            ['character' => '音', 'romaji' => 'on/oto', 'meaning' => 'suara', 'stroke_count' => 9, 'jlpt_level' => 5, 'examples' => ['音 (おと): suara', '音楽 (おんがく): musik']],
            ['character' => '力', 'romaji' => 'ryoku/chikara', 'meaning' => 'kekuatan', 'stroke_count' => 2, 'jlpt_level' => 5, 'examples' => ['力 (ちから): kekuatan']],
            ['character' => '気', 'romaji' => 'ki/ke', 'meaning' => 'energi, semangat', 'stroke_count' => 6, 'jlpt_level' => 5, 'examples' => ['元気 (げんき): sehat/enerjik', '天気 (てんき): cuaca']],
            ['character' => '名', 'romaji' => 'mei/na', 'meaning' => 'nama', 'stroke_count' => 6, 'jlpt_level' => 5, 'examples' => ['名前 (なまえ): nama', '有名 (ゆうめい): terkenal']],
            ['character' => '白', 'romaji' => 'haku/shiro', 'meaning' => 'putih', 'stroke_count' => 5, 'jlpt_level' => 5, 'examples' => ['白い (しろい): putih']],
            ['character' => '雨', 'romaji' => 'u/ame', 'meaning' => 'hujan', 'stroke_count' => 8, 'jlpt_level' => 5, 'examples' => ['雨 (あめ): hujan', '大雨 (おおあめ): hujan deras']],
            ['character' => '電', 'romaji' => 'den', 'meaning' => 'listrik', 'stroke_count' => 13, 'jlpt_level' => 5, 'examples' => ['電車 (でんしゃ): kereta listrik', '電話 (でんわ): telepon']],
            ['character' => '車', 'romaji' => 'sha/kuruma', 'meaning' => 'mobil', 'stroke_count' => 7, 'jlpt_level' => 5, 'examples' => ['車 (くるま): mobil', '電車 (でんしゃ): kereta listrik']],
            ['character' => '語', 'romaji' => 'go/kataru', 'meaning' => 'bahasa, kata', 'stroke_count' => 14, 'jlpt_level' => 5, 'examples' => ['日本語 (にほんご): bahasa Jepang']],
            ['character' => '文', 'romaji' => 'bun/mon/fumi', 'meaning' => 'tulisan, kalimat', 'stroke_count' => 4, 'jlpt_level' => 5, 'examples' => ['文 (ぶん): kalimat', '文学 (ぶんがく): sastra']],
            ['character' => '字', 'romaji' => 'ji/aza', 'meaning' => 'karakter, huruf', 'stroke_count' => 6, 'jlpt_level' => 5, 'examples' => ['漢字 (かんじ): kanji', 'ローマ字 (ろーまじ): romaji']],
            ['character' => '学', 'romaji' => 'gaku/manabu', 'meaning' => 'belajar', 'stroke_count' => 8, 'jlpt_level' => 5, 'examples' => ['学校 (がっこう): sekolah', '学生 (がくせい): siswa']],
            ['character' => '校', 'romaji' => 'kō', 'meaning' => 'sekolah', 'stroke_count' => 10, 'jlpt_level' => 5, 'examples' => ['学校 (がっこう): sekolah', '高校 (こうこう): SMA']],
            ['character' => '町', 'romaji' => 'chō/machi', 'meaning' => 'kota, distrik', 'stroke_count' => 7, 'jlpt_level' => 5, 'examples' => ['町 (まち): kota']],
            ['character' => '村', 'romaji' => 'son/mura', 'meaning' => 'desa', 'stroke_count' => 7, 'jlpt_level' => 5, 'examples' => ['村 (むら): desa']],
            ['character' => '市', 'romaji' => 'shi/ichi', 'meaning' => 'kota, pasar', 'stroke_count' => 5, 'jlpt_level' => 5, 'examples' => ['市役所 (しやくしょ): balai kota']],
            ['character' => '会', 'romaji' => 'kai/au', 'meaning' => 'bertemu, pertemuan', 'stroke_count' => 6, 'jlpt_level' => 5, 'examples' => ['会社 (かいしゃ): perusahaan', '会う (あう): bertemu']],
            ['character' => '社', 'romaji' => 'sha/yashiro', 'meaning' => 'perusahaan, kuil', 'stroke_count' => 7, 'jlpt_level' => 5, 'examples' => ['会社 (かいしゃ): perusahaan', '神社 (じんじゃ): kuil Shinto']],
            ['character' => '店', 'romaji' => 'ten/mise', 'meaning' => 'toko', 'stroke_count' => 8, 'jlpt_level' => 5, 'examples' => ['店 (みせ): toko', '喫茶店 (きっさてん): kafe']],
            ['character' => '駅', 'romaji' => 'eki', 'meaning' => 'stasiun', 'stroke_count' => 14, 'jlpt_level' => 5, 'examples' => ['駅 (えき): stasiun', '駅員 (えきいん): petugas stasiun']],
            ['character' => '道', 'romaji' => 'dō/michi', 'meaning' => 'jalan', 'stroke_count' => 12, 'jlpt_level' => 5, 'examples' => ['道 (みち): jalan', '茶道 (さどう): upacara minum teh']],
            ['character' => '飲', 'romaji' => 'in/nomu', 'meaning' => 'minum', 'stroke_count' => 12, 'jlpt_level' => 5, 'examples' => ['飲む (のむ): minum', '飲酒 (いんしゅ): minum alkohol']],
            ['character' => '食', 'romaji' => 'shoku/taberu', 'meaning' => 'makan', 'stroke_count' => 9, 'jlpt_level' => 5, 'examples' => ['食べる (たべる): makan', '食堂 (しょくどう): kantin/ruang makan']],
            ['character' => '読', 'romaji' => 'doku/yomu', 'meaning' => 'membaca', 'stroke_count' => 14, 'jlpt_level' => 5, 'examples' => ['読む (よむ): membaca', '読書 (どくしょ): membaca buku']],
            ['character' => '来', 'romaji' => 'rai/kuru', 'meaning' => 'datang', 'stroke_count' => 7, 'jlpt_level' => 5, 'examples' => ['来る (くる): datang', '来週 (らいしゅう): minggu depan']],
            ['character' => '行', 'romaji' => 'kō/gyō/iku/yuku', 'meaning' => 'pergi, melakukan', 'stroke_count' => 6, 'jlpt_level' => 5, 'examples' => ['行く (いく): pergi', '旅行 (りょこう): bepergian']],
            ['character' => '帰', 'romaji' => 'ki/kaeru', 'meaning' => 'pulang', 'stroke_count' => 10, 'jlpt_level' => 5, 'examples' => ['帰る (かえる): pulang']],
            ['character' => '出', 'romaji' => 'shutsu/deru', 'meaning' => 'keluar', 'stroke_count' => 5, 'jlpt_level' => 5, 'examples' => ['出る (でる): keluar', '出口 (でぐち): pintu keluar']],
            ['character' => '入', 'romaji' => 'nyū/hairu/ireru', 'meaning' => 'masuk', 'stroke_count' => 2, 'jlpt_level' => 5, 'examples' => ['入る (はいる): masuk', '入口 (いりぐち): pintu masuk']],
            ['character' => '休', 'romaji' => 'kyū/yasumu', 'meaning' => 'istirahat', 'stroke_count' => 6, 'jlpt_level' => 5, 'examples' => ['休む (やすむ): istirahat', '休み (やすみ): liburan']],
            ['character' => '書', 'romaji' => 'sho/kaku', 'meaning' => 'menulis', 'stroke_count' => 10, 'jlpt_level' => 5, 'examples' => ['書く (かく): menulis', '教科書 (きょうかしょ): buku pelajaran']],
            ['character' => '言', 'romaji' => 'gen/gon/iu/koto', 'meaning' => 'berkata, kata', 'stroke_count' => 7, 'jlpt_level' => 5, 'examples' => ['言う (いう): berkata', '言葉 (ことば): kata']],
            ['character' => '立', 'romaji' => 'ritsu/tatsu', 'meaning' => 'berdiri', 'stroke_count' => 5, 'jlpt_level' => 5, 'examples' => ['立つ (たつ): berdiri', '国立 (こくりつ): nasional']],
            ['character' => '午', 'romaji' => 'go', 'meaning' => 'siang', 'stroke_count' => 4, 'jlpt_level' => 5, 'examples' => ['午前 (ごぜん): pagi (AM)', '午後 (ごご): sore (PM)']],
            ['character' => '後', 'romaji' => 'go/kō/ato/ushiro', 'meaning' => 'setelah, belakang', 'stroke_count' => 9, 'jlpt_level' => 5, 'examples' => ['後 (あと): setelah', '後 (うしろ): belakang']],
            ['character' => '前', 'romaji' => 'zen/mae', 'meaning' => 'sebelum, depan', 'stroke_count' => 9, 'jlpt_level' => 5, 'examples' => ['前 (まえ): depan/sebelum', '午前 (ごぜん): pagi (AM)']],
            ['character' => '北', 'romaji' => 'hoku/kita', 'meaning' => 'utara', 'stroke_count' => 5, 'jlpt_level' => 5, 'examples' => ['北 (きた): utara']],
            ['character' => '南', 'romaji' => 'nan/minami', 'meaning' => 'selatan', 'stroke_count' => 9, 'jlpt_level' => 5, 'examples' => ['南 (みなみ): selatan']],
            ['character' => '東', 'romaji' => 'tō/higashi', 'meaning' => 'timur', 'stroke_count' => 8, 'jlpt_level' => 5, 'examples' => ['東 (ひがし): timur', '東京 (とうきょう): Tokyo']],
            ['character' => '西', 'romaji' => 'sei/sai/nishi', 'meaning' => 'barat', 'stroke_count' => 6, 'jlpt_level' => 5, 'examples' => ['西 (にし): barat', '西洋 (せいよう): Barat']],
            ['character' => '外', 'romaji' => 'gai/ge/soto/hoka', 'meaning' => 'luar, asing', 'stroke_count' => 5, 'jlpt_level' => 5, 'examples' => ['外 (そと): luar', '外国 (がいこく): negara asing']],
            ['character' => '名', 'romaji' => 'mei/na', 'meaning' => 'nama', 'stroke_count' => 6, 'jlpt_level' => 5, 'examples' => ['名前 (なまえ): nama', '有名 (ゆうめい): terkenal']],
            ['character' => '高', 'romaji' => 'kō/takai', 'meaning' => 'tinggi, mahal', 'stroke_count' => 10, 'jlpt_level' => 5, 'examples' => ['高い (たかい): tinggi/mahal', '高校 (こうこう): SMA']],
            ['character' => '安', 'romaji' => 'an/yasui', 'meaning' => 'murah, damai', 'stroke_count' => 6, 'jlpt_level' => 5, 'examples' => ['安い (やすい): murah', '安心 (あんしん): lega/merasa aman']],
            // Tambahan kanji level N5
            ['character' => '学', 'romaji' => 'gaku/manabu', 'meaning' => 'belajar', 'stroke_count' => 8, 'jlpt_level' => 5, 'examples' => ['学校 (がっこう): sekolah', '学生 (がくせい): murid']],
            ['character' => '生', 'romaji' => 'sei/shou/nama/ikiru', 'meaning' => 'hidup', 'stroke_count' => 5, 'jlpt_level' => 5, 'examples' => ['先生 (せんせい): guru', '生まれる (うまれる): lahir']],
            ['character' => '先', 'romaji' => 'sen', 'meaning' => 'depan/sebelum', 'stroke_count' => 6, 'jlpt_level' => 5, 'examples' => ['先生 (せんせい): guru', '先月 (せんげつ): bulan lalu']],
            ['character' => '週', 'romaji' => 'shuu', 'meaning' => 'minggu', 'stroke_count' => 11, 'jlpt_level' => 5, 'examples' => ['今週 (こんしゅう): minggu ini', '来週 (らいしゅう): minggu depan']],
            ['character' => '今', 'romaji' => 'kon/ima', 'meaning' => 'sekarang', 'stroke_count' => 4, 'jlpt_level' => 5, 'examples' => ['今日 (きょう): hari ini', '今週 (こんしゅう): minggu ini']],
            ['character' => '何', 'romaji' => 'ka/nan/nani', 'meaning' => 'apa', 'stroke_count' => 7, 'jlpt_level' => 5, 'examples' => ['何時 (なんじ): jam berapa?', '何 (なに): apa']],
            ['character' => '本', 'romaji' => 'hon/moto', 'meaning' => 'buku/asal', 'stroke_count' => 5, 'jlpt_level' => 5, 'examples' => ['本 (ほん): buku', '日本 (にほん): Jepang']],
            ['character' => '人', 'romaji' => 'jin/nin/hito', 'meaning' => 'orang', 'stroke_count' => 2, 'jlpt_level' => 5, 'examples' => ['日本人 (にほんじん): orang Jepang', '一人 (ひとり): satu orang']],
            ['character' => '国', 'romaji' => 'koku/kuni', 'meaning' => 'negara', 'stroke_count' => 8, 'jlpt_level' => 5, 'examples' => ['外国 (がいこく): negara asing', '中国 (ちゅうごく): China']],
            ['character' => '話', 'romaji' => 'wa/hanasu/hanashi', 'meaning' => 'bicara/cerita', 'stroke_count' => 13, 'jlpt_level' => 5, 'examples' => ['話す (はなす): berbicara', '電話 (でんわ): telepon']],
            ['character' => '友', 'romaji' => 'yū/tomo', 'meaning' => 'teman', 'stroke_count' => 4, 'jlpt_level' => 5, 'examples' => ['友達 (ともだち): teman']],
            ['character' => '父', 'romaji' => 'fu/chichi', 'meaning' => 'ayah', 'stroke_count' => 4, 'jlpt_level' => 5, 'examples' => ['父 (ちち): ayah saya', 'お父さん (おとうさん): ayah']],
            ['character' => '母', 'romaji' => 'bo/haha', 'meaning' => 'ibu', 'stroke_count' => 5, 'jlpt_level' => 5, 'examples' => ['母 (はは): ibu saya', 'お母さん (おかあさん): ibu']],
            ['character' => '毎', 'romaji' => 'mai', 'meaning' => 'setiap', 'stroke_count' => 6, 'jlpt_level' => 5, 'examples' => ['毎日 (まいにち): setiap hari', '毎週 (まいしゅう): setiap minggu']],
            ['character' => '朝', 'romaji' => 'chou/asa', 'meaning' => 'pagi', 'stroke_count' => 12, 'jlpt_level' => 5, 'examples' => ['朝 (あさ): pagi', '毎朝 (まいあさ): setiap pagi']],
            ['character' => '昼', 'romaji' => 'chuu/hiru', 'meaning' => 'siang', 'stroke_count' => 9, 'jlpt_level' => 5, 'examples' => ['昼ごはん (ひるごはん): makan siang']],
            ['character' => '晩', 'romaji' => 'ban', 'meaning' => 'malam', 'stroke_count' => 11, 'jlpt_level' => 5, 'examples' => ['晩ごはん (ばんごはん): makan malam', '今晩 (こんばん): malam ini']],
            ['character' => '夜', 'romaji' => 'ya/yoru', 'meaning' => 'malam', 'stroke_count' => 8, 'jlpt_level' => 5, 'examples' => ['夜 (よる): malam', '今夜 (こんや): malam ini']],
            ['character' => '金', 'romaji' => 'kin/kane', 'meaning' => 'emas/uang', 'stroke_count' => 8, 'jlpt_level' => 5, 'examples' => ['お金 (おかね): uang', '金曜日 (きんようび): hari Jumat']],
            ['character' => '聞', 'romaji' => 'bun/mon/kiku', 'meaning' => 'mendengar', 'stroke_count' => 14, 'jlpt_level' => 5, 'examples' => ['聞く (きく): mendengar']],
            ['character' => '買', 'romaji' => 'bai/kau', 'meaning' => 'membeli', 'stroke_count' => 12, 'jlpt_level' => 5, 'examples' => ['買う (かう): membeli', '買い物 (かいもの): belanja']],
            ['character' => '休', 'romaji' => 'kyuu/yasumu', 'meaning' => 'istirahat', 'stroke_count' => 6, 'jlpt_level' => 5, 'examples' => ['休む (やすむ): istirahat', '休み (やすみ): liburan']],
            ['character' => '朝', 'romaji' => 'chou/asa', 'meaning' => 'pagi', 'stroke_count' => 12, 'jlpt_level' => 5, 'examples' => ['朝 (あさ): pagi', '今朝 (けさ): pagi ini']],
        ];

        // Insert Kanji
        foreach ($kanji as $char) {
           DB::table('japanese_characters')->updateOrInsert(
                [
                    'character' => $char['character'],
                    'type' => 'kanji'
                ],
                [
                    'romaji' => $char['romaji'],
                    'meaning' => $char['meaning'],
                    'stroke_count' => $char['stroke_count'],
                    'jlpt_level' => $char['jlpt_level'],
                    'examples' => json_encode($char['examples'], JSON_UNESCAPED_UNICODE),
                ]
            );
        }
    }
}
