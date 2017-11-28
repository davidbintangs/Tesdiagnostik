<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "identitas_mengerjakan_proyek".
 *
 * @property integer $id
 * @property integer $identitas
 * @property integer $proyek
 * @property string $jobdesk
 * @property string $status
 * @property string $feedback
 * @property integer $rating_pekerja
 * @property string $dana
 * @property integer $waktu
 *
 * @property Identitas $identitas0
 * @property Proyek $proyek0
 */
class IdentitasMengerjakanProyek extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'identitas_mengerjakan_proyek';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['identitas', 'proyek', 'rating_pekerja'], 'integer'],
            [['feedback'], 'string'],
            //[['waktu'],'save'],
            [['jobdesk'], 'string', 'max' => 255],
            [['status', 'dana','waktu'], 'string', 'max' => 50],
            [['identitas'], 'exist', 'skipOnError' => true, 'targetClass' => Identitas::className(), 'targetAttribute' => ['identitas' => 'id']],
            [['proyek'], 'exist', 'skipOnError' => true, 'targetClass' => Proyek::className(), 'targetAttribute' => ['proyek' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'identitas' => 'Identitas',
            'proyek' => 'Proyek',
            'jobdesk' => 'jobdesk',
            'status' => 'Status',
            'feedback' => 'Feedback',
            'rating_pekerja' => 'Rating Pekerja',
            'dana' => 'Dana',
            'waktu' => 'deadline',
        ];
    }

    public function getMengerjakan($identiti)
    {
       
        $data=Yii::$app->db->createCommand('SELECT * FROM identitas_mengerjakan_proyek WHERE identitas_mengerjakan_proyek.proyek =' .$identiti)
            ->queryOne();


        return $data;
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
    public function getProyek0()
    {
        return $this->hasOne(Proyek::className(), ['id' => 'proyek']);
    }

    public function getDataByProyek($id)
    {
        
        $proyek=Yii::$app->db->createCommand('SELECT * FROM identitas_mengerjakan_proyek INNER JOIN proyek ON identitas_mengerjakan_proyek.proyek = proyek.id WHERE identitas_mengerjakan_proyek.proyek =' .$id)
        ->queryOne();


        return $proyek;
    }
    
}
