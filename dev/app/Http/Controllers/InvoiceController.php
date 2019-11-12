<?php

namespace App\Http\Controllers;

use App\Client;
use App\Invoice;
use App\InvoicePosition;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Dompdf\Dompdf;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $invoices = Invoice::orderBy('id', 'DESC')->paginate(30);

		return view('invoices.index', ['invoices' => $invoices]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		
		$clients = Client::orderBy('id', 'DESC')->paginate(30);

//		dd($clients);
		
        return view('invoices.create', ['clients' => $clients]);
    }
	
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {	
        $client = Client::where('id', '=', $request->id)->first();

        $product = $request->input('product_name');
	    $product_count = $request->input('product_count');
		$product_price = $request->input('product_price');
        $payment_status = $request->input('payment_status');
		$paymeny_date = $request->input('payment_date');
        $exp_date = Carbon::now()->addDays($paymeny_date)->format('Y-m-d\TH:i:s');
       
       
        $params = [
            'category' => $client->category,
            'NIP' => $client->NIP,
            'name' => $client->name,
            'firstName' => $client->firstName,
            'lastName' => $client->lastName,
            'street' => $client->street,
            'town' => $client->town,
            'postcode' => $client->postcode,
			'postcode_town' => $client->postcode_town,
            'property_number' => $client->property_number,
            'payment_status' => $payment_status,
        ];
      
        $invoice = new Invoice();
        $invoice = $invoice->fillInvoice($params, $invoice);

        if ($invoice != false) {
			
         $client->invoice()->save($invoice);

         foreach ($product as $key => $value) {
            $position = new InvoicePosition();
            $position->price = $product_price[$key];
            $position->product_count = $product_count[$key];
            $position->item = $value;
            $invoice->position()->save($position);
         };
        return redirect()
                ->back()
                ->with('info', 'Twoja faktura została utworzona.');
          
        } else {
            return redirect()
                ->back()
                ->with('error', 'Coś poszło nie tak, spróbuj ponownie.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($user, $invoice)
    {
        $invoice = Invoice::find($invoice);
        
            if (!is_null($invoice)) {
                $invoice_positions = InvoicePosition::where('invoice_id', $invoice->id)->orderBy('id', 'desc')->get();
                $total_price = $invoice->totalPrice($invoice->id);
                return view('invoices/invoice', compact('invoice', 'invoice_positions', 'total_price'));
            }
        
        return redirect('/');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function generatePDFInvoice($invoice)
    {
        $invoice = Invoice::find($invoice);

            if (!is_null($invoice)) {
                $dompdf = new Dompdf();
                $dompdf->loadHtml($invoice->renderInvoice($invoice));
                $dompdf->render();
                $dompdf->stream('faktura.pdf');
            }
    }

}
