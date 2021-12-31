<?php
require_once("system database");
require_once("My DB.php");
 abstract class user
{
    public $ID;
    public $FullName;
    public $DOB;
    public $USERNAME;
    public $password;
    public $Address;
    public $EMAIL;
    public $USERTYPEObj;
    public $LINKObj;  
    
    function __construct($id)
    {
        
        if (!$id)
        return;
        $stmt = DatabaseConnection::getInstance()->database_connection-> prepare(
            "SELECT * FROM user WHERE user.id=?"

        );   
        if($id !="")
        {
            $sql="select * from user where ID=?";
            $stmt->bind_param('i', $id);
            $result = $stmt->execute();

           if (!$result) {
                die("User with $id not found.");
                return;
            }

            $result = $stmt->get_result()->fetch_assoc();

            $this->id = $id;
            $this->FullName = $result["FullName"];
            $this->EMAIL = $result["EMAIL"];
            $this->password = $result["Password"];
            $this-> Address = $result["Address"];
            $this->signupDate = $result["SignupDate"];
           // $this->USERTYPEObj = new USERTYPE();
           // $this->LINKObj = new LINK();

        }

    }

    public function creat()
    {
       if(isset($_POST['submit'])) {
        $FullName = $_POST['FullName'];
        $ID = $_POST['ID'];
        $DOB = $_POST['DOB'];
        $USERNAME = $_POST['USERNAME'];
        $password = $_POST['password'];
        $Address = $_POST['Address'];
        $EMAIL = $_POST['EMAIL'];
       }

       $sql = "INSERT INTO  'user' ('FullName','DOB' , 'USERNAME', 'password', 'Address', 'EMAIL') VALUES ('$FullName', '$DOB',  $USERNAME', '$password' , ' $Address', '  $EMAIL')  ";
        
       $result = DatabaseConnection::getInstance()->database_connection->query($sql);

       if($result == TRUE)
       {
           echo "New record created succesfully";

       }

       else {
           echo "Error:" .$sql . "<br>". DatabaseConnection::getInstance()->database_connection->error;
       }


    }

   

    public function update()
    {
       if(isset($_POST['update'])) {
        $FullName = $_POST['FullName'];
        $ID = $_POST['ID'];
        $DOB = $_POST['DOB'];
        $USERNAME = $_POST['USERNAME'];
        $password = $_POST['password'];
        $Address = $_POST['Address'];
        $EMAIL = $_POST['EMAIL'];
       }

       $sql = "UPDATE  'user' SET 'FullName' = $FullName, 'ID' = $ID  ,'DOB' =  $DOB, 'USERNAME' = $USERNAME, 'password' =  $password , 'Address' = $Address, 'EMAIL' = $EMAIL   ";
        
       $result = DatabaseConnection::getInstance()->database_connection->query($sql);

       if($result == TRUE)
       {
           echo "New record Updated succesfully";

       }

       else {
           echo "Error:" .$sql . "<br>". DatabaseConnection::getInstance()->database_connection->error;
       }


    }


    public function delete()
    {
       if(isset($_GET['id'])) {
       $user_id = $_GET['id'];
       
       }

       $sql = "DELETE  FRoM 'user' WHERE 'id' = '$user_id'";
        
       $result = DatabaseConnection::getInstance()->database_connection->query($sql);

       if($result == TRUE)
       {
           echo " Record deleted succesfully";

       }

       else {
           echo "Error:" .$sql . "<br>". DatabaseConnection::getInstance()->database_connection->error;
       }


    }

   

    public static function SelectAllusersInDB()
	{
        $StudentDataSet = "";
		$db = DatabaseConnection::getInstance();
		$sql="select * from student order by FullName";
		$StudentDataSet = mysqli_connect($sql) ;
		
		$i=0;
		$Result = "";
		while ($row = mysqli_fetch_array($StudentDataSet))
		{
			$MyObj= new student($row["Id"]);
			$Result[$i]=$MyObj;
			$i++;
		}
		return $Result;
		
	}

}




?>