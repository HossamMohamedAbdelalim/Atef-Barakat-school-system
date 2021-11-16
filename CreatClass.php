<?php
class usertype{
    public $ID;
    public $NAME;
    function __construct($ID);
    {
        $con  =  mysqli_connect("localhost" , "root", "","pase1");
        if(!$con)
        {
            die ('could not connect:' .mysqli_error() );
        }
        $sql = "Select  * from usertype where id = $ID";
        $StudentDataSet = mysqli_query($sql) or die (mysql_error());
        if($row = mysql_fetch_array( $StudentDataSet))
        {
            $this->ID=$row["ID"];
            $this->Name=$row["NAME"];
            
        }
    }
}

class usertype_pages{
    public $ID;
    public $USERTYPEObj;
    public $PageObj;

    function __construct($ID);
    {
        $con  =  mysqli_connect("localhost" , "root", "","pase1");
        if(!$con)
        {
            die ('could not connect:' .mysqli_error() );
        }
        $sql = "Select  * from usertype where id = $ID";
        $StudentDataSet = mysqli_query($sql) or die (mysql_error());
        if($row = mysql_fetch_array( $StudentDataSet))
        {
            $this->ID=$row["ID"];
            $this->USERTYPEObj = new USERTYPE();
            $this->PageObj = new Page();
            
            
        }
    }
}

class user
{
    public $ID;
    public $FullName;
    public $DOB;
    public $USERNAME;
    public $Address;
    public $EMAIL;
    public $USERTYPEObj;
    public $LINKObj;

    function __construct(!$ID == "")
    {
        $con  =  mysqli_connect("localhost" , "root", "","pase1");
        if(!$con)
        {
            die ('could not connect:' .mysqli_error() );
        }
        $sql = "Select  * from usertype where id = $ID";
        $StudentDataSet = mysqli_query($sql) or die (mysql_error());
        if($row = mysql_fetch_array( $StudentDataSet))
        {
            $this->ID=$ID;
            $this->FullName=$row["FullName"];
            $this->DOB=$row["DOB"];
            $this->USERNAME=$row["USERNAME"];
            $this->Address=$row["Address"];
            $this->EMAIL=$row["EMAIL"];
            $this->USERTYPEObj = new USERTYPE();
            $this->LINKObj = new LINK();

            
            
        }
    }

}

class tb_useres
{
    public $ID;
    public $FullName;
    public $Email;
    public $Password;
    public $DateOfBirth;
    public $UserTypeObj;

    function __construct($ID);
    {
        $con  =  mysqli_connect("localhost" , "root", "","pase1");
        if(!$con)
        {
            die ('could not connect:' .mysqli_error() );
        }
        $sql = "Select  * from usertype where id = $ID";
        $StudentDataSet = mysqli_query($sql) or die (mysql_error());
        if($row = mysql_fetch_array( $StudentDataSet))
        {
            $this->ID=$row["ID"];
            $this->FullName=$row["FullName"];
            $this->Email=$row["Email"];
            $this->Password=$row["Password"];
            $this->DateOfBirth=$row["DateOfBirth"];
            $this->UserTypeObj = new UserType();
            
            
        }
    }
}
class subjects
{
    public $ID;
    public $SUBJECT_NAME;
    public $SUBJECT_CODE;
    public $GRADE;
    public $DESCRIPTION;

    function __construct($ID);
    {
        $con  =  mysqli_connect("localhost" , "root", "","pase1");
        if(!$con)
        {
            die ('could not connect:' .mysqli_error() );
        }
        $sql = "Select  * from usertype where id = $ID";
        $StudentDataSet = mysqli_query($sql) or die (mysql_error());
        if($row = mysql_fetch_array( $StudentDataSet))
        {
            $this->ID=$row["ID"];
            $this->SUBJECT_NAME=$row["SUBJECT_NAME"];
            $this->SUBJECT_CODE=$row["SUBJECT_CODE"];
            $this->GRADE=$row["GRADE"];
            $this->ESCRIPTION=$row["ESCRIPTION"];
            
        }
    }
} 


