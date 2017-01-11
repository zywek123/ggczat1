<?php
/**
* Instalator MySQL
* @author Arek
* @version v 1.0.0
* Wszelkie prawa zastrzeżone!
**/
mysql_connect($dbHost, $dbUser, $dbPass);
mysql_select_db($dbName);

$db->query("create table if not exists `akcje` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`akcja` varchar(90) CHARACTER SET utf8 NOT NULL,
`text` text CHARACTER SET utf8 NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;");

$db->query("CREATE TABLE IF NOT EXISTS `ankieta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `odpowiedz` varchar(80) NOT NULL,
  `ileodpowiedzi` int(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;");

$db->query("create table if not exists `bufor` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`nick` varchar(25) NOT NULL,
`text` longtext NOT NULL,
`do` int(20) NOT NULL,
PRIMARY KEY(`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;");

$db->query("create table if not exists `changes` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`version` varchar(256) NOT NULL,
`cmdver` varchar(256) NOT NULL,
`engver` varchar(256) NOT NULL,
`time` bigint(20) NOT NULL,
`description` longtext NOT NULL,
PRIMARY KEY(`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");

$db->query("create table if not exists `kawaly` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`text` text CHARACTER SET utf8 NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;");

		$db->query("create table if not exists `komendy` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`komenda` varchar(30) CHARACTER SET utf8 NOT NULL,
`alias` varchar(30) CHARACTER SET utf8 NOT NULL,
`staff` int(50) NOT NULL,
`opis` varchar(1300) CHARACTER SET utf8 NOT NULL,
`koszt` bigint(20) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;");

mysql_query("INSERT INTO `komendy` (`id`, `komenda`, `alias`, `staff`, `opis`) VALUES
(1, 'slub', '', 0, 'zaręczenie się z kimś'),
(2, 'join', 'j', 0, 'wejście na czat'),
(3, 'users', 'u', 0, 'lista zalogowanych na czacie'),
(4, 'quit', 'q', 0, 'Wyjście z czatu'),
(5, 'top', '', 0, 'TOP 10'),
(6, 'kostka', '', 0, 'Gra w kostkę'),
(7, 'butelka', 'bu', 0, 'gra w butelke'),
(8, 'zbanowani', '', 0, 'lista zbanowanych na czacie'),
(9, 'akcja', '', 0, 'wykonywanie akcji na danym użytkowniku'),
(10, 'zgoda', '', 0, 'Zgoda na wiadomości globalne'),
(11, 'exp', 'lvl', 0, 'informacje o punktach doświadczenia'),
(12, 'nick', 'n', 5, 'Zmiana nicka użytkownika'),
(13, 'userinfo', 'ui', 50, 'Info o użytkowniku'),
(14, 'ban', 'b', 10, 'banowanie użytkownika'),
(15, 'wywal', 'w', 10, 'Wyrzucanie nieaktywnych'),
(16, 'unban', 'ub', 15, 'Odbanowanie użytkownika'),
(17, 'stats', 'st', 0, 'Wyświetlenie swoich statystyk'),
(18, 'ustawopis', '', 0, 'Ustawiasz swój opis'),
(19, 'owners', 'ow', 0, 'Lista obsługi'),
(20, 'regulamin', 'reg', 0, 'regulamin czatu'),
(21, 'allusers', 'au', 0, 'info o czacie'),
(22, 'priv', 'p', 0, 'Wysłanie wiadomości prywatnej'),
(23, 'pomoc', '', 0, 'lista komend to co właśnie czytasz'),
(24, 'cmdinfo', 'ci', 0, 'Szczegułowe informacje o danej komendzie składnia /cmdinfo komenda'),
(25, 'kawal', '', 0, 'losowanie kawału'),
(26, 'version', 'ver', 0, 'informacje o skrypcie oraz jego autorze'),
(27, 'tekst', 'txt', 0, 'tekst jakiejś piosenki'),
(28, 'skacz', '', 0, 'skoki narciarskie'),
(29, 'me', '', 0, 'Mówienie w trzeciej osobie'),
(30, 'echo', 'e', 0, 'włączenie /wyłączenie echa'),
(32, 'say', '', 20, 'Mówienie jako czat'),
(33, 'kick', 'k', 10, 'wyrzucasz danego usera składnia /kick nick powód'),
(34, 'temat', 'tm', 30, 'ustawiasz temat rozmowy'),
(35, 'dodajkomende', 'dk', 40, 'Możliwość dodania własnej komendy tekstowej'),
(36, 'usunkomende', 'us', 45, 'usuwasz komendę tekstową'),
(37, 'spy', '', 49, 'tryb spy on /off'),
(38, 'wyniki', '', 0, 'wyniki aktualnej ankiety'),
(39, 'staffuser', 'su', 100, 'Zmiana uprawnień danego użytkownika'),
(41, 'sjoin', 'sj', 55, 'ciche wejście na czat'),
(42, 'squit', 'sq', 55, 'Ciche wyjście z czatu'),
(43, 'dodajkawal', 'da', 0, 'dodawanie kawału do bazy'),
(45, 'opis', 'o', 70, 'ustawienie opisu czatu'),
(46, 'privs', '', 100, 'przeglądanie prywatnych rozmów'),
(47, 'staffkom2', 'sk2', 100, 'dodanie komendy do bazy'),
(48, 'dodajalias', 'do', 100, 'dodanie aliasu komendy'),
(49, 'globalmsg', 'g', 100, 'wysłanie wiadomości globalnej'),
(50, 'staffkom', 'sk', 100, 'Zmiana poziomu dostępu do komendy'),
(51, 'ustawopiskomendy', 'ok', 100, 'ustawiasz opis danej komendzie'),
(52, 'delprivs', '', 70, 'usunięcie prywatnych rozmów'),
(53, 'bufor', 'buf', 0, 'włączenie/wyłączenie bufora'),
(55, 'zaloguj', 'zl', 50, 'logowanie użytkownika na czat'),
(56, 'poke', 'po', 0, 'rzucenie pokebollem w kogoś'),
(57, 'zarejestrowani', 'z', 50, 'Lista zarejestrowanych na czacie'),
(58, 'usunakcje', 'ua', 50, 'usunięcie akcji'),
(60, 'delcmd', 'dc', 100, 'usunięcie komendy globalnej'),
(61, 'mysql', 'ms', 101, 'zmiana w bazie danych'),
(62, 'tak', '', 0, 'zgodzenie się na ślub'),
(63, 'nie', '', 0, 'niezgodzenie się na ślub'),
(64, 'pary', '', 0, 'lista czatowych związków'),
(65, 'addcmd', '', 100, 'dodanie globalnej komendy'),
(71, 'ankieta', '', 100, 'ustawienie ankiety'), 
(72, 'glosuj', '', 0, 'zagłosowanie w ankiecie'),
(73, 'dodaj', 'dod', 0, 'rejestracja konta'),
(74, 'logs', '', 70, 'wyświetlenie logów'),
(76, 'dodajakcje', 'dak', 0, 'dodanie akcji'),
(77, 'wakacje', '', 0, 'informacje ile pozostało do wakacji'),
(78, 'rozwod', '', 0, 'zarządanie rozwodu'),
(82, 'changelog', 'changes', 0, 'lista zmian'),
(83, 'changeset', 'cs', 101, 'zapisanie zmian w liście zmian'),
(84, 'script', '', 101, 'komenda umożliwiająca zarządzanie skryptem'),
(86, 'zw', '', 0, 'przejście w tryb zw'),
(87, 'jj', '', 0, 'wyjście z trybu zw'),
(88, 'pomoc2','', 1, 'lista komend dla obsługi'),
(89, 'get', '', 0, 'pobranie wiadomości znajdujących się w buforze'),
(90, 'ile', '', 0, 'sprawdzenie ile mamy nieprzeczytanych wiadomości')





;");

$db->query("create table if not exists `komendy2` (
`komenda` varchar(50) CHARACTER SET utf8 NOT NULL,
`text` text CHARACTER SET utf8 NOT NULL,
PRIMARY KEY(`komenda`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;");

$db->query("CREATE TABLE IF NOT EXISTS `logi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nick` varchar(233) NOT NULL,
  `numer` int(20) NOT NULL,
  `czas` int(30) NOT NULL,
  `text` longtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ;");

$db->query("create table if not exists `pary` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`osoba1` varchar(222) NOT NULL,
`osoba2` varchar(222) NOT NULL,
`numer1` int(20) NOT NULL,
`numer2` int(20) NOT NULL,
`slub` int(20) NOT NULL,
PRIMARY KEY(`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;");


$db->query("create table if not exists `schwytani` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`nick` varchar(222) NOT NULL,
`numer` int(20) NOT NULL,
`przez` int(20) NOT NULL,
`schwytany` int(20) NOT NULL,
`wartosc` decimal(20,3) NOT NULL,
PRIMARY KEY(`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;");


mysql_query("create table if not exists `userzy` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`numer` int(70) NOT NULL,
`nick` varchar(120) CHARACTER SET utf8 NOT NULL,
`online` int(70) NOT NULL DEFAULT '0',
`ankieta` int(50) NOT NULL,
`staff` int(20) NOT NULL,
`ban` int(70) NOT NULL DEFAULT '0',
`czasban` int(20) NOT NULL,
`powod` text CHARACTER SET utf8 NOT NULL,
`kto` text,
`czas` varchar(100) NOT NULL,
`zgoda` varchar(20) character set latin1 NOT NULL default 'tak',
`wiadomosci` int(20) NOT NULL,
`znaki` int(30) NOT NULL,
`wyrazy` int(25) NOT NULL,
`wejscia` int(20) NOT NULL,
`opis` varchar(250) CHARACTER SET utf8 NOT NULL,
`echo` varchar(20) CHARACTER SET latin1 NOT NULL DEFAULT 'nie',
`poke` int(20) NOT NULL,
`tarcza` int(20) NOT NULL,
`tarcza2` int(20) NOT NULL,
`poke2` int(20) NOT NULL,
`poke3` int(20) NOT NULL,
`kostka` int(20) NOT NULL,
`kosci` int(20) NOT NULL,
`kieszonkowiec` int(20) NOT NULL,
`kolo` int(20) NOT NULL,
`moneta` int(20) NOT NULL,
`lvl` int(20) NOT NULL,
`xp` int(20) NOT NULL,
`exp` int(20) NOT NULL,
`zl` decimal(20,3) NOT NULL,
`wejscie` int(11) NOT NULL,
`wyjscie` int(11) NOT NULL,
`sprej` int(11) NOT NULL,
`spy` int(20) NOT NULL,
`karta` int(20) NOT NULL,
`karta2` int(20) NOT NULL,
`kartamx` int(20) NOT NULL,
`mpoke` int(20) NOT NULL,
`okradanie` int(200) NOT NULL,
`mtarcza` int(20) NOT NULL,
`sejf` int(20) NOT NULL,
`zabawy` varchar(20) character set latin1 NOT NULL default 'tak',
`rabat` decimal(20,2) NOT NULL,
`zw` int(2) NOT NULL,
`bufor` varchar(5) CHARACTER SET latin1 NOT NULL default 'nie',
`pass` varchar(15) NOT NULL,
`method` varchar(15) NOT NULL,
`czasonline` bigint(20) NOT NULL,
`kicki` int(20) NOT NULL,
`changenick` int(2) NOT NULL,
`mssv` int(20) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;");


