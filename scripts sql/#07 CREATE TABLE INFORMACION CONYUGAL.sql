DROP TABLE IF EXISTS tb_informacion_conyugal;
CREATE TABLE tb_informacion_conyugal(
    idinformacionconyugal INT NOT NULL AUTO_INCREMENT,
    idmiembro_m INT(11) NOT NULL,
    idmiembro_f INT(11) NOT NULL,
    estado tinyint(1) NOT NULL DEFAULT 1,
    usuario_creo VARCHAR(200),
    fecha_creo timestamp NULL DEFAULT current_timestamp(),
    usuario_modifico VARCHAR(200),
    fecha_modifico timestamp NULL DEFAULT current_timestamp(),
    CONSTRAINT PK_informacionconyugal PRIMARY KEY (idinformacionconyugal),
    CONSTRAINT FK_informacionconyugal_miembro FOREIGN KEY (idmiembro_m) REFERENCES tb_miembro(idmiembro) ON DELETE NO ACTION ON UPDATE NO ACTION

);