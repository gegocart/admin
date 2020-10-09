<!DOCTYPE html>
<html>
<head>
    <title>Invoice</title>
</head>
<body>
  <table width="100%" style="border:1px solid #e4e4e4">
    <tr>
      <th style="text-align: left;">
        <img src="/images/gegocart-logo.png" class="h-16" style="max-width:400px;height:50px">
      </th>
      <th style="text-align:right;">
        <p style="font-size:10px;">
              <span style="font-weight: 700">Tax Invoice/Bill of Supply/Cash Memo</span> 
              <br/>(Orginial for Recipient)
            </p>
      </th>
   </tr>
    <tr>
      <td style="text-align: left;">
        <p style="font-size:10px;">Sold By:{{$sellername}}</p>
      </td>
      <td style="text-align:right;">
          <span style="font-size:10px; font-weight:700;">Billing Address :<br></span>
          <span style="font-size:10px;">{{$billfirstname}} {{$billlastname}}<br></span>
          <span style="font-size:10px;">{{$billaddress}}</span>
          <span style="font-size:10px;">{{$billcity}}<br></span>
          <span style="font-size:10px;">{{$billstate}}<br></span>
          <span style="font-size:10px;">{{$billcountry}}<br></span>
      </td>
   </tr>
   <tr>
    <td></td>
      <td style="text-align:right;">
          <span style="font-size:10px; font-weight:700;">Shipping Address:<br></span>
          <span style="font-size:10px;">{{$shippingfirstname}} {{$shippinglastname}}<br></span>
          <span style="font-size:10px;">{{$shippingaddress}}</span>
          <span style="font-size:10px;">{{$shippingcity}}<br></span>
          <span style="font-size:10px;">{{$shippingstate}}<br></span>
          <span style="font-size:10px;">{{$shippingcountry}}<br></span>
      </td>
   </tr>
   <tr>
      <td> 
          <span style="font-size:10px;"><span style="font-weight: 700">Order No.</span> : {{$orderno}}<br></span>
          <span style="font-size:10px;"><span style="font-weight: 700">Order Date :</span> {{$orderdate}}<br></span>
      </td>
       <td style="text-align:right;">
          <span style="font-size:10px;">
             <span style="font-weight: 700">Invoice No.</span> : {{$invoiceno}}</span><br>
        <span style="font-size:10px;" >
            <span style="font-weight: 700"> Invoice Date: </span> {{$invoicedate}}</span>
      </td>
   </tr>   
  </table><br>
  <table border width="100%" style="border:1px solid #e4e4e4">
   <tr style="background-color:#e4e4e4">
    <th style="text-align:left"><span style="font-size:10px;font-weight:700;">Payment Method</span></th>
    <th style="text-align:right"><span style="font-size:10px;font-weight:700;text-align: right;">Amount {{$currency}}</span></th>
   </tr>
   <tr>
    <td style="text-align:left"><span style="font-size:10px;">{{$paymentmethod}}</span></td>
    <td style="text-align:right"><span style="font-size:10px;text-align: right;">
      <small>{{$orderitems[0]->currency->currency()}}</small>  {{$orderitems[0]->grandtotal}}</span></td>
   </tr>
 </table><br>
 <table border width="100%" style="border:1px solid #e4e4e4">
   <thead>
    <tr style="background-color:#e4e4e4">
    <th style="text-align:right"><span style="font-size:8px;font-weight:700;">Description</span></th>
    <th style="text-align:right"><span style="font-size:8px;font-weight:700;">Price ({{$currency}})</span></th>
    <th style="text-align:right"><span style="font-size:8px;font-weight:700;">Qty</span></th>
    <th style="text-align:right"><span style="font-size:8px;font-weight:700;">Net Amount ({{$currency}})</span></th>
    <th style="text-align:right"><span style="font-size:8px;font-weight:700;">Shipping ({{$currency}})</span></th>
    <th style="text-align:right"><span style="font-size:8px;font-weight:700;">Tax Rate & Type</span></th>
    <th style="text-align:right"><span style="font-size:8px;font-weight:700;">Tax Amount ({{$currency}})</span></th>
    <th style="text-align:right"><span style="font-size:8px;font-weight:700;">Total Amount ({{$currency}})</span></th>
  </tr>
   </thead><br>
   <tbody>    
     @for ($i = 0; $i < $orderitems; $i++)
   <tr>
    <td style="text-align:right"><span style="font-size:8px;">{{$orderitems[$i]->productdetail['product']['name']}}</span></td>
    <td style="text-align:right"><span style="font-size:8px;">{{($orderitems[$i]->productdetail['variation']['price']/100)}}</td>
      <td style="text-align:right"><span style="font-size:8px;">{{$orderitems[$i]->productdetail['variation']['quantity']}}</span></td>
    <td style="text-align:right"><span style="font-size:8px;">{{$orderitems[$i]->subtotal}}</td>
      <td style="text-align:right"><span style="font-size:8px;">{{$orderitems[$i]->shippingprice}}</span></td>
    <td style="text-align:right"><span style="font-size:8px;"> {{$orderitems[$i]->productdetail['product']['tax_type']['tax_rate']}}% GST</td>
      <td style="text-align:right"><span style="font-size:8px;">{{$orderitems[$i]->shippingtaxprice + $orderitems[$i]->itemtax}}</span></td>
    <td style="text-align:right"><span style="font-size:8px;">{{$orderitems[$i]->grandtotal}}</span></td>
   </tr>
    @endfor
 </tbody>
 </table>
