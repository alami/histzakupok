<?php
namespace backend\controllers;

use backend\models\decorator\DarkRoast;
use backend\models\decorator\Espresso;
use backend\models\decorator\HouseBlend;
use backend\models\decorator\Mocha;
use backend\models\decorator\Soy;
use backend\models\decorator\Whip;
use backend\models\factory\ChicagoPizzaStore;
use backend\models\factory\NYPizzaStore;
use backend\models\factory\PizzaStore;
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
        $patterntitle = 'Strategy';$patterncomment = $ret; $ret='';
        return $this->render('pattern', compact(['patterntitle','patterncomment','ret']) );
    }
    //--------------------------------------------------------------
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
        $patterntitle = 'Observer';
        $patterncomment = '<br>'.'WhetherStation '.'<br>'
            .'WeatherData - черный ящик-получить обновленную информацию'.'<br>'
            .'Views - 3 основных элементов: 1)текущего состояния'.'<br>'
            ." (1.1-температура, 1.2-влажность и 1.3-давление), 2)статистики и 3)прогноза".'<br>'
            .'<hr>В демо вместо display() исп-лась update()'
        ;
        return $this->render('pattern', compact(['patterntitle','patterncomment','ret']) );
    }
//---------------------------------------------------------
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
        $patterntitle = 'decorator: '.'<br>';
        $patterncomment = '<hr>В конструкторы всех "добавок" как и в "типах кофе" надо вставить'
            .'<br>$this->description = "Mocha";';
        return $this->render('pattern', compact(['patterntitle','patterncomment','ret']) );
    }
//-------------------------------------------------------------
    public function actionFactory () {
        $nyStore = new NYPizzaStore(); //PizzaStore
        $r = $nyStore->orderPizza("cheese");
        $ret = $r->prepare();
        $chicagoStore = new ChicagoPizzaStore(); //PizzaStore
        $ret .= '<hr>';
        $r = $chicagoStore->orderPizza("cheese");
        $ret .= $r->prepare();
        $patterntitle = 'Factory';
        $patterncomment = '145 - SimplePizzaFactory - via IF<br>'
        .'165 - Factory Method - <br>'
        .'175 - DI - <br>'
        .'189 - Abstract Method <br>';
        return $this->render('pattern', compact(['patterntitle','patterncomment','ret']) );
    }
     public function actionSingleton () {
         $ret='';$patterntitle = 'Singleton';$patterncomment = '';
         return $this->render('pattern', compact(['patterntitle','patterncomment','ret']) );
    }
     public function actionAdapter () {
         $ret='';$patterntitle = 'Adapter';$patterncomment = '';
         return $this->render('pattern', compact(['patterntitle','patterncomment','ret']) );
    }
     public function actionFasad () {
         $ret='';$patterntitle = 'Fasad';$patterncomment = '';
         return $this->render('pattern', compact(['patterntitle','patterncomment','ret']) );
    }
     public function actionPatternmethod () {
         $ret='';$patterntitle = 'PatternMethod';$patterncomment = '';
         return $this->render('pattern', compact(['patterntitle','patterncomment','ret']) );
    }
     public function actionIterator () {
         $ret='';$patterntitle = 'Iterator';$patterncomment = '';
         return $this->render('pattern', compact(['patterntitle','patterncomment','ret']) );
    }
     public function actionComponent () {
         $ret='';$patterntitle = 'Component';$patterncomment = '';
         return $this->render('pattern', compact(['patterntitle','patterncomment','ret']) );
    }
     public function actionState () {
         $ret='';$patterntitle = 'State';$patterncomment = '';
         return $this->render('pattern', compact(['patterntitle','patterncomment','ret']) );
    }
     public function actionProxy () {
         $ret='';$patterntitle = 'Proxy';$patterncomment = '';
         return $this->render('pattern', compact(['patterntitle','patterncomment','ret']) );
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
