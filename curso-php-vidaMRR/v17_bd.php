<?php

/**
 * en este curso usaremos bases de datos RELACIONALES
 */

// esta es la tabla que creamos
//  CREATE TABLE `eventos`.`invitados` (`id` INT(7) NOT NULL AUTO_INCREMENT ,
//  `nombre` VARCHAR(30) NOT NULL , `apellido` VARCHAR(50) NOT NULL ,
//   `fecha` DATE NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;

// video 22. update tabla
// WHERE en un UPDATE es obligatorio

// UPDATE invitados SET nombre = 'Fernando', apellido = 'Alvarez' WHERE fecha = date('2021-01-21');


// ****** DELETE, DROP, TRUNCATE
/**
 *  DELETE
 * 
 * - DELETE FROM 'nombre_tabla'; // borra todos los campos
 * - DROP TABLE 'nombre_tabla'; // elimna toda la tabla en si, todos los datos, todas las asociaciones, triggers, etc.
 * - TRUNCATE TALBE 'nombre_tabla'; // elimina SOLO los datos de la tabla, no asociaciones, no triggers
 * 
 * ejemplos:
 * 
 * - DELETE FROM invitados WHERE `invitados`.`id` = 5
 * 
 */

 // ****** primary keys
/**
 * - son la forma de identificar una columna como EXCLUSIVA en sus valores
 * - no puede tener valores duplicados cuando se insertan datos
 * - solo puede existir un primary key por tabla
 * 
 * INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `password`) VALUES ('3', 'Marcos', 'Rivas', 'password');
 * - notese que NO es AI (auto incrementable)
 * - primary key nos permite tener columnas con valores exclusivos
 * - nos sirve para reconocer una fila o una cantidad de informacion relacionada solamente por una columna
 * - muy util en busquedas, para obtener id de usuarios por ejemplo
 * - la esclusividad solo aplica en esa tabla
 * 
 */

 // ******* foreing keys
/**
 * - insertan llaves foraneas
 * - informacion de otras tablas dentro de la tabla que estamos creando
 * - nos permite relacionar una columna de una tabla foranea dentro de una tabla donde estemos integrando informacion
 * 
 * - SELECT * FROM `eventos`.`usuarios` WHERE `id` = 6
 * 
 */
// CREATE TABLE registros(
// 	id INT NOT NULL PRIMARY KEY,
//     usuario_id INT NOT NULL,
//     evento_id INT NOT NULL,
    
//     FOREIGN KEY fk_usuario_id(usuario_id) REFERENCES usuarios(id),
//     FOREIGN KEY fk_evento_id(evento_id)
//     REFERENCES evento(id)
// );

// ******* INNER JOIN
/**
 * 
 */
// # SELECT * FROM registros INNER JOIN usuarios ON registros.usuario_id = usuarios.id;
// SELECT * FROM registros 
// INNER JOIN usuarios ON registros.usuario_id = usuarios.id
// INNER JOIN evento ON evento.id = registros.evento_id;

// SELECT registros.id, usuarios.nombre, evento.nombre FROM registros 
// INNER JOIN usuarios ON registros.usuario_id = usuarios.id
// INNER JOIN evento ON evento.id = registros.evento_id;

// ******** conexion a la bd
// pass: 6q0Y6GF8@

?>