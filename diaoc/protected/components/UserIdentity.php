<?php

class UserIdentity extends CUserIdentity
{
    private $id;
	
	public function authenticate()
	{
        $page = preg_split('/\=/',Yii::app()->user->returnUrl);
        if($page[1]=="quantri"){
            if($this->username != "admin")
            {
                $this->errorCode = self::ERROR_USERNAME_INVALID;
            }
            else
            {
                if($this->password != "admin")
                {                                             
                    $this->errorCode = self::ERROR_PASSWORD_INVALID;
                }
                else
                {
                    $this->setState('name',"admin");
                    $this->setState('loai',2);
                    $this->id = 9999;
                    $this->errorCode = self::ERROR_NONE;
                }        
            }        
        }else{        
		    $result = KhachHang::model()->findByAttributes(array('Ten_dang_nhap'=>$this->username));
            
            if($result === null)
            {
                $this->errorCode = self::ERROR_USERNAME_INVALID;
            }
            else
            {
                if($this->password != $result->Mat_khau)
                {                                             
                    $this->errorCode = self::ERROR_PASSWORD_INVALID;
                }
                else
                {
                    $this->setState('name',$result->Ten_dang_nhap);
                    $this->setState('ladoanhnghiep',$result->Ladoanhgnhiep);
                    $this->id = $result->ID_khach_hang;
                    $this->errorCode = self::ERROR_NONE;
                }        
            }
        }           
        return $this->errorCode;
	}
    public function getId()
    {
        return $this->id;    
    }
}