<?php

/**
 * Simple Contact Management App
 *
 * dal.php - Shared functions
 *
 */

/**
 * Get DB connection
 *
 * @return PDO
 */
function getDbConnection()
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

/**
 * Get contacts list from DB
 *
 * Returns an array of the form (contact ID => contact name)
 *
 * @return array|null (Returns null if no such contact exists or in case of database/sql error)
 */
function get_all_contacts()
{
    $dbh = getDbConnection();
	$sql = "SELECT * FROM contacts ORDER BY name";
    $stmt = $dbh->prepare($sql);
 
	if ($stmt->execute()){
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		//return $result;
		
		foreach($result as $data){
			$contactsList[$data['id']] = $data;
		}
		if (isset($contactsList)){return $contactsList;}
		else {return null;}

	}
	else{
		return null;
	}
}

/**
 * Get full contact information
 *
 * @param  integer $contactId
 * @return array|null (Returns null if no such contact exists)
 */
function get_contact($contactId)
{
    $dbh = getDbConnection();
	$sql = "SELECT * FROM contacts where id = ?";
    $stmt = $dbh->prepare($sql);
	
    if ($stmt->execute(array($contactId))){
		$result = $stmt->fetch(PDO::FETCH_ASSOC);
		return $result;
	}
	else{
		return null;
	}
}

/**
 * Add a contact to the DB
 *
 * Will return TRUE if the contact was saved
 *
 * @param  string $name
 * @param  string $email
 * @param  string $phone (Optional)
 * @param  string $image_path (Optional)
 * @return boolean
 */
function add_contact($name, $email, $phone = null, $image_path = null)
{
    $dbh = getDbConnection();
	$sql = 	"INSERT INTO contacts (name, email, phone_num, image_path) VALUES (?,?,?,?)";
    $stmt = $dbh->prepare($sql);
	if ($stmt->execute(array($name, $email, $phone, $image_path))){
		return true;
	}
	else{
		return false;
	}
}



/**
 * Delete a contact to the DB
 *
 * Will return TRUE if the contact was saved
 *
 * @param  integer $contactId
 * @return boolean
 */
function delete_contact($contactId)
{
    $dbh = getDbConnection();
	$sql = 	"DELETE FROM contacts WHERE id = ?";
    $stmt = $dbh->prepare($sql);
	if ($stmt->execute($contactId)){
		return true;
	}
	else{
		return false;
	}
}


