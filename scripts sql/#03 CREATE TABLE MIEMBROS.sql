DROP TABLE IF EXISTS tb_miembro;
CREATE TABLE tb_miembro(
    idmiembro INT NOT NULL AUTO_INCREMENT,
    foto VARCHAR(100) NOT NULL,
    cui VARCHAR(100) NOT NULL,
    nombre VARCHAR(200) NOT NULL,
    fecha_nacimiento DATE NOT NULL,
    genero VARCHAR(100) NOT NULL,
    idestadocivil INT(11) NOT NULL,
    ibcfa INT(11) NOT NULL,
    referencia TEXT NULL,
    telefono VARCHAR(50) NOT NULL,
    idocupaciones INT(11) NOT NULL,
    estado tinyint(1) NOT NULL DEFAULT 1,
    usuario_creo VARCHAR(200),
    fecha_creo timestamp NULL DEFAULT current_timestamp(),
    usuario_modifico VARCHAR(200),
    fecha_modifico timestamp NULL DEFAULT current_timestamp(),
    CONSTRAINT PK_miembros PRIMARY KEY (idmiembro)
);