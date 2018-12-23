@extends('layouts.admin')

@section('add_css')
	<link rel="stylesheet" href="{{ asset('app-assets/vendors/css/forms/selects/select2.min.css') }}">
@endsection

@section('content')
	@php
		$detail = $listing['StandardFields'];
	@endphp
	<div class="app-content container center-layout mt-2">
		<div class="content-wrapper">
			<div class="content-body">
				<section id="hover-effects" class="card" style="box-shadow: none;">
					<div class="card-content">
						<div class="card-body">
							<div class="row">
								<div class="col-md-6 col-12">
									<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
										<div class="carousel-inner" role="listbox">
											@for($i = 0; $i < count($lPhotos); $i ++)
												@php
													$active_slider = $i == 0 ? "active" : "";
												@endphp
												<div class="carousel-item {{$active_slider}}">
													<img src="{{$lPhotos[$i]['Uri640']}}" class="d-block w-100 cover">
												</div>
											@endfor
										</div>
										<a class="carousel-control-prev" href="#carousel-example-generic" role="button" data-slide="prev">
											<span class="fa fa-angle-left icon-prev" aria-hidden="true"></span>
											<span class="sr-only">Previous</span>
										</a>
										<a class="carousel-control-next" href="#carousel-example-generic" role="button" data-slide="next">
											<span class="fa fa-angle-right icon-next" aria-hidden="true"></span>
											<span class="sr-only">Next</span>
										</a>
									</div>
									<button type="button" id="save_product" class="btn btn-success btn-min-width mb-1 mt-1 pull-right"><i class="fa fa-save"></i> SAVE</button>
									<textarea class="form-control mt-1" id="comment" name="comment" rows="3" placeholder="Realtor's opinion goes here...">{{$listing_comment}}</textarea>
									<div class="row mt-1">
										<div class="col-6">
											<span>{{$detail['UnparsedFirstLineAddress']}}&nbsp;{{$detail['City']}}</span>
										</div>
										<div class="col-6 text-right">
											<p style="margin: 0px;">${{number_format($detail['ListPrice'])}}</p>
											<p style="margin: 0px;">$204 / sqft</p>
										</div>
									</div>
									<h3 class="mt-1">{{$detail['BedsTotal']}}beds,  {{$detail['BathsTotal']}}baths, {{number_format($detail['BuildingAreaTotal'])}}sqft</h3>
									<div class="mt-1">
										{!! $publicRemarks !!}
									</div>
								</div>
								<div class="col-md-6 col-12">
									<div class="form-group">
										<select class="select2 form-control" multiple="multiple" name="collection_ids" id="collection_ids">
											@foreach($collections as $p)
												@if (in_array($p->id, $listing_collections))
													<option value="{{$p->id}}" selected>{{$p->name}}</option>
												@else
													<option value="{{$p->id}}">{{$p->name}}</option>
												@endif
											@endforeach
										</select>
									</div>
									<div class="form-group">
										@php
											$googleKey = 'AIzaSyDy-jovR7o4PAX7EE0UzVdCVrHIVh25cCA';
											$url = "https://maps.googleapis.com/maps/api/staticmap?center=".urlencode($detail['UnparsedFirstLineAddress'].",".$detail['City'].', ND')."&zoom=11&size=400x250&maptype=roadmap&markers=color:red|".urlencode($detail['UnparsedFirstLineAddress'].",".$detail['City'].', ND') ."&key=".$googleKey;
										@endphp
										<img width="100%" src="{{$url}}">
									</div>
									<div class="form-group row">
										<div class="col-xl-6 col-12">
											<h4>LISTING DETAILS</h4>
											<ul class="pl-1">
												<li>
													<strong>Construction:</strong> Brick, Viny!
												</li>
												<li>
													<strong>Construction:</strong> Brick, Viny!
												</li>
											</ul>

										</div>
										<div class="col-xl-6 col-12">
											<h4>Gardner's Categories</h4>
											<ul class="pl-1">
												<li>
													<strong>Construction:</strong> Brick, Viny!
												</li>
												<li>
													<strong>Construction:</strong> Brick, Viny!
												</li>
											</ul>
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
	<script src="{{asset('app-assets/js/scripts/forms/select/form-select2.js')}}" type="text/javascript"></script>	<script>
        $(document).ready(function () {
            $("#save_product").click(function () {
                var comment = $("#comment").val();
                var mls_id = "{{$mls_id}}";
                var collection_ids = $("#collection_ids").val();
//                $('select[name="collection"]:checked').each(function() {
//                    collection_ids.push(this.value);
//                });
                $("#save_product").find("i").removeClass("fa-save").addClass("fa-refresh spinner");
                $.post(
                    "{{route('admin-product-save')}}",
                    {
                        _token:'{{csrf_token()}}',
                        comment : comment,
                        mls_id : mls_id,
                        collection_ids : collection_ids
                    },
                    function (response) {
                        $("#save_product").find("i").removeClass("fa-refresh spinner").addClass("fa-save");
                        if(response.status == "OK"){
                            setTimeout(function () {
//                                alert(response.message);
                            }, 1000);

                        }else{
//                            alert(response.message);
                        }

                    },"json"
                );
            });
        });
	</script>

@endsection

