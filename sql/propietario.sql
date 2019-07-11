-- MySQL dump 10.13  Distrib 5.7.19, for Win64 (x86_64)
--
-- Host: localhost    Database: crmmexagon
-- ------------------------------------------------------
-- Server version	5.5.61

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `crmmex_sis_propietario`
--

DROP TABLE IF EXISTS `crmmex_sis_propietario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `crmmex_sis_propietario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `razonSocial` varchar(200) CHARACTER SET latin1 DEFAULT NULL,
  `rfc` varchar(13) CHARACTER SET latin1 DEFAULT NULL,
  `calle` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `exterior` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `interior` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `colonia` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `municipio` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `codigoPostal` varchar(6) CHARACTER SET latin1 DEFAULT NULL,
  `pais` int(11) DEFAULT NULL,
  `telefonos` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `correoElectronico` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `informacionAdicional` text CHARACTER SET latin1,
  `logotipo` longblob,
  `mimeLogo` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `status` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `crmmex_sis_propietario`
--

LOCK TABLES `crmmex_sis_propietario` WRITE;
/*!40000 ALTER TABLE `crmmex_sis_propietario` DISABLE KEYS */;
INSERT INTO `crmmex_sis_propietario` VALUES (1,'Carlos Vicente Reyes Salazar','RESC840317J72','LIMONES','312','12','SANTA CLARA','LERMA',1,'50075',1,'2866211','chentiti002@gmail.com',NULL,'‰PNG\r\n\Z\n\0\0\0\rIHDR\0\0\0\È\0\0\0=\0\0\0\è&4\0\0\0sRGB\0®\Î\é\0\0\0gAMA\0\0±üa\0\0\0	pHYs\0\0\Ä\0\0\Ä•+\0\0!IDATx^\í]	|\Õýÿ\Î\ÎÌž\ÙM²9!9’\0\" ·)\"ˆw«X\ïj¥·­­ú/j=Q[µZ«UŠ¬WñB‘[Np…C \\\Ü\çnö\ÞÙÿ\ï\Ín †’ˆF²û\åó#»of\ß\Î\Ìþ¾\ï÷û¾÷\æ\rg}o®‚(‚¡r\Ìñ¸8-Ý$\é¨õy±¥®\Z™F²\Í	\ØT[¥Ú¯³\ÏÇ†šJ,-/Ž\ç#5œE(\nÁ \â<\ÇE\n\ÛŸ,C\Ôh i\ç\ç:?}×¸\ÔnCöä®­ˆ\ÅÈ–:‚4Ar\Ê\0™EQ\å÷ªN&r\Z\ÈT\Æ …d¤iA	F^€3€þžu\Ð÷\Õ1ÿo\ÐPL\ë;\0‡\\h\ÐgW \'²²ãœ¼j	¬:]¤ü»CŒ g?h‚00’°l\Éa¼\ärB\á»j¡#\äx$7C¬É¸n\å\"@«l<3´\Zó/\Ã\åkˆ \ÚA\Î5ü\à	\Ò\Z\\\0r,ñ¸©W6\Þ:Z„—\\‰R·<\ålAKu©\é\Û\Æ5H4Áµ“€,\Òé¨Žy£\'\ÄrŽ\âœ$H€R–t½E?¾%Rÿý7dŠ(\äÅ‘’³žRºx\æd¨7Fsg¯¹ý\á—C¸:³W\ä]\ÏV½ò|ýYµx–N}\â:†&\ÎI‚0\á;\ïðÈ»0X®C¬×¬]=mL\ç5³\Â8\'	\Â¹Ò¬\Ä÷\æb\êºå°¼ûzdK\ÛÁœ€õy¨WóAAŒý\ë<\Ðwk(]\ä¶>VvNn¿Ó²ú\ã\Ã~F’°\Þ5»\äG=Yƒ,Ñµªm‘2–®E;Y\ÎY‘\ÎÀ4‡D¦\å5ªVh\Ø\î%ó)!ô‡ˆ†8¤óD­\0…\ê8h·\á\09I±\ÈAG¢#\'cÿ:‚Žiú9„\äòx(uf:^*j\í\ëi\'\Ê\Ðô¬ƒ\Æ@½Ó‹¹c/#ÀŸ¶~I)§žv:õÃŒ.¿\Ã\ÒRqO¿mM\ï\á“\èu´¿N\ÆW-^Þ¿+KK`ujOa\ë\ÒuqN¤½P[X\"\ÆdC<þb\íÁ\ÙY0˜\Í(:|õ¶z8\Zœ8B¯µD—V\ÄIFp^\ÔQö;Gû	&G (\r¨ŒDŠ\"TÆ…¨œu@´…Ž+H\Ç;\è \æO\Zƒjo\0÷0r\é\×mv\Ìt<õ?%&\â“ñqøðÌºcX}¸Š\ÌÜ€}F\ÃaDþ|q/Lb\Äm›\Öañ±cH$\×Þž¼sQE–Rõ\ä´ø0#UÁ\0(9(Š0\ZŒ¨ª®Aee%\â\ã\ãa2a\Ôi‘B\Î=e_\ê”ög£\í&¥JŠ_@p[oŠA* rƒ$[´X\èm\Ë$a\Ü\én\Ñ\ã\Ö<\rþº\í#\"\í\ÛÌ‘Y\ã`óy1cøp\ÜF\ÏÜ†ò/´zAÀ\n/1õ;89€\0}¯\ß\'\Ãl±æ®¡(Ž«Àõ«W!AG\ÍE‘$ª\â\'O\Ê3%\âYS2ŽQ\Äðx¼p:99Y\à\ÉQB\ÔZ3g\nÑ¾)-n\ß\æÁÑ´£•öÐ·Ÿ !(N‚{2À‘¶`\äp>Á\ÔdŠŒÎ§‹2_…„\àzK\éU£#\Óq\Ôû½˜=f,\â*Rqó)rŠ\Ùùr<A‡¤òM\ÐÙA6% .}Z3„€Aª\Ö\Ó\à\ÇSWõÃ”1:[´0ª\"\É9)Ò¿\r‘GeUJK\Ëa·Û¡%§\í\ß?‡|ˆR›@P%Où¶™R¯””\Ê`ZIm¾kAý\Ý\ÒL!rø%r~Š(”>µj\ì¹x¸T‹@a4P´ü\íÀH¯ï†›\ß\Ü	s¼6L\r‘$\èÁÀu¡g\á¤”®Cúþ‘»\ê$—… h‚@<0\'\èñð\â\"¬\Ø(\á¿ùù°ù}‘š»>¢Š ¬\ÍóPk*²	‡,­ \×9\Ù}‘œœ‚¤¤•©©)°Z­0\Z\ÙÈ¹¾`\ç„£c“\Íq†\ÈÑ‰´\Äó˜7Êˆ™y§Ú¬F<¡\åôI\"‰&™\Î5|\Ül\Âg\"¥‹3z_„«\çl\'g×©­¿B?½ »‰Ó¡‘œR\Ä	z„D#$]<zÎ†\Ñ[M$\â\Õ@d¶hñ\à¢^F×ˆõpE¢Š \ZŸUõu¨­­S£„\ê(d‚@©I\Ä4”‰¢ ’¨p\×^ØƒvÊ¹;\é2ITƒ\îq\Èø\Ív/þXxªýa§\ïõ\'†‚N’\Ú0{\ä(\Ü0/D“x\"5\n‘æ°–m†? \ÃN\È\'Ijƒ¡‚\Î7(`=¾Š&<\ïŒ}Ž¥e\ãgo\Å\Ç\ã\'ÀMõžØ¿#ª\Â4A†%ýÚ¤?\Üp»\\(9~%%¥*i*+kP|ô\n¶nÇ§‹– ¾®\ÝôI\än\ß\Æ˜C†òÌ ýØ®¬gŠ}%sfö—lx\"\Ï\Æ\ÄaÁE¦S\ìÃ‘&\Ìf¤du4‚b/#ýp1«‹\ê gùR„$/Ò’“°\ï\Ó×‘—{>\êN\Ô9\Üp6³¹}üNµiK\Ë\Ê\ê}pTh\Ñ/1ôI\×\'HÔ‰ôQ	)ø“S\Æ\îâ£(·R~g¶DZC<9”…ôGff†f÷Æ¥+‹QœYF\"½ý#õ\ÌA\Ù4ü÷\ÆN\ÄÅŸ/Bb[fs\n‚›{\ä \Þ\ì^a=M¯Á\Å\É<Cd¿& ÀH\å\n–”S:F‘A«9³¦\0\Þ)©ie\ïû—Á¢?\Ù\Ñ s\"Ü‡·aÅ¥.4ô‹\0e¶lÛ…\Ò/úYõ¸b%¥÷$\è\äStX¤u\î\Z\Ú\r\ç\ru\ãñ¤gºø\\¯¨\"Tl±\â‡ƒ$\Ô)r&ýa%\rPS)­–\ÒJ³dÊ±“\âô¸øùµ8¼zDtkt}L¸¶x%õ.?\ë…j\Ò\Z·œ9\r¦‘7\Ã? ›’ª$E\Ça|’\0©…V›\Õ\Z \â,­ ‚H‹¬ûø\èeúœ\ÏO¿K•¡ø\âp\rEp\ÂÀ\Î\Û)ip\èFLôÁô”d•\Ìðy q5Y¨1 ó¯±Û‘ýe\é|\ä\Ðr\çY˜;-cV³ž¹\Ó\\—.€¨\"›Bb%z\Ò	4„dŠA\ä\æFzzšJˆF4N™/>zw¼¶\â\Ñ-\à\Ä\Ö[ÿ€ Vx’J²F’0oI\ç\Ðk6¹’\Í@nÁ·[DœÂŽ\ê\0¶õ¹\ÈÍ¡:\é\ØØ‡\Ï\Ô_ÀB	§Å¤ƒKR²‡H \ã‰_ÿ\×.r£\Ú\á£\é$A~§Áý£¨ZEú¬\ìqk°1±FQ°ªJ\Ä\Ä\rVŠ\Ê	nË¬;™°\ã\Þ‘³ò=Xõ¬\ëúd½]\rÑ•b)!7$\à\çe6T‘3°n\Ý™™È tŠ\r2\Âx½”V\Øì¨¨¨Dj¢o\î\'²aù\åø-€µ\Æ^¯7o”œ\ÄüCGHä…\×=\rý\æHi\ÛÀýr%\î—Œ\Ò\ì~XX,‘\0ˆl ž`asÐ¶q=D¬Ï‹„a¾šHJz„(‚p\çœ÷\ÏY\ÅL¯ó»\Ä8A„ “‘³$	\Ç}\"tM”*‹4Aª\ë\ëûó\Ðgù;°\ZY\Ã#H—À	\r\âˆhI‚`21‡\nÿÈ¬û\×Lš$#£;†\rê›_YIy\ZI\Ý\Þl@\Ñ\ãñ    üžýwð\'\Ðx>\Åm\å_b\åqu\ÎX9\Ò;WOFº©\åzš\"ó¡Õ˜{\Ë˜<\Ò+Ân\Ì;H$¡†þ¯ƒ\r`³Bšÿhyx>i”K\ÒNt9O|‡_1?ªÀ\áSðñ\×f	:.=Y}5øšñj\Ñwi*\Ìú E¦\ÄR`\Öj°bZ.r\×/€\Õ&XWE\Ôi!ñI˜\áT°·¦Zm\rYŠ•””D‚Ý¯výju¬+”¨\ËH7\ëqù‹« ÿ\ê5pm!»’[\É	\Ùð3¥ñ+to\ã\áqH\ÐRŠEi–\Í\ç\ÃúŸ]‹\Øúˆú²\ÝU˜0 Z¦û‰\Ìþg\Çe´X:¶}Q¨7½±\ïïª…IûÍŽEtšªnHc‰jpÊŽ“S0bm\n\"ô\Íú&|¤Yòû\Æ\ã¶)¸\ã\àR\Ä];‚4iRº>Dj	·:\ë1\ß\ï%\ÄA/!„‚Ð‹L\Ô\Z¨e)ˆ\n	v\"\ÈWÖ¢\ä«\Ï\àõ\àr¹N1·\Û©9¥hb˜€þLJXBºÇ¨‘E–gÀ}kw…wn—\rJ;A6\å~ÀR>º\Ü\Üar0\\?(	2io\Ö2\Í\î•5Ð¾J.+_U.\ä†þ“lmÐžB‰rÛ…\éxÿðq\èÔˆ\Ôu\ÉÁU„i7ý®f¿ƒHŽI\ÍDÿ\Ädr~­ˆ\Ã5NJ=È­MF$”nD¼\Æ…?µ\ÅgƒŽ,oŸ?\ï\ru\ÈÖ‚MÀFrÖ¢²”„	k}wU\ïÃ–\Ò\ã\Èï•†\ëR¶`¬ùk=_ˆ\Ôr:(xjŸ÷g\ëO¿h7Bh\ï]£\è‰Â‡‘†	m÷õµ06\ÔI	\è¾<\Õ>jQ4\Ð\ÑwkIÜ«§D\×\Î\é”\àö\æ-€¥›šL\â<—u	#Ü¢è·•dAr\Zeo\r0k)ú™Ë±ð£\Ðð…\á]Ï€¼¼<(œ[7=lŽ*\è²\ÊªÓžB*vS\Âÿ?\ÊO¨˜¾S\ÉS\Î\Ø\î2glšû[¼º\æ\îþ\ßAX,:ø‰YIz<pioü(ÛŠŒD¶\Ùae\áfLºp\ë|¨¨S°­J\Â{û\\((ó\Ã@\á\Æ\á	\àÙ«ú\Â\âi\Ç\ZXø®^1D)Aš~üPQœ¯¯\Å\È\înôï—\î™žf¾‹ \Ì9Ö¬^Ei‡›ÿ	l\ZN\Ú#ATÐ¥\r‘¸f\à\Ø %Mlû0O\'¸•‚¼g¿\Â\Ö2\ëw†û¥‰0\êOòQ\Ä{Ÿa˜%\ÚÎ²\'=Œd}ÿ]FGA_\"\Õ\Öß@ü\Üÿ!±·D\éX×Ž1‚0P\ê*ªT	2®—„€\äCðL\Ó\Ë	¬…\×jµ$\Òý$\Ò)\ÅúŠÜž\ÝW\Ñ\Ú\Ü-ÙõrhrG\n¾gý\èþ\è\Ô{eø^¼4RxO>S\Ó/†7\ä\'³yj@²^ƒ«?¨ÆZ\ÒaO_Œ´¬‚7\çD™þû§ù÷®\ßt\0lL\Ä`0œ\Ñô\ê-­a2)i·ª§‚\Ý\ìD\Í4×ƒR±\Î\é£=\ÓG\à•ŸdG\n¾	›·\Å<ÚW W”æ±‰Œ÷ŽJmF>z¿¸Ž\Þ\ÑC†A\Î\"¸>o!d\èK\âÆ¯\nc\æ`*1¨E†?\09\ëEpv¯FgƒÞ \Ç\àt\Üo¤\ì$j\Ü\âºL‡\"“§1°\Ïy\è™\Ô\rq_Œ\êÞ‡`dwF	9birj&}>o›Lf÷k4w\á!(½ž‚\"Z\Ø\âG\0¡8òCÀ§ÿ1²W\çÁ¨0\";_q`\îú£8^\Ý@¥¬\Ë\Ñ#\ÝR\ã1¨g÷\É\Â^§\Ãf\ï\Æø•ŸÀpAôªŽŠr0\Ä4C\r2ö<6`\Èaò”k I\'g±¶A±k\×N\ì\ßSˆ\í;vDJO\"\ìv§o…ô?^»{lõ\ê@\æŒ!\Ãñ‹\ì¶ø}\Õ\ÙýCF`j¯,•¼=>|K.¹ƒ“\Ãò—/Ä­½s0-\çüHIÛ±tO5v—Ú±b\ãNô\ê•\rtØ°\Û^X]0¥JÐ±œ+ÄŽ&º\ÈÁ‹ -!¤À\ãrÀ\ítÀs:s5¨‚¾5¿a÷t¸†\"Pü›ÿ\Æ\ã¹#Põ\Ó;a»\é.Ü™u>*¼õF§=\×Ü„½d7¬Y†\ã.§º \\¹Çƒ\çö\ìŒ\Ô\0q6`}Uö\Ø\ë#%\íÃ”Rñ\ç\Ër°\ê\å§1w\î[X\Â\ï\Ã\ÑôƒH\ì\ß\0kŠ]H¤\ëÁ\Î\"ú\ÈÁ#H‹8TÙ«Vþ/\Ô1\çùñ\êex\ëGS0.­[¤„\Í\ä©nZu*ú8\ãºe\à¡šu\Ýy}°¬ü¸º\á\É]\Ûð\Ø\àa*©:v2¦8IŸ(\Ò*¸}?\ëÆŠRb4\"FÀü…Mbd7SÉškö`CM9~L\ßŒv¿„5¥˜Q¸U\ì8¡[&J=.\ÄQZ7¹[O|VrT\Ý÷£cGpkŸ”y¾9\í¥\ãˆnB4GŒ \ÍAa\ç©m\ã?&\è¿\rØ¢\n\ÍÁ\\”\Ý?R\âv\á³\Òb\\\Û3L¢JŠz:¶û\æ\â¥}{°£®\×ô\ì…d5þS{¥bøöˆ¤°@…—\Í\Ô=“±ý:Šñ\é˜sp_\ä\ÝI0ažb0\àö¬þ\Ør\ÅõøóWk\Õr–bY(’”‚]$¢ŸÙ³\å\æ©÷Š\Ûý§\ïPˆ¡cˆ¤0‚°\ÕMš\Z»O„\Ù7\Ë\Â+£t‹\'\\û6¬&Ñ½•”\"h°¡°¾V]g\Ø89\àØ‡±\×VG)–‰‘\Å\ç&u\ë%e\Ç\Ñ\×½†\'ò|\rC«ˆ¤0\ç×±¿\êkrBf\ï·‚¨‚ü—÷9<¸~\ÝrÜ½ù5b+0²‡’6â¥¼1(!ý1Üš‚üô\îj\Ù\Ã$\Ì\ß\Z;Q}\Í\Èú»~ƒ\Ô\×1œ]\Ä\ÆAšŽƒôôA§\Óâ¢‘c\Ô;ÁhÀs`$i\ä[²t÷®8r\ä0¶o\ß.übW\ÅB\ì¯[‚.˜)i\Ö—9\Æù\Ð\Ý9œ\èˆô`\Å‹ -€E†8“\éf‰· ººË—-\Â\ç+—©¶l\é\"TUUª\Ñ\ä‡‡\ëk|´û\n4\Î$®—Šq¤a‹ú:†ö!Ff`)“\×\í\Æ\Ç¿Å‹?9aŸ~òö\ïû\Zqqfu’b\Øjz\ÓY(±­Æª\Ó\"\ïN\Â/{p¸¾^©\ßQœ‘­1´1‚4„\Ópªó77–Rý k(’\à\ÊQl_­–y¥Zõ/C‰¯f\îy\rûk—cñ\Þ\\5\\……‡ˆl¡=ˆ¤hMÛ±öb\Ö\æiXyð¯\Øo›ŒYû\æ\àP\Í?±`gVd+ý¨:\r\â´°\Ã\Ü\ÂY0ŠnŠt­L\ÃoÇ£ž¢N=g:\ÅœNH\Ä\ÒA0R8r¾H\á÷„e\å@A\íT\'\Ì$¨·\Ô\\‰\×\Í<Ø‰\ÄÊ–\r\à´Z\È<Ÿ¨Ex¥÷¶¹µŸ\Èq^ÐŽö\ÙXg{kì¯ž°/mÿ\ÂžÕ°q†¨!IŒ \0#‡£¡9ýúâ¥—_\Â¾„\é÷\Í\Æ\Ïn{¿ÿ\Í\Ëxmæ§¨ª©‹\ì}ö¡\ã}\Ðò\ì®?Šj\ÌUy\"\0»\ïÄ¨ƒy\ÈÑ…oÎ¢mš¶¸2«ˆ>.‘Rñh\ã°\Ûö.õ\ï\ÆøÀ!\äKOØ˜Àa<\Ùð.¦ù\à9±’]\×FŒ \í9·\Ûmø\ÛsOaØq\Ë\Ô9øÅ¯`öü\rød\é>¼óÁ6<ú\È;\È\êynü\éSðû\Îþ¶Œ#)[UE]RˆŽ)bw5’—£c\Ô`H]&”­\Ç\Åöi>¥\Å\ëó\á•WgÁÿ…½ü\nòú\'b´¥£\Ö/#\r€R)oPú¦É”¦i\â(C€\"M4 Fv€9¥½ÁŽÿ\Ì{/üm3f<:Až©:<˜[†™c\à—H@ã‘œ–Œ\r\ëöá¼ŒŸaÿc‘\Z\Î\"¯NhdKøhE\ru:ôKŒW·i¼Ã …’-°\è´\ÈIJPÿö±†·7\â\æ›oÁ¢\ß\ÇòE±bñ§ðWÀ¡õ _¿–*¡è ˜Àyüˆ?‡\í¢\é\à\ßC‘É‹`”ƒ!6P\È\Ðl\ÑuM+5\ï8	F—Ó‰y\0o\Í)BAÁ\×\àô&L\ì^ƒÿ/\0djk\Ø\à\Z/£\Ôm\Æ\r›†£Ü«§\ìG‚\Û\íGQñlXÌ–Hm‹£G\âÎŸß…Á·<™¢[„ˆ\'­¢ð‚z§ðL\ßð!J°Ù£Öˆ”\\3ùø½ùZ$(Í¶wA\Ä\"H3ð\ÔB²‡WòÍŒó;\Ñ33\rw7|ùe!Œ&=‰óþ3t|’wP„+À‰d¤s6lœ°N\å/\Ðj\Ü4õ\Ù\È7t>Œýð¡ tyx­‚N…-xÇ‹p\Z\ÓQ¢É\èH\èL\ì\éDf\Ì[B| ¿z¥\í½b\ç2b„!A<³–!s\Òõ\á[e)b4…\Ã\'aÖ¯\'\â±\Ûþ©>Nš=¶‡Éµùk\à–¨õ\rH\à\ÈÉ„\ÑSA\Âº\íocòWq\Ð‘¡ª¢_lûflqCO\Äi¥\Çø»‡F€R\Î\ÅÏ \ï\ÍO‘Fa£\í$\ç5¼\ZAØƒu\ì\\2\Þm„d«vøP}\ÝxðR¼\Ä2±?ŠøXB\ìN\Ê\Î:‰\ï1‚0D\â{õSho.òŒo^7ù\ÑÒ«­¸ý\ê\Ç`M‰WWX\×p\n\\ö9\Ü^JR¬™\Ð\Ýù[-‘\Åñ»1ò‹\ËQ\ã\×CÔ°%;½˜ñðux\Ô\Þ\r\å5.ua¶Î€\Ì	H’*qÉ±9È¼\áI‰ ,\Åj$ˆ[cÁ4\ç\Ø7\ïƒcoMGÑ³Cðz\ÕK¢CZ–‚F9b)V3ð¢\ZJ9x\íI\ãD=­f\Ô>¦®‚®\îG\ÞR\å\Ó\ã°\ËHi™º;(…’|PünðzB‚u£J\"‘HX¸\ã~t~7ˆ\æx˜\â;\É(mŠƒ¬>ñJ=´°³STdDIV\âC\Óo±AwCuÐ’†2ƒL	ÿÕ²ø\Z%\ä`ˆEr\Þ\àþ\n8g-Ÿ`\Ç\Æš€E”„„8ü\í–[1\ã‰wg\Ïkª\'\í1{\ÐW¸ö\ê<(“ÿ\0¹ºŠ\Ã‘±\â\ÍG1ð\ÃaH1°\çkP\Ö\å`ü\è†¦\á\×ß†h\èœG—…ñô\Õ?\Ê \×õCbkx±\èÁ¢\é\ZQ\ÝG\Ñ\à8¸»\ç?Ž’<	Áw,\ÆBiH€–Ù‘¹|‚\â©A•#0¡ý›Ë¯\Ä_xKøiS® \ßv/\ÄC/\Üdö‡¬3+=ªN\ëxo\Æ?pOAua²y½i<\ÙIØ´òsˆmy \çwb+ò£[°ýnz~\ÒNl©T…™šf‰ªü’õ&4\ìßŽ\Ís‚\íÕ¿ƒwG\ç\rY1‚\Øj\å\×ö\êƒwÇ„o@j\rûö\ÅEC\ïE÷\îVõ½\â0<¡õb2^\æZôN5B®,\Ç\í/\ïW²_\Ú2 g£\Ü§Ãƒ\é™Šü[¯\Â\à\ä\Î…®«*\ÇW^ƒq¿ÿ\'„\"G\Ä \â(<ý¥&H\ìû·b\Äñ\êó\ÐD)Ab\Z$Ÿt\æn\Ëz9’Ð¸°5Ï…°\Ùµ{}ø\ä\Ã\Í@\íQ\Ø\ì\rx\ç³c\Ø\á´BÐ„W<ac(^½F\ç\"]\ßù\íÑŽ2;‚LUtÍJM3©\Ð\Ïn\Zc9b”\"Fš>\àòtxü©QW\ëT\Ó.½FÀ\Åro¼ý;?F&¤\n\àµ\Åcþ_$d\Êý(PD!Gc=X?¿#UˆCj\\\'¥VMÀS\Ä`½W\ìŒ1˜5}\ÍÀ\Ñù©SZ(ºF3b!0rh`kÔž7\Þ4WM¹U¶L\à31^L…R\ØN\×F\ìýœÇ«\ï#-AFw>yº~pù¼\ÈH‰\Ã\åwßŠ«û‡S³\Î\ÆÀD­ú„\ß\Æ&!\Ò\ÑF ˆ\Âò+µÁP ³ý\Ú\ÖvtI\Ä4H®`\0Y&†H}P3¨\ÈeitŽ\ÈÛ \Â\áÖ‘=ðùŒ·¶\Ðk’>c·UUzôS†§O…\Þ\ä…\ì¡2ù^øðLY°£ú$`j‚„T­y`Â™ÁZ0,\à_\Å\"L†Hk\Þø‹5;6\ÍËš½\×\"|•Å¨y\ã1Œ¾o6$¿7¬?(ª„\Ô[‡™!\Ó\êQóuV<ÿ[\Þ\çt…+ˆ2\Ä\ÒRHFð®\Ë.–_\âÁ\ÜqøU‘€õ3V¢¦\Ì¿×ˆ¬Ÿ\âý\åƒ (AX\Ì®ý\Å(“‡\ã\Ê\Õ\ËaÈ¨‡;¨\ài9Yµ\à\ßð\ê\ÖÁOX\æq‰|}öx‚F\ï‡¡¢ý^{\ã|ýAe\"O¸G‹\Ä@Ù‚¥\Ïü\nº\ß\çˆ$†8ý%aYH\åð‰¼õ\ËC~Ó‘Z/“À\'i—„bŠ,/c“\ïk$$’û…4¨§\Î\Ô$ E!gl£Ÿ³û9<’€;j°f\Ú^e½\ã`cby2_ù.y|$J\ÕLˆ2m÷h‘±\Õ\Z‰ Ÿ<v\'\ÌK\0g¸‚¨ðÿ\â1VZõ«\0\0\0\0IEND®B`‚','image/png','1');
/*!40000 ALTER TABLE `crmmex_sis_propietario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-07-11 12:24:15
