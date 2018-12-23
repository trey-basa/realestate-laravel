@extends('layouts.admin')

@section('content')
    <div>
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
			<form action="{{url('admin')}}" method="post" style="padding:0px; margin:0px">
				{{csrf_field()}}
				<input type="searchBox" />&nbsp;
				<div style="display:inline-block">
					<select name="beds" id="beds" style="padding:0px 2px 0px 2px; height:25px">
						<option name="0" value="0">0</option>
						<option name="1" value="1">1</option>
						<option name="2" value="2">2</option>
						<option name="3" value="3">3</option>
						<option name="4" value="4">4</option>
						<option name="5" value="5">5</option>
						<option name="6" value="6">6+</option>
					</select>
					Beds &nbsp; &nbsp;
					<select name="baths" id="baths" style="padding:0px 2px 0px 2px; height:25px">
						<option name="0" value="0">0</option>
						<option name="1" value="1">1</option>
						<option name="2" value="2">2</option>
						<option name="3" value="3">3</option>
						<option name="4" value="4">4</option>
						<option name="5" value="5">5</option>
						<option name="6" value="6">6+</option>
					</select>
					Bath &nbsp; &nbsp;
					<span class="wrapContainer">
			$ <input id="priceMax" name="priceMax" type="text" style="height:25px; width:40px; padding:0px; text-align:right"/>,000 MaxPrice
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
        $numHomes = count($listings);
        ?>
		<div style="padding:20px"><b><span style="color:#4b84ff;font-size:16px"><?php echo $numHomes; ?> Homes Found</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<a href="/admin/home/">BACK TO HOTSHEET</a></b> </div>
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
                <a href="/admin/home/product?ListingId='.$l['ListingId'].'">
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
              </a>
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
                @foreach($collections as $p)
                    @if ($mls_id != "")
                        @if (in_array($p->id, $listing_collections))
                            <div style="padding-left:15px;"><label style="margin:0px"><input type="checkbox" name="collection" value="{{$p->id}}" checked/> {{$p->name }}</label></div>
                        @else
                            <div style="padding-left:15px;"><label style="margin:0px"><input type="checkbox" name="collection" value="{{$p->id}}" /> {{$p->name }}</label></div>
                        @endif
                    @else
                        <div style="padding-left:15px;"><label style="margin:0px"><input type="checkbox" name="collection" value="{{$p->id}}" /> {{$p->name }}</label></div>
                    @endif
                @endforeach
            <?php echo '</div></div>';
        }
        echo'<div>';

        ?>
		<div class="map">
			<img width="400px" src="https://maps.googleapis.com/maps/api/staticmap?center=<?=urlencode($l['UnparsedFirstLineAddress'].','.$l['City'].', ND') ?>&zoom=11&size=400x250&maptype=roadmap&markers=color:red|<?=urlencode($l['UnparsedFirstLineAddress'].','.$l['City'].', ND') ?>&key=<?=$googleKey?>">

			<img width="350px" src="https://maps.googleapis.com/maps/api/staticmap?center=<?=urlencode($l['UnparsedFirstLineAddress'].','.$l['City'].', ND') ?>&fov=90&heading=235&pitch=10&key=<?=$googleKey?>">
		</div>
    </div>
</div>
</div>


<div style="clear:both"></div>
<div id="listingDetails1" style="margin-left: auto; margin-right: auto; padding:0px 30px 0px 30px;">
    <div class="one-half column" style="background-color: #efefef; padding: 10px;">
        <div>
            <textarea id="comment" style="font-size:10px; width:100%" placeholder="Realtor's opinion goes here..." rows="1" >
                @if ($mls_id != "")
                    {{$listing_comment}}
                @endif
            </textarea>
        </div>
        <div style="clear:both"></div>
        <div style="float:right">
        <?php

            echo '<b style="font-size:22px">$'.number_format($l['ListPrice']).'</b>
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
				<div style="width: 50%;">
					<button id="save_product" style="font-size:15px;margin-top: 20px;" class="button button-primary">SAVE</button>
				</div>

			</div>';
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
		<script>
			$(document).ready(function () {
				$("#save_product").click(function () {
					var comment = $("#comment").val();
					var mls_id = "{{$mls_id}}";
                    var collection_ids = new Array();
                    $('input[name="collection"]:checked').each(function() {
                        collection_ids.push(this.value);
                    });
                    $('#loading').show();
					$.post(
                        "{{route('admin-product-save')}}",
                        {
                            _token:'{{csrf_token()}}',
                            comment : comment,
                            mls_id : mls_id,
                            collection_ids : collection_ids
                        },
                        function (response) {
                            $('#loading').hide();
                            if(response.status == "OK"){
                                setTimeout(function () {
                                    alert(response.message);
                                }, 1000);

                            }else{
                                alert(response.message);
                            }

                        },"json"
                    );
                });
            });
		</script>

        </div>
    </div>
</div>