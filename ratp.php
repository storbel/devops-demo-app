<?php
// Load Config
$config = parse_ini_file('config.ini');

// Declare Variables
$dbSuccess = false;
$dbVersion = false;

?>
<!DOCTYPE html>
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="book.ico">

    <title>RATP API Application</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="cover.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
 <style>
body {background-color: powderblue;}
    div {
  background-image: url("https://mdn.mozillademos.org/files/6457/mdn_logo_only_color.png");
}
    </style>
    
</head>

<body>

<div class="site-wrapper">

    <div class="site-wrapper-inner">

        <div class="cover-container">

            <div class="inner cover">
                <h1 class="cover-heading">RATP API QUERY APPLICATION</h1>
                <p class="lead"><i>This app is used for demonstrating and testing various DevOps, CI, and CD concepts.</i></p>
                
                
                <form action="" method="POST">
<label>Enter Order ID:</label><br />
<input type="text" name="type_ligne" placeholder="Entrer type de ligne" required/>
                    <br /><br /><span><ul>
                                    <li>metros</li>
                    <li>tramways</li>
                    <li>buses</li>
                    <li>rers</li>
                    <li>noctiliens</li>
                                    <span>
<button type="submit" name="submit">Submit</button>
</form>
                
                
    <?php
if (isset($_POST['type_ligne']) && $_POST['type_ligne']!="") {
 $type_ligne = $_POST['type_ligne'];
 $url = "https://api-ratp.pierre-grimaud.fr/v4/lines/".$type_ligne;
 
 $client = curl_init($url);
 curl_setopt($client,CURLOPT_RETURNTRANSFER,true);
 $response = curl_exec($client);
 
 $result = json_decode($response);
 
 echo "<table>";
 echo "<tr><td>Code:</td><td>$result->code</td></tr>";
 echo "<tr><td>Name:</td><td>$result->name</td></tr>";
 echo "<tr><td>Directions:</td><td>$result->directions</td></tr>";
 echo "<tr><td>Id:</td><td>$result->id</td></tr>";
                    
 echo "</table>";
}
    ?>            

           
        </div>
    </div>
</div>

</body></html>
