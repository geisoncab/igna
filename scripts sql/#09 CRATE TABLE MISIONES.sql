DROP TABLE IF EXISTS tb_misiones;
CREATE TABLE tb_misiones(
    idmisiones INT NOT NULL AUTO_INCREMENT,
    nombre VARCHAR(200) NOT NULL,
    estado tinyint(1) NOT NULL DEFAULT 1,
    usuario_creo VARCHAR(200),
    fecha_creo timestamp NULL DEFAULT current_timestamp(),
    usuario_modifico VARCHAR(200),
    fecha_modifico timestamp NULL DEFAULT current_timestamp(),
    CONSTRAINT PK_misiones PRIMARY KEY (idmisiones)
);

DROP TABLE IF EXISTS tb_asignacion_misiones;
CREATE TABLE tb_asignacion_misiones(
    idasignacionmisiones INT NOT NULL AUTO_INCREMENT,
    idmiembro INT(11) NOT NULL,
    idmisiones INT(11) NOT NULL,
    estado tinyint(1) NOT NULL DEFAULT 1,
    usuario_creo VARCHAR(200),
    fecha_creo timestamp NULL DEFAULT current_timestamp(),
    usuario_modifico VARCHAR(200),
    fecha_modifico timestamp NULL DEFAULT current_timestamp(),
    CONSTRAINT PK_asignacionmisiones PRIMARY KEY (idasignacionmisiones),
    CONSTRAINT FK_asignacionmisiones_miembro FOREIGN KEY (idmiembro) REFERENCES tb_miembro(idmiembro) ON DELETE NO ACTION ON UPDATE NO ACTION,
    CONSTRAINT FK_asignacionmisiones_misiones FOREIGN KEY (idmisiones) REFERENCES tb_misiones(idmisiones) ON DELETE NO ACTION ON UPDATE NO ACTION
);