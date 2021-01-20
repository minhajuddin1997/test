var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab
$("#seo_brief").hide();
$("#website_brief").hide();
$("#logo_brief").hide();
$("#creative_brief").hide();
function showTab(n) {
    // This function will display the specified tab of the form ...
    var x = document.getElementsByClassName("tab");
    var text = $('#projectBrief option:selected').toArray().map(item => item.text).join();
    $('.dd').click(function () {
      $('.dd').toggleClass('activeCol')
    });

    if (text.includes("SEO")) {
      $("#seo_brief").show();
    }
    if (text.includes("Website Brief")) {
      $("#website_brief").show();
    }
    if (text.includes("Logo Brief")) {
      $("#logo_brief").show();
    }
    if (text.includes("Creative Brief")) {
      $("#creative_brief").show();
    }

    if (text.includes("All")) {
      $("#creative_brief").show();
      $("#seo_brief").show();
      $("#logo_brief").show();
      $("#website_brief").show();
    }
    x[n].style.display = "block";
    // ... and fix the Previous/Next buttons:
 
    if (n == 0) {
      document.getElementById("prevBtn").style.display = "none";
    } else {
      document.getElementById("prevBtn").style.display = "inline";
    }
    if (n == (x.length - 1)) {
      document.getElementById("nextBtn").innerHTML = "Submit";
    } else {
      document.getElementById("nextBtn").innerHTML = "Next";
    }
    // ... and run a function that displays the correct step indicator:
    fixStepIndicator(n)
  
}

function nextPrev(n) {
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("tab");
  console.log(n);
  var text = $('#projectBrief option:selected').toArray().map(item => item.text).join();

  if (text.includes("SEO")) {
    $("#seo_brief").show();
  } else {
    $("#seo_brief").hide();
  }

  if (text.includes("Website Brief")) {
    $("#website_brief").show();
  } else {
    $("#website_brief").hide();

  }
  if (text.includes("Logo Brief")) {
    $("#logo_brief").show();
  } else {
    $("#logo_brief").hide();

  }
  if (text.includes("Creative Brief")) {
    $("#creative_brief").show();
  }

  // Exit the function if any field in the current tab is invalid:
  if (n == 1 && !validateForm()) return false;
  // Hide the current tab:
  x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  // if you have reached the end of the form... :
  if (currentTab >= x.length) {
    //...the form gets submitted:
    let dd = document.getElementById("regForm").submit();
    return false;
  }
  // Otherwise, display the correct tab:
  showTab(currentTab);
}

function validateForm() {
  var x, y, i, valid = true;
  x = document.getElementsByClassName("tab");
  var pass = $("#pass1").val();
  var pass1 =$("#confirm_pass").val();
  if(pass != pass1){
    toastr.error('Password do not match.');
    return;
  }
  if (currentTab == 2) {
    textinputs = x[currentTab].querySelectorAll("input[type=checkbox]");

    var empty = [].filter.call(textinputs, function (el) {
      return !el.checked
    });
    // var totals = [].filter.call( textinputs, function(el) {
    //   return el.checked
    // });
    var sum = 0;
    if (textinputs.length == empty.length) {
      toastr.error('No Package Selected')
      return false;
    }
    // } else{
    //   for(let i = 0; i < totals.length; i++){
    //     sum += parseFloat(totals[i].value);
    //     $("#total").val(sum);
    //   }
    // }
  }
  y = x[currentTab].querySelectorAll("[required]");
  for (i = 0; i < y.length; i++) {
    if (y[i].value == "") {
      y[i].className += " invalid";
      valid = false;
    }
  }
  if (valid) {
    document.getElementsByClassName("step")[currentTab].className += " finish";
  }
  return valid;
}

function fixStepIndicator(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  x[n].className += " active";
}

