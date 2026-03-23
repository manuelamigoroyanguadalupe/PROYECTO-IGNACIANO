CREATE TABLE Alumnos (
    id_alumno TINYINT IDENTITY(1,1) PRIMARY KEY,
    Nombre VARCHAR(100) NOT NULL,
    Email VARCHAR(120) NOT NULL,
    Contraseña CHAR(20),
    pagina_web VARCHAR(100) NOT NULL,
    Nombre_jesuita CHAR(30) NOT NULL,
    Imagen VARBINARY(MAX) NOT NULL,
    Mensaje VARCHAR(150) NOT NULL
);
INSERT INTO Alumnos 
(Nombre, Email, Contraseña, pagina_web, Nombre_jesuita, Imagen, Mensaje)
VALUES
('Juan Perez', 'juan@gmail.com', 'pass1234', 'www.juan.com', 'Jesuita1', 0x1234, 'Hola soy Juan'),

('Maria Lopez', 'maria@gmail.com', 'maria2024', 'www.maria.com', 'Jesuita2', 0x5678, 'Buenas soy Maria'),

('Carlos Ruiz', 'carlos@gmail.com', 'carlos99', 'www.carlos.com', 'Jesuita3', 0x9ABC, 'Hey soy Carlos');


CREATE TABLE Agradecimientos(

    id_agradecimiento SMALLINT IDENTITY(1,1) PRIMARY KEY NOT NULL,
    id_remitente TINYINT NOT NULL,
    id_destinatario TINYINT NOT NULL,
    mensaje VARCHAR(1500) NOT NULL,

UNIQUE (id_remitente, id_destinatario), 
FOREIGN KEY (id_remitente) REFERENCES Alumnos(id_alumno),
FOREIGN KEY (id_destinatario) REFERENCES Alumnos(id_alumno)

);
