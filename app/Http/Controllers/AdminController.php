<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //

    public function hotsheet(Request $request){
        require_once __DIR__.'/../../../libraries/sparkapi4p2/lib/Core.php';
        require_once __DIR__.'/../../../libraries/sparkapi4p2/lib/APIAuth.php';
        require_once __DIR__.'/../../../libraries/sparkapi4p2/lib/Bearer.php';
        $q['beds'] = $request->beds;
        $q['baths'] = $request->baths;
        $q['minSqft'] = $request->minSqft;
        $q['priceMax'] = $request->priceMax;
        $q['priceMin'] = $request->priceMin;
        $q['homeType'] = $request->homeType;
        $q['yearMax'] = $request->yearMax;
        $q['yearMin'] = $request->yearMin;
        $q['lotSize'] = $request->lotSize;
        $q['keywords'] = $request->keywords;
        $q['garageMin'] = $request->garageMin;
        $q['city'] = $request->city;
        $q['area'] = $request->area;
        $q['subArea'] = $request->subArea;

        $q['ListingId'] = $request->ListingId;
        //$q['CumulativeDaysOnMarket'] = 3;//$request->CumulativeDaysOnMarket;

        $api = new \SparkAPI_APIAuth("bis_gardner_key_2", "7pj843r6skkp6fgtq6yalfilm");
        $api->SetApplicationName("MyPHPApplication/1.0");
        //$contacts = $api->GetContacts();

        if($q['ListingId']){
            $fieldList = "\"Remarks\".\"Public Remarks4\", ListingId, PublicRemarks4, PropertyTypeLabel, UnparsedFirstLineAddress, City, BuildingAreaTotal, ListPrice, BedsTotal, BathsTotal, MlsStatus, UnparsedAddress, ListOfficeName, ListAgentFirstName, ListAgentLastName, PublicRemarks";
            $params = array(
                '_pagination' => 1,
                '_limit' => 1,
                '_page' => 1,
                '_select' => $fieldList,
                '_filter' => "ListingId Eq '" .$q['ListingId']."'",
                '_expand' => 'CustomFieldsRaw'
            );
            $listings = $api->GetListings($params);
            $publicRemarks = $listings[0]['CustomFields'][0]["Main"][0]["Remarks"][0]["Public Remarks4"];

            echo '<pre>';
            var_dump($listings);
            exit;
        }
        else{
            if($q['priceMax']<1000)
                $q['priceMax'] = $q['priceMax'] * 1000;
            if($q['priceMin']<1000)
                $q['priceMin'] = $q['priceMin'] * 1000;


            $paramCount=0;
            foreach($q as $k => $v){
                if($v) $paramCount++;
            }
            $query = array();
            if($q['beds'])
                $query[] .= "BedsTotal Gt ". $q['beds'];
            if($q['baths'])
                $query[] .= "BathsTotal Gt " . $q['baths'];
            if($q['priceMax'])
                $query[] .= "CurrentPrice Lt " . $q['priceMax'];
            if($q['minSqft'])
                $query[] .= "BuildingAreaTotal Gt ". $q['minSqft'];

            $query[] .= "MlsStatus Eq ". "'Active'";
            //	$query[] .= "ListingId Eq ". $q['ListingId'];
            $query[] .= "PropertyTypeLabel Eq ". "'Residential'";
            $paramCount +=2;
            //	$query[] = "CumulativeDaysOnMarket Lt ". $q['CumulativeDaysOnMarket'];
            //var_dump($q);
            //exit;

            $qFilter = '';
            for($i=0; $i<$paramCount; $i++){
                if(!$i)
                    $qFilter .= $query[$i];
                else
                    $qFilter .= " and ".$query[$i];
            }


            //var_dump($qFilter);
            //exit;

            $fieldList = "ListingId, PropertyTypeLabel, UnparsedFirstLineAddress, City, BuildingAreaTotal, ListPrice, BedsTotal, BathsTotal, MlsStatus, UnparsedAddress, ListOfficeName, ListAgentFirstName, ListAgentLastName, PublicRemarks";


            $params = array(
                '_pagination' => 1,
                '_limit' => 25,
                '_page' => 1,
                '_select' => $fieldList,
                '_filter' => $qFilter,
            );
            //dd($params);
            $listings = $api->GetListings($params);
        }

//dd($listings);
        $lPhoto = array();
        $collections = Collection::where('name', '<>', '')->get();
        $data = array();
        $data['collections'] = $collections;
        if(!empty($listings)){
            foreach($listings as $listing){
                $listingPhotos = $api->GetListingPhotos($listing['Id']);
                //$listingPhotos = $api->GetListingPhotos($listing['StandardFields']['ListingId']);
                //echo 'listingID: '. $listing['StandardFields']['ListingId']. '<br>';
                foreach($listingPhotos as $listingPhoto){
                    //dd($listingPhotos);
                    $curListingId = $listing['Id'];
                    if($listingPhoto["Primary"]){
                        $lPhoto[$curListingId] = $listingPhoto["UriLarge"];
                    }
                }
            }
            if(!isset($publicRemarks))
                $publicRemarks = '';
            $data1 = array($listings, $lPhoto, $publicRemarks, $listingPhotos);
//            $data['listings'] = $listings;
//            $data['lPhoto'] = $lPhoto;
//            $data['publicRemarks'] = $publicRemarks;
//            $data['listingPhotos'] = $listingPhotos;
        }
//dd($data);
//exit;
        return view('admin', $data)->with('data', $data1);
    }
}
