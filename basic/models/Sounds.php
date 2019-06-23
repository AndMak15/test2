<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sounds".
 *
 * @property int $id
 * @property string $title Назва пісні
 * @property string $author Автор пісні
 * @property double $length Довжина пісні
 * @property int $created_at Дата створення
 * @property int $updated_at Дата редагування
 * @property int $deleted_at Дата видалення
 */
class Sounds extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sounds';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['length'], 'number'],
            [['created_at', 'updated_at', 'deleted_at'], 'integer'],
            [['title', 'author'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Назва пісні',
            'author' => 'Автор пісні',
            'length' => 'Довжина пісні',
            'created_at' => 'Дата створення',
            'updated_at' => 'Дата редагування',
            'deleted_at' => 'Дата видалення',
        ];
    }
}
