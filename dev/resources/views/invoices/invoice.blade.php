<html>

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <style>
    body {
      font-size: 14px;
      font-family: DejaVu Sans;
    }
    th, td{
      padding: 5px!important;
    }
    .wrap-button-lg {
      max-width: 800px;
      width: 750px;
      position: relative;
      margin: auto;
    }

    .container {
      max-width: 800px;
      width: 750px;
      height: 800px;
      position: relative;
      margin: auto;
      margin-top: 20px;
      top: 30px;
    }

    section {
      width: 100%;
      display: block;
      position: relative;
    }

    span {
      line-height: 22px;
      display: block;
    }

    .col-1 {
      width: 30%;
      position: absolute;
      left: 0;
    }

    .col-2 {
      width: 33%;
      position: absolute;
      left: 33%;
    }

    .col-3 {
      position: absolute;
      width: 33%;
      left: 66%;
      display: inline-block;
    }

    .right-data {
      width: 48%;
      display: inline-block;
      position: absolute;
      left: 50%;
    }

    .left-data {
      position: absolute;
      width: 48%;
      display: inline-block;
      text-align: left;
    }

    .left {
      position: absolute;
      width: 49%;
      display: inline-block;
      text-align: left;
    }

    .right {
      width: 49%;
      display: inline-block;
      position: absolute;
      left: 50%;
    }

    .title {
      font-size: 30px;
      padding-bottom: 10px;
      font-weight: 800;
    }

    .underline {
      font-size: 20px;
      padding-bottom: 0px;
      border-bottom: 2px solid #000;
      font-weight: 800;
      width: 100%;
      text-align: left;
    }

    .underline-title {
      font-size: 20px;
      padding-bottom: 0px;
      text-align: center;
      display: block;
      line-height: 5px;
    }

    .underline-dotted {
      font-size: 20px;
      border-bottom: 2px dotted #000;
      font-weight: 800;
      line-height: 0px;
      margin: 0px;
      display: block;
      margin: auto;
      text-align: center;
      width: 70%;

    }

    .underline-name {
      font-size: 20px;
      line-height: 1px;
      margin: auto;
      text-align: center;
      height: 10px;
      border-bottom: 2px dotted #000;
      width: 70%;

    }

    .align-right {
      text-align: right;
    }

    .table {
      width: 100%;
    }

    table {
      border-collapse: collapse;
    }

    table,
    th,
    td {
      border: 1px solid black;
    }

    th,
    td {
      padding: 10px;
    }

    th {
      font-weight: 700;
    }

    .strong {
      font-weight: 700;
    }

    .info {
      position: absolute;
      top: 48%;
    }

    .client {
      position: absolute;
      top: 83%;
    }

    .evidence {
      position: absolute;
      top: 80%;
    }

    .data {
      position: absolute;
      top: 10%;
    }

    .footer {
      border-top: 2px solid #555555;
      color: #555555;
      font-size: 12px;
      text-align: right;
      position: absolute;
      bottom: 1%;
      width: 100%;
    }

    .px16 {
      font-size: 16px;
    }

    .button-blue-fill {
      background-color: #44B5FF;
    }

    .button-blue {
      color: #fff;
    }

    .button-lg {
      font-size: 16px;
      font-weight: 600;
      line-height: 45px;
      height: 50px;
      padding: 0 30px;
    }

    .button {
      border-radius: 25px;
      line-height: 38px;
      height: 42px;
      border: 2px solid transparent;
      font-size: 12px;
      font-weight: 700;
      background: #44B5FF;
      background-color: rgb(68, 181, 255);
      padding: 0 34px;
      -webkit-transition: all 300ms linear;
      transition: all 300ms linear;
      padding: 13px 20px;
      text-decoration: none;
    }

  </style>
</head>

<body>
  <div class="container">
    <div class="wrapper">
      <section>

        <div class="right align-right">
          <span class="title">FAKTURA</span>
          <span>NUMER: <strong>{{$invoice->number}}</strong></span>
          @if($invoice->order)
          <span>ZAMÓWIENIE: <strong>{{$invoice->order}}</strong></span>
          @endif
          <span>DATA WYSTAWIENIA: <strong>{{$invoice->getDateOfIssue()}}</strong></span>
        </div>
      </section>
      <section class="data">
        <div class="left-data">
        <h5 class="underline">Sprzedawca</h5>
        <span><strong>Nazwa firmy</strong></span>
        <span>adres</span>
        <span>kod pocztowy - poczta</span>
        <span>NIP</span>
        <br>
        <span>Numer konta</span>
        <span>Bank</span>
        </div>
        <div class="right-data">
          <h5 class="underline">Nabywca</h5>
          @if($invoice->category == "1")
            <span><strong>{{$invoice->name}}</strong></span>
          @else
            <span><strong>{{$invoice->firstName}} {{$invoice->lastName}}</strong></span>
          @endif
          <span>{{$invoice->street}} {{$invoice->property_number}}, {{$invoice->town}}</span>
          <span>{{$invoice->postcode }} {{$invoice->town}}</span>

          @if($invoice->category == "1")
            <span>NIP: {{$invoice->NIP}}</span>
          @endif

        </div>
      </section>
      <section class="info">
        <table class="table">
          <tr class="strong">
            <td>Nazwa towaru/usługi</td>
            <td>J.m</td>
            <td>Ilość</td>
            <td>Cena jednostkowa</td>
            <td>Wartość</td>
          </tr>
          @foreach($invoice_positions as $key => $position)
          <tr>
            <td>{{$position->item}}</td>
            <td>szt.</td>
            <td>{{$position->product_count}}</td>
            <td>{{$position->price}} zł</td>
            <td>{{$position->product_count * $position->price}} zł</td>
          </tr>
          @endforeach
        </table>
      </section>

      <section class="client">
        <div class="align-right">
          <span class="px16">Do zapłaty</span>
          <span class="title">{{$total_price}} zł</span>
          @if($invoice->payment_form == 'przelew')
            @if($invoice->status == 1)
            <span>FORMA PŁATNOŚCI: <strong>{{$invoice->payment_form}}</strong></span> 
            <span>TERMIN PŁATNOŚCI: <strong>Zapłacono</strong></span> 
            @else
            <span>FORMA PŁATNOŚCI: <strong>{{$invoice->payment_form}}</strong></span> 
            <span>TERMIN PŁATNOŚCI: <strong>3 dni</strong></span> 
            @endif
          @endif
          @if($invoice->payment_form == 'dotpay')
          <span>FORMA PŁATNOŚCI: <strong>przelew</strong></span> 
          <span>TERMIN PŁATNOŚCI: <strong>Zapłacono</strong></span> 
          @endif
          @if($invoice->payment_form == 'gotówka')
          <span>FORMA PŁATNOŚCI: <strong>{{$invoice->payment_form}}</strong></span> 
          <span>TERMIN PŁATNOŚCI: <strong>Zapłacono</strong></span> 
          @endif
        </div>
      </section>
      <section class="footer">
        <div>
          TEL: 123 123 123 | E-mail: biuro@eFaktura.pl
        </div>
      </section>
    </div>
  </div>
</body>

</html>
