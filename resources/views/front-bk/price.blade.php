<?php $SubTotal = Cart::subtotal(); ?>
@if (session()->has('rates'))

<?php
$rates = Session::get('rates');
$Rates = DB::table('rates')->where('rates', $rates)->get();
?>

@foreach ($Rates as $rt)
{{$rt->symbol}}<?php $total = $SubTotal * $rt->rates; echo ceil($total) ?>
@endforeach

@else
ksh {{$SubTotal}}
@endif
