<div class="main_header" style="position: relative;">
    <nav class="header-navbar navbar-expand-md navbar-with-menu navbar-static-top navbar-border navbar-brand-center">
        <div class="navbar-wrapper">
            <div class="navbar-header">
                <ul class="nav navbar-nav flex-row">
                    <li class="nav-item mobile-menu d-md-none mr-auto">
                        <img class="img-fluid pull-right" src="https://s3.amazonaws.com/realtor-video/will-laura-tm-logo.png">
                    </li>
                    <li class="nav-item">
                        {{--<a class="navbar-brand" href="index.html">--}}
                        {{--<img class="brand-logo" alt="stack admin logo" src="../../../app-assets/images/logo/stack-logo.png">--}}
                        {{--<h2 class="brand-text">Realtor</h2>--}}
                        {{--</a>--}}
                    </li>
                    <li class="nav-item d-md-none">
                        <div class="">
                            <img class="img-fluid pull-right" src="https://s3.amazonaws.com/realtor-video/phone-number.png">
                        </div>
                        <div class="">
                            <button class="btn pull-right">WHAT'S MY HOME WORTH</button>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="center-layout">
                <div class="collapse navbar-collapse" id="navbar-mobile">
                    <ul class="nav navbar-nav mr-auto float-left">
                        <li class="nav-item d-none d-md-block">
                            <img class="img-fluid" src="https://s3.amazonaws.com/realtor-video/will-laura-tm-logo.png" style="margin-top: -31px;">
                        </li>
                    </ul>
                    <ul class="float-right">
                        <li class="">
                            <a href="tel:701-388-6171"><img class="img-fluid pull-right" src="https://s3.amazonaws.com/realtor-video/phone-number.png" style="vertical-align: super;"></a>
                        </li>
                        <li class="">
                            <button class="btn pull-right">WHAT'S MY HOME WORTH</button>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <div class="search-area row" style="margin: 0px;">
        <div class="col-md-12">
            <div class="card search-box" style="border-radius: 8px; background: rgba(255, 255, 255, 0.7);">
                <div class="card-content">
                    <div class="card-body" style="padding: 1.5rem;">
                        <form action="{{url('/results')}}" method="post">
                            {{csrf_field()}}
                            <div class="row">
                                <div class="col-xl-12">
                                    <fieldset class="form-group mr-1 addr-area">
                                        <input type="text" class="form-control pull-left" id="keywords" name="keywords" placeholder="Street Address or MLS Number...">
                                    </fieldset>
                                    <fieldset class="form-group">
                                        <button type="submit" class="btn btn-success btn-min-width pull-right" style="min-width: 100px; ">SEARCH</button>
                                    </fieldset>
                                </div>
                                <div class="col-xl-12 mt-1 sub-area">
                                    <fieldset class="form-group icheck_minimal mr-1" style="min-width: 70px;float: left;">
                                        <select class="form-control pull-left" id="beds" name="beds" style="width:55px;height: 29px !important;">
                                            <option value="0" @if (old('beds') == "0") {{ 'selected' }} @endif>0+</option>
                                            <option value="1" @if (old('beds') == "1") {{ 'selected' }} @endif>1+</option>
                                            <option value="2" @if (old('beds') == "2") {{ 'selected' }} @endif>2+</option>
                                            <option value="3" @if (old('beds') == "3") {{ 'selected' }} @endif>3+</option>
                                            <option value="4" @if (old('beds') == "4") {{ 'selected' }} @endif>4+</option>
                                            <option value="5" @if (old('beds') == "5") {{ 'selected' }} @endif>5+</option>
                                            <option value="6" @if (old('beds') == "6") {{ 'selected' }} @endif>6+</option>
                                        </select>
                                        <label for="input-bath" class="pull-left">Beds</label>
                                    </fieldset>
                                    <fieldset class="form-group icheck_minimal mr-1" style="min-width: 100px; max-width: 120px;float: left;">
                                        <select class="form-control pull-left" id="baths" name="baths" style="width:55px;height: 29px !important;">
                                            <option value="0" @if (old('baths') == "0") {{ 'selected' }} @endif>0+</option>
                                            <option value="1" @if (old('baths') == "1") {{ 'selected' }} @endif>1+</option>
                                            <option value="2" @if (old('baths') == "2") {{ 'selected' }} @endif>2+</option>
                                            <option value="3" @if (old('baths') == "3") {{ 'selected' }} @endif>3+</option>
                                            <option value="4" @if (old('baths') == "4") {{ 'selected' }} @endif>4+</option>
                                            <option value="5" @if (old('baths') == "5") {{ 'selected' }} @endif>5+</option>
                                            <option value="6" @if (old('baths') == "6") {{ 'selected' }} @endif>6+</option>
                                        </select>
                                        <label for="input-bath" class="pull-left">Baths</label>
                                    </fieldset>
                                    <fieldset class="form-group mr-1" style="min-width: 100px; max-width: 200px;float: left;">
                                        <span class="pull-left"><strong>$</strong></span>
                                        <input type="text" class="form-control pull-left text-right" style="width: 40px;" id="priceMax" name="priceMax" value="{{old('priceMax')}}">
                                        <span class="pull-left"><strong>,000</strong>(max)</span>
                                    </fieldset>
                                    <fieldset class="form-group mr-1 minSqft-area" style="min-width: 100px; max-width: 200px;float: left;">
                                        <input type="text" class="form-control pull-left text-right" style="width: 40px;" id="minSqft" name="minSqft">
                                        <span class="pull-left">Min SqFt</span>
                                    </fieldset>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--<div style="width:100%;position: absolute; bottom: 0px;">--}}
    {{--<img src="https://s3.amazonaws.com/realtor-video/white-arch.png" class="img-fluid">--}}
    {{--</div>--}}
</div>
