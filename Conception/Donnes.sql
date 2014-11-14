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
	(1, 3, 1, 'Access he-arc', 'XXXXX-XXXXX-XXXXX-XXXXX-XXXXX', 0, now(), 0, now()),
	(2, 4, 1, 'Excel he-arc', 'XXXXX-XXXXX-XXXXX-XXXXX-XXXXX', 0, now(), 0, now());

INSERT INTO file VALUES
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