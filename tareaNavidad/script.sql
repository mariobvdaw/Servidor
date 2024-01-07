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
    (1, 'Portátil ASUS', 600.00, 40, 'https://i.postimg.cc/WzZ30ZbH/portatil-Asus.jpg', 'Informática'),
    (2, 'Galaxy S23+', 630.50, 115, 'https://i.postimg.cc/ryxLV3hx/movil.jpg', 'Electrónica'),
    (3, 'Televisor LG', 800.75, 15, 'https://i.postimg.cc/R0BS99m3/televisor.jpg', 'Electrodomésticos'),
    (4, 'Lavadora WM-99D2', 320.00, 2, 'https://i.postimg.cc/8CmtXdwF/lavadora.webp', 'Electrodomésticos'),
    (5, 'Gorro de lana', 3.15, 35, 'https://i.postimg.cc/9Qj0XytF/gorro.jpg', 'Ropa');

CREATE TABLE IF NOT EXISTS compras (
    id INT AUTO_INCREMENT PRIMARY KEY,
    comprador VARCHAR(20),
    fecha DATE,
    cod_producto INT,
    cantidad INT,
    total DECIMAL(10, 2),
    activo INT,
    FOREIGN KEY (comprador) REFERENCES usuarios(user),
    FOREIGN KEY (cod_producto) REFERENCES productos(codigo)
);

CREATE TABLE IF NOT EXISTS albaranes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    fecha DATE,
    cod_producto INT,
    cantidad INT,
    usuario VARCHAR(20),
    activo INT,
    FOREIGN KEY (usuario) REFERENCES usuarios(user),
    FOREIGN KEY (cod_producto) REFERENCES productos(codigo)
);
