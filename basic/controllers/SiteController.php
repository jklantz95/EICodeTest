<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\RequestInfo;
use app\models\processLog;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
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
     * {@inheritdoc}
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
     * Displays log Helper page.
     *
     * @return string
     */
    public function actionLoghelper()
    {
        $model = new processLog();

        if ($model->load(Yii::$app->request->post())) {
            $model->process(Yii::$app->request->post("processLog")['filename']);
            return $this->refresh();
        }
        else{
            return $this->render('loghelper', [
                'model' => $model,
            ]);
        }

    }

    /**
     * Displays Hits on Homepage
     *
     * @return Response|string
     */
    public function actionIndex()
    {

        $model = new requestInfo();

        return $this->render('index', [
            'model' => $model,
        ]);
    }
}
