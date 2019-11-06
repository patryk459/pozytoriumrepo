<?php

$db_server = 'localhost';
$db_user ='zsht';
$db_pass = '1234';
$db_name = 'zsht';
function dbConnect($db_server,$db_user,$db_name,$db_pass){
try{
    $db_conn = new PDO('mysql:host='.$db_server.';dbname='.$db_name,$db_user,$db_pass);
    $db_conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);        
} catch(PDOException $e){
    echo $e->getMessage();
}
return $db_conn;
}
$db_conn = dbConnect($db_server,$db_user,$db_name,$db_pass);
$db_query = $db_conn->query('select * from nauczyciele');
foreach($db_query as $row){
    echo '<div>'; //rozpoczyna diva
    echo $row['id']; //wyswietla id
    echo ' - ';
    echo $row['imie'];  //wyswietla imiona w bazie wszystkie
    echo '  '; //spacja
    echo $row['nazwisko']; 
    echo ' ( '; //początek nawiasu
    echo $row['pesel'];
    echo ')';
    echo '</div>';

}
?>