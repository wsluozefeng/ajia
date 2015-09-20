<?php
/**
 * 具体状态类
 * Author: youxi
 * Date:   2015/9/18 10:36
 *  
 */

class AmState implements Istate{

    public function printState( Work $obj ){

        if( $obj->hour < 12 ){
            echo "i am amState";
        }else{
            $obj->setState( new PmState() );
            $obj->getState();
        }

    }

}