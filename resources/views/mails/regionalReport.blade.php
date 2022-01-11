@component('mail::message')
<p>
<strong>
Following are the EOD for your vaccine sites
</strong>
</p>

<table style="width:100%; border-collapse: collapse;
margin: 25px 0;
font-size: 0.9em;
font-family: sans-serif;
min-width: 400px;
box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);" class="styled-table">
<thead>
    <tr style=" background-color: #009879;
color: #ffffff;
text-align: left;">
<th>Vaccine site name</th>
<th>Last Upload</th>
<th>Current Stock</th>
</tr>
</thead>
<tbody>

@foreach($vacs as $vac)
<tr>
<td>{{ $vac['name'] }}  </td>
<td>{{ $vac['lastUpload'] ? $vac['lastUpload']['entryDate'] : "no upload yet"  }}</td>
<td>{{ $vac['lastUpload'] ? $vac['lastUpload']['endDayStock'] : "no upload yet"  }}</td>
</tr>
@endforeach
</tbody>
</table>


Regards<br>
{{ config('app.name') }}
@endcomponent
