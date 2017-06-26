<?php

use yii\db\Migration;

class m170623_133644_addToProduct extends Migration{

    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
        $sql = "ALTER TABLE `shop1`.`product` 
                ADD COLUMN `created_at` DATETIME NULL AFTER `description`,
                ADD COLUMN `updated_at` DATETIME NULL AFTER `created_at`;";
        \Yii::$app->db->createCommand($sql)->execute();
    }

    public function safeDown()
    {
        $sql = "ALTER TABLE `shop1`.`product` 
                DROP COLUMN `updated_at`,
                DROP COLUMN `created_at`;";
        \Yii::$app->db->createCommand($sql)->execute();
    }
}
