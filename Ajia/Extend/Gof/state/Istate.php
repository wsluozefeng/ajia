<?php
/**
 * 状态模式：状态接口
 * Author: youxi
 * Date:   2015/9/18 10:33
 *  
 */

interface Istate{
    public function printState( Work $obj );
}