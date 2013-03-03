CREATE TABLE IF NOT EXISTS `tweets` (
  `tID` int(10) NOT NULL AUTO_INCREMENT,
  `Durum` tinyint(4) NOT NULL DEFAULT '0',
  `aktive` tinyint(4) NOT NULL DEFAULT '0',
  `twAdress` varchar(50) DEFAULT '0',
  `fAd` varchar(50) DEFAULT '0',
  `fText` varchar(150) DEFAULT '0',
  PRIMARY KEY (`tID`),
  UNIQUE KEY `fAd` (`fAd`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;