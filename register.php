
<?php



include('database_connection.php');

$form_data = json_decode(file_get_contents("php://input"));

$message = '';
$validation_error = '';

if(empty($form_data->name))
{
 $error[] = 'Name is Required';
}
else
{
 $data[':name'] = $form_data->name;
}



if(empty($form_data->password))
{
 $error[] = 'Password is Required';
}
else
{
 $data[':password'] = $form_data->password ;
}

if(empty($error))
{
 $query = "
 INSERT INTO register (name, password) VALUES (:name, :password)
 ";
 $statement = $connect->prepare($query);
 if($statement->execute($data))
 {
  $message = 'Registration Completed';
 }
}
else
{
 $validation_error = implode(", ", $error);
}

$output = array(
 'error'  => $validation_error,
 'message' => $message
);

echo json_encode($output);


?>