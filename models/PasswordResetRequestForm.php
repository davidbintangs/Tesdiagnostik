<?php
namespace app\models;

use Yii;
use yii\base\Model;
use common\models\Member;

/**
 * Password reset request form
 */
class PasswordResetRequestForm extends Model
{
    public $email;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'exist',
                'targetClass' => 'app\models\member',
                'filter' => ['status' => Member::STATUS_ACTIVE],
                'message' => 'There is no member with this email address.'
            ],
        ];
    }

    /**
     * Sends an email with a link, for resetting the password.
     *
     * @return bool whether the email was send
     */
    public function sendEmail()
    {
        /* @var $user User */
        $member = Member::findOne([
            'status' => Member::STATUS_ACTIVE,
            'email' => $this->email,
        ]);

        if (!$member) {
            return false;
        }
        
        if (!Member::isPasswordResetTokenValid($member->password_reset_token)) {
            $member->generatePasswordResetToken();
            if (!$member->save()) {
                return false;
            }
        }

        return Yii::$app
            ->mailer
            ->compose(
                ['html' => 'passwordResetToken-html', 'text' => 'passwordResetToken-text'],
                ['member' => $member]
            )
            ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name . ' robot'])
            ->setTo($this->email)
            ->setSubject('Password reset for ' . Yii::$app->name)
            ->send();
    }
}
