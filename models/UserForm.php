<?php
namespace app\models;
/**
 * 用户模型
 */
use app\models\User;
use yii\base\Model;
class UserForm extends Model{
    public $email;
    public $password;
    public $repassword;
    public $nickname;
    public function rules()
    {
        return [
          ['email','required','message'=>'{attribute}不能为空'],
          ['email','email'],
          ['email', 'unique', 'targetClass' => '\app\models\User', 'message' => '该电子邮箱已经被占用.'],
          ['password','required','message'=>'{attribute}不能为空'],
          ['password', 'string', 'min' => 6,'max' => 16,'tooLong'=>'{attribute}不多于16位字符', 'tooShort'=>'{attribute}不少于6位字符'],
          ['repassword','compare','compareAttribute'=>'password','message'=>'两次密码不一致'],
          ['nickname', 'filter', 'filter' => 'trim'],
          ['nickname', 'required','message'=>'{attribute}不能为空'],
          ['nickname', 'string', 'min' => 4,'max'=>12,'tooLong'=>'{attribute}不多于12位字符', 'tooShort'=>'{attribute}不少于4位字符'],
          ['nickname', 'unique', 'targetClass' => '\app\models\User', 'message' => '该用户名已经被占用.'],
          ['nickname','match','pattern'=>'/^[a-zA-Z0-9_\x{4e00}-\x{9fa5}]/u','message'=>'{attribute}不符合规则'],
        ];
    }

    public function save()
    {
        if(!$this->validate())
        {
            return null;
        }
        $user = new User();
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->nickname = $this->nickname;
        $user->last_ip  = \Yii::$app->request->userIP;
        $user->generateAuthKey();
        return $user->save() ? $user : null;
    }

    public function attributeLabels()
    {
        return [
            'email'     => '邮箱',
            'password'  => '密码',
            'repassword'=> '确认密码',
            'nickname'  => '昵称'
        ];
    }
}