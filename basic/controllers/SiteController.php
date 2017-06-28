<?php

namespace app\controllers;

use app\components\actions\DemoAction;
use app\components\MyComponent;
use app\models\Product;
use app\models\RegistrationForm;
use app\models\Test;
use Yii;
use yii\filters\AccessControl;
use yii\imagine\Image;
use yii\jui\DatePicker;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use yii\web\UploadedFile;

class SiteController extends Controller{

     //public $layout = 'custom';

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
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
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
            'demo' => [
                'class' => DemoAction::className(),
                'message' => 'Demo from siteController'
            ]
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex(){

        return $this->render('index');

    }

    public function actionTest(){

       /* $model = new Test();

        if(\Yii::$app->request->isPost){
            $model->content = UploadedFile::getInstance($model,'content');
            $model->content->
            //$file->saveAs('@webroot/images');
        }

        return $this->render('test',[
           'model' => $model
        ]);*/ // вывели форму с возможностью загрузки файлов в конце седьмого урока, но не доделали - также есть код во вьюхе тестовой закоменчен

        //Image::thumbnail('@webroot/images/test.JPG', 200, 100)
          //  ->save(\Yii::getAlias('@webroot/images/small/smallTest.JPG')); // - преобразование изображения

        //$cache = \Yii::$app->cache;
        //$cache->flush(); - очистка кеша, использовать один раз и комментить снова

        /*$key = 'number';

        if(!$number = $cache->get($key)){
            $number = rand();
            $cache->set($key, $number, 5);
        }
        echo $number;*/

        //$model = new Test();
        //$model->on(Test::EVENT_TEST, [new MyComponent(), 'calculate']);
        //$model->getData();

        //$component = new MyComponent();
        //$component->a = 3;
        //$component->b = 4;
        //$component->showMessage();
        /*return $this->render('test',[
            'model' => new Test()
        ]);*/



        /*
         $model = new Test();
          if($model->load(Yii::$app->request->post('Test'),'')){

           // echo "<pre>";var_dump($model);die();

        }

        $model = new Test([

            'title' => 'myTitle',
            'content' => 'Lesson 3',
            'date' => date('H:i:s')

        ]);

        return $this->render('test', [

            'model' => $model

        ]);*/

    }

     /**
      * @return string
      */
     public function actionRegistration(){

         $model = new RegistrationForm();
         if($model->load(Yii::$app->request->post()) && $model->registration()){
             return $this->redirect('/');
         }
         return $this->render('registration', [
             'model' => $model,
         ]);

     }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin(){

        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
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
    public function actionLogout(){

        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return string
     */
    public function actionContact(){

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
    public function actionAbout(){

        return $this->render('about');
    }

    public function actionAdmin(){

        $this->redirect('?r=product/adminindex');

    }
 }
