CREATE TABLE `bolgeler` (
  `bolge_id` int(11) NOT NULL AUTO_INCREMENT,
  `bolge_no` varchar(1) COLLATE utf8_turkish_ci NOT NULL,
  `bolge_ad` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`bolge_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=21 ;

--
-- Tablo döküm verisi `bolgeler`
--

INSERT INTO `bolgeler` VALUES(1, 'D', 'Doğu');
INSERT INTO `bolgeler` VALUES(2, 'B', 'Batı');
INSERT INTO `bolgeler` VALUES(3, 'K', 'Kuzey');
INSERT INTO `bolgeler` VALUES(4, 'G', 'Güney');
INSERT INTO `bolgeler` VALUES(5, 'Y', 'Yaya');
INSERT INTO `bolgeler` VALUES(6, 'F', 'Flaşör');
INSERT INTO `bolgeler` VALUES(7, 'S', 'Seyyar');
INSERT INTO `bolgeler` VALUES(20, '8', 'merkez');

-- --------------------------------------------------------

--
-- Tablo yapısı: `ekler`
--

CREATE TABLE `ekler` (
  `ek_id` int(11) NOT NULL AUTO_INCREMENT,
  `id` int(11) NOT NULL,
  `dosya` varchar(150) COLLATE utf8_turkish_ci NOT NULL,
  `tur` tinyint(1) NOT NULL,
  PRIMARY KEY (`ek_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=37 ;

--
-- Tablo döküm verisi `ekler`
--

INSERT INTO `ekler` VALUES(14, 37, '2_76895_447468378750_645398750_5333211_4964586_n.jpg', 2);
INSERT INTO `ekler` VALUES(13, 37, '2_74816_449835517583_549522583_5492806_2141794_n.jpg', 2);
INSERT INTO `ekler` VALUES(12, 36, '2_74281_449835317583_549522583_5492803_5321518_n.jpg', 2);
INSERT INTO `ekler` VALUES(11, 36, '2_72274_447467743750_645398750_5333181_2393765_n.jpg', 2);
INSERT INTO `ekler` VALUES(36, 11, '6_papuayenigine.jpg', 3);

-- --------------------------------------------------------

--
-- Tablo yapısı: `evraklar`
--

CREATE TABLE `evraklar` (
  `eid` int(11) NOT NULL AUTO_INCREMENT,
  `evrakno` int(11) NOT NULL,
  `olusturma_tarihi` date NOT NULL,
  `alici` int(11) NOT NULL,
  `geldigi_yer` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  `aciklama` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `evrak_sonucu` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `cikis_tarihi` date NOT NULL,
  `yaziisleri_sonuclanmasi` tinyint(2) NOT NULL,
  PRIMARY KEY (`eid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=12 ;

--
-- Tablo döküm verisi `evraklar`
--

INSERT INTO `evraklar` VALUES(1, 1231223123, '2011-04-07', 1, 'daire başkanlığı', 'açıklamadır.', 'sonuç açıklaması yok.', '1999-11-30', 1);
INSERT INTO `evraklar` VALUES(2, 123123, '1970-01-01', 2, '123', '212312', '234234', '1955-12-12', 0);
INSERT INTO `evraklar` VALUES(3, 123123, '1970-01-01', 2, '123', '212312', '234234', '1955-12-12', 0);
INSERT INTO `evraklar` VALUES(4, 123123, '1970-01-01', 9, 'aaaaaaaabbbbbbbbbb', '', 'cccccccccc', '1970-01-01', 1);
INSERT INTO `evraklar` VALUES(5, 123123, '1955-01-01', 1, 'asdasd', 'asdasdasd', '234234', '1955-12-12', 1);
INSERT INTO `evraklar` VALUES(6, 123123, '1955-01-01', 1, 'asdasd', 'asdasdasd', '234234', '1955-12-12', 1);
INSERT INTO `evraklar` VALUES(7, 11, '1970-01-01', 1, 'aaaaaaaabbbbbbbbbb', 'aaaaaaa', '234234', '1970-01-01', 0);
INSERT INTO `evraklar` VALUES(8, 11, '1970-01-01', 1, 'aaaaaaaabbbbbbbbbb', 'aaaaaaa', '234234', '1970-01-01', 0);
INSERT INTO `evraklar` VALUES(9, 11, '1970-01-01', 1, 'aaaaaaaabbbbbbbbbb', 'aaaaaaa', '234234', '1970-01-01', 0);
INSERT INTO `evraklar` VALUES(10, 123123, '1955-01-01', 1, 'daire başkanlığı', 'yokkk', '234234', '1970-01-01', 1);
INSERT INTO `evraklar` VALUES(11, 2123123, '1955-01-01', 1, 'asdasd', 'asdasd', 'asdasd', '1955-12-12', 0);

-- --------------------------------------------------------

--
-- Tablo yapısı: `kavsaklar`
--

CREATE TABLE `kavsaklar` (
  `kavsak_id` int(11) NOT NULL AUTO_INCREMENT,
  `kavsak_kod` int(11) NOT NULL,
  `kavsak_ad` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `kavsak_cihaz` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `kavsak_grupsayisi` int(11) NOT NULL,
  `kavsak_bolgesi` int(11) NOT NULL,
  `kavsak_durumu` tinyint(2) NOT NULL DEFAULT '0',
  `kavsak_yapimtarihi` date NOT NULL,
  `kavsak_adres` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`kavsak_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=452 ;

--
-- Tablo döküm verisi `kavsaklar`
--

INSERT INTO `kavsaklar` VALUES(1, 12, 'Şehitler Okulu', 'İsb K32', 1, 1, 1, '0000-00-00', 'sad');
INSERT INTO `kavsaklar` VALUES(2, 11, 'Altındağ Havuzlu Kahve', 'Mas8', 1, 1, 1, '0000-00-00', 'daa');
INSERT INTO `kavsaklar` VALUES(3, 1, 'Bayramyeri', 'Mas20', 1, 20, 1, '0000-00-00', 'ghjkg');
INSERT INTO `kavsaklar` VALUES(4, 2, 'Kestelli', 'Mas20', 1, 20, 1, '2010-01-01', 'gcb');
INSERT INTO `kavsaklar` VALUES(5, 3, 'Agora', 'Mas20', 1, 20, 1, '2011-01-01', 'ddasf');
INSERT INTO `kavsaklar` VALUES(6, 4, 'Mezarlıkbaşı', 'Mas20', 1, 20, 1, '2011-01-01', 'sa');
INSERT INTO `kavsaklar` VALUES(7, 5, 'Çankaya', 'Mas20', 1, 20, 1, '2011-01-01', 'asda');
INSERT INTO `kavsaklar` VALUES(8, 6, 'İtfaiye', 'Mas20', 1, 20, 1, '2011-01-03', 'asdsf');
INSERT INTO `kavsaklar` VALUES(9, 7, 'Şair Eşref Bulvarı Hürriyet Bulvarı', 'Mas8', 1, 20, 1, '2011-01-01', 'fdsa');
INSERT INTO `kavsaklar` VALUES(10, 8, 'Şair Eşref', 'Mas20', 1, 20, 1, '2011-01-01', 'asfd');
INSERT INTO `kavsaklar` VALUES(11, 9, 'Alsancak Camii', 'Mas20', 1, 20, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(12, 10, 'Tekel Önü', 'Mas20', 1, 20, 1, '2011-01-01', 'as');
INSERT INTO `kavsaklar` VALUES(13, 11, 'Alsancak Gar', 'Mas20', 1, 20, 1, '0000-00-00', 'as');
INSERT INTO `kavsaklar` VALUES(14, 12, 'Sabancı Kültür Merkezi', 'Mas8', 1, 20, 1, '2011-01-01', 'da');
INSERT INTO `kavsaklar` VALUES(15, 13, 'Bahribaba Park Önü', 'Mas20', 1, 20, 1, '2011-01-01', 'cas');
INSERT INTO `kavsaklar` VALUES(16, 14, 'Gümrük', 'mas24', 1, 20, 1, '2011-01-01', 'das');
INSERT INTO `kavsaklar` VALUES(17, 15, 'Cumhuriyet Meydanı', 'Mas20', 1, 20, 1, '2011-01-01', 'da');
INSERT INTO `kavsaklar` VALUES(18, 16, 'Rektörlük', 'Mas20', 1, 20, 1, '2011-01-01', 'dsafa');
INSERT INTO `kavsaklar` VALUES(19, 17, 'Nato Önü', 'Mas20', 1, 20, 1, '2011-01-01', 'dasf');
INSERT INTO `kavsaklar` VALUES(20, 18, 'Gazi İlkokulu', 'Mas20', 1, 20, 1, '2011-01-01', 'dfasd');
INSERT INTO `kavsaklar` VALUES(21, 19, 'Sevinç Pastanesi', 'Mas20', 1, 20, 1, '2011-01-01', 'dsaas');
INSERT INTO `kavsaklar` VALUES(22, 20, 'Nato Plevne', 'Mas20', 1, 20, 1, '2010-01-01', 'casd');
INSERT INTO `kavsaklar` VALUES(23, 21, 'Fevzipaşa1', 'Mas20', 1, 20, 1, '2011-01-01', 'asd');
INSERT INTO `kavsaklar` VALUES(24, 22, 'Basmane', 'Mas20', 1, 20, 1, '2011-01-01', 'dasds');
INSERT INTO `kavsaklar` VALUES(25, 23, '9 Eylül Meydanı', 'mas24', 1, 20, 1, '2011-01-01', 'da');
INSERT INTO `kavsaklar` VALUES(26, 24, 'Bozkurt', 'Mas20', 1, 20, 1, '2011-01-01', 'sad');
INSERT INTO `kavsaklar` VALUES(27, 25, 'Kahramanlar', 'Mas20', 1, 20, 1, '2011-01-01', 'dasf');
INSERT INTO `kavsaklar` VALUES(28, 26, '26 Ağustos Kapısı', 'İsb A32', 1, 20, 1, '2011-01-01', 'dfa');
INSERT INTO `kavsaklar` VALUES(29, 27, 'Spor Salonu', 'Mas20', 1, 20, 1, '2011-01-01', 'dfa');
INSERT INTO `kavsaklar` VALUES(30, 28, 'Montrö Meydanı', 'İsb K32', 1, 20, 1, '2011-01-01', 'faf');
INSERT INTO `kavsaklar` VALUES(31, 29, 'Lozan Meydanı', 'İsb K32', 1, 20, 1, '2011-01-01', 'fasd');
INSERT INTO `kavsaklar` VALUES(32, 1, 'Eşrefpaşa', 'Mas20', 1, 4, 1, '2011-01-01', 'dsf');
INSERT INTO `kavsaklar` VALUES(33, 2, 'Yağhaneler CAmii', 'Cx8', 1, 4, 1, '2011-01-01', 'fda');
INSERT INTO `kavsaklar` VALUES(34, 3, 'Yağhaneler', 'Mas20', 1, 4, 1, '2011-01-01', 'ffs');
INSERT INTO `kavsaklar` VALUES(35, 4, 'Halide Edip Adıvar Benzinlik', 'Mas20', 1, 4, 1, '2011-01-01', 'faf');
INSERT INTO `kavsaklar` VALUES(36, 5, 'Karabağlar Orjaner', 'Mas20', 1, 4, 1, '2011-01-01', 'sfaf');
INSERT INTO `kavsaklar` VALUES(37, 6, 'Karabağlar Fethibaba', 'Mas20', 1, 4, 1, '2011-01-01', 'fas');
INSERT INTO `kavsaklar` VALUES(38, 8, 'Karabağlar Yaşayanlar İlkokulu', 'Mas20', 1, 4, 1, '2011-01-01', 'dfas');
INSERT INTO `kavsaklar` VALUES(39, 9, 'Karabağlar PTT Önü Yaya', 'Mas4', 1, 4, 1, '2011-01-01', 'dsfd');
INSERT INTO `kavsaklar` VALUES(40, 10, 'Karabağlar Mezarlık Önü', 'Mas20', 1, 4, 1, '2011-01-01', 'dsf');
INSERT INTO `kavsaklar` VALUES(41, 11, 'Karabağlar Gediz Caddesi', 'Mas20', 1, 4, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(42, 12, 'Karabağlar Gaziemir Garaj', 'Mas20', 1, 4, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(43, 13, 'Serbest Bölge', 'İsb K32', 1, 4, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(44, 15, 'Gaziemir Tansaş', 'İsb K32', 1, 4, 1, '2011-01-01', 'asd');
INSERT INTO `kavsaklar` VALUES(45, 16, 'Gaziemir Belediye Önü', 'İsb A8', 1, 4, 1, '2011-01-01', 'sa');
INSERT INTO `kavsaklar` VALUES(46, 17, 'Sarnıç', 'İsb K32', 1, 4, 1, '2011-01-01', 'sad');
INSERT INTO `kavsaklar` VALUES(47, 18, 'Sarnıç Hava Eğitim Komutanlığı', 'İsb A32', 1, 4, 1, '2011-01-01', 'sad');
INSERT INTO `kavsaklar` VALUES(48, 20, 'Şirinyer Nato', 'Mas20', 1, 4, 1, '2011-01-01', 'da');
INSERT INTO `kavsaklar` VALUES(49, 21, 'Tuğsavul Okulu', 'Mc 8', 1, 4, 1, '2011-01-01', 'fasf');
INSERT INTO `kavsaklar` VALUES(50, 22, 'Şirinyer Koşuyolu', 'Mas20', 1, 4, 1, '2011-01-01', 'fasf');
INSERT INTO `kavsaklar` VALUES(51, 23, 'Şirinyer İşçievleri', 'Mas8', 1, 4, 1, '2011-01-01', 'ass');
INSERT INTO `kavsaklar` VALUES(52, 24, 'Şirinyer Tapu', 'Mas20', 1, 4, 1, '2011-01-01', 'csf');
INSERT INTO `kavsaklar` VALUES(53, 25, 'Şirinyer Evka1', 'Mas20', 1, 4, 1, '2011-01-01', 'dfa');
INSERT INTO `kavsaklar` VALUES(54, 26, 'Buca Heykel', 'Mas12', 1, 4, 1, '2011-01-01', 'fcbc v');
INSERT INTO `kavsaklar` VALUES(55, 27, 'Zincirlikuyu(Fırın)', 'Cx8', 1, 4, 1, '2011-01-01', 'as');
INSERT INTO `kavsaklar` VALUES(56, 28, 'Yadigar Cami', 'İsb A32', 1, 4, 1, '2011-01-14', 'AS');
INSERT INTO `kavsaklar` VALUES(57, 29, 'Uzundere', 'ITC8', 1, 4, 1, '2011-01-01', 'AS');
INSERT INTO `kavsaklar` VALUES(58, 30, 'Halide Edip-Köstence Köprü Altı', 'mas24', 1, 4, 1, '2011-01-01', 'AS');
INSERT INTO `kavsaklar` VALUES(59, 31, 'Toplum Polisi', 'İsb A32', 1, 4, 1, '2011-01-01', 'AS');
INSERT INTO `kavsaklar` VALUES(60, 32, 'Bozyaka SSK', 'İsb A32', 1, 4, 1, '2011-01-01', 'AS');
INSERT INTO `kavsaklar` VALUES(61, 33, 'Ali Rıza Avni Bul - 510 Sok.', 'İsb K8', 1, 4, 1, '2011-01-01', 'as');
INSERT INTO `kavsaklar` VALUES(62, 34, 'Üzümcü Okulu', 'Kutu', 1, 4, 1, '2011-01-01', 'as');
INSERT INTO `kavsaklar` VALUES(63, 35, 'Fevzi Çakmak İ.Ö.O', 'İsb K8', 1, 4, 1, '2011-01-01', 'as');
INSERT INTO `kavsaklar` VALUES(64, 36, 'Türkan Saylan Cd.-Feridun Pözüt Cd.', 'İsb A32', 1, 4, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(65, 37, 'Abdülhamit Yavuz Cd.Lojmanlar', 'İsb K32', 1, 4, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(66, 38, 'Abdülhamit Yavuz  Cd. Denmar Önü', 'Mas12', 1, 4, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(67, 39, '690 sok. (Sarnıç)', 'Mas12', 1, 4, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(68, 40, 'Sarnıç Köprü İnişi', 'İsb A32', 1, 4, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(69, 41, 'Hat Boyu', 'İsb A8', 1, 4, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(70, 42, 'Buca Hara Tesisleri', 'Mas12', 1, 4, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(71, 43, 'Menderes Cad.-N.Kemal', 'Cx8', 1, 4, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(72, 44, 'Gürçeşme Huzur Evi', 'Mc 8', 1, 4, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(73, 46, 'Buca Sağlık Ocağı', 'Mas8', 1, 4, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(74, 47, 'Buca Fil Heykelleri', 'İsb A32', 1, 4, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(75, 48, 'Buca 313 Sokak', 'Mas20', 1, 4, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(76, 49, 'Buca Çevik 1 Meydanı', 'İsb A32', 1, 4, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(77, 50, 'Tınaztepe Kavşağı', 'İsb A32', 1, 4, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(78, 51, 'Buca Hukuk Fakültesi', 'Mas12', 1, 4, 1, '2011-01-02', 'a');
INSERT INTO `kavsaklar` VALUES(79, 52, 'Yeşildere Ballıkuyu', 'mas24', 1, 4, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(80, 53, 'Buca 150-154 Sokak', 'Itc 12', 1, 4, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(81, 54, 'Gaziemir Ulaştırma Alt Geçidi', 'İsb K8', 1, 4, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(82, 55, 'Doğuş Caddesi Hoca Ahmet Yesevi Caddesi', 'İsb K32', 1, 4, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(83, 56, 'Buca Sebze Hali', 'İsb A8', 1, 4, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(84, 60, 'Kısıkköy Sanayi Sitesi', 'İsb K8', 1, 4, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(85, 61, 'İzmir Ayrancılar Egekent Ayrımı', 'Mae 16', 1, 4, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(86, 62, 'İzmir Ayrancılar Dörtyol Ayrımı', 'Ort 16', 1, 4, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(87, 63, 'Yazıbaşı', 'Mas12', 1, 4, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(88, 64, 'İzmir Torbalı Kemalpaşa Aydın Ayr.', 'Mae 16', 1, 4, 1, '2010-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(89, 65, 'İzmir Torbalı Bayındır Ayrımı', 'Mae 16', 1, 4, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(90, 66, 'İzmir Torbalı Garajönü Aydın Ayr.', 'Ort 16', 1, 4, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(91, 67, 'İzmir Torbalı Çaybaşı Bayındır Ayr.', 'Ort 16', 1, 4, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(92, 68, 'İzmir Bayındır Şehir Merkezi Ayr.', 'İsb K8', 1, 4, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(93, 69, 'İzmir Görece Göçmen Konutları', 'Mae 16', 1, 4, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(94, 70, 'İzmir Görece Köy İçi', 'Mas8', 1, 4, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(95, 71, 'Menderes Girişi', 'MAs16', 1, 4, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(96, 72, 'İzmir Menderes Dereköy Ayr.', 'Sin 16', 1, 4, 1, '2011-02-25', 'a');
INSERT INTO `kavsaklar` VALUES(97, 73, 'İzmir Selçuk Şirince Ayrımı', 'Mae 16', 1, 4, 1, '2010-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(98, 74, 'İzmir Selçuk Kuşadası Ayr. Garaj', 'Mae 16', 1, 4, 1, '2011-01-24', 'a');
INSERT INTO `kavsaklar` VALUES(99, 1, 'Kapılar', 'mas24', 1, 1, 1, '2011-01-01', 'dfa');
INSERT INTO `kavsaklar` VALUES(100, 75, 'İzmir Selçuk Pamucak Kuşadası Ayrımı', 'mas8', 1, 4, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(101, 2, 'Viyadükaltı', 'mas24', 1, 1, 1, '2011-01-01', 'asc');
INSERT INTO `kavsaklar` VALUES(102, 76, 'Gümüldür Doğanbey Payamlı Ayrımı', 'mae16', 1, 4, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(103, 77, 'Doğanbey Halk Pazarı Denizkent', 'mas8', 1, 4, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(104, 78, 'İzmir Bayındır Anadolu Lisesi', 'mae12', 1, 4, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(105, 1, 'Altıntaş Yaya', 'mas4', 1, 2, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(106, 2, 'Üçyol', 'mas20', 1, 2, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(107, 4, 'Yenişehir Cami', 'mas24', 1, 1, 1, '2011-01-01', 'dsf');
INSERT INTO `kavsaklar` VALUES(108, 3, 'Yeşilyurt', 'mas24', 1, 2, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(109, 5, 'Eşrefpaşa Hastanesi', 'mas24', 1, 1, 1, '2011-01-01', 'asd');
INSERT INTO `kavsaklar` VALUES(110, 4, 'Askeri Hastane', 'ıtc8', 1, 2, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(111, 6, 'SSK Hastane Önü', 'mas24', 1, 1, 1, '2011-01-01', 'dsö');
INSERT INTO `kavsaklar` VALUES(112, 5, 'Çeşme Durak', 'ıtc8', 1, 2, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(113, 7, 'Yenişehir Doğum Evi Önü', 'Mas8', 1, 1, 1, '2011-01-01', 'dsf');
INSERT INTO `kavsaklar` VALUES(114, 6, 'Nokta Durak', 'ıtc8', 1, 2, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(115, 8, 'Gıda Çarşısı', 'mas24', 1, 1, 1, '2011-01-17', 'dsva');
INSERT INTO `kavsaklar` VALUES(116, 8, 'Tibaş', 'ıtc8', 1, 2, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(117, 10, 'İslam Enstitüsü', 'cx12', 1, 2, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(118, 9, 'Gaziler Caddesi İzsu', 'Mas8', 1, 1, 1, '2011-01-01', 'aas');
INSERT INTO `kavsaklar` VALUES(119, 11, 'Kız Koleji', 'ıtc8', 1, 2, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(120, 10, 'Miralay Fethi Bey', 'Mas20', 1, 1, 1, '2011-01-23', 'fa');
INSERT INTO `kavsaklar` VALUES(121, 12, 'Hıfzısıha', 'cx8', 1, 2, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(122, 13, 'Esendere Yaya', 'cx8', 1, 2, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(123, 14, 'Poligon', 'Kutu', 1, 2, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(124, 15, 'Denizmen', 'mas8', 1, 2, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(125, 16, 'Güzelyalı Tansaş', 'isb-a32', 1, 2, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(126, 17, 'F.Altay', 'mas24', 1, 2, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(127, 18, 'M.Paşa 126 Sokak', 'mas24', 1, 2, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(128, 13, 'İzotaş', 'İsb A32', 1, 1, 1, '2011-01-01', 's');
INSERT INTO `kavsaklar` VALUES(129, 19, 'Güzelyalı Park', 'mas24', 1, 2, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(130, 20, 'Basınsitesi Huzurevi', 'cx8', 1, 2, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(131, 21, 'Polat Akevler', 'cx8', 1, 2, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(132, 22, 'Balçova Otoyol Çıkışı', 'mas8', 1, 2, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(133, 23, 'Balçova Dalya Sokak', 'mas8', 1, 2, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(134, 24, 'Orhangazi İlköğretim Okulu', 'mas16', 1, 2, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(135, 25, 'M.K.S.B Karataş', 'mas20', 1, 2, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(136, 26, 'M.K.S.B Tnt Express', 'mas4', 1, 2, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(137, 27, 'M.K.S.B Paşa Konağı', 'mas20', 1, 2, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(138, 28, 'M.K.S.B Pegasus', 'mas4', 1, 2, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(139, 29, 'M.K.S.B Turkuaz', 'mas4', 1, 2, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(140, 30, 'M.K.S.B Küçükyalı', 'mas24', 1, 2, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(141, 31, 'M.K.S.B Göztepe', 'mas24', 1, 2, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(142, 32, 'M.K.S.B Güzelyalı', 'mas24', 1, 2, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(143, 33, 'M.K.S.B Marina', 'mas20', 1, 2, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(144, 34, 'Balçova Ziya Gökalp', 'mas24', 1, 2, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(145, 35, 'Eşref Bitlis Kavşağı', 'isb-a32', 1, 2, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(146, 36, 'Sarmaşık Sokak', 'cx8', 1, 2, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(147, 37, 'Balçova Çağdaş Taksi', 'isb-a32', 1, 2, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(148, 38, 'İnciraltı', 'isb-k32', 1, 2, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(149, 39, '9 Eylül Hastanesi Acil Girişi', 'isb-k8', 1, 2, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(150, 40, 'M.Paşa Cad. Cin Deresi', 'cx8', 1, 2, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(151, 41, 'Narlıdere Güzel Sanatlar', 'mas12', 1, 2, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(152, 42, 'N.Dere 2. İnönü Girişi', 'cx8', 1, 2, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(153, 44, 'N.Dere Yenikale', 'cx8', 1, 2, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(154, 45, 'Narlıdere Pazaryeri', 'cx8', 1, 2, 1, '2011-01-23', 'a');
INSERT INTO `kavsaklar` VALUES(155, 46, 'Narlıdere Belediye', 'cx8', 1, 2, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(156, 47, 'Narlıdere Otoban Girişi', 'mas20', 1, 2, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(157, 48, 'Şehitlik', 'mas8', 1, 2, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(158, 49, 'İzulaş Son Durak', 'cx12', 1, 2, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(159, 50, 'İstikham Okulu 4. Kavşağı', 'mc4', 1, 2, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(160, 51, 'İstikham Okulu 3 (Lojmanlar)', 'cx8', 1, 2, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(161, 52, 'İstikham Okulu 2 (Gazino)', 'mas8', 1, 2, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(162, 53, 'Ege Ordu Nizamiye', 'isb-a8', 1, 2, 1, '2011-01-01', 's');
INSERT INTO `kavsaklar` VALUES(163, 54, 'İstihkam Okulu 1 (Nizamiye)', 'mas24', 1, 2, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(164, 55, 'Maltepe Askeri Lisesi', 'mas8', 1, 2, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(165, 56, 'Yemişçi Durağı', 'isb-k8', 1, 2, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(166, 57, 'Güzelbahçe Girişi', 'cx12', 1, 2, 1, '2008-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(167, 58, 'Seferihisar Kavşağı', 'isb-a32', 1, 2, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(168, 60, 'Balçova Kipa', 'mae24', 1, 2, 1, '0000-00-00', 'a');
INSERT INTO `kavsaklar` VALUES(169, 61, 'Narlıdere Tansaş', 'mas24', 1, 2, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(170, 62, 'Marina Feribot Çıkışı', 'mas24', 1, 2, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(171, 63, 'İnciraltı Otel', 'mas12', 1, 2, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(172, 64, 'Balçova Palmiye Ayrımı', 'mas8', 1, 2, 1, '2006-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(173, 65, 'Balçova Best Buy', 'isb-a8', 1, 2, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(174, 66, 'Bahçeler Arası Köprü Altı', 'mas8', 1, 2, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(175, 71, 'İzmir Urla Dörtyol Ayrımı', 'ort16', 1, 2, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(176, 72, 'İzmir Seferihisar Ulamış Ayrımı', 'mae16', 1, 2, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(177, 73, 'İzmir Seferihisar Jandarma Önü', 'sin16', 1, 2, 1, '2008-01-01', '1');
INSERT INTO `kavsaklar` VALUES(178, 74, 'İzmir Seferihisar Şehir Merkezi Ayrımı', 'mas16', 1, 2, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(179, 75, 'Urla Jandarma Önü', 'isb-k32', 1, 2, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(180, 76, 'Urla Geiad İlköğretim Okulu', 'isb-k32', 1, 2, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(181, 1, 'Tersane Önü', 'mas24', 1, 3, 1, '2009-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(182, 3, 'Karşıyaka İskele', 'mas24', 1, 3, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(183, 4, '1740 Sokak', 'mas8', 1, 3, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(184, 5, 'Nikah Salonu', 'mas20', 1, 3, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(185, 6, 'Yunuslar', 'mas24', 1, 3, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(186, 7, 'Yıllar Apartmanı', 'mas8', 1, 3, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(187, 8, 'Bostanlı İskele', 'mas24', 1, 3, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(188, 9, 'Bostanlı Tansaş', 'mas24', 1, 3, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(189, 10, 'Bostanlı Pazaryeri', 'mas8', 1, 3, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(190, 11, 'B.Beşikçioğlu cami', 'mas24', 1, 3, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(191, 12, 'Mavişehir Girişi', 'mas24', 1, 3, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(192, 13, 'Mavişehir Egepark', 'mas24', 1, 3, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(193, 14, 'Atakent', 'isb-k32', 1, 3, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(194, 15, 'Carrefour', 'mas12', 1, 3, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(195, 16, 'C.Dudayev-2040 Sokak', 'mas12', 1, 3, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(196, 17, 'Çiğli Koçtaş', 'isb-a32', 1, 3, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(197, 18, 'Soğukkuyu', 'isb-k32', 1, 3, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(198, 19, 'Dedebaşı', 'isb-k8', 1, 3, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(199, 20, 'Devlet Hastanesi Önü', 'isb-k8', 1, 3, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(200, 21, 'Şemikler', 'mas20', 1, 3, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(201, 22, 'Gün Sazak Bulvarı R.Şardağ Cd. Kesişimi', 'isb-a8', 1, 3, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(202, 23, 'Bostanlı Köprü', 'isb-a32', 1, 3, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(203, 24, 'Çiğli Egekent', 'isb-k32', 1, 3, 1, '2011-01-01', 'as');
INSERT INTO `kavsaklar` VALUES(204, 28, 'Harmandalı', 'isb-k32', 1, 3, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(205, 29, 'Anadolu C. Hava Lojmanları', 'mas8', 1, 3, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(206, 33, 'Ata Sanayi', 'mas20', 1, 3, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(207, 34, 'Aksoy', 'mas24', 1, 3, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(208, 35, 'Girne 1835/1 Sok Migros', 'mas12', 1, 3, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(209, 36, 'Lunapark', 'mas24', 1, 3, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(210, 37, 'Girne Bulvarı Nergis Girişi', 'mas8', 1, 3, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(211, 38, 'O.Ş Gökyay R.Şardağ', 'cx16', 1, 3, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(212, 39, 'K.yaka Bahriye Üçok Blv. Yer Altı  Otp.', 'mas20', 1, 3, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(213, 40, 'Zübeyde Hanım', 'mas16', 1, 3, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(214, 41, 'Ordu Pazarı ', 'mas8', 1, 3, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(215, 42, 'Fevzipaşa İ.Ö.O', 'cx8', 1, 3, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(216, 43, 'Cevdet Bilsay Telekom', 'mas20', 1, 3, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(217, 44, 'Cevdet Bilsay Otobüs Son Durak', 'mas20', 1, 3, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(218, 45, 'Bostanlı Şehitler Bulvarı', 'mas8', 1, 3, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(219, 46, 'Bostanlı Cami', 'mas8', 1, 3, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(220, 47, 'Bostanlı Karakol', 'ıtc12', 1, 3, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(221, 48, 'Bostanlı 6351 Sokak', 'ıtc12', 1, 3, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(222, 49, 'Yeni Girne Bulvarı 1847/13 sk. Kesişimi', 'isb-k32', 1, 3, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(223, 50, 'Bayraklı Üstgeçidi', 'mas12', 1, 3, 1, '2011-01-23', 'a');
INSERT INTO `kavsaklar` VALUES(224, 51, 'Kaklıç Havaalanı', 'isb-k8', 1, 3, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(225, 52, 'Kaklıç Girişi', 'isb-k32', 1, 3, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(226, 53, 'Sasalı Piknik Alanı Girişi', 'isb-k8', 10, 3, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(227, 54, 'Kaklıç Nizamiye', 'isb-k8', 1, 3, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(228, 55, 'Doğal Yaşam Parkı', 'isb-k32', 1, 3, 1, '2011-01-21', 'a');
INSERT INTO `kavsaklar` VALUES(229, 56, 'Sasalı Girişi', 'isb-k32', 1, 3, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(230, 57, 'Tuzla Girişi', 'mas20', 1, 3, 1, '2010-02-24', 'a');
INSERT INTO `kavsaklar` VALUES(231, 60, 'Ulukent', 'Mc8', 1, 3, 1, '2011-01-01', 'as');
INSERT INTO `kavsaklar` VALUES(232, 61, 'Ulukent2', 'Del12', 1, 3, 1, '2011-01-01', 'fa');
INSERT INTO `kavsaklar` VALUES(233, 62, 'İzmir Menemen Tarımsal Araştırma', 'ort16', 1, 3, 1, '2011-01-01', 'sda');
INSERT INTO `kavsaklar` VALUES(234, 63, 'Koyundere', 'ort16', 41, 3, 1, '2011-01-01', 'da');
INSERT INTO `kavsaklar` VALUES(235, 14, 'Kemalpaşa Işıkkent', 'İsb A32', 1, 1, 1, '2011-01-01', 'sd');
INSERT INTO `kavsaklar` VALUES(236, 15, 'Kemalpaşa İzeltaş', 'ıtc8', 1, 1, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(237, 16, 'Schweeps(Otoyol Çıkışı)', 'ıtc8', 1, 1, 1, '2011-01-10', 'a');
INSERT INTO `kavsaklar` VALUES(238, 17, 'Dalan', 'mas8', 1, 1, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(239, 18, 'Bmc Önü', 'isb a32', 1, 1, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(240, 19, 'Tabaş', 'mas8', 1, 1, 1, '2011-01-10', 'a');
INSERT INTO `kavsaklar` VALUES(241, 20, 'Hacılar Kırı Jandarma', 'cx8', 1, 1, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(242, 21, 'İnako Ambarlar', 'mas8', 1, 1, 1, '2011-01-12', 'a');
INSERT INTO `kavsaklar` VALUES(243, 22, 'Işıkkent Mezarlık', 'mas8', 1, 1, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(244, 23, 'Işıkkent Çevreyolu Ayrımı', 'ısb a8', 1, 1, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(245, 24, 'Işıkkent Ayakkabıcılar Sitesi', 'kutu', 1, 1, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(246, 25, 'Yeni Garaj Girişi Kavşağı', 'cx12', 1, 1, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(247, 26, 'Egemak (Kanal Köprü)', 'cx16', 1, 1, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(248, 27, 'Bornova Koçtaş Önü', 'mas8', 1, 1, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(249, 28, 'Ege Ünv. Hastanesi', 'mas24', 1, 1, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(250, 29, 'Bornova Akt. İstasyonu', 'isb k8', 1, 1, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(251, 30, 'Mahvel Durağı', 'isb k32', 1, 1, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(252, 31, 'Osman Kibar', 'isb k32', 1, 1, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(253, 32, 'Sanayi 1 (Egs)', 'mas24', 1, 1, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(254, 33, 'Sanayi 3 (4. Sanayi)', 'isb a32', 1, 1, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(255, 34, 'Doğanlar', 'mas12', 1, 1, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(256, 35, 'Sakarya Abay Cad.', 'ısb k8', 1, 1, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(257, 36, 'Manavkuyu Manas', 'mas24', 1, 1, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(258, 37, 'Sakarya 1593 (Eczane)', 'ısb32', 1, 1, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(259, 38, 'Pehlivanoğlu', 'ısb k32', 1, 1, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(260, 39, 'Dumlupınar', 'isb k32', 1, 1, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(261, 40, 'Y. Migros Çağdaş', 'mas12', 1, 1, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(262, 41, 'M. Kemal Caddesi 207 Sokak', 'mas8', 1, 1, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(263, 42, 'Bornova Stat Önü', 'mas24', 1, 1, 1, '2011-01-24', 'a');
INSERT INTO `kavsaklar` VALUES(264, 43, 'Bornova Katlı Otopark', 'mas24', 1, 1, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(265, 44, 'Bornova Hükümet Konağı', 'mas24', 1, 1, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(266, 45, 'Bornova Büyük Park', 'mc8', 1, 1, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(267, 46, 'Evka Çıkışı Manisa Yolu', 'mas12', 1, 1, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(268, 47, 'Evka 3 Girişi (Diyaliz Merkezi)', 'isb a32', 1, 1, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(269, 48, 'Evka 3 Tansaş Önü', 'mas16', 1, 1, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(270, 49, 'Atatürk Mahallesi Girişi Taşkent', 'ısb k32', 1, 1, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(271, 50, 'Smyrna Meydanı', 'ısb k8', 1, 1, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(272, 51, 'Eski Hal Önü', 'mas20', 1, 1, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(273, 52, 'Fatih Caddesi Vakıflar Kavşağı', 'ısb k32', 1, 1, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(274, 53, 'Kartal Durağı', 'İsb K32', 1, 1, 1, '2011-01-02', 'fdad');
INSERT INTO `kavsaklar` VALUES(275, 54, 'Trafik Eğitim Pisti', 'İsb A32', 1, 1, 1, '2011-01-01', 'dfa');
INSERT INTO `kavsaklar` VALUES(276, 55, 'Kamil Tunca Caddesi - Abdi İpekçi Caddesi', 'İsb K32', 1, 1, 1, '2011-01-01', 'ca');
INSERT INTO `kavsaklar` VALUES(277, 56, 'Abdi İpekçi - Yeşilova', 'Mas12', 1, 1, 1, '2011-01-01', 'fa');
INSERT INTO `kavsaklar` VALUES(278, 57, 'Fatih Caddesi Güneş Oteli', 'Mas8', 1, 1, 1, '2011-01-01', 'afa');
INSERT INTO `kavsaklar` VALUES(279, 58, 'Fatih Caddesi - Refik Tulga Caddesi', 'mas24', 1, 1, 1, '2011-01-05', 'ad');
INSERT INTO `kavsaklar` VALUES(280, 59, 'Fatih Caddesi Yıldırım Beyazıd Caddesi', 'mas24', 1, 1, 1, '2011-01-01', 'fa');
INSERT INTO `kavsaklar` VALUES(281, 60, 'Ulusoy', 'Mas20', 1, 1, 1, '2011-01-01', 'ad');
INSERT INTO `kavsaklar` VALUES(282, 61, 'Liman C Kapısı', 'Cx8', 1, 1, 1, '2011-01-01', 'dsad"');
INSERT INTO `kavsaklar` VALUES(283, 62, 'Liman D Kapısı', 'Mas8', 1, 1, 1, '2011-01-01', 'sd');
INSERT INTO `kavsaklar` VALUES(284, 63, 'Çınarlı 1561 Sokak - Ozan Abay Kesişimi', 'Mas8', 1, 1, 1, '2011-01-01', 'sda');
INSERT INTO `kavsaklar` VALUES(285, 64, 'Ozan Abay Mersinli 2816 Sokak', 'Cx8', 1, 1, 1, '2010-01-01', 'as');
INSERT INTO `kavsaklar` VALUES(286, 65, '2824 Sokak Köprü', 'cx12', 1, 1, 1, '2011-01-01', 'dasda');
INSERT INTO `kavsaklar` VALUES(287, 66, 'Elf Kavşağı', 'cx12', 1, 1, 1, '2011-01-01', 'ad');
INSERT INTO `kavsaklar` VALUES(288, 67, 'Bornova Adliye', 'Mae 24', 1, 1, 1, '2011-01-01', 'sad');
INSERT INTO `kavsaklar` VALUES(289, 68, 'Yunus Emre Kavşağı', 'İsb A32', 1, 1, 1, '2011-01-01', 'dsa');
INSERT INTO `kavsaklar` VALUES(290, 69, 'Yeni Adliye Üst Geçidi', 'Mas12', 1, 1, 1, '2011-01-01', 'asa');
INSERT INTO `kavsaklar` VALUES(291, 70, 'Bornova 57. Topçu Tugayı', 'Del 12', 1, 1, 1, '2011-01-01', 'ada');
INSERT INTO `kavsaklar` VALUES(292, 71, 'Yeşilçam Köy Çıkışı', 'İsb K8', 1, 1, 1, '2011-01-01', 'dasdas');
INSERT INTO `kavsaklar` VALUES(293, 72, '252 Sokak Mansuroğlu Mahallesi', 'İsb K32', 1, 1, 1, '2011-01-01', 'sa');
INSERT INTO `kavsaklar` VALUES(294, 73, 'Osmangazi İ.Ö.O.', 'İsb K32', 1, 1, 1, '2011-01-01', 'sda');
INSERT INTO `kavsaklar` VALUES(295, 74, 'Fatih Caddesi - 243 Sokak ', 'İsb A8', 1, 1, 1, '2011-01-01', 'sdas');
INSERT INTO `kavsaklar` VALUES(296, 75, 'Pınar Caddesi - Cumhuriyet Caddesi Kesişimi', 'İsb K32', 1, 1, 1, '2011-01-01', 'fsfa');
INSERT INTO `kavsaklar` VALUES(297, 76, 'Bayraklı Kızılay Kan Merkezi', 'İsb K32', 1, 1, 1, '2011-01-01', 'dasd');
INSERT INTO `kavsaklar` VALUES(298, 77, 'Koşukavak Girişi', 'İsb K8', 1, 1, 1, '2011-01-01', 'sad');
INSERT INTO `kavsaklar` VALUES(299, 78, 'Altay Ticaret Meslek Lisesi', 'İsb A32', 1, 1, 1, '2011-01-01', 'asd');
INSERT INTO `kavsaklar` VALUES(300, 79, 'Taşkent Pazaryeri', 'İsb A32', 1, 1, 1, '2011-01-01', 'sad');
INSERT INTO `kavsaklar` VALUES(301, 80, 'Kemalpaşa İmam Hatip Önü', 'Mae 16', 1, 1, 1, '2011-01-01', 'asd');
INSERT INTO `kavsaklar` VALUES(302, 81, 'Kemalpaşa Turgutlu Torbalı Ayrımı', 'Mae 16', 1, 1, 1, '2011-01-01', 'asda');
INSERT INTO `kavsaklar` VALUES(303, 82, 'İzmir Ankara Yolu Kemalpaşa Sütçüler', 'Del 12', 1, 1, 1, '2011-01-01', 'das');
INSERT INTO `kavsaklar` VALUES(304, 83, 'İzmir Kemalpaşa Fersan Kavşağı', 'İsb A8', 1, 1, 1, '2011-01-01', 'ada');
INSERT INTO `kavsaklar` VALUES(305, 64, 'İzmir Menemen Asarlık Ayrımı', 'Ort 16', 1, 3, 1, '2011-01-01', 'as');
INSERT INTO `kavsaklar` VALUES(306, 65, 'İzmir Menemen Şehiriçi Ayrımı', 'Mc 12', 1, 3, 1, '2011-01-20', 'ad');
INSERT INTO `kavsaklar` VALUES(307, 66, 'İzmir Menemen Maltepe Ayrımı', 'Mas4', 1, 3, 1, '2011-01-01', 'DSDF');
INSERT INTO `kavsaklar` VALUES(308, 67, 'İzmir Eskifoça Türkelli Ayrımı', 'İsb K8', 1, 3, 1, '2011-01-01', 'dsa');
INSERT INTO `kavsaklar` VALUES(309, 68, 'İzmir Aliağa Helvacı Ayrımı', 'Ort 16', 1, 3, 1, '2011-01-01', 'sad');
INSERT INTO `kavsaklar` VALUES(310, 69, 'Yeni Foça Kavşağı', 'Del 12', 1, 3, 1, '2011-01-01', 'sda');
INSERT INTO `kavsaklar` VALUES(311, 70, 'İzmir Aliağa Bölge Trafik Önü', 'Ort 16', 1, 3, 1, '2011-01-01', 'as');
INSERT INTO `kavsaklar` VALUES(312, 71, 'İzmir Aliağa Şehir Merkezi Girişi', 'Ort 16', 1, 3, 1, '2011-01-01', 'sda');
INSERT INTO `kavsaklar` VALUES(313, 72, 'İzmir Aliağa Pehlivanoğlu Ayrımı', 'Ort 16', 1, 3, 1, '2011-01-01', 'sa');
INSERT INTO `kavsaklar` VALUES(314, 73, 'İzmir Aliağa Karayolları Bakım Evi Önü', 'Ort 16', 1, 3, 1, '2011-01-01', 'dsa');
INSERT INTO `kavsaklar` VALUES(315, 74, 'İzmir Aliağa Eml Önü', 'Ort 16', 1, 3, 1, '2011-01-01', 'ad');
INSERT INTO `kavsaklar` VALUES(316, 75, 'İzmir Aliağa Plaj Ayrımı', 'İsb12', 1, 3, 1, '2011-01-01', 'dsf');
INSERT INTO `kavsaklar` VALUES(317, 76, 'Aliağa Atatürk İ.Ö.O.', 'Ort 16', 1, 3, 1, '2011-01-01', 'df');
INSERT INTO `kavsaklar` VALUES(318, 77, 'Aliağa Lisesi', 'Del 12', 1, 3, 1, '2011-01-01', 'asd');
INSERT INTO `kavsaklar` VALUES(319, 78, 'Aliağa Atatürk Caddesi - Fatih Caddesi', 'Del 12', 1, 3, 1, '2011-01-01', 'sad');
INSERT INTO `kavsaklar` VALUES(320, 79, 'Aliağa Toki Pazaryeri', 'İsb A32', 1, 3, 1, '2011-01-01', 'ad');
INSERT INTO `kavsaklar` VALUES(321, 10, 'Behçet Uz Çocuk Hastanesi', 'a', 1, 6, 1, '2011-01-01', 'as');
INSERT INTO `kavsaklar` VALUES(322, 50, 'İbrahim Kavur', 'Mas4', 1, 5, 1, '2011-01-01', 'sa');
INSERT INTO `kavsaklar` VALUES(323, 51, 'İsmail Şefik Uysal', 'Mas4', 1, 5, 1, '2011-01-01', 'sa');
INSERT INTO `kavsaklar` VALUES(324, 52, 'Gaziemir PTT', 'Mc 4 ', 1, 5, 1, '2011-01-01', 'asd');
INSERT INTO `kavsaklar` VALUES(325, 53, 'Buca Seyfi Demirsoy Hastanesi', 'İsb A8', 1, 5, 1, '2011-01-01', 'as');
INSERT INTO `kavsaklar` VALUES(326, 54, 'Akıncılar İlkokulu', 'Mc 4 ', 1, 5, 1, '2011-01-01', 'sa');
INSERT INTO `kavsaklar` VALUES(327, 55, 'Buca 30 Ağustos Okul Önü', 'Mas4', 1, 5, 1, '2011-01-01', 'dsa');
INSERT INTO `kavsaklar` VALUES(328, 57, 'Buca Mopak', 'Mc 4 ', 1, 5, 1, '2011-01-01', 'sa');
INSERT INTO `kavsaklar` VALUES(329, 58, 'Buca Umurbey', 'Mas 4 ', 1, 5, 1, '2011-01-01', 'asd');
INSERT INTO `kavsaklar` VALUES(330, 59, 'Özmen Caddesi Üçkuyular', 'İsb K8', 1, 5, 1, '2011-01-01', 'sad');
INSERT INTO `kavsaklar` VALUES(331, 60, 'Bağkur Durağı Yaya', 'İsb K8', 1, 5, 1, '2011-01-01', 'dfas');
INSERT INTO `kavsaklar` VALUES(332, 62, 'Bozyak Kilimci Tepe Cami', 'Mc 4 ', 1, 5, 1, '2011-02-19', 'dads');
INSERT INTO `kavsaklar` VALUES(333, 63, 'Hüseyin Akdağ Okulu', 'Mas 4 ', 1, 5, 1, '2011-01-01', 'aas');
INSERT INTO `kavsaklar` VALUES(334, 64, 'Cevdet Güçlüer Okulu', 'Mc 4 ', 1, 5, 1, '2011-01-01', 'das');
INSERT INTO `kavsaklar` VALUES(335, 65, 'Şehit Fethi Bey Ticaret Lisesi', 'Mc 4 ', 1, 5, 1, '2011-01-01', 'sad');
INSERT INTO `kavsaklar` VALUES(336, 66, 'Naci Şensoy Lisesi', 'Mas 4 ', 1, 5, 1, '2011-01-01', 'sda');
INSERT INTO `kavsaklar` VALUES(337, 68, 'Kuşçuburnu Yaya - YF', 'Ultra', 1, 5, 1, '2011-01-01', 'sd');
INSERT INTO `kavsaklar` VALUES(338, 60, 'Çinili Camii', '1', 1, 6, 1, '2011-01-01', 'dsa');
INSERT INTO `kavsaklar` VALUES(339, 61, 'Kako', '1', 1, 6, 1, '2011-01-01', 'sad');
INSERT INTO `kavsaklar` VALUES(340, 62, 'Gürçeşme Karakol Önü', '1', 1, 6, 1, '2011-01-01', 'dsa');
INSERT INTO `kavsaklar` VALUES(341, 63, 'Karabağlar Sinan Camii', '1', 1, 6, 1, '2011-01-01', 'sda');
INSERT INTO `kavsaklar` VALUES(342, 64, 'Buca Evka1 Aydoğdu Mahallesi', '1', 1, 6, 1, '2011-01-01', 'dsa');
INSERT INTO `kavsaklar` VALUES(343, 70, 'Kısıkköy Sanayi Sitesi Flaşör', '1', 1, 6, 1, '2011-01-01', 'asd');
INSERT INTO `kavsaklar` VALUES(344, 71, 'Torbalı Bölge Trafik Önü', '1', 1, 6, 1, '2011-01-01', 'dsaa');
INSERT INTO `kavsaklar` VALUES(345, 72, 'Torbalı Çaybaşı Tire Ayrımı', '1', 1, 6, 1, '2011-01-01', 'asda');
INSERT INTO `kavsaklar` VALUES(346, 73, 'Torbalı Subaşı', '1', 1, 6, 1, '2011-01-01', 'as');
INSERT INTO `kavsaklar` VALUES(347, 74, 'Torbalı Atalan', '1', 1, 6, 1, '2011-01-01', 'asd');
INSERT INTO `kavsaklar` VALUES(348, 75, 'Torbalı Yeniçiftlik', '1', 1, 6, 1, '2011-01-01', 'das');
INSERT INTO `kavsaklar` VALUES(349, 76, 'Mendres Çamönü', '1', 1, 6, 1, '2011-01-01', 'as');
INSERT INTO `kavsaklar` VALUES(350, 78, 'Çile Ahmetbeyli Arası', '1', 1, 6, 1, '2011-01-01', 'dsa');
INSERT INTO `kavsaklar` VALUES(351, 78, 'Ahmetbeyli Yonca Sitesi', '1', 1, 6, 1, '2011-01-01', 'as');
INSERT INTO `kavsaklar` VALUES(352, 79, 'Meryemana Yokuşu1', '1', 1, 6, 1, '0000-00-00', 'da');
INSERT INTO `kavsaklar` VALUES(353, 80, 'Meryemana Yokuşu2', '1', 1, 6, 1, '2011-01-01', 'dads');
INSERT INTO `kavsaklar` VALUES(354, 81, 'Özdere Pehlivanoğlu ', '1', 1, 6, 1, '2011-01-01', 'dsa');
INSERT INTO `kavsaklar` VALUES(355, 82, 'Özdere 2', '1', 1, 6, 1, '2011-01-01', 'sa');
INSERT INTO `kavsaklar` VALUES(356, 83, 'Gümüldür Katı Atık Transfer İstasyonu', '2', 1, 6, 1, '2011-01-01', 'as');
INSERT INTO `kavsaklar` VALUES(357, 84, 'Ürkmez Pehlivanoğlu Önü', '1', 1, 6, 1, '2011-01-01', 'sa');
INSERT INTO `kavsaklar` VALUES(358, 85, 'Doğanbey Girişi', '1', 1, 6, 1, '2011-01-01', 'sa');
INSERT INTO `kavsaklar` VALUES(359, 86, 'Karakoç Kaplıca Çıkışı', '1', 1, 6, 1, '2011-01-22', 'sa');
INSERT INTO `kavsaklar` VALUES(360, 87, 'Bayındır Canlı 60. Yıl İ.Ö.O.', '1', 1, 6, 1, '0000-00-00', 'as');
INSERT INTO `kavsaklar` VALUES(361, 88, 'Menderes Şaşal', '1', 1, 6, 1, '2011-01-01', 'as');
INSERT INTO `kavsaklar` VALUES(362, 89, 'Seferihisar Doğanbey Arası', '1', 1, 6, 1, '2011-01-01', 'as');
INSERT INTO `kavsaklar` VALUES(363, 30, 'Bornova Belediye', '1', 1, 6, 1, '2011-01-01', 'sa');
INSERT INTO `kavsaklar` VALUES(364, 31, 'Dyo Boyacılık Okulu', '1', 1, 6, 1, '2011-01-01', 'sa');
INSERT INTO `kavsaklar` VALUES(365, 32, 'Güzel Sanatlar Fakültesi', '1', 1, 6, 1, '2011-01-01', 'as');
INSERT INTO `kavsaklar` VALUES(366, 33, 'DGM Önü', '1', 1, 6, 1, '2011-01-01', 'sa');
INSERT INTO `kavsaklar` VALUES(367, 34, 'Hamdi Dalan', '1', 1, 6, 1, '2011-01-01', 'sa');
INSERT INTO `kavsaklar` VALUES(368, 40, 'Kemalpaşa Örnekköy', '1', 1, 6, 1, '2011-01-01', 's');
INSERT INTO `kavsaklar` VALUES(369, 41, 'Kemalpaşa Armutlu 1', '1', 1, 6, 1, '2011-01-23', 'as');
INSERT INTO `kavsaklar` VALUES(370, 42, 'Kemalpaşa Armutlu 2', '1', 1, 6, 1, '2011-01-01', 'sa');
INSERT INTO `kavsaklar` VALUES(371, 43, 'Kemalpaşa Armutlu 3', '1', 1, 6, 1, '2011-01-01', 'sa');
INSERT INTO `kavsaklar` VALUES(372, 44, 'Kemalpaşa Armutlu 4', '2', 2, 6, 1, '2011-01-01', 'sa');
INSERT INTO `kavsaklar` VALUES(373, 45, 'Kemalpaşa Yiğitler 1', '1', 1, 6, 1, '2011-01-01', 'sa');
INSERT INTO `kavsaklar` VALUES(374, 46, 'Kemalpaşa Yiğitler 2', '1', 1, 6, 1, '2011-01-01', 'sa');
INSERT INTO `kavsaklar` VALUES(375, 47, 'Kemalpaşa Bağyurdu 1', '1', 1, 6, 1, '2011-01-01', 'sa');
INSERT INTO `kavsaklar` VALUES(376, 48, 'Kemalpaşa Bağyurdu 2', '1', 1, 6, 1, '2011-01-01', 's');
INSERT INTO `kavsaklar` VALUES(377, 49, 'Kemalpaşa Bağyurdu 3', '1', 1, 6, 1, '2011-01-01', 'as');
INSERT INTO `kavsaklar` VALUES(378, 50, 'Kemalpaşa Bağyurdu 4', '1', 1, 6, 1, '2011-01-01', 'as');
INSERT INTO `kavsaklar` VALUES(379, 20, 'Gürçeşme Atölye', 'Mas 4 ', 1, 5, 1, '2011-01-01', 'sd');
INSERT INTO `kavsaklar` VALUES(380, 21, 'Barbaros Hayrettin', 'Mas 4 ', 1, 5, 1, '2011-01-01', 'as');
INSERT INTO `kavsaklar` VALUES(381, 23, 'Ağır Bakım Fabrikası', 'Mc 4 ', 1, 5, 1, '2011-01-01', 'sa');
INSERT INTO `kavsaklar` VALUES(382, 24, 'Evrenesoğlu Okulu', 'Mc 4 ', 1, 5, 1, '2011-01-01', 'as');
INSERT INTO `kavsaklar` VALUES(383, 25, 'Kemalpaşa Caddesi Jandarma', 'Mc 4 ', 1, 5, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(384, 26, 'Bayraklı Talatpaşa Okulu', 'Mc 4 ', 1, 5, 1, '2011-01-01', 'sa');
INSERT INTO `kavsaklar` VALUES(385, 27, 'Sakarya Caddesi Park', 'Mas 4 ', 1, 5, 1, '2011-01-01', 'as');
INSERT INTO `kavsaklar` VALUES(386, 28, 'Dumlupınar Yaya', 'Mas 4', 1, 5, 1, '2011-01-01', 'as');
INSERT INTO `kavsaklar` VALUES(387, 29, 'Çamkıran Sitesi', 'Mc 4 ', 1, 5, 1, '2011-01-01', 'as');
INSERT INTO `kavsaklar` VALUES(388, 30, 'Malazgirt İlkokulu', 'Mas 4', 1, 5, 1, '2011-01-01', 'as');
INSERT INTO `kavsaklar` VALUES(389, 31, 'Yeşiltepe İlkokulu', 'Mas 4', 1, 5, 1, '2011-01-01', 'as');
INSERT INTO `kavsaklar` VALUES(390, 32, 'Suphi Koyuncu Lisesi', 'Mc 4 ', 1, 5, 1, '2011-01-01', 'as');
INSERT INTO `kavsaklar` VALUES(391, 33, 'Evka3 Ege Lisesi', 'Mc 4 ', 1, 5, 1, '2011-01-01', 'sa');
INSERT INTO `kavsaklar` VALUES(392, 34, 'K.Tunca Bulvarı Koşukavak Yaya', 'İsb K8', 1, 5, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(393, 35, 'Çimentaş Lisesi', 'Mas 4', 1, 5, 1, '2011-01-01', 'as');
INSERT INTO `kavsaklar` VALUES(394, 36, 'Abdi ipekçi Caddesi Kordon Birlik Okul Önü', 'Mc 4 ', 1, 5, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(395, 37, 'Çınarlı E.M.L', 'Mc 2', 1, 5, 1, '2011-01-01', 'sa');
INSERT INTO `kavsaklar` VALUES(396, 38, 'Çınarlı Hastane', 'Mas 4', 1, 5, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(397, 39, 'Arkas Yaya', 'Mc 4 ', 1, 5, 1, '2011-01-01', 'as');
INSERT INTO `kavsaklar` VALUES(398, 48, 'Kemalpaşa Örnekköy Yaya', 'Sin 2', 1, 5, 1, '2011-01-01', 'as');
INSERT INTO `kavsaklar` VALUES(399, 49, 'Kemalpaşa 8 Eylül İlkokulu', 'İsb K8', 1, 5, 1, '2011-01-01', 'sa');
INSERT INTO `kavsaklar` VALUES(400, 80, 'Üçyol Metro', 'Mas 4', 1, 5, 1, '2011-01-01', 'sa');
INSERT INTO `kavsaklar` VALUES(401, 81, 'Mustafa Ulucan Okulu', 'Mc 4 ', 1, 5, 1, '2011-01-01', 'sa');
INSERT INTO `kavsaklar` VALUES(402, 82, 'Yeşilyurt Eşrefpaşa Lisesi', 'Mc 4 ', 1, 5, 1, '2011-01-01', 'sa');
INSERT INTO `kavsaklar` VALUES(403, 83, 'Ordu Evi M.Paşa', 'İsb A8', 1, 5, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(404, 84, 'Mithatpaşa Kız Lisesi', 'Mc 4 ', 1, 5, 1, '2011-01-01', 'sa');
INSERT INTO `kavsaklar` VALUES(405, 85, 'Köşk Sineması', 'Mas 4', 1, 5, 1, '2011-01-01', 'as');
INSERT INTO `kavsaklar` VALUES(406, 86, 'Cemil Midilli', 'Mas 4', 1, 5, 1, '2011-02-01', 'as');
INSERT INTO `kavsaklar` VALUES(407, 87, 'Balçova Migros', 'Mc 4 ', 1, 5, 1, '2011-01-01', 'as');
INSERT INTO `kavsaklar` VALUES(408, 88, 'Balçova Hoca Durağı', 'Mc 4 ', 1, 5, 1, '2011-01-01', 'as');
INSERT INTO `kavsaklar` VALUES(409, 89, 'Sıdıka Akdemir Okulu', 'Mc 4 ', 1, 5, 1, '2011-01-01', 'ds');
INSERT INTO `kavsaklar` VALUES(410, 90, 'Liman Reis', 'Mas 4', 1, 5, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(411, 91, 'Ali Bayırlar Okulu', 'Mc 4 ', 1, 5, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(412, 92, '60. Yıl Anadolu Lisesi', 'Mc 4 ', 1, 5, 1, '2011-01-01', 'as');
INSERT INTO `kavsaklar` VALUES(413, 93, 'Necatibey İ.Ö.Okulu', 'İsb A8', 1, 5, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(414, 90, 'Betonyol', 'a', 1, 6, 1, '2011-01-01', 'as');
INSERT INTO `kavsaklar` VALUES(415, 91, '95 ''in Kahvehanesi (Halil Rıfat Paşa)', '1', 1, 6, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(416, 92, 'Akevler', '1', 1, 6, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(417, 93, 'Sahilevleri Toplayıcı Yol', '1', 1, 6, 1, '2011-01-01', 'as');
INSERT INTO `kavsaklar` VALUES(418, 94, 'Sahilevleri Dörtyol', '1', 1, 6, 1, '2011-01-01', 'as');
INSERT INTO `kavsaklar` VALUES(419, 100, 'Güzelbahçe Son Durak', '1', 1, 6, 1, '2011-01-01', 'as');
INSERT INTO `kavsaklar` VALUES(420, 101, 'Urla Çamlık Mahallesi', '1', 1, 6, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(421, 102, '75. Yıl Koleji (Öz.Bilgi Ata koleji)', '1', 1, 6, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(422, 103, 'Urla Kalabak', '1', 1, 6, 1, '2011-01-01', 'as');
INSERT INTO `kavsaklar` VALUES(423, 104, 'Seferihisar Sanayi', '1', 1, 6, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(424, 105, 'Seferihisar Girişi', '1', 1, 6, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(425, 71, 'Karşıyaka Kasman Işıkları', 'Mas8', 1, 5, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(426, 72, 'Girne Caddesi Gün Sazak Bulvarı', 'Mc 4 ', 1, 5, 1, '2011-01-01', 'as');
INSERT INTO `kavsaklar` VALUES(427, 73, 'Atakent Emlak Bankası İlkokulu', 'Mc 4 ', 1, 5, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(428, 74, 'Şemikler Benzin İstasyonu', 'İsb K8', 1, 5, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(429, 75, 'Ayyıldız Durağı', 'İsb K8', 1, 5, 1, '2011-01-01', 'sa');
INSERT INTO `kavsaklar` VALUES(430, 78, 'İzmir Menemen Emiralem Ayrımı', 'İsb K8', 1, 5, 1, '2011-01-01', 'as');
INSERT INTO `kavsaklar` VALUES(431, 79, 'İzmir Menemen Buruncuk Okul Önü', 'Sin 2', 1, 5, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(432, 1, 'Gazi Lisesi Önü', '1', 1, 6, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(433, 2, 'Bayraklı Ekrem HAyri Üstündağ İ.Ö.O', '1', 1, 6, 1, '2011-01-01', 'sa');
INSERT INTO `kavsaklar` VALUES(434, 3, 'Gümüşpala', '1', 1, 6, 1, '2011-01-01', 'as');
INSERT INTO `kavsaklar` VALUES(435, 4, 'Dedebaşı Karakol Önü', '1', 1, 6, 1, '2011-01-01', 's');
INSERT INTO `kavsaklar` VALUES(436, 5, 'Bayraklı 2167 Sokak - 1620 /39 ', '1', 1, 6, 1, '2011-01-01', 's');
INSERT INTO `kavsaklar` VALUES(437, 10, 'Menemen Demiryolu', '1', 1, 6, 1, '2011-01-01', 's');
INSERT INTO `kavsaklar` VALUES(438, 11, 'Menemen Şehiriçi Girişi', '2', 1, 6, 1, '2011-01-01', 's');
INSERT INTO `kavsaklar` VALUES(439, 12, 'Menemen Devlet Hastanesi Önü', '1', 1, 6, 1, '2011-01-01', 's');
INSERT INTO `kavsaklar` VALUES(440, 13, 'Emiralem Hal Önü', '1', 1, 6, 1, '2011-01-01', 'sa');
INSERT INTO `kavsaklar` VALUES(441, 14, 'Emiralem', '1', 1, 6, 1, '2011-01-01', 's');
INSERT INTO `kavsaklar` VALUES(442, 15, 'Menemen Bölge Trafik Önü', '1', 1, 6, 1, '2011-01-01', 'as');
INSERT INTO `kavsaklar` VALUES(443, 16, 'Eskifoça Bağarası1', '1', 1, 6, 1, '2011-01-01', 's');
INSERT INTO `kavsaklar` VALUES(444, 17, 'Eskifoça Bağarası2', '1', 1, 6, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(445, 18, 'Eski Foça Girişi', '1', 1, 6, 1, '2011-01-01', 'sq');
INSERT INTO `kavsaklar` VALUES(446, 19, 'Eski Foça Yeni Foça Arası 1', '1', 1, 6, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(447, 20, 'Eski Foça Yeni Foça Arası 2', '1', 1, 6, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(448, 21, 'Eski Foça Yeni Foça Arası 3', '1', 1, 6, 1, '2011-01-01', 'sa');
INSERT INTO `kavsaklar` VALUES(449, 22, 'Eski Foça Yeni Foça Arası 4', '1', 1, 6, 1, '2011-01-01', 'a');
INSERT INTO `kavsaklar` VALUES(450, 23, 'Yeni Foça Girişi', '1', 1, 6, 1, '2011-01-01', 's');
INSERT INTO `kavsaklar` VALUES(451, 24, 'Yeni Foça Aliağa Arası', '1', 1, 6, 1, '2011-01-01', 'sa');

-- --------------------------------------------------------

--
-- Tablo yapısı: `kullanicilar`
--

CREATE TABLE `kullanicilar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kullaniciadi` varchar(30) COLLATE utf8_turkish_ci NOT NULL,
  `parola` varchar(30) COLLATE utf8_turkish_ci NOT NULL,
  `isim` varchar(30) COLLATE utf8_turkish_ci NOT NULL,
  `yetki` int(11) NOT NULL,
  `ekipbasi` tinyint(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=62 ;

--
-- Tablo döküm verisi `kullanicilar`
--

INSERT INTO `kullanicilar` VALUES(1, 'mudur', '123456789', 'Mehmet Ali BODUR', 1, 1);
INSERT INTO `kullanicilar` VALUES(2, 'memur', '123456789', 'Sevgi DÖNER', 6, 0);
INSERT INTO `kullanicilar` VALUES(9, 'mustafa', 'aaa', 'Mustafa TÜRKSEVER', 6, 0);
INSERT INTO `kullanicilar` VALUES(10, 'memur2', '123', 'Nuran GÜNÇAĞLAYAN', 6, 0);
INSERT INTO `kullanicilar` VALUES(11, 'orhan', '123456789', 'Orhan ABBASOĞLU', 6, 0);
INSERT INTO `kullanicilar` VALUES(19, 'ceyda', '123456789', 'Ceyda TÜRKMENTEPE', 6, 0);
INSERT INTO `kullanicilar` VALUES(20, 'NAZİF', 'AAAA', 'Nazif AYDIN', 5, 1);
INSERT INTO `kullanicilar` VALUES(21, 'Engin', 'aaaaa', 'Engin GÜL', 5, 0);
INSERT INTO `kullanicilar` VALUES(22, 'KEMAL', 'A', 'Kemal GEZER', 5, 0);
INSERT INTO `kullanicilar` VALUES(23, 'KEMALL', 'AAAA', 'Kemal KÜÇÜK', 5, 1);
INSERT INTO `kullanicilar` VALUES(24, 'MESUT', 'ASAS', 'Mesut ÖZ', 5, 0);
INSERT INTO `kullanicilar` VALUES(25, 'ENVER', 'ASADDAD', 'Enver IRGAT', 5, 0);
INSERT INTO `kullanicilar` VALUES(26, 'HÜSEYİN', 'DFSF', 'Hüseyin DOĞAN', 6, 0);
INSERT INTO `kullanicilar` VALUES(27, 'EKREM', 'ŞFJDSJ', 'Ekrem ALBAY', 5, 1);
INSERT INTO `kullanicilar` VALUES(28, 'MAHSUN', 'ÖKFAL', 'Mahsun BİLMEZ', 5, 0);
INSERT INTO `kullanicilar` VALUES(29, 'CENGİZ', 'EIJJFMŞL', 'Cengiz ÇELİK ', 5, 0);
INSERT INTO `kullanicilar` VALUES(30, 'ÜMİT', 'SDFŞKSŞA', 'Ümit ATICI', 5, 0);
INSERT INTO `kullanicilar` VALUES(31, 'YILMAZ', 'NFSG', 'Yılmaz ASLAN', 5, 1);
INSERT INTO `kullanicilar` VALUES(32, 'SEMİH', 'KAĞPKDF', 'Semih YILDIZ', 6, 0);
INSERT INTO `kullanicilar` VALUES(33, 'OLCAY', 'FKALŞDAİ', 'Olcay KOÇ', 5, 0);
INSERT INTO `kullanicilar` VALUES(34, 'HASAN', 'KFA', 'Hasan MORTEPE', 6, 0);
INSERT INTO `kullanicilar` VALUES(35, 'SELÇUK', 'ŞLMLDF', 'Selçuk Emre ALPTEKİN', 5, 1);
INSERT INTO `kullanicilar` VALUES(36, 'ERCAN', 'FSKŞL', 'Ercan ŞENGÜN', 5, 0);
INSERT INTO `kullanicilar` VALUES(37, 'ARİF', 'FKLA', 'Arif ARSLAN', 6, 0);
INSERT INTO `kullanicilar` VALUES(38, 'OKAN', 'ADSFŞAŞ', 'Okan BİLGEN', 6, 0);
INSERT INTO `kullanicilar` VALUES(39, 'EGE', 'ASDFKAŞ', 'Ege Nasuh GÜNAYAR', 5, 1);
INSERT INTO `kullanicilar` VALUES(40, 'UĞUR', 'ASDLŞ', 'Uğur DURDU', 6, 0);
INSERT INTO `kullanicilar` VALUES(41, 'İRFAN', 'AFMŞ', 'İrfan AKYÜZ', 5, 0);
INSERT INTO `kullanicilar` VALUES(42, 'HASAN ÇOLAK', 'FAJŞL', 'Hasan ÇOLAK', 6, 0);
INSERT INTO `kullanicilar` VALUES(43, 'MURAT', 'GSMAŞ', 'Murat BİTGEN', 5, 1);
INSERT INTO `kullanicilar` VALUES(44, 'KAAN', 'AFKAŞ', 'Kaan ÜRETEN', 5, 1);
INSERT INTO `kullanicilar` VALUES(45, 'BERKANT', 'FAKŞDA', 'Berkant ERKİREÇCİ', 6, 1);
INSERT INTO `kullanicilar` VALUES(46, 'ÖZGÜR', 'ALJ', 'Özgür KURT', 6, 1);
INSERT INTO `kullanicilar` VALUES(47, 'D.YILMAZ', 'DFKA', 'Dursun Yılmaz YÜKSEL', 5, 1);
INSERT INTO `kullanicilar` VALUES(48, 'AKİF', 'ASAŞL', 'Akif ÖZGÜR', 5, 1);
INSERT INTO `kullanicilar` VALUES(49, 'ERMAN', 'ADLA', 'Erman AKIN', 6, 1);
INSERT INTO `kullanicilar` VALUES(50, 'MUSA', 'FMAMŞL', 'Musa ÜZKAT', 5, 0);
INSERT INTO `kullanicilar` VALUES(51, 'MUTLU', '123456', 'Mutlu SEVİNÇ', 6, 1);
INSERT INTO `kullanicilar` VALUES(52, 'HÜSEYİNN', 'DALKŞ', 'Hüseyin ACAR', 6, 1);
INSERT INTO `kullanicilar` VALUES(53, 'MEHMETALİ', 'DAFASF', 'Mehmet Ali KELEM', 5, 0);
INSERT INTO `kullanicilar` VALUES(54, 'CENK', 'ALDŞ', 'Cenk TOĞLAN', 6, 0);
INSERT INTO `kullanicilar` VALUES(55, 'HALİL', 'JASDAK', 'Halil Uğur KARAASLAN', 6, 1);
INSERT INTO `kullanicilar` VALUES(56, 'İbrahim', 'adkjaşl', 'İbrahim YILMAZ', 6, 1);
INSERT INTO `kullanicilar` VALUES(57, 'MEHMET', 'ASJDA', 'Mehmet ÇANAKLI', 6, 1);
INSERT INTO `kullanicilar` VALUES(58, 'FERALETTİN', 'FERALETTİN', 'Feralettin ÇANAKLI', 5, 1);
INSERT INTO `kullanicilar` VALUES(59, 'YİĞİT', '123456789', 'Yılmaz YİĞİT GÜLER', 6, 1);
INSERT INTO `kullanicilar` VALUES(60, 'HÜSNÜ GÖKHAN', '123456789', 'Hüsnü Gökhan ÜSTÜNDAĞ', 6, 0);
INSERT INTO `kullanicilar` VALUES(61, 'Ermenekli', '3835202', 'Mustafa İNCİK', 1, 1);

-- --------------------------------------------------------

--
-- Tablo yapısı: `mesajlar`
--

CREATE TABLE `mesajlar` (
  `mid` int(11) NOT NULL AUTO_INCREMENT,
  `kid` int(11) NOT NULL,
  `mesaj` varchar(200) COLLATE utf8_turkish_ci NOT NULL,
  `okundu` tinyint(1) NOT NULL DEFAULT '0',
  `konu` tinyint(1) NOT NULL,
  PRIMARY KEY (`mid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=32 ;

--
-- Tablo döküm verisi `mesajlar`
--

INSERT INTO `mesajlar` VALUES(1, 1, 'Beta sürümününde kavşak yönetimini test etmek isterseniz,<br> doğu bölgesinden 442 nolu Hastahane Kavşağını inceleyiniz.', 1, 9);
INSERT INTO `mesajlar` VALUES(31, 1, 'deneme', 1, 2);
INSERT INTO `mesajlar` VALUES(28, 1, 'slm nbr', 1, 1);
INSERT INTO `mesajlar` VALUES(29, 11, 'iyilik senden', 1, 3);
INSERT INTO `mesajlar` VALUES(30, 1, 'Anlık Mesaj Sistemi ile personeller arası mesaj gönderebilirsiniz!!', 1, 7);
INSERT INTO `mesajlar` VALUES(27, 1, 'GTALK/SKYPE TARZI İLETİ YOLLAMA AMAÇLI KULLANILABİLİR!', 1, 7);
INSERT INTO `mesajlar` VALUES(26, 1, 'OTOMATİK MESAJ ALMA SİSTEMİ 1SN. KONTROL İLE KURULU VE ÇALIŞIR DURUMDADIR.', 1, 1);

-- --------------------------------------------------------

--
-- Tablo yapısı: `moduller`
--

CREATE TABLE `moduller` (
  `mid` int(11) NOT NULL AUTO_INCREMENT,
  `dosya` varchar(40) COLLATE utf8_turkish_ci DEFAULT NULL,
  `etiket` varchar(70) COLLATE utf8_turkish_ci DEFAULT NULL,
  `tip` smallint(1) NOT NULL,
  PRIMARY KEY (`mid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=23 ;

--
-- Tablo döküm verisi `moduller`
--

INSERT INTO `moduller` VALUES(1, 'index.php', 'Ana Sayfa', 1);
INSERT INTO `moduller` VALUES(2, '2.php', 'Kavşak Yönetimi', 2);
INSERT INTO `moduller` VALUES(4, 'joint.php', 'Kavşak Yönetim Sayfası', 1);
INSERT INTO `moduller` VALUES(5, '5.php', 'Tanımlamalar', 2);
INSERT INTO `moduller` VALUES(6, '6.php', 'Personel Yönetimi', 2);
INSERT INTO `moduller` VALUES(7, 'user.php', 'Personel Yönetim Sayfası', 1);
INSERT INTO `moduller` VALUES(9, 'area.php', 'Bölge İşlemleri Sayfası', 1);
INSERT INTO `moduller` VALUES(22, 'msg.php', 'Mesaj İşlem Sayfası', 1);
INSERT INTO `moduller` VALUES(10, 'login.php', 'Sisteme Genel Giriş İzni', 1);
INSERT INTO `moduller` VALUES(11, 'user_det.php', 'Personel Detay Sayfası', 1);
INSERT INTO `moduller` VALUES(20, 'paper.php', 'Evrak Yönetim Sayfası', 1);
INSERT INTO `moduller` VALUES(13, '13.php', 'Ekip Raporu', 2);
INSERT INTO `moduller` VALUES(14, 'rep.php', 'Ekip Raporu Yönetim Sayfası', 1);
INSERT INTO `moduller` VALUES(16, '16.php', 'Evrak', 2);
INSERT INTO `moduller` VALUES(21, '21.php', 'Mesaj Sistemi', 2);
INSERT INTO `moduller` VALUES(18, '18.php', 'Yetkiler', 2);
INSERT INTO `moduller` VALUES(19, 'auth.php', 'Yetki Yönetim Sayfası', 1);

-- --------------------------------------------------------

--
-- Tablo yapısı: `raporlar`
--

CREATE TABLE `raporlar` (
  `rapor_id` int(11) NOT NULL AUTO_INCREMENT,
  `ekip_basi` int(11) NOT NULL,
  `ekip_elemanlari` longtext COLLATE utf8_turkish_ci,
  `tarih` date NOT NULL,
  `aciklama` varchar(250) COLLATE utf8_turkish_ci DEFAULT NULL,
  `yapilacakisler` longtext COLLATE utf8_turkish_ci,
  PRIMARY KEY (`rapor_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=68 ;

--
-- Tablo döküm verisi `raporlar`
--

INSERT INTO `raporlar` VALUES(55, 1, '2;', '2011-02-02', '', '');
INSERT INTO `raporlar` VALUES(54, 1, '2;', '2011-02-02', '', '');
INSERT INTO `raporlar` VALUES(53, 1, '2;', '2011-02-02', '', '');
INSERT INTO `raporlar` VALUES(52, 1, '2;', '2011-02-02', '', '');
INSERT INTO `raporlar` VALUES(51, 1, '2;', '2011-02-02', '', '');
INSERT INTO `raporlar` VALUES(50, 1, '2;', '2011-02-02', '', '');
INSERT INTO `raporlar` VALUES(49, 1, '10;', '2011-02-01', 'YAZILIM GÜNCELLEMESİ', 'KAVŞAKLARDAKİ YAZILIM GÜNCELLEMESİ TAMAMLANDI');
INSERT INTO `raporlar` VALUES(48, 1, '2;', '2010-01-02', '', '');
INSERT INTO `raporlar` VALUES(47, 1, '9;', '2011-01-01', '', '');
INSERT INTO `raporlar` VALUES(46, 1, '2;', '2009-01-01', '', '');
INSERT INTO `raporlar` VALUES(45, 1, '2;9;', '2010-01-01', 'qwe', '');
INSERT INTO `raporlar` VALUES(44, 1, '9;2;', '2008-02-01', '', '');
INSERT INTO `raporlar` VALUES(43, 1, '2;9;', '2008-02-01', 'genel bakım onarım çalışmaları', 'yapıldı');
INSERT INTO `raporlar` VALUES(56, 1, '2;', '2011-02-02', '', '');
INSERT INTO `raporlar` VALUES(57, 1, '2;', '2011-02-02', '', '');
INSERT INTO `raporlar` VALUES(58, 1, '2;', '2011-02-02', '', '');
INSERT INTO `raporlar` VALUES(59, 1, '2;', '2011-02-02', '', '');
INSERT INTO `raporlar` VALUES(60, 1, '2;', '2011-02-02', '', '');
INSERT INTO `raporlar` VALUES(61, 1, '2;', '2011-01-02', '', '');
INSERT INTO `raporlar` VALUES(62, 1, '2;', '2011-01-02', '', '');
INSERT INTO `raporlar` VALUES(63, 1, '2;', '2011-01-02', '', '');
INSERT INTO `raporlar` VALUES(64, 1, '2;', '2011-01-02', '', '');
INSERT INTO `raporlar` VALUES(65, 1, '2;', '2011-01-01', '', '');
INSERT INTO `raporlar` VALUES(66, 20, '21;9;22;', '2011-01-01', 'DİREK DEĞİŞİMİ', '');
INSERT INTO `raporlar` VALUES(67, 51, '36;33;', '2011-05-06', 'arıza', 'kavşak arızası');

-- --------------------------------------------------------

--
-- Tablo yapısı: `rapor_isler`
--

CREATE TABLE `rapor_isler` (
  `iid` int(11) NOT NULL AUTO_INCREMENT,
  `kavsak` int(11) NOT NULL,
  `rapor_id` int(11) NOT NULL,
  `baslama_saati` time NOT NULL,
  `bitis_saati` time NOT NULL,
  `isadi` varchar(100) COLLATE utf8_turkish_ci DEFAULT NULL,
  `aciklama` longtext COLLATE utf8_turkish_ci,
  PRIMARY KEY (`iid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=62 ;

--
-- Tablo döküm verisi `rapor_isler`
--

INSERT INTO `rapor_isler` VALUES(50, 1, 56, '00:00:00', '00:00:00', '', '');
INSERT INTO `rapor_isler` VALUES(51, 1, 57, '00:00:00', '00:00:00', '', '');
INSERT INTO `rapor_isler` VALUES(52, 1, 58, '00:00:00', '00:00:00', '', '');
INSERT INTO `rapor_isler` VALUES(49, 1, 55, '00:00:00', '00:00:00', '', '');
INSERT INTO `rapor_isler` VALUES(48, 1, 54, '00:00:00', '00:00:00', '', '');
INSERT INTO `rapor_isler` VALUES(47, 1, 53, '00:00:00', '00:00:00', '', '');
INSERT INTO `rapor_isler` VALUES(44, 1, 50, '00:00:00', '00:00:00', '', '');
INSERT INTO `rapor_isler` VALUES(45, 1, 51, '00:00:00', '00:00:00', '', '');
INSERT INTO `rapor_isler` VALUES(46, 1, 52, '00:00:00', '00:00:00', '', '');
INSERT INTO `rapor_isler` VALUES(43, 1, 49, '01:10:00', '02:10:00', '', '');
INSERT INTO `rapor_isler` VALUES(42, 1, 48, '00:00:00', '00:00:00', '', '');
INSERT INTO `rapor_isler` VALUES(41, 1, 47, '00:00:00', '00:00:00', '', '');
INSERT INTO `rapor_isler` VALUES(40, 1, 46, '00:00:00', '00:00:00', '', '');
INSERT INTO `rapor_isler` VALUES(39, 1, 45, '00:00:00', '00:00:00', '', '');
INSERT INTO `rapor_isler` VALUES(38, 1, 43, '00:00:00', '00:00:00', '', 'asdasd');
INSERT INTO `rapor_isler` VALUES(37, 1, 43, '00:00:00', '00:00:00', 'KAVŞAK BAKIM', 'yapıldı..');
INSERT INTO `rapor_isler` VALUES(36, 1, 43, '00:00:00', '00:00:00', 'KAVŞAK TAMİR', 'halledildi.');
INSERT INTO `rapor_isler` VALUES(53, 1, 59, '00:00:00', '00:00:00', '', '');
INSERT INTO `rapor_isler` VALUES(54, 1, 60, '00:00:00', '00:00:00', '', '');
INSERT INTO `rapor_isler` VALUES(55, 1, 61, '00:00:00', '00:00:00', '', '');
INSERT INTO `rapor_isler` VALUES(56, 1, 62, '00:00:00', '00:00:00', '', '');
INSERT INTO `rapor_isler` VALUES(57, 1, 63, '00:00:00', '00:00:00', '', '');
INSERT INTO `rapor_isler` VALUES(58, 2, 64, '00:00:00', '00:00:00', '', '');
INSERT INTO `rapor_isler` VALUES(59, 2, 65, '00:00:00', '00:00:00', '', '');
INSERT INTO `rapor_isler` VALUES(60, 2, 66, '00:00:00', '00:00:00', '', '');
INSERT INTO `rapor_isler` VALUES(61, 27, 67, '02:02:00', '04:00:00', 'arıza', 'kavşak devreye alındı.');

-- --------------------------------------------------------

--
-- Tablo yapısı: `rutbeler`
--

CREATE TABLE `rutbeler` (
  `rid` int(11) NOT NULL AUTO_INCREMENT,
  `etiket` varchar(30) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`rid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=51 ;

--
-- Tablo döküm verisi `rutbeler`
--

INSERT INTO `rutbeler` VALUES(1, 'Departman Şefi');
INSERT INTO `rutbeler` VALUES(6, 'Memur');
INSERT INTO `rutbeler` VALUES(5, 'İşçi/Bloke');
INSERT INTO `rutbeler` VALUES(47, 'Sekreter');

-- --------------------------------------------------------

--
-- Tablo yapısı: `yetkiler`
--

CREATE TABLE `yetkiler` (
  `yid` int(11) NOT NULL AUTO_INCREMENT,
  `mid` int(11) NOT NULL,
  `rid` int(11) NOT NULL,
  PRIMARY KEY (`yid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=430 ;

--
-- Tablo döküm verisi `yetkiler`
--

INSERT INTO `yetkiler` VALUES(429, 19, 1);
INSERT INTO `yetkiler` VALUES(428, 18, 1);
INSERT INTO `yetkiler` VALUES(427, 21, 1);
INSERT INTO `yetkiler` VALUES(426, 16, 1);
INSERT INTO `yetkiler` VALUES(425, 14, 1);
INSERT INTO `yetkiler` VALUES(424, 13, 1);
INSERT INTO `yetkiler` VALUES(423, 20, 1);
INSERT INTO `yetkiler` VALUES(422, 11, 1);
INSERT INTO `yetkiler` VALUES(421, 10, 1);
INSERT INTO `yetkiler` VALUES(420, 22, 1);
INSERT INTO `yetkiler` VALUES(419, 9, 1);
INSERT INTO `yetkiler` VALUES(418, 7, 1);
INSERT INTO `yetkiler` VALUES(417, 6, 1);
INSERT INTO `yetkiler` VALUES(416, 5, 1);
INSERT INTO `yetkiler` VALUES(415, 4, 1);
INSERT INTO `yetkiler` VALUES(414, 2, 1);
INSERT INTO `yetkiler` VALUES(413, 1, 1);
INSERT INTO `yetkiler` VALUES(379, 19, 47);
INSERT INTO `yetkiler` VALUES(378, 18, 47);
INSERT INTO `yetkiler` VALUES(377, 21, 47);
INSERT INTO `yetkiler` VALUES(376, 16, 47);
INSERT INTO `yetkiler` VALUES(375, 14, 47);
INSERT INTO `yetkiler` VALUES(374, 13, 47);
INSERT INTO `yetkiler` VALUES(373, 20, 47);
INSERT INTO `yetkiler` VALUES(372, 11, 47);
INSERT INTO `yetkiler` VALUES(371, 10, 47);
INSERT INTO `yetkiler` VALUES(370, 22, 47);
INSERT INTO `yetkiler` VALUES(369, 9, 47);
INSERT INTO `yetkiler` VALUES(368, 7, 47);
INSERT INTO `yetkiler` VALUES(367, 6, 47);
INSERT INTO `yetkiler` VALUES(366, 5, 47);
INSERT INTO `yetkiler` VALUES(365, 4, 47);
INSERT INTO `yetkiler` VALUES(364, 2, 47);
INSERT INTO `yetkiler` VALUES(363, 1, 47);
INSERT INTO `yetkiler` VALUES(313, 1, 5);
INSERT INTO `yetkiler` VALUES(314, 2, 5);
INSERT INTO `yetkiler` VALUES(315, 4, 5);
INSERT INTO `yetkiler` VALUES(316, 5, 5);
INSERT INTO `yetkiler` VALUES(317, 6, 5);
INSERT INTO `yetkiler` VALUES(318, 7, 5);
INSERT INTO `yetkiler` VALUES(319, 9, 5);
INSERT INTO `yetkiler` VALUES(320, 22, 5);
INSERT INTO `yetkiler` VALUES(321, 10, 5);
INSERT INTO `yetkiler` VALUES(322, 11, 5);
INSERT INTO `yetkiler` VALUES(323, 20, 5);
INSERT INTO `yetkiler` VALUES(324, 13, 5);
INSERT INTO `yetkiler` VALUES(325, 14, 5);
INSERT INTO `yetkiler` VALUES(326, 16, 5);
INSERT INTO `yetkiler` VALUES(327, 21, 5);
INSERT INTO `yetkiler` VALUES(328, 18, 5);
INSERT INTO `yetkiler` VALUES(329, 19, 5);
INSERT INTO `yetkiler` VALUES(330, 1, 6);
INSERT INTO `yetkiler` VALUES(331, 2, 6);
INSERT INTO `yetkiler` VALUES(332, 4, 6);
INSERT INTO `yetkiler` VALUES(333, 5, 6);
INSERT INTO `yetkiler` VALUES(334, 6, 6);
INSERT INTO `yetkiler` VALUES(335, 7, 6);
INSERT INTO `yetkiler` VALUES(336, 9, 6);
INSERT INTO `yetkiler` VALUES(337, 22, 6);
INSERT INTO `yetkiler` VALUES(338, 10, 6);
INSERT INTO `yetkiler` VALUES(339, 11, 6);
INSERT INTO `yetkiler` VALUES(340, 20, 6);
INSERT INTO `yetkiler` VALUES(341, 13, 6);
INSERT INTO `yetkiler` VALUES(342, 14, 6);
INSERT INTO `yetkiler` VALUES(343, 16, 6);
INSERT INTO `yetkiler` VALUES(344, 21, 6);
INSERT INTO `yetkiler` VALUES(345, 18, 6);
INSERT INTO `yetkiler` VALUES(346, 19, 6);
