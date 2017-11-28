<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "jenis_keahlian".
 *
 * @property integer $id
 * @property string $nama_kategori
 *
 * @property Keahlian[] $keahlians
 */
class JenisKeahlian extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'jenis_keahlian';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama_kategori'], 'string', 'max' => 50],
            [['nama_kategori'], 'required'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama_kategori' => 'Nama Kategori',
        ];
    }

    public function getAll()
    {

        $keahlian=Yii::$app->db->createCommand('SELECT * FROM jenis_keahlian')
            ->queryAll();

        return $keahlian;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKeahlians()
    {
        return $this->hasMany(Keahlian::className(), ['Jenis_keahlian' => 'id']);
    }
}
