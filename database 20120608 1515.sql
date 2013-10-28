-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.1.36-community-log


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema dbtoko
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ dbtoko;
USE dbtoko;

--
-- Table structure for table `dbtoko`.`customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE `customer` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `nama` varchar(200) NOT NULL DEFAULT '',
  `alamat` varchar(200) NOT NULL,
  `telp` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=latin1 COMMENT='Master data Customer';

--
-- Dumping data for table `dbtoko`.`customer`
--

/*!40000 ALTER TABLE `customer` DISABLE KEYS */;
INSERT INTO `customer` (`id`,`nama`,`alamat`,`telp`,`email`) VALUES 
 (1,'Hendro Steven T','Jakarta','13234424','hendro@yahoo.com'),
 (2,'Joko','Jakarta','13234424','joko@gmail.com'),
 (4,'Mr. X','Bandung','234524525','bb@yahoo.com'),
 (5,'Mr.Y','Semarang','456345636','xx@gmail.com'),
 (8,'sdf','gfdgdg','34534','hendro@yahoo.com'),
 (9,'dfgsdfgs','asdfadfa','3534535','hendro_steven@yahoo.com'),
 (10,'sdfhtryut','xcvegfdfrtr','534534535','hendro@yahoo.com'),
 (11,'ertwrtw','fafsdfadfasf','45352','hendro@yahoo.com'),
 (12,'hgfhfhasdfasf','asdfasdf','3454535','hendro@yahoo.com'),
 (16,'dKVRGMv7EKay5LUl3Z0emt/wMC7oIa3kLTJbs70IzGX68+sVIUpRJtYis3lD/t3uakeRyuvoECKIXfNHOr1H7Q==','adsfasdfaf','23424','bambang@ggg.com'),
 (17,'qkbA8Fotjd2VE9xIT3bMdF5egMsvUfqQOI5D+sk9KhPZrWzVxqyOcA5sJSiAfxi2i64rhx0heJaoXReW6N5PrA==','Jakarga','234234','dani@yahoo.com');
/*!40000 ALTER TABLE `customer` ENABLE KEYS */;


--
-- Table structure for table `dbtoko`.`product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE `product` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `kode` varchar(5) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `price` double NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=latin1 COMMENT='Master data product';

--
-- Dumping data for table `dbtoko`.`product`
--

/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` (`id`,`kode`,`nama`,`price`,`image`) VALUES 
 (1,'001','Monitor',200000,''),
 (2,'002','Speker',100000,''),
 (3,'003','Mouse',80000,''),
 (4,'004','Printer Epson',2500000,''),
 (5,'asdf','adsf',200,''),
 (6,'001','Monitor',200000,''),
 (7,'005','testing',40,''),
 (8,'001','Monitor',200000,''),
 (9,'43','sdf',5,''),
 (10,'43','sdf',5,''),
 (17,'sfdgs','sadf',0,''),
 (18,'123','xxxx',123,'x'),
 (25,'777','testing',2,'Array');
/*!40000 ALTER TABLE `product` ENABLE KEYS */;


--
-- Table structure for table `dbtoko`.`transaksi`
--

DROP TABLE IF EXISTS `transaksi`;
CREATE TABLE `transaksi` (
  `id` varchar(20) NOT NULL,
  `tanggal` date NOT NULL,
  `customer_id` int(6) NOT NULL,
  `no_faktur` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dbtoko`.`transaksi`
--

/*!40000 ALTER TABLE `transaksi` DISABLE KEYS */;
INSERT INTO `transaksi` (`id`,`tanggal`,`customer_id`,`no_faktur`) VALUES 
 ('1','2012-06-05',1,'FT002'),
 ('1339053009','2012-06-07',1,'123'),
 ('1339053150','2012-06-04',2,'45SF'),
 ('1339053245','2012-06-12',4,'T123');
/*!40000 ALTER TABLE `transaksi` ENABLE KEYS */;


--
-- Table structure for table `dbtoko`.`transaksi_detail`
--

DROP TABLE IF EXISTS `transaksi_detail`;
CREATE TABLE `transaksi_detail` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `transaksi_id` varchar(20) NOT NULL,
  `product_id` int(6) NOT NULL,
  `qty` int(4) NOT NULL,
  `price` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dbtoko`.`transaksi_detail`
--

/*!40000 ALTER TABLE `transaksi_detail` DISABLE KEYS */;
INSERT INTO `transaksi_detail` (`id`,`transaksi_id`,`product_id`,`qty`,`price`) VALUES 
 (1,'1',2,4,100),
 (2,'1',3,10,300),
 (3,'1',5,20,100),
 (4,'1339053009',1,1,200000),
 (5,'1339053009',1,1,200000),
 (6,'1339053009',1,1,200000),
 (7,'1339053150',6,23,200000),
 (8,'1339053150',3,20,80000),
 (9,'1339053245',2,1,100000);
/*!40000 ALTER TABLE `transaksi_detail` ENABLE KEYS */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
