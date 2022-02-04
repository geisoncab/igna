DROP TABLE IF EXISTS tb_cargos_ministeriales;
CREATE TABLE tb_cargos_ministeriales(
    idcargosministeriales INT NOT NULL AUTO_INCREMENT,
    nombre VARCHAR(200) NOT NULL,
    estado tinyint(1) NOT NULL DEFAULT 1,
    usuario_creo VARCHAR(200),
    fecha_creo timestamp NULL DEFAULT current_timestamp(),
    usuario_modifico VARCHAR(200),
    fecha_modifico timestamp NULL DEFAULT current_timestamp(),
    CONSTRAINT PK_cargosministeriales PRIMARY KEY (idcargosministeriales)
);

DROP TABLE IF EXISTS tb_ministerios;
CREATE TABLE tb_ministerios(
    idministerios INT NOT NULL AUTO_INCREMENT,
    nombre VARCHAR(200) NOT NULL,
    estado tinyint(1) NOT NULL DEFAULT 1,
    usuario_creo VARCHAR(200),
    fecha_creo timestamp NULL DEFAULT current_timestamp(),
    usuario_modifico VARCHAR(200),
    fecha_modifico timestamp NULL DEFAULT current_timestamp(),
    CONSTRAINT PK_ministerios PRIMARY KEY (idministerios)
);

DROP TABLE IF EXISTS tb_asignacion_ministerios;
CREATE TABLE tb_asignacion_ministerios(
    idasignacionministerios INT NOT NULL AUTO_INCREMENT,
    idmiembro INT(11) NOT NULL,
    idministerios INT(11) NOT NULL,
    idcargosministeriales INT(11) NOT NULL,
    estado tinyint(1) NOT NULL DEFAULT 1,
    usuario_creo VARCHAR(200),
    fecha_creo timestamp NULL DEFAULT current_timestamp(),
    usuario_modifico VARCHAR(200),
    fecha_modifico timestamp NULL DEFAULT current_timestamp(),
    CONSTRAINT PK_asignacionministerios PRIMARY KEY (idasignacionministerios),
    CONSTRAINT FK_asignacionministerios_miembro FOREIGN KEY (idmiembro) REFERENCES tb_miembro(idmiembro) ON DELETE NO ACTION ON UPDATE NO ACTION,
    CONSTRAINT FK_asignacionministerios_ministerios FOREIGN KEY (idministerios) REFERENCES tb_ministerios(idministerios) ON DELETE NO ACTION ON UPDATE NO ACTION,
    CONSTRAINT FK_asignacionministerios_cargosministeriales FOREIGN KEY (idcargosministeriales) REFERENCES tb_cargos_ministeriales(idcargosministeriales) ON DELETE NO ACTION ON UPDATE NO ACTION
);