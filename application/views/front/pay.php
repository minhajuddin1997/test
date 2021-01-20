<div class='container'>
    <center><img src='https://myprojectstaging.com/dynisty/uploads/developer/logo2.png' width="250"></center><br>
<div id="accordion">
  <div class="card">
    <div class="card-header" id="headingOne">
          <div class='row'>
        <div class='col'>
          <h5 class="mb-0">
              <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                Pay By PayPal
              </button>
          </h5>
        </div>
      <div class='col'>
        <span>
          <img src='<?php echo base_url('/uploads/payments/paypal_image.png'); ?>' width='150' style="float:right;">
        </span>
      </div>
    </div>

    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
      <div class="card-body">
                 <script src="https://www.paypal.com/sdk/js?client-id=AQZ9tyORfue26e3F8hrqoeNoKfRZQOLwYeK7TP5rtdq82tdwGIzuBhKdRFYvJRYm1oZgfr10tKa3pzi2"></script>

                    <center><div id="paypal-button"></div></center>

      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingTwo">
      <div class='row'>
        <div class='col'>
          <h5 class="mb-0">
              <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                Pay By Card
              </button>
          </h5>
        </div>
      <div class='col'>
        <span>
          <img src='<?php echo base_url('/uploads/payments/cards_image.png'); ?>' width='150' style="float:right;">
        </span>
      </div>
    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
      <div class="card-body">
          <center><p>Amount to Pay: $<?php echo $client_amount; ?></p></center>
                  <form role="form" action="<?php echo base_url(); ?>front/register/pay/<?php echo $client_id; ?>/<?php echo $payment_no; ?>" method="post" class="require-validation" data-cc-on-file="false" data-stripe-publishable-key="pk_test_bbpGR0QxhGaiNwq94HzFyQbT" id="payment-form" >
                        <div class="form-row row required">
                              <label class="control-label">Name on Card</label> <input class="form-control"  type="text">
                        </div>
                        <div class="form-row row required">
                                <label class="control-label">Card Number</label> <input autocomplete="off" class="form-control card-number" size="20" type="text">
                          
                        </div>
                        <div class="form-row row">
                            <div class="col-xs-12 col-md-4 form-group cvc required">
                                <label class="control-label">CVC</label> <input autocomplete="off" class="form-control card-cvc" placeholder="ex. 311" size="4" type="text">
                            </div>
                            <div class="col-xs-12 col-md-4 form-group expiration required">
                                <label class="control-label">Expiration Month</label> <input class="form-control card-expiry-month" placeholder="MM" size="2" type="text">
                            </div>
                            <div class="col-xs-12 col-md-4 form-group expiration required">
                                <label class="control-label">Expiration Year</label> <input class="form-control card-expiry-year" placeholder="YYYY" size="4" type="text">
                            </div>
                        </div>
  
                        <div class="form-row row">
                            <div class="col-md-12 error form-group ">
                                <div class="alert-danger alert">Please correct the errors and try
                                    again.</div>
                            </div>
                        </div>
                        <input type='hidden' name='client_amount' value='<?php echo $client_amount; ?>'>
                        <input type='hidden' name='client_email' value='<?php echo $email->client_email; ?>'>
                        <input type='hidden' name='client_id' value='<?php echo $client_id; ?>'>
                        <div class="row">
                            <div class="col-xs-12">
                                <button class="btn btn-info btn-lg btn-block" type="submit">Pay Now (<?php echo $client_amount; ?>)</button>
                            </div>
                        </div>
                      </form>
      
      </div>
    </div>
  </div>

</div>
</div>
</div>
</div>