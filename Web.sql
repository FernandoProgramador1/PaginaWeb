SET GLOBAL  max_allowed_packet=100*1024*1024;

Create Database SSetco;

use SSetco;

Create Table Marcas (
IdMarca     int(10) NOT NULL AUTO_INCREMENT, 
Nombre      varchar(250) NOT NULL,
Archivo     longblob,
MimeType    varchar(50),
PRIMARY KEY (IdMarca)
);

Create Table TiposProductos(
    IdTipoProducto int(10) NOT NULL AUTO_INCREMENT,
    DescripcionTipoProducto varchar(150) NOT NULL,
    PRIMARY KEY (IdTipoProducto)
);

Create Table Productos(
    IdProducto int(10) NOT NULL AUTO_INCREMENT,
    NombreProducto varchar(100) NOT NULL,
    DetallesProducto varchar(500) NOT NULL,
    CantidadMedida    varchar(100),
    Archivo longblob NOT NULL,
    MimeType varchar(50) NOT NULL,
    IdMarca int(10),
    IdTipoProducto int(10),
    PRIMARY KEY (IdProducto),
    CONSTRAINT fk_Productos_Marcas FOREIGN KEY (IdMarca) REFERENCES Marcas(IdMarca),
    CONSTRAINT fk_Productos_TiposProductos FOREIGN KEY (IdTipoProducto) REFERENCES TiposProductos(IdTipoProducto)
);

Create Table Carruseles (
    IdCarrusel    int(10) NOT NULL AUTO_INCREMENT,
    Archivo longblob NOT NULL,
    MimeType varchar(50) NOT NULL,
PRIMARY KEY (IdCarrusel)
);

Create Table Publicidades (
    IdPublicidad    int(10) NOT NULL AUTO_INCREMENT,
    Archivo longblob NOT NULL,
    MimeType varchar(50) NOT NULL,
PRIMARY KEY (IdPublicidad)
);

Create Table Misiones (
    IdMision    int(10) NOT NULL AUTO_INCREMENT,
    DescripcionMision varchar(1000) NOT NULL,
PRIMARY KEY (IdMision)
);

Create Table Visiones (
    IdVision    int(10) NOT NULL AUTO_INCREMENT,
    DescripcionVision varchar(1000) NOT NULL,
PRIMARY KEY (IdVision)
);

Create Table Valores (
    IdValores    int(10) NOT NULL AUTO_INCREMENT,
    DescripcionValores varchar(1000) NOT NULL,
PRIMARY KEY (IdValores)
);

Create Table QuienesSomos (
    IdQuienes    int(10) NOT NULL AUTO_INCREMENT,
    DescripcionQuienes varchar(1000) NOT NULL,
PRIMARY KEY (IdQuienes)
);

Create Table Roles(
    IdRol   int(10) NOT NULL AUTO_INCREMENT,
    Rol     varchar(50) NOT NULL,
    PRIMARY KEY (IdRol)
);

Create Table Contactos(
    IdContacto  int(10) NOT NULL AUTO_INCREMENT,
    Correo      varchar(100) NOT NULL,
    Direccion   varchar(250),
    CodigoP     varchar(10),
    Ciudad      varchar(30),
    Estado      varchar(30),
    Telefono    varchar(15),
    PRIMARY KEY (IdContacto)
);

Create Table Usuarios(
    IdUsuario   int(10) NOT NULL AUTO_INCREMENT,
    Nombre      varchar(50) NOT NULL,
    Correo      varchar(150) NOT NULL,
    Contra      varchar(20) NOT NULL,
    IdRol       int(10) NOT NULL,
    PRIMARY KEY (IdUsuario),
    CONSTRAINT fk_Usuarios_Roles FOREIGN KEY (IdRol) REFERENCES Roles(IdRol)
);

INSERT INTO Roles(IdRol,Rol) VALUES(NULL,'Admin');
INSERT INTO Usuarios(IdUsuario,Nombre,Correo,Contra,IdRol) VALUES(NULL,'AdminSSetco', '','SSetco2023', '1');

-- Create View view_publicaciones as
-- SELECT p.IdPublic, p.Seccion, p.Principal, p.Secundario, p.IdArchivo, a.Archivo, a.MimeType, a.Descripcion
-- FROM Publicaciones as p
-- LEFT JOIN
-- Archivos as a
-- ON p.IdArchivo = a.IdArchivo
-- ORDER by IdPublic DESC;

Create View view_productos as
SELECT  p.IdProducto, p.NombreProducto, p.DetallesProducto, p.Archivo as ImgProducto, p.MimeType as TipoArchivo,
        m.Nombre as NombreMarca, tp.DescripcionTipoProducto as NombreTpProducto
FROM Productos as p
LEFT JOIN
Marcas as m
ON p.IdMarca = m.IdMarca
LEFT JOIN
TiposProductos as tp
ON p.IdTipoProducto = tp.IdTipoProducto
ORDER by IdProducto DESC;