<?php

use yii\db\Migration;

class m180315_132754_alter_tables extends Migration
{
    
    public function safeUp() {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        
        $this->addColumn('question', 'status', $this->integer(1)->notNull()->defaultValue(1));
        
        $this->addColumn('video', 'text', $this->text());
        $this->addColumn('video', 'title', $this->string());
    }

    public function safeDown() {
        $this->dropColumn('video', 'title');
        $this->dropColumn('video', 'text');
        
        $this->dropColumn('question', 'status');
    }
}