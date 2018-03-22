<?php

use yii\db\Migration;

class m180322_092754_alter_table_week extends Migration
{
    
    public function safeUp() {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        
        $this->addColumn('week', 'video_1', $this->string()->notNull());
        $this->addColumn('week', 'video_2', $this->string()->notNull());
        $this->addColumn('week', 'preview_1', $this->string()->notNull());
        $this->addColumn('week', 'preview_2', $this->string()->notNull());
    }

    public function safeDown() {
        $this->dropColumn('week', 'video_1');
        $this->dropColumn('week', 'video_2');
        $this->dropColumn('week', 'preview_1');
        $this->dropColumn('week', 'preview_2');
    }
}