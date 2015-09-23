<?php

/**
 * 重构demo 模块
 * Author: youxi
 * Date:   2015/9/9 16:09
 *
 */
class CgModel extends Model
{

    protected $quantity = 55;
    protected $itemPrice = 10;

    /**
     * 重构：以查询方法 代替 临时变量
     * @return int
     */
    public function replace_temp_with_query()
    {

        //TODO （重构：以查询方法 代替 临时变量）旧代码
        //$basePrice = $this->quantity * $this->itemPrice;
        /*if( $this->basePrice() > 100 ){
            $discountFactor = 0.95;
        }else{
            $discountFactor = 0.90;
        }*/

        //TODO （重构：以查询方法 代替 临时变量）新代码
        return $this->basePrice() * $this->discountFactor();
    }

    /**
     * 重构：引入解释性临时变量
     * @param $date
     * @param $price
     */
    public function introduce_explain_variable( $date, $price )
    {

        //TODO （重构：引入解释性临时变量） 旧代码
        /* if( ( $date < time() ) && ( $price < 99 ) ){
             //....
         }else{
             //....
         }*/

        //TODO （重构：引入解释性临时变量） 新代码   （其实这接下来的几句代码应该使用replace_temp_with_query来重构更加合理）
        $dateSmallNow = ( $date < time() );
        $priceSmall99 = ( $price < 99 );

        if ( $dateSmallNow && $priceSmall99 ) {
            //....
        } else {
            //....
        }
    }

    /**
     * 重构：移除对参数的赋值  (该方法主要是针对可能是“引用传递”情况下的参数被重新赋值，一般情况下可斟酌是否这样处理)
     * @param $price
     * @param $account
     * @return int
     */
    public function remove_assignments_to_parameters( $price, $account )
    {
        /*$price   = (int)$price;
        $account = (int)$account;

        return $price * $account;*/

        $relPrice   = (int)$price;
        $relAccount = (int)$account;

        return $relPrice * $relAccount;
    }

    protected function basePrice()
    {
        return $this->quantity * $this->itemPrice;
    }

    /**
     * 重构：以函数对象（类）取代函数
     */
    public function replace_method_with_method_object(){
        //TODO 一个函数过长，由于过多的临时变量，无法通过 extract method来直接重构，那么可以将该方法使用一个类代替，该类中变量属性 = 方法的临时变量，然后也可以在该类中通过 extract method来切分成多个短函数
    }

    protected function discountFactor()
    {
        if ( $this->basePrice() > 100 ) {
            $discountFactor = 0.95;
        } else {
            $discountFactor = 0.90;
        }

        return $discountFactor;
    }

}

class Person{
    private $_name;
    private $_department;

    public function __construct( $name ){
        $this->_name = $name;
    }

    public function setDepartment( Department $department ){
        $this->_department = $department;
    }

    public function getDepartment(){
        return $this->_department;
    }
}

class Department{
    private $_manager;

    public function __construct( $manager ){
        $this->_manager = $manager;
    }

    public function getManager(){
        return $this->_manager;
    }
}