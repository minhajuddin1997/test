  <div class="content-wrapper" >
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Payment</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Payment</li>
            </ol>
          </div>
        </div>
        <hr>
      </div><!-- /.container-fluid -->
    </section>
<section class='content'>
<div class='container'>
<h4 id='tab_head2'  style="background: #333">1. Packages</h4>

    <div id='packages' class='pack'>
      <div class="row" id='row_1'>
        <?php $i=0; foreach($packages as $row => $key): ++$i; ?>
          <label class='col'  id='pack_<?php echo $i; ?>' style='max-width: 350px;'>
            <input type="checkbox"  onChange="myFunctions(pack_<?php echo $i; ?>, this)" class='dd' id='pack_single' name='web_package[]' value="<?php echo $key->package_price; ?>">
            <h3><center><?php echo $key->package_name; ?></center></h3>
            <h1><center>$<?php echo $key->package_price; ?></center></h1> </label>
          <?php endforeach; ?>
      </div>
    </div>
<br>
<h4 id='tab_head2' style="background: #333">2. Payment</h4>
<div id="accordion" id='payment'>
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
                  <form role="form" action="<?php echo base_url(); ?>client/projects/pay/<?php echo $id; ?>" method="post" class="require-validation" data-cc-on-file="false" data-stripe-publishable-key="pk_test_bbpGR0QxhGaiNwq94HzFyQbT" id="payment-form" >
                         <div class="form-row row required">
                            <?php 
                                $sum = 0;
                                foreach($features as $row):
                                    $sum += $row->project_additional_feature_price; 
                                endforeach; 
                            ?>
                              <label class="control-label">Amount</label> <input class="form-control" value="<?php echo $sum; ?>" id="amount" name="amount" type="text" disabled>
                        </div>
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
                            <div class="col-md-12 error form-group hide">
                                <div class="alert-danger alert">Please correct the errors and try
                                    again.</div>
                            </div>
                        </div>
                        <input type='hidden' name='package_price' id='package' >
                       <!--  <input type='hidden' name='client_amount' value='<?php echo $client_amount; ?>'>
                        <input type='hidden' name='client_email' value='<?php echo $email->client_email; ?>'>
                        <input type='hidden' name='client_id' value='<?php echo $client_id; ?>'> -->
                        <div class="row">
                            <div class="col-xs-12">
                                <button class="btn btn-primary btn-lg btn-block" type="submit">Pay Now</button>
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
  </section>
</div>

<script>
$('input[class="dd"]').change(function(){
    var totalprice = 0;
    $('input[class="dd"]:checked').each(function(){
        totalprice= totalprice + parseInt($(this).val());
    });
    $('#amount').val(totalprice);
});
</script>
