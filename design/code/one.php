<?php
    //the subject code
    define('TAX_RATE',0.07);
    function calculate_sales_tax($amount){
        return round($amount*TAX_RATE,2);
    }
    //include test library
    require_once 'simpletest/autorun.php';
    //require_once 'simpletest/reporter.php';
    //the test
    class TestingTestCase extends UnitTestCase{
        /*function __construct($name2){
            parent::__construct($name2);
        }*/
        function TestSalesTax(){
            $this->assertEqual(7,calculate_sales_tax(100));
            $this->assertEqual(3.5,calculate_sales_tax(50));
        }
        function TestRandomValuesSalesTax(){
            $amount = rand(500,1000);
            $this->assertTrue(defined('TAX_RATE'));
            $tax = round($amount*TAX_RATE*100)/100;
            $this->assertEqual($tax,calculate_sales_tax($amount));
        }
        function TestRandomValuesSalesTax2(){
            $amount = rand(500,1000);
            $this->assertTrue(calculate_sales_tax($amount)<$amount*0.20);
        }
        function TestCart(){
            $line1 = new CartLine;
            $line1->price = 12;$line1->qty = 2;
            $line2 = new CartLine;
            $line2->price = 7.5;$line2->qty = 3;
            $line3 = new CartLine;
            $line3->price = 8.5;$line3->qty = 1;
            $cart = new Cart;
            $cart = new CartNew2;
            $cart->addLine($line1);
            $cart->addLine($line2);
            $cart->addLine($line3);
            $this->assertEqual(
                (12*2 + 7.5*3 + 8.5)*1.07,
                $cart->calcTotal());
        }
    }
    //run the test
    $test = new TestingTestCase('Testing Unit Test');
    $test->run(new HtmlReporter());
    
    //php5
    class CartLine1{
        public $price = 0;
        public $qty = 0;
    }
    class CartLine{
        public $price = 0;
        public $qty = 0;
        public function total(){
            return $this->price * $this->qty;
        }
    }
    class Cart{
        protected $lines = array();
        public function addLine($line){
            $this->lines[] = $line;
        }
        public function calcTotal(){
            $total = 0;
            // add totals for each line
            foreach($this->lines as $line){
                $total += $line->price * $line->qty;
            }
            // add sales tax
            $total *= 1.07;
            return $total;
        }
    }
    class CartNew{
        protected $lines = array();
        public function addLine($line){
            $this->lines[] = $line;
        }
        public function calcTotal(){
            $total = 0;
            // add totals for each line
            foreach($this->lines as $line){
                $total += $this->lineTotal($line);
            }
            // add sales tax
            $total += $this->calcSalesTax($total);
            return $total;
        }
        protected function lineTotal($line){
            return $line->price*$line->qty;
        }
        protected function calcSalesTax($amount){
            return $amount*0.07;
        }
    }
    class CartNew2{
        protected $lines = array();
        public function addLine($line){
            $this->lines[] = $line;
        }
        public function calcTotal(){
            $total = 0;
            // add totals for each line
            foreach($this->lines as $line){
                $total += $line->total();
            }
            // add sales tax
            $total += $this->calcSalesTax($total);
            return $total;
        }
        
        protected function calcSalesTax($amount){
            return $amount*0.07;
        }
    }
 