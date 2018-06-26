<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tb_my_artics".
 *
 * @property int $id
 * @property int $days 目前连续签到多少天
 * @property int $date 日期
 * @property int $user_id 用户id
 * @property int $created_at
 * @property int $updated_at
 *
 * @property Auth $user
 */
class MyArtics extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tb_my_artics';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['days', 'date', 'user_id', 'created_at', 'updated_at'], 'integer'],
            [['created_at', 'updated_at'], 'required'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => Auth::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'days' => '目前连续签到多少天',
            'date' => '日期',
            'user_id' => '用户id',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(Auth::className(), ['id' => 'user_id']);
    }

    /**
     * {@inheritdoc}
     * @return TbMyArticsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TbMyArticsQuery(get_called_class());
    }
}
