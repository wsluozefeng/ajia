<?php
/**
 * 上下文对象 （该对象的行为取决于该对象的状态， 也就是随着hour的不同而结果不同）
 * Author: youxi
 * Date:   2015/9/18 10:54
 *  
 */

class Work{

    public $handel;

    public $hour;

    public function __construct(){
        $this->handel = new AmState();
    }

    public function setState( Istate $obj ){
        $this->handel = $obj;
    }

    public function getState(){
        $this->handel->printState( $this );
    }

}