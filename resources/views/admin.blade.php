<?php
//require __DIR__ . '/vendor/autoload.php';

//require_once("/opt/bitnami/apache2/htdocs/vendor/sparkapi4p2/lib/Core.php");
/*
$api = new SparkAPI_Bearer("7pj843r6skkp6fgtq6yalfilm");
$api->SetApplicationName("MyPHPApplication/1.0");
$result = $api->GetMyListings();
 if ($result === false) {
      echo "API Error Code: {$api->last_error_code}<br>\n";
      echo "API Error Message: {$api->last_error_mess}<br>\n";
      exit;
 } else {
      // enter outcome here if successful call (for example print_r($resultscheck);)
 }

var_dump($result);
*/
?>


<!DOCTYPE html>
<html lang="en">
<head>

  <!-- Basic Page Needs
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <meta charset="utf-8">
  <title>Mandan Bismarck Homes for Sale</title>
  <meta name="description" content="">
  <meta name="author" content="">

  <!-- Mobile Specific Metas
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- FONT
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link href='//fonts.googleapis.com/css?family=Raleway:400,300,600' rel='stylesheet' type='text/css'>

  <!-- CSS
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link rel="stylesheet" href="/css/normalize.css">
  <link rel="stylesheet" href="/css/skeleton.css">
  <link rel="stylesheet" href="css/custom.css">

  <!-- Scripts
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

  <!-- Favicon
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link rel="icon" type="image/png" href="/images/favicon.png">

<style>
#searchContainer {
    background: url("https://s3.amazonaws.com/realtor-video/fireplace-short-loop-low.gif") no-repeat center center ;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
    height:400px;
}
/*
img {
	width:auto;
	max-width:100%;
	height:auto;
}
*/
<style>
div{
  border:1px;
  border-style:solid;
  border-width:1px;
}
#schools span{
  padding:13px;
}
#specialFeature span{
  padding:13px;
}
.categoryName{
 padding-top:5px;
} 
</style>

<script src="https://cdn.logrocket.io/LogRocket.min.js" crossorigin="anonymous"></script>
<script>window.LogRocket && window.LogRocket.init('kfxfxq/gardner-real-estate');</script>


</head>
<body>

  <!-- Primary Page Layout
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->

<!--
	<img src="https://s3.amazonaws.com/realtor-video/fireplace-short-loop-low.gif" width="100%"/>
-->

