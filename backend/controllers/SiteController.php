<?php
namespace backend\controllers;

use backend\models\decorator\DarkRoast;
use backend\models\decorator\Espresso;
use backend\models\decorator\HouseBlend;
use backend\models\decorator\Mocha;
use backend\models\decorator\Soy;
use backend\models\decorator\Whip;
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
        $weatherData->setMeasurements(80, 65, 30.4);
        $currentDisplay = new CurrentConditionsDisplay($weatherData);

        $currentDisplay = new CurrentConditionsDisplay($weatherData);
        $statisticsDisplay = new StatisticsDisplay($weatherData);
        $forecastDisplay = new ForecastDisplay($weatherData);

        $weatherData->setMeasurements(80, 65, 30.4);
        $weatherData->setMeasurements(82, 70, 29.2);
        $weatherData->setMeasurements(78, 90, 29.2);

        $ret = $currentDisplay->update(80, 65, 30.2);

        $ret .= '<br>'.'WhetherStation '.'<br>'
            .'WeatherData - черный ящик-получить обновленную информацию'.'<br>'
            .'Views - 3 основных элементов: 1)текущего состояния'.'<br>'
            ." (1.1-температура, 1.2-влажность и 1.3-давление), 2)статистики и 3)прогноза".'<br>'
            ;
        return $ret;
    }
    public function actionDecorator () {
        $beverage = new Espresso();
        $beverage2 = new DarkRoast();
        $beverage2 = new Mocha($beverage2);
        $beverage2 = new Mocha($beverage2);
        $beverage2 = new Whip($beverage2);
        $beverage3 = new HouseBlend();
        $beverage3 = new Soy($beverage3);
        $beverage3 = new Mocha($beverage3);
        $beverage3 = new Whip($beverage3);
        $ret = $beverage->getDescription() . ' $' . $beverage->cost().'<br>';
        $ret .= $beverage2->getDescription() . ' $' . $beverage2->cost().'<br>';
        $ret .= $beverage3->getDescription() . ' $' . $beverage3->cost().'<br>';
        return 'decorator: '.'<br>'.$ret;
    }
    public function actionFactory () {
        return 'Factory';
    }
     public function actionSingleton () {
        return 'Singleton';
    }
     public function actionAdapter () {
        return 'Adapter';
    }
     public function actionFasad () {
        return 'Fasad';
    }
     public function actionPatternmethod () {
        return 'PatternMethod';
    }
     public function actionIterator () {
        return 'Iterator';
    }
     public function actionComponent () {
        return 'Component';
    }
     public function actionState () {
        return 'State';
    }
     public function actionProxy () {
        return 'Proxy';
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
                        'actions' => ['logout', 'index','strategy','observer','decorator',
                            'factory','singleton','adapter','pattern05','fasad','patternmethod',
                            'iterator','component','state','proxy','pattern04','pattern05',
                            ],
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
