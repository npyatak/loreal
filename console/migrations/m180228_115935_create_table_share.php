<?php

use yii\db\Migration;

class m180228_115935_create_table_share extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/candidates/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%share}}', [
            'id' => $this->primaryKey(),
            'uri' => $this->string(255),
            'title' => $this->string(255),
            'text' => $this->string(),
            'image' => $this->string(255),
            'twitter' => $this->string(255),
        ], $tableOptions);
        
        $this->batchInsert('{{%share}}', ['uri', 'title'], [
            [
                '/?res=1', 
                'результат 1', 
            ],
            [
                '/?res=2', 
                'результат 2', 
            ],
            [
                '/?res=3', 
                'результат 3', 
            ],
            [
                '/?res=4', 
                'результат 4', 
            ],
        ]);
    }

    public function safeDown()
    {
        $this->dropTable('{{%share}}');
    }
}