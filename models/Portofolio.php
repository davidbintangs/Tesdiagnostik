<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "portofolio".
 *
 * @property integer $id
 * @property string $tanggal
 * @property string $judul
 * @property string $url
 * @property resource $gambar
 * @property string $lampiran
 * @property string $keterangan
 * @property integer $identitas
 *
 * @property Identitas $identitas0
 */
class Portofolio extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $file_foto;
    public $file_lampiran;

    public static function tableName()
    {
        return 'portofolio';
    }

    /**
     * @inheritdoc
     */ 
    public function rules()
    {
        return [
            [['tanggal'], 'safe'],
            [['keterangan'], 'string'],
            [['identitas'], 'integer'],
            [['gambar','judul', 'url', 'lampiran'], 'string', 'max' => 50],
            [['identitas'], 'exist', 'skipOnError' => true, 'targetClass' => Identitas::className(), 'targetAttribute' => ['identitas' => 'id']],
            [['file_foto'], 'file', 'skipOnEmpty' => false],
            [['file_lampiran'], 'file', 'skipOnEmpty' => false],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tanggal' => 'Tanggal',
            'judul' => 'Judul',
            'url' => 'Url',
            'gambar' => 'Gambar',
            'lampiran' => 'Lampiran',
            'keterangan' => 'Keterangan',
            'identitas' => 'Identitas',
        ];
    }
    public function getPilPortofolio($id)
     {
        
        $pilPortofolio=Yii::$app->db->createCommand('SELECT * FROM portofolio WHERE identitas= '.$id)
            ->queryAll();

        return $pilPortofolio;
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdentitas0()
    {
        return $this->hasOne(Identitas::className(), ['id' => 'identitas']);
    }
}
