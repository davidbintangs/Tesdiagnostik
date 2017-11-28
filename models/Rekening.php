<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "rekening".
 *
 * @property integer $id
 * @property string $nama_bank
 * @property string $no_rekening
 * @property integer $identitas
 *
 * @property Identitas $identitas0
 */
class Rekening extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'rekening';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['identitas'], 'integer'],
            [['nama_bank', 'no_rekening'], 'string', 'max' => 50],
            [['identitas'], 'exist', 'skipOnError' => true, 'targetClass' => Identitas::className(), 'targetAttribute' => ['identitas' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama_bank' => 'Nama Bank',
            'no_rekening' => 'No Rekening',
            'identitas' => 'Identitas',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdentitas0()
    {
        return $this->hasOne(Identitas::className(), ['id' => 'identitas']);
    }
}
