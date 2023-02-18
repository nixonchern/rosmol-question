<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%chats}}`.
 */
class m230218_195145_create_chats_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%chats}}', [
            'id' => $this->primaryKey(),
            'idChat' => $this->integer(),
            'type' => $this->integer(),
            'title' => $this->text(),
            'dateCreate' => $this->dateTime(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%chats}}');
    }
}
