<?php

require 'vendor/autoload.php';
 
 use Salaros\Vtiger\VTWSCLib\WSClient;
    
 use magnusbilling\api\magnusBilling; 

require_once "magnusteste/vendor/autoload.php";



function updateEntities(){
    
//ibvox magnus billing API login
$server1= new MagnusBilling('TOKEN-HERE', 'API-KEY-HERE');
$server1->public_url = "https://URL-HERE/mbilling";

//sipaws magnus billing API login
$server2 = new MagnusBilling('TOKEN-HERE', 'API-KEY-HERE');
$server2->public_url = "https://URL-HERE"; 

//xpi magnus billing API login
$server3 = new MagnusBilling('TOKEN-HERE', 'API-KEY-HERE');
$server3->public_url = "https://URL-HERE/";

//clave magnus billing API login
$server4 = new MagnusBilling('TOKEN-HERE', 'API-KEY-HERE');
$server4->public_url = "https://URL-HERE/mbilling/";

//guide magnus billing API login
$server5 = new MagnusBilling('TOKEN-HERE', 'API-KEY-HERE');
$server5->public_url = "https://URL-HERE/";


//vtiger API login
$client = new WSClient('https://URL-HERE/liguecrm/', 'USERNAME', 'ACESSKEY');

//queries the vtiger data searching for last record with maching params
$queryy = "SELECT accountname, email1, fax, cf_964, cf_968, 
   createdtime FROM Accounts WHERE createdtime LIKE '%2023%' ORDER BY createdtime DESC LIMIT 0, 1";

    $arrayacc=$client->runQuery("$queryy");

    print_r($arrayacc);

    //function to create a random password every time its called 
function randomPw(){
    $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    $lenght = 8;
    $pw = '';

    $charsLenght = strlen($chars);
    for ($i = 0; $i < $lenght; $i++){
        $pw .= $chars[rand(0, $charsLenght - 1)];
    }
    return $pw;
}

    //declaring values of the response from API to pass to magnusbilling servers
     $accountname = ($arrayacc[0]["accountname"]);
     $email = ($arrayacc[0]["email1"]);
     $username = ($arrayacc[0]["cf_968"]);
     $password = randomPw();

    //turn the array into json 
    $JSON = json_encode($arrayacc, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES); 
    
    if ($JSON == "null"){
        echo 'No Records Found With This Query';
    }
    else{
         echo "<pre>";
               print_r($arrayacc); 
         echo "</pre>";
        }
    
        //gets the servers setted up for the account in Viger
        //cf_964 is the id of a custom field to identify the server the data gonna go in
        $response = $arrayacc[0]["cf_964"];

        

       //check if there´s only one or more than one server in the record
       if (strpos($response, ' |##| ') !== false) {
            $array = explode(" |##| ", $response);
       }
       else {
              $array = [$response];
            }

// Iterate through each value in the array
foreach ($array as $value) {
   
    // Check if the value exists in the array
    if (in_array($value, $array)) {
        
        // Perform the corresponding action based on the value
        switch ($value) {
            
                case "server1":
              performActionForserver1($server1, $username, $accountname, $password, $email);
                
                break;
            
                case "server2":
              performActionForserver2($server2, $username, $accountname, $password, $email);
                
                break;
            
                case "server3":
              performActionForserver3($server3, $username, $accountname, $password, $email);
                
                break;
            
                case "server4":
              performActionForserver4($server4, $username, $accountname, $password, $email );
                
                break;

                case "server5":
              performActionForserver5($server5, $username, $accountname, $password, $email);

                break;
            
                default:
                // Handle unrecognized value
                break;
        }
    }
}




}


// Define the functions for each value

/**
 * Summary of performActionFor...
 * @param mixed server
 * @param mixed $username
 * @param mixed $accountname
 * @param mixed $password
 * @param mixed $email
 * @return void
 */

function performActionForserver1($server1, $username, $accountname, $password, $email)
{
     $server1;
  
     $username;
     $accountname;
     $password;
     $email;

    $rresult = $server1->createUser([
        'username'  => "$username",
        'active'    => '1',
        'firstname' => "$accountname",
        'password'  => "$password",
        'email'     => "$email",
       
    ]);
 

  $users = json_encode($rresult, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_OBJECT_AS_ARRAY );

    echo "<pre>";
        print_r($users);
    echo"</pre>";


}


function performActionForserver2($server2, $username, $accountname, $password, $email)
{
     $server2;

     $username;
     $accountname;
     $password;
     $email;

     $rresult = $server2->createUser([
        'username'  => "$username",
        'active'    => '1',
        'firstname' => "$accountname",
        'password'  => "$password",
        'email'     => "$email",
        
    ]);

    $users = json_encode($rresult, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_OBJECT_AS_ARRAY );

    echo "<pre>";
       print_r($rresult);
    echo"</pre>";
                 
    
}

function performActionForserver3($server3, $username, $accountname, $password, $email)
{
  
     $server3;

     $username;
     $accountname;
     $password;
     $email;

     $rresult = $server3->createUser([
        'username'  => "$username",
        'active'    => '1',
        'firstname' => "$accountname",
        'password'  => "$password",
        'email'     => "$email",

    ]);
 

    $users = json_encode($rresult, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_OBJECT_AS_ARRAY );

    echo "<pre>";
    print_r($rresult);
    echo"</pre>";
                                
  }

function performActionForserver4($server4, $username, $accountname, $password, $email)
{
    
     $server4;

     $username;
     $accountname;
     $password;
     $email;

    $result = $server4->createUser([
        'username'  => "$username",
        'active'    => '1',
        'firstname' => "$accountname",
        'password'  => "$password",
        'email'     => "$email",
    ]);

  }

  function performActionForserver5($server5, $username, $accountname, $password, $email)
{
    
     $server5;

     $username;
     $accountname;
     $password;
     $email;

    $result = $server5->createUser([
        'username'  => "$username",
        'active'    => '1',
        'firstname' => "$accountname",
        'password'  => "$password",
        'email'     => "$email",
    ]);

    $users = json_encode($result, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_OBJECT_AS_ARRAY );

    echo "<pre>";
    print_r($result);
    echo"</pre>";

  }


  updateEntities();
    

  
?>