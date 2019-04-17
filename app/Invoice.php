<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\Cast\Array_;


class Invoice extends Model
{
    protected $fillable = [
        'number',
        'status',
        'payment_form',
        'product',
        'status',
        'price',
        'category',
    ];

    public function generateInvoiceNumber()
    {
        $invoice = Invoice::select('id','number')->orderBy('id', 'desc')->first();
        if (count($invoice)) {
            if(strlen($invoice->number) == 11) {
                $old_number = substr($invoice->number, -11, 1);
            } else if (strlen($invoice->number) == 12) {
                 $old_number = substr($invoice->number, -12, 2);
            } else if (strlen($invoice->number) == 13) {
                $old_number = substr($invoice->number, -13, 3);
            } else if (strlen($invoice->number) == 14) {
                $old_number = substr($invoice->number, -14, 4);
            } else if (strlen($invoice->number) == 15) {
                $old_number = substr($invoice->number, -15, 5);
            } else if (strlen($invoice->number) == 16) {
                $old_number = substr($invoice->number, -16, 6);
            }

            $date = (++$old_number).'/'.date('m').'/a/'. date('Y');
            $old_month = substr($invoice->number, -9, 2);

            if ($old_month != date('m')) {
                $date = '1/'.date('m').'/a/'. date('Y');
            }

            return $date;
        } else {
            return '1/'.date('m').'/a/'. date('Y');
        }
    }

    public function fillInvoice(Array $params, Invoice $invoice)
    {
        if (count($params) == 13) {
            $invoice->number = $this->generateInvoiceNumber();
            $invoice->price = $params['price'];
            $invoice->payment_form = $params['payment_form'];
            $invoice->status = 0;
            $invoice->category = $params['category'];
            $invoice->NIP = $params['NIP'];
            $invoice->company = $params['company'];
            $invoice->firstName = $params['firstName'];
            $invoice->lastName = $params['lastName'];
            $invoice->town = $params['town'];
            $invoice->street = $params['street'];
            $invoice->property_number = $params['property_number'];
            $invoice->postcode = $params['postcode'];
            $invoice->status = 1;
            $invoice->product = $params['product'];
            $invoice->order = $params['order'];
            return $invoice;
        } else {
            return false;
        }
    }
  
    public function fillInvoiceADmin(Array $params, Invoice $invoice)
    {
        if (count($params) == 13) {
            $invoice->number = $this->generateInvoiceNumber();
            $invoice->price = $params['price'];
            $invoice->payment_form = $params['payment_form'];
            $invoice->status = 0;
            $invoice->category = $params['category'];
            $invoice->NIP = $params['NIP'];
            $invoice->company = $params['company'];
            $invoice->firstName = $params['firstName'];
            $invoice->lastName = $params['lastName'];
            $invoice->town = $params['town'];
            $invoice->street = $params['street'];
            $invoice->property_number = $params['property_number'];
            $invoice->postcode = $params['postcode'];
            $invoice->status = $params['status'];
            $invoice->product = $params['product'];
            return $invoice;
        } else {
            return false;
        }
    }

    public function getValue()
    {
        return $this->quantity * $this->price;
    }

    public function getDateOfIssue()
    {
        return $this->created_at->format('d.m.Y');
    }

    public function client()
    {
        return $this->belongsTo('App\Client');
    }

    public function position()
    {
        return $this->hasMany('App\InvoicePosition');
    }

    public function renderInvoice(Invoice $invoice)
    {
        $address = Address::where('user_id', Auth::user()->id)->first();
        $invoice_positions = DB::table('invoice_positions')
            ->select(DB::raw('count(*) as item_count, item, amount'))
            ->where('invoice_id', $invoice->id)
            ->groupBy('amount')
            ->get();
        return view('invoices/invoicePDF', compact('invoice', 'address', 'invoice_positions'))->render();
    }


}


