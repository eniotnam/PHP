<?php

require_once 'models/query.php';

$query = new query;

$all=$query->select('*','article');
foreach($all as $art){
    echo $art['id']." ";
}
echo "<br>FIN<br><br>";

$id=$query->select('*','article','titre is not null');
foreach($id as $art){
    echo $art['id']." ";
}
echo "<br>FIN<br><br>";

$query->insert('user','nom,email,mdpcrypt','\'jhon\',\'jhonemail\',\'bite\'');
$all=$query->select('*','user','id = 8');
if(!$all){
    echo "n'existe pas ou plus";
}
foreach($all as $art){
    echo $art['id']." ";
}
echo "<br>FIN<br><br>";

$query->delete('user','id=8');
$all=$query->select('*','user');
foreach($all as $art){
    echo $art['id']." ";
}
echo "<br>FIN<br><br>";
$query->update('user','nom,email','\'bob\',\'lebrico\'','12');
$all=$query->select('*','user');
foreach($all as $art){
    echo $art['nom']." ".$art['email']."<br>";
}
echo "<br>FIN<br><br>";

?>
