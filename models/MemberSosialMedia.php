<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "member_sosial_media".
 *
 * @property string $sosial_media
 * @property string $id
 * @property string $username
 * @property integer $member_id
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property Identitas[] $identitas
 */
class MemberSosialMedia extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'member_sosial_media';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sosial_media', 'id', 'username', 'member_id', 'created_at', 'updated_at'], 'required'],
            [['sosial_media'], 'string'],
            [['member_id', 'created_at', 'updated_at'], 'integer'],
            [['id', 'username'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'sosial_media' => 'Sosial Media',
            'id' => 'ID',
            'username' => 'Username',
            'member_id' => 'Member ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdentitas()
    {
        return $this->hasMany(Identitas::className(), ['member_sosial_media' => 'member_id']);
    }
}