class subjects_registiration_details
{ 
    public $ID;
    public $SUBJECTObj;
    public $REGISTIRATION_id;
    public $TimeStamp;
    public $ClassWorkGrade;
    public $FinalGrade;

    function __construct($ID);
    {
        $con  =  mysqli_connect("localhost" , "root", "","pase1");
        if(!$con)
        {
            die ('could not connect:' .mysqli_error() );
        }
        $sql = "Select  * from usertype where id = $ID";
        $StudentDataSet = mysqli_query($sql) or die (mysql_error());
        if($row = mysql_fetch_array( $StudentDataSet))
        {
            $this->ID=$row["ID"];
            $this->SUBJECTObj = new SUBJECT();
            $this->REGISTIRATION_id=$row["REGISTIRATION_id"];
            $this->TimeStamp=$row["TimeStamp"];
            $this->ClassWorkGrade=$row["ClassWorkGrade"];
            
        }
    }
}
class links_aka_perms
{ 
    public $ID;
    public $FRINDLYNAME;
    public $ADDRESS(LINKS);

    function __construct($ID);
    {
        $con  =  mysqli_connect("localhost" , "root", "","pase1");
        if(!$con)
        {
            die ('could not connect:' .mysqli_error() );
        }
        $sql = "Select  * from usertype where id = $ID";
        $StudentDataSet = mysqli_query($sql) or die (mysql_error());
        if($row = mysql_fetch_array( $StudentDataSet))
        {
            $this->ID=$row["ID"];
            $this->FRINDLYNAME=$row["FRINDLYNAME"];
            $this->ADDRESS=$row["ADDRESS"];
            
        }
    }
    
}
class educational_year
{ 
    public $ID;
    public $Name;
    
    function __construct($ID);
    {
        $con  =  mysqli_connect("localhost" , "root", "","pase1");
        if(!$con)
        {
            die ('could not connect:' .mysqli_error() );
        }
        $sql = "Select  * from usertype where id = $ID";
        $StudentDataSet = mysqli_query($sql) or die (mysql_error());
        if($row = mysql_fetch_array( $StudentDataSet))
        {
            $this->ID=$row["ID"];
            $this->Name=$row["Name"];
            
        }
    }
}

class subjects_registiration
{ 
    public $ID;
    public $EducationalYearObj;
    public $Student_ID;
    public $DateTimeStamp;
    public $isDeleted;

    function __construct($ID);
    {
        $con  =  mysqli_connect("localhost" , "root", "","pase1");
        if(!$con)
        {
            die ('could not connect:' .mysqli_error() );
        }
        $sql = "Select  * from usertype where id = $ID";
        $StudentDataSet = mysqli_query($sql) or die (mysql_error());
        if($row = mysql_fetch_array( $StudentDataSet))
        {
            $this->ID=$row["ID"];
            $this->EducationalYearObj = new EducationalYear();
            $this->Student_ID=$row["Student_ID"];
            $this->DateTimeStamp=$row["DateTimeStamp"];
            $this->isDeleted=$row["isDeleted"];
            
            
        }
    }
    
}

class pages
{ 
    public $ID;
    public $FrindlyName;
    public $LinkAddress;
    public $HTML;

    function __construct($ID);
    {
        $con  =  mysqli_connect("localhost" , "root", "","pase1");
        if(!$con)
        {
            die ('could not connect:' .mysqli_error() );
        }
        $sql = "Select  * from usertype where id = $ID";
        $StudentDataSet = mysqli_query($sql) or die (mysql_error());
        if($row = mysql_fetch_array( $StudentDataSet))
        {
            $this->ID=$row["ID"];
            $this->FrindlyName = new FrindlyName();
            $this->LinkAddress=$row["LinkAddress"];
            $this->DateTimeStamp=$row["DateTimeStamp"];
            $this->HTML=$row["HTML"];
            
            
        }
    }
    
}
?>