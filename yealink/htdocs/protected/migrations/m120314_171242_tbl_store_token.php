<?php

class m120314_171242_tbl_store_token extends CDbMigration
{
	public function up()
	{
        $sql = <<<EOF


CREATE TABLE `tbl_store_token` (
  `id` int(11) NOT NULL auto_increment,
  `user_id` int(11) NOT NULL,
  `type` varchar(30) default NULL,
  `value` varchar(255) NOT NULL,
  PRIMARY KEY  (`id`)
) TYPE=InnoDB AUTO_INCREMENT=1 ;




        
EOF;
         Yii::app()->db->createCommand($sql)->execute();
	}

	public function down()
	{
		echo "m120314_171242_tbl_store_token does not support migration down.\n";
		return false;
	}

	/*
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
	}

	public function safeDown()
	{
	}
	*/
}