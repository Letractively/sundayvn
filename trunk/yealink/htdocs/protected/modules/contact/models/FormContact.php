<?php
class FormContact extends CFormModel
{
    public $account;
    public $name;
    public $phone;
    public $address;
    public $email;
    public function rules()
    {
        return array(
            array('account, email, name', 'required'),
            array('name', 'length','min'=>3,'allowEmpty'=>true),
            array('email, account', 'email'),
            array('phone', 'numerical'),
            array('account, email, phone, email, address', 'length','min'=>10,'max'=>150),
        );
    }
    
}