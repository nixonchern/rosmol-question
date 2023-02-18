<?php

namespace app\models\gii;

use Yii;

/**
 * This is the model class for table "unanswered_questions".
 *
 * @property int $id
 * @property string $question
 */
class UnansweredQuestions extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'unanswered_questions';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['question'], 'required'],
            [['question'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'question' => 'Вопрос',
        ];
    }
}
