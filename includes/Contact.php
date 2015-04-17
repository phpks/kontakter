<?php

class Contact{

	public function __construct($id,
								$name,
								$phoneNum,
								$imagePath,
								$email){
			$this->id = $id;
			$this->name = $name;
			$this->phoneNum = $phoneNum;
			$this->imagePath = $imagePath;
			$this->email = $email;
	}

	/**
	 * Get DB connection
	 *
	 * @return PDO
	 */
	private static function getDbConnection()
	{
		$dbUri  = 'mysql:host=127.0.0.1;dbname=kontaktor';
		$dbUser = 'kontaktor';
		$dbPass = 'kfs2015';

		// Connect, and set error mode to Exceptions
		$dbh = new PDO($dbUri, $dbUser, $dbPass, array(
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
		));
		
		return $dbh;
	}

	// properties
	public $id;
	public $name;
	public $phoneNum;
	public $imagePath;
	public $email;
	
	/**
	 * Get full contact information
	 *
	 * @param  integer $contactId
	 * @return array|null (Returns null if no such contact exists)
	 */
	static public function getContact($id){
		$dbh = Contact::getDbConnection();
		$sql = "SELECT * FROM contacts where id = ?";
		$stmt = $dbh->prepare($sql);
		
		if ($stmt->execute(array($contactId))){
			$result = $stmt->fetch(PDO::FETCH_ASSOC);
			$tempContact = new Contact(	$result['id'],
										$result['name'],
										$result['phone_num'],
										$result['image_path'],
										$result['email']);			
			return $tempContact;
		}
		else{
			return null;
		}		
	}

	/**
	 * Get contacts list from DB
	 *
	 * Returns an array of Contacts
	 *
	 * @return array|null 
			(	Returns null in case of database/sql error. 
				Returns an empty array if no contacts exist.	)
	 */	
	static public function getAllContacts(){
		$dbh = Contact::getDbConnection();
		$sql = "SELECT * FROM contacts ORDER BY name";
		$stmt = $dbh->prepare($sql);
	 
		if ($stmt->execute()){
			$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
			
			foreach($result as $data){
				$tempContact = new Contact(	$data['id'],
										$data['name'],
										$data['phone_num'],
										$data['image_path'],
										$data['email']);			
			
				$contactsList[] = $tempContact;
			}
			if (isset($contactsList)){return $contactsList;}
			else {return null;}

		}
		else{
			return null;
		}		
	}
	
	// methods
	public function saveContact(){}

}