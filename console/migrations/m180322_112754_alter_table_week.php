<?php

use yii\db\Migration;

class m180322_112754_alter_table_week extends Migration
{
    
    public function safeUp() {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        
        $this->addColumn('week', 'preview_main_1', $this->string()->notNull());
        $this->addColumn('week', 'preview_main_2', $this->string()->notNull());
    }

    public function safeDown() {
        $this->dropColumn('week', 'preview_main_1');
        $this->dropColumn('week', 'preview_main_2');
    }
}