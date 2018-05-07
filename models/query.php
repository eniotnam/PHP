<?php
require_once 'db.php';
class query extends db{

    public function getDb(){
      return Db::getInstance();
    }
    

//    public function LoginAdmin($mail, $password){
//        $dbh = $this->getDb();
//        $stmt = $dbh->prepare('SELECT * FROM users WHERE email = :mail, pwd = :pwd ');
//        $stmt->bindValue(':mail', $mail, PDO::PARAM_STR);
//        $stmt->bindValue(':pwd', $password, PDO::PARAM_STR);
//        $stmt->execute();
//        $users = $stmt->rowCount();
//        if ($users == 1) {
//            $_SESSION['connected'] = true;
//            $_SESSION['rank'] = $users[0]['rank'];
//            if($_SESSION['rank'] == 'Admin'){
//                session_start();
//                header('Location:/admin/');
//            }
//            header('Location:index.php');
//        }
//    }

   
    
    public function select($col, $table,$details=null){
        $dbh = $this->getDb();
        
        $query = "SELECT $col FROM $table WHERE $details";
        $queryout = "SELECT $col FROM $table";
        
        $request= ($details)?$query:$queryout;
        $stmt = $dbh->prepare($request);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

  
    public function insert($table, $col, $new ){
        $dbh = $this->getDb();
        $query = "INSERT INTO $table ($col) VALUES ($new)";
        $stmt = $dbh->prepare($query);
        $stmt->execute();
       

    }
    public function delete($table, $details){
        $dbh = $this->getDb();
        $query = "DELETE FROM $table WHERE $details";
        $stmt = $dbh->prepare($query);
        $stmt->execute();
    }
    
    public function update($table, $col , $new , $id){
        $dbh = $this->getDb();
        $col=explode(',',$col);
        $new=explode(',',$new);
        
        for($i=0; $i < sizeof($col); $i++){
            $query = "UPDATE $table SET $col[$i] = $new[$i] WHERE id = $id";
            $stmt = $dbh->prepare($query);
            $stmt->execute();
        }
    }
  
    
}