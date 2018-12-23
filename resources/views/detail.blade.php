@extends('layouts.user')

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
								<div class="col-12">
									<div class="row">
										<div class="col-8">
											<img src="{{$lPhotos[0]['Uri1280']}}" class="d-block cover ">
										</div>
										<div class="col-4">
											<div>
												@php
													$googleKey = 'AIzaSyDy-jovR7o4PAX7EE0UzVdCVrHIVh25cCA';
                                                    $url = "https://maps.googleapis.com/maps/api/staticmap?center=".urlencode($detail['UnparsedFirstLineAddress'].",".$detail['City'].', ND')."&zoom=11&size=400x250&maptype=roadmap&markers=color:red|".urlencode($detail['UnparsedFirstLineAddress'].",".$detail['City'].', ND') ."&key=".$googleKey;
												@endphp
												<img src="{{$url}}" class="d-block cover">
											</div>
											<div class="mt-1">
												@if (count($lPhotos) > 1)
												<img src="{{$lPhotos[0]['Uri640']}}" class="d-block cover">
												@endif
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-8 col-12">
									<div class="row mt-1">
										<div class="col-7">
											<h1>{{$detail['UnparsedFirstLineAddress']}}&nbsp;</h1>
											<h2>{{$detail['City']}}</h2>
											<h3 class="edit-facts-light">
												<span class="middle-dot" aria-hidden="true">&nbsp;</span><span>{{$detail['BedsTotal']}} beds</span><span class="middle-dot" aria-hidden="true">&nbsp;</span><span>{{$detail['BathsTotal']}} bath</span><span class="middle-dot" aria-hidden="true">&nbsp;</span><span>{{number_format($detail['BuildingAreaTotal'])}} sqft</span>
											</h3>
										</div>
										<div class="col-5">
											<div class="home-details-price-area zsg-content-item">
												<div class="estimates">
													<div>
														<div class="status">
															<span class="zsg-icon-for-sale"></span>
															{{$detail['PropertyTypeLabel']}}
														</div>
														<div class="price">
															<span class="value">${{number_format($detail['ListPrice'])}}</span>
														</div>
													</div>
												</div>
												<div class="payment-calculator mt-1">
													<section id="mortgage-calculator-app-hdp-summary" class="zsg-content-item">
														<h4 class="content_collapsed">EST. MORTGAGE</h4>
														<h4 class="content_collapsed">$486/mo</h4>
													</section>
												</div>
											</div>
										</div>
									</div>
									<div class="mt-1">
										{!! $publicRemarks !!}
									</div>
								</div>
								<div class="col-md-4 col-12">
									<div class="card" style="margin: 20px 10px;border: 1px solid #ccd6e6;">
										<div class="card-content">
											<div class="card-body">
												<h4 class="card-title">Contact Agent</h4>
											</div>
											<div class="card-body">
												<form class="form contact-form">
													<div class="form-body">
														<div class="form-group position-relative has-icon-left">
															<input type="text" class="form-control" id="user-name" placeholder="Your Name" required>
															<div class="form-control-position">
																<i class="ft-user"></i>
															</div>
														</div>
														<div class="form-group position-relative has-icon-left">
															<input type="text" class="form-control" id="user-name" placeholder="Phone"
																   required>
															<div class="form-control-position">
																<i class="fa fa-phone"></i>
															</div>
														</div>
														<div class="form-group position-relative has-icon-left">
															<input type="text" class="form-control" id="user-name" placeholder="Email"
																   required>
															<div class="form-control-position">
																<i class="fa fa-envelope-o"></i>
															</div>
														</div>
														<div class="form-group">
															<label for="donationinput7" class="sr-only">Message</label>
															<textarea id="donationinput7" rows="5" class="form-control square" name="message"
																	  placeholder="message"></textarea>
														</div>
													</div>
													<div class="form-actions center">
														<button type="submit" class="btn btn-outline-primary">Send</button>
													</div>
												</form>
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
	<script>
        $(document).ready(function () {
        });
	</script>

@endsection

