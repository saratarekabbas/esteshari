@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}">
@if (trim($slot) === 'Laravel')
<img src="{{asset('assets/favicon.ico')}}" class="logo" alt="Esteshari Logo">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
