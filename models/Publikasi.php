<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "publikasi".
 *
 * @property integer $id
 * @property string $judul
 * @property string $penerbit
 * @property string $keterangan
 * @property string $url
 * @property integer $identitas
 *
 * @property Identitas $identitas0
 */
class Publikasi extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'publikasi';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['identitas'], 'integer'],
            [['judul', 'penerbit', 'url'], 'string', 'max' => 50],
            [['keterangan'], 'string', 'max' => 255],
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
            'judul' => 'Judul',
            'penerbit' => 'Penerbit',
            'keterangan' => 'Keterangan',
            'url' => 'Url',
            'identitas' => 'Identitas',
        ];
    }
    public function getPilPublikasi($id)
     {
        
        $pilPublikasi=Yii::$app->db->createCommand('SELECT * FROM publikasi WHERE identitas= '.$id)
            ->queryAll();

        return $pilPublikasi;
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdentitas0()
    {
        return $this->hasOne(Identitas::className(), ['id' => 'identitas']);
    }
}
