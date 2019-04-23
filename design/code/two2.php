<?php
require_once 'simpletest/autorun.php';
//require_once 'simpletest/reporter.php';
//the test
class TestingTestCase extends UnitTestCase{
    function testBadDollarWorking(){
        $job = new Work;
        $p1 = new Person;
        $p2 = new Person;
        $p1->wallet = $job->payDay();
        $this->assertEqual(200,$p1->wallet->getAmount());
        $p2->wallet = $job->payDay();
        $this->assertEqual(200,$p2->wallet->getAmount());
        //$p1->wallet->add($job->payDay());
        $p1->wallet = $p1->wallet->add($job->payDay());
        $this->assertEqual(400,$p1->wallet->getAmount());
        //this is bad --actually 400
        $this->assertEqual(200,$p2->wallet->getAmount());
        //this is really bad --actually 400
        $this->assertEqual(200,$job->payDay()->getAmount());
    }
    function TestGame(){
        echo "sadfasd";
        $game = new Monopoly;
        $player1 = new Player('Joson');
        $this->assertEqual(1500,$player1->getBalance());
        $game->passGo($player1);
        $this->assertEqual(1700,$player1->getBalance());
        $game->passGo($player1);
        $this->assertEqual(1900,$player1->getbalance());
    }
    function TestRent(){
        $game = new Monopoly;
        $player1 = new Player('Madeline');
        $player2 = new Player('Caleb');
        $this->assertEqual(1500,$player1->getBalance());
        $this->assertEqual(1500,$player2->getBalance());
        $game->payRent($player1,$player2,new Dollar(26));
        $this->assertEqual(1474,$player1->getBalance());
        $this->assertEqual(1526,$player2->getBalance());
    }
    function testDollarDivideReturnsArrayOfdivisorSize(){
        $full_amount = new Dollar(8);
        $parts = 4;
        $this->assertIsA(
            $result = $full_amount->divide($parts),
            'array');
        $this->assertEqual($parts,count($result));
    }
    function testDollarDrivesEquallyForExatMultiple(){
        $test_amount = 1.25;
        $parts = 4;
        $dollar = new Dollar($test_amount * $parts);
        foreach($dollar->divide($parts) as $part){
            $this->assertIsA($part,'Dollar');
            $this->assertEqual($test_amount,$part->getAmount());
        }
    }
    function testDollarDividelmmunetoRoundingErrors(){
        $test_amount = 7;
        $parts = 3;
        $this->assertNotEqual(round($test_amount/$parts,2),
            $test_amount/$parts,
            'Make sure we are testing anon-trivial case %s');
        $total = new Dollar($test_amount);
        $last_amount = false;
        $sum = new Dollar(0);
        foreach($total->divide($parts) as $part){
            if($last_amount){
                $difference = abs($last_amount - $part->getAmount());
                $this->assertTrue($difference <= 0.01);
            }
            $last_amount = $part->getAmount();
            $sum = $sum->add($part);
            echo $last_amount . "==";
        }
        $this->assertEqual($sum->getAmount(),$test_amount);
    }
}
 //run the test
$test = new TestingTestCase('Testing Unit Test');
$test->run(new HtmlReporter());    
    
//php5
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
class Work{
    protected $salary;
    public function __construct(){
        $this->salary = new Dollar(200);
    }
    public function payDay(){
        return $this->salary;
    }
}
class Person{
    public $wallet;
}
class Monopoly{
    protected $go_amount;
    /**
    *game constructor
    *@return void
    */
    public function __construct(){
        $this->go_amount = new Dollar(200);
    }
    /**
    * pay a playe for passing 
    * @param Player $player the player to pay
    * @return void
    */
    public function passGo($player){
        $player->collect($this->go_amount);
    }
    /**
    * paly retn from one player to another 
    * @param Player $from the player paying rent
    * @param Player $to the player collectiong rent
    * @param Dollar $rent the amount of the rent
    * @return void
    */
    public function payrent($from,$to,$rent){
        $to->collect($from->pay($rent));
    }
}
class Player{
    protected $name;
    protected $savings;
    /**
    * constructor
    * set name and initial balance
    * @param string $name the players name
    * @return void
    */
    public function __construct($name){
        $this->name = $name;
        $this->savings = new Dollar(1500);
    }
    /**
    * receive a playment
    * @parma Dollar $amount the amount received
    * @return void
    */
    public function collect($amount){
        $this->savings = $this->savings->add($amount);
    }
    /**
    * return player balance
    * @return float
    */
    public function getBalance(){
        return $this->savings->getAmount();
    }
    /**
    * make a playment
    * @param Dollar $amount the amount to pay
    * @param Dollar the amount played
    */
    public function pay($amount){
        $this->savings = $this->savings->debit($amount);
        return $amount;
    }
}
