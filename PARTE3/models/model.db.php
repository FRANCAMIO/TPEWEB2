<?php

    require_once './config.php';
    
    class Model {
        protected $db;

        function __construct() {
            $this->db = new PDO('mysql:host='. MYSQL_HOST .';dbname='. MYSQL_DB .';charset=utf8', MYSQL_USER, MYSQL_PASS);
            $this->deploy();
        }

        function deploy() {
            // Chequear si hay tablas
            $query = $this->db->query('SHOW TABLES');
            $tables = $query->fetchAll(); // Nos devuelve todas las tablas de la db
            if(count($tables)==0) {
                // Si no hay crearlas
                $sql =<<<END
                CREATE TABLE `marcas` (
                    `id_marca` int(11) NOT NULL AUTO_INCREMENT,
                    `nombre` varchar(250) NOT NULL,
                    `modelo` varchar(200) NOT NULL,
                    PRIMARY KEY (`id_marca`)
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

                INSERT INTO `marcas` (`id_marca`, `nombre`, `modelo`) VALUES
                (1, 'nike', 'JORDAN'), (2, 'adidas', 'YEZZY'), (3, 'puma', 'FENTY'), (4, 'puma', 'PLAY-STATION');

                CREATE TABLE `usuario` (
                    `id` int(11) NOT NULL AUTO_INCREMENT,
                    `usuario` varchar(50) NOT NULL,
                    `contraseña` varchar(255) NOT NULL,
                    PRIMARY KEY (`id`)
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

                -- Secure hashed password for 'francisco' user
                INSERT INTO `usuario` (`id`, `usuario`, `contraseña`) VALUES
                (1, 'webadmin', '$2y$10$4rQL3n0Pyf524RZtuafNvegioiLjKUHPH0FX7EsRy/8xlNvMgfKwG'),
                (2, 'francisco', :hashedPassword);

                CREATE TABLE `zapatillas` (
                    `id_zapatilla` int(11) NOT NULL AUTO_INCREMENT,
                    `id_marca` int(11) NOT NULL,
                    `diseño` varchar(200) NOT NULL,
                    `talle` int(11) NOT NULL,
                    `material` varchar(200) NOT NULL,
                    PRIMARY KEY (`id_zapatilla`),
                    FOREIGN KEY (`id_marca`) REFERENCES `marcas` (`id_marca`)
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

                END;                
                $this->db->query($sql);
            }
            
        }
    }