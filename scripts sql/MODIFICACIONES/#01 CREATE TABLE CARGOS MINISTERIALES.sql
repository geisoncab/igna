DROP TABLE IF EXISTS tb_ministerios_cargos;
CREATE TABLE tb_ministerios_cargos(
    idministerioscargos INT NOT NULL AUTO_INCREMENT,
    idministerios INT NOT NULL,
    nombre VARCHAR(200) NOT NULL,
    estado tinyint(1) NOT NULL DEFAULT 1,
    usuario_creo VARCHAR(200),
    fecha_creo timestamp NULL DEFAULT current_timestamp(),
    usuario_modifico VARCHAR(200),
    fecha_modifico timestamp NULL DEFAULT current_timestamp(),
    CONSTRAINT PK_ministerioscargos PRIMARY KEY (idministerioscargos),
    CONSTRAINT FK_ministerios_ministerioscargos FOREIGN KEY (idministerios) REFERENCES tb_ministerios(idministerios) ON DELETE NO ACTION ON UPDATE NO ACTION
);