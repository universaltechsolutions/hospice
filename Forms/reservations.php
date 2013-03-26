<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head><!-- #BeginTemplate "pages.dwt" -->





<meta http-equiv="Content-Type" content="text/html; charset=windows-1252"><!-- #BeginEditable "doctitle" --><title>Parkwood RV Park &amp; Cottages, Statesboro, GA</title>


<meta name="description" content="Parkwood recreational vehicle RV park located in Statesboro, GA.">
<meta name="keywords" content="rv park, statesboro, georgia, recreational, vehicle, georgia, southeastern, camping, campgrounds, accommodations, local attractions, Winter home, shopping, restaurants, pull through sites, laundry, swimming pool, walking paths, historic, Savannah, full hookups, telephone/internet, cable TV available, 20-30-50 amps, mega lots, play horseshoes, Georgia Southern University Botanical Gardens, vacation cottage rentals, free wifi, cottages, Savannah">
<style type="text/css">
.style9 {
	border: 1px solid #663300;
	text-align: center;
}
.style10 {
	border: 2px solid #663300;
	background-color: #FFFFFF;
}
.style12 {
	margin-left: 10px;
	margin-right: 10px;
}
</style><!-- #EndEditable -->

<meta name="copyright" content="Copyright © 2004-2008, Parkwood RV & Cottages">
<meta name="rating" content="General">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<meta name="MSSmartTagsPreventParsing" content="true">


<meta name="PUBLISHER" content="Parkwood RV & Cottages">
<meta name="LANGUAGE" content="English">
<meta name="ROBOTS" content="index">
<meta name="ROBOTS" content="follow">
<meta name="REVISIT-AFTER" content="30 days">

<link rel="stylesheet" type="text/css" href="index_files/style.css">
<style type="text/css">
.style9 {
	background-color: #FFFFFF;
}
.style11 {
	color: #FFFFFF;
	font-weight: bold;
}
</style></head><body style="background-color: rgb(153, 153, 102);">

<table style="width: 80%;" class="style1" align="center" cellpadding="3" cellspacing="0">
<tbody><tr>
<td class="style7">
<p class="center">
<img alt="Parkwood RV Park &amp; Cottages" src="index_files/newlogo.jpg" height="175" width="604"></p></td>
</tr>

<tr>
<td class="style9">
<!-- #BeginEditable "body" -->

<?php

//Check to make sure a  Credit Card Number is in there
if( strlen( $_POST["credit_card_number"] ) < 15 )
{ echo "<b>ERROR:  Valid Credit Card Number required to make a reservation. </b>"; }
else
{
// Connecting, selecting database
$link = mysql_connect('localhost', 'parkwood', 'p4RKw00D')
    or die('Could not connect: ' . mysql_error());

mysql_select_db('parkwood') or die('Could not select database');

$query = "INSERT INTO `reservations` (`Returning_Cust`, `Name`, `Address`, `City`, `State`, `Zip`, `Day_Phone`, `Evening_Phone`, `Cell_Phone`, `Email`, `Arrival_Date`, `Departure_Date`, `RV_Type`, `Slideouts`, `Vehicle_Size`, `No_of_Adults`, `No_of_Children`, `No_of_Children_under_6`, `No_of_pets`, `breed_of_pet`, `Club_Membership`, `credit_card_name`, `credit_card_number`, `credit_card_type`, `expiration_date`, `authorization_code`, `good_sam_number`)
          VALUES ('".$_POST["Returning_Cust"]."', '".$_POST["Name"]."', '".$_POST["Address"]."', '".$_POST["City"]."', '".$_POST["State"]."', '".$_POST["Zip"]."', '".$_POST["Day_Phone"]."', '".$_POST["Evening_Phone"]."', '".$_POST["Cell_Phone"]."', '".$_POST["Email"]."', '".$_POST["Arrival_Date"]."', '".$_POST["Departure_Date"]."', '".$_POST["RV_Type"]."', '".$_POST["Slideouts"]."', '".$_POST["Vehicle_Size"]."', '".$_POST["No_of_Adults"]."', '".$_POST["No_of Children"]."', '".$_POST["No_of_Children_under_6"]."', '".$_POST["No_of_pets"]."', '".$_POST["breed_of_pet"]."', '".$_POST["Club_Membership"]."', '".$_POST["credit_card_name"]."', '".$_POST["credit_card_number"]."', '".$_POST["credit_card_type"]."', '".$_POST["expiration_date"]."', '".$_POST["authorization_code"]."', '".$_POST["good_sam_number"]."')";

$result = mysql_query($query) or die('Query failed: ' . mysql_error());

echo "<b>Reservation Sent.  An email will be sent to ".$_POST["Email"]." confirming your reservation within 24 hours.</b>";

$txt = "You have a new online reservation from ".$_POST["Name"].". \nPlease login to the db to get their information.\n
		https://www.parkwoodrv.com:1443/admin.php?resname=".urlencode($_POST["Name"])."";

// Use wordwrap() if lines are longer than 70 characters
$txt = wordwrap($txt,70);

// Send email
mail("parkwood@parkwoodrv.com","You have a new online reservation!",$txt, "From: parkwood@parkwoodrv.com");

// Closing connection
mysql_close($link);
}
?>

