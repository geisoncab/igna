DROP TABLE IF EXISTS tb_informacion_eclesial;
CREATE TABLE tb_informacion_eclesial(
    idinformacioneclesial INT NOT NULL AUTO_INCREMENT,
    idmiembro INT NOT NULL,
    es_dedicado VARCHAR(20) NOT NULL,
    asiste_regularmente VARCHAR(20) NOT NULL,
    acepto_cristo VARCHAR(20) NOT NULL,
    es_bautizado VARCHAR(20) NOT NULL,
    miembro_esta_iglesia VARCHAR(20) NOT NULL,
    miembro_otra_iglesia VARCHAR(20) NOT NULL,
    estado tinyint(1) NOT NULL DEFAULT 1,
    usuario_creo VARCHAR(200),
    fecha_creo timestamp NULL DEFAULT current_timestamp(),
    usuario_modifico VARCHAR(200),
    fecha_modifico timestamp NULL DEFAULT current_timestamp(),
    CONSTRAINT PK_informacioneclesial PRIMARY KEY (idinformacioneclesial),
    CONSTRAINT FK_informacioneclesial_miembro FOREIGN KEY (idmiembro) REFERENCES tb_miembro(idmiembro) ON DELETE NO ACTION ON UPDATE NO ACTION
);