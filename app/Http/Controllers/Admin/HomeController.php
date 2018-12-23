<?php

namespace App\Http\Controllers\Admin;

use App\Models\Collection;
use App\Models\Listings;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */


    public function index(Request $request){
        $data = array();
        return view('admin/result', $data);
    }

    public function products(Request $request)
    {
        require_once __DIR__.'/../../../../libraries/sparkapi4p2/lib/Core.php';
        require_once __DIR__.'/../../../../libraries/sparkapi4p2/lib/APIAuth.php';
        require_once __DIR__.'/../../../../libraries/sparkapi4p2/lib/Bearer.php';
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
        return view('admin/result', $data);
    }

    public function save_product(Request $request){
        $validator = Validator::make($request->all(), [
            'mls_id' => 'required'
        ]);
        if ($validator->fails()) {
            echo json_encode(array("status"=> "failed", 'message' => $validator->getMessageBag()->toArray()));
        }else{
            // save to database

            if (Listings::where('mls_id', $request->mls_id)->exists()){
                // update
                Listings::where('mls_id', $request->mls_id)->update(['comment' => $request->comment, 'owner_id' => Auth::user()->id, 'collection_ids' => json_encode($request->collection_ids)]);
            }else{
                // insert
                Listings::create(
                    [
                        'owner_id' => Auth::user()->id,
                        'mls_id' => $request->mls_id,
                        'comment' => $request->comment,
                        'collection_ids' => json_encode($request->collection_ids)
                    ]);
            }


            echo json_encode(array("status"=> "OK", "message" => "update successfully"));
        }

    }

    public function product(Request $request){

        require_once __DIR__.'/../../../../libraries/sparkapi4p2/lib/Core.php';
        require_once __DIR__.'/../../../../libraries/sparkapi4p2/lib/APIAuth.php';
        require_once __DIR__.'/../../../../libraries/sparkapi4p2/lib/Bearer.php';
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
        return view('admin/product_detail', $data);
    }
}
