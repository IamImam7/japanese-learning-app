<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class GrammarRulesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Data Tata Bahasa Jepang Dasar (JLPT N5 dan N4)
        $grammarRules = [
            // JLPT N5 Grammar
            [
                'rule_name' => 'です (Desu)',
                'structure' => 'Noun + です',
                'explanation' => 'Digunakan untuk membuat kalimat sopan. Setara dengan "is/am/are" dalam bahasa Inggris.',
                'example' => '私は学生です。 (Watashi wa gakusei desu.) - Saya adalah pelajar.',
                'level' => 5
            ],
            [
                'rule_name' => 'は (Wa) - Partikel Topik',
                'structure' => 'Topic + は + Comment',
                'explanation' => 'Partikel は (dibaca "wa") menandai topik kalimat. Bukan partikel subjek.',
                'example' => '私は日本人です。 (Watashi wa nihonjin desu.) - Saya adalah orang Jepang.',
                'level' => 5
            ],
            [
                'rule_name' => 'を (Wo) - Partikel Objek',
                'structure' => 'Object + を + Verb',
                'explanation' => 'Partikel を menandai objek langsung dari suatu tindakan.',
                'example' => '本を読みます。 (Hon wo yomimasu.) - Saya membaca buku.',
                'level' => 5
            ],
            [
                'rule_name' => 'に (Ni) - Partikel Arah/Waktu',
                'structure' => 'Tempat/Waktu + に + Verb',
                'explanation' => 'Partikel に menunjukkan arah gerakan atau waktu tertentu ketika suatu tindakan terjadi.',
                'example' => '学校に行きます。 (Gakkou ni ikimasu.) - Saya pergi ke sekolah.',
                'level' => 5
            ],
            [
                'rule_name' => 'で (De) - Partikel Lokasi/Alat',
                'structure' => 'Tempat + で + Verb',
                'explanation' => 'Partikel で menunjukkan lokasi dimana suatu tindakan terjadi atau alat yang digunakan.',
                'example' => '図書館で勉強します。 (Toshokan de benkyou shimasu.) - Saya belajar di perpustakaan.',
                'level' => 5
            ],
            [
                'rule_name' => 'ます形 (Masu-form)',
                'structure' => 'Verb stem + ます',
                'explanation' => 'Bentuk sopan dari kata kerja. Digunakan dalam situasi formal.',
                'example' => '食べます (tabemasu) - makan, 行きます (ikimasu) - pergi',
                'level' => 5
            ],
            [
                'rule_name' => 'ない形 (Nai-form)',
                'structure' => 'Verb stem + ない',
                'explanation' => 'Bentuk negatif dari kata kerja. Digunakan untuk menyatakan "tidak melakukan" sesuatu.',
                'example' => '食べない (tabenai) - tidak makan, 行かない (ikanai) - tidak pergi',
                'level' => 5
            ],
            [
                'rule_name' => 'た形 (Ta-form)',
                'structure' => 'Verb stem + た',
                'explanation' => 'Bentuk lampau dari kata kerja. Digunakan untuk menyatakan tindakan yang telah selesai.',
                'example' => '食べた (tabeta) - telah makan, 行った (itta) - telah pergi',
                'level' => 5
            ],
            [
                'rule_name' => 'て形 (Te-form)',
                'structure' => 'Verb stem + て',
                'explanation' => 'Bentuk serbaguna yang digunakan untuk berbagai pola kalimat seperti permintaan, kalimat sambung, dan ekspresi lainnya.',
                'example' => '食べて (tabete) - makanlah, 行って (itte) - pergilah',
                'level' => 5
            ],
            [
                'rule_name' => '形容词 (Kata Sifat-i)',
                'structure' => 'Kata sifat-i + Noun',
                'explanation' => 'Kata sifat yang diakhiri dengan い. Berfungsi seperti kata sifat dalam bahasa Indonesia.',
                'example' => '大きい家 (ookii ie) - rumah besar, 赤いりんご (akai ringo) - apel merah',
                'level' => 5
            ],
            [
                'rule_name' => 'な形容词 (Kata Sifat-na)',
                'structure' => 'Kata sifat-na + な + Noun',
                'explanation' => 'Kata sifat yang membutuhkan な ketika memodifikasi kata benda.',
                'example' => '静かな人 (shizuka na hito) - orang yang pendiam, きれいな花 (kirei na hana) - bunga yang indah',
                'level' => 5
            ],
            [
                'rule_name' => 'たい (Tai) - Keinginan',
                'structure' => 'Verb stem + たい',
                'explanation' => 'Menyatakan keinginan untuk melakukan sesuatu. Setara dengan "ingin" dalam bahasa Indonesia.',
                'example' => '日本に行きたい。 (Nihon ni ikitai.) - Saya ingin pergi ke Jepang.',
                'level' => 5
            ],
            [
                'rule_name' => 'ましょう (Mashou) - Ajakan',
                'structure' => 'Verb stem + ましょう',
                'explanation' => 'Digunakan untuk mengajak seseorang melakukan sesuatu bersama.',
                'example' => '食べましょう。 (Tabemashou.) - Mari kita makan.',
                'level' => 5
            ],
            [
                'rule_name' => 'ください (Kudasai) - Permintaan Sopan',
                'structure' => 'Verb te-form + ください',
                'explanation' => 'Digunakan untuk membuat permintaan secara sopan.',
                'example' => '待ってください。 (Matte kudasai.) - Tolong tunggu.',
                'level' => 5
            ],

            // JLPT N4 Grammar
            [
                'rule_name' => 'たり～たり (Tari~tari)',
                'structure' => 'Verb ta-form + り + Verb ta-form + りする',
                'explanation' => 'Digunakan untuk menyebutkan beberapa contoh tindakan secara acak.',
                'example' => '週末は映画を見たり、本を読んだりします。 (Shuumatsu wa eiga wo mitari, hon wo yondari shimasu.) - Di akhir pekan saya biasanya menonton film, membaca buku, dll.',
                'level' => 4
            ],
            [
                'rule_name' => 'なければならない (Nakereba naranai)',
                'structure' => 'Verb nai-form + なければならない',
                'explanation' => 'Menyatakan kewajiban atau keharusan melakukan sesuatu.',
                'example' => '勉強しなければならない。 (Benkyou shinakereba naranai.) - Saya harus belajar.',
                'level' => 4
            ],
            [
                'rule_name' => '方がいい (Hō ga ii)',
                'structure' => 'Verb plain form + 方がいい',
                'explanation' => 'Memberikan saran atau rekomendasi. Setara dengan "lebih baik" dalam bahasa Indonesia.',
                'example' => '早く寝た方がいい。 (Hayaku neta hō ga ii.) - Lebih baik kamu tidur lebih awal.',
                'level' => 4
            ],
            [
                'rule_name' => 'ので (Node)',
                'structure' => 'Plain form + ので',
                'explanation' => 'Menyatakan alasan atau sebab. Lebih sopan daripada から.',
                'example' => '雨が降っているので、出かけません。 (Ame ga futte iru node, dekakemasen.) - Karena sedang hujan, saya tidak akan keluar.',
                'level' => 4
            ],
            [
                'rule_name' => 'そうだ (Sō da) - Penampakan',
                'structure' => 'Verb stem/Adjective stem + そうだ',
                'explanation' => 'Menyatakan kesan atau penampakan berdasarkan apa yang terlihat.',
                'example' => 'このケーキはおいしそうだ。 (Kono kēki wa oishisō da.) - Kue ini terlihat enak.',
                'level' => 4
            ],
            [
                'rule_name' => 'ようだ (Yō da)',
                'structure' => 'Plain form + ようだ',
                'explanation' => 'Menyatakan kemiripan atau kesan berdasarkan pengamatan.',
                'example' => '彼は疲れているようです。 (Kare wa tsukarete iru yō desu.) - Sepertinya dia lelah.',
                'level' => 4
            ],
            [
                'rule_name' => 'らしい (Rashii)',
                'structure' => 'Plain form + らしい',
                'explanation' => 'Menyatakan sesuatu yang didengar atau informasi yang tidak langsung.',
                'example' => '明日は雨らしい。 (Ashita wa ame rashii.) - Katanya besok akan hujan.',
                'level' => 4
            ],
            [
                'rule_name' => 'かもしれない (Kamo shirenai)',
                'structure' => 'Plain form + かもしれない',
                'explanation' => 'Menyatakan kemungkinan. Setara dengan "mungkin" dalam bahasa Indonesia.',
                'example' => '彼は来ないかもしれない。 (Kare wa konai kamo shirenai.) - Mungkin dia tidak akan datang.',
                'level' => 4
            ],
            [
                'rule_name' => 'てしまう (Te shimau)',
                'structure' => 'Verb te-form + しまう',
                'explanation' => 'Menyatakan penyelesaian tindakan atau menyesal telah melakukan sesuatu.',
                'example' => '全部食べてしまった。 (Zenbu tabete shimatta.) - Saya telah menghabiskannya (semuanya).',
                'level' => 4
            ],
            [
                'rule_name' => 'ておく (Te oku)',
                'structure' => 'Verb te-form + おく',
                'explanation' => 'Menyatakan melakukan sesuatu sebagai persiapan untuk masa depan.',
                'example' => '旅行の前に切符を買っておきます。 (Ryokō no mae ni kippu wo katte okimasu.) - Saya akan membeli tiket sebelum perjalanan.',
                'level' => 4
            ],
            [
                'rule_name' => 'てみる (Te miru)',
                'structure' => 'Verb te-form + みる',
                'explanation' => 'Menyatakan mencoba melakukan sesuatu.',
                'example' => '日本料理を食べてみたい。 (Nihon ryōri wo tabete mitai.) - Saya ingin mencoba makanan Jepang.',
                'level' => 4
            ],
            [
                'rule_name' => 'ながら (Nagara)',
                'structure' => 'Verb stem + ながら',
                'explanation' => 'Menyatakan dua tindakan yang dilakukan secara bersamaan.',
                'example' => '音楽を聞きながら勉強します。 (Ongaku wo kikinagara benkyou shimasu.) - Saya belajar sambil mendengarkan musik.',
                'level' => 4
            ],
            [
                'rule_name' => 'ば (Ba) Conditional',
                'structure' => 'Verb conditional form + ば',
                'explanation' => 'Menyatakan kondisi "jika".',
                'example' => '雨が降れば、行きません。 (Ame ga fureba, ikimasen.) - Jika hujan, saya tidak akan pergi.',
                'level' => 4
            ],
            [
                'rule_name' => 'と (To) Conditional',
                'structure' => 'Plain form + と',
                'explanation' => 'Menyatakan kondisi alami atau hasil yang pasti ketika kondisi terpenuhi.',
                'example' => '春になると、花が咲きます。 (Haru ni naru to, hana ga sakimasu.) - Ketika musim semi tiba, bunga-bunga bermekaran.',
                'level' => 4
            ],
            [
                'rule_name' => 'ても (Temo)',
                'structure' => 'Verb te-form + も',
                'explanation' => 'Menyatakan "meskipun" atau "walaupun".',
                'example' => '雨が降っても、行きます。 (Ame ga futtemo, ikimasu.) - Meskipun hujan, saya akan pergi.',
                'level' => 4
            ],
        ];

        foreach ($grammarRules as $rule) {
            DB::table('grammar_rules')->insert([
                'rule_name' => $rule['rule_name'],
                'structure' => $rule['structure'],
                'explanation' => $rule['explanation'],
                'example' => $rule['example'],
                'level' => $rule['level'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
