<?php

class QuanlyTTQHPXController extends Controller {

    // ko can thiet phai co dong nay public $layout = '//layouts/main';
  
    public function actionIndex() {

        $sql = 'SELECT * FROM tinh_thanh_pho';
        $arrayTinhtp = Yii::app()->db->createCommand($sql
                )->queryAll();

        $sql = 'SELECT * FROM tinh_thanh_pho limit 0,1';
        $rows = Yii::app()->db->createCommand($sql
                )->queryAll();

      
        $first_id_tp = $rows[0]['idTinh_thanh_pho'];
        $sql = 'SELECT * FROM quan_huyen where Tinh_thanh_pho_idTinh_thanh_pho=' . $first_id_tp;


        $arrQuanHuyen = Yii::app()->db->createCommand($sql
                )->queryAll();

        // print_r($arrQuanHuyen);
        $first_id_quanhuyen = $arrQuanHuyen[0]['idQuan_huyen'];


        $sql = 'SELECT * FROM phuong_xa where 	Quan_huyen_idQuan_huyen=' . $first_id_quanhuyen;
        $arrPhuongXa = Yii::app()->db->createCommand($sql
                )->queryAll();


        $data = array($arrayTinhtp, $arrQuanHuyen, $arrPhuongXa, $first_id_tp, $first_id_quanhuyen);
        $this->render('index', array('data' => $data)
        );
    }

    public function getArrayQuanHuyen($idthanhpho) {
        $sql = 'SELECT * FROM quan_huyen where Tinh_thanh_pho_idTinh_thanh_pho=' . $idthanhpho;
        $arrayTinhtp = Yii::app()->db->createCommand($sql
                )->queryAll;
    }

    public function actionAR() {
        $dataProvider = new CActiveDataProvider('quanhuyen', array(
                    'pagination' => array(
                        'pageSize' => 10,
                    ),
                    'sort' => array(
                        'defaultOrder' => array('title' => false),
                    )
                ));

        $this->render('quanly', array(
            'dataProvider' => $dataProvider,
        ));
    }

    public function actionAdd() {
        if (isset($_POST['Test'])) {
            $model = Test::model()->findbyPk($_GET['id']); // or $_POST['id'] ...
            $model->attributes = $_POST['Test'];
            $model->Result = intval($model->A) + intval($model->B);
            $model->save(true);
        }
    }

    public function actionThemmoitinhthanh() {

        $tttp = $_POST['tentinhthanh'];
        if ($tttp != "") {
            $idquocgia = 1;
            $model = new TinhThanhPho;
            $model->Ten_tinh_thanhpho = $tttp;
            $model->Quoc_gia_idQuoc_gia = 1;
            $model->insert();
            $stringHTML = $this->generateGridViewTinhthanh();
            echo $stringHTML;
        } else {
            $stringHTML = $this->generateGridViewTinhthanh();
            echo $stringHTML;
        }
    }

    public function generateGridViewTinhthanh() {
        $sql = 'SELECT * FROM tinh_thanh_pho order by Ten_tinh_thanhpho';
        $arrayTinhtp = Yii::app()->db->createCommand($sql
                )->queryAll();


        $stringHTMl = "";
        $stringHTMl.="<table>";
        $stringHTMl.="<th>Tỉnh Thành Phố</th><th>.....</th>";
        foreach ($arrayTinhtp as &$value):
            $stringHTMl.="<tr>";
            $stringHTMl.="<td class='r_tinh_thanh_pho' value=" . $value["idTinh_thanh_pho"] . ">" . $value['Ten_tinh_thanhpho'] . "</td>";
            $stringHTMl.="<td>" . "<input class='btdelete_thanhpho' id=" . $value['idTinh_thanh_pho'] . " type='button' value='Delete' name='yt0'/>" . "</td>";

            $stringHTMl.="</tr>";
        endforeach;
        $stringHTMl.="</table>";



        return $stringHTMl;
    }

    public function generateGridQuanHuyen($idttp) {
        $sql = 'SELECT * FROM quan_huyen where Tinh_thanh_pho_idTinh_thanh_pho=' . $idttp . ' order by Ten_quan_huyen';
        $arrayqh = Yii::app()->db->createCommand($sql
                )->queryAll();


        $stringHTMl = "";
        $stringHTMl.="<table>";
        $stringHTMl.="<th>Quận Huyện</th><th>.....</th>";
        foreach ($arrayqh as &$value):
            $stringHTMl.="<tr>";
            $stringHTMl.="<td  class='row_qh' value=" . $value["idQuan_huyen"] . ">" . $value['Ten_quan_huyen'] . "</td>";
            $stringHTMl.="<td>" . "<input class='btdelete_qh' id=" . $value['idQuan_huyen'] . " type='button' value='Delete' name='yt0'>" . "</td>";

            $stringHTMl.="</tr>";
        endforeach;
        $stringHTMl.="</table>";



        return $stringHTMl;
    }
    
