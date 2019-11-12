@extends('layouts.app', ['title' => __('Dodaj nowego kontrahenta')])

@section('content')
     @include('layouts.headers.default') 

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Dodaj nowego kontrahenta') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('client.index') }}" class="btn btn-sm btn-primary">{{ __('Wróć do listy kontrahentów') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('client.store') }}" autocomplete="off">
                            @csrf
                            <div class="row">

                            <div class="col-lg-4 col-sm-6">
                            <div class="form-group{{  $errors->has('category') ? ' has-error' : ''}}">
                            <div class="form col s12 xl7" id="radio-wrapper">
                                @if(Request::old('category') == 1)
                                <input type="radio" class="with-gap" name="category" class="form-control" placeholder="Nazwa firmy" value="1" id="company-select" checked/>
                                <label class="label-gap" for="company-select">Firma</label>

                                <input type="radio" class="with-gap" name="category" class="form-control" value="2" id="person-select" />
                                <label class="label-gap" for="person-select">Osoba fizyczna</label> 
                                @elseif(Request::old('category') == 2)
                                <input type="radio" class="with-gap" name="category" class="form-control" placeholder="Nazwa firmy" value="1" id="company-select" />
                                <label class="label-gap" for="company-select">Firma</label>

                                <input type="radio" class="with-gap" name="category" class="form-control" value="2" id="person-select" checked/>
                                <label class="label-gap" for="person-select">Osoba fizyczna</label> 
                                @else
                                <input type="radio" class="with-gap" name="category" class="form-control" placeholder="Nazwa firmy" value="1" id="company-select" checked/>
                                <label class="label-gap" for="company-select">Firma</label>

                                <input type="radio" class="with-gap" name="category" class="form-control" value="2" id="person-select"/>
                                <label class="label-gap" for="person-select">Osoba fizyczna</label> @endif
                            </div>
                            
                            <div for="category" class="form col s12 xl5 error-input">
                                <span class="help-block" data-error="company">
                                @if ($errors->has('category'))
                                    <label class="invalid">{{  $errors->first('category') }}</label>
                                @endif
                                </span>
                            </div>
                            </div>
                            </div> 

                            <div class="col-lg-4 col-sm-6">
                                 <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Nazwa Firmy') }}</label>
                                    <input type="text" name="name" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Nazwa Firmy') }}" value="{{ old('name') }}" autofocus>

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                 </div>
                            </div>

                            <div class="col-lg-4 col-sm-6">
                                 <div class="form-group{{ $errors->has('NIP') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-NIP">{{ __('NIP Firmy') }}</label>
                                    <input type="text" name="NIP" id="input-NIP" class="form-control form-control-alternative{{ $errors->has('NIP') ? ' is-invalid' : '' }}" placeholder="{{ __('NIP Firmy') }}" value="{{ old('NIP') }}" autofocus>

                                    @if ($errors->has('NIP'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('NIP') }}</strong>
                                        </span>
                                    @endif
                                 </div>
                            </div>
                            
                            <div class="col-lg-4 col-sm-6">
                                 <div class="form-group{{ $errors->has('firstName') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-firstName">{{ __('Imię') }}</label>
                                    <input type="text" name="firstName" id="input-firstName" class="form-control form-control-alternative{{ $errors->has('firstName') ? ' is-invalid' : '' }}" placeholder="{{ __('Imię') }}" value="{{ old('firstName') }}" autofocus>

                                    @if ($errors->has('firstName'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('firstName') }}</strong>
                                        </span>
                                    @endif
                                 </div>
                            </div>
                            
                            <div class="col-lg-4 col-sm-6">
                                 <div class="form-group{{ $errors->has('lastName') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-lastName">{{ __('Nazwisko') }}</label>
                                    <input type="text" name="lastName" id="input-lastName" class="form-control form-control-alternative{{ $errors->has('lastName') ? ' is-invalid' : '' }}" placeholder="{{ __('Nazwisko') }}" value="{{ old('lastName') }}" autofocus>

                                    @if ($errors->has('lastName'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('lastName') }}</strong>
                                        </span>
                                    @endif
                                 </div>
                            </div>
                            
                            <div class="col-lg-4 col-sm-6">
                                 <div class="form-group{{ $errors->has('street') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-street">{{ __('Ulica') }}</label>
                                    <input type="text" name="street" id="input-street" class="form-control form-control-alternative{{ $errors->has('street') ? ' is-invalid' : '' }}" placeholder="{{ __('Ulica') }}" value="{{ old('street') }}" autofocus>

                                    @if ($errors->has('street'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('street') }}</strong>
                                        </span>
                                    @endif
                                 </div>
                            </div>
                            
                            <div class="col-lg-4 col-sm-6">
                                 <div class="form-group{{ $errors->has('town') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-town">{{ __('Miejscowość') }}</label>
                                    <input type="text" name="town" id="input-town" class="form-control form-control-alternative{{ $errors->has('town') ? ' is-invalid' : '' }}" placeholder="{{ __('Miejscowość') }}" value="{{ old('town') }}" autofocus>

                                    @if ($errors->has('town'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('town') }}</strong>
                                        </span>
                                    @endif
                                 </div>
                            </div>
                            
                            <div class="col-lg-4 col-sm-6">
                                 <div class="form-group{{ $errors->has('postcode') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-postcode">{{ __('Kod Pocztowy') }}</label>
                                    <input type="text" name="postcode" id="input-postcode" class="form-control form-control-alternative{{ $errors->has('postcode') ? ' is-invalid' : '' }}" placeholder="{{ __('Kod Pocztowy') }}" value="{{ old('postcode') }}" autofocus>

                                    @if ($errors->has('postcode'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('postcode') }}</strong>
                                        </span>
                                    @endif
                                 </div>
                            </div>

                            <div class="col-lg-4 col-sm-6">
                                 <div class="form-group{{ $errors->has('postcode_town') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-postcode_town">{{ __('Poczta') }}</label>
                                    <input type="text" name="postcode_town" id="input-postcode_town" class="form-control form-control-alternative{{ $errors->has('postcode_town') ? ' is-invalid' : '' }}" placeholder="{{ __('Poczta') }}" value="{{ old('postcode_town') }}" autofocus>

                                    @if ($errors->has('postcode_town'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('postcode_town') }}</strong>
                                        </span>
                                    @endif
                                 </div>
                            </div>
                            
                            <div class="col-lg-4 col-sm-6">
                                 <div class="form-group{{ $errors->has('property_number') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-property_number">{{ __('Numer Domu/Lokalu') }}</label>
                                    <input type="text" name="property_number" id="input-property_number" class="form-control form-control-alternative{{ $errors->has('property_number') ? ' is-invalid' : '' }}" placeholder="{{ __('Number Domu/Lokalu') }}" value="{{ old('property_number') }}" autofocus>

                                    @if ($errors->has('property_number'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('property_number') }}</strong>
                                        </span>
                                    @endif
                                 </div>
                            </div>
                            
                            <div class="col-lg-4 col-sm-6">
                                 <div class="form-group{{ $errors->has('phone_number') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-phone_number">{{ __('Numer Telefonu') }}</label>
                                    <input type="text" name="phone_number" id="input-phone_number" class="form-control form-control-alternative{{ $errors->has('phone_number') ? ' is-invalid' : '' }}" placeholder="{{ __('Number Telefonu') }}" value="{{ old('phone_number') }}" autofocus>

                                    @if ($errors->has('phone_number'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('phone_number') }}</strong>
                                        </span>
                                    @endif
                                 </div>
                            </div>

                            </div>

                            <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">{{ __('Dodaj') }}</button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        @include('layouts.footers.auth')
    </div>
@endsection
