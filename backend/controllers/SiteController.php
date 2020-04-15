<?php
namespace backend\controllers;

use backend\models\observer\CurrentConditionsDisplay;
use backend\models\observer\ForecastDisplay;
use backend\models\observer\StatisticsDisplay;
use backend\models\observer\WeatherData;
use backend\models\strategy\DuckDecoy;
use backend\models\strategy\DuckMallard;
use backend\models\strategy\DuckModel;
use backend\models\strategy\DuckRedhat;
use backend\models\strategy\DuckRubber;
use backend\models\strategy\FlyRoketPowered;
use Yii;
use yii\helpers\VarDumper;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;

class SiteController extends Controller {
    public function actionStrategy () {
        $ducks = [
            new DuckMallard(),
            new DuckRedhat(),
            new DuckRubber(),
            new DuckDecoy(),
            new DuckModel(),
        ];
        $ducks[4]->setFlyBehavior(new FlyRoketPowered);
        $ret = '';
        foreach ($ducks as $k=>$d) {
            $ret .= ($k+1).') '
                .$d->display().'<br>'
                .$d->behaviorQuack->quack().'<br>'
                .$d->swim().'<br>'
                .$d->behaviorFly->fly().'<br>'
                .'<hr>';
        }
        return $ret;
    }
    public function actionObserver () {
        $weatherData = new WeatherData();
        $currentDisplay = new CurrentConditionsDisplay($weatherData);
        $statisticsDisplay = new StatisticsDisplay($weatherData);
        $forecastDisplay = new ForecastDisplay($weatherData);

        $weatherData->setMeasurements(80, 65, 30.4);
//        VarDumper::dump($weatherData,9,true);
        $weatherData->setMeasurements(82, 70, 29.2);
        $weatherData->setMeasurements(78, 90, 29.2);

        $ret = 'WhetherStation '.'<br>'
            .'WeatherData - черный ящик-получить обновленную информацию'.'<br>'
            .'Views - 3 основных элементов: 1)текущего состояния'.'<br>'
            ." (1.1-температура, 1.2-влажность и 1.3-давление), 2)статистики и 3)прогноза".'<br>'
            ;
        return $ret;
    }

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index','strategy','observer','pattern03','pattern04','pattern05'],
                        'allow' => true,
                        'roles' => ['?'],//@
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
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
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
            return $this->goBack();
        } else {
            $model->password = '';

            return $this->render('login', [
                'model' => $model,
            ]);
        }
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
}
