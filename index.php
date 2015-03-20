<!DOCTYPE html>
<?php 
	require_once ('includes/dal.php'); 
	$contacts = get_all_contacts();
	// $contact = array
	// ( 
	// 	array('id' => '1','name' => 'dudu', 'phone_num' => '056565656', 'img_path' => '1.png'),
	// 	array('id' => '2','name' => 'mumu', 'phone_num' => '056565656', 'img_path' => 'amama.png'),
	// 	array('id' => '3','name' => 'yuyu', 'phone_num' => '056565656', 'img_path' => 'default.png')
	// );
?>

<html lang="en">
	<head>
	<script type="text/javascript" > 
	console.log("javascript online");
	</script>
		<meta charset="utf-8">
		<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame
		Remove this if you use the .htaccess -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title>HTML</title>
		<meta name="description" content="">
		<meta name="author" content="Doron">
		<meta name="viewport" content="width=device-width"  initial-scale="1.0">
		<!-- Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
		<link rel="shortcut icon" href="/favicon.ico">
		<link rel="apple-touch-icon" href="/apple-touch-icon.png">
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>

	<body>
	<div>
	<h1>WELCOME TO KONTAKTER</h1>
	<table border="1" cellspacing="0" cellpadding="0" width="600px">
		<thead>
			<th>id</th>
			<th> name</th>
			<th> phone</th>
			<th> image</th>
		</thead> 
		<tbody>
		<?php var_dump(get_all_contacts()); ?>
		<?php foreach (get_all_contacts() as $contact) { ?>
			<tr>
			<td><?php echo $contact['id'] ?></td>
			<td><?php echo $contact['name'] ?></td>
			<td><?php echo $contact['phone_num'] ?></td>
			<td> <img src="images/<?php echo $contact['image_path'] ?>" alt="">  </td>
			</tr>	
		<?php } ?>
		</tbody>	
	</table>
	</div>	
	</body>
</html>