	public function generateGridPhuongXa($idqh){
      
        $sql = 'SELECT * FROM phuong_xa where Quan_huyen_idQuan_huyen=' . $idqh . ' order by Ten_phuong_xa';
        $arrayqh = Yii::app()->db->createCommand($sql
                )->queryAll();

        $stringHTMl = "";
        $stringHTMl.="<table>";
        $stringHTMl.="<th>Phường Xã</th><th>.....</th>";
        foreach ($arrayqh as &$value):
            $stringHTMl.="<tr>";
            $stringHTMl.="<td class='row_px' value=" . $value["idPhuong_xa"] . ">" . $value['Ten_phuong_xa'] . "</td>";
            $stringHTMl.="<td>" . "<input class='btdelete_px' id=" . $value['idPhuong_xa'] . " type='button' value='Delete' name='yt0'>" . "</td>";

            $stringHTMl.="</tr>";
        endforeach;
        $stringHTMl.="</table>";
        return $stringHTMl;
    }

    public function actionXoatinhthanh() {

        $id = $_POST['id'];
        if ($id != "") {

            $model = new TinhThanhPho;
            $model->deleteAll('idTinh_thanh_pho=' . $id);
        }
        $html = $this->generateGridViewTinhthanh();
        // $html.=$this->getJS();
        echo $html;
    }
       public function actionXoaQuanHuyen() {
        $idqh = $_POST['idqh'];
        $idtp = $_POST['idtp'];
        if ($idqh != "") {

            $model = new QuanHuyen;
            $model->deleteAll('idQuan_huyen=' . $idqh);
            $html = $this->generateGridPhuongXa($idqh);
            echo $html;

        } else {

           $html = $this->generateGridPhuongXa($idqh);
            echo $html;
        }
    }
     public function actionXoaPhuongXa() {
        $idpx = $_POST['idpx'];
        $idqh = $_POST['idqh'];
        if ($idpx != "") {

            $model = new PhuongXa;
            $model->deleteAll('idPhuong_xa=' . $idpx);
            $html = $this->generateGridPhuongXa($idqh);
            echo $html;

        } else {

            $html = $this->generateGridPhuongXa($idqh);
            echo $html;
        }
    }
    public function actionThemquanhuyen() {
        $tttp = $_POST['idttp'];
        $tenqh = $_POST['tenqh'];
        if ($tenqh != "") {
            $idtp = $tttp;
            $model = new QuanHuyen;
            $model->Tinh_thanh_pho_idTinh_thanh_pho = $tttp;
            $model->Ten_quan_huyen = $tenqh;
            $model->insert();
            $stringHTML = $this->generateGridQuanHuyen($tttp);
            echo $stringHTML;
        } else {
            $stringHTML = $this->generateGridQuanHuyen($tttp);
            echo $stringHTML;
        }
    }

     public function actionThemPhuongXa() {
        $idqh = $_POST['idqh'];
        $tenpx = $_POST['tenpx'];

        if ($tenpx != "") {
           // $idtp = $tttp;
            $model = new PhuongXa;
            $model->Quan_huyen_idQuan_huyen = $idqh;
            $model->Ten_phuong_xa= $tenpx;
            $model->insert();
            $stringHTML = $this->generateGridPhuongXa($idqh);
            echo $stringHTML;
        } else {
            $stringHTML = $this->generateGridPhuongXa($idqh);
            echo $stringHTML;
        }
    }
    public function actionLoadQuanHuyen() {
        $id = $_POST['idtp'];
        $html = "";
        if ($id != "") {
            $html = $this->generateGridQuanHuyen($id);
        }
        //  $html.=$this->getJS();
        echo $html;
    }
     public function actionLoadPhuongXa() {
        $id = $_POST['idqh'];
        $html = "";
        if ($id != "") {
            $html = $this->generateGridPhuongXa($id);
         
        }
        //  $html.=$this->getJS();
        echo $html;
    }

 

    // Uncomment the following methods and override them if needed
    /*
      public function filters()
      {
      // return the filter configuration for this controller, e.g.:
      return array(
      'inlineFilterName',
      array(
      'class'=>'path.to.FilterClass',
      'propertyName'=>'propertyValue',
      ),
      );
      }

      public function actions()
      {
      // return external action classes, e.g.:
      return array(
      'action1'=>'path.to.ActionClass',
      'action2'=>array(
      'class'=>'path.to.AnotherActionClass',
      'propertyName'=>'propertyValue',
      ),
      );
      }
     */
}