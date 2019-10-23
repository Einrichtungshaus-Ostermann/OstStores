-- alter table
ALTER TABLE `ost_stores`
ADD `seoUrl` VARCHAR(255) NULL AFTER `url`,
ADD `seoUrlRedirect` VARCHAR(255) NULL AFTER `seoUrl`;

-- update
UPDATE `ost_stores` SET `seoUrl` = 'witten', `seoUrlRedirect` = 'https://www.ostermann.de/ostermann-einrichtungs-centrum-witten' WHERE `name` = 'Einrichtungs-Centrum Witten';
UPDATE `ost_stores` SET `seoUrl` = 'haan', `seoUrlRedirect` = 'https://www.ostermann.de/ostermann-einrichtungs-centrum-haan' WHERE `name` = 'Einrichtungs-Centrum Haan';
UPDATE `ost_stores` SET `seoUrl` = 'recklinghausen', `seoUrlRedirect` = 'https://www.ostermann.de/ostermann-einrichtungs-centrum-recklinghausen' WHERE `name` = 'Einrichtungs-Centrum Recklinghausen';
UPDATE `ost_stores` SET `seoUrl` = 'bottrop', `seoUrlRedirect` = 'https://www.ostermann.de/ostermann-einrichtungs-centrum-bottrop' WHERE `name` = 'Einrichtungs-Centrum Bottrop';
UPDATE `ost_stores` SET `seoUrl` = 'leverkusen', `seoUrlRedirect` = 'https://www.ostermann.de/ostermann-einrichtungs-centrum-leverkusen' WHERE `name` = 'Einrichtungs-Centrum Leverkusen';
UPDATE `ost_stores` SET `seoUrl` = 'kochschule', `seoUrlRedirect` = 'https://www.ostermann.de/service/kochschule/' WHERE `name` = 'OSTERMANN Kochschule';