<div id="header" style="margin-left: auto; margin-right: auto; max-width: 95%;">
 <div style="height:100px"> 
  <div class="one-half column" >
    <a href="/about"><img src="https://s3.amazonaws.com/realtor-video/will-laura-tm-logo.png"/></a>
  </div>
  <div class="one-half column">
    <a href="tel:701-388-6171"><img align="right" src="https://s3.amazonaws.com/realtor-video/phone-number.png"/></a>
  </div>
 </div>
 <div id="browse" style="background-color:white;
		opacity: .95;
		transform: scale(0.80);
		border: 1px solid #eeeeee;
		text-align: center;
		margin-left: auto;
		margin-right: auto;
	     "> 
		
	 <div style="background-color:#eeeeee;padding:5px 5px 0px 5px">
	   <form action="{{url('admin')}}" method="post" style="padding:0p; margin:0px">
	     {{csrf_field()}}
	     <input type="searchBox" />&nbsp;
	     <div style="display:inline-block">
		    <select name="beds" id="beds" style="padding:0px 2px 0px 2px; height:25px">
                <option value="0" @if (old('beds') == "0") {{ 'selected' }} @endif>0+</option>
                <option value="1" @if (old('beds') == "1") {{ 'selected' }} @endif>1+</option>
                <option value="2" @if (old('beds') == "2") {{ 'selected' }} @endif>2+</option>
                <option value="3" @if (old('beds') == "3") {{ 'selected' }} @endif>3+</option>
                <option value="4" @if (old('beds') == "4") {{ 'selected' }} @endif>4+</option>
                <option value="5" @if (old('beds') == "5") {{ 'selected' }} @endif>5+</option>
                <option value="6" @if (old('beds') == "6") {{ 'selected' }} @endif>6+</option>
		    </select>
			Beds &nbsp; &nbsp; 
		    <select name="baths" id="baths" style="padding:0px 2px 0px 2px; height:25px">
                <option value="0" @if (old('baths') == "0") {{ 'selected' }} @endif>0+</option>
                <option value="1" @if (old('baths') == "1") {{ 'selected' }} @endif>1+</option>
                <option value="2" @if (old('baths') == "2") {{ 'selected' }} @endif>2+</option>
                <option value="3" @if (old('baths') == "3") {{ 'selected' }} @endif>3+</option>
                <option value="4" @if (old('baths') == "4") {{ 'selected' }} @endif>4+</option>
                <option value="5" @if (old('baths') == "5") {{ 'selected' }} @endif>5+</option>
                <option value="6" @if (old('baths') == "6") {{ 'selected' }} @endif>6+</option>
		    </select>
			Bath &nbsp; &nbsp;  
		<span class="wrapContainer">
			$ <input id="priceMax" name="priceMax" type="text" style="height:25px; width:40px; padding:0px; text-align:right" value="{{old('priceMax')}}"/>,000 MaxPrice
		</span>
		<span class="wrapContainer">
			&nbsp; &nbsp;  
			<input id="minSqft" name="minSqft" type="text" style="height:25px; width:40px; padding:0px; text-align:right"/> MinSqFt.
		</span>
	   	<input type="submit" value="SEARCH" style="font-size:15px" class="button button-primary"> 
  	    </div>
	  </form>
       </div>
</div>
 <div>
<?php
function getRemark($needle, $haystack){

}

function getRemarks($needle, $haystack){
    $return = false;
    foreach($haystack as $key => $val){
        if(is_array($val)){
            $return = getRemarks($needle, $val);
        }
        else if($needle === $key){
            return "$val\n";
        }
    }
    return $return;
}



