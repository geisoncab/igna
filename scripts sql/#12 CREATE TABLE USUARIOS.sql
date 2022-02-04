DROP TABLE IF EXISTS tb_usuario;
CREATE TABLE tb_usuario(
    idsuario INT NOT NULL AUTO_INCREMENT,
    idmiembro INT(11) NOT NULL,
    nombre_usuario VARCHAR(200) NOT NULL,
    clave BLOB NOT NULL,
    nivel VARCHAR(200) NOT NULL,
    estado tinyint(1) NOT NULL DEFAULT 1,
    usuario_creo VARCHAR(200),
    fecha_creo timestamp NULL DEFAULT current_timestamp(),
    usuario_modifico VARCHAR(200),
    fecha_modifico timestamp NULL DEFAULT current_timestamp(),
    CONSTRAINT PK_usuarios PRIMARY KEY (idsuario)
);