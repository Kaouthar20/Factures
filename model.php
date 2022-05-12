<?php
class Database{
    //laison avec db
    private $host="mysql:dbname=crud_ajax";
    private $user="root";
    private $pswd="";
    private function getConnection(){
    
try{
return new PDO($this->host,$this->user,$this->pswd);
}catch(PDOException $e){
   die('error:'.$e->getMessage()) ;
}
}
public function create(string $customer,string $cashier,int $amount,int $recieved,int $returned,string $state){
//insertion dans la abase de donnée
$q=$this->getConnection()->prepare("INSERT INTO factures(customer,cashier,amount,recieved,returned,state)VALUE(:customer,:cashier,:amount,:recieved,:state)");
return $q->execute([
'customer'=>$customer,
'cashier'=>$cashier,
'amount'=>$amount,
'recieved'=>$recieved,
'returned'=>$returned,
'state'=>$state
]);
}
}