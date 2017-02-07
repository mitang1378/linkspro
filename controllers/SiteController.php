<?php
namespace app\controllers;

use app\models\Cmenu;
use app\models\Upfiles;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\Tool;
use app\models\Url;
use app\models\UserForm;

class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
//            'verbs' => [
//                'class' => VerbFilter::className(),
//                'actions' => [
//                    'logout' => ['post'],
//                ],
//            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        if(Yii::$app->user->isGuest)
        {
            return $this->redirect('/site/login');
        }
        $mid = Yii::$app->user->getId();
        $bgimgs = Upfiles::find()->where(['mid'=>$mid,'status'=>1])->asArray()->one();
        $bgimg = empty($bgimgs)?'':$bgimgs['path'];
        $left_menu  = Cmenu::find()->with('urls')->where(['location'=>1,'mid'=>$mid])->asArray()->all();
        $right_menu = Cmenu::find()->with('urls')->where(['location'=>2,'mid'=>$mid])->asArray()->all();
        return $this->renderPartial('index',[
            'left_menu'=>$left_menu,
            'right_menu'=>$right_menu,
            'bgimg' =>$bgimg
        ]);
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goHome();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionRegister()
    {
        $model = new UserForm();
        if($model->load(Yii::$app->request->post()))
        {
            if ($member = $model->save()) {
                if(Yii::$app->getUser()->login($member)){
                    return $this->goHome();
                }
            }
        }
        return $this->render('register',['model'=>$model]);
    }

    /**
     * 新增模块
     */
    public function actionAddmodel($location)
    {
        $model = Cmenu::find()->where(['mid'=>Yii::$app->user->getId()])->all();

        return $this->renderPartial('addmodel',['model'=>$model,'location'=>$location]);
    }
    /**
     * 新增模块操作
     */
    public function actionPlusmodel($id,$location)
    {
        //$model = Cmenu::find()->one($id);
        if($location == 'left')
        {
            $model = Cmenu::updateAll(['location'=>1],['id'=>$id]);
        }else{
            $model = Cmenu::updateAll(['location'=>2],['id'=>$id]);
        }

        return $this->redirect('/site/addmodel?location='.$location);
    }

    /**
     * 移除模块
     */
    public function actionStopmodel($id)
    {
        $mid = Yii::$app->user->getId();
        $model = Cmenu::updateAll(['location'=>0],['id'=>$id,'mid'=>$mid]);

        return $this->goHome();
    }
}
