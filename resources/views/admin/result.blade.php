@extends('layouts.admin')

@section('content')
	<div class="app-content container center-layout mt-2">
		<div class="content-wrapper">
			<div class="content-header row">
				<div class="content-header-left col-md-4 col-sm-6 col-12 mb-2">
					<h3 class="content-header-title mb-0">{{count($listings)}} Homes found</h3>
				</div>
<!--
				<div class="content-header-right col-md-8 col-sm-6 col-12">
					<div class="row">
						<div class="col-md-2 col-sm-3 col-xl-3 col-12">Newest</div>
						<div class="col-md-2 col-sm-3 col-xl-3 col-12">Cheapest</div>
						<div class="col-md-2 col-sm-3 col-xl-3 col-12">More...</div>
					</div>
				</div>
-->
			</div>
			<div class="content-body">
				<section id="hover-effects" class="card">
					<div class="card-content">
						<div class="card-body my-gallery" itemscope itemtype="http://schema.org/ImageGallery">
							<div class="grid-hover row">
								@for ($i = 0; $i < count($listings); $i++)
									@php
										$detail = $listings[$i]['StandardFields'];
										$listing_id = $listings[$i]['Id'];
									@endphp
									<div class="col-md-4 col-12">
										<figure class="effect-marley">
											<img src="{{$lPhoto[$listing_id]}}" alt="img11" class="cover img-height-265" />
											<figcaption>
												<h2>
													<div class="pull-left text-left">
														<span>${{number_format($detail['ListPrice'])}}</span>
													</div>
													<div class="pull-right" style="max-width: 60%;">
														<label class="font-size-small font-weight-light">{{$detail['BedsTotal']}}beds,  {{$detail['BathsTotal']}}baths, {{number_format($detail['BuildingAreaTotal'])}}sqft</label>
														<label class="font-size-small font-weight-light">{{$detail['UnparsedFirstLineAddress']}}&nbsp;{{$detail['City']}}</label>
													</div>
												</h2>
												<p>{{$detail['ListOfficeName']}}</p>
												<a href="{{url('admin/product?ListingId='.$detail['ListingId'])}}">View more</a>
											</figcaption>
										</figure>
									</div>
								@endfor


							</div>
						</div>
					</div>
				</section>
			</div>
		</div>
	</div>
@endsection

@section('add_custom_script')
	<script src="{{asset('app-assets/vendors/js/forms/tags/form-field.js')}}" type="text/javascript"></script>
@endsection
