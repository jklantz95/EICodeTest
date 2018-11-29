<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\Response;
use app\models\RequestInfo;
use app\models\processLog;

class SiteController extends Controller
{


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
            return $this->redirect(['index']);
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

    /**
     * Displays specific info of a given location
     *
     * @return Response|string
     */
    public function actionLocationinfo($location)
    {
        $model = new requestInfo();
        $hits = $model->locationHitInfo($location);

        return $this->render('locationinfo', [
            'hits' => $hits,
        ]);
    }

    /**
     * Displays specific info of a given ip
     *
     * @return Response|string
     */
    public function actionIpinfo($ip)
    {
        $model = new requestInfo();

        return $this->render('ipinfo', [
        ]);
    }



}
