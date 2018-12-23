<div class="app-content container center-layout mt-2">
    <div class="content-wrapper">
        <div class="content-body">
            <section class="basic-elements">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card search-box" style="border-radius: 8px; background: rgba(255, 255, 255, 0.7);">
                            <div class="card-content">
                                <div class="card-body">
                                    <form action="{{url('/results')}}" method="post">
                                        {{csrf_field()}}
                                        <div class="row">
                                            <div class="col-xl-12 mt-1">
                                                <fieldset class="form-group mr-1" style="min-width: 100px; float: left;">
                                                    <input type="text" class="form-control pull-left" id="keywords" name="keywords" placeholder="Address MLS Number...">
                                                </fieldset>
                                                <fieldset class="form-group icheck_minimal mr-1" style="min-width: 70px; max-width: 120px;float: left;">
                                                    <select class="form-control pull-left" id="beds" name="beds" style="width:45px;height: 21px !important;">
                                                        <option value="0" @if (old('beds') == "0") {{ 'selected' }} @endif>0+</option>
                                                        <option value="1" @if (old('beds') == "1") {{ 'selected' }} @endif>1+</option>
                                                        <option value="2" @if (old('beds') == "2") {{ 'selected' }} @endif>2+</option>
                                                        <option value="3" @if (old('beds') == "3") {{ 'selected' }} @endif>3+</option>
                                                        <option value="4" @if (old('beds') == "4") {{ 'selected' }} @endif>4+</option>
                                                        <option value="5" @if (old('beds') == "5") {{ 'selected' }} @endif>5+</option>
                                                        <option value="6" @if (old('beds') == "6") {{ 'selected' }} @endif>6+</option>
                                                    </select>
                                                    <label for="input-bath" class="pull-left">Bed</label>
                                                </fieldset>
                                                <fieldset class="form-group icheck_minimal mr-1" style="min-width: 80px; max-width: 120px;float: left;">
                                                    <select class="form-control pull-left" id="baths" name="baths" style="width:45px;height: 21px !important;">
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
                                                <fieldset class="form-group mr-1" style="min-width: 140px; float: left;">
                                                    <span class="pull-left">$</span>
                                                    <input type="text" class="form-control pull-left text-right" style="width: 40px;" id="priceMax" name="priceMax" value="{{old('priceMax')}}">
                                                    <span class="pull-left"> ,000 (max)</span>
                                                </fieldset>
                                                 <fieldset class="form-group mr-1 minSqft-area" style="min-width: 100px; max-width: 200px;float: left;">
                                                     <input type="text" class="form-control pull-left text-right" style="width: 40px;" id="minSqft" name="minSqft">
                                                     <span class="pull-left">SqFt (min)</span>
                                                 </fieldset>
                                                <fieldset class="form-group" style="min-width: 100px; float: right;">
                                                    <button type="submit" class="btn btn-success btn-min-width" style="margin-top: -10px;">SEARCH</button>
                                                </fieldset>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
