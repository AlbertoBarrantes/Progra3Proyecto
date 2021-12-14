

SELECT * FROM mydb.user;
SELECT * FROM mydb.admin;



SELECT * FROM mydb.country_o;
SELECT * FROM mydb.city_o;

SELECT * FROM mydb.country_d;
SELECT * FROM mydb.city_d;

SELECT * FROM mydb.discount;
SELECT * FROM mydb.airplane;
SELECT * FROM mydb.route;





-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- --
-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- --
-- USER

INSERT INTO `mydb`.`user`
(`id`,
`username`,
`name`,
`last_name1`,
`last_name2`,
`email`,
`birth_date`,
`password`,
`user_profile_picture`,
`address`,
`work_phone`,
`personal_phone`,
`lastUser`,
`lastModification`)
VALUES
(null,"abp","Alberto","Barrantes","Paniagua","alberto@gmail.com","1991-01-01","123",null,"Alajuela",null," +506 5632-9867","mysql",NOW()),
(null,"rodo","Rodolfo","Acuña","Perez","rodo@gmail.com","1985-05-05","123",null,"Heredia",null,"+506 4587-5249","mysql",NOW()),
(null,"tiff","Tiffany","Bogantes","Rodriguez","tiff99@hotmail.com","2005-12-01","123",null,"San Pedro, San José",null,"+506 8695-5689","mysql",NOW()),
(null,"nicol77","Nicol","Cubero","Gonzales","nc77@outlook.com","2004-10-25","123",null,"San Ramón, Alajuela",null,"+506 8748-5785","mysql",NOW()),
(null,"jesusRR","Jesus","Rodriguez","Rodriguez","JRR44@yahoo.es","1990-01-08","123",null,"Ciudad de Panamá",null,"+507 5263-6897","mysql",NOW())
;





-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- --
-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- --
-- ADMIN

INSERT INTO `mydb`.`admin`
(`id`,
`login`,
`name`,
`last_name1`,
`last_name2`,
`password`,
`email`,
`work_phone`,
`personal_phone`,
`admin_profile_picture`,
`lastUser`,
`lastModification`)
VALUES
(null,"abarranp","Alberto","Barrantes","Paniagua",123,"abarranp@easytravel.com","+506 7896-5478","7458-6895",null,null,now()),
(null,"admin","admin","","","admin","admin@@easytravel.com","","",null,null,now())
;





-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- --
-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- --
-- AIRPLANE

INSERT INTO `mydb`.`airplane`
(`airplane_id`,
`yearx`,
`model`,
`brand`,
`passengers`,
`rowsx`,
`sits_row`,
`lastUser`,
`lastModification`)
VALUES
(null,"2015","747","Boeing",360,40,9,null,now()),
(null,"2001","777","Boeing",405,45,9,null,now()),
(null,"2005","A340","Airbus",210,35,6,null,now()),
(null,"2010","767","Boeing",351,39,9,null,now()),
(null,"2016","A330","Airbus",390,65,6,null,now()),
(null,"2015","757","Boeing",384,64,6,null,now())
;





-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- --
-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- --
-- COUNTRY O

INSERT INTO `mydb`.`country_o`
(`id`,
`name`,
`lastUser`,
`lastModification`)
VALUES
(null,"Canada",null,NOW()),
(null,"Estados Unidos",null,NOW()),
(null,"México",null,NOW()),
(null,"Belice",null,NOW()),
(null,"Guatemala",null,NOW());





-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- --
-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- --
-- CITY O

INSERT INTO `mydb`.`city_o`
(`id`,
`country_o_id`,
`name`,
`lastUser`,
`lastModification`)
VALUES
(null,1,"Alberta",         null,NOW()),
(null,1,"Ontario",         null,NOW()),
(null,2,"Las Vegas",       null,NOW()),
(null,2,"Miami",           null,NOW()),
(null,3,"Ciudad de México",null,NOW()),
(null,3,"Cancún",          null,NOW()),
(null,5,"Cobán",          null,NOW())
;






-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- --
-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- --
-- COUNTRY D


INSERT INTO `mydb`.`country_d`
(`id`,
`name`,
`lastUser`,
`lastModification`)
VALUES
(null,"Nicaragua",null,NOW()),
(null,"Costa Rica",null,NOW()),
(null,"Panamá",null,NOW()),
(null,"Colombia",null,NOW())
;





-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- --
-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- --
-- CITY D

INSERT INTO `mydb`.`city_d`
(`id`,
`country_d_id`,
`name`,
`lastUser`,
`lastModification`)
VALUES
(null,1,"Managua",null,NOW()),
(null,1,"Granada",null,NOW()),
(null,2,"San José",null,NOW()),
(null,2,"Alajuela",null,NOW()),
(null,3,"Ciudad de Panamá",null,NOW()),
(null,3,"David",null,NOW()),
(null,4,"Bogotá",null,NOW()),
(null,4,"Medellin",null,NOW()),
(null,4,"Cali",null,NOW())
;






-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- --
-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- --
-- DISCOUNT

INSERT INTO `mydb`.`discount`
(`discount_id`,
`amount`,
`description`,
`active`,
`lastModification`)
VALUES
(null,0.00,"",1,NOW()),
(null,5.00,"5% de descuento",1,NOW()),
(null,10.00,"10% de descuento",1,NOW()),
(null,15.00,"15% de descuento",1,NOW()),
(null,20.00,"20% de descuento",1,NOW()),
(null,25.00,"25% de descuento",1,NOW()),
(null,30.00,"30% de descuento",1,NOW())
;





