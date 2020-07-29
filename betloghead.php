 <?php
session_start();


   
		$con=mysqli_connect("localhost","root","","MocoMogo");
		// Check connection
		if (mysqli_connect_errno())
		  {
		  echo "Failed to connect to MySQL: " . mysqli_connect_error();
		  }
		    $userID = $_SESSION['userID'];
  $query="SELECT * FROM user 
        WHERE userID = '$userID'";
	$ret=mysqli_query($con,$query);
    $count=mysqli_num_rows($ret);
    $arr=mysqli_fetch_array($ret);
    $userName=$arr[1];

$result1 = mysqli_query($con,"SELECT * FROM betlog WHERE betType='head' ORDER BY betID DESC");

while($extract = mysqli_fetch_array($result1)) 
{
	echo "<span>". $extract['userName']." bet " . $extract['betCash'] . "</span><br>";
}