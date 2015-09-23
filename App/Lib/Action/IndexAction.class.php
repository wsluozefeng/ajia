<?php
/**
 *
 * Author: youxi
 * Date:   2015/9/9 15:33
 *  
 */

class IndexAction{

    public function index(){
        //$ajia = new IndexModel();
        //$ajia->getOrderList();


        /*$cache = Cache::getInstance('redis', 'act_redis');
        //$cache->set('where', 99, array( 'nx', 'ex'=>50 ));
        $cache->set('where', 108);
        $rel = $cache->get('where');
        echo $cache->ttl('where');
        echo "<hr>";
        echo($rel);*/

        if(!defined("_f_afficherButtonPayPal")){
            define("_f_afficherButtonPayPal",1);
            $this->afficherButtonPayPal('ajia', 1);
        }


        exit;

    }

    public function afficherButtonPayPal($nbr_point,$montant)
    {

        echo"<td width=\"50\"> </td>";
        echo "<td>
<form action=\"https://www.sandbox.paypal.com/cgi-bin/webscr\" method=\"post\" target=\"_blank\">
<input type=\"hidden\" name=\"cmd\" value=\"_xclick\">
<input type=\"hidden\" name=\"business\" value=\"wsluozefeng-facilitator@163.com\"> //这个是刚才建立的seller的账号
<input type=\"hidden\" name=\"item_name\" value=\"$nbr_point points\">
<input type=\"hidden\" name=\"currency_code\" value=\"EUR\"> //付款的币种，我写的是欧元
<input type=\"hidden\" name=\"amount\" value=\"$montant\"> // 快速付款的总金额
<input type=\"image\" src=\"../src/img/x-click-but01.gif\" name=\"submit\" alt=\"Veuillez vous payer par PayPal\"> //显示的paypal图片
</form>
</td>";
    }




}