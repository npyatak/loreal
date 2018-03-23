<?php

use yii\db\Migration;

class m180323_202754_alter_table_week extends Migration
{
    
    public function safeUp() {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        
        $this->addColumn('week', 'winner_post_id_1', $this->integer());
        $this->addColumn('week', 'winner_post_id_2', $this->integer());
    }

    public function safeDown() {
        $this->dropColumn('week', 'winner_post_id_1');
        $this->dropColumn('week', 'winner_post_id_2');
    }
}