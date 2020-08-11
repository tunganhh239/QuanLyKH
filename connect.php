<?php
    class DbConnection {
        protected $usernameDB="root";
        protected $passwordDB="123456";
        protected $host="localhost";
        protected $database="customer_management";
        protected $tableName;
        protected static $connection;
        
        
        public function __construct()
        {
            $this->connect();
        }

        public function connect(){
            if(self::$connection==null){ 
                try{
                    

                    
                        self::$connection= new PDO('mysql:host=localhost;dbname=customer_management',$this->usernameDB, $this->passwordDB);   
                        self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        $sql=" SELECT * FROM user";
                        // $query = $pdo->prepare($sql);
                        // $query->execute();
                        // $result= $query->fetchAll(PDO::FETCH_ASSOC);
                        // foreach($result as $item){
                        //     var_dump($item);
                        // }
                        // $result= self::$connection->query($sql);
                        // $row= $result->fetch();
                        
                }catch(Exception $e){
                        echo "Error: ".$e->getMessage();
                        die();
                }  
            }
            return self::$connection;
        }
    }
