@extends('layouts.app', ['title' => __('Client Management')]) @section('content') @include('layouts.headers.default')

<div class="container-fluid mt--7">
	<div class="row">
		<div class="col">
			<div class="card shadow">
				<div class="card-header border-0">
					<div class="row align-items-center">
						<div class="col-8">
							<h3 class="mb-0">{{ __('Lista faktur') }}</h3>
						</div>
						<div class="col-4 text-right">
							<a href="{{ route('invoice.create') }}" class="btn btn-sm btn-primary">{{ __('Dodaj nową fakturę') }}</a>
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
								<th scope="col"></th>
							</tr>
						</thead>
						<tbody>
							@foreach ($invoices as $invoice)
							<tr>
                                @if ($invoice->category == 1)
								<td>
									<a href="{{ route('invoice.index', $invoice->id ) }}">{{ $invoice->NIP != "" ? $invoice->NIP : "Osoba prywatna" }}</a>
								</td>
                                        <td>{{ $invoice->name  }}</td>
                                @else
                                        <td>  Osoba Prywatna </td>
                                        <td>  Osoba Prywatna </td>
                                @endif
								<td> {{ $invoice->firstName }}</td>
								<td> {{ $invoice->lastName  }}</td>
                                <td> {{ $invoice->street    }}</td>
                                <td> {{ $invoice->town      }}</td>
                                <td> {{ $invoice->postcode  }}</td>
								<td class="text-right">
									<a class="btn btn-sm btn-primary" href="{{ route('invoice.generatePDF', ['id' => Auth::user()->id, 'invoice' => $invoice ]) }}" type="button">Pobierz</a>
									<a class="btn btn-sm btn-primary" href="{{ route('invoice.show', ['id' => Auth::user()->id, 'invoice' => $invoice ]) }}" type="button">Zobacz</a>
								</td>
								
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	
	@include('layouts.footers.auth')
</div>
@endsection
