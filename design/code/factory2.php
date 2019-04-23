<?php
require_once 'simpletest/autorun.php';
//require_once 'simpletest/reporter.php';
//the test
class TestingTestCase extends UnitTestCase{
    function testPropertyInfo(){
        $list = array('type','price','color','rent');
        $this->assertIsA(
            $testprop = new PropertyInfo($list),'PropertyInfo');
        foreach($list as $prop){
            $this->assertEqual($prop,$testprop->$prop);
        }
    }
    function testPropertyInfoMissingColorRent(){
        $list = array('type','price');
        $this->assertIsA(
            $testprop = new PropertyInfo($list),'PropertyInfo');
        //$this->assertNoErrors();
        foreach($list as $prop){
            $this->assertEqual($prop,$testprop->$prop);
        }
        $this->assertNull($testprop->color);
        $this->assertNull($testprop->rent);
    }
    function testGetPropInfoReturn(){
        $assessor = new TestableAssessor;
        $this->assertIsA(
            $assessor->getPropInfo('Boardwalk'),'PropertyInfo');
    }
    function testBadPropNameReturnsException(){
        $assessor = new TestableAssessor;
        $exception_caught = false;
        try{
            $assessor->getPropInfo('Main Street');
        }catch(InvalidPropertyNameException $e){
            $exception_caught = true;
        }
        $this->assertTrue($exception_caught);
        $this->assertNoErrors();
    }
}
 //run the test
$test = new TestingTestCase('Testing Unit Test');
$test->run(new HtmlReporter());

// php5
class PropertyInfo{
    const TYPE_KEY = 0;
    const PRICE_KEY = 1;
    const COLOR_KEY = 2;
    const RENT_KEY = 3;
    public $type;
    public $price;
    public $color;
    public $rent;
    public function __construct($props){
        $this->type = $this->propValue($props,'type',self::TYPE_KEY);
        $this->price = $this->propValue($props,'price',self::PRICE_KEY);
        $this->color = $this->propValue($props,'color',self::COLOR_KEY);
        $this->rent = $this->propValue($props,'rent',self::RENT_KEY);
    }
    protected function propValue($props,$prop,$key){
        if(array_key_exists($key,$props)){
            return $this->$prop = $props[$key];
        }
    }
}
abstract class Property{
    protected $name;
    protected $price;
    protected $game;
    function __construct($game,$name,$price){
        $this->game = $game;
        $this->name = $name;
        $this->price = new Dollar($price);
    }
    abstract protected function calcRent();
    public function purchase($player){
        $player->pay($this->price);
        $this->owner = $player;
    }
    public function rent($player){
        if($this->owner != $player){
            $this->owner->collect(
                $player($this->calcRent())
                );
        }
    }
}
class Street extends Property{
    protected $base_rent;
    public $color;
    public function setRent($rent){
        $this->base_rent = new Dollar($rent);
    }
    protected function calcRent(){
        if($this->game->hasMonopoly($this->owner,$this->color)){
            return $this->base_rent->add($this->base_rent);
        }
        return $this->base_rent;
    }
}
class RailRoad extends Property{
    protected function calcRent(){
        switch($this->game->railRoadCount($this->owner)){
            case 1: return new Dollar(25);
            case 2: return new Dollar(50);
            case 3: return new Dollar(100);
            case 4: return new Dollar(200);
            default: return new Dollar;
        }
    }
}
class Utility extends Property{
    protected function calcRent(){
        switch($this->game->utilityCount($this->owner)){
            case 1: return new Dollar(4*$this->game->lastRoll());
            case 2: return new Dollar(10*$this->game->lastRoll());
            default: return new Dollar;
        }
    }
}
class Assessor{
    /* 
    protected $game;
    protected $prop_info = array(
        //streets
        'Mediterranean Ave.' => array('Street',60,'Purple',2),
        'Baltic Ave.' => array('Street',60,'Purple',2),
        //more of the streets...
        'Boardwalk' => array('Street',400,'Blue',50),
        //railroads
        'Short Line R.R.' => array('RailRoad',200),
        //the rest of the railroads...
        //utilities
        'Electric Company' => array('Utility',150),
        'Water Works' => array('Utility',150)
        );
        */
    protected $game;
    public function setGame($game){$this->game = $game;}
    public function getProperty($name){
        $prop_info = new PropertyInfo($this->prop_info[$name]);
        switch($prop_info->type){
            case 'Street';
            $prop = new Street($this->game,$name,$prop_info->price);
            $prop->color = $prop_info->color;
            $prop->setRent($prop_info->rent);
            return $prop;
            case 'RailRoad';
            return new RailRoad($this->game,$name,$prop_info->price);
            break;
            case 'Utility';
            return new Utility($this->game,$name,$prop_info->price);
            break;
            default://should not be able to get here
        }
    }
    protected $prop_info = array(/* ... */);
    protected function getPropInfo($name){
        if(!array_key_exists($name,$this->prop_info)){
            throw new InvalidPropertyNameException($name);
        }
        
    }
    return new PropertInfo($this->prop_info[$name]);
}
class TestableAssessor extends Assessor{
    public function getPropInfo($name){
        return Assessor::getPropInfo($name);
    }
}
class Dollar{
    protected $amount;
    public function __construct($amount=0){
        $this->amount = (float)$amount;
    }
    public function getAmount(){
        return $this->amount;
    }
    public function add($dollar){
        return new Dollar($this->amount + $dollar->getAmount());
    }
    public function debit($dollar){
        return new Dollar($this->amount - $dollar->getAmount());
    }
    public function divide($divisor){
        //return array_fill(0,$divisor,null);
        //return array_fill(0,$divisor,new Dollar($this->amount / $divisor));
        $ret = array();
        $alloc = round($this->amount / $divisor,2);
        $cumm_alloc = 0.0;
        foreach(range(1,$divisor-1) as $i){
            $ret[] = new Dollar($alloc);
            $cumm_alloc += $alloc;
        }
        $ret[] = new Dollar(round($this->amount - $cumm_alloc,2));
        return $ret;
    }
}