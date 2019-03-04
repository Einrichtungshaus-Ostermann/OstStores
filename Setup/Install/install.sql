
--
-- Daten für Tabelle `ost_stores`
--

INSERT INTO `ost_stores` (`id`, `active`, `name`, `street`, `zip`, `city`, `countryId`, `phone`, `fax`, `email`, `url`, `latitude`, `longitude`, `position`, `key`, `physical`, `pickup`, `attributeStock`, `attributeExhibition`, `businessHours`) VALUES
(1, 1, 'Einrichtungs-Centrum Witten', 'Fredi-Ostermann-Str. 1', '58454', 'Witten', 2, '+49 (2302) 985-0', '+49 (2302) 985-2014', 'einrichtungshaus.witten@ostermann.de', 'https://www.ostermann.de/witten', 51.456567, 7.391106, 10, '01', 1, 1, 'stock_wit', 'exhibit_wit', NULL),
(2, 1, 'Einrichtungs-Centrum Haan', 'Landstraße 40', '42781', 'Haan', 2, '+49 (2129) 564-0 ', '+49 (2129) 564-3014', 'einrichtungshaus.haan@ostermann.de', 'https://www.ostermann.de/haan', 51.2028264, 7.0362153, 20, '02', 1, 1, 'stock_haa', 'exhibit_haa', NULL),
(3, 1, 'Einrichtungs-Centrum Recklinghausen', 'Schmalkalder Str. 14', '45665', 'Recklinghausen', 2, '+49 (2361) 9396-0', '+49 (2361) 9396-5214', 'recklinghausen@ostermann.de', 'https://www.ostermann.de/recklinghausen', 51.595988, 7.24822, 30, '03', 1, 1, 'stock_rec', 'exhibit_rec', NULL),
(4, 1, 'Einrichtungs-Centrum Bottrop', 'Ruhrölstraße 1', '46240', 'Bottrop', 2, '+49 (2041) 4742-0', '+49 (2041) 4742-4014', 'einrichtungshaus.bottrop@ostermann.de', 'https://www.ostermann.de/bottrop', 51.533334, 6.980574, 40, '07', 1, 1, 'stock_bot', 'exhibit_bot', NULL),
(5, 1, 'Einrichtungs-Centrum Leverkusen', 'Manforter Str. 10', '51373', 'Leverkusen', 2, '+49 (214) 8321-0', '+49 (214) 8321-3424', 'einrichtungshaus.leverkusen@ostermann.de', 'https://www.ostermann.de/leverkusen', 51.0271337, 6.9895958, 50, '11', 1, 1, 'stock_lev', 'exhibit_lev', NULL),
(6, 1, 'OSTERMANN Onlineshop', 'Fredi-Ostermann-Str. 1', '58454', 'Witten', 2, NULL, NULL, 'kontakt@ostermann.de', 'https://www.ostermann.de', NULL, NULL, 80, NULL, 0, 0, NULL, NULL, 'Hotline Mo. - Fr. 08:00 - 16:00 Uhr '),
(7, 1, 'OSTERMANN Kochschule', 'Fredi-Ostermann-Str. 1', '58454', 'Witten', 2, '+49 (2302) 985-6789', NULL, 'kochschule@ostermann.de', 'http://www.ostermann.de/kochschule', NULL, NULL, 90, NULL, 0, 0, NULL, NULL, 'Aktuelle Termine finden Sie <a href="/ostermann-kochschule-termine" target="_blank">hier</a>.');

--
-- Daten für Tabelle `ost_stores_businesshours_holiday`
--

INSERT INTO `ost_stores_businesshours_holidays` (`id`, `active`, `key`, `startTime`, `endTime`, `storeId`) VALUES
(1, 1, 30, '10:00:00', '20:00:00', 1),
(2, 1, 30, '10:00:00', '20:00:00', 2),
(3, 1, 30, '10:00:00', '20:00:00', 3),
(4, 1, 30, '10:00:00', '20:00:00', 4),
(5, 1, 30, '10:00:00', '20:00:00', 5);

--
-- Daten für Tabelle `ost_stores_businesshours_weekdays`
--

INSERT INTO `ost_stores_businesshours_weekdays` (`id`, `active`, `weekday`, `startTime`, `endTime`, `storeId`) VALUES
(1, 1, 1, '10:00:00', '20:00:00', 1),
(2, 1, 2, '10:00:00', '20:00:00', 1),
(3, 1, 3, '10:00:00', '20:00:00', 1),
(4, 1, 4, '10:00:00', '20:00:00', 1),
(5, 1, 5, '10:00:00', '20:00:00', 1),
(6, 1, 6, '10:00:00', '20:00:00', 1),
(7, 1, 1, '10:00:00', '20:00:00', 2),
(8, 1, 2, '10:00:00', '20:00:00', 2),
(9, 1, 3, '10:00:00', '20:00:00', 2),
(10, 1, 4, '10:00:00', '20:00:00', 2),
(11, 1, 5, '10:00:00', '20:00:00', 2),
(12, 1, 6, '10:00:00', '20:00:00', 2),
(13, 1, 1, '10:00:00', '20:00:00', 3),
(14, 1, 2, '10:00:00', '20:00:00', 3),
(15, 1, 3, '10:00:00', '20:00:00', 3),
(16, 1, 4, '10:00:00', '20:00:00', 3),
(17, 1, 5, '10:00:00', '20:00:00', 3),
(18, 1, 6, '10:00:00', '20:00:00', 3),
(19, 1, 1, '10:00:00', '20:00:00', 4),
(20, 1, 2, '10:00:00', '20:00:00', 4),
(21, 1, 3, '10:00:00', '20:00:00', 4),
(22, 1, 4, '10:00:00', '20:00:00', 4),
(23, 1, 5, '10:00:00', '20:00:00', 4),
(24, 1, 6, '10:00:00', '20:00:00', 4),
(25, 1, 1, '10:00:00', '20:00:00', 5),
(26, 1, 2, '10:00:00', '20:00:00', 5),
(27, 1, 3, '10:00:00', '20:00:00', 5),
(28, 1, 4, '10:00:00', '20:00:00', 5),
(29, 1, 5, '10:00:00', '20:00:00', 5),
(30, 1, 6, '10:00:00', '20:00:00', 5);