-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- --
-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- --
-- ROUTES

INSERT INTO `mydb`.`route`
(`id`,
`city_o_id`,
`city_d_id`,
`route_name`,
`route_time`,
`airplane_id`,
`discount_id`,
`lastUser`,
`lastModification`)
VALUES
(null,4,7,"Miami -> Bogotá","2021-12-27 18:00:00",4,3,null,NOW()),
(null,4,3,"Miami -> SJ","2021-12-25 12:00:00",3,2,null,NOW()),
(null,7,5,"Cobán -> Ciudad de Panamá","2021-12-23 12:00:00",1,2,null,NOW()),
(null,1,1,"Alberta -> Managua","2021-12-20 06:00:00",1,2,null,NOW()),
(null,2,2,"Ontario -> Granada","2021-12-21 06:00:00",1,1,null,NOW()),
(null,3,3,"Las Vegas -> San José","2021-12-22",1,3,null,NOW()),
(null,4,4,"Miami -> Alajuela","2021-12-20 12:00:00",1,2,null,NOW()),
(null,5,5,"Ciudad de México -> Ciudad de Panamá","2021-12-21 18:00:00",1,1,null,NOW())
;




SELECT DISTINCT CO.id, CO.name
FROM mydb.route R
JOIN mydb.city_o CO ON CO.id = R.city_o_id
JOIN mydb.city_d CD ON CD.id = R.city_d_id;




SELECT DISTINCT mydb.country_o.id, mydb.country_o.name 
FROM mydb.route
JOIN mydb.city_o ON mydb.city_o.id = mydb.route.city_o_id
JOIN mydb.country_o ON mydb.country_o.id = mydb.city_o.id;



SELECT DISTINCT mydb.country_d.id, mydb.country_d.name 
FROM mydb.route
JOIN mydb.city_d ON mydb.city_d.id = mydb.route.city_d_id
JOIN mydb.country_d ON mydb.country_d.id = mydb.city_d.id;



SELECT *
FROM mydb.route
JOIN mydb.city_o ON mydb.city_o.id = mydb.route.city_o_id
JOIN mydb.country_o ON mydb.country_o.id = mydb.city_o.country_o_id
JOIN mydb.city_d ON mydb.city_d.id = mydb.route.city_d_id
JOIN mydb.country_d ON mydb.country_d.id = mydb.city_d.country_d_id;


SELECT *
FROM mydb.route
JOIN mydb.city_o ON mydb.city_o.id = mydb.route.city_o_id
JOIN mydb.country_o ON mydb.country_o.id = mydb.city_o.country_o_id
JOIN mydb.city_d ON mydb.city_d.id = mydb.route.city_d_id
JOIN mydb.country_d ON mydb.country_d.id = mydb.city_d.country_d_id;




SELECT DISTINCT mydb.country_o.id, mydb.country_o.name
FROM mydb.route
JOIN mydb.city_o     ON  mydb.city_o.id     =  mydb.route.city_o_id
JOIN mydb.country_o  ON  mydb.country_o.id  =  mydb.city_o.country_o_id;




SELECT DISTINCT mydb.city_o.id, mydb.city_o.name
FROM mydb.route
JOIN mydb.city_o     ON  mydb.city_o.id     =  mydb.route.city_o_id
JOIN mydb.country_o  ON  mydb.country_o.id  =  mydb.city_o.country_o_id
WHERE mydb.country_o.id = 15;




SELECT DISTINCT mydb.country_d.id, mydb.country_d.name
FROM mydb.route
JOIN mydb.city_o     ON  mydb.city_o.id     =  mydb.route.city_o_id
JOIN mydb.country_o  ON  mydb.country_o.id  =  mydb.city_o.country_o_id
JOIN mydb.city_d     ON  mydb.city_d.id     =  mydb.route.city_d_id
JOIN mydb.country_d  ON  mydb.country_d.id  =  mydb.city_d.country_d_id
WHERE mydb.city_o.id = 4;




SELECT R.id AS "ID RUTA", R.route_name AS "NOMBRE RUTA", 
	   CoO.id AS "ID PAÍS ORIGEN", CoO.name AS "PAÍS ORIGEN", CiO.id AS "ID CIUDAD ORIGEN", CiO.name AS "CIUDAD ORIGEN", 
       CoD.id AS "ID PAÍS DESTINO", CoD.name AS "PAÍS DESTINO", CiD.id AS "ID CIUDAD DESTINO", CiD.name AS "CIUDAD DE DESTINO"
FROM mydb.route R
JOIN mydb.city_o CiO    ON CiO.id = R.city_o_id
JOIN mydb.country_o CoO ON CoO.id = CiO.country_o_id
JOIN mydb.city_d CiD    ON CiD.id = R.city_d_id
JOIN mydb.country_d CoD ON CoD.id = CiD.country_d_id
;


-- id = 1
SELECT DISTINCT R.id, CiD.name
FROM mydb.route R
JOIN mydb.city_o CiO    ON CiO.id = R.city_o_id
JOIN mydb.country_o CoO ON CoO.id = CiO.country_o_id
JOIN mydb.city_d CiD    ON CiD.id = R.city_d_id
JOIN mydb.country_d CoD ON CoD.id = CiD.country_d_id
WHERE CoD.id = 2
;



