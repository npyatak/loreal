<?php

use yii\db\Migration;

class m180119_135335_create_table_question extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%question}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'image' => $this->string(255),
            'comment' => $this->text(),
        ], $tableOptions);

        $this->batchInsert('{{%question}}', ['id', 'title', 'image'], [
            [
                1, 
                'Выходишь ли ты из дома без макияжа?', 
                '',
            ],
            [
                2, 
                'Что такое стробинг?', 
                '',
            ],
            [
                3, 
                'Кто создал оттенки помад для коллаборации L’Oreal Paris x Balmain?', 
                '',
            ],
            [
                4, 
                'Что держит в руках эта девушка?', 
                '',
            ],
            [
                5, 
                'КАКОЙ ТВОЙ ДЕВИЗ ПО ЖИЗНИ?', 
                '',
            ],
            [
                6, 
                'Для чего эти предметы?', 
                '/images/qimg-6.png',
            ],
            [
                7, 
                'Контуринг с помощью румян и хайлайтера родом из 70х это:', 
                '/images/qimg-7.png',
            ],
            [
                8, 
                'Что бы ты взяла с собой на необитаемый остров?', 
                '',
            ],
        ]);
    }

    public function safeDown()
    {
        $this->dropTable('{{%question}}');
    }
}