<!--<div>
  <div style="width:100%;display:block;" class="invoice p-3 mb-3">
      <div style="display:inline-flex;margin-bottom:.75rem">
            <div style="width:10%;">
                <img src="/images/gegocart-logo.png" class="h-16" style="max-width:80px;height:27px">
            </div>
            <div style="width:22%;text-align: right">
                 <p style="font-size:10px;"><span style="font-weight: 700">Tax Invoice/Bill of Supply/Cash Memo</span> <br/>(Orginial for Recipient)</p>
            </div>
        </div>
        <div style="width:32%;display:flex;justify-content:space-between;;margin-bottom:.75rem">
        <div>
                <p style="font-size:10px;">Sold By:{{$sellername}}</p>
        </div>
        <div style="text-align: right;">
              <p style="font-size:10px;">Billing Address:<br></p>
               <p style="font-size:10px;">{{$billfirstname}} {{$billlastname}}<br></p>
               <p style="font-size:10px;">{{$billaddress}}</p>
               <p style="font-size:10px;">{{$billcity}}<br></p>
               <p style="font-size:10px;">{{$billstate}}<br></p>
               <p style="font-size:10px;">{{$billcountry}}<br></p>
        </div>
        </div>
         <div style="width:32%;display:flex;justify-content:flex-end;margin-bottom:.75rem">
        <div style="text-align: right;">
             <p style="font-size:10px;">Shipping Address:<br></p>
               <p style="font-size:10px;">{{$shippingfirstname}} {{$shippinglastname}}<br></p>
               <p style="font-size:10px;">{{$shippingaddress}}</p>
               <p style="font-size:10px;">{{$shippingcity}}<br></p>
               <p style="font-size:10px;">{{$shippingstate}}<br></p>
               <p style="font-size:10px;">{{$shippingcountry}}<br></p>
        </div>
        </div>
        <div style="width:32%;display:flex;justify-content:space-between;margin-bottom:.75rem">
            <div>
                    <p style="font-size:10px;">Order No.: {{$orderno}}<br></p>
                    <p style="font-size:10px;">Order Date: {{$orderdate}}<br></p>
                     
                 </p>
            </div>
            <div>
                 <p style="font-size:10px;text-align: right;" >
                 Invoice No.: {{$invoiceno}}</p>
                <p style="font-size:10px;text-align: right;" >
                 Invoice Date: {{$invoicedate}}</p>
            </div>
        </div>
        <div style="width:32%;display:flex;justify-content:space-between;background-color:#eeeeee;padding:10px;">
            <div>
                    <p style="font-size:10px;font-weight:700;">Payment Method</p>
            </div>
            <div>
                 <p style="font-size:10px;font-weight:700;text-align: right;">Amount {{$currency}}</p>
            </div>
        </div>
         <div style="width:32%;display:flex;justify-content:space-between;padding:5px;margin-bottom:.75rem">
            <div>
                    <p style="font-size:10px;">{{$paymentmethod}}</p>
            </div>
            <div>
                 <p style="font-size:10px;text-align: right;">
                  <small>{{$orderitems[0]->currency->currency()}}</small>  {{$orderitems[0]->grandtotal}}</p>
            </div>
            

        </div>
         <div style="width:32%;display:flex;justify-content:space-between;background-color:#eeeeee;padding:10px;">-->
          <!-- <div style="width:4%;">
                    <p style="font-size:10px;font-weight:700;">S.No</p>
            </div> -->
            <!--<div style="width:15%;">
                    <p style="font-size:6px;font-weight:700;">Description</p>
            </div>
            <div style="width:8%;">
                 <p style="font-size:6px;font-weight:700;text-align: right;">Price ({{$currency}})</p>
            </div>
             <div style="width:8%;">
                    <p style="font-size:6px;font-weight:700;text-align: right;">Qty</p>
            </div>
            <div style="width:8%;">
                 <p style="font-size:6px;font-weight:700;text-align: right;">Net Amount ({{$currency}})</p>
            </div>
             <div style="width:8%;">
                 <p style="font-size:6px;font-weight:700;text-align: right;">Shipping ({{$currency}})</p>
            </div>
             <div style="width:8%;">
                 <p style="font-size:6px;font-weight:700;text-align: right;">Tax Rate & Type</p>
            </div>
             <div style="width:8%;">
                 <p style="font-size:6px;font-weight:700;text-align: right;">Tax Amount ({{$currency}})</p>
            </div>
            <div style="width:8%;">
                 <p style="font-size:6px;font-weight:700;text-align: right;">Total Amount ({{$currency}})</p>
            </div>
        </div>
    <div style="width:32%;display:flex;justify-content:space-between;padding:5px;margin-bottom:.5rem"> 
       @for ($i = 0; $i < $orderitems; $i++)
           <div style="width:15%;">
                <p style="font-size:7px;">{{$orderitems[$i]->productdetail['product']['name']}}</p>
            </div>
            <div style="width:8%;">
                 <p style="font-size:7px;text-align: right;">
                  {{($orderitems[$i]->productdetail['variation']['price']/100)}}
                </div>
            <div style="width:8%;">
                    <p style="font-size:7px;text-align: right;">
                    {{$orderitems[$i]->productdetail['variation']['quantity']}}</p>
            </div> 
            <div style="width:8%;">
                 <p style="font-size:7px;text-align: right;">{{$orderitems[$i]->subtotal}}</p>
            </div>
            <div style="width:8%;">
                 <p style="font-size:7px;text-align: right;">
                 {{$orderitems[$i]->shippingprice}}</p>
            </div>
            <div style="width:8%;">
                 <p style="font-size:7px;text-align: right;">
                 {{$orderitems[$i]->productdetail['product']['tax_type']['tax_rate']}}% GST</p>
            </div>
            <div style="width:8%;">
                 <p style="font-size:7px;text-align: right;">
                  {{$orderitems[$i]->shippingtaxprice + $orderitems[$i]->itemtax}}
                 </p>
            </div>
            <div style="width:8%;">
                 <p style="font-size:7px;text-align: right;">{{$orderitems[$i]->grandtotal}}</p>
            </div>
           @endfor
             
       </div>
  </div>
     
</div>
-->

</body>
</html>
