DROP TABLE IF EXISTS tb_departamentos;
CREATE TABLE tb_departamentos(
    iddepartamentos INT NOT NULL AUTO_INCREMENT,
    nombre VARCHAR(200) NOT NULL,
    estado tinyint(1) NOT NULL DEFAULT 1,
    usuario_creo VARCHAR(200),
    fecha_creo timestamp NULL DEFAULT current_timestamp(),
    usuario_modifico VARCHAR(200),
    fecha_modifico timestamp NULL DEFAULT current_timestamp(),
    CONSTRAINT PK_departamentos PRIMARY KEY (iddepartamentos)
);

DROP TABLE IF EXISTS tb_municipios;
CREATE TABLE tb_municipios(
    idmunicipios INT NOT NULL AUTO_INCREMENT,
    iddepartamentos INT NOT NULL,
    nombre VARCHAR(200) NOT NULL,
    estado tinyint(1) NOT NULL DEFAULT 1,
    usuario_creo VARCHAR(200),
    fecha_creo timestamp NULL DEFAULT current_timestamp(),
    usuario_modifico VARCHAR(200),
    fecha_modifico timestamp NULL DEFAULT current_timestamp(),
    CONSTRAINT PK_municipios PRIMARY KEY (idmunicipios),
    CONSTRAINT FK_municipios_departamentos FOREIGN KEY (iddepartamentos) REFERENCES tb_departamentos(iddepartamentos) ON DELETE NO ACTION ON UPDATE NO ACTION
);

DROP TABLE IF EXISTS tb_barrio_caserio_finca_aldea;
CREATE TABLE tb_barrio_caserio_finca_aldea(
    idbcfa INT NOT NULL AUTO_INCREMENT,
    idmunicipios INT NOT NULL,
    nombre VARCHAR(200) NOT NULL,
    estado tinyint(1) NOT NULL DEFAULT 1,
    usuario_creo VARCHAR(200),
    fecha_creo timestamp NULL DEFAULT current_timestamp(),
    usuario_modifico VARCHAR(200),
    fecha_modifico timestamp NULL DEFAULT current_timestamp(),
    CONSTRAINT PK_bcfa PRIMARY KEY (idbcfa),
    CONSTRAINT FK_bcfa_municipios FOREIGN KEY (idmunicipios) REFERENCES tb_municipios(idmunicipios) ON DELETE NO ACTION ON UPDATE NO ACTION
);
