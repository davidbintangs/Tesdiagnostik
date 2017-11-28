<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "kota".
 *
 * @property integer $id
 * @property string $kota
 * @property integer $kecamatan
 *
 * @property Kecamatan $kecamatan0
 * @property Provinsi[] $provinsis
 */
class Kota extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'kota';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kecamatan'], 'integer'],
            [['kota'], 'string', 'max' => 50],
            [['kecamatan'], 'exist', 'skipOnError' => true, 'targetClass' => Kecamatan::className(), 'targetAttribute' => ['kecamatan' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'kota' => 'Kota',
            'kecamatan' => 'Kecamatan',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKecamatan0()
    {
        return $this->hasOne(Kecamatan::className(), ['id' => 'kecamatan']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProvinsis()
    {
        return $this->hasMany(Provinsi::className(), ['kota' => 'id']);
    }
}
