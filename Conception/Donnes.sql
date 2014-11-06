INSERT INTO companies values (1, 'HE-ARC');


INSERT INTO editors VALUES 
	(1, NULL, 'MICROSOFT'),
	(2, NULL, 'ESET'),
	(3, 1, 'ISIC');

INSERT INTO programs VALUES
	(1, 1, NULL, NULL, 'Office'),
	(2, 1, NULL, NULL, 'Visual Studio'),
	(3, 1, 1, NULL, 'Access'),
	(4, 1, 1, NULL, 'Excel'),
	(5, 1, NULL, 1, 'ISIC program1'); 
	
INSERT INTO roles VALUES
	(1, 'S', 'Super Admin'),
	(2, 'A', 'Admin'),
	(3, 'W', 'Ecriture'),
	(4, 'R', 'Lecture seule');
	
INSERT INTO licences VALUES
	(1, 3, 1, 'Access he-arc', 'XXXXX-XXXXX-XXXXX-XXXXX-XXXXX', 0, now(), 0, now()),
	(2, 4, 1, 'Excel he-arc', 'XXXXX-XXXXX-XXXXX-XXXXX-XXXXX', 0, now(), 0, now());

INSERT INTO File VALUES
	(1, 1, 'Access file 1', 0x0),
	(2, 1, 'Access file 2', 0x0),
	(3, 2, 'Excel file 1', 0x0);