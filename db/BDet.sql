

SELECT * FROM mydb.user;
SELECT * FROM mydb.admin;
SELECT * FROM mydb.airplane;
SELECT * FROM mydb.city_o;
SELECT * FROM mydb.city_d;
SELECT * FROM mydb.discount;
SELECT * FROM mydb.route;






-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- --
-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- --
-- USER







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
(null,"abarranp","Alberto","Barrantes","Paniagua",123,"abarranp","+506 7896-5478","7458-6895",null,null,now());





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
(null,"1995","747","Boeing",522,58,9,null,now());





-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- --
-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- --
-- CITY O

INSERT INTO `mydb`.`city_o`
(`city_id`,
`city_name`,
`lastModification`)
VALUES
(null,"Canada",NOW()),
(null,"Estados Unidos",NOW()),
(null,"México",NOW());





-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- --
-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- --
-- CITY D

INSERT INTO `mydb`.`city_d`
(`city_id`,
`city_name`,
`lastModification`)
VALUES
(null,"Nicaragua",NOW()),
(null,"Costa Rica",NOW()),
(null,"Panamá",NOW());





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
(null,15.00,"15% de descuento",1,NOW());





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
`lastModification`)
VALUES
(null,1,1,"CAN -> NIC","2021-12-20 06:00:00",1,2,NOW()),
(null,2,2,"USA -> CR","2021-12-21 06:00:00",1,1,NOW()),
(null,3,3,"MX -> PAN","2021-12-22",1,3,NOW());