if(!empty($data)){
	$listings = $data[0];
	$lPhoto = $data[1];
	$publicRemarks = $data[2];
	$listingPhotos = $data[3];

/*
	echo '<pre>';
	var_dump(array_column($listings,"Public Remarks4"));
	echo '-------------------------------------------<br>';
	var_dump($listings);
	exit;
	if(count($listings)==1){
             ;
		$publicRemarks = array_column($listings,"Public Remarks4");
//		var_dump($publicRemarks);
//		exit;
		//$publicRemarks = $listings[0]['CustomFields'][0]["Main"][1]["Remarks"][1]["Public Remarks4"];
	}else
		$publicRemarks = '';	

        if(is_array($publicRemarks))
           {
                
                $publicRemarks = '' ;
          }
*/
	$numHomes = count($listings);
?>
<div style="padding:20px"><b><span style="color:#4b84ff;font-size:16px"><?php echo $numHomes; ?> Homes Found</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="/admin/">BACK TO HOTSHEET</a></b> </div>
<?php
$googleKey = 'AIzaSyDy-jovR7o4PAX7EE0UzVdCVrHIVh25cCA';

foreach($listings as $key => $listing){

	//var_dump($lPhoto["20180727233727908869000000"]); //exit;
	setlocale(LC_MONETARY, 'en_US');

	$l = $listing['StandardFields'];
	$curId = $listing['Id'];
	if(array_key_exists($curId,$lPhoto))
	    $listingPhoto=$lPhoto[$curId];
	else 
	    $listingPhoto="http://wlgardner.com/images/no-image.jpg";
	
	    echo '
<div style="clear:both"></div>
<div style="margin-left: auto; margin-right: auto; margin-top:40px; padding:0px 30px 0px 30px;">
<div class="one-half column" style="background-color: #efefef; padding: 10px;" >
  <div style="cursor: pointer; max-width:100%; height:265px; font-size:10px; color:#efefef; background-size:cover; background-image:url('.$listingPhoto.')">

    <div style="padding:2px; opacity:.9; background-color:#7a7b7c; font-weight:bold; color:#ffffff;font-size:18px">'
  .' $'.number_format($l['ListPrice']).'
      <div style="float:right; font-size:10px; font-weight:normal">'.$l['UnparsedFirstLineAddress'].' '.$l['City'].'
      <br><b> '.$l['BedsTotal'].' beds, '.$l['BathsTotal'].' baths, '.number_format($l['BuildingAreaTotal']).' sqft &nbsp; #'.$l['ListingId'].'</b>
      </div>
    </div>
    <div style="height:113px;"></div>
    <div style="clear:both"></div>
  </div>
</div>
<div class="one-half column">
';

if($key==0){
echo '
    <div style="max-width:100%; border: 1px; solid">
	<input type="text" style="font-size:10px; height:unset; width:350px;" onclick="document.getElementById(\'checklist\').style.display=\'block\'"/>
    </div>
    <div style="display:none; border:1px solid #888888; width:300px; margin-top:-15px; padding:15px;z-index:1;position:absolute;background-color:#ffffff; " id="checklist">
	<div style="float:right"><a href="javascript:void" onclick="document.getElementById(\'checklist\').style.display=\'none\'">close</a></div>
	<div>
	    <span style="font-weight:bold">Special Features</span><br>'; ?>
		{{--<div style="padding-left:15px;"><label style="margin:0px"><input type="checkbox"/> Main Floor Living</label></div>--}}
		{{--<div style="padding-left:15px;"><label style="margin:0px"><input type="checkbox"/> Character Homes</label></div>--}}
		{{--<div style="padding-left:15px;"><label style="margin:0px;padding:0px"><input type="checkbox"/> Amazing Views</label></div>--}}
	@foreach($collections as $p)
		<div style="padding-left:15px;"><label style="margin:0px"><input type="checkbox"/> {{$p->name }}</label></div>
	@endforeach
<?php echo '</div></div>';
}
echo'
    <div>
';

?>
   <div class="map">
	  <img width="400px" src="https://maps.googleapis.com/maps/api/staticmap?center=<?=urlencode($l['UnparsedFirstLineAddress'].','.$l['City'].', ND') ?>&zoom=11&size=400x250&maptype=roadmap&markers=color:red|<?=urlencode($l['UnparsedFirstLineAddress'].','.$l['City'].', ND') ?>&key=<?=$googleKey?>">

	  <img width="350px" src="https://maps.googleapis.com/maps/api/staticmap?center=<?=urlencode($l['UnparsedFirstLineAddress'].','.$l['City'].', ND') ?>&fov=90&heading=235&pitch=10&key=<?=$googleKey?>">
  </div>

<?php

echo '
   </div> 
</div>
</div>


<div style="clear:both"></div>
<div id="listingDetails1" style="margin-left: auto; margin-right: auto; padding:0px 30px 0px 30px;">
<div class="one-half column" style="background-color: #efefef; padding: 10px;">
    <div>
	<textarea style="font-size:10px; width:100%" placeholder="Realtor\'s opinion goes here..." rows="1" ></textarea>
    </div>
	<div style="clear:both"></div>
    <div style="float:right">
	<b style="font-size:22px">$'.number_format($l['ListPrice']).'</b>
    </div>
    <div>
	<a href="/admin?ListingId='.$l['ListingId'].'">'.$l['UnparsedFirstLineAddress'].' ' .$l['City'].'</a>
    </div>
    <div style="clear:both">

    </div>
    <div>
	<b>'.$l['BedsTotal'].' beds, '.$l['BathsTotal'].' baths, '.number_format($l['BuildingAreaTotal']).' sqft.</b>
    </div>
    <div>
	'.$publicRemarks .'
    </div>
</div>
</div>
';
}
}else{
    echo 'No Results Found.';
}
?>
<div style="clear:both"></div>
<div>
<br>
</div>
<!-- End Document
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->

<br>
<br>
</body>
</html>
