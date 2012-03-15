<?php
/**
 * 
 * @author anguyen
 * @since Mar 5, 2012 
 */

class Contact extends UserContact{
	
	public function get_all_contacts($user_id, $offset=0, $limit=20, $name=NULL){
		
		$sql = "
			SELECT uc.id,uc.name, uc.account, uc.created_timestamp, 
				group_concat(distinct phone) as phones, 
				group_concat(distinct email) as emails, 
				group_concat(distinct address) as addresses
			FROM tbl_user_contacts uc
				left join tbl_user_contact_phones ucp on uc.id = ucp.user_contact_id
				left join tbl_user_contact_emails uce on uc.id = uce.user_contact_id
				left join tbl_user_contact_addresses uca on uc.id = uca.user_contact_id			
			WHERE uc.user_id = {$user_id} 
            ";
            if ($name)
            {
                $sql .= " and uc.`name` like '%{$name}%' ";
            }
            $sql.= "
			GROUP BY uc.name, uc.account, uc.created_timestamp
			ORDER BY uc.account, uc.name			
			";
		
		$total_sql = "SELECT count(1) as total from ({$sql}) as t";
		$command = Yii::app()->db->createCommand($total_sql);
		$total = $command->queryScalar();
		
		
		$sql .= " LIMIT {$limit} OFFSET {$offset}  ";
		$command = Yii::app()->db->createCommand($sql);		
		$results = $command->queryAll();
		
		return array("total"=>$total, "results"=>$results);
	}
    
    public function search_contacts_by_name($user_id, $offset=0, $limit=20,$name)
    {
        $result = self::get_all_contacts($user_id, $offset=0, $limit=20,$name);
        return $result;
    }

}
