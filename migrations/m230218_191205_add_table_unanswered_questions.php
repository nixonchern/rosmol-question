<?php

use yii\db\Migration;

/**
 * Class m230218_191205_add_table_unanswered_questions
 */
class m230218_191205_add_table_unanswered_questions extends Migration
{
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->createTable('unanswered_questions', [
            'id' => $this->primaryKey(),
            'question' => $this->text()->notNull(),
        ]);
    }

    public function down()
    {
        $this->dropTable('unanswered_questions');
        return false;
    }
}
