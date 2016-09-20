<?php

use yii\db\Migration;

class m160920_101800_create_table_comment extends Migration
{


    public function safeUp()
    {
        $this->execute("
          CREATE TABLE IF NOT EXISTS `blg_comment` (
              `id` INT NOT NULL AUTO_INCREMENT,
              `user_id` INT NOT NULL,
              `blog_id` INT NOT NULL,
              `comment` VARCHAR(255) NOT NULL,
              `create_date` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
              PRIMARY KEY (`id`),
              INDEX `fk_blg_comment_1_idx` (`user_id` ASC),
              INDEX `fk_blg_comment_2_idx` (`blog_id` ASC),
              CONSTRAINT `fk_blg_comment_1`
              FOREIGN KEY (`user_id`)
              REFERENCES `blg_user` (`id`)
              ON DELETE NO ACTION
              ON UPDATE NO ACTION,
              CONSTRAINT `fk_blg_comment_2`
              FOREIGN KEY (`blog_id`)
              REFERENCES `blg_blog` (`id`)
              ON DELETE NO ACTION
              ON UPDATE NO ACTION)
              ENGINE = InnoDB DEFAULT CHARSET UTF8;
        ");
    }

    public function safeDown()
    {
        $this->execute("
          DROP TABLE IF EXISTS `blg_comment`
        ");
    }

}
