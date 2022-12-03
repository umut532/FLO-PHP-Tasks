-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1:3306
-- Üretim Zamanı: 03 Ara 2022, 01:44:40
-- Sunucu sürümü: 5.7.36
-- PHP Sürümü: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `webservice`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `mail`
--

DROP TABLE IF EXISTS `mail`;
CREATE TABLE IF NOT EXISTS `mail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `email` varchar(150) COLLATE utf8_turkish_ci NOT NULL,
  `message` varchar(1500) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `mail`
--

INSERT INTO `mail` (`id`, `full_name`, `email`, `message`) VALUES
(1, 'Ümit faruk atmaca', 'umutfaruk@gmail.com', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ratione dolore quisquam quia ea repudiandae nihil. Repellat, nulla accusantium velit delectus, ab maiores culpa doloremque aperiam explicabo illum magnam, ipsam veniam.'),
(2, 'Ümit faruk atmaca', 'umutfaruk@gmail.com', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ratione dolore quisquam quia ea repudiandae nihil. Repellat, nulla accusantium velit delectus, ab maiores culpa doloremque aperiam explicabo illum magnam, ipsam veniam.'),
(3, 'Ümit faruk atmaca', 'umutfaruk@gmail.com', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ratione dolore quisquam quia ea repudiandae nihil. Repellat, nulla accusantium velit delectus, ab maiores culpa doloremque aperiam explicabo illum magnam, ipsam veniam.');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `pages`
--

DROP TABLE IF EXISTS `pages`;
CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `page_name` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `page_title` varchar(500) COLLATE utf8_turkish_ci NOT NULL,
  `description` varchar(5000) COLLATE utf8_turkish_ci NOT NULL,
  `contents` varchar(10000) COLLATE utf8_turkish_ci NOT NULL,
  `file_name` varchar(500) COLLATE utf8_turkish_ci NOT NULL,
  `date` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `viewing` int(11) NOT NULL,
  `state` tinyint(1) NOT NULL,
  `clear_page_name` varchar(150) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=47 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `pages`
--

INSERT INTO `pages` (`id`, `page_name`, `page_title`, `description`, `contents`, `file_name`, `date`, `viewing`, `state`, `clear_page_name`) VALUES
(40, 'Namık Kemal', '\"Vatan şairi\" Namık Kemal vefatının 134\'üncü yılında anılıyor', 'Türk edebiyatının \"vatan şairi\" Namık Kemal, vefatının 134\'üncü senesinde anılıyor.', '<h3>Tekirdağ</h3>\r\n<p>Asıl adı Mehmet Kemal olan, \"Namık\" adını ise Şair Eşref Paşa\'dan alan Namık Kemal, 21 Aralık 1840\'ta 2. Abdülhamid\'in müneccimbaşısı ve yurtseverlik, hürriyet, millet kavramlarına bağlı Yenişehirli Mustafa Asım Bey ile Fatma Zehra Hanım\'ın çocukları olarak Tekirdağ\'da dünyaya geldi.</p>\r\n\r\n<p>Annesi Fatma Zehra Hanım\'ı 1848 yılında kaybedince çocukluğunu Tekirdağ Valisi dedesi Abdüllatif Paşa\'nın yanında, Rumeli ve Anadolu\'da geçiren Namık Kemal, Afyon Müftüsü Buharalı Hacı Velid Efendi\'den gördüğü eğitimin yanı sıra özel derslerle Arapça ve Farsça öğrendi.</p>\r\n<p>\r\nAfyon Mevlevi Tekkesi neyzenbaşı Coşkun Dede\'den tarikat usullerini öğrenen Kemal, Mart 1853\'te Kars Kaymakamlığına tayin edilen dedesiyle bu kente gitti.\r\n</p><p>\r\nKemal, Kars\'ta kaldığı 1,5 yılda Karslı şair ve müderris Vaizzade Seyid Mehmet Hamid Efendi\'den tasavvuf ilmini, divan edebiyatını öğrendi, hocasının teşvik etmesiyle ilk şiir denemelerini kaleme aldı.\r\n</p><p>\r\nVahdet-i vücut felsefesini ve Muhiddin Arabi\'yi, Mevlana\'yı inceleme fırsatı bulan şair, Kara Veli Ağa adındaki kır serdarından avcılık, atıcılık, cirit oyunu dersleri aldı.\r\n</p><p>\r\nBabasının 1855\'te Filibe kentine mal müdürü ve dedesinin Sofya Kaymakamlığına atanması ile Sofya\'ya giden Namık Kemal, 16 yaşındayken Niş kadısı Mustafa Ragıp Efendi\'nin kızı Nesibe Hanım ile evlendi.\r\n</p><p>\r\nSofya\'da evlerine ziyarete gelen dedesinin arkadaşı şair Binbaşı Eşref Bey, şiirlerini okuduktan sonra bir mahlasname düzenleyerek asıl adı \"Mehmet Kemal\" olan usta edebiyatçıya \"Namık\" ismini verdi.\r\n</p>\r\n', 'namikkemal.jpg', '02-12-2022 ', 79, 0, 'namik kemal'),
(36, 'NineWest', 'Nıne West’in ilk outlet mağazası açıldı!', 'Nine West, Türkiye’deki ilk outlet mağazasını 27 Temmuz Cumartesi günü Pendik Optimum’da açtı!', '<p>Yeni sezon ve eski sezon ürünlerin yer aldığı ilk Nine West outlet mağazası, ürün çeşitliliği ile müşterilerine daha uygun fiyatlarla alışveriş keyfi yaşatıyor.</p>\r\n<p>\r\nNine West’in dünya çapında mağazalarını tasarlayan mimari ekip tarafından hazırlanan Nine West Optimum Outlet mağazası, beyaz ağırlıklı, ferah konsepti ile Optimum giriş katında 95 m2 alanda yer alıyor. Diğer Nine West mağazalarından farklı olarak Optimum mağazasında self servis alışveriş yapabilir, kendi numaranızı kendiniz seçebilirsiniz.</p>\r\n<p>\r\nZaman zaman sürpriz kampanyaların da olacağı Nine West’in Türkiye’deki ilk outlet mağazasına mutlaka uğrayın. Uygun fiyatlarla rahat ve keyifli bir alışverişin tadını çıkarın!</p>', 'ninewest.jpg', '01-12-2022 ', 19, 1, 'ninewest'),
(35, 'FLO', 'Teknoloji destekli yeni nesil alışveriş deneyimi Flo’da', 'Birbirinden güçlü markaları ve geniş ürün yelpazesi ile 3 kıtada 21 ülkede müşterilerine ulaşan şirket, dijitalleşmeyi odağına alarak sektöre öncülük edecek projeler geliştirmeye devam ediyor', '<p>İSTANBUL (AA) - Flo, teknolojiyi işlerinin odağına konumlandırarak dijital dönüşüm yolculuğunda online ve offline kanallar arasındaki duvarları kaldırdığı Flo Asist ile müşterilerine yeni nesil alışveriş deneyimi sunuyor.\r\n</p>\r\n<p>\r\nFlo açıklamasına göre, birbirinden güçlü markaları ve geniş ürün yelpazesi ile 3 kıtada 21 ülkede müşterilerine ulaşan şirket, dijitalleşmeyi odağına alarak sektöre öncülük edecek projeler geliştirmeye devam ediyor.\r\n</p>\r\n<p>\r\n<p>\r\nMüşterilerinin talep ve ihtiyaçlarına yönelik ürün ve hizmetlerini geliştiren Flo, omni-channel bir yaklaşım ile perakende sektörünün dinamiklerini ve mağazaların dönüşen rolünü göz önünde bulundurarak online ve offline duvarları kaldırıyor.\r\n\r\nFlo hayata geçirdiği yeni projesi Flo Asist ile mağaza ve online kanallarındaki tüketici hareketlerini birbirine entegre ederek müşterisini anlayan, kolay, keyifli yeni nesil bir alışveriş deneyimi sunmaya başladı.\r\n\r\nFlo, yeni dijital kahramanı Flo Asist çatısı altında anlattığı üç farklı yenilikçi uygulama sayesinde perakende sektöründeki teknolojik dönüşüme öncülük ediyor.\r\n</p><p>\r\nKolay Mağaza uygulaması ile müşteriler, Flo mağazalarında stok bilgileri, ürün yorumları, en çok satan ürünleri inceleyebiliyorken; üyelik programı olan Flo Plus sayesinde her alışverişte puan ve birçok farklı avantaj elde ediyor. Ayağında Gör uygulaması ise AR lensler aracılığıyla tüketicilere nerede olursa olsun denemek istedikleri ayakkabıyı ayaklarındaymış gibi görebilme imkanı sağlıyor.\r\n\r\n- \'Online ve offline alışveriş arasındaki duvarları kaldıran projeler geliştirdik\'\r\n\r\nAçıklamada görüşlerine yer verilen Flo Mağazacılık Üst Yöneticisi (CEO) Burak Övünç, dünyayı etkisi altına alan dijital dönüşüm rüzgarı ve dönüşen çağın gerekliliklerine uygun olarak 2018 yılında başlattıkları teknoloji yatırımlarını hızlandırdıklarını ifade etti.\r\n\r\nÖvünç, \'Dijitalleşmeyi tüm fonksiyonlarımızı birbirine bağlayan bir can damarı olarak görüyoruz. Bu kapsamda teknolojiyi işlerimizin odağına konumlandırıyor ve teknolojik gelişmelerin bize sağladığı imkanlardan sektörümüze öncülük edecek şekilde yararlanmaya çalışıyoruz.\' ifadelerini kullandı.\r\n\r\nOmni-channel bir yaklaşım ile perakende sektörünün dinamiklerini, mağazaların dönüşen rolünü göz önünde bulundurarak online ve offline alışveriş arasındaki duvarları kaldıran projeler geliştirdiklerini kaydeden Övünç, \'Tüm kanallarımızı ve markalarımızı 360 derece örebileceğimiz bir yapı üzerine inşa ettik ve müşteriyi en iyi anlayan, kolay, keyifli bir alışveriş deneyimi sunma hedefimiz doğrultusunda dijital kahramanımız Flo Asist’i tasarladık.\r\n\r\nKolay Mağaza, Ayağında Gör ve Flo Plus uygulamalarıyla zenginleştirdiğimiz omni-channel yolculuğumuzun kampanya döneminde ise FLO Asist’e gençlerin severek takip ettiği oyuncu Cemre Baysel’i eşlik etti.\' açıklamasında bulundu.</p>', 'FLO-Cemre-Baysel.jpg', '01-12-2022 ', 43, 0, 'flo'),
(38, 'Lumberjack', 'Lumberjack Golf Cup’ta şampiyonlar ödüllerini aldı', 'FLO Mağazacılık Yönetim Kurulu Başkanı Mehmet Ziylan’ın ev sahipliğini üstlendiği, iş dünyasının önde gelen isimlerinin buluştuğu turnuvaya 250 sporcu katıldı.', '<p>Lumberjack Golf Cup, Cumhuriyet Bayramı haftasında 250 golf sporcusunu Kemer Country Golf Club’ta bir araya getirdi. FLO Mağazacılık Yönetim Kurulu Başkanı Mehmet Ziylan’ın ev sahipliğini üstlendiği, Demirören Holding Yönetim Kurulu ve Golf Federasyonu Başkanı Yıldırım Demirören, Nihat Özdemir, Kıvanç Oktay gibi iş dünyasının önde gelen isimlerinin buluştuğu turnuva 250 sporunun katılımıyla üç gün sürdü. Teksas Scramble formatında ikili takım halinde oynanan turnuvada, gross birinciliğini Kemal Veli ve Mehmet Kazan’ın takımı kazandı. Net takım birinciliğini kazanan isimler ise Ataşehir Golf Kulübü’nden Murat Karaduman ve Cüneyt Sapmaz oldu. Kazananlara kupalarını Golf Federasyonu Başkanı Yıldırım Demirören, Nihat Özdemir, Revna Demirören ve Mahmut Ziylan verdi.</p>\r\n\r\n<h1> JUNiOR GOLFÇÜLER SAHNEDEYDi </h1>\r\n<p>\r\nTurnuva kapsamında özel ödüller de sahiplerini buldu. ‘Kadınlar En Uzun Vuruş’u Evrim Çetin, ‘Erkekler En Uzun Vuruş Ödülü’nü ise Mert Kızılkaya aldı. ‘Bayrağa En Yakın Vuruş Ödülü’ne İhsan Kızılkaya adını yazdırırken, kadınlarda Çağla Metin kürsüye çıktı. Junior gross kategorisinde Can Marko Özdemir ve 9 çukur akademi oynayan Emin Zülfikari gross birinciliğini elde etti. </p>', '635ef1724e3fe022ac6901d4.webp', '02-12-2022 ', 23, 1, 'lumberjack'),
(39, 'TEKINDER', 'Python Uygulama ve Eğitim Atölyesi', 'İBB Veri Laboratuvarı (@verilaboratuvari) ve Teknoloji ve İnsan Derneği (@tekinderorg) işbirliginde 19-20 Kasım 2022 tarihlerinde 2 günlük \"Python Uygulama ve Eğitim Atölyesi\" konulu bir mikro eğitim düzenlemiştir. ', '<p>İBB Veri Laboratuvarı (@verilaboratuvari) ve Teknoloji ve İnsan Derneği (@tekinderorg) işbirliginde 19-20 Kasım 2022 tarihlerinde 2 günlük \"Python Uygulama ve Eğitim Atölyesi\" konulu bir mikro eğitim düzenlemiştir. </p><p>\r\nDernek Başkanımız Sn. Mehmet Selçuk Batal\'ın (@msbatal) yürütücülüğünde düzenlenen bu ücretsiz ve online eğitim sayesinde katılımcıların temel seviyede Python dilini öğrenmeleri ve Python ile ilk uygulamalarını oluşturarak yazılım dünyasına adım atmaları amaçlanmıştır.</p>', 'tekinder.jpg', '02-12-2022 ', 17, 1, 'tekinder'),
(42, 'HEETSOFT', 'HeetSoft Hakkında', 'HEETSOFT Bilgi Teknolojileri AŞ, alanında önde gelen kurumsal firmalarda üst düzey yöneticilikte 20 yılı aşkın süredir tecrübeli ve deneyimli ekibi ile orta ve büyük ölçekli kuruluşlara yazılım çözümleri ve danışmanlık hizmetleri sunmaktadır.', '<p>\r\nMisyonumuz, sürdürülebilir, katma değeri yüksek; hızlı, kaliteli ve yeni nesil teknolojik çözümler sağlayarak müşterilerimizi Dünya ölçeğindeki rekabette bir adım öne taşımaktır.\r\n</p>\r\n<p>\r\nVizyonumuz, sektörel ihtiyaçları güncel olarak tespit edip bu ihtiyaçlara ve hızla değişen rekabet koşullarına uygun, yenilikçi teknolojiler ile çözümler sunmaktır.\r\n</p>', 'original_6158ea4c76c0730c6948f952_6159ded8c2c2e.webp', '02-12-2022 ', 18, 1, 'heetsoft'),
(41, 'WhatsApp', 'WhatsApp, iOS kullanıcıları için yeni bir fonksiyon üzerinde çalışıyor', 'Anlık haberleşme uygulaması WhatsApp, tarihe göre mesaj arama özelliği üzerinde çalışıyor! İşte detaylar...', '<p>WABetaInfo, bugün blog hesabından paylaştığı bir yazıda iOS için 22.19.0.73 WhatsApp beta güncellemesinde yeni bir özelliğin test edildiğini duyurdu. Yenilik, ilk olarak iki yıl önce geliştirilmeye başlanmıştı fakat kararlı sürüme gelmeden ertelendi. Yeni özellik sayesinde iOS WhatsApp kullanıcıları, tarihe göre mesaj üzerinden arama yapacak. Peki, WhatsApp iOS için test aşamasındaki yeniliğin detayları nedir? Haberin ayrıntılarına hep birlikte göz atalım.<p>\r\n\r\n<h2>WhatsApp iOS için tarihe göre mesaj arama özelliği</h2>\r\n<p>\r\nAnlık haberleşme uygulaması WhatsApp, bir süre önce sohbet içi mesaj arama özelliğini tüm kullanıcılarına sundu. Bu özellik, sohbet içerisindeki arama yerine kelime yazarak mesajın içinden eşleştirmeyle sonuçların çıkmasını sağlıyor. Platform, şimdi de bunu genişleterek WhatsApp kullanıcılarının tarihe göre arama yapmasını sağlayacak. \r\n</p>\r\n<p>\r\nBireysel ve grup sohbetlerinde kullanılacak fonksiyon, yukarıda yer alan görseldeki gibi görünecek. Mesaj aramaya tıkladıktan sonra klavyenin hemen üzerinde yer alacak takvim sembolü sayesinde tarih atlayarak belirlenen zamanın mesajlarına ulaşılmış olacak.\r\n</p>\r\n<p>\r\nTarihe göre arama özelliği, bazı iOS WhatsApp beta kullanıcılarına sunuldu. Fonksiyonun ikinci kez test edildiği için kısa süre içinde kararlı sürüme gelmesi bekleniyor. Fakat ne zaman geleceği şimdilik belli değil.\r\n</p>\r\n<p>\r\nWABetaInfo, ek olarak WhatsApp masaüstü sürümü için geçtiğimiz hafta birçok yeniliğin test edildiğini duyurdu. WhatsApp masaüstü sürüme Aramalar sekmesi ve Sessiz Alma Kısayolu eklenecek. Aramalar sekmesi sayesinde, mobil ve masaüstü sürüme bağlı WhatsApp hesabı senkronize olacak ve arama geçmişi iki cihazda da yer alacak. Sessize Alma Kısayolu sayesinde de gruplar, masaüstü sürümden kolay yoldan susturulmuş olacak.\r\n</p>\r\n<p>\r\nSiz okuyucularımız bu konu hakkında ne düşünüyorsunuz? WhatsApp’ın iOS için test aşamasında olan tarihe göre mesaj arama özelliğini nasıl buldunuz? WhatsApp’tan beklediğiniz yenilikler neler? Görüşlerinizi Yorumlar kısmında belirtebilirsiniz.\r\n</p>', 'whatsapp-tarihe-göre-mesaj-arama-özelliği-test-ediyor.webp', '02-12-2022 ', 9, 1, 'whatsapp'),
(43, 'Basketboll', 'Bu ayakkabılar basketbol tarihine damga vurdu!', 'Nike, 12 Soles ile basketbolun geçmişi, bugünü ve geleceğini tanımlayan bir siluet koleksiyonuyla oyun üzerindeki geniş kapsamlı etkisini kutluyor.', '\r\n<p>\r\n Basketbol, belki de tüm diğer sporlardan daha fazla, sahanın ötesindeki popüler kültür üzerinde iz bırakan bir Spor. Nike\'ın Bruin ve Blazer ile 1972 yılında basketbola girmesinden bu yana markanın saha ayakkabıları atletler, sanatçılar, tasarımcılar, müzisyenler, kaykaycılar ve çok daha fazlasının hayal gücünü harekete geçirdi.\r\n </p><p>\r\n12 Soles ile Nike basketbolun geçmişi, bugünü ve geleceğini tanımlayan bir siluet koleksiyonuyla oyun üzerindeki geniş kapsamlı etkisini kutluyor.\r\n </p><p>\r\nBu ayakkabıların bazıları amansız biçimde anlara bağlı. Diğerleri, bugünün parke kahramanlarını donatıyor ve yeni bir sokak stili ikonları kuşağını giydirirken, gelecek hafızalarda rol almaya hazırlanıyor.\r\n  </p><p>\r\nKoleksiyon, Nike\'ın basketbol mirasının birçok önemli anını temsil ediyor: Nike Air Force 1 (son tekrarları olan SF AF-1 ve AF-1 Upstep Warrior), Nike Air Max 2 Uptempo, Nike Uptempo, Nike Uptempo 97 ve Nike Air Foamposite Pro. Bunlara, Nike\'ın yakın geçmişteki en etkili inovasyonlarından bazıları katılıyor: Nike Kobe XI Elite Low, Nike Zoom KD 9, Nike Kyrie 2 ve Air Jordan XXXI. Seçkiyi üç Jordan ikonu tamamlıyor: Air Jordan IX Retro, Air Jordan XI Retro ve Air Jordan XVI Retro.\r\n  </p><p>\r\nTüm tasarımlar arasındaki bağlantı, atletlerin ihtiyaçlarına devamlı odaklanarak yakalanmış olan, inkar edilemez bir spor DNA\'sı ve kültürler arası bağ kurmaya yönelik esrarengiz bir kapasite.</p>', 'rBNaOWCsYZGAPcsNAAZv2iC-1fM211.jpg', '02-12-2022 ', 6, 1, 'basketboll');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user-name` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `user-name`, `password`) VALUES
(1, '123', '40bd001563085fc35165329ea1ff5c5ecbdbbeef');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
