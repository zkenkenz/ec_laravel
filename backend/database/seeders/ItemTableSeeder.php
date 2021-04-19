<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
//データベースファサードを利用する
use Illuminate\Support\Facades\DB;

class ItemTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //二回目の実行の際にデータを削除
        DB::table('items')->truncate();
        //itemsテーブルにinsertで内容を保存する
        DB::table('items')->insert([
            'name' => 'カタン ~Die Siedler von Catan~',
            'imgpash' => 'Catan.jpg',
            'detail' => '世界のボードゲームの中で2000万個以上の販売数を誇る、ドイツ発の大ヒットゲームです。 「カタンの開拓者たち」は、「カタン島」という無人島を舞台に、3～4名のプレイヤーが参加し、島を開拓競争するボードゲームです。',
            'stock' => rand(1,10),
            'price' => rand(1000,2000)
        ]);

        DB::table('items')->insert([
            'name' => '宝石の煌き ~Splendor~',
            'imgpash' => 'Splendor.jpg',
            'detail' => 'プレーヤーは、色とりどりの宝石に魅せられた商人の１人。商人ギルドの長となり、鉱山から得られる原石をもとに資産を築いて職人たちを雇い地位や名声を得ていくボードゲームです。',
            'stock' => rand(1,10),
            'price' => rand(1000,2000)
        ]);

        DB::table('items')->insert([
            'name' => '6 ニムト ~6 nimmt!~',
            'imgpash' => '6nimmt.jpg',
            'detail' => '牛が主役のボードゲームです。獲得した牛の頭数が一番少なかったプレーヤーが勝利する、パーティ系カードゲームです。',
            'stock' => rand(1,10),
            'price' => rand(1000,2000)
        ]);

        DB::table('items')->insert([
            'name' => '犯人は踊る ~Dancing Criminal~',
            'imgpash' => 'DancingCriminal.jpg',
            'detail' => '犯人は踊るは犯人カードの持ち主を当てる推理カードゲームです。',
            'stock' => rand(1,10),
            'price' => rand(1000,2000)
        ]);

        DB::table('items')->insert([
            'name' => 'カルカソンヌ ~Carcassonne~',
            'imgpash' => 'Carcassonne.jpg',
            'detail' => 'やることは、引いたタイルを並べて駒を置くだけ！ 道や街を作って得点を競うのが、カルカソンヌです。',
            'stock' => rand(1,10),
            'price' => rand(1000,2000)
        ]);

        DB::table('items')->insert([
            'name' => 'ラブレター ~Love Letter~',
            'imgpash' => 'LoveLetter.jpg',
            'detail' => 'プレイヤーの目的はある国のお姫様にラブレターを届ける事。 様々な役職の人に渡して出来るだけお姫様に近い身分の人にラブレターを託しましょう。',
            'stock' => rand(1,10),
            'price' => rand(1000,2000)
        ]);

        DB::table('items')->insert([
            'name' => 'ドミニオン ~Dominion~',
            'imgpash' => 'Dominion.jpg',
            'detail' => '自分の王国を発展・拡大し、他の王国と競い合うデッキ構築型ボードゲームです。',
            'stock' => rand(1,10),
            'price' => rand(1000,2000)
        ]);

        DB::table('items')->insert([
            'name' => 'バトルライン ~Battle Line~',
            'imgpash' => 'BattleLine.jpg',
            'detail' => 'バトルラインは、９つのフラッグを奪い合う２人専用のボードゲームです。',
            'stock' => rand(1,10),
            'price' => rand(1000,2000)
        ]);

        DB::table('items')->insert([
            'name' => 'ごきぶりポーカー ~Cockroach Poker / Kakerlakenpoker~',
            'imgpash' => 'CockroachPoker.jpg',
            'detail' => 'ゴキブリ、クモ、ネズミ、カメムシ・・・そんないや～な動物達を、相手に押し付けるっ！！ごきぶりポーカーはそんなボードゲームです。',
            'stock' => rand(1,10),
            'price' => rand(1000,2000)
        ]);

        DB::table('items')->insert([
            'name' => 'ハゲタカのえじき ~Raj / Hols der Geier~',
            'imgpash' => 'Raj.jpg',
            'detail' => 'ハゲタカのえじきは、 「数字のじゃんけん」とも 呼ばれるボードゲーム。 自分の手札から出しだ数字を 相手と比べて得点をゲットするだけ。',
            'stock' => rand(1,10),
            'price' => rand(1000,2000)
        ]);
    }
}
