CREATE TABLE tb_mahasiswa (
  mhs_id bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  mhs_nim char(8) DEFAULT NULL,
  mhs_nama varchar(255) DEFAULT NULL,
  mhs_angkatan int UNSIGNED DEFAULT NULL,
  PRIMARY KEY (mhs_id)
);

CREATE TABLE IF NOT EXISTS tb_matakuliah (
  mk_id bigint unsigned NOT NULL AUTO_INCREMENT,
  mk_kode char(5) DEFAULT NULL,
  mk_sks smallint unsigned DEFAULT '0',
  mk_nama varchar(255) DEFAULT NULL,
  PRIMARY KEY (mk_id)
);

CREATE TABLE IF NOT EXISTS tb_mahasiswa_nilai (
  mhs_nilai_id bigint unsigned NOT NULL AUTO_INCREMENT,
  mhs_id bigint unsigned DEFAULT NULL,
  mk_id bigint unsigned DEFAULT NULL,
  nilai double(8,2) DEFAULT '0.00',
  PRIMARY KEY (mhs_nilai_id),
  KEY mahasiswa_nilai_foreign_mahasiswa (mhs_id),
  KEY mahasiswa_nilai_foreign_matakuliah (mk_id),
  CONSTRAINT mahasiswa_nilai_foreign_mahasiswa FOREIGN KEY (mhs_id) REFERENCES tb_mahasiswa (mhs_id) ON DELETE SET NULL,
  CONSTRAINT mahasiswa_nilai_foreign_matakuliah FOREIGN KEY (mk_id) REFERENCES tb_matakuliah (mk_id) ON DELETE SET NULL
);


-- Dumping data for table test_ecampuz.tb_mahasiswa: ~0 rows (approximately)
INSERT INTO tb_mahasiswa (mhs_id, mhs_nim, mhs_nama, mhs_angkatan) VALUES
	(1, '20180001', 'Jono', 2018),
	(2, '20180002', 'Taufik', 2018),
	(3, '20180003', 'Maria', 2018),
	(4, '20190001', 'Sari', 2019),
	(5, '20190002', 'Bambang', 2019);

INSERT INTO tb_matakuliah (mk_id, mk_kode, mk_sks, mk_nama) VALUES
	(1, 'MK202', 3, 'OOP'),
	(2, 'MK303', 2, 'Basis Data');

INSERT INTO tb_mahasiswa_nilai (mhs_nilai_id, mhs_id, mk_id, nilai) VALUES
	(1, 1, 1, 70.00),
	(2, 1, 1, 80.00),
	(3, 2, 1, 82.00),
	(4, 2, 2, 74.00),
	(5, 4, 1, 76.00),
	(6, 4, 2, 80.00),
	(7, 5, 1, 60.00);
