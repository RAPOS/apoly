<?php

namespace app\controllers;

use app\models\LAbout;
use app\models\LActions;
use Yii;
use yii\captcha\CaptchaValidator;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\LArticles;
use app\models\LContacts;
use app\models\LGallery;
use app\models\LProductions;
use app\models\LProductionspage;
use app\models\LFeedback;
use app\models\LMainpage;

class SiteController extends Controller
{
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

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => null,
            ],
        ];
    }

    public function actionIndex()
    {
        $LMainpage = LMainpage::find()->where(['site' => 1])->one();
        $LProductions = LProductions::find()->limit(4)->all();
        
        return $this->render('index', [
            'model' => $LMainpage,
            'modelproductions' =>  $LProductions,
        ]);
    }

    public function actionProductions()
    {
        return $this->render('productions', ['model' => LProductions::find()->all()]);
    }

    public function actionActions($id = null)
    {
        if ($id) {
            $LActions = LActions::find()->where(['id' => $id])->one();
            return $this->render('articles_item', ['model' => $LActions]);
        }
        
        return $this->render('specials', ['model' => LActions::find()->all()]);
    }

    public function actionAbout()
    {
        return $this->render('about', ['model' => LAbout::find()->one()]);
    }

    public function actionGallery()
    {
		return $this->render('gallery', ['model' => LGallery::find()->all()]);
    }

    public function actionArticles($id = null)
    {
        if ($id) {
            $LArticles = LArticles::find()->where(['id' => $id])->one();
            return $this->render('articles_item', ['model' => $LArticles]);
        }

        $LArticles = LArticles::find()->orderBy('id DESC')->all();
        return $this->render('articles', ['model' => $LArticles]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionContacts()
    {
        $LContacts = LContacts::find()->where(['site' => 1])->one();
        $LFeedback = new LFeedback();

        if (Yii::$app->request->post()) {
            $validator = new CaptchaValidator();
            if (!$validator->validate($_POST['LFeedback']['verifyCode'])) {
                Yii::$app->getSession()->setFlash('captcha', 'false');
                return $this->redirect(['contacts']);
            }

            if ($LFeedback->load(Yii::$app->request->post()) && $LFeedback->validate()){
                $LFeedback->date = time();
                $LFeedback->ip = $_SERVER['REMOTE_ADDR'];
                if ($LFeedback->save()) {
                    Yii::$app->getSession()->setFlash('save', true);
                    return $this->redirect(['contacts']);
                }
            }
        }
        
        $captcha = null;
        if (Yii::$app->getSession()->has('captcha')) {
            if (Yii::$app->getSession()->getFlash('captcha')) {
                $captcha = true;
            } else {
                $captcha = false;
            }
        }

        $save = null;
        if (Yii::$app->getSession()->has('save')) {
            if (Yii::$app->getSession()->getFlash('save')) {
                $save = true;
            } else {
                $save = false;
            }
        }

        return $this->render('contacts', [
            'contacts' => $LContacts,
            'feedback' => $LFeedback,
            'captcha' => $captcha,
            'save' => $save,
        ]);
    }
}
