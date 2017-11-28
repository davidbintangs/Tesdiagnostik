<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bahasa".
 *
 * @property integer $id
 * @property string $bahasa
 * @property string $tingkat
 * @property integer $identitas
 *
 * @property Identitas $identitas0
 */
class Bahasa extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bahasa';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['identitas'], 'integer'],
            [['bahasa', 'tingkat'], 'string', 'max' => 50],
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
            'bahasa' => 'Bahasa',
            'tingkat' => 'Tingkat',
            'identitas' => 'Identitas',
        ];
    }
    public function getPilBahasa($id)
     {
        
        $pilBahasa=Yii::$app->db->createCommand('SELECT * FROM bahasa WHERE identitas= '.$id)
            ->queryAll();

        return $pilBahasa;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdentitas0()
    {
        return $this->hasOne(Identitas::className(), ['id' => 'identitas']);
    }
}
