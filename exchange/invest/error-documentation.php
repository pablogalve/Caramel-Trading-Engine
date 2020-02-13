<!DOCTYPE html>
<html>
<head>
<title>Error documentation</title>
</head>
<body>

<h1>Error documentation</h1>
<!–– Errors by software's fault ––>
<h2>Internal Errors</h2>
<h3>800: Unathenticated request</h3>
<p>What it means: You are creating a request without being authenticated.</p>
<p>What you can do: Log in to your account and then try again.</p>

<!–– Errors by user's fault ––>
<h2>User Errors</h2>
<h3>900: Not enough balance</h3>
<p>What it means: Your order was rejected because you don't have enough balance to cover it.</p>
<p>What you can do: Reduce the order amount.</p>

<h3>901: Order id is invalid</h3>
<p>What it means: Your request was rejected because it was dealing with an order that, according to our software, doesn't exist.</p>
<p>What you can do: If you were trying to cancel an order, it's possible it has already been filled or canceled. If you can't figure out why you got this error, please contact support.</p>

<h3>902: Order amount is too low</h3>
<p>What it means: Your order was rejected because its amount is too low. </p>
<p>What you can do: Increase the order amount to the minimum trade size or more. </p>

<h3>903: Order price is too low</h3>
<p>What it means: Your order was rejected because its price is too low.</p>
<p>What you can do: Increase the order price.</p>

<h3>904: Order amount is too high.</h3>
<p>What it means: Your order was rejected because its amount is too high. That should happen if you buy/sell by market and there's not enough liquidity to cover your entire order.</p>
<p>What you can do: Reduce the order amount.</p>

<h3>905: Too many open orders</h3>
<p>What it means: Your order was rejected because you have too many open orders.</p>
<p>What you can do: Cancel some orders, or wait for them to fill.</p>

<h3>906: Invalid arguments</h3>
<p>What it means: Your request was rejected because the request parameters were invalid.</p>
<p>What you can do: Try again and make sure the arguments are valid. If you can't figure out why you got this error, please contact support.</p>

<h3>907: Price parameter is too precise</h3>
<p>What it means: Your request was rejected because the price parameter was using more decimals than allowed.</p>
<p>What you can do: Try again using fewer decimal places.</p>

</body>
</html>