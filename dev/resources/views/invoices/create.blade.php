@extends('layouts.app', ['title' => __('Dodaj fakturę')]) @section('content') @include('layouts.headers.default')

<div class="container-fluid mt--7">
	<div class="row">
		<div class="col-xl-12 order-xl-1">
			<div class="card bg-secondary shadow">
				<div class="card-header bg-white border-0">
					<div class="row align-items-center">
						<div class="col-8">
							<h3 class="mb-0">{{ __('Dodaj nową fakturę') }}</h3>
						</div>
						<div class="col-4 text-right">
							<a href="{{ route('invoice.index') }}" class="btn btn-sm btn-primary">{{ __('Wróć do listy kontrahentów') }}</a>
						</div>
					</div>
				</div>
				<div class="card-body">
					<form method="post" action="{{ route('invoice.store') }}" autocomplete="off">
						@csrf

						<div class="pl-lg-4">


							<div>
								<label class="form-control-label" for="input-name">{{ __('Nazwa kontrahenta') }}</label>
		
								<div class="form-group">
									<select class="js-select form-control" name="id">
										@foreach ($clients as $client)
											<option value="{{ $client->id }}">{{ $client->name }} {{ $client->firstName }} {{ $client->lastName }}</option>
										@endforeach
									</select>
								</div>

								@if ($errors->has('name'))
								<span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span> @endif
							</div>


							<div class="row">
							
								<div class="col-xl-12 js-invoice-content">

									<div class="row">
										<div class="col col-xl-4 col-sm-12">

											<div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
												<label class="form-control-label" for="input-password">{{ __('Nazwa towaru/usługi') }}</label>
												<input type="text" name="product_name[]" id="input-password" class="form-control form-control-alternative{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('') }}" value="Kodowanie strony" required> 
											
												@if ($errors->has('password'))
												<span class="invalid-feedback" role="alert">
                                            	<strong>{{ $errors->first('password') }}</strong>
                                        		</span> 
												
												@endif
											</div>

										</div>

										<div class="col col-xl-2 col-sm-12">
											<div class="form-group{{ $errors->has('product__count') ? ' has-danger' : '' }}">
												<label class="form-control-label" for="product_count">{{ __('Ilość') }}</label>
												<input type="number" name="product_count[]" id="product_count" class="form-control form-control-alternative{{ $errors->has('product__count') ? ' is-invalid' : '' }}" placeholder="{{ __('') }}" value="24" required> 
												@if ($errors->has('product__count'))
												<span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('product__count') }}</strong>
                                        	</span> @endif
											</div>

										</div>

										<div class="col col-xl-2 col-sm-12">
											<div class="form-group{{ $errors->has('product_price') ? ' has-danger' : '' }}">
												<label class="form-control-label" for="product_price">{{ __('Kwota') }}</label>
												<input type="text" name="product_price[]" class="form-control form-control-alternative{{ $errors->has('product_price') ? ' is-invalid' : '' }}" placeholder="{{ __('') }}" value="200" required> @if ($errors->has('product_price'))
												<span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('product_price') }}</strong>
                                      	  </span> @endif
											</div>

										</div>

									</div>
									</div>

									<div class="js-invoice-item">

									<div class="row">
										<div class="col col-xl-4 col-sm-12">
											<div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
												<label class="form-control-label" for="input-password">{{ __('Nazwa towaru/usługi') }}</label>
												<input type="text" name="product_name[]" id="input-password" class="form-control form-control-alternative{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('') }}" value="" required> @if ($errors->has('password'))
												<span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span> @endif
											</div>
										</div>

										<div class="col col-xl-2 col-sm-12">
											<div class="form-group{{ $errors->has('product__count') ? ' has-danger' : '' }}">
												<label class="form-control-label" for="product_count">{{ __('Ilość') }}</label>
												<input type="number" name="product_count[]" id="product_count" class="form-control form-control-alternative{{ $errors->has('product__count') ? ' is-invalid' : '' }}" placeholder="{{ __('') }}" value="" required> 
												@if ($errors->has('product__count'))
												<span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('product__count') }}</strong>
                                        </span> @endif
											</div>

										</div>

										<div class="col col-xl-2 col-sm-12">
											<div class="form-group{{ $errors->has('product_price') ? ' has-danger' : '' }}">
												<label class="form-control-label" for="product_price">{{ __('Kwota') }}</label>
												<input type="text" name="product_price[]" class="form-control form-control-alternative{{ $errors->has('product_price') ? ' is-invalid' : '' }}" placeholder="{{ __('') }}" value="" required> @if ($errors->has('product_price'))
												<span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('product_price') }}</strong>
                                        </span> @endif
											</div>

										</div>

										<div class="col col-xl-2 col-sm-12">
											<div class="form-group">
												<button type="button" class="js-invoice-btn-remove btn btn-danger btn-invoice">Usuń</button>
											</div>
										</div>

									</div>
								</div>

							</div>

							<div class="row">

							<div class="col col-xl-2 col-sm-12">
								<div class="form-group">
									<button type="button" class="js-invoice-btn-add btn btn-success">Dodaj produkt</button>
								</div>
							</div>
							</div>

							<div class="row">

								<div class="col col-xl-2 col-sm-12">
									<div class="form-group">
										<label class="form-control-label" for="payment_status">Sposób zapłaty</label>
										<select class="form-control" id="payment_status" name="payment_status">
												<option value="przelew">Przelew</option>
												<option value="karta płatnicza">Karta płatnicza</option>
												<option value="przy odbiorze">Przy odbiorze</option>
												<option value="gotówka">Gotówka</option>
										</select>
									</div>
								</div>
								
								<div class="col col-xl-2 col-sm-12">
									<div class="form-group">
										<label class="form-control-label" for="payment_status">Termin zapłaty</label>
										<select class="form-control" id="payment_status" name="payment_date">
												<option value="14">14 dni</option>
												<option value="7">7 dni</option>
												<option value="0">Zapłacono</option>
										</select>
									</div>
								</div>
								
							</div>

							<!--
							<div class="row">
								<div class="col-xl-12">

									<div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
										<label class="form-control-label" for="input-password">{{ __('Nazwa towaru/usługi') }}</label>
										<input type="text" name="product__name[]" id="input-password" class="form-control form-control-alternative{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('') }}" value="" required> @if ($errors->has('password'))
										<span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span> @endif
									</div>

								</div>
							</div>
-->

							<div class="text-center">
								<button type="submit" class="btn btn-success mt-4">{{ __('Dodaj') }}</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	@include('layouts.footers.auth')
</div>
@endsection
