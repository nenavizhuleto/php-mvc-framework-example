<?php

use ihate\mvc\Application;

class m0002_added_user_types {
    public function up() {
        $db = Application::$app->db;

        $SQL = "INSERT INTO `user_types` (`id`, `type`) VALUES
        (1, 'admin'),
        (0, 'user');";

        $db->pdo->exec($SQL);
    }

    public function down() {
        $db = Application::$app->db;

        $SQL = "TRUNCATE TABLE `user_types`;";

        $db->pdo->exec($SQL);
    }
}