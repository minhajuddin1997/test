
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
<!-- jQuery -->
<script src="<?php echo base_url(); ?>assets/front/assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url(); ?>assets/front/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>assets/front/assets/dist/js/adminlte.min.js"></script>
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script src="https://www.paypalobjects.com/api/checkout.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>

<script>
  
$("#nextBtn").on('click', function(event){
    event.preventDefault();
    var text = $('#projectBrief option:selected').toArray().map(item => item.text).join();
    
    if(text.includes("SEO/SMM Brief")){
        $("#seo_packages").css('display','block');
    } else {
        $("#seo_packages").css('display','none');
    }
    $("#finish").css('display','block');
     $.ajax({
      url: "<?php echo base_url('front/register/get_creative_packages'); ?>/<?php echo !empty($records) ? $records : ''; ?>",
      type: "GET",
      dataType: 'JSON',
      success: function(res){
            var text = $('#projectBrief option:selected').toArray().map(item => item.text).join();
            if(text.includes("Creative Brief") && res.length > 0){
                $("#creative_packages").css('display','block');
            } else {
                $("#creative_packages").css('display','none');
            }
            $("#no_packages").css('display','none');
      }
    });
     $.ajax({
      url: "<?php echo base_url('front/register/get_website_packages'); ?>/<?php echo !empty($records) ? $records : ''; ?>",
      type: "GET",
      dataType: 'JSON',
      success: function(res){
        var text = $('#projectBrief option:selected').toArray().map(item => item.text).join();
        if(text.includes("Website Brief") && res.length > 0){
             $("#web_packages").css('display','block');
        } else {
            $("#web_packages").css('display','none');
        }
        $("#no_packages").css('display','none');
      }
    });
    $.ajax({
      url: "<?php echo base_url('front/register/get_logo_packages'); ?>/<?php echo !empty($records) ? $records : ''; ?>",
      type: "GET",
      dataType: 'JSON',
      success: function(res){
            var text = $('#projectBrief option:selected').toArray().map(item => item.text).join();
            if(text.includes("Logo Brief") && res.length > 0){
              $("#logo_packages").css('display','block');
            } else {
              $("#logo_packages").css('display','none');
            }
            $("#no_packages").css('display','none');
      }
    });
});

  
$(document).ready(function(){

     $("#upload_file").on("click",function(){
      var imgpath = "<?php echo $this->uri->segment(2);?>"
      var form = $('#logo_brief_form')[0]; // You need to use standard javascript object here
      var formData = new FormData(form);
      var file = $("#upload_brief_file")[0].files;

      formData.append("file", file);
      formData.append("imagePath", imgpath);
        $.ajax({
          url:"<?php echo base_url("front/register/intake_upload");?>",
          method:"post",
          dataType:"json",
          cache: false,
          contentType: false,
          processData: false,
          data: formData,
          success: function(res){
            console.log(res);

            if(res != 2){
              //imagePrepend(formData);
              toastr.success('Image Uploaded');
            }else if(res == 2){
              toastr.error('Something Went Wrong.')
            }
          }
        });
    });

var current_fs, next_fs, previous_fs; //fieldsets
var opacity;
var count = 0;
$('.col').on('click',function(){

  $(this).toggleClass('panelBorderColor');
  
});

});

