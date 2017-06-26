<?php

use yii\db\Migration;

 class m170319_170422_newTest2 extends Migration{
     // Use safeUp/safeDown to run migration code within a transaction
     public function safeUp()
     {
         $sql = "CREATE TABLE `test` (
                `id` INT NOT NULL,
                `name` VARCHAR(45) NOT NULL,
                PRIMARY KEY (`id`));";
         \Yii::$app->db->createCommand($sql)->execute();
     }

     public function safeDown()
     {
         $sql = "DROP TABLE `test`";
         \Yii::$app->db->createCommand($sql)->execute();
     }

 }
