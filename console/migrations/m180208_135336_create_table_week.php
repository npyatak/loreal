<?php

use yii\db\Migration;

class m180208_135336_create_table_week extends Migration
{
    public function safeUp() {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%week}}', [
            'id' => $this->primaryKey(),
            'number' => $this->integer()->notNull()->unique(),
            'name' => $this->string(100)->notNull(),
            'image' => $this->string(),
            'description_1' => $this->text(),
            'description_2' => $this->text(),
            //'status' => $this->integer(1)->notNull()->defaultValue(1),
            
            'date_start' => $this->integer()->notNull(),
            'date_end' => $this->integer()->notNull(),
        ], $tableOptions);

        $this->batchInsert('{{%week}}', ['number', 'name', 'image', 'description_1', 'description_2', 'date_start', 'date_end'], [
            [1, 'foodporn', '', '<p>С 15 по 22 сентября</p>', '<p>С 15 по 22 сентября 2</p>', strtotime('today midnight'), strtotime('today midnight + 1 week')],
            [2, 'beauty', '', '<p>С 23 по 30 сентября</p>', '<p>С 23 по 30 сентября 2</p>', strtotime('today midnight + 1 week'), strtotime('today midnight + 2 week')],
            [3, 'wellness', '', '<p>С 1 по 8 октября</p>', '<p>С 1 по 8 октября 2</p>', strtotime('today midnight + 2 week'), strtotime('today midnight + 3 week')],
            [4, 'moms&kids', '', '<p>С 9 по 16 октября</p>', '<p>С 9 по 16 октября 2</p>', strtotime('today midnight + 3 week'), strtotime('today midnight + 4 week')],
        ]);
    }

    public function safeDown() {

        $this->dropTable('{{%week}}');
    }
}
