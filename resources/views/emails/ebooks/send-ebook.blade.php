@component('mail::message')
# Ebook Sale

Hello <i><strong>{{$ebookSale->name}}</strong></i>,

Thank you for purchasing our ebook. Your transaction details is as follows;
## Purchase Details
<table class="table" style="font-family: arial, sans-serif;
border-collapse: collapse;
width: 100%;">
<tbody>
<tr style="background-color: #dddddd;">
<td style="border: 1px solid #dddddd;
text-align: left;
padding: 8px;" ><strong>Transaction Ref </strong></td>
<td style="border: 1px solid #dddddd;
text-align: left;
padding: 8px;">{{$ebookSale->ref}}</td>
</tr>
<tr>
<td style="border: 1px solid #dddddd;
text-align: left;
padding: 8px;"><strong>Title</strong></td>
<td style="border: 1px solid #dddddd;
text-align: left;
padding: 8px;">{{$title}}</td>
</tr>
<tr style="background-color: #dddddd;">
<td style="border: 1px solid #dddddd;
text-align: left;
padding: 8px;"><strong>Amount</strong></td>
<td style="border: 1px solid #dddddd;
text-align: left;
padding: 8px;">&#8358;{{number_format($ebookSale->price)}}</td>
</tr>

<tr>
    <td style="border: 1px solid #dddddd;
text-align: left;
padding: 8px;"><strong>Status</strong></td>
    <td style="border: 1px solid #dddddd;
text-align: left;
padding: 8px;">Successful</td>
</tr>

<tr style="background-color: #dddddd;">
<td style="border: 1px solid #dddddd;
text-align: left;
padding: 8px;"><strong>Date</strong></td>
<td style="border: 1px solid #dddddd;
text-align: left;
padding: 8px;">{{$ebookSale->updated_at}}</td>
</tr>
</tbody>
</table>

<p style="padding-top: 1rem;">Kindly find the email attachment for your purchased ebook.</p>

@component('mail::button', ['url' => route("ebooks")])
Buy more Ebooks
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
