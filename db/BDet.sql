

SELECT * FROM mydb.user;
SELECT * FROM mydb.admin;
SELECT * FROM mydb.city_o;
SELECT * FROM mydb.city_d;
SELECT * FROM mydb.route;

-- ALTER TABLE `mydb`.`city_d` AUTO_INCREMENT = 1;


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
(null,
"stepR",
"stephanie",
"Rodriguez",
"Rodriguez",
"str@gmail.com",
"2000-04-08",
"123",
null,
"Tacares, Alajuela, Costa Rica",
"8967-8567",
"7458-9867",
null,
now()),


(<{id: }>,
<{username: }>,
<{name: }>,
<{last_name1: }>,
<{last_name2: }>,
<{email: }>,
<{birth_date: }>,
<{password: }>,
<{user_profile_picture: }>,
<{address: }>,
<{work_phone: }>,
<{personal_phone: }>,
<{lastUser: }>,
<{lastModification: }>),


(<{id: }>,
<{username: }>,
<{name: }>,
<{last_name1: }>,
<{last_name2: }>,
<{email: }>,
<{birth_date: }>,
<{password: }>,
<{user_profile_picture: }>,
<{address: }>,
<{work_phone: }>,
<{personal_phone: }>,
<{lastUser: }>,
<{lastModification: }>),


(<{id: }>,
<{username: }>,
<{name: }>,
<{last_name1: }>,
<{last_name2: }>,
<{email: }>,
<{birth_date: }>,
<{password: }>,
<{user_profile_picture: }>,
<{address: }>,
<{work_phone: }>,
<{personal_phone: }>,
<{lastUser: }>,
<{lastModification: }>),


(<{id: }>,
<{username: }>,
<{name: }>,
<{last_name1: }>,
<{last_name2: }>,
<{email: }>,
<{birth_date: }>,
<{password: }>,
<{user_profile_picture: }>,
<{address: }>,
<{work_phone: }>,
<{personal_phone: }>,
<{lastUser: }>,
<{lastModification: }>);








-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- --
-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- --
-- ADMIN


UPDATE `mydb`.`admin`
SET
`id` = 1,
`login` = "adm.abarranp",
`email` = "adm.abarranp@easytravel.com",
`lastModification` = now()
WHERE `id` = 1;















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
(null,
"Adm.abarranp",
"Alberto",
"Barrantes",
"Paniagua",
123,
"adm.abarranp",
"+506 7896-5478",
"7458-6895",
null,
null,
now());









-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- --
-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- --
-- CITY



INSERT INTO `mydb`.`city_o`
(`city_id`,
`city_name`,
`lastModification`)
VALUES
(null,"Canada (Alberta)",now()),
(null,"Canada (Ontario)",now()),
(null,"Estados Unidos (Miami)",now()),
(null,"Estados Unidos (Texas)",now()),
(null,"México (Ciudad de México)",now()),
(null,"México (Cancún)",now()),
(null,"Belice (Belmopán)",now()),
(null,"Guatemala (Ciudad de Guatemala)",now()),
(null,"Honduras (Tegucigalpa)",now()),
(null,"El Salvador (San Salvador)",now()),
(null,"Nicaragua (Managua)",now()),
(null,"Costa Rica (Alajuela)",now()),
(null,"Costa Rica (San José)",now()),
(null,"Panamá (Bocas del Toro)",now());



INSERT INTO `mydb`.`city_d`
(`city_id`,
`city_name`,
`lastModification`)
VALUES
(null,"Canada (Alberta)",now()),
(null,"Canada (Ontario)",now()),
(null,"Estados Unidos (Miami)",now()),
(null,"Estados Unidos (Texas)",now()),
(null,"México (Ciudad de México)",now()),
(null,"México (Cancún)",now()),
(null,"Belice (Belmopán)",now()),
(null,"Guatemala (Ciudad de Guatemala)",now()),
(null,"Honduras (Tegucigalpa)",now()),
(null,"El Salvador (San Salvador)",now()),
(null,"Nicaragua (Managua)",now()),
(null,"Costa Rica (Alajuela)",now()),
(null,"Costa Rica (San José)",now()),
(null,"Panamá (Bocas del Toro)",now());



-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- --
-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- --
-- ROUTE



INSERT INTO `mydb`.`route`
(`route_id`,
`city_o_id`,
`city_d_id`,
`route_name`,
`route_time`,
`airplane_id`,
`discount_id`,
`lastModification`)
VALUES
-- (null,<{city_o_id: }>,<{city_d_id: }>,<{route_name: }>,"06:00:00",null,null,now())

-- ida y vuelta
(null,1,12,"Canada(Alberta) -> Costa Rica(Alajuela)","06:00:00",null,null,now()),
(null,12,1,"Costa Rica(Alajuela) -> Canada(Alberta)","06:00:00",null,null,now()),
(null,3,11,"Estados Unidos (Miami) -> Nicaragua (Managua)","06:00:00",null,null,now()),
(null,11,3,"Nicaragua (Managua) -> Estados Unidos (Miami)","06:00:00",null,null,now()),

-- solo ida
(null,5,4,"México (Ciudad de México) -> Estados Unidos (Texas)","06:00:00",null,null,now());



-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- --
-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- --
-- PRUEBAS


-- Obtiene todas las países de origen con ruta asignada
SELECT CO.city_name
FROM mydb.route R
JOIN mydb.city_o CO ON CO.city_id = R.city_o_id
JOIN mydb.city_d CD ON CD.city_id = R.city_d_id;


-- Origen: Costa Rica

SELECT  mydb.country_o.country_name
FROM mydb.route
JOIN mydb.city_o ON mydb.city_o.city_id = mydb.route.city_o_id
JOIN mydb.country_o ON mydb.country_o.country_id = mydb.city_o.city_id;


SELECT  mydb.route.route_name
FROM mydb.route
JOIN mydb.city_o ON mydb.city_o.city_id = mydb.route.city_o_id
JOIN mydb.country_o ON mydb.country_o.country_id = mydb.city_o.city_id;