$("#msform").on('submit', function(event){
  event.preventDefault();
  $("#finish").css('display','block');
  $.ajax({
    url: "<?php echo base_url(); ?>front/register/intake",
    type: "POST",
    data: $(this).serialize(),
    dataType: 'JSON',
    success: function(html){
      console.log(html);
    }
  });
});
$("#creative_brief_form").on('submit', function(event){
  event.preventDefault();
  var form = $('#creative_brief_form')[0]; // You need to use standard javascript object here
  var formData = new FormData(form);
  $("#finish").css('display','block');
  $.ajax({
    url: "<?php echo base_url('front/register/creative_brief_submit'); ?>",
    type: "POST",
    cache: false,
    contentType: false,
    processData: false,
    data: formData,
    dataType: 'JSON',
    success: function(res){
        console.log(res);
      if(res == 1){
          toastr.success('Creative Brief Submitted');
          $('#exampleModalCenter3').modal('hide');
      } else{
          toastr.error('Error in Submitting Brief Form');
      }
    }
  });
});
$("#logo_brief_form").on('submit', function(event){
  event.preventDefault();
  var form = $('#logo_brief_form')[0]; // You need to use standard javascript object here
  var formData = new FormData(form);

  $("#finish").css('display','block');
  $.ajax({
    url: "<?php echo base_url('front/register/logo_brief_submit'); ?>",
    type: "POST",
    cache: false,
    contentType: false,
    processData: false,
    data: formData,
    dataType: 'JSON',
    success: function(res){
      if(res == 1){
          toastr.success('Logo Brief Submitted');
          $('#exampleModalCenter').modal('hide');
      } else{
          toastr.error('Error in Submitting Brief Form');
      }
    }
  });
});
$("#website_brief_form").on('submit', function(event){
  event.preventDefault();
  var form = $('#website_brief_form')[0]; // You need to use standard javascript object here
  var formData = new FormData(form);
  $("#finish").css('display','block');
  $.ajax({
    url: "<?php echo base_url('front/register/website_brief_submit'); ?>",
    type: "POST",
    cache: false,
    contentType: false,
    processData: false,
    data: formData,
    dataType: 'JSON',
    success: function(res){
       if(res == 1){
           toastr.success('Website Brief Submitted');
           $('#exampleModalCenter2').modal('hide');
       } else{
          toastr.error('Error in Submitting Brief Form');
      }
    }
  });
});
</script>
<script src="<?php echo base_url(); ?>assets/front/assets/js/custom.js?v=<?php echo rand(); ?>"></script>


<script>
 $('#projectBrief').selectpicker();

 $(document).ready(function () {
  var $form = $(".require-validation");
  $errorMessage = $form.find('div.error'),
  $errorMessage.css('visibility','hidden');
  $('form.require-validation').bind('submit', function (e) {
    var $form = $(".require-validation"),
      inputSelector = ['input[type=email]', 'input[type=password]',
        'input[type=text]', 'input[type=file]',
        'textarea'
      ].join(', '),
      $inputs = $form.find('.required').find(inputSelector),
      $errorMessage = $form.find('div.error'),
      valid = true;
    $errorMessage.css('visibility','hidden');

    $('.has-error').removeClass('has-error');
    $inputs.each(function (i, el) {
      var $input = $(el);
      if ($input.val() === '') {
        $input.parent().addClass('has-error');
        $errorMessage.css('visibility','visible');
        e.preventDefault();
      }
    });

    if (!$form.data('cc-on-file')) {
      e.preventDefault();
      Stripe.setPublishableKey($form.data('stripe-publishable-key'));
      Stripe.createToken({
        number: $('.card-number').val(),
        cvc: $('.card-cvc').val(),
        exp_month: $('.card-expiry-month').val(),
        exp_year: $('.card-expiry-year').val()
      }, stripeResponseHandler);
    }

  });

  function stripeResponseHandler(status, response) {
    if (response.error) {
      $('.error')
        .removeClass('hide')
        .find('.alert')
        .text(response.error.message);
    } else {
      var token = response['id'];
      $form.find('input[type=text]').empty();
      $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
      $form.get(0).submit();
    }
  }


  paypal.Button.render({
    // Configure environment
    env: 'development',
    client: {
      development: 'AQZ9tyORfue26e3F8hrqoeNoKfRZQOLwYeK7TP5rtdq82tdwGIzuBhKdRFYvJRYm1oZgfr10tKa3pzi2'
    },
    // Customize button (optional)
    locale: 'en_US',
    style: {
      size: 'large',
      color: 'gold',
      shape: 'pill',
    },

    // Enable Pay Now checkout flow (optional)
    commit: true,

    // Set up a payment
    // Set up a payment
    payment: function (data, actions) {
      return actions.payment.create({
        transactions: [{
          amount: {
            total: '999',
            currency: 'USD',
            details: {
              subtotal: '999',
              tax: '0.00',
              shipping: '0.00',
              handling_fee: '0.00',
              shipping_discount: '0.00',
              insurance: '0.00'
            }
          },
          description: 'The payment transaction description.',
          item_list: {
            items: [{
              name: 'Credit Class',
              quantity: '1',
              price: '999',
              tax: '0.00',
              sku: '1',
              currency: 'USD'
            }, ]
          }
        }],
        note_to_payer: 'Contact us for any questions on your order.'
      });
    },
    // Execute the payment
    onAuthorize: function (data, actions) {
      return actions.payment.execute().then(function () {
        // Show a confirmation message to the buyer
        $.ajax({
          type: "post",
          url: ``,
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          success: function (data) {
            if (data == 1) {
              js_success('Payment has been made.');
            }
          }
        });
      });
    }
  }, '#paypal-button');
});
</script>
</body>
</html>