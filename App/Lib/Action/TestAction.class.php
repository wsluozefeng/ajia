<?php
/**
 *
 * Author: youxi
 * Date:   2015/10/27 14:32
 *  
 */

class TestAction{

    public function redis(){
        $redis = new CacheRedis();
        $key   = 'ajia.test';
        echo $key;exit;
        //$rel   = $redis->set( $key, '10', array('nx', 'ex'=>5) );  //todo set 模拟setnx和expire操作，但是为原子性操作，并发时候可用
        $info = array( 'data'=>'youxi', 'expire' => time()+60 ); //todo 模拟hash的域过期时间
        $rel  = $redis->hset( $key, 'name', json_encode($info) );
        var_dump($rel);
        exit;
    }

    public function fenBiao(){
        $id = sprintf("%u",crc32(strtoupper(uniqid())));
        $tableName = 'order_';
        $num = 5;

        //按照id取模
        $seq = ($id % $num) + 1;

        //按字符串的crc32取模
        $seq = ( sprintf("%u",crc32( strtoupper($id) )) % $num ) + 1;

        // 按照md5的序列分表
        $seq = ( ord( substr( md5($id),0,1 ) ) % $num )+1;

        echo $seq;

        $realTableName = $tableName.$seq;

    }

}