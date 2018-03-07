<?php

use yii\db\Migration;

class m180307_155340_create_table_product_gallery extends Migration
{
    public function safeUp() {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%product_gallery}}', [
            'id' => $this->primaryKey(),
            'product_id' => $this->integer()->notNull(),
            'gallery' => $this->integer()->notNull(),
        ], $tableOptions);

        $this->addForeignKey("{product_gallery}_product_id_fkey", '{{%product_gallery}}', 'product_id', '{{%product}}', 'id', 'CASCADE', 'CASCADE');
    }

    public function safeDown() {
        $this->dropForeignKey('{product_gallery}_product_id_fkey', '{{%product_gallery}}');

        $this->dropTable('{{%product_gallery}}');
    }
}
