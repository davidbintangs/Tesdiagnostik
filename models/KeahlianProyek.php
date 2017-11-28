<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "keahlian_proyek".
 *
 * @property integer $id
 * @property integer $proyek
 * @property integer $keahlian
 *
 * @property Keahlian $keahlian0
 * @property Proyek $proyek0
 */
class KeahlianProyek extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
     public $pilKeahlian;
    public static function tableName()
    {
        return 'keahlian_proyek';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['proyek', 'keahlian'], 'integer'],
            [['keahlian'], 'exist', 'skipOnError' => true, 'targetClass' => Keahlian::className(), 'targetAttribute' => ['keahlian' => 'id']],
            [['proyek'], 'exist', 'skipOnError' => true, 'targetClass' => Proyek::className(), 'targetAttribute' => ['proyek' => 'id']],
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
            'proyek' => 'Proyek',
            'keahlian' => 'Keahlian',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKeahlian0()
    {
        return $this->hasOne(Keahlian::className(), ['id' => 'keahlian']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProyek0()
    {
        return $this->hasOne(Proyek::className(), ['id' => 'proyek']);
    }
}
