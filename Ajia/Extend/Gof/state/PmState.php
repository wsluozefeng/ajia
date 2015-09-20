<?php
/**
 * 具体状态类
 * Author: youxi
 * Date:   2015/9/18 10:38
 *  
 */

class PmState implements Istate{

    public function printState( Work $obj ){

        if( $obj->hour >=12 && $obj->hour < 18 ){
            echo 'i am pmstate';
        }else{
            echo ' none ';
        }

    }

}