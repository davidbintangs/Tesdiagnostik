<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "keahlian_identitas".
 *
 * @property integer $id
 * @property integer $keahlian
 * @property integer $identitas
 * @property integer $tingkat
 *
 * @property Identitas $identitas0
 * @property Keahlian $keahlian0
 */
    

class KeahlianIdentitas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $pilKeahlian;
    public static function tableName()
    {
        return 'keahlian_identitas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['keahlian', 'identitas', 'tingkat'], 'integer'],
            [['identitas'], 'exist', 'skipOnError' => true, 'targetClass' => Identitas::className(), 'targetAttribute' => ['identitas' => 'id']],
            [['keahlian'], 'exist', 'skipOnError' => true, 'targetClass' => Keahlian::className(), 'targetAttribute' => ['keahlian' => 'id']],
            [['pilKeahlian'],'each', 'rule' => ['integer']]
        ];
    }

    /**
     * @inheritdoc
     */



    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'keahlian' => 'Keahlian',
            'identitas' => '',
            'tingkat' => 'Tingkat',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdentitas0()
    {
        return $this->hasOne(Identitas::className(), ['id' => 'identitas']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKeahlian0()
    {
        return $this->hasOne(Keahlian::className(), ['id' => 'keahlian']);
    }
}
