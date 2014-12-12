USE LicMgr;

INSERT INTO companies values (1, 'HE-ARC');


INSERT INTO editors VALUES 
	(1, NULL, 'MICROSOFT'),
	(2, NULL, 'ESET'),
	(3, 1, 'ISIC');

INSERT INTO programs VALUES
	(1, 1, NULL, NULL, 'Office'),
	(2, 1, NULL, NULL, 'Visual Studio'),
	(3, NULL, 1, NULL, 'Access'),
	(4, NULL, 1, NULL, 'Excel'),
	(5, 1, NULL, 1, 'ISIC program1'); 
	
INSERT INTO roles VALUES
	(1, 'S', 'Super Admin'),
	(2, 'A', 'Admin'),
	(3, 'W', 'Ecriture'),
	(4, 'R', 'Lecture seule');
	
INSERT INTO licences VALUES
	(1, 3, 1, 'Access he-arc', 'XXXXX-XXXXX-XXXXX-XXXXX-XXXXX', now(), 0, now(), 0),
	(2, 4, 1, 'Excel he-arc', 'XXXXX-XXXXX-XXXXX-XXXXX-XXXXX', now(), 0, now(), 0);

INSERT INTO files VALUES
	(1, 1, 'Access file 1', 0x0),
	(2, 1, 'Access file 2', 0x0),
	(3, 2, 'Excel file 1', 0x0);


UPDATE editors SET name = "Microsoft" WHERE id = 1;
UPDATE programs SET editor_id = 3, name = "ISIC program 1" WHERE id = 5;
INSERT INTO programs VALUES
	(6, 1, NULL, 1, 'Exchange'),
	(7, 2, NULL, 1, 'Node32');

INSERT INTO licences VALUES
	(3, 3, 1, 'Access he-arc 2', 'AAAAA-XXXXX-XXXXX-XXXXX-XXXXX', 0, now(), 0, now()),
	(4, 4, 1, 'Excel he-arc 2', 'BBBBB-XXXXX-XXXXX-XXXXX', 0, now(), 0, now());

CREATE USER 'licmgr'@'localhost' IDENTIFIED BY 'licmgr';
GRANT ALL PRIVILEGES ON LicMgr.* TO 'licmgr'@'localhost' WITH GRANT OPTION;

INSERT INTO `users` VALUES
    (1,1,'Super Admin','superadmin','$2y$10$HDX6ZIcR/MLmO92L0xfevutqcyBtdfOrvinVflOYuAWtidiWn1HpG','superadmin@he-arc.ch','0','2014-11-18 11:49:07','2014-12-06 15:21:27'),
    (2,1,'Admin HE-ARC','hearc','$2y$10$qAZy1PNTGvWDsUDO8XhxVuM63YBXe.yJl7Iw\/KuBx5FO0N7QJTeTi','admin@he-arc.ch','0','2014-11-18 11:49:07','2014-12-06 15:21:27'),
    (3,1,'Writer HE-ARC','writer','$2y$10$Nd8iAYKLX2PlUhG6kcLrseqAYM\/vw\/4hDeH\/8ING3hts3C.znVi\/m','writer@he-arc.ch','0','2014-11-18 11:49:07','2014-12-06 15:21:27'),
    (4,1,'Reader HE-ARC','reader','$2y$10$Yq2zAf\/SYUH2dH58wEq.Ke\/hYRW1sgziXXHjdkApfKWZZmyv74ZM.','reader@he-arc.ch','0','2014-11-18 11:49:07','2014-12-06 15:21:27');

INSERT INTO role_user VALUES
    (1, 1),
    (1, 2),
    (1, 3),
    (1, 4),
    (2, 2),
    (2, 3),
    (2, 4),
    (3, 3),
    (3, 4),
    (4, 4);