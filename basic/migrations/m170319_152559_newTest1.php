<?php

use yii\db\Migration;

 class m170319_152559_newTest1 extends Migration{

    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp(){

        $this->createTable('vendor', [
            'id' => $this->primaryKey(),
            'name' => $this->string(45)->notNull()
        ]);


    }

    public function safeDown(){

        $this->dropTable('vendor');

    }

 }
