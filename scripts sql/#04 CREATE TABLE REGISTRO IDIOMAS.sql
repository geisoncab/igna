DROP TABLE IF EXISTS tb_registro_idiomas;
CREATE TABLE tb_registro_idiomas(
    idregistroidiomas INT NOT NULL AUTO_INCREMENT,
    ididiomas INT NOT NULL,
    idmiembro INT NOT NULL,
    estado tinyint(1) NOT NULL DEFAULT 1,
    usuario_creo VARCHAR(200),
    fecha_creo timestamp NULL DEFAULT current_timestamp(),
    usuario_modifico VARCHAR(200),
    fecha_modifico timestamp NULL DEFAULT current_timestamp(),
    CONSTRAINT PK_registroidiomas PRIMARY KEY (idregistroidiomas),
    CONSTRAINT FK_registroidiomas_idiomas FOREIGN KEY (ididiomas) REFERENCES tb_idiomas(ididiomas) ON DELETE NO ACTION ON UPDATE NO ACTION,
    CONSTRAINT FK_registroidiomas_miembros FOREIGN KEY (idmiembro) REFERENCES tb_miembro(idmiembro) ON DELETE NO ACTION ON UPDATE NO ACTION
);