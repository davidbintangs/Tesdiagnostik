<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "kecamatan".
 *
 * @property integer $id_kecamatan
 * @property string $nama_kecamatan
 * @property integer $id_kabupaten
 */
class Kecamatan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'kecamatan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_kecamatan', 'id_kabupaten'], 'required'],
            [['id_kecamatan', 'id_kabupaten'], 'integer'],
            [['nama_kecamatan'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_kecamatan' => 'Id Kecamatan',
            'nama_kecamatan' => 'Nama Kecamatan',
            'id_kabupaten' => 'Id Kabupaten',
        ];
    }
}
