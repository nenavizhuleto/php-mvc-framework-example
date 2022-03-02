<?php

use app\core\Application;

class m0001_initial {
    public function up() {
        $db = Application::$app->db;

        $SQL = [
            // Creating tables

            // users
            "CREATE TABLE `users` (
            `id` int AUTO_INCREMENT PRIMARY KEY,
            `firstname` varchar(50) NOT NULL,
            `lastname` varchar(50) NOT NULL,
            `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
            `password` varchar(256) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
            `type_id` int NOT NULL
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;",

            // user_types
            "CREATE TABLE `user_types` (
                `id` int AUTO_INCREMENT PRIMARY KEY,
                `type` varchar(50) NOT NULL
              ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;",

            // photos
            "CREATE TABLE `photos` (
                `id` int AUTO_INCREMENT PRIMARY KEY,
                `title` varchar(100) NOT NULL,
                `description` text NOT NULL,
                `date` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ,
                `img` varchar(256) NOT NULL,
                `user_id` int NOT NULL
              ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;",

            // adding foreign key frow types to users
            "ALTER TABLE `users`
            ADD CONSTRAINT `typesOfUsers` FOREIGN KEY (`id`) 
            REFERENCES `user_types` (`id`) 
            ON DELETE RESTRICT 
            ON UPDATE RESTRICT;",

            // adding foreign key frow users to photos
            "ALTER TABLE `photos`
            ADD CONSTRAINT `photosAuthors` FOREIGN KEY (`id`) 
            REFERENCES `users` (`id`) 
            ON DELETE RESTRICT 
            ON UPDATE RESTRICT;"

        ];

        foreach ($SQL as $query) {
            $db->pdo->exec($query);
        }
    }

    public function down() {
        $db = Application::$app->db;
        $SQL = [
            "DROP TABLE `photos`;",
            "DROP TABLE `user_types`;",
            "DROP TABLE `users`;"
        ];

        foreach ($SQL as $query) {
            $db->pdo->exec($query);
        }
    }
}