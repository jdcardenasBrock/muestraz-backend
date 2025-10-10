<form method="post" action="https://sandbox.checkout.payulatam.com/ppp-web-gateway-payu/">
  <input name="merchantId" value="{{ $merchantId }}" type="hidden">
  <input name="accountId" value="{{ $accountId }}" type="hidden">
  <input name="description" value="{{ $description }}" type="hidden">
  <input name="referenceCode" value="{{ $referenceCode }}" type="hidden">
  <input name="amount" value="{{ $amount }}" type="hidden">
  <input name="tax" value="{{ $tax }}" type="hidden">
  <input name="taxReturnBase" value="0" type="hidden">
  <input name="currency" value="COP" type="hidden">
  <input name="signature" value="{{ $signature }}" type="hidden">
  <input name="buyerEmail" value="{{ $buyerEmail }}" type="hidden">
  <input name="responseUrl" value="{{ $responseUrl }}" type="hidden">
  <input name="confirmationUrl" value="{{ $confirmationUrl }}" type="hidden">
  <button type="submit" class="btn btn-success">Pagar con PayU</button>
</form>