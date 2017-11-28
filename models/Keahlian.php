<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "keahlian".
 *
 * @property integer $id
 * @property string $nama_keahlian
 * @property integer $Jenis_keahlian
 * @property integer $total_proyek
 *
 * @property JenisKeahlian $jenisKeahlian
 * @property KeahlianIdentitas[] $keahlianIdentitas
 * @property KeahlianProyek[] $keahlianProyeks
 */
class Keahlian extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'keahlian';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Jenis_keahlian', 'total_proyek'], 'integer'],
            [['nama_keahlian'], 'string', 'max' => 50],
            [['Jenis_keahlian'], 'exist', 'skipOnError' => true, 'targetClass' => JenisKeahlian::className(), 'targetAttribute' => ['Jenis_keahlian' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama_keahlian' => 'Nama Keahlian',
            'Jenis_keahlian' => 'Jenis Keahlian',
            'total_proyek' => 'Total Proyek',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPilKeahlian($id){
        $pilKeahlian=Yii::$app->db->createCommand('SELECT keahlian.nama_keahlian,keahlian_identitas.id FROM keahlian_identitas INNER JOIN identitas ON keahlian_identitas.identitas = identitas.id INNER JOIN keahlian ON keahlian_identitas.keahlian = keahlian.id
            WHERE keahlian_identitas.identitas ='.$id)
        ->queryAll();

        return $pilKeahlian;

    }

    public function getkeahlian($id){
        $pilKeahlian=Yii::$app->db->createCommand('SELECT keahlian.nama_keahlian,keahlian_identitas.id FROM keahlian_identitas INNER JOIN identitas ON keahlian_identitas.identitas = identitas.id INNER JOIN keahlian ON keahlian_identitas.keahlian = keahlian.id
            WHERE keahlian_identitas.identitas ='.$id)
        ->queryAll();

        return $pilKeahlian['id'];

    }
        public function getPilKeahlianProyek($id){
        $pilKeahlian=Yii::$app->db->createCommand('SELECT keahlian.nama_keahlian FROM keahlian INNER JOIN keahlian_proyek ON keahlian_proyek.keahlian = keahlian.id INNER JOIN proyek ON keahlian_proyek.proyek = proyek.id WHERE proyek.id ='.$id)
        ->queryAll();

        return $pilKeahlian;

    }

    public function getJenisKeahlian()
    {
        return $this->hasOne(JenisKeahlian::className(), ['id' => 'Jenis_keahlian']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKeahlianIdentitas()
    {
        return $this->hasMany(KeahlianIdentitas::className(), ['keahlian' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKeahlianProyeks()
    {
        return $this->hasMany(KeahlianProyek::className(), ['keahlian' => 'id']);
    }
}
