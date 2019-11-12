@extends('layouts.app', ['title' => __('Client Management')]) @section('content') @include('layouts.headers.default')

<div class="container-fluid mt--7">
	<div class="row">
		<div class="col">
			<div class="card shadow">
				<div class="card-header border-0">
					<div class="row align-items-center">
						<div class="col-8">
							<h3 class="mb-0">{{ __('Lista kontrahentów') }}</h3>
						</div>
						<div class="col-4 text-right">
							<a href="{{ route('client.create') }}" class="btn btn-sm btn-primary">{{ __('Dodaj nowego kontrahenta') }}</a>
						</div>
					</div>
				</div>

				<div class="col-12">
					@if (session('status'))
					<div class="alert alert-success alert-dismissible fade show" role="alert">
						{{ session('status') }}
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
					</div>
					@endif
				</div>

				<div class="table-responsive">
					<table class="table align-items-center table-flush">
						<thead class="thead-light">
							<tr>
								<th scope="col">{{ __('NIP') }}</th>
								<th scope="col">{{ __('Firma') }}</th>
								<th scope="col">{{ __('Imie') }}</th>
								<th scope="col">{{ __('Nazwisko') }}</th>
								<th scope="col">{{ __('ulica') }}</th>
								<th scope="col">{{ __('miasto') }}</th>
								<th scope="col">{{ __('kod pocztowy') }}</th>
								<th scope="col">{{ __('numer telefonu') }}</th>
								<th scope="col"></th>
							</tr>
						</thead>
						<tbody>
							@foreach ($clients as $client)
							<tr>
					            @if ($client->category == 1)
								<td>
									<a href="{{ route('client.index', $client->id ) }}">{{ $client->NIP != "" ? $client->NIP : "Osoba prywatna" }}</a>
								</td>
                                        <td>{{ $client->name  }}</td>
                                @else
                                        <td>  Osoba Prywatna </td>
                                        <td>  Osoba Prywatna </td>
                                @endif
								<td>
									<a href="mailto:{{ $client->firstName }}">{{ $client->firstName }}</a>
								</td>
								<td>
									<a href="mailto:{{ $client->lastName }}">{{ $client->lastName }}</a>
								</td>
                                <td> {{$client->street}}</td>
                                <td> {{$client->town}} </td>
                                <td> {{$client->postcode}}</td>
                                <td> {{$client->phone_number}} </td>
								<td class="text-right">
									<div class="dropdown">
										<a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
										<div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
											@if ($client->id != auth()->id())
											<form action="{{ route('client.index', $client) }}" method="post">
												@csrf @method('delete')

												<a class="dropdown-item" href="{{ route('client.index', $client) }}">{{ __('Edytuj') }}</a>
												<button type="button" class="dropdown-item" onclick="confirm('{{ __(" Czy na pewno chcesz usunąć tego kontrahenta? ") }}') ? this.parentElement.submit() : ''">
                                                                {{ __('Usuń') }}
                                                            </button>
											</form>
											@else
											<a class="dropdown-item" href="{{ route('profile.edit') }}">{{ __('Edytuj') }}</a> @endif
										</div>
									</div>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
				{{--
				<div class="card-footer py-4">
					<nav class="d-flex justify-content-end" aria-label="...">
						{{ $client->links() }}
					</nav>
				</div>
				--}}
			</div>
		</div>
	</div>

	@include('layouts.footers.auth')
</div>
@endsection
