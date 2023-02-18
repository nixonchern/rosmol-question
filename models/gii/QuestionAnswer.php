<?php

namespace app\models\gii;

use Yii;
use yii\helpers\ArrayHelper;
use app\models\NeuralNetwork;

/**
 * This is the model class for table "question_answer".
 *
 * @property int $id
 * @property string $question
 * @property string $answer
 */
class QuestionAnswer extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'question_answer';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['question', 'answer'], 'required'],
            [['question', 'answer'], 'string'],
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
            'answer' => 'Ответ',
        ];
    }

    public function afterSave($insert, $changedAttributes) {
        $questionAnswers = QuestionAnswer::find()->asArray()->all();
        $data = ArrayHelper::map($questionAnswers, 'question', 'answer');
        $NeuralNetwork = (new NeuralNetwork)->train($data);
    }

    public function afterDelete() {
        $questionAnswers = QuestionAnswer::find()->asArray()->all();
        $data = ArrayHelper::map($questionAnswers, 'question', 'answer');
        $NeuralNetwork = (new NeuralNetwork)->train($data);
    }
}
