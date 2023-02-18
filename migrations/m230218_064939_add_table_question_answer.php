<?php

use yii\db\Migration;

/**
 * Class m230218_064939_add_table_question_answer
 */
class m230218_064939_add_table_question_answer extends Migration
{
    
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->createTable('question_answer', [
            'id' => $this->primaryKey(),
            'question' => $this->text()->notNull(),
            'answer' => $this->text()->notNull(),
        ]);
    }

    public function down()
    {
        $this->dropTable('news');
        return false;
    }
}
