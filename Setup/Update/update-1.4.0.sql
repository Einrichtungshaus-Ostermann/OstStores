-- create table
CREATE TABLE `ost_stores_holidays` (
  `id` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

ALTER TABLE `ost_stores_holidays`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `ost_stores_holidays`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

-- insert default holidays
INSERT INTO `ost_stores_holidays` (`id`, `active`, `name`) VALUES
(10, 0, 'Neujahr'),
(20, 0, 'Heilige Drei Könige'),
(30, 0, 'Frauentag'),
(50, 0, 'Rosenmontag'),
(51, 0, 'Aschermittwoch'),
(52, 0, 'Gründonnerstag'),
(53, 0, 'Karfreitag'),
(54, 0, 'Ostersonntag'),
(55, 0, 'Ostermontag'),
(60, 0, 'Erster Mai (Tag der Arbeit)'),
(70, 0, 'Christi Himmelfahrt'),
(71, 0, 'Pfingstsonntag'),
(72, 0, 'Pfingstmontag'),
(73, 0, 'Fronleichnam'),
(80, 0, 'Maria Himmelfahrt'),
(90, 0, 'Tag der deutschen Einheit'),
(100, 0, 'Reformationstag'),
(110, 0, 'Allerheiligen'),
(120, 0, 'Buß- und Bettag'),
(130, 1, 'Heiligabend'),
(131, 1, 'Erster Weihnachtsfeiertag'),
(132, 1, 'Zweiter Weihnachtsfeiertag'),
(140, 1, 'Silvester'),
(150, 1, 'Neujahr');
