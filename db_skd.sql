DROP TABLE tb_dataorder;

CREATE TABLE `tb_dataorder` (
  `order_id` int(20) NOT NULL AUTO_INCREMENT,
  `order_name` varchar(50) NOT NULL,
  `order_price` int(20) NOT NULL,
  `order_quantity` int(20) NOT NULL,
  `order_satuan` varchar(15) NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;


DROP TABLE tb_product;

CREATE TABLE `tb_product` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(11) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `satuan` varchar(11) NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;


DROP TABLE tb_user;

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `password` varchar(180) NOT NULL,
  `role` enum('Admin','Gudang','Karyawan') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;

INSERT INTO tb_user VALUES("5","admin","admin","21232f297a57a5a743894a0e4a801fc3","Admin");
INSERT INTO tb_user VALUES("6","user","user","ee11cbb19052e40b07aac0ca060c23ee","Karyawan");

