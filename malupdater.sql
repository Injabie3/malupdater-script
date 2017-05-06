CREATE TABLE `malupdater` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Time in which the update was received.',
  `user` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'MAL Username',
  `animeID` int(11) DEFAULT NULL COMMENT 'The MAL anime ID, which allows for easy link to the MAL page, or perhaps to link other information from the anime.',
  `name` varchar(100) CHARACTER SET utf8 NOT NULL COMMENT 'The name of the Anime series/movie.',
  `ep` varchar(10) CHARACTER SET utf8 NOT NULL COMMENT 'Current episode that was played.',
  `eptotal` varchar(10) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Total episodes from the series',
  `picurl` varchar(300) CHARACTER SET utf8 NOT NULL COMMENT 'Anime cover URL. Noted to expire after a certain period as it is from a CDN.',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
