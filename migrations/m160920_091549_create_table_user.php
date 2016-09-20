<?php

use yii\db\Migration;


class m160920_091549_create_table_user extends Migration
{

    public function safeup()
    {
        $this->execute("
          CREATE TABLE IF NOT EXISTS `blg_user` (
              `id` INT NOT NULL AUTO_INCREMENT,
              `username` VARCHAR(128) NOT NULL,
              `surname` VARCHAR(45) NOT NULL,
              `name` VARCHAR(45) NOT NULL,
              `password` VARCHAR(225) NOT NULL,
              `salt` VARCHAR(255) NOT NULL,
              `access_token` VARCHAR(255) NULL DEFAULT NULL,
              `create_date` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ,
              PRIMARY KEY (`id`),
              UNIQUE INDEX `username_UNIQUE` (`username` ASC)) 
              ENGINE = InnoDB DEFAULT CHARSET UTF8;
        ");
    }

    public function safedown()
    {
        $this->execute("
            DROP TABLE IF EXISTS `blg_user`
        ");
    }
}

