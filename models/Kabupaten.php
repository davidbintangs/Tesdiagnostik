<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "kabupaten".
 *
 * @property integer $id_kabupaten
 * @property string $nama_kabupaten
 * @property integer $id_provinsi
 */
class Kabupaten extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'kabupaten';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_kabupaten', 'id_provinsi'], 'required'],
            [['id_kabupaten', 'id_provinsi'], 'integer'],
            [['nama_kabupaten'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_kabupaten' => 'Id Kabupaten',
            'nama_kabupaten' => 'Nama Kabupaten',
            'id_provinsi' => 'Id Provinsi',
        ];
    }
}
