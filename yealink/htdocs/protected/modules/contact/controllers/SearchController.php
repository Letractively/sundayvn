<?php

class SearchController extends Controller
{
	
	public function actionIndex()
	{
		$this->render('index');
		}    
	public function actionSearchbyname()
	{
		$error_array = array();
		$modelUserPhones = new UserPhones();
		$serverName = '';//not sure now
		$userPhone = $modelUserPhones->find("phoneid=:phoneid",array(':phoneid'=>$_GET['phoneid']));
		if ($userPhone)
		{
			$user_id = $userPhone->attributes['user_id'];
			unset($userPhone);
			unset($modelUserPhones);
		}
		if (isset($user_id))
		{
			$modelContact = new Contact();
			$name = $_GET['name'];
			$arrUserContacts = $modelContact->search_contacts_by_name($user_id,NULL,NULL,$name);
			if (empty($arrUserContacts['results']))
			{
				$error_array[] = "Not found any contact with this search condition";
			}
		}
		else
		{
			$error_array[] = "This phoneid doesn't belong to any user";
		}
		if (isset($arrUserContacts) && empty($error_array))
		{
			$domDocument = new DOMDocument('1.0', "UTF-8");
			$firstChild = $domDocument->createElement($serverName.'IPPhoneDirectory');
			$domDocument->appendChild($firstChild);
			$domAtt = $domDocument->createAttribute('clearlight');
			$domAtt->value = 'true';
			$firstChild->appendChild($domAtt);
			$title = $domDocument->createElement('Title','Phonelist');
			$firstChild->appendChild($title);
			$promp = $domDocument->createElement('Prompt','Prompt');
			$firstChild->appendChild($promp);
			foreach ($arrUserContacts['results'] as $arrUserContact)
			{
			$DirectoryEntry = $domDocument->createElement('DirectoryEntry');
			$firstChild->appendChild($DirectoryEntry);
			$Name = $domDocument->createElement('Name',$arrUserContact['name']);
			$DirectoryEntry->appendChild($Name);
			$Telephone = $domDocument->createElement('Telephone',$arrUserContact['phones']);
			$DirectoryEntry->appendChild($Telephone);
			}
			$domDocument->formatOutput = true;
			$xmlC = $domDocument->saveXML();
			//var_dump($xmlC);
		}
		$dataRender = array('error_array'=>$error_array);
		if(isset($xmlC))
		{
			$dataRender['xmlC'] = $xmlC;
			$this->layout = false;
			header('Content-Type: text/xml');
			echo $xmlC;
		}
		else
		{
			$this->render('index',$dataRender);
		}
	}
	
}