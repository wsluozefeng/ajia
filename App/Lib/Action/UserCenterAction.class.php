<?php
/**
 *
 * Author: youxi
 * Date:   2015/8/24 20:20
 *  
 */

class UserCenterAction{

    public function index(){

        echo "-------";
        exit;
        $uc = new UserCenterModel();
        $uc->demo();
    }

}