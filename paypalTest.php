<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
    
<input type="hidden" name="cmd" value="_xclick">
<input type="hidden" name="business" value="sb-fhhwn27888527@business.example.com">
<input type="hidden" name="item_name" value="hat">
<input type="hidden" name="item_number" value="123">
<input type="hidden" name="amount" value="15.00">
<input type="hidden" name="first_name" value="John"> 
<input type="hidden" name="last_name" value="Doe">
<input type="hidden" name="address1" value="9 Elm Street"> 
<input type="hidden" name="address2" value="Apt 5">
<input type="hidden" name="city" value="Berwyn"> 
<input type="hidden" name="state" value="PA">
<input type="hidden" name="state" value="19312">
<input type="hidden" name="night_phone_a" value="610">
<input type="hidden" name="night_phone_b" value="555">
<input type="hidden" name="night_phone_c" value="1234"> 
<input type="hidden" name="email" value="jdoe@zyzzyu.com"> 
<input type="image" name="submit" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif" alt="PayPal - The safer, easier way to pay online">
</form>

<button id="apple-pay-button">Apple</button>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://applepay.cdn-apple.com/jsapi/v1.1.0/apple-pay-sdk.js"></script>
<!--<script src="https://applepay.cdn.apple.com/jsapi/v1/apple-pay-sdk.js"></script>-->


<script>

  document.getElementById('apple-pay-button').addEventListener('click', function() {
        // Create Apple Pay session and handle payment logic
        initializeApplePay();
    });
  if (window.ApplePaySession) {
      if (ApplePaySession.canMakePayments) {
        alert('hi, I can do ApplePay.....')
      }
   }
    function initializeApplePay() {
       
        // Create the ApplePaySession
        var session = new ApplePaySession(1, {
            // Your Apple Pay merchant identifier
            merchantIdentifier: 'merchant.com.fitforalegend',
            displayName: 'Your Store',
            currencyCode: 'USD',
            countryCode: 'US',
            supportedNetworks: ['visa', 'masterCard', 'amex'],
            merchantCapabilities: ['supports3DS'],
            total: {
                label: 'Your Product',
                amount: '10.00'
            }
        });

        // Handle Apple Pay events and payment processing logic
        session.onvalidatemerchant = function (event) {
            // Perform server-side validation of the merchant
            validateMerchant(event.validationURL, function (merchantSession) {
                session.completeMerchantValidation(merchantSession);
            });
        };

        // Add more event handlers as needed

        // Open the Apple Pay payment sheet
        session.begin();
    }
</script>
