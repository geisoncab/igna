DROP TABLE IF EXISTS tb_cargos_comisiones;
CREATE TABLE tb_cargos_comisiones(
    idcargoscomisiones INT NOT NULL AUTO_INCREMENT,
    nombre VARCHAR(200) NOT NULL,
    estado tinyint(1) NOT NULL DEFAULT 1,
    usuario_creo VARCHAR(200),
    fecha_creo timestamp NULL DEFAULT current_timestamp(),
    usuario_modifico VARCHAR(200),
    fecha_modifico timestamp NULL DEFAULT current_timestamp(),
    CONSTRAINT PK_cargoscomisiones PRIMARY KEY (idcargoscomisiones)
);

DROP TABLE IF EXISTS tb_comisiones;
CREATE TABLE tb_comisiones(
    idcomisiones INT NOT NULL AUTO_INCREMENT,
    idministerios INT(11) NOT NULL,
    nombre VARCHAR(200) NOT NULL,
    estado tinyint(1) NOT NULL DEFAULT 1,
    usuario_creo VARCHAR(200),
    fecha_creo timestamp NULL DEFAULT current_timestamp(),
    usuario_modifico VARCHAR(200),
    fecha_modifico timestamp NULL DEFAULT current_timestamp(),
    CONSTRAINT PK_comisiones PRIMARY KEY (idcomisiones),
    CONSTRAINT FK_comisiones_ministerios FOREIGN KEY (idministerios) REFERENCES tb_ministerios(idministerios) ON DELETE NO ACTION ON UPDATE NO ACTION
);

DROP TABLE IF EXISTS tb_asignacion_comisiones;
CREATE TABLE tb_asignacion_comisiones(
    idasignacioncomisiones INT NOT NULL AUTO_INCREMENT,
    idmiembro INT(11) NOT NULL,
    idcomisiones INT(11) NOT NULL,
    idcargoscomisiones INT(11) NOT NULL,
    estado tinyint(1) NOT NULL DEFAULT 1,
    usuario_creo VARCHAR(200),
    fecha_creo timestamp NULL DEFAULT current_timestamp(),
    usuario_modifico VARCHAR(200),
    fecha_modifico timestamp NULL DEFAULT current_timestamp(),
    CONSTRAINT PK_asignacioncomisiones PRIMARY KEY (idasignacioncomisiones),
    CONSTRAINT FK_asignacioncomisiones_miembro FOREIGN KEY (idmiembro) REFERENCES tb_miembro(idmiembro) ON DELETE NO ACTION ON UPDATE NO ACTION,
    CONSTRAINT FK_asignacioncomisiones_comisiones FOREIGN KEY (idcomisiones) REFERENCES tb_comisiones(idcomisiones) ON DELETE NO ACTION ON UPDATE NO ACTION,
    CONSTRAINT FK_asignacioncomisiones_cargoscomisiones FOREIGN KEY (idcargoscomisiones) REFERENCES tb_cargos_comisiones(idcargoscomisiones) ON DELETE NO ACTION ON UPDATE NO ACTION
);