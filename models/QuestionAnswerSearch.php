<?php

namespace app\models;

use app\models\gii\QuestionAnswer;
use Yii;
use yii\data\ActiveDataProvider;

/**
 * This is the model class for table "question_answer".
 *
 * @property int $id
 * @property string $question
 * @property string $answer
 */
class QuestionAnswerSearch extends \yii\db\ActiveRecord
{
    public $id;
    public $question;
    public $answer;

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
            [['id', 'question', 'answer'], 'string'],
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

    /**
     * {@inheritdoc}
     */
    public static function search($params = null)
    {
        $query = QuestionAnswer::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 100,
            ],
            'sort' => [
                'defaultOrder' => [
                    'id' => SORT_ASC,
                ]
            ],
        ]);

        return $dataProvider;
    }
}
