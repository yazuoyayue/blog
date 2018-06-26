<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tb_auth".
 *
 * @property int $id
 * @property int $days 目前连续签到多少天
 * @property int $date 日期
 * @property int $created_at
 * @property int $updated_at
 *
 * @property MyArtics[] $myArtics
 */
class Auth extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tb_auth';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['days', 'date', 'created_at', 'updated_at'], 'integer'],
            [['created_at', 'updated_at'], 'required'],
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
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMyArtics()
    {
        return $this->hasMany(MyArtics::className(), ['user_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return TbAuthQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TbAuthQuery(get_called_class());
    }
}
