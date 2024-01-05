CREATE DATABASE IF NOT EXISTS navidad;
CREATE USER IF NOT EXISTS navidad identified BY 'navidad';
USE navidad;
GRANT all ON navidad.* TO navidad;

CREATE TABLE IF NOT EXISTS usuarios (
    user VARCHAR(20) PRIMARY KEY,
    pass VARCHAR(20) NOT NULL,
    email VARCHAR(40) NOT NULL,
    fecha_nacimiento DATE NOT NULL,
    perfil VARCHAR(20) NOT NULL
);

INSERT INTO usuarios (user, pass, email, fecha_nacimiento, perfil)
VALUES 
    ('cliente1', 'c1', 'cliente1@gmail.com', '1990-01-01', 'cliente'),
    ('admin1', 'a1', 'admin1@gmail.com', '1990-01-01', 'administrador'),
    ('mod1', 'm1', 'mod1@gmail.com', '1990-01-01', 'moderador');

CREATE TABLE IF NOT EXISTS productos (
    codigo INT PRIMARY KEY,
    descripcion VARCHAR(255) NOT NULL,
    precio DECIMAL(10, 2) NOT NULL,
    stock INT NOT NULL,
    url_imagen VARCHAR(255),
    categoria VARCHAR(20)
);

INSERT INTO productos (codigo, descripcion, precio, stock, url_imagen, categoria)
VALUES 
    (1, 'Portátil ASUS', 600.00, 10, 'https://acortar.link/RlTEqM', 'Informática'),
    (2, 'Smartphone Samsung', 400.50, 15, 'url_de_la_imagen_2', 'Electrónica'),
    (3, 'Televisor LG', 800.75, 5, 'https://acortar.link/TX34oz', 'Electrodomésticos'),
    (4, 'Televisor LG', 800.75, 5, 'https://acortar.link/TX34oz', 'Electrodomésticos'),
    (5, 'Televisor LG', 800.75, 5, 'https://acortar.link/TX34oz', 'Electrodomésticos'),
    (15, 'Televisor LG', 800.75, 5, 'https://acortar.link/TX34oz', 'Electrodomésticos'),
    (25, 'Televisor LG', 800.75, 5, 'https://acortar.link/TX34oz', 'Electrónica'),
    (35, 'Televisor LG', 800.75, 5, 'https://acortar.link/TX34oz', 'Electrodomésticos'),
    (6, 'Televisor LG', 800.75, 5, 'https://acortar.link/TX34oz', 'Informática');
