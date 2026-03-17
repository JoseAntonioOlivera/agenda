# 📇 Sistema CRUD de Agenda de Contactos (MVC PHP)

Este proyecto es una aplicación web básica para gestionar una agenda de contactos utilizando una arquitectura **Modelo-Vista-Controlador (MVC)**, PHP puro (PDO) y MariaDB/MySQL.

---

## 1. Configuración de la Base de Datos
Sigue estos pasos para preparar tu entorno de base de datos. El sistema está diseñado para que solo el **nombre** sea obligatorio, permitiendo que el resto de campos sean opcionales.

### 🛠️ Scripts SQL
Ejecuta los siguientes comandos en tu gestor (phpMyAdmin, terminal, HeidiSQL o similar):

```sql
-- 1. Crear la base de datos
CREATE DATABASE IF NOT EXISTS agenda_contactos 
CHARACTER SET utf8mb4 
COLLATE utf8mb4_unicode_ci;

USE agenda_contactos;

-- 2. Crear la tabla de contactos
CREATE TABLE IF NOT EXISTS contactos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    telefono VARCHAR(20) DEFAULT NULL,
    email VARCHAR(100) DEFAULT NULL,
    notas TEXT DEFAULT NULL,
    fecha_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- 3. (Opcional) Datos de ejemplo para pruebas
INSERT INTO contactos (nombre, telefono, email, notas) VALUES
('Juan Pérez', '600111222', 'juan.perez@email.com', 'Compañero de trabajo'),
('María García', '611222333', 'm.garcia@provider.es', 'Vecina del quinto'),
('Carlos Rodríguez', '622333444', NULL, 'Fontanero recomendado'),
('Ana Martínez', '633444555', 'ana.mtz@gmail.com', 'Amiga del colegio'),
('Luis López', NULL, 'l.lopez88@outlook.com', 'Contacto de LinkedIn'),
('Elena Sánchez', '644555666', NULL, 'Profesora de inglés'),
('David Gómez', '655666777', 'david.g@empresa.com', 'Cliente VIP'),
('Laura Fernández', '666777888', 'laura.fer@academia.edu', 'Cita médica el lunes'),
('Jorge Ruiz', NULL, NULL, 'Solo tengo su dirección física'),
('Sofía Morales', '677888999', 'sofia.m@freelance.org', 'Diseñadora gráfica');
