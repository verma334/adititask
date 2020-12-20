<?php
    include'./config/db1.php';
    function fetchRecordAll($entity,$start=0,$end=10){
        global $con;
        // fetch records for entity(category, article, comment) where status is true
        // start and end will control the behaviour for pagination  
       $sql="select * from ".$entity." where status ='active' ";
       $res=mysqli_query($con,$sql);
       $data=array();
       if(mysqli_num_rows($res)>=1){
           while($record=mysqli_fetch_assoc($res)){
               $data[]=$record;
             }
             return $data;
       }else {
           return false;
       }
        
    }

    function fetchRecordSpecific($entity,$primary){
        // fetch single record for entity(category, article, comment)
       

    }

    function insertRecord($entity,$data){
        // insert single record for entity(category, article, comment) with data passed
        //echo 'Insert Called';
       /// $data['name'];
        if($entity=="category"){
            $sql="INSERT INTO `category` (`cid`, `name`, `description`, `status`, `created`, `updated`) VALUES ('".$data[cid]."', 'mini', 'kiyy', 'active', '2020-12-16 16:11:46.000000', '2020-12-24 16:11:46.000000')";
            $res=mysqli_query($con,$sql);
            if(mysqli_affected_rows($con)>0){
                echo "record inserted";
            }else{
                echo "record not inserted";
            }
            if($entity=="comment"){
                $Sql="INSERT INTO `comment` (`c_id`, `person`, `content`, `created`, `article`, `status`) VALUES ('104', 'bhoomi', 'yub', '2020-12-23 16:15:20.000000', 'jiiu', 'active')";
                $res=mysqli_query($con,$sql);
                if(mysqli_affected_rows($con)>0){
                    echo "record inserted";
                }else{
                    echo "record not inserted";
                }
                if($entity=="article"){
                  $sql="INSERT INTO `article` (`aid`, `author`, `category`, `title`, `content`, `created`, `updated`, `status`) VALUES ('103', 'william', 'english', ' english stationary', 'this is english book stationary ', '2020-12-16 18:29:00', '2020-12-30 18:29:00', 'A'), ('104', 'RD sharma', 'Maths', 'maths stationary', 'this is maths stationary', '2020-12-17 18:29:00', '2020-12-31 18:29:00', '')";
                  if(mysqli_affected_rows($con)>0){
                    echo "record inserted";
                }else{
                    echo "record not inserted";
                }
                }
            }


        }
       
    }

    function updateRecord($entity,$primary,$data){
        // update single record for entity(category, article, comment) using its primary key with data passed
        if($entity=="category"){
            $sql="UPDATE `category` SET description='sql' WHERE `cid`=102";
            $res=mysqli_query($con,$sql);
                if(mysqli_affected_rows($con)>0){
                    echo "record updated";
                }else{
                    echo "record not updated";
                }
                if($entity=="comment"){
                    $sql="UPDATE `comment` SET person='aditi' WHERE `c_id`=101";
                    $res=mysqli_query($con,$sql);
                if(mysqli_affected_rows($con)>0){
                    echo "record updated";
                }else{
                    echo "record not updated";
                }
                

                }

        }
    }

    function deleteRecord($entity,$primary){
        // delete single record for entity(category, article, comment) using its primary key
        if($entity="category"){
            $sql="DELETE FROM `category` WHERE `cid`=102";
            $res=mysqli_query($con,$sql);
                if(mysqli_affected_rows($con)>0){
                    echo "record deleted";
                }else{
                    echo "record not deleted";
                }
            }
                if($entity="comment"){
                      $sql="DELETE FROM COMMENT WHERE `c_id`=104";
                      $res=mysqli_query($con,$sql);
                if(mysqli_affected_rows($con)>0){
                    echo "record deleted";
                }else{
                    echo "record not deleted";
                }
                }

                

        }

    

    function authenticate($username, $pwd){
        // if successful, redirect to dashboard
        // else stay on login page
       global $con;
       $sql="select * from user where email='".$username."' and pwd='".$pwd."'";
       $res=mysqli_query($con,$sql);
       $data= array();
       if(mysqli_num_rows($res)>0){
           while($record=mysqli_fetch_assoc($res)){
               $data[]=$record;
             }
             return true;
       }else {
           return false;
       }


        }
       
    
?>