<?php

use yii\db\Migration;

 class m170319_152308_newTest extends Migration{

    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp(){

        \Yii::$app->db->createCommand(

            "CREATE TABLE `shop1`.`vendor` (
            `id` INT NOT NULL AUTO_INCREMENT,
            `name` VARCHAR(45) NOT NULL,
            PRIMARY KEY (`id`));"

        );
    }

    public function safeDown(){

        \Yii::$app->db->createCommand(

            "DROP TABLE `vendor`;"

        );

    }
 }
