<?php

require_once 'vendor/braintree/braintree_php/lib/Braintree.php';


Braintree_Configuration::environment('sandbox');
Braintree_Configuration::merchantId('xxx');
Braintree_Configuration::publicKey('xxxx');
Braintree_Configuration::privateKey('xxxx');


$brainTree_token = Braintree_ClientToken::generate();


?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<form id="checkout">
    <input data-braintree-name="number" value="4111111111111111">
    <input data-braintree-name="expiration_date" value="10/20">
    <input type="submit" id="submit" value="Pay">

    <div id="paypal-button"></div>
</form>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://js.braintreegateway.com/v1/braintree.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        braintree.setup("<?php echo $brainTree_token ?>", "custom", {
            id: "checkout",
            paypal: {
                container: "paypal-button"
            }
        });
    });
</script>
</body>
</html>