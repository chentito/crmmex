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
INSERT INTO `crmmex_sis_propietario` VALUES (1,'Carlos Vicente Reyes Salazar','RESC840317J72','LIMONES','312','12','SANTA CLARA','LERMA',1,'50075',1,'2866211','chentiti002@gmail.com',NULL,'�PNG\r\n\Z\n\0\0\0\rIHDR\0\0\0\�\0\0\0=\0\0\0\�&4\0\0\0sRGB\0�\�\�\0\0\0gAMA\0\0���a\0\0\0	pHYs\0\0\�\0\0\��+\0\0!IDATx^\�]	|\���\�\�̞\�M�9!9�\0\"� �)\"�w�X\�j�����/j=Q[�Z�U��W�B�[N�p�C \\�\�\�n�\�ٝ��\�\�n ���F��\��#�of\�\�\���\�����\�\rg}o��(��r\��8-ݍ$\���y���\Z�F�\�	\�T[�گ�\�ǆ�J,-/��\�#5�E(\n� \�<\�E\n\��,C\�h�i\�\�:?}׸\�nC�䮭�\�Ȗ:�4Ar\�\0�EQ\���N&r\Z\�T\� �d�iA	F^�3����u\��\�1�o\�PL\�;\0�\\h\�gW�\'��㜼j	�:]���C� g?h�00��l\�a�\�rB\�j�#\�x$7C�ɸn\�\"@��l<3�\Z�/\�\�k� \�A\�5�\�	\�\Z\\�\0r,�W6\�:Z��\\�R�<\�lAKu�\�\�\�5H4����,\�騎y�\'\�r�\�$H�R�t�E?�%R��7d�(\�ő���R�x\�d�7F�sg���\�C�:�W\�]\�V���|�Y�x�N}\�:�&\�I�0\�;\���Ȼ0X�C�׬]=mL\�5�\�8\'	\���Ҭ\��\�b\�尼�zdK\������y�W�AA���\�<\�wk(]\�>VvNn�Ӳ�\�\�~F��\�5�\�G=Y�,ѵ�m�2��E;Y\�Y�\��4�D�\�5�Vh\�\�%�)!􇈁�8��D�\0�\�8h�\�\09I�\�AG�#\'c�:��i�9�\��x(uf:^*j\�\�i\'\�\����\�@�Ӌ�c/�#���~I)��v:�Ì.�\�\�RqO�mM\�\�\�u��N\�W-^޿+KK`ujOa\�\�uqN��P[X\"\�dC<�b\��\�Y0�\�(:|��z8\Z�8B��D�V\�IFp^\�Q��;G�	&G�(\r��D�\"Tƅ��u@���+H\�;\� \�O\Z�jo\0�0r\�\�mv\�t<�?%&\��q��̺cX}��\�܀}F\�aD�|q/Lb\�m�\�a�cH$�\�ޞ�sQE�R�\��0#U�\0(9�(�0\Z����Aee%\�\�\�a2a\�i�B\�=e_\���g�\�&�J�_@p[o�A* r�$[�X\�m\�$a\�\�n\�\�\�<\r��\�#\"\�\�̑Y\�`�y1c�p\�F\�܆�/�zA��\n/1�;89�\0}�\�\'\�l�殡(�����W!AG\�E�$�\�\'O\�3%\�YS2�Q\��x�p:�99Y\�\�QB\�Z3g\nѾ)-n\�\��Ѵ����з� !(N�{2���`\�p>�\�d��Χ�2_��\�zK\�U�#\�q\����=f,\�*Rq�)r�\��r<A���M\�ُA6%�.}Z3��A�\�\�\�\�SW�Ô1:[�0�\"\�9)ҿ\r�GeUJK\�a�ۡ%�\�\�?�|�R�@P%O���R���\�`ZIm�kA�\�\�L!r�%r~�(�>�j\��x�T�@a4P��\���H�\�\�	s�6L\r�$\���u�g\����C�����\�$���h�@<0\'\���\�\"�\�(\�����}���>�� �\��Pk*�	�,��\�9\�}���������)�Z�0\Z\�ȹ�`\���c�\�q�\�щ�\��7ʈ�y�ڬF<��\��I\"�&�\�5|\�l\�g\"��3z_��\�l\'gש��B?� ��ӡ��R\�	z�D#$]<zΆ\�[M$\�\�@d�h�\��^F׈�pE�� \Z�U�u���S��\�(d�@�I\�4������p\�^؃vʹ;\�2IT��\�q\��\�v/�Xx��a�\��\'��N�\��0{\�(\�0/D�x\"5\n�氖m�? \�N\�\'Ij���\�7(`=��&<\�}��e\�go\�\�\�\'�M��ؿ#�\�4A�%��ڤ?\�p�\\(9~%%�*i*+kP|�\n�nǧ�����\��I\�n\�\��C���̠�خ�g�}%sf��lx\"�\�\�\�a�E�S\�Ñ&\�f�du4�b�/#�p1��\�g�R�$/Ғ��\�\�ב�{>\�N\�9\�p�6��}�N�iK\�\�\�}pTh\�/1��I\�\'Hԉ�Q	)��S\�\�⣐(�R~g�DZC<9���Gff�f�ƥ+�Q�YF\"��#�\�A\�4��\�N\�ş/Bb[fs\n��{\�\�\�^�a=M��\�\�<�Cd�&��H\�\n��S:F�A�9��\0\��)�ie\�����?\�\� s\"܇�ať.�4��\0e�lۅ\�/�Y��b%��$\�\�StX�u\�\Z\�\r\�\ru\��g��\\��\"Tl�\���$\�)r&�a%\rPS)��\�J�dʱ�\������8�zDtkt}L��x%�.?\�j\�\Z��9\r��7\�? ���$E\�a|�\0��V�\�\Z \�,� �H����\�e��\�O�K���\�p\rE�p\��\�\�)ip\�FL����d�\��y�q5Y�1��ۑ�e\�|\�\�r\�Y�;-cV���\�\\�.��\"�Bb%z\�	4�d�A\�\�Fzz�J�F4N�/>zw��\�\�-\�\�\�[���Vx�J�F�0�oI\�\�k6��\�@n��[D�\�\0���\�͡:\�\�؇\�\�_�B	�Ť�K�R��H \�_�\�.r�\�\�\�$A~�����ZE��\�q�k�1�FQ��J\�\�\rV�\�	nˬ;��\�\����=X��\��d�]\rѕb)!7$\�\�e6T�3�n\���Ƞt�\r2\�x��V\�쨨�Dj�o\�\'�a�\��-��\�^�7o���\��CGH䅐\�=\r��\�Hi\���r%\���\�\�~XX,�\0�l �`asжq=D�Ϗ��a���HJz�(�p\��\�Y\�L���\�8A�����$	\�}\"tM�*�4A�\�\���\�g�;�\ZY\�#H��	\r\�hI��`21�\n�Ȭ�\�L�$#�;�\rꏛ_YIy\Z�I\�\�l@\�\�񠠠 ���w�\'\�x>\�m\�_b\�qu\�X9\�;WOF��\�z�\"�՘{\��<�\�+n\�;H$�����\r`�B��hyx>i�K\�N�t9O|��_1?��\�S��\�f	�:.=Y}5���j\�wi*\�� E��\�R`\�j�bZ.r\�/�\�&XWE\�i�!�I�\�T���Zm\rY����D�ݯv�ju�+���\�H7\�q�����\�5pm!��[\�	\��3��+to\�\�qH\�R�Ei�\�\�\���]�\�����\�U�0 Z���\��g\�e�X:�}Q�7��\�徭I�͎Et��nHc�jpʎ�S0bm\n\"�\��&|�Y��\�\�)�\�\�R\�];�4iR�>Dj	�:\�1\�\�%\�A/!��ЋL\�\Z�e)�\n	v\"\�W֢\�\�\��\�r�N1�\��9�hb���LJXB�Ǩ�E�g�}kw�wn�\rJ;A6\�~�R>�\�\�ar0\\?(	2io\�2\�\�5оJ.+_U.\���lmОB�rۅ\�x��q\�Ԉ\�u\��U��i7��f��H��I\�D�\�dr~��\�5NJ=ȭMF$�nD�\��?�\�g��,o�?\�\ru\�ւM�Fr֢���	k}wU\�Ö\�\�\�\�R�`��k=_�\�r:(xj��g\�O�h7Bh\�]���\�����	m���06\�I	\�<\�>jQ4\�\�wkIܫ�D\�\�\�\��\�-����L\�<�u	#ܢ跕dAr\Zeo\r0k)��˱�\���\�]π��<(�[7=l�*\�\��ӞB*vS\��?\�O���S\�S\�\�\�2gl��[��\�\��\�AX,:��YIz<pio�(ۊ�D�\�ae\�fL�p\�|��S��J\�{�\\((�\�@\�\�\�	\�٫�\�\�i\�\ZX���^1D)A��~�PQ���\�\�\�n�\���f�� \�9֬^Ei���	l\ZN\�#ATХ\r��f\�\� %Ml�0O\'����g�\�\�2\�w����0\�O�Q\�{�a�%\�β\'=�d}�]FGA_\"\�\�ߍ@�\��!��D\�X׎1�0P\�*�T	2����\�C�L\�\�	��\�j�$\��$\�)\���ܞ\�W\�\�\�-ُ��rhrG\n�g�\��\�\�{e�^�4RxO>S\�/�7\�\'�yj@�^��?�ƁZ\�aO_����7\�D��������\�t\0lL\�`0�\��\�-�a2)i�����\�\�D\�4׃R�\�\�=\�G\���dG\n�	���\�<ڏW�W�汉���J�mF>z���\�\�C�A\�\"�>o!d\�K\�Ư\nc\�`*1�E�?\09\�Epv�Fg��ޠ\�\�t\�o�\�$j\�\�L�\"��1�\�y\�\�\rq_�\�އ`dwF	9birj&�}>o�Lf�k4w\�!(���\"Z\�\�G\0�8�C���1�W\���0\";_q`\���8^\�@��\�\�#\�R\�1�g�\�\�^�\�f\�\�����pA����r0\�4C\r2�<6`\�a�k I\'g��A�k\�N\�\�S�\�;vDJO\"\�v�o��?^�{l�\�@\�!\��\���}\�\��CF`j�,��=>|K.���\��/ĭ�s0-\��HI۱tO5v�ڱb\�N�\�\rtذ\�^X]0�Jб�+Ď&�\��� -!��\�r�\�t�s:s5���5�a�t��\"P���\�\�#P�\�;a�\�.ܙu>*��F�=\�܄�d7�Y�\�.�� \\�ǃ\��\�\�\0q6`}U�\�\�#%\�ÔR�\�\�r�\�\�1w\�[X\�\�\�\��H\�\�\0k�]H�\��\�\"�\��#H�8T٫V��/\�1\���\�ex\�GS0.�[��\�\��nZu*��8\�e\���u\�y}������\�\�]\��\�\�a*�:v2�8I�(�\�*�}?\�ƊRb4\"F����Mbd7S�ɚk��`CM9~L\��v��5��Q�U�\�8�[&J=.\�QZ7�[O|VrT\���cGpk��y�9\�\�nB4G� \�Aa�\�m\�?&\�\rآ\n\��\\�\�?R\�v\�\�b\\\�3L�J�z:��\�\�}{���\��\�d�5�S{�b�����@��\�\�=���:��\��sp_\�\�I0a�b0\����\�r\����Wk\�r�bY(���]$��ٳ�\�\���\���\�P��c��0��\�M�\Z�O�\�7\�\�+�t�\'\\��6�&ѽ��\"h����V]g\�89\�؇�\�VG)���\�\�&u\�%e\�\�\���\'�|\rC���0\�א��\�krBf�\��������9<�~\�rܽ�5�b+0���6⥼1(!�1ܚ���\�j\�\�$\�\�\Z;Q}\�\���~�\�\�1�]\�\�A�����A�\�⢑c\�;�h�s`$i\�[�t���8r\�0�o\�.�bW\�B\�[�.�)i\��9\��\�\�9�\��`\�� -�E�8�\�f�����˗-\�\�+���l\�\"TUU�\�\��\�k|��\n4\�$���q�a��:��!F�f`)�\�\�\�\���ŋ?9a�~��\��\Zqqfu�b\�jz\�Y(��ƪ\�\"\�N\�/{p��^�\�Q���1�1�4�\�p��77�R� k(�\��\�Ql_��y�Z�/C��f\�y\r�k�c�\�\\5\\����l��=��hM�۱��b\�\�iXy�\�o��Y�\�\�P\�?�`gVd+��:\r\���\�\�\�Y0�n�t�L\�oǣ��N=g:\��NH�\�\�A0R8�r�H\���e\�@A\�T\'\�$��\�\\�\�\�<؉\�ʖ\r\�Z\�<��Ex������\�q^Ў�\�Xg{k쯞�/m�\��հq��!I� \0#���9��⥗_\���\��\�\�\�n{��\�\�xm槨���\�}��\�}\��\�?�j\�Uy\"\0�\�Ĩ�y�\�хo΢m���2��>.�R�h\�\��.�\�\���!\�KOؘ�a<\��.��\�9��]\�F� \�9�\�m�\�sOaؐq\�\�9�ŝ�`��\r�d\�>���6<�\�;\�\�yn�\�S��\����#)[UE]R��)bw5���c\��`H]&��\�\��i>�\�\��\�Wg�����\n��\'b���\�/#\r��R)oP��ɔ�i\�(C�\"M4 F�v�9�����\�{/�m3f<:A���:<�[��c\��H@㑜��\r\��Ἄ�a��c�\Z\�\"�NhdK�hE\ru:�K�W�i�à��-�\�\�IJP�����7\�\�o���\�\��E�b��W����_��*�蠘��y��?�\�\�\�\�C�ɋ`���!6P\�\�l\�uM+5\�8	F�Ӊy\0o\�)BA�\�\��&L\�^��/\0djk\�\�\Z/�\�m\�\r���ܫ�\�G�\�\�GQ�lX̖Hm���G�\�Ο߅��<��[��\'����z��L\��!J�٣ֈ�\\3�����Z$(ͶwA\�\"H3�\�B��W�͌�;\�33\rw7|�e!�&=���3t|�wP�+��d�s6l��N\�/\�j\�4�\�\�7t>��� tyx��N�-xǋp\Z\�Q�Ɂ\�H\�L\�\�Df\�[B|��z�\�b\�2b�!A<��!s\��\�[e)b4�\�\'a֯\'\�\���>N�=��ɏ��k\����\rH\�\�Ʉ\�SA\��\�oc�Wq\�����_l�flqCO\�i�\����F�R\�\�Ϡ\�\�O�Fa�\�$\�5�\ZA؃u\�\\2\�m��d�v�P}\�x�R�\�2�?��XB\�N\�\�:�\�1�0D\�{�Sho.��o^7�\�ҫ���\�\�`M�WWX\�p\n\\�9\�^JR��\�\��[-�\��1�\�Q\�\�C԰%;����ux\�\�\r\�5.ua�΀\�	H�*qɱ9ȼ\�I� ,\�j$�[c�4\�\�7\�coMGѳ�C�z\�K�CZ��F9b)V3�\ZJ9x\�I\�D=�f\�>����\�G\�R\�\�\�\�Hi��;(��|P�n�zB�u�J\"�HX�\�~t~7�\�x�\�;\�(m���>�J=���STdDIV\�C\�o�AwCuВ�2�L	�ղ�\Z%\�`�Er\�\��\n8g-�`\�\���E���8�\�[1\�wg\�k�\'\�1{\�W��\�<(��\0���\���\�\�G1�\�aH1�\�kP\�\�`�\���\�\�߆h\�G����\�?\��\��Cbkx�\���\�\ZQ\�G\�\�8��\�?��<	��w,\�BiH��ّ�|�\�A��#0���˯\�_xK�iS� �\�v/\�C/\�d���3�+=�N\�xo\�?pOAua�y�i<\�Iش�s�my�\�wb+�[��nz~\�Nl�T���f�����&4\�ߎ\�s�\�տ�wG\�\rY1�\�j\�\��\�wǄo@j\r��\�EC\�E�\�V��\�0<��b2^\�Z�N5B�,\�\�/\�W�_\�2�g�\��Ã\����[�\�\�\�\����*\�W^�q��\'�\"G\� \�(<��&H\���b\��\��\�D)Ab\Z$�t\�n\�z9�и�5υ�\���{}�\�\�\�@\�Q\�\�\rx\�c\�\�BЄW<ac(^��F\�\"]\��\�ю2;�LUt͏JM3�\�\�n\Zc9b�\"F��>\��tx��QW\�T\�.�F�\�ro��;?F&��\n\�\�c�_$d\���(PD!Gc=X?�#U�Cj\\\'�VM�S\�`�W\�1�5}\��\���SZ(�F3b!0rh`kԞ7\�4WM�U�L\�31^L�R\�N\�F\���ǫ\�#-AFw>y�~p��\�H�\�\�wߊ���S�\�\��D���\�\�&!\�\�F��\��+��P ��\�\�vtI\�4H�`\0Y&�H}P3�\�eit�\�۠\�\�֑=������\�k�>�c�UUz�S��O�\�\�\��2�^��LY���$`j��T�y`�Z0�,\�_\�\"L�Hk\���5;6\�˚�\�\"|�Ũy\�1��o6$�7�?(��\�[��!\�\�Q�uV<�[\�\�t�+�2\�\�RHF��\�.�_\��\�q�U���3V��\��׈��\��\� (AX\���\�(��\�\�\�\�aȨ�;�\�i9Y�\�\��\�\��OX\�q�|}�x�F�\������^{\�|�Ae\"O�G�\�@ق�\��\n��\�\�$�8�%aYH\�����\�C~�ӑZ/��\'i���b�,/c�\�k$$���4��\�\�$ E!gl����9<��;j�f\�^e�\�`cby2_�.y|$J\�L�2m�h��\�\Z� �<v\'\�K\0g�����\�1VZ��\0\0\0\0IEND�B`�','image/png','1');
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
