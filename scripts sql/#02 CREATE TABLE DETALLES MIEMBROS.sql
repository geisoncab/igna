DROP TABLE IF EXISTS tb_estadocivil;
CREATE TABLE tb_estadocivil(
    idestadocivil INT NOT NULL AUTO_INCREMENT,
    nombre VARCHAR(200) NOT NULL,
    estado tinyint(1) NOT NULL DEFAULT 1,
    usuario_creo VARCHAR(200),
    fecha_creo timestamp NULL DEFAULT current_timestamp(),
    usuario_modifico VARCHAR(200),
    fecha_modifico timestamp NULL DEFAULT current_timestamp(),
    CONSTRAINT PK_estadocivil PRIMARY KEY (idestadocivil)
);

DROP TABLE IF EXISTS tb_ocupaciones;
CREATE TABLE tb_ocupaciones(
    idocupaciones INT NOT NULL AUTO_INCREMENT,
    nombre VARCHAR(200) NOT NULL,
    estado tinyint(1) NOT NULL DEFAULT 1,
    usuario_creo VARCHAR(200),
    fecha_creo timestamp NULL DEFAULT current_timestamp(),
    usuario_modifico VARCHAR(200),
    fecha_modifico timestamp NULL DEFAULT current_timestamp(),
    CONSTRAINT PK_ocupaciones PRIMARY KEY (idocupaciones)
);

DROP TABLE IF EXISTS tb_idiomas;
CREATE TABLE tb_idiomas(
    ididiomas INT NOT NULL AUTO_INCREMENT,
    nombre VARCHAR(200) NOT NULL,
    estado tinyint(1) NOT NULL DEFAULT 1,
    usuario_creo VARCHAR(200),
    fecha_creo timestamp NULL DEFAULT current_timestamp(),
    usuario_modifico VARCHAR(200),
    fecha_modifico timestamp NULL DEFAULT current_timestamp(),
    CONSTRAINT PK_idiomas PRIMARY KEY (ididiomas)
);