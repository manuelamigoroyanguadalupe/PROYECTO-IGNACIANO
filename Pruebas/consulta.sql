CREATE TABLE Alumnos (
    id_alumno TINYINT AUTO_INCREMENT PRIMARY KEY,
    Nombre VARCHAR(100) NOT NULL,
    Email VARCHAR(120) NOT NULL,
    Contraseña CHAR(20),
    pagina_web VARCHAR(100) NOT NULL,
    Nombre_jesuita CHAR(30) NOT NULL,
    Imagen BINARY NOT NULL,
    Mensaje VARCHAR(150) NOT NULL
);
INSERT INTO Alumnos 
(Nombre, Email, Contraseña, pagina_web, Nombre_jesuita, Imagen, Mensaje)
VALUES
('Juan Perez', 'juan@gmail.com', 'pass1234', 'www.juan.com', 'Jesuita1', 0x1234, 'Hola soy Juan'),

('Maria Lopez', 'maria@gmail.com', 'maria2024', 'www.maria.com', 'Jesuita2', 0x5678, 'Buenas soy Maria'),

('Carlos Ruiz', 'carlos@gmail.com', 'carlos99', 'www.carlos.com', 'Jesuita3', 0x9ABC, 'Hey soy Carlos');
