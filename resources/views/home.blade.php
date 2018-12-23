@extends('layouts.user_home')

@section('add_css')
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="{{asset('css/slick.css')}}"/>
@endsection

@section('content')
    <div class="app-content container center-layout mt-2">
        <div class="content-wrapper">
            <div class="content-body">
                <section id="amazing_view" class="row mt-2">
                    <div class="col-md-4 col-sm-6">
                        <h4 class="text-right line-height-40">Special Features:</h4>
                    </div>
                    <div class="col-md-8 col-sm-6">
                        <select id="sel_special" class="form-control sel-home">
                            @foreach($collection_special as $row)
                                @if( $row->id == $sel_special)
                                    <option value="{{$row->id}}" selected>{{$row->name}}</option>
                                @else
                                    <option value="{{$row->id}}">{{$row->name}}</option>
                                @endif
                            @endforeach
                        </select>

                    </div>
                    <div class="col-12">
                        <div class="wrapper">
                            <div class="list_carousel">
                                @for ($i = 0; $i < count($listings); $i++)
                                    @php
                                        $detail = $listings[$i]['StandardFields'];
                                        $listing_id = $listings[$i]['Id'];
                                    @endphp
                                    <div class="post-area">
                                        <div class="img-area mt-1" style="position: relative;">
                                            <img src="{{$lPhoto[$listing_id]}}" alt="img11" class="cover">
                                            <div class="sub-tl">
                                                <span style="font-size: 18px;">${{number_format($detail['ListPrice'])}}(sep 7)</span>
                                            </div>
                                            <div class="sub-tr">
                                                <a href="#" class="btn-heart">
                                                    <span class="img-heart sprite-heart-line"></span>
                                                </a>
                                            </div>
                                            <div class="sub-bl">
                                                <h4>
                                                    <span class="icon-for-sale"></span>
                                                    {{$detail['PropertyTypeLabel']}}
                                                </h4>
                                                <p>
                                                    <span class="photo-card-price"><strong>${{number_format($detail['ListPrice'])}}</strong></span>
                                                    <span class="photo-card-info">
                                                    {{$detail['BedsTotal']}} bds
                                                    <span class="interpunct">·</span>
                                                        {{$detail['BathsTotal']}} ba
                                                    <span class="interpunct">·</span>
                                                        {{number_format($detail['BuildingAreaTotal'])}} sqft
                                                </span>
                                                </p>
                                                <p class="photo-card-spec">
                                                    <span class="photo-card-address">{{$detail['UnparsedAddress']}}</span>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="row collection-area mt-1">
                                            <div class="col-3" style="max-width: 100px;"><span>Collections</span></div>
                                            <div class="col-9">
                                                <a href="#">Amazing Views,</a>
                                                <a href="#">Big Family,</a>
                                                <a href="#">Big Family,</a>
                                                <a href="#">Big Family,</a>
                                                <a href="#">Big Family,</a>
                                                <a href="#">Big Yards,</a>
                                            </div>
                                        </div>
                                        <div class="agency-area mt-1 row">
                                            <div class="sub-1" >
                                                <div class=""><strong>Will Says:</strong> Make sure you...</div>
                                                <div class=""><a href="#">Register / Login TO READ MORE</a></div>
                                                <div class="img-agency">
                                                    <img src="{{asset('images/agency1.png')}}" style="width: 100%;">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endfor

                            </div>
                        </div>
                    </div>
                </section>
                <section id="neighborhoods_view" class="row mt-2">
                    <div class="col-md-4 col-sm-6">
                        <h4 class="text-right line-height-40">HEIGHBORHOODS:</h4>
                    </div>
                    <div class="col-md-8 col-sm-6">
                        <select id="sel_neighborhood" class="form-control sel-home">
                            @foreach($collection_neighborhood as $row)
                                @if( $row->id == $sel_neighborhood)
                                    <option value="{{$row->id}}" selected>{{$row->name}}</option>
                                @else
                                    <option value="{{$row->id}}">{{$row->name}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12">
                        <div class="wrapper">
                            <div class="list_carousel">
                                <div class="post-area">
                                    <div class="img-area mt-1" style="position: relative;">
                                        <img src="https://cdn.resize.sparkplatform.com/bis/640x480/true/20180911193752529850000000-o.jpg" alt="img11" class="cover">
                                        <div class="sub-tl">
                                            <span style="font-size: 18px;">$5,000(sep 7)</span>
                                        </div>
                                        <div class="sub-tr">
                                            <a href="#" class="btn-heart">
                                                <span class="img-heart sprite-heart-line"></span>
                                            </a>
                                        </div>
                                        <div class="sub-bl">
                                            <h4>
                                                <span class="icon-for-sale"></span>
                                                For sale by owner
                                            </h4>
                                            <p>
                                                <span class="photo-card-price"><strong>$85,000</strong></span>
                                                <span class="photo-card-info">
                                                    4 bds
                                                    <span class="interpunct">·</span>
                                                    1 ba
                                                    <span class="interpunct">·</span>
                                                     1,994 sqft
                                                </span>
                                            </p>
                                            <p class="photo-card-spec">
                                                <span class="photo-card-address">16 Cottage St, New York Mills, NY</span>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row collection-area mt-1">
                                        <div class="col-3" style="max-width: 100px;"><span>Collections</span></div>
                                        <div class="col-9">
                                            <a href="#">Amazing Views,</a>
                                            <a href="#">Big Family,</a>
                                            <a href="#">Big Family,</a>
                                            <a href="#">Big Family,</a>
                                            <a href="#">Big Family,</a>
                                            <a href="#">Big Yards,</a>
                                        </div>
                                    </div>
                                    <div class="agency-area mt-1 row">
                                        <div class="sub-1" >
                                            <div class=""><strong>Will Says:</strong> Make sure you...</div>
                                            <div class=""><a href="#">Register / Login TO READ MORE</a></div>
                                            <div class="img-agency">
                                                <img src="{{asset('images/agency1.png')}}" style="width: 100%;">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="post-area">
                                    <div class="img-area mt-1" style="position: relative;">
                                        <img src="https://cdn.resize.sparkplatform.com/bis/640x480/true/20180821221201910430000000-o.jpg" alt="img11" class="cover">
                                        <div class="sub-tl">
                                            <span style="font-size: 18px;">$5,000(sep 7)</span>
                                        </div>
                                        <div class="sub-tr">
                                            <a href="#" class="btn-heart">
                                                <span class="img-heart sprite-heart-line"></span>
                                            </a>
                                        </div>
                                        <div class="sub-bl">
                                            <h4>
                                                <span class="icon-for-sale"></span>
                                                For sale by owner
                                            </h4>
                                            <p>
                                                <span class="photo-card-price"><strong>$85,000</strong></span>
                                                <span class="photo-card-info">
                                                    4 bds
                                                    <span class="interpunct">·</span>
                                                    1 ba
                                                    <span class="interpunct">·</span>
                                                     1,994 sqft
                                                </span>
                                            </p>
                                            <p class="photo-card-spec">
                                                <span class="photo-card-address">16 Cottage St, New York Mills, NY</span>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row collection-area mt-1">
                                        <div class="col-3" style="max-width: 100px;"><span>Collections</span></div>
                                        <div class="col-9">
                                            <a href="#">Amazing Views,</a>
                                            <a href="#">Big Family,</a>
                                            <a href="#">Big Family,</a>
                                            <a href="#">Big Family,</a>
                                            <a href="#">Big Family,</a>
                                            <a href="#">Big Yards,</a>
                                        </div>
                                    </div>
                                    <div class="agency-area mt-1 row">
                                        <div class="sub-1" >
                                            <div class=""><strong>Will Says:</strong> Make sure you...</div>
                                            <div class=""><a href="#">Register / Login TO READ MORE</a></div>
                                            <div class="img-agency">
                                                <img src="{{asset('images/agency2.png')}}" style="width: 100%;">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="post-area">
                                    <div class="img-area mt-1" style="position: relative;">
                                        <img src="https://cdn.resize.sparkplatform.com/bis/640x480/true/20180821225725731703000000-o.jpg" alt="img11" class="cover">
                                        <div class="sub-tl">
                                            <span style="font-size: 18px;">$5,000(sep 7)</span>
                                        </div>
                                        <div class="sub-tr">
                                            <a href="#" class="btn-heart">
                                                <span class="img-heart sprite-heart-line"></span>
                                            </a>
                                        </div>
                                        <div class="sub-bl">
                                            <h4>
                                                <span class="icon-for-sale"></span>
                                                For sale by owner
                                            </h4>
                                            <p>
                                                <span class="photo-card-price"><strong>$85,000</strong></span>
                                                <span class="photo-card-info">
                                                    4 bds
                                                    <span class="interpunct">·</span>
                                                    1 ba
                                                    <span class="interpunct">·</span>
                                                     1,994 sqft
                                                </span>
                                            </p>
                                            <p class="photo-card-spec">
                                                <span class="photo-card-address">16 Cottage St, New York Mills, NY</span>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row collection-area mt-1">
                                        <div class="col-3" style="max-width: 100px;"><span>Collections</span></div>
                                        <div class="col-9">
                                            <a href="#">Amazing Views,</a>
                                            <a href="#">Big Family,</a>
                                            <a href="#">Big Family,</a>
                                            <a href="#">Big Family,</a>
                                            <a href="#">Big Family,</a>
                                            <a href="#">Big Yards,</a>
                                        </div>
                                    </div>
                                    <div class="agency-area mt-1 row">
                                        <div class="sub-1" >
                                            <div class=""><strong>Will Says:</strong> Make sure you...</div>
                                            <div class=""><a href="#">Register / Login TO READ MORE</a></div>
                                            <div class="img-agency">
                                                <img src="{{asset('images/agency1.png')}}" style="width: 100%;">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="post-area">
                                    <div class="img-area mt-1" style="position: relative;">
                                        <img src="https://cdn.resize.sparkplatform.com/bis/640x480/true/20180828022716713054000000-o.jpg" alt="img11" class="cover">
                                        <div class="sub-tl">
                                            <span style="font-size: 18px;">$5,000(sep 7)</span>
                                        </div>
                                        <div class="sub-tr">
                                            <a href="#" class="btn-heart">
                                                <span class="img-heart sprite-heart-line"></span>
                                            </a>
                                        </div>
                                        <div class="sub-bl">
                                            <h4>
                                                <span class="icon-for-sale"></span>
                                                For sale by owner
                                            </h4>
                                            <p>
                                                <span class="photo-card-price"><strong>$85,000</strong></span>
                                                <span class="photo-card-info">
                                                    4 bds
                                                    <span class="interpunct">·</span>
                                                    1 ba
                                                    <span class="interpunct">·</span>
                                                     1,994 sqft
                                                </span>
                                            </p>
                                            <p class="photo-card-spec">
                                                <span class="photo-card-address">16 Cottage St, New York Mills, NY</span>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row collection-area mt-1">
                                        <div class="col-3" style="max-width: 100px;"><span>Collections</span></div>
                                        <div class="col-9">
                                            <a href="#">Amazing Views,</a>
                                            <a href="#">Big Family,</a>
                                            <a href="#">Big Family,</a>
                                            <a href="#">Big Family,</a>
                                            <a href="#">Big Family,</a>
                                            <a href="#">Big Yards,</a>
                                        </div>
                                    </div>
                                    <div class="agency-area mt-1 row">
                                        <div class="sub-1" >
                                            <div class=""><strong>Will Says:</strong> Make sure you...</div>
                                            <div class=""><a href="#">Register / Login TO READ MORE</a></div>
                                            <div class="img-agency">
                                                <img src="{{asset('images/agency2.png')}}" style="width: 100%;">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section id="neighborhoods_view" class="row mt-2">
                    <div class="col-md-4 col-sm-6">
                        <h4 class="text-right line-height-40">LIFESTYLE:</h4>
                    </div>
                    <div class="col-md-8 col-sm-6">
                        <select id="sel_lifestyle" class="form-control sel-home">
                            @foreach($collection_lifestyle as $row)
                                @if( $row->id == $sel_lifestyle)
                                    <option value="{{$row->id}}" selected>{{$row->name}}</option>
                                @else
                                    <option value="{{$row->id}}">{{$row->name}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12">
                        <div class="wrapper">
                            <div class="list_carousel">
                                <div class="post-area">
                                    <div class="img-area mt-1" style="position: relative;">
                                        <img src="https://cdn.resize.sparkplatform.com/bis/640x480/true/20180911193752529850000000-o.jpg" alt="img11" class="cover">
                                        <div class="sub-tl">
                                            <span style="font-size: 18px;">$5,000(sep 7)</span>
                                        </div>
                                        <div class="sub-tr">
                                            <a href="#" class="btn-heart">
                                                <span class="img-heart sprite-heart-line"></span>
                                            </a>
                                        </div>
                                        <div class="sub-bl">
                                            <h4>
                                                <span class="icon-for-sale"></span>
                                                For sale by owner
                                            </h4>
                                            <p>
                                                <span class="photo-card-price"><strong>$85,000</strong></span>
                                                <span class="photo-card-info">
                                                    4 bds
                                                    <span class="interpunct">·</span>
                                                    1 ba
                                                    <span class="interpunct">·</span>
                                                     1,994 sqft
                                                </span>
                                            </p>
                                            <p class="photo-card-spec">
                                                <span class="photo-card-address">16 Cottage St, New York Mills, NY</span>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row collection-area mt-1">
                                        <div class="col-3" style="max-width: 100px;"><span>Collections</span></div>
                                        <div class="col-9">
                                            <a href="#">Amazing Views,</a>
                                            <a href="#">Big Family,</a>
                                            <a href="#">Big Family,</a>
                                            <a href="#">Big Family,</a>
                                            <a href="#">Big Family,</a>
                                            <a href="#">Big Yards,</a>
                                        </div>
                                    </div>
                                    <div class="agency-area mt-1 row">
                                        <div class="sub-1" >
                                            <div class=""><strong>Will Says:</strong> Make sure you...</div>
                                            <div class=""><a href="#">Register / Login TO READ MORE</a></div>
                                            <div class="img-agency">
                                                <img src="{{asset('images/agency1.png')}}" style="width: 100%;">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="post-area">
                                    <div class="img-area mt-1" style="position: relative;">
                                        <img src="https://cdn.resize.sparkplatform.com/bis/640x480/true/20180821221201910430000000-o.jpg" alt="img11" class="cover">
                                        <div class="sub-tl">
                                            <span style="font-size: 18px;">$5,000(sep 7)</span>
                                        </div>
                                        <div class="sub-tr">
                                            <a href="#" class="btn-heart">
                                                <span class="img-heart sprite-heart-line"></span>
                                            </a>
                                        </div>
                                        <div class="sub-bl">
                                            <h4>
                                                <span class="icon-for-sale"></span>
                                                For sale by owner
                                            </h4>
                                            <p>
                                                <span class="photo-card-price"><strong>$85,000</strong></span>
                                                <span class="photo-card-info">
                                                    4 bds
                                                    <span class="interpunct">·</span>
                                                    1 ba
                                                    <span class="interpunct">·</span>
                                                     1,994 sqft
                                                </span>
                                            </p>
                                            <p class="photo-card-spec">
                                                <span class="photo-card-address">16 Cottage St, New York Mills, NY</span>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row collection-area mt-1">
                                        <div class="col-3" style="max-width: 100px;"><span>Collections</span></div>
                                        <div class="col-9">
                                            <a href="#">Amazing Views,</a>
                                            <a href="#">Big Family,</a>
                                            <a href="#">Big Family,</a>
                                            <a href="#">Big Family,</a>
                                            <a href="#">Big Family,</a>
                                            <a href="#">Big Yards,</a>
                                        </div>
                                    </div>
                                    <div class="agency-area mt-1 row">
                                        <div class="sub-1" >
                                            <div class=""><strong>Will Says:</strong> Make sure you...</div>
                                            <div class=""><a href="#">Register / Login TO READ MORE</a></div>
                                            <div class="img-agency">
                                                <img src="{{asset('images/agency2.png')}}" style="width: 100%;">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="post-area">
                                    <div class="img-area mt-1" style="position: relative;">
                                        <img src="https://cdn.resize.sparkplatform.com/bis/640x480/true/20180821225725731703000000-o.jpg" alt="img11" class="cover">
                                        <div class="sub-tl">
                                            <span style="font-size: 18px;">$5,000(sep 7)</span>
                                        </div>
                                        <div class="sub-tr">
                                            <a href="#" class="btn-heart">
                                                <span class="img-heart sprite-heart-line"></span>
                                            </a>
                                        </div>
                                        <div class="sub-bl">
                                            <h4>
                                                <span class="icon-for-sale"></span>
                                                For sale by owner
                                            </h4>
                                            <p>
                                                <span class="photo-card-price"><strong>$85,000</strong></span>
                                                <span class="photo-card-info">
                                                    4 bds
                                                    <span class="interpunct">·</span>
                                                    1 ba
                                                    <span class="interpunct">·</span>
                                                     1,994 sqft
                                                </span>
                                            </p>
                                            <p class="photo-card-spec">
                                                <span class="photo-card-address">16 Cottage St, New York Mills, NY</span>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row collection-area mt-1">
                                        <div class="col-3" style="max-width: 100px;"><span>Collections</span></div>
                                        <div class="col-9">
                                            <a href="#">Amazing Views,</a>
                                            <a href="#">Big Family,</a>
                                            <a href="#">Big Family,</a>
                                            <a href="#">Big Family,</a>
                                            <a href="#">Big Family,</a>
                                            <a href="#">Big Yards,</a>
                                        </div>
                                    </div>
                                    <div class="agency-area mt-1 row">
                                        <div class="sub-1" >
                                            <div class=""><strong>Will Says:</strong> Make sure you...</div>
                                            <div class=""><a href="#">Register / Login TO READ MORE</a></div>
                                            <div class="img-agency">
                                                <img src="{{asset('images/agency1.png')}}" style="width: 100%;">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="post-area">
                                    <div class="img-area mt-1" style="position: relative;">
                                        <img src="https://cdn.resize.sparkplatform.com/bis/640x480/true/20180828022716713054000000-o.jpg" alt="img11" class="cover">
                                        <div class="sub-tl">
                                            <span style="font-size: 18px;">$5,000(sep 7)</span>
                                        </div>
                                        <div class="sub-tr">
                                            <a href="#" class="btn-heart">
                                                <span class="img-heart sprite-heart-line"></span>
                                            </a>
                                        </div>
                                        <div class="sub-bl">
                                            <h4>
                                                <span class="icon-for-sale"></span>
                                                For sale by owner
                                            </h4>
                                            <p>
                                                <span class="photo-card-price"><strong>$85,000</strong></span>
                                                <span class="photo-card-info">
                                                    4 bds
                                                    <span class="interpunct">·</span>
                                                    1 ba
                                                    <span class="interpunct">·</span>
                                                     1,994 sqft
                                                </span>
                                            </p>
                                            <p class="photo-card-spec">
                                                <span class="photo-card-address">16 Cottage St, New York Mills, NY</span>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row collection-area mt-1">
                                        <div class="col-3" style="max-width: 100px;"><span>Collections</span></div>
                                        <div class="col-9">
                                            <a href="#">Amazing Views,</a>
                                            <a href="#">Big Family,</a>
                                            <a href="#">Big Family,</a>
                                            <a href="#">Big Family,</a>
                                            <a href="#">Big Family,</a>
                                            <a href="#">Big Yards,</a>
                                        </div>
                                    </div>
                                    <div class="agency-area mt-1 row">
                                        <div class="sub-1" >
                                            <div class=""><strong>Will Says:</strong> Make sure you...</div>
                                            <div class=""><a href="#">Register / Login TO READ MORE</a></div>
                                            <div class="img-agency">
                                                <img src="{{asset('images/agency2.png')}}" style="width: 100%;">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection

@section('add_custom_script')
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script>
        var sel_special = "{{$sel_special}}";
        var sel_neighborhood = "{{$sel_neighborhood}}";
        var sel_lifestyle = "{{$sel_lifestyle}}";
        var keys = ['special', 'neighborhood', 'lifestyle'];
        function add_get_param(url, key, value){
            if(url.indexOf("?") >= 0) {
                url += "&"+key+"="+value;
            }else{
                url += "?"+key+"="+value;
            }
            return url;
        }
        function url_generate() {
            var url = '/';
            for(var i in keys) {
                switch (keys[i]) {
                    case "special":
                        if(sel_special > 0){
                            url = add_get_param(url, keys[i], sel_special)
                        }
                        break;
                    case "neighborhood":
                        if(sel_neighborhood > 0){
                            url = add_get_param(url, keys[i], sel_neighborhood)
                        }
                        break;
                    case "lifestyle":
                        if(sel_lifestyle > 0){
                            url = add_get_param(url, keys[i], sel_lifestyle)
                        }
                        break;
                }
            }
            return url;
        }
        $(document).ready(function () {
            $('.list_carousel').slick({
                infinite: false,
                autoplay: true,
                slidesToShow: 2,
                slidesToScroll: 2,
                prevArrow: '<button type="button" class="slick-arrow-prev"><img src="{{asset('images/prev_70.png')}}" style="width:35px"></button>',
                nextArrow: '<button type="button" class="slick-arrow-next"><img src="{{asset('images/next_70.png')}}" style="width:35px"></button>',
                responsive: [
                    {
                        breakpoint: 900,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1,
                            infinite: true
                        }
                    }
                ]
            });
            $(".post-area").click(function () {
                document.location.href = "/detail";
            });
            $("#sel_special").change(function () {
                sel_special = $(this).val();
                var url = url_generate();
                location.href = url;
            });
            $("#sel_neighborhood").change(function () {
                sel_neighborhood = $(this).val();
                var url = url_generate();
                location.href = url;
            });
            $("#sel_lifestyle").change(function () {
                sel_lifestyle = $(this).val();
                var url = url_generate();
                location.href = url;
            });
        });
    </script>
@endsection