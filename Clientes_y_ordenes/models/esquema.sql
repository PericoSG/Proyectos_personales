DROP TABLE IF EXISTS Ordenes;
DROP TABLE IF EXISTS Clientes;
DROP TABLE IF EXISTS Estados;


CREATE TABLE Clientes (
    id_cliente INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    correo VARCHAR(100) NOT NULL UNIQUE,
    telefono VARCHAR(15),
    fecha_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE Estados (
    id_estado INT AUTO_INCREMENT PRIMARY KEY,
    nombre_estado VARCHAR(50) NOT NULL UNIQUE
);

CREATE TABLE Ordenes (
    id_orden INT AUTO_INCREMENT PRIMARY KEY,
    id_cliente INT,
    fecha_orden DATE,
    total DECIMAL(10, 2),
    estado INT,
    FOREIGN KEY (id_cliente) REFERENCES Clientes(id_cliente) ON DELETE CASCADE,
    FOREIGN KEY(estado) REFERENCES Estados(id_estado) ON DELETE CASCADE
);

INSERT INTO Clientes (nombre, correo, telefono)
VALUES
    ('Juan Pérez', 'juan@dom.com', '123456789'),
    ('María López', 'maria@dom.com', '987654321'),
    ('Carlos Rodríguez', 'carlos@dom.com', '456789123');

INSERT INTO Estados (nombre_estado)
VALUES
    ('Pendiente'),    -- La orden ha sido creada, pero no se ha procesado.
    ('Enviado'),      -- La orden ha sido procesada y enviada al cliente.
    ('Cancelado'),    -- La orden fue cancelada antes de enviarse.
    ('Completado'),   -- La orden ha sido completada y entregada.
    ('En Proceso'),   -- La orden está en proceso, pero no ha sido enviada.
    ('Reembolsado');  -- La orden fue reembolsada después de un problema.

/* Tabla experimental*/
INSERT INTO Ordenes (id_cliente, fecha_orden, total, estado)
VALUES 
(1, '2024-11-01', 150.00, 1),
(1, '2024-11-05', 200.00, 2),
(1, '2024-11-10', 120.00, 1),
(1, '2024-11-15', 175.00, 3),
(1, '2024-11-20', 220.00, 2);