-- alter table
ALTER TABLE `ost_stores`
ADD `hasPickup` TINYINT(1) NULL AFTER `pickup`,
ADD `hasStock` TINYINT(1) NULL AFTER `hasPickup`,
ADD `isListed` TINYINT(1) NULL AFTER `hasStock`;

-- update
UPDATE `ost_stores` SET `hasPickup` = 0;
UPDATE `ost_stores` SET `hasStock` = 0;
UPDATE `ost_stores` SET `isListed` = 0;
UPDATE `ost_stores` SET `hasPickup` = 1 WHERE `name` LIKE '%warenausgabe%';
UPDATE `ost_stores` SET `hasStock` = 1 WHERE `name` NOT LIKE '%warenausgabe%';
UPDATE `ost_stores` SET `isListed` = 1 WHERE `name` NOT LIKE '%warenausgabe%';
UPDATE `ost_stores` SET `hasStock` = 0 WHERE `name` LIKE '%kochschule%';
UPDATE `ost_stores` SET `hasStock` = 0 WHERE `name` LIKE '%online%';
