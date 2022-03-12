-- phpMyAdmin SQL Dump
-- version 4.4.15.10
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2021 年 2 月 05 日 15:57
-- サーバのバージョン： 5.7.32
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `personal`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `admin_login`
--

CREATE TABLE IF NOT EXISTS `admin_login` (
  `id` int(11) NOT NULL,
  `admin_id` varchar(100) CHARACTER SET utf8 NOT NULL,
  `password` varchar(100) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- テーブルのデータのダンプ `admin_login`
--

INSERT INTO `admin_login` (`id`, `admin_id`, `password`) VALUES
(1, 'chikuwa', 'jFAdZ5ltBKVR2OEAiW/Pj9Qlmb532ti3O7HvWo3lnOR5H16Hnz6f0JDuvrg6YDnO6HA/OHBfeMKLLX53AGHXPQ==');

-- --------------------------------------------------------

--
-- テーブルの構造 `animals`
--

CREATE TABLE IF NOT EXISTS `animals` (
  `id` int(11) NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 NOT NULL,
  `point` varchar(100) CHARACTER SET utf8 NOT NULL,
  `introduction` varchar(1000) CHARACTER SET utf8 NOT NULL,
  `sub_name` varchar(100) CHARACTER SET utf8 NOT NULL,
  `tag_id` varchar(100) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

--
-- テーブルのデータのダンプ `animals`
--

INSERT INTO `animals` (`id`, `name`, `point`, `introduction`, `sub_name`, `tag_id`) VALUES
(1, 'ホンドテン', 'ネコ目イタチ科', '体長44〜55cm、体重0.9〜1.6kg。冬の時期は全身黄色で、頭は白色だが、夏毛は頭から全身にかけて栗色で、喉から胸にかけてオレンジ色に変わる。', 'Martes Melampus Melampus', '1,12'),
(2, 'ホワイトタイガー', 'ネコ目ネコ科ヒョウ属', 'インドに生息するベンガルトラの白変種です。体毛は白色もしくはクリーム色に黒の縞模様。縞模様は個体によって茶色だったり、ほとんど見えないものもいます。かつてはインド北部や中東部に数頭いたといわれる白いトラも、トラ全体の数が減ってしまった今では飼育下でしか目にすることができません。全世界でも250頭あまり、国内には30頭ほどしかいない希少種です。', 'White Tiger', '1,13,34'),
(3, 'コツメカワウソ', 'ネコ目イタチ科', '東南アジアに生息するカワウソ。カワウソの中では最も体が小さく、頭部は短く平たい形をしています。\r\n川の流域の水辺付近に生息し、甲殻類や貝、カニ、カエルなどを広い臼歯ですりつぶして食べます。\r\n家族を中心とした小さなグループを作り、声と臭いでコミュニケーションを取ります。', 'Aonyx Cinerea', '1,12'),
(4, 'マンドリル', 'サル目オナガザル科', '成体の顔は赤い鼻、青い頬とかなり目立ち、昼間でも暗い熱帯雨林の中で仲間を見分けるのに役立ちます。\r\n雄の方がさらに鮮やかで、ももは青紫色になります。食性は雑食性で果実や種子、葉、昆虫等を食べます。', 'Mandrill.jpg', '2,14'),
(5, 'エランド', 'ウシ目ウシ科', 'エランドはレイヨウ類の中で最大の動物で、別名「オオカモシカ」と呼ばれることもあります。雄・雌ともに角があり、形状は角が2回転程ねじれてから真っ直ぐに伸びています。雄のほうが体は大きくなりますが、角の大きさは雌も変わらず、60センチから70センチです。普段は雌と仔からなる２０頭から３０頭ほどの群れを作って生活をします。跳躍力に優れ、２ｍほども跳ぶことができます。', 'Eland.png', '3,15'),
(6, 'アムールヒョウ', 'ネコ目ネコ科ヒョウ属', '朝鮮半島、中国東北部とロシア南東部（アムール川流域）に分布していたが、現在はロシア南東部の森林に生息しているだけで絶滅する可能性が非常に高く危惧されている。環境破壊や毛皮などのための密猟で激減してしまった。\r\n食性は肉食。魚や魚卵、シカ、ウサギ、アナグマ、小型齧歯類などを捕食する。\r\nWWFの2013年の調査結果では野生のアムールヒョウは48-50頭と推測される。少なくとも43-45頭の成獣と、4-5頭の幼獣が生息していることが確認され、2007年の調査では27-34頭であったことと比べると、1.5倍に増加しており、回復の兆しを見せている。', '', '1,13,34'),
(7, 'プラッザグエノン', 'サル目オナガザル科', '体長は40〜60ｃｍ、体重は4〜8ｋｇ。中央アフリカ共和国やカメルーンの森林で、川の近い場所で生活をしています。\r\n果実、葉、キノコなどを食べています。一夫多妻性で、3〜6頭ほどの小さな家族構成の群れで生活をしています。\r\n額にオレンジ色をした三日月状の毛が生えており、鼻の下から顎にかけては白いヒゲの様な毛が生えています。', '', '2,14'),
(8, 'カバ', 'ウシ目カバ科', '体長2,7m　体重3t　野生のカバは、日中は水の中にいて、夜になると陸上で草を食べる夜行性の生活をしています。皮膚が非常に厚く、人間のように汗を出して体温の調節をする機能がありません。そのため、昼間の暑い時間を水の中で過ごします。汗を思わせる赤い色のネバネバした液体を分泌し、紫外線や細菌から皮膚を守っています。', '', '3,16'),
(9, 'アルパカ', 'ウシ目ラクダ科', '体長約２ｍ　体重は約50-55ｋｇ。時速40ｋｍ前後の走力がある。上の前歯は無く、歯の代わり硬質化した皮膚があります。', 'alpaca.png', '3,17'),
(10, 'ポニー', 'ウマ目ウマ科', '肩までの高さが147cm以下の馬の総称。品種ではなく馬のタイプの一つ。代表的なポニーにはウェルシュマウンテンポニー、シェトランドポニー、ハクニーポニーがある。共通する特徴として、頭がよく温厚であり耐久力に優れている。', '', '4,18'),
(11, 'アンデスコンドル', 'タカ目コンドル科', '体長1〜1,3m　体重11〜15kg　南アメリカのアンデス山脈に生息し、主に死んだ獣などを食べています。翼を広げると3mほどになり、成鳥になるとオスは頭部にトサカ状の突起が発達するため、雌雄の見分けは簡単にできます。', '', '5,19'),
(12, 'オシドリ', 'ガンカモ目カモ科', '体長41〜49cm　625ｇ　ロシア沿海地方や樺太、日本に生息しており、ロシアなどの北部生息しているものは、冬になると、日本や中国南部で越冬する渡り鳥です。繁殖期は5〜6月頃、森林に囲まれた水辺で繁殖し地面で作る他のカモ類とは違い水辺近くの樹洞に巣を作ります。「おしどり夫婦」という言葉もしますが、他のカモ類と同じく、子育てはメスが行い繁殖の度に別の相手と結ばれることも普通であると言われています。', '', '6,20'),
(13, 'チーター', 'ネコ目ネコ科チーター属', '陸上で最も速く、時速110ｋｍで走る事ができます。スリムな体型、長い肢、よく曲がるバネのような背骨と長い尾は、速く走る事や、急な方向転換に役立ちます。そして、爪はしまう事ができず、走る際にスパイクのような役割りをします。これは、ネコ科の猛獣の中では、チーターだけです。', 'Cheetah.png', '1,13,35'),
(14, 'ホンドリス', 'ネズミ目リス科', '体長15〜20cm　耳が大きく尾が長い。毛色は、冬はかっ色、夏は赤かっ色で、尾の先は白。樹上で暮らして冬眠はせず木の実などを土の中に保存する。', 'Sciurus Lis', '7,21'),
(15, 'ホンシュウジカ', 'ウシ目シカ科', '体長130〜160cm　体重50〜85kg　角はオスだけに生え、毎年生え変わる。4〜5月は袋づのと呼ばれる柔らかい角で、9月ごろ完成する。秋から冬にかけて10頭ほどの群れを作って行動する。', '', '3,22'),
(16, 'タンチョウ', 'ツル目ツル科', '体長1,5ｍ　体重7〜12ｋｇ　湿原でカエルや魚、穀物などを食べている。繁殖期になると、「鶴の舞」と呼ばれるダンスのような動きをする。', '', '8,23'),
(17, 'レッサーパンダ', 'ネコ目レッサーパンダ科', '体長50〜63,5cm　体重3〜6kg　本来パンダという名前は先にヨーロッパに知られたレッサーパンダに与えられたものでした。ジァイアントパンダ同様、笹や竹の葉を主食とし果実など甘いものを好んで食べます。また、手のひらに突起があり、これを爪のように使って食べ物を片手で口に運ぶことができ木登りも得意です。肛門線より特殊なにおい出す機能があり、当園でも頻繁ににおい付けの行動が見られます。', 'Red Panda', '1,24'),
(18, 'アメリカビーバー', 'ネズミ属ビーバー科', 'カピパラとならぶ最大のネズミの仲間です。北アメリカのアラスカから南はフロリダ北部にかけて分布しています。特徴のある平たい尾は、うろこ状の皮膚に覆われ、泳ぐ時に舵の役目をしています。木をかじり倒して、川の流れをせき止めるダムを建築する動物として知られています。寿命は10〜15年です。', '', '36,25'),
(19, 'ジェフロイクモザル', 'サル目オマキザル科', '別名「アカクモザル」とも呼ばれます。物を持ったり、握ったり、ぶらさがったりすることのできる器用な尻尾を持っていて、「第5の手」とも言われます。尾も先の裏側には毛がなく、感覚の鋭い皮膚が露出していて尾紋と呼ばれるしわがあります。この尻尾を自由に使い、高い木の枝を移動しながら6〜7頭の小さな群れで生活しています。', '', '2,26'),
(20, 'カピバラ', 'ネズミ目カピバラ科', '体長105〜135cm　体重35〜65kg　世界最大のネズミの仲間です。南アメリカ東部アマゾン川流域を中心とした水辺に生息しております。体にはタワシのような硬い毛で覆われています。泳ぐことが得意で、前脚後脚には水かきがついています。捕食動物から逃げるために水中に5分以上潜ることができます。', '', '7,27'),
(21, 'マレーバク', 'ウマ目バク科', '体長1,8〜2,5m　体重250〜540kg　のんきそうな顔をしていますが絶滅の危機に瀕している希少種です｡森の中で生活するマレーバクは目がよく見えないため、鼻が発達していて、においや音に対しとても敏感な動物です。泳ぎが特技で、敵に襲われたときなどは水の中に跳びこんで逃げます。黒と白の体の色は、月明かりのさす森で、闇夜に隠れながら水草や果実、草、小枝などを食べるための保護色です。', '', '4,28'),
(22, 'アカゲザル', 'サル目オナガザル科', '体長約50cm　体重平均6〜7kgインド、東南アジアなど、アジア大陸に広く分布しております。ニホンザルに似ていますが、尾も長く、体も比較的小柄です。雑食性で果実、若葉、穀物、昆虫などを食べて生活しております。当園のサル山はこのアカゲザルです。', '', '2,14'),
(23, 'フンボルトペンギン', 'ペンギン目ペンギン科', '頭高56〜66cm　体重4,5〜5kg　ペンギンは大航海時代に発見され、『羽毛をつけた魚』と発表されたほど変わった形をした鳥です。ペンギンの多くは南極にいると連想されがちですが、半数以上の種類は、南極以外に生息しています。フンボルトペンギンは温帯性気候のペルーとチリの海岸および、沿岸の島にすんでいます。野生では餌となる魚類が乱獲され、エルニーニョ現象などの環境変化から個体数が減少しています。', '', '9,29'),
(24, 'パルマワラビー', '有袋目カンガルー科', '体長45-53ｃｍ　体重3.5-6ｋｇ　赤茶から灰茶色の被毛の中央にある首から背中まで続く黒い縞と、鼻の横と頬の白い縞で判断できます。', '', '10,30'),
(25, 'ビルマニシキヘビ', '有隣目ニシキヘビ科', '全長オス250-350cm、メス300-450cmで、最大全長823cmの記録がある。森林や水辺に生息する。熱帯雨林に多く生息し、水辺で多く見られるが乾燥地帯にも生息している。幼体時には樹上棲傾向が強いが、成長に伴いほぼ完全に地上棲となる。', '', '11,31'),
(26, 'アカカンガルー', '有袋目カンガルー科', '体長1-1.6ｍ　体重25-90ｋｇ　最も大きな有袋類でオーストラリアほぼ全域で見られる。メスよりもオスのほうが大きくオスは喉や胸部から分泌される赤い液により、体毛が赤褐色に染まる。', '', '10,30'),
(27, 'ワオキツネザル', 'サル目キツネザル科', '体長39-46ｃｍ体重2.5ｋｇ-3.5ｋｇ　マダガスカル南部の乾燥林・川辺林に生息している。朝と夕方に活発的に動く。気温の低い時には両手を広げ日光浴をする。', '', '2,32'),
(28, 'ラブラドールレトリバー', 'ネコ目イヌ科', '「ラブラドール」という名前は、カナダ・ラブラドル半島に由来するが、元々同半島原産ではなく、ニューファンドランド島（現在は半島と同じニューファンドランド・ラブラドール州に属する）にいた「セント・ジョンズ・ウォーター・ドッグ」（現在は絶滅）と「ニューファンドランド犬」とを交配させて19世紀に生まれた犬である。', 'Labrador Retriever', '1,33'),
(29, 'ちくわ', 'ロングコートチワワ', 'かわいい♡', 'chiwawawa.png', '33,37');

-- --------------------------------------------------------

--
-- テーブルの構造 `job`
--

CREATE TABLE IF NOT EXISTS `job` (
  `id` int(11) NOT NULL,
  `list` varchar(100) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- テーブルのデータのダンプ `job`
--

INSERT INTO `job` (`id`, `list`) VALUES
(1, '経営者・役員'),
(2, '経営企画'),
(3, '研究・開発'),
(4, '情報システム'),
(5, '購買・資材調達'),
(6, '物流・SCM'),
(7, '生産管理・製造'),
(8, '開発設計・商品企画'),
(9, '品質管理'),
(10, '営業'),
(11, '広報・調査・マーケティング'),
(12, 'コンサルタント'),
(13, '管理部門(総務・経理・法務など)'),
(14, '学生'),
(15, 'その他');

-- --------------------------------------------------------

--
-- テーブルの構造 `location`
--

CREATE TABLE IF NOT EXISTS `location` (
  `id` int(11) NOT NULL,
  `list` varchar(100) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=latin1;

--
-- テーブルのデータのダンプ `location`
--

INSERT INTO `location` (`id`, `list`) VALUES
(1, '北海道'),
(2, '青森県'),
(3, '岩手県'),
(4, '宮城県'),
(5, '秋田県'),
(6, '山形県'),
(7, '福島県'),
(8, '茨城県'),
(9, '栃木県'),
(10, '群馬県'),
(11, '埼玉県'),
(12, '千葉県'),
(13, '東京都'),
(14, '神奈川県'),
(15, '新潟県'),
(16, '富山県'),
(17, '石川県'),
(18, '福井県'),
(19, '山梨県'),
(20, '長野県'),
(21, '岐阜県'),
(22, '静岡県'),
(23, '愛知県'),
(24, '三重県'),
(25, '滋賀県'),
(26, '京都府'),
(27, '大阪府'),
(28, '兵庫県'),
(29, '奈良県'),
(30, '和歌山県'),
(31, '鳥取県'),
(32, '島根県'),
(33, '岡山県'),
(34, '広島県'),
(35, '山口県'),
(36, '徳島県'),
(37, '香川県'),
(38, '愛媛県'),
(39, '高知県'),
(40, '福岡県'),
(41, '佐賀県'),
(42, '長崎県'),
(43, '熊本県'),
(44, '大分県'),
(45, '宮崎県'),
(46, '鹿児島県'),
(47, '沖縄県'),
(48, 'その他'),
(50, 'アメリカ');

-- --------------------------------------------------------

--
-- テーブルの構造 `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `id` int(11) NOT NULL,
  `user_id` varchar(100) CHARACTER SET utf8 NOT NULL,
  `password` varchar(100) CHARACTER SET utf8 NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 NOT NULL,
  `tel` varchar(20) CHARACTER SET utf8 NOT NULL,
  `message` varchar(100) CHARACTER SET utf8 NOT NULL,
  `location_id` int(11) NOT NULL,
  `sector_id` int(11) NOT NULL,
  `job_id` int(11) NOT NULL,
  `favtag_id` varchar(100) CHARACTER SET utf8 NOT NULL,
  `purpose_id` varchar(100) CHARACTER SET utf8 NOT NULL,
  `other` varchar(1000) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- テーブルのデータのダンプ `login`
--

INSERT INTO `login` (`id`, `user_id`, `password`, `name`, `tel`, `message`, `location_id`, `sector_id`, `job_id`, `favtag_id`, `purpose_id`, `other`) VALUES
(1, 'ango@chikuwa.co.jp', 'wgBb3M2qj4wwTh6xKj4UDY98bL01NVT5qpKf8pdYQXEHkJyE6g5HrdKy7zbvzDQWUb5JofBFLMtTYyLj7n9Xzw==', '暗号 太郎', '123-4567-8910', 'よろしくお願いします', 12, 19, 2, '8,17,33,35', '1,4,8', ''),
(2, 'chikuwa@chikuwa.co.jp', '1hgw4Z76w1acJXK9X2hkYgUiI8F/pFW+LJx7lHLmMLailaECo03gety3JLiU1UWe1JtHnvA5T57eExDi9ShILA==', 'aoki chikuwa', '090-1234-5678', 'こんにちは', 15, 22, 14, '1,5,18,33', '1,10,11', 'チワワ に会いたい♡'),
(3, 'login@chikuwa.co.jp', 'D0obBGBY47ps392GLhT1rLEDefSTdGbc+sgvpw02i3dC1Bfv7s98WTaOCQosMggJ+9j7KMY9Nlh2sGph9dEteQ==', 'ログイン 太郎', '090-1234-5678', 'こんにちは、よろしくお願いします', 15, 21, 8, '1,33,34', '10,11', '動物とふれあいたい'),
(4, 'touroku@chikuwa.co.jp', 'zF03QWjjuoyGNmtyvJxPUTJz3kYaDcm2KVAyjRl76K9D74ByYSzHVmMB/gOJ5Q5d1BsRLg155/W93O6Yik6Hcw==', '登録 次郎', '000000000000000', '', 0, 0, 0, '', '', ''),
(5, 'hanako@chikuwa.co.jp', 'i3KaWXDdCK7/wxbtp5aUdijk9FhLkHhlhEQnLpF2boCNpL5Idf/hwx+r9zfQ/eJUV7OgLrEam1RMmTa2JhgZiQ==', 'ログイン 花子', '123-4567-8910', 'おねがいします', 30, 22, 10, '25', '1,10', '');

-- --------------------------------------------------------

--
-- テーブルの構造 `purpose`
--

CREATE TABLE IF NOT EXISTS `purpose` (
  `id` int(11) NOT NULL,
  `list` varchar(100) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- テーブルのデータのダンプ `purpose`
--

INSERT INTO `purpose` (`id`, `list`) VALUES
(1, '技術・製品・サービスを知りたい'),
(2, '自社・製品をPRしたい'),
(3, '業界の動向を知りたい・情報収集'),
(4, '協業パートナーを探したい'),
(5, '課題を解決したい'),
(6, '探している技術・製品・サービスがある'),
(7, '開発・製造したい製品・サービスがある'),
(8, '提案・アドバイスが欲しい'),
(9, 'まずは情報交換がしたい'),
(10, '商談をしたい'),
(11, 'その他'),
(14, '食べたい');

-- --------------------------------------------------------

--
-- テーブルの構造 `sector`
--

CREATE TABLE IF NOT EXISTS `sector` (
  `id` int(11) NOT NULL,
  `list` varchar(100) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- テーブルのデータのダンプ `sector`
--

INSERT INTO `sector` (`id`, `list`) VALUES
(1, '製造業(自動車/輸送機器・部品)'),
(2, '製造業(半導体/電子部品・デバイス)'),
(3, '製造業(通信・ネットワーク機器)'),
(4, '製造業(総合電機・家電)'),
(5, '製造業(精密機器・産業機械)'),
(6, '製造業(機械部品・デバイス)'),
(7, '製造業(分析・計測機器)'),
(8, '製造業(鉄鋼・非鉄金属・金属製品)'),
(9, '製造業(医療機器・介護器具)'),
(10, '製造業(材料・化学)'),
(11, '製造業(食品・飲料)'),
(12, '製造業(アパレル・一般消費材)'),
(13, '製造業(印刷)'),
(14, '製造業(その他)'),
(15, '情報通信'),
(16, 'サービス業'),
(17, '商社・卸売業・小売業'),
(18, '金融・投資・コンサルティング'),
(19, '学校・調査・研究機関'),
(20, '官公庁・地方公共団体・業界団体'),
(21, '報道・メディア・出版'),
(22, '学生'),
(23, 'その他'),
(24, 'プロゲーマー');

-- --------------------------------------------------------

--
-- テーブルの構造 `tag_animals`
--

CREATE TABLE IF NOT EXISTS `tag_animals` (
  `id` int(11) NOT NULL,
  `tag_name` varchar(100) CHARACTER SET utf8 NOT NULL,
  `animal_id` varchar(100) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;

--
-- テーブルのデータのダンプ `tag_animals`
--

INSERT INTO `tag_animals` (`id`, `tag_name`, `animal_id`) VALUES
(1, 'ネコ目', '1,2,3,6,13,17,28'),
(2, 'サル目', '4,7,19,22,27'),
(3, 'ウシ目', '5,8,9,15'),
(4, 'ウマ目', '10,21'),
(5, 'タカ目', '11'),
(6, 'ガンカモ目', '12'),
(7, 'ネズミ目', '14,20'),
(8, 'ツル目', '16'),
(9, 'ペンギン目', '23'),
(10, '有袋目', '24,26'),
(11, '有隣目', '25'),
(12, 'イタチ科', '1,3'),
(13, 'ネコ科', '2,6,13'),
(14, 'オナガザル科', '4,7,22'),
(15, 'ウシ科', '5'),
(16, 'カバ科', '8'),
(17, 'ラクダ科', '9'),
(18, 'ウマ科', '10'),
(19, 'コンドル科', '11'),
(20, 'カモ科', '12'),
(21, 'リス科', '14'),
(22, 'シカ科', '15'),
(23, 'ツル科', '16'),
(24, 'レッサーパンダ科', '17'),
(25, 'ビーバー科', '18'),
(26, 'オマキザル科', '19'),
(27, 'カピバラ科', '20'),
(28, 'バク科', '21'),
(29, 'ペンギン科', '23'),
(30, 'カンガルー科', '24,26'),
(31, 'ニシキヘビ科', '25'),
(32, 'キツネザル科', '27'),
(33, 'イヌ科', '28,29'),
(34, 'ヒョウ属', '2,6'),
(35, 'チーター属', '13'),
(36, 'ネズミ属', '18'),
(37, 'チワワ', '29');

-- --------------------------------------------------------

--
-- テーブルの構造 `time_table`
--

CREATE TABLE IF NOT EXISTS `time_table` (
  `ScheduleId` int(11) NOT NULL,
  `day` date NOT NULL,
  `startTime` time NOT NULL,
  `endTime` time NOT NULL,
  `filled_animalid` varchar(100) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

--
-- テーブルのデータのダンプ `time_table`
--

INSERT INTO `time_table` (`ScheduleId`, `day`, `startTime`, `endTime`, `filled_animalid`) VALUES
(1, '2021-02-01', '10:00:00', '10:30:00', '1,7'),
(2, '2021-02-01', '10:45:00', '11:15:00', ''),
(3, '2021-02-01', '11:30:00', '12:00:00', '15,21'),
(4, '2021-02-01', '12:15:00', '12:45:00', '1'),
(5, '2021-02-01', '13:00:00', '13:30:00', '2,24'),
(6, '2021-02-01', '13:45:00', '14:15:00', '14'),
(7, '2021-02-01', '14:30:00', '15:00:00', '1,11'),
(8, '2021-02-01', '15:15:00', '15:45:00', '9,10'),
(9, '2021-02-01', '16:00:00', '16:30:00', '24,2'),
(10, '2021-02-01', '16:45:00', '17:15:00', '4,5,6'),
(11, '2021-02-02', '10:00:00', '10:30:00', '1'),
(12, '2021-02-02', '10:45:00', '11:15:00', '11'),
(13, '2021-02-02', '11:30:00', '12:00:00', '20'),
(14, '2021-02-02', '12:15:00', '12:45:00', '5,8'),
(15, '2021-02-02', '13:00:00', '13:30:00', '9,23'),
(16, '2021-02-02', '13:45:00', '14:15:00', '22,7'),
(17, '2021-02-02', '14:30:00', '15:00:00', '18,19'),
(18, '2021-02-02', '15:15:00', '15:45:00', '18,10,20'),
(19, '2021-02-02', '16:00:00', '16:30:00', '14,17'),
(20, '2021-02-02', '16:45:00', '17:15:00', '9,4'),
(28, '2021-01-25', '14:10:00', '17:10:00', '28'),
(29, '2021-01-25', '18:50:00', '21:50:00', '4'),
(31, '2021-01-25', '16:00:00', '17:00:00', '3'),
(32, '2021-01-25', '07:20:00', '09:20:00', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `animals`
--
ALTER TABLE `animals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `purpose`
--
ALTER TABLE `purpose`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sector`
--
ALTER TABLE `sector`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tag_animals`
--
ALTER TABLE `tag_animals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `time_table`
--
ALTER TABLE `time_table`
  ADD PRIMARY KEY (`ScheduleId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `animals`
--
ALTER TABLE `animals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `job`
--
ALTER TABLE `job`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `purpose`
--
ALTER TABLE `purpose`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `sector`
--
ALTER TABLE `sector`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `tag_animals`
--
ALTER TABLE `tag_animals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `time_table`
--
ALTER TABLE `time_table`
  MODIFY `ScheduleId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=36;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
