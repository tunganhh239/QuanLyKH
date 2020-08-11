<?php

    class User extends DbConnection{
    
        public function getAllUser(){
            $sql=" SELECT * FROM user";
            $query= self::$connection->prepare($sql);
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
        public function getAllProduct(){
            $sql=" SELECT * FROM product";
            $query= self::$connection->prepare($sql);
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
        public function getAllTransaction(){
            $sql=" SELECT * FROM transaction";
            $query= self::$connection->prepare($sql);
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }


        public function getUserLogin($username,$password){
            $pass=md5($password);
            $sql="SELECT * from user WHERE username= :username AND password= :password";
            $query=self::$connection->prepare($sql);
            $query->bindParam(':username',$username,PDO::PARAM_STR);
            $query->bindParam(':password',$pass);
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }

        public function insertUser($firstname,$lastname, $username,$password, $dob,
         $email, $phone, $address, $create_time, $update_time,$role,$status,$image){
            $sql= "INSERT INTO user(username, password, firstname, lastname, dob,email,phone,status,create_at,update_at,RoleId,Address,image)
                   values (:username,:password,:firstname,:lastname,:dob,:email,:phone,:status,:create_time,:update_time,:role,:address,:image)";
            $query= self::$connection->prepare($sql);
            $query->bindParam(':username',$username);
            $query->bindParam(':password',$password);
            $query->bindParam(':firstname',$firstname);
            $query->bindParam(':lastname',$lastname);
            $query->bindParam(':dob',$dob);
            $query->bindParam(':email',$email);
            $query->bindParam(':phone',$phone);
            $query->bindParam(':status',$status);
            $query->bindParam(':create_time',$create_time);
            $query->bindParam(':update_time',$update_time);
            $query->bindParam(':role',$role);
            $query->bindParam(':address',$address);
            $query->bindParam(':image',$image);
            $query->execute();
            return true;
        }
        
        public function deleteUser($id){
            $sql="delete from user where id= :id";
            $query = self::$connection->prepare($sql);
            $query->bindParam(':id',$id);
            $query->execute();
            return true;
        }
        public function updateUser($firstname,$lastname, $username,$password, $dob,
         $email, $phone, $address, $update_time,$role,$status,$id){
            $sql="update user set firstname =:firstname,
                                  lastname =:lastname,
                                  username =:username,
                                  password =:password,
                                  dob =:dob,
                                  email =:email,
                                  phone =:phone,
                                  status =:status,
                                  update_at =:update_time,
                                  RoleID =:role,
                                  Address =:address where id =:id
                                  ";
            $query = self::$connection->prepare($sql);
            $query->bindParam(':firstname',$firstname);
            $query->bindParam(':lastname',$lastname);
            $query->bindParam(':username',$username);
            $query->bindParam(':password',$password);
            $query->bindParam(':dob',$dob);
            $query->bindParam(':email',$email);
            $query->bindParam(':phone',$phone);
            $query->bindParam(':status',$status);
            $query->bindParam(':update_time',$update_time);
            $query->bindParam(':role',$role);
            $query->bindParam(':address',$address);
            $query->bindParam(':id',$id);
            $query->execute();
            return true;
        }

        public function getUser($id){
            $sql="select * from user where id= :id";
            $query = self::$connection->prepare($sql);
            $query->bindParam(':id',$id);
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
        
        public function getCreateday(){
            $sql= "SELECT create_at as x, COUNT(create_at) as y
            FROM user
            GROUP BY create_at; ";
            $query= self::$connection->prepare($sql);
            $query->execute();
            $result = $query->fetchAll(\PDO::FETCH_OBJ);
            return $result;
        }
        
        public function getTransaction(){
            $sql= "select user.id, user.firstname,user.lastname, transaction.quantity,transaction.create_at, product.price, product.name,product.id as productid
            from transaction
            inner join user on user.id= transaction.UserID 
            inner join product on product.id= transaction.ProductID";
            $query= self::$connection->prepare($sql);
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }

        public function searchUser($key){
            $sql ="select * from user where lastname like :key or firstname like :keykey LIMIT 10";
            $query = self::$connection->prepare($sql);
            $keyy = "%$key%";
            $query->bindParam(':key',$keyy);
            $query->bindParam(':keykey',$keyy);
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }

        public function getUserTransaction($id){
            $sql= "select user.id, user.firstname,user.lastname, transaction.quantity,transaction.create_at, product.price, product.name,product.id as productid
            from transaction
            inner join user on user.id= transaction.UserID and user.id = :id
            inner join product on product.id= transaction.ProductID";
            $query = self::$connection->prepare($sql);
            $query->bindParam(':id',$id);
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
    }
?>