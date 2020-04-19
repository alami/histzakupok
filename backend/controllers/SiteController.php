<?php
namespace backend\controllers;

use backend\models\adapter\Duck;
use backend\models\adapter\MallardDuck;
use backend\models\adapter\TurkeyAdapter;
use backend\models\adapter\WildTurkey;
use backend\models\command\CeilingFan;
use backend\models\command\CeilingFanOffCommand;
use backend\models\command\CeilingFanOnCommand;
use backend\models\command\GarageDoor;
use backend\models\command\GarageDoorCloseCommand;
use backend\models\command\GarageDoorOpenCommand;
use backend\models\command\LightOffCommand;
use backend\models\command\MacroCommand;
use backend\models\command\RemoteControl;
use backend\models\command\Stereo;
use backend\models\command\StereoOffCommand;
use backend\models\command\StereoOnWithCDCommand;
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
use backend\models\patternmethod\Tea;
use backend\models\singleton\ChocolateBoiler;
use backend\models\strategy\DuckDecoy;
use backend\models\strategy\DuckMallard;
use backend\models\strategy\DuckModel;
use backend\models\strategy\DuckRedhat;
use backend\models\strategy\DuckRubber;
use backend\models\strategy\FlyRoketPowered;
use backend\models\command\Light;
use backend\models\command\LightOnCommand;
use backend\models\command\SimpleRemoteControl;
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
        $a=ChocolateBoiler::getInstance();
         $ret=$a->isBoiled();$patterntitle = 'Singleton';$patterncomment = '';
         return $this->render('pattern', compact(['patterntitle','patterncomment','ret']) );
    }
     public function actionCommand () {
         $remote = new RemoteControl();

         $livingRoomLight = new Light("Living Room");
         $kitchenLight = new Light("Kitchen");
         $ceilingFan = new CeilingFan("Living Room");
         $garageDoor = new GarageDoor();
         $stereo = new Stereo();

         $livingRoomLightOn = new LightOnCommand($livingRoomLight);
         $livingRoomLightOff = new LightOffCommand($livingRoomLight);
         $kitchenRoomLightOn = new LightOnCommand($kitchenLight);
         $kitchenRoomLightOff = new LightOffCommand($kitchenLight);
         $ceilingFanOn = new CeilingFanOnCommand($ceilingFan);
         $ceilingFanOff = new CeilingFanOffCommand($ceilingFan);
         $garageOpen = new GarageDoorOpenCommand($garageDoor);
         $garageClose = new GarageDoorCloseCommand($garageDoor);
         $stereoOnWithCD = new StereoOnWithCDCommand($stereo);
         $stereoOff = new StereoOffCommand($stereo);

         $remote->setCommand(0, $livingRoomLightOn, $livingRoomLightOff);
         $remote->setCommand(1, $kitchenRoomLightOn, $kitchenRoomLightOff);
         $remote->setCommand(2, $ceilingFanOn, $ceilingFanOff);
         $remote->setCommand(3, $garageOpen, $garageClose);
         $remote->setCommand(4, $stereoOnWithCD, $stereoOff);

         $partyOn =  [$livingRoomLightOn, $stereoOnWithCD, ] ;
         $partyOff =  [$kitchenRoomLightOff, $stereoOff, ] ;//Command[]
         $partyOnMacro  = new MacroCommand($partyOn); //MacroCommand
         $partyOffMacro = new MacroCommand($partyOff);
         $remote->setCommand(6, $partyOnMacro, $partyOffMacro);

         $ret = '<table border="1">';
         for ($i=0;$i<7;$i++) {
             $ret .= '<tr><td>'.$remote->onButtonWasPushed($i);
             $ret .= '<td>'.$remote->offButtonWasPushed($i);
         }
         $ret .= '</table>';

         $patterntitle = 'Command';
        $patterncomment =
             'посетитель-заказ-takeOrder()-официантка-orderUp()-повар<br>'
             .'клиент-команда-setCommand()-инициатор-execute()-покупатель<br>'
             .'информация об операции и получателе «упаковывается» '
             .'в объекте с единственным методом execute()<br>'
             .'Внешние объекты не знают, какие именно операции'
             .'выполняются, и с каким получателем'
             ;
         return $this->render('pattern', compact(['patterntitle','patterncomment','ret']) );
    }
    static function testDuck (Duck $duck) {
        $ret = '';
        $ret .= $duck->quack().'<br>';
        $ret .= $duck->fly().'<br>';
        return $ret;
    }
     public function actionAdapter () {
        $duck = new MallardDuck();
        $turkey = new WildTurkey();
        $turkeyAdapter = new TurkeyAdapter($turkey);
        $ret = "The Turkey says...<br>";
         $ret .= $turkey->gobble();
         $ret .= $turkey->fly();
         $ret .= "<br>The Duck says...<br>";
         $ret .= self::testDuck($duck);
         $ret .= "<br>The TurkeyAdapter says...<br>";
         $ret .= self::testDuck($turkeyAdapter);

        $patterntitle = 'Adapter';
        $patterncomment = 'инкапсуляция алгоритмических блоков, чтобы<br>'
            .'преобразует интерфейс класса к другому интерфейсу, на который рассчитан ваш клиент.';
        return $this->render('pattern', compact(['patterntitle','patterncomment','ret']) );
    }
     public function actionFasad () {
         $ret='Fasad';$patterntitle = 'Fasad';$patterncomment = '';
         return $this->render('pattern', compact(['patterntitle','patterncomment','ret']) );
    }
     public function actionPatternmethod () {
         $t = new Tea();
         $ret = $t->prepareRecipe();
         $patterntitle = 'PatternMethod';
         $patterncomment = 'субклассы могли в любой момент связаться с нужным алгоритмом обработки.<br>'
         .'«Перехватчиком» называется метод, объявленный абстрактным классом, но имеющий пустую реализацию<br>';
         return $this->render('pattern', compact(['patterntitle','patterncomment','ret']) );
    }
     public function actionIterator () {
         $ret='Iterator';
         $patterntitle = 'Iterator';$patterncomment = '';
         return $this->render('pattern', compact(['patterntitle','patterncomment','ret']) );
    }
     public function actionComponent () {
         $ret='Component';$patterntitle = 'Component';$patterncomment = '';
         return $this->render('pattern', compact(['patterntitle','patterncomment','ret']) );
    }
     public function actionState () {
         $ret='State';$patterntitle = 'State';$patterncomment = '';
         return $this->render('pattern', compact(['patterntitle','patterncomment','ret']) );
    }
     public function actionProxy () {
         $ret='Proxy';$patterntitle = 'Proxy';$patterncomment = '';
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
                            'factory','singleton','command','adapter','fasad','patternmethod',
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
