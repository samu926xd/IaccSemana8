
-- Crear tabla DONACION
CREATE TABLE IF NOT EXISTS DONACION (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_proyecto INT,
    id_donante INT,
    monto DECIMAL(10,2),
    fecha DATE,
    FOREIGN KEY (id_proyecto) REFERENCES PROYECTO(id),
    FOREIGN KEY (id_donante) REFERENCES DONANTE(id)
);

-- Insertar 10 registros de ejemplo
INSERT INTO DONACION (id_proyecto, id_donante, monto, fecha) VALUES
(1, 1, 100.00, '2025-07-01'),
(1, 2, 150.00, '2025-07-02'),
(1, 3, 300.00, '2025-07-03'),
(2, 1, 500.00, '2025-07-04'),
(2, 2, 100.00, '2025-07-05'),
(3, 3, 250.00, '2025-07-06'),
(1, 1, 200.00, '2025-07-07'),
(3, 1, 75.00, '2025-07-08'),
(2, 3, 80.00, '2025-07-09'),
(1, 2, 120.00, '2025-07-10');
