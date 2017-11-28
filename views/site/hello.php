<?php

use \yii\helpers\Url;
use \yii\helpers\Html;
//URL untuk ke Home atau web index
echo Url::home();
//URL ke current controller
echo Url::to();
//URL ke current controller pada action create
echo Url::to(['create']);
//URL ke person controller pada action index
echo Url::to(['person/index']);
//URL ke current controller pada action index degan nama =david

echo Url::to(['person/index','nama'=>'David bintang s']);

echo "Hello Yii aku mau belajar kamu <br/>";
echo $nama;
?>
<a href="<?= Url::to(['person/index'])?>">data person</a>
<?php

echo Html::a('Data Pegawai',['pegawai/index']);
