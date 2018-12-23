<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use App\Models\Listings;
use Illuminate\Http\Request;

class ResultsController extends Controller
{
    public function index(Request $request)
    {
        require_once __DIR__.'/../../../libraries/sparkapi4p2/lib/Core.php';
        require_once __DIR__.'/../../../libraries/sparkapi4p2/lib/APIAuth.php';
        require_once __DIR__.'/../../../libraries/sparkapi4p2/lib/Bearer.php';
        $param['sel_special'] = $request->special;
        $param['sel_neighborhood'] = $request->neighborhood;
        $param['sel_lifestyle'] = $request->lifestyle;

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

        $api = new \SparkAPI_APIAuth("bis_gardner_key_2", "7pj843r6skkp6fgtq6yalfilm");
        $api->SetApplicationName("MyPHPApplication/1.0");
        //$contacts = $api->GetContacts();

        $data = array();
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
        if($q['keywords'])
            $query[] .= "City Ne '". $q['keywords']."'";

        $query[] .= "MlsStatus Eq ". "'Active'";
        $query[] .= "PropertyTypeLabel Eq ". "'Residential'";
        $paramCount +=2;

        $qFilter = '';
        for($i=0; $i<$paramCount; $i++){
            if(!$i)
                $qFilter .= $query[$i];
            else
                $qFilter .= " and ".$query[$i];
        }

        $fieldList = "ListingId, PropertyTypeLabel, UnparsedFirstLineAddress, City, BuildingAreaTotal, ListPrice, BedsTotal, BathsTotal, MlsStatus, UnparsedAddress, ListOfficeName, ListAgentFirstName, ListAgentLastName, PublicRemarks";

        $params = array(
            '_pagination' => 1,
            '_limit' => 25,
            '_page' => 1,
            '_select' => $fieldList,
            '_filter' => $qFilter,
        );
        $listings = $api->GetListings($params);

        $data['listings'] = array();
        $data['lPhoto'] = array();
        $lPhoto = array();
        if(!empty($listings)){
            foreach($listings as $listing){
                $listingPhotos = $api->GetListingPhotos($listing['Id']);
                $curListingId = $listing['Id'];
                $lPhoto[$curListingId] = asset('app-assets/images/gallery/3.jpg');
                foreach($listingPhotos as $listingPhoto){
                    if($listingPhoto["Primary"]){
                        $lPhoto[$curListingId] = $listingPhoto["Uri640"];
                    }
                }
            }
            $data['listings'] = $listings;
            $data['lPhoto'] = $lPhoto;
        }

        if($param['sel_special']){
            $data['sel_special'] = $param['sel_special'];
        }else{
            $data['sel_special'] = 0;
        }

        if($param['sel_neighborhood']){
            $data['sel_neighborhood'] = $param['sel_neighborhood'];
        }else{
            $data['sel_neighborhood'] = 0;
        }

        if($param['sel_lifestyle']){
            $data['sel_lifestyle'] = $param['sel_lifestyle'];
        }else{
            $data['sel_lifestyle'] = 0;
        }
        $data['collection_special'] = Collection::where('parent_name', '=', 'Special Features')->get();
        $data['collection_neighborhood'] = Collection::where('parent_name', '=', 'Neighborhoods')->get();
        $data['collection_lifestyle'] = Collection::where('parent_name', '=', 'Lifestyle')->get();


        return view('home', $data);
    }

    public function detail(Request $request)
    {
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
        if(!$q['ListingId'] && $q['ListingId'] == ""){
            return redirect('admin/products');
        }

        $data = array();

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
        $data['publicRemarks'] = $publicRemarks;
        $mls_id = $listings[0]['StandardFields']['MlsId'];
        $data['mls_id'] = $mls_id;

        $listing_data = Listings::where('mls_id', $mls_id)->first();
        if(!$listing_data){
            $data['listing_comment'] = '';
            $data['listing_collections'] = array();
        }else{
            $data['listing_comment'] = $listing_data->comment;
            $data['listing_collections'] = json_decode($listing_data->collection_ids);
        }

        $collections = Collection::where('name', '<>', '')->get();
        $data['collections'] = $collections;

        $data['listing'] = $listings[0];
        $data['lPhotos'] = $api->GetListingPhotos($listings[0]['Id']);;
        // dd($data);
        return view('detail', $data);
    }

    public function results(Request $request)
    {
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

//        $q['ListingId'] = $request->ListingId;

        $api = new \SparkAPI_APIAuth("bis_gardner_key_2", "7pj843r6skkp6fgtq6yalfilm");
        $api->SetApplicationName("MyPHPApplication/1.0");
        //$contacts = $api->GetContacts();

        $data = array();
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
            $query[] .= "BedsTotal Ge ". $q['beds'];
        if($q['baths'])
            $query[] .= "BathsTotal Ge " . $q['baths'];
        if($q['priceMax'])
            $query[] .= "CurrentPrice Le " . $q['priceMax'];
        if($q['minSqft'])
            $query[] .= "BuildingAreaTotal Ge ". $q['minSqft'];
        if($q['keywords'])
            $query[] .= "City Ne '". $q['keywords']."'";

        $query[] .= "MlsStatus Eq ". "'Active'";
//        $query[] .= "ListingId Eq ". $q['ListingId'];
//        $query[] .= "PropertyTypeLabel Eq ". "'Residential'";
        $paramCount +=1;
        //	$query[] = "CumulativeDaysOnMarket Lt ". $q['CumulativeDaysOnMarket'];

//        dd($query);

        $qFilter = '';
        for($i=0; $i<$paramCount; $i++){
            if(!$i)
                $qFilter .= $query[$i];
            else
                $qFilter .= " and ".$query[$i];
        }

        $fieldList = "ListingId, PropertyTypeLabel, UnparsedFirstLineAddress, City, BuildingAreaTotal, ListPrice, BedsTotal, BathsTotal, MlsStatus, UnparsedAddress, ListOfficeName, ListAgentFirstName, ListAgentLastName, PublicRemarks";


        $params = array(
            '_pagination' => 1,
            '_limit' => 25,
            '_page' => 1,
            '_select' => $fieldList,
            '_filter' => $qFilter,
        );
//        dd($params);
        $listings = $api->GetListings($params);
//dd($listings);
        $data['listings'] = array();
        $data['lPhoto'] = array();
        $lPhoto = array();
        if(!empty($listings)){
            foreach($listings as $listing){
                $listingPhotos = $api->GetListingPhotos($listing['Id']);
                $curListingId = $listing['Id'];
                $lPhoto[$curListingId] = asset('app-assets/images/gallery/3.jpg');
                foreach($listingPhotos as $listingPhoto){
                    if($listingPhoto["Primary"]){
                        $lPhoto[$curListingId] = $listingPhoto["Uri640"];
                    }
                }
            }
            $data['listings'] = $listings;
            $data['lPhoto'] = $lPhoto;
        }
        $request->flash();
        return view('results', $data);
    }
}
