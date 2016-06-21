DROP TABLE IF EXISTS medical_histories.departamentos;
DROP TABLE IF EXISTS medical_histories.egreso;
DROP TABLE IF EXISTS medical_histories.historias;
DROP TABLE IF EXISTS medical_histories.ingreso;
DROP TABLE IF EXISTS medical_histories.laboratorio;
DROP TABLE IF EXISTS medical_histories.permisos;
DROP TABLE IF EXISTS medical_histories.personas;
DROP TABLE IF EXISTS medical_histories.respuestas;
DROP TABLE IF EXISTS medical_histories.sexo;
DROP TABLE IF EXISTS medical_histories.tipo_cedula;
DROP TABLE IF EXISTS medical_histories.usuarios;
CREATE TABLE medical_histories.departamentos (id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY, departamento varchar(50) NOT NULL);
CREATE TABLE medical_histories.egreso (id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY, id_persona int UNSIGNED  NOT NULL , id_departamento int UNSIGNED  NOT NULL , descripcion text NOT NULL , creacion date NOT NULL);
CREATE TABLE medical_histories.historias (id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY, id_persona int NOT NULL);
CREATE TABLE medical_histories.ingreso (id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY, id_persona int UNSIGNED  NOT NULL , id_departamento int UNSIGNED  NOT NULL , descripcion text NOT NULL , es_emergencia int UNSIGNED  NOT NULL , es_externa int UNSIGNED  NOT NULL , creacion date NOT NULL);
CREATE TABLE medical_histories.laboratorio (id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY, id_persona int UNSIGNED  NOT NULL , id_departamento int UNSIGNED  NOT NULL , descripcion text NOT NULL , orina text NOT NULL , hematologia text NOT NULL , heces text NOT NULL , creacion date NOT NULL);
CREATE TABLE medical_histories.permisos (id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY, permiso varchar(7) NOT NULL);
CREATE TABLE medical_histories.personas (id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY, nombres varchar(50) NOT NULL , apellidos varchar(50) NOT NULL , cedula int NOT NULL , nacimiento date NOT NULL , direccion varchar(128) NOT NULL , profesion varchar(20) NOT NULL , Lugar_nacimiento varchar(30) NOT NULL , registro date NOT NULL , id_sexo int UNSIGNED  NOT NULL , id_tipo_cedula int UNSIGNED  NOT NULL , id_permiso int UNSIGNED  NOT NULL);
CREATE TABLE medical_histories.respuestas (id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY, respuesta varchar(2) NOT NULL);
CREATE TABLE medical_histories.sexo (id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY, genero varchar(9) NOT NULL);
CREATE TABLE medical_histories.tipo_cedula (id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY, cedula varchar(1) NOT NULL);
CREATE TABLE medical_histories.usuarios (id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY, usuario varchar(50) NOT NULL , contraseña varchar(50) NOT NULL , correo varchar(50) NOT NULL , creacion date NOT NULL , id_persona int UNSIGNED  NOT NULL);
ALTER TABLE medical_histories.egreso ADD INDEX(id_persona);
ALTER TABLE medical_histories.egreso ADD CONSTRAINT fk_egreso_id_persona FOREIGN KEY (id_persona) REFERENCES medical_histories.personas (id); 
ALTER TABLE medical_histories.egreso ADD INDEX(id_departamento);
ALTER TABLE medical_histories.egreso ADD CONSTRAINT fk_egreso_id_departamento FOREIGN KEY (id_departamento) REFERENCES medical_histories.departamentos (id); 
ALTER TABLE medical_histories.ingreso ADD INDEX(id_persona);
ALTER TABLE medical_histories.ingreso ADD CONSTRAINT fk_ingreso_id_persona FOREIGN KEY (id_persona) REFERENCES medical_histories.personas (id); 
ALTER TABLE medical_histories.ingreso ADD INDEX(id_departamento);
ALTER TABLE medical_histories.ingreso ADD CONSTRAINT fk_ingreso_id_departamento FOREIGN KEY (id_departamento) REFERENCES medical_histories.departamentos (id); 
ALTER TABLE medical_histories.ingreso ADD INDEX(es_emergencia);
ALTER TABLE medical_histories.ingreso ADD CONSTRAINT fk_ingreso_es_emergencia FOREIGN KEY (es_emergencia) REFERENCES medical_histories.respuestas (id); 
ALTER TABLE medical_histories.ingreso ADD INDEX(es_externa);
ALTER TABLE medical_histories.ingreso ADD CONSTRAINT fk_ingreso_es_externa FOREIGN KEY (es_externa) REFERENCES medical_histories.respuestas (id); 
ALTER TABLE medical_histories.laboratorio ADD INDEX(id_persona);
ALTER TABLE medical_histories.laboratorio ADD CONSTRAINT fk_laboratorio_id_persona FOREIGN KEY (id_persona) REFERENCES medical_histories.personas (id); 
ALTER TABLE medical_histories.laboratorio ADD INDEX(id_departamento);
ALTER TABLE medical_histories.laboratorio ADD CONSTRAINT fk_laboratorio_id_departamento FOREIGN KEY (id_departamento) REFERENCES medical_histories.departamentos (id); 
ALTER TABLE medical_histories.personas ADD INDEX(id_sexo);
ALTER TABLE medical_histories.personas ADD CONSTRAINT fk_personas_id_sexo FOREIGN KEY (id_sexo) REFERENCES medical_histories.sexo (id); 
ALTER TABLE medical_histories.personas ADD INDEX(id_tipo_cedula);
ALTER TABLE medical_histories.personas ADD CONSTRAINT fk_personas_id_tipo_cedula FOREIGN KEY (id_tipo_cedula) REFERENCES medical_histories.tipo_cedula (id); 
ALTER TABLE medical_histories.personas ADD INDEX(id_permiso);
ALTER TABLE medical_histories.personas ADD CONSTRAINT fk_personas_id_permiso FOREIGN KEY (id_permiso) REFERENCES medical_histories.permisos (id); 
ALTER TABLE medical_histories.usuarios ADD INDEX(id_persona);
ALTER TABLE medical_histories.usuarios ADD CONSTRAINT fk_usuarios_id_persona FOREIGN KEY (id_persona) REFERENCES medical_histories.personas (id); 
INSERT INTO medical_histories.departamentos VALUES (null, 'example1'), (null, 'example2'), (null, 'example3');
INSERT INTO medical_histories.permisos VALUES (null, 'usuario'), (null, 'doctor'), (null, 'historias'), (null, 'enfermera'), (null, 'externo');
INSERT INTO medical_histories.respuestas VALUES (null, 'si'), (null, 'no');
INSERT INTO medical_histories.sexo VALUES (null, 'masculino'), (null, 'fenenino');
INSERT INTO medical_histories.tipo_cedula VALUES (null, 'V'), (null, 'E');