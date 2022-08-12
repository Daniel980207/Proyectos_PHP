CREATE DATABASE proyectPHP;
USE proyectPHP;
CREATE TABLE usuario(
    id              int(255) auto_increment not null,
    nombre          varchar(100) not null,
    apellidos       varchar(100) not null,
    email           varchar(255) not null,
    passwords       varchar(255) not null,
    fecha           date not null,
    CONSTRAINT pk_usuario PRIMARY KEY(id),
    CONSTRAINT uq_email UNIQUE(id)
)ENGINE=InnoDb;
CREATE TABLE categorias(
    id              int(255) auto_increment not null,
    nombre          varchar(100),
    CONSTRAINT pk_categorias PRIMARY KEY(id)
)ENGINE=InnoDb;

CREATE TABLE entradas(
    id              int(255) auto_increment not null,
    usuario_id      int(255) not null,
    categoria_id    int(255) not null,
    titulo          varchar(255) not null,
    descripcion     MEDIUMTEXT,
    fecha           date not null,
    CONSTRAINT pk_entradas PRIMARY KEY(id),
    CONSTRAINT fk_entradas_usuario FOREIGN KEY(usuario_id) REFERENCES usuario(id),
    CONSTRAINT fk_entradas_categorias FOREIGN KEY(categoria_id) REFERENCES categorias(id) 
)ENGINE=InnoDb;