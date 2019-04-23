<?php
require_once 'simpletest/autorun.php';
//require_once 'simpletest/reporter.php';
//the test
class TestingTestCase extends UnitTestCase{
    function testInstantiate(){
        $this->assertIsA($color = new Color,'Color');
        $this->assertTrue(method_exists($color,'getRgb'));
        
    }
    function TestGetRgbWhite(){
        $white = new Color(255,255,255);
        $this->assertEqual('#FFFFFF',$white->getRgb());
    }
    function TestGetRgbRed(){
        $red = new Color(255,0,0);
        $this->assertEqual('#FF0000',$red->getRgb());
    }
    function testGetRgbRandom(){
        return;
        $color = new Color(rand(0,255),rand(0,255),rand(0,255));
        $this->assertWantedPattern(
            '/^#[0-9A-F]{6}$/',
            $color->getRgb());
        $this->assertWantedPattern(
            '/^#([0-9A-F]{2}\1\1$/',
            $color2->getRgb());
    }
    function testColorBoundaries(){
        return;
        $color = new Color(-1);
        $this->assertErrorPattern('/out.*0.*255/i');
        $color = new Color(1111);
        $this->assertErrorPattern('/out.*0.*255/i');
    }
    function TestGetColor(){
        $this->assertIsA($o = CrayonBox::getColor('red'),'Color');
        $this->assertEqual('#FF0000',$o->getRgb());
        $this->assertIsA($o = CrayonBox::getColor('LIME'),'Color');
        $this->assertEqual('#00FF00',$o->getRgb());
    }
    
}
 //run the test
$test = new TestingTestCase('Testing Unit Test');
$test->run(new HtmlReporter());

class Color{
    var $r = 0;
    var $g = 0;
    var $b = 0;
    function Color($red=0,$green=0,$blue=0){
        $this->r = $this->validateColor($red);
        $this->g = $this->validateColor($green);
        $this->b = $this->validateColor($blue);
    }
    function validateColor($color){
        $check = (int)$color;
        if($check < 0 || $check > 255){
            trigger_error('color out of bounds, lease specify a number between 0 and 255');
        }else{
            return $check;
        }
    }
    function getRgb(){
        //return '#FFFFFF';
        return sprintf('#%02X%02X%02X',$this->r,$this->g,$this->b);
    }
}
class CrayonBox{
    /**
    * Return valid colors as color name => array(red,green,blue)
    *
    * Note the array is returned from function call
    * because we want to have getColor able to be called statically
    * so we can't have instance variables to store the array
    * @return array
    */
    static function colorList(){
        return array(
            'black' => array(0,0,0),
            'green' => array(0,128,0),
            //the rest of the colors ...
            'aqua' => array(0,255,255),
            'red' => array(255,0,0)
        );
    }
    /**
    * Factory method to return a Color
    * @param string $color_name the name of the desired color
    * @return Color
    */
    function getColor($color_name){
        $color_name = strtolower($color_name);
        if(array_key_exists($color_name,
            $colors = CrayonBox::colorList())){
            $color = $colors[$color_name];
            return new Color($color[0],$color[1],$color[2]);
        }
        trigger_error("the color '$color_name' available");
        //default to balck
        return new Color;
    }
}