{{ __('Your withdrawal for') }} {{ number_format($withdraw_amount, $currency->precision, '.', '') }}{{ $currency->symbol }} {{ __('have been approved') }}.

<?php
//$data = [
//    'withdraw_amount' => $withdrawalRequest->amount,
//    'currency'        => $withdrawalRequest->wallet->currency,
//    'payment_system'  => $withdrawalRequest->wallet->paymentSystem
//];
?>