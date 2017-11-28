<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "provinsi".
 *
 * @property integer $id
 * @property string $provinsi
 * @property integer $kota
 *
 * @property Kota $kota0
 */
class Provinsi extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'provinsi';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id', 'kota'], 'integer'],
            [['provinsi'], 'string', 'max' => 50],
            [['kota'], 'exist', 'skipOnError' => true, 'targetClass' => Kota::className(), 'targetAttribute' => ['kota' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'provinsi' => 'Provinsi',
            'kota' => 'Kota',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKota0()
    {
        return $this->hasOne(Kota::className(), ['id' => 'kota']);
    }
}
