DROP TABLE IF EXISTS tb_informacion_bautizo;
CREATE TABLE tb_informacion_bautizo(
    idiglesiabautizo INT NOT NULL AUTO_INCREMENT,
    idmiembro INT(11) NOT NULL,
    iglesia_bautizo VARCHAR(200) NOT NULL,
    fecha_bautizo DATE NOT NULL,
    estado tinyint(1) NOT NULL DEFAULT 1,
    usuario_creo VARCHAR(200),
    fecha_creo timestamp NULL DEFAULT current_timestamp(),
    usuario_modifico VARCHAR(200),
    fecha_modifico timestamp NULL DEFAULT current_timestamp(),
    CONSTRAINT PK_iglesiabautizo PRIMARY KEY (idiglesiabautizo),
    CONSTRAINT FK_iglesiabautizo_miembro FOREIGN KEY (idmiembro) REFERENCES tb_miembro(idmiembro) ON DELETE NO ACTION ON UPDATE NO ACTION
);