<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "proyek".
 *
 * @property integer $id
 * @property string $judul
 * @property string $gambar
 * @property string $keterangan
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $status
 * @property string $deadline
 * @property integer $rating_proyek
 * @property string $konfirmasi_pekerjaan
 * @property integer $kategori_budget
 * @property integer $identitas
 *
 * @property IdentitasMenawarProyek[] $identitasMenawarProyeks
 * @property IdentitasMengerjakanProyek[] $identitasMengerjakanProyeks
 * @property KeahlianProyek[] $keahlianProyeks
 * @property Identitas $identitas0
 * @property KategoriBudget $kategoriBudget
 */
class Proyek extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'proyek';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['keterangan'], 'string'],
            [['rating_proyek', 'kategori_budget', 'identitas','tawaran'], 'integer'],
            [['deadline'], 'safe'],
            [['identitas','judul','keterangan','deadline','kategori_budget'], 'required'],
            [['created_at', 'updated_at', 'judul', 'status'], 'string', 'max' => 50],
            [['gambar'], 'safe'],
            [['gambar'], 'file','on' => 'update','skipOnEmpty' => true,'extensions'=>'jpg, png'],
            [['konfirmasi_pekerjaan'], 'string', 'max' => 20],
            [['identitas'], 'exist', 'skipOnError' => true, 'targetClass' => Identitas::className(), 'targetAttribute' => ['identitas' => 'id']],
            [['kategori_budget'], 'exist', 'skipOnError' => true, 'targetClass' => KategoriBudget::className(), 'targetAttribute' => ['kategori_budget' => 'id']],
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
            'gambar' => 'Gambar',
            'keterangan' => 'Keterangan',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'status' => 'Status',
            'deadline' => 'Deadline',
            'rating_proyek' => 'Rating Proyek',
            'konfirmasi_pekerjaan' => 'Konfirmasi Pekerjaan',
            'kategori_budget' => 'Dana',
            'identitas' => 'Identitas',
            'tawaran'=>'tawaran',
        ];
    }
       public function getPilProyek($id){
        
        $pilProyek=Yii::$app->db->createCommand('SELECT * FROM proyek WHERE identitas= '.$id)
            ->queryAll();

        return $pilProyek;
    }
    public function getProyekDikerjakan($id){
        
        $pilProyek=Yii::$app->db->createCommand('SELECT * FROM identitas_mengerjakan_proyek WHERE proyek= '.$id)
            ->queryOne();

        return $pilProyek;
    }
    

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdentitasMenawarProyeks()
    {
        return $this->hasMany(IdentitasMenawarProyek::className(), ['proyek' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdentitasMengerjakanProyeks()
    {
        return $this->hasMany(IdentitasMengerjakanProyek::className(), ['proyek' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKeahlianProyeks()
    {
        return $this->hasMany(KeahlianProyek::className(), ['proyek' => 'id']);
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
    public function getKategoriBudget()
    {
        return $this->hasOne(KategoriBudget::className(), ['id' => 'kategori_budget']);
    }
}
