DROP TABLE IF EXISTS tb_informacion_familiar;
CREATE TABLE tb_informacion_familiar(
    idinformacionfamiliar INT NOT NULL AUTO_INCREMENT,
    idmiembro INT (11) NOT NULL,
    idmiembro_papa INT(11) NOT NULL,
    idmiembro_mama INT(11) NOT NULL,
    estado tinyint(1) NOT NULL DEFAULT 1,
    usuario_creo VARCHAR(200),
    fecha_creo timestamp NULL DEFAULT current_timestamp(),
    usuario_modifico VARCHAR(200),
    fecha_modifico timestamp NULL DEFAULT current_timestamp(),
    CONSTRAINT PK_informacionfamiliar PRIMARY KEY (idinformacionfamiliar),
    CONSTRAINT FK_informacionfamiliar_miembro FOREIGN KEY (idmiembro) REFERENCES tb_miembro(idmiembro) ON DELETE NO ACTION ON UPDATE NO ACTION
);