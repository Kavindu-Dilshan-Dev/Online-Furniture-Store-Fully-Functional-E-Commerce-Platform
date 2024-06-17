function changeView() {
  var signinbox = document.getElementById("signin_box");
  var signupbox = document.getElementById("signup_Box");

  signinbox.classList.toggle("d-none");
  signupbox.classList.toggle("d-none");
}

function signload() {
  location.reload();
}
function signup() {
  var fname = document.getElementById("fname");
  var lname = document.getElementById("lname");
  var email = document.getElementById("email");
  var mobile = document.getElementById("mobile");
  var username = document.getElementById("username");
  var password = document.getElementById("password");

  // form to send data through post method

  var f = new FormData();

  f.append("fn", fname.value);
  f.append("ln", lname.value);
  f.append("email", email.value);
  f.append("mobile", mobile.value);
  f.append("username", username.value);
  f.append("password", password.value);

  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if ((request.readyState == 4) & (request.status == 200)) {
      var response = request.responseText;
      //   alert(response);
      if (response == "Success") {
        document.getElementById("msg1").innerHTML =
          "Registration Successfully Completed";
        document.getElementById("msg1").className =
          "d-flex  justify-content-center alert alert-primary  ";
        document.getElementById("msgDiv1").className = "d-block";

        fname.value = "";
        lname.value = "";
        email.value = "";
        mobile.value = "";
        username.value = "";
        password.value = "";
      } else {
        document.getElementById("msg1").innerHTML = response;
        document.getElementById("msg1").className =
          "d-flex justify-content-center alert alert-danger";
        document.getElementById("msgDiv1").className = "d-block";
      }
    }
  };

  request.open("POST", "signUpProcess.php", true);
  request.send(f);
}

function signin() {
  var un = document.getElementById("un");
  var pw = document.getElementById("pw");
  var rm = document.getElementById("rm");

  var f = new FormData();

  f.append("u", un.value);
  f.append("p", pw.value);
  f.append("r", rm.checked);

  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if ((request.readyState == 4) & (request.status == 200)) {
      var response = request.responseText;

      // alert(response);
      if (response == "Success") {
        window.location = "index.php";
      } else {
        document.getElementById("msg2").innerHTML = response;
        document.getElementById("msg2").className =
          "d-flex justify-content-center alert alert-danger mt-2";
        document.getElementById("msgDiv2").className = "d-block ";
      }
    }
  };

  request.open("POST", "signInProcess.php", true);
  request.send(f);
}

function adminsign() {
  location.reload();
}
function adminSignIn() {
  var username = document.getElementById("un");
  var password = document.getElementById("pw");

  var f = new FormData();

  f.append("u", username.value);
  f.append("p", password.value);

  request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if ((request.readyState == 4) & (request.status == 200)) {
      var response = request.responseText;
      // alert(response);
      if (response == "Success") {
        window.location = "adminDashboard.php";
      } else {
        document.getElementById("msg").innerHTML = response;
        document.getElementById("msgDiv").className = "d-block  ";
      }
    }
  };

  request.open("POST", "adminSIgninProcess.php", true);
  request.send(f);
}

function loadUser() {
  var request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if ((request.readyState == 4) & (request.status == 200)) {
      var response = request.responseText;

      //  alert(response);

      document.getElementById("tb").innerHTML = response;
    }
  };

  request.open("POST", "loadUserProcess.php", true);
  request.send();
}

function loadstatus() {
  location.reload();
}

function changeStatus() {
  var userid = document.getElementById("userid");

  var f = new FormData();
  f.append("u", userid.value);

  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if ((request.readyState == 4) & (request.status == 200)) {
      var response = request.responseText;
      //  alert(response);
      if (response == "activate") {
        document.getElementById("msg").innerHTML = "Successfully Activated";
        document.getElementById("msg").className = "alert alert-success";
        document.getElementById("msgDiv").className = "d-block";
        userid.value = "";
      } else if (response == "deactivate") {
        document.getElementById("msg").innerHTML = "Successfully Deactivated";
        document.getElementById("msg").className = "alert alert-success";
        document.getElementById("msgDiv").className = "d-block";
        userid.value = "";
      } else {
        document.getElementById("msg").innerHTML = response;
        document.getElementById("msgDiv").className = "d-block";
      }
    }
  };

  request.open("POST", "chageStatusProcess.php", true);
  request.send(f);
}

function matregload() {
  location.reload();
}

function matreg() {
  var mat = document.getElementById("mat");

  if (!/^[a-zA-Z0-9]+$/.test(mat.value)) {
    // alert("Please Enter Valid Characters");
    document.getElementById("msg1").innerHTML = "Please Enter Valid Characters";
          document.getElementById("msgDive1").className = "d-block";
  } else {
    var f = new FormData();
    f.append("m", mat.value);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
      if ((request.readyState == 4) & (request.status == 200)) {
        var response = request.responseText;

        if (response == "Success") {
          document.getElementById("msg1").innerHTML = "Material Registered";
          document.getElementById("msg1").className = "alert alert-success";
          document.getElementById("msgDive1").className = "d-block";
          mat.value = "";
        } else {
          document.getElementById("msg1").innerHTML = response;
          document.getElementById("msgDive1").className = "d-block";
          mat.value = "";
        }
      }
    };

    request.open("POST", "matRegProcess.php", true);
    request.send(f);
  }
}

function catload() {
  location.reload();
}

function catreg() {
  var cat = document.getElementById("category");

  if (!/^[a-zA-Z0-9]+$/.test(cat.value)) {
    // alert("Please Enter Valid Characters");
    document.getElementById("msg2").innerHTML = "Please Enter Valid Characters";
          document.getElementById("msgDiv2").className = "d-block";
  } else {
    var f = new FormData();
    f.append("c", cat.value);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
      if ((request.readyState == 4) & (request.status == 200)) {
        var response = request.responseText;
        if (response == "Success") {
          document.getElementById("msg2").innerHTML = "Brand Registered";
          document.getElementById("msg2").className = "alert alert-success";
          document.getElementById("msgDiv2").className = "d-block";
          cat.value = "";
        } else {
          document.getElementById("msg2").innerHTML = response;
          document.getElementById("msgDiv2").className = "d-block";
          cat.value = "";
        }
      }
    };

    request.open("POST", "categoryRegistrationProcess.php", true);
    request.send(f);
  }
}

function loadReg() {
  location.reload();
}

function colorReg() {
  var col = document.getElementById("color");
  if (!/^[a-zA-Z0-9]+$/.test(col.value)) {
    // alert("Please Enter Valid Characters");
    document.getElementById("msg3").innerHTML = "Please Enter Valid Characters";
          document.getElementById("msgDiv3").className = "d-block";
  } else {
    var f = new FormData();
    f.append("c", col.value);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
      if ((request.readyState == 4) & (request.status == 200)) {
        var response = request.responseText;
        if (response == "Success") {
          document.getElementById("msg3").innerHTML = "Colour Registered";
          document.getElementById("msg3").className = "alert alert-success";
          document.getElementById("msgDiv3").className = "d-block";
          col.value = "";
        } else {
          document.getElementById("msg3").innerHTML = response;
          document.getElementById("msgDiv3").className = "d-block";
          col.value = "";
        }
      }
    };

    request.open("POST", "colorRegProcess.php", true);
    request.send(f);
  }
}

function loadsize() {
  location.reload();
}

function sizeReg() {
  var size = document.getElementById("size");

  var f = new FormData();
  f.append("s", size.value);

  if (!/^[a-zA-Z0-9]+$/.test(size.value)) {
    // alert("Please Enter Valid Characters");
    document.getElementById("msg4").innerHTML = "Please Enter Valid Characters";
          document.getElementById("msgDiv4").className = "d-block";
  } else {
    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
      if ((request.readyState == 4) & (request.status == 200)) {
        var response = request.responseText;
        if (response == "Success") {
          document.getElementById("msg4").innerHTML = "Size Registered";
          document.getElementById("msg4").className = "alert alert-success";
          document.getElementById("msgDiv4").className = "d-block";
          size.value = "";
        } else {
          document.getElementById("msg4").innerHTML = response;
          document.getElementById("msgDiv4").className = "d-block";
          size.value = "";
        }
      }
    };

    request.open("POST", "sizeRegProcess.php", true);
    request.send(f);
  }
}

function regProduct() {
  var pname = document.getElementById("pn");
  var mat = document.getElementById("mat");
  var cat = document.getElementById("cat");
  var co = document.getElementById("co");
  var size = document.getElementById("size");
  var desc = document.getElementById("desc");
  var file = document.getElementById("file");

  if (!/^[a-zA-Z0-9]+$/.test(pname.value)) {
    // alert("Please Enter Valid Characters");
    Swal.fire({
      icon: "error",
      title: "Please Enter Valid Characters",
     
      
    });
  } else {
    var f = new FormData();
    f.append("pname", pname.value);
    f.append("mat", mat.value);
    f.append("cat", cat.value);
    f.append("co", co.value);
    f.append("size", size.value);
    f.append("desc", desc.value);
    f.append("image", file.files[0]);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
      if (request.readyState == 4 && request.status == 200) {
        var response = request.responseText;
        // alert(response);

        if (response == "Success") {

          pname.value = "";
          mat.value = "";
          cat.value = "";
          co.value = "";
          size.value = "";
          desc.value = "";
          
          Swal.fire({
            position: "top-center",
            icon: "success",
            title: response,
            showConfirmButton: false,
            timer: 2000
          });
          
          
        } else {
          location.reload();
          Swal.fire({
            icon: "error",
            title: response,
           
            
          });
        }

        
      }
    };

    request.open("POST", "PoductRegister.php", true);
    request.send(f);
  }
}

function updateStock() {
  var pname = document.getElementById("pname");
  var qty = document.getElementById("qty");
  var up = document.getElementById("up");

  if (!/^[a-zA-Z0-9]+$/.test(qty.value)) {
    // alert("Please Enter Valid Characters");
    Swal.fire({
      icon: "error",
      title: "Please Enter Valid Characters",
     
      
    });
  } else if (!/^[a-zA-Z0-9]+$/.test(up.value)) {
    // alert("Please Enter Valid Characters");
    Swal.fire({
      icon: "error",
      title: "Please Enter Valid Characters",
     
      
    });
  } else {
    var f = new FormData();
    f.append("pname", pname.value);
    f.append("qty", qty.value);
    f.append("up", up.value);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
      if (request.readyState == 4 && request.status == 200) {
        var response = request.responseText;
        // alert(response);
        if (response == "New Stock Added Successfull" || response == "Stock Updated Successfull") {
          Swal.fire({
            position: "top-center",
            icon: "success",
            title: response,
            showConfirmButton: false,
            timer: 2000
          });

          pname.value = "";
        qty.value = "";
        up.value = "";
        } else {
          loadReg();
          Swal.fire({
            icon: "error",
            title: response,
           
            
          });
        }
        
       
      }
    };

    request.open("POST", "updateStockProccess.php", true);
    request.send(f);
  }
}

function printDiv() {
  var originalContent = document.body.innerHTML;

  var printArea = document.getElementById("printArea").innerHTML;

  document.body.innerHTML = printArea;

  window.print();

  document.body.innerHTML = originalContent;
}

function loadProduct(x) {
  var page = x;
  // alert(page);

  var f = new FormData();
  f.append("p", page);

  var request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if (request.readyState == 4 && request.status == 200) {
      var response = request.responseText;
      // alert(response);
      document.getElementById("pid").innerHTML = response;
    }
  };

  request.open("POST", "loadProductProcess.php", true);
  request.send(f);
}

function searchProduct(x) {
  // alert("ok");

  var page = x;
  var product = document.getElementById("product");
  // alert(page);
  // alert(product.value);

  var f = new FormData();
  f.append("p", product.value);
  f.append("pg", page);

  var request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if (request.readyState == 4 && request.status == 200) {
      var response = request.responseText;
      // alert(response);

      document.getElementById("pid").innerHTML = response;
    }
  };

  request.open("POST", "searchProductProcess.php", true);
  request.send(f);
}

function adfilter() {
  // alert("ok");
  var advsch = document.getElementById("advsch");
  var hdiv = document.getElementById("hdiv");

  advsch.classList.toggle("d-none");
  hdiv.classList.toggle("d-none");
}

function advSearchProduct(x) {
  var page = x;
  // alert(page);

  var color = document.getElementById("color");
  var material = document.getElementById("mat");
  var cat = document.getElementById("cat");
  var size = document.getElementById("size");
  var min = document.getElementById("min");
  var max = document.getElementById("max");

  // alert(min.value);

  var f = new FormData();
  f.append("pg", page);
  f.append("co", color.value);
  f.append("mat", material.value);
  f.append("cat", cat.value);
  f.append("s", size.value);
  f.append("min", min.value);
  f.append("max", max.value);

  var request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if (request.readyState == 4 && request.status == 200) {
      var response = request.responseText;
      // alert(response);
      document.getElementById("pid").innerHTML = response;
    }
  };

  request.open("POST", "advSearchProductProccess.php", true);
  request.send(f);
}

function uploadImage() {
  // alert("ok");
  var img = document.getElementById("imgUploader");

  var f = new FormData();
  f.append("i", img.files[0]);
  var request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if (request.readyState == 4 && request.status == 200) {
      var response = request.responseText;
      //   alert(response);
      if (response == "Empty") {
        // alert("Please Select Your Image");
        Swal.fire({
          icon: "question",
          title: "Please Select Your Image",
         
          
        });
        
      } else {
        document.getElementById("i").src = response;
        Swal.fire({
          icon: "success",
          title: "Profile Update Successfull",
         
          
        });
        img.value = "";
      }
    }
  };

  request.open("POST", "ProfileImgUploadProcess.php", true);
  request.send(f);
}

function updateData() {
  // alert("ok");

  var fname = document.getElementById("fname");
  var lname = document.getElementById("lname");
  var email = document.getElementById("email");
  var mobile = document.getElementById("mobile");
  var pw = document.getElementById("pw");
  var no = document.getElementById("no");
  var line1 = document.getElementById("line1");
  var line2 = document.getElementById("line2");

  

  // alert(fname.value);

  var f = new FormData();

  f.append("f", fname.value);
  f.append("l", lname.value);
  f.append("e", email.value);
  f.append("m", mobile.value);
  f.append("p", pw.value);
  f.append("n", no.value);
  f.append("l1", line1.value);
  f.append("l2", line2.value);

  var request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if (request.readyState == 4 && request.status == 200) {
      var response = request.responseText;
      // alert(response);
      // loadsize();
      if (response == "Update Successfully Completed") {
        Swal.fire({
          position: "top-center",
          icon: "success",
          title: response,
          showConfirmButton: false,
          timer: 2500
        });
        
      } else {
        Swal.fire({
          icon: "error",
          title: response,
         
          
        });
      }
    }
  };

  request.open("POST", "updateDataProccess.php", true);
  request.send(f);
}

function signOut() {
  // alert("ok");
  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if (request.readyState == 4 && request.status == 200) {
      var response = request.responseText;
      // alert(response);
      
      if (response == "Sign Out Successfull") {
        Swal.fire({
          position: "top-center",
          icon: "success",
          title: response,
          showConfirmButton: false,
          timer: 2500
        });
        
      }else{
        
        Swal.fire({
          position: "top-center",
          icon: "error",
          title: response,
          showConfirmButton: false,
          timer: 2000
        });
      }
      location.reload();
    }
  };

  request.open("POST", "signOutProccess.php", true);
  request.send();
}

function addToCart(x) {
  // alert(x);
  var stockId = x;
  var qty = document.getElementById("qty");

  if (qty.value > 0) {
    // alert("ok");

    var f = new FormData();
    f.append("s", stockId);
    f.append("q", qty.value);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
      if (request.readyState == 4 && request.status == 200) {
        var response = request.responseText;
            //  alert(response);
          if (response == "Cart Item Updated Successfull" || response == "Cart Item Added Successfull") {
            Swal.fire({
              position: "top-center",
              icon: "success",
              title: response,
              showConfirmButton: false,
              timer: 2000
            });
          } else {
            location.reload();
            Swal.fire({
              icon: "error",
              title: response,
             
              
            });
          }
            


                qty.value = "1";
               
        
      }
    };

    request.open("POST", "addToCartProccess.php", true);
    request.send(f);
  } else {
   
    // alert("Insert valid Quantity");
    Swal.fire({
      icon: "error",
      title: "Please Enter Valid Quantity",
      
     
      
    });
  }
}

function loadCart() {
  // alert("ok");
  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if (request.readyState == 4 && request.status == 200) {
      var response = request.responseText;
      // alert(response);

      document.getElementById("cartBody").innerHTML = response;
    }
  };

  request.open("POST", "loadCartProccess.php", true);
  request.send();
}

function incrementCartQty(x) {
  // alert(x);

  var cartId = x;

  var qty = document.getElementById("qty" + x);
  var newQty = parseInt(qty.value) + 1;
  //  alert(qty.value);
  // alert(newQty);

  var f = new FormData();
  f.append("c", cartId);
  f.append("q", newQty);

  var request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if (request.readyState == 4 && request.status == 200) {
      var response = request.responseText;
      // alert(response);
      if (response == "Success") {
        qty.value = parseInt(qty.value) + 1;
        loadCart();
      } else {
        alert(response);
      }
    } else {
    }
  };

  request.open("POST", "updateCartQtyProccess.php", true);
  request.send(f);
}

function decrementCartQty(x) {
  // alert(x);

  var cartId = x;

  var qty = document.getElementById("qty" + x);
  var newQty = parseInt(qty.value) - 1;
  //  alert(qty.value);
  // alert(newQty);

  var f = new FormData();
  f.append("c", cartId);
  f.append("q", newQty);

  if (newQty > 0) {
    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
      if (request.readyState == 4 && request.status == 200) {
        var response = request.responseText;
        // alert(response);
        if (response == "Success") {
          qty.value = parseInt(qty.value) - 1;
          loadCart();
        } else {
          alert(response);
        }
      }
    };

    request.open("POST", "updateCartQtyProccess.php", true);
    request.send(f);
  }
}

function removeCart(x) {
  // alert(x);
  if (confirm("Are you sure deleting this item?")) {
    var f = new FormData();
    f.append("c", x);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
      if (request.readyState == 4 && request.status == 200) {
        var response = request.responseText;
        alert(response);
        loadstatus();
        
      }
    };

    request.open("POST", "removeCartProcess.php", true);
    request.send(f);
  }
}

function checkout() {
  // alert("ok");

  var f = new FormData();
  f.append("cart", true);

  var request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if (request.readyState == 4 && request.status == 200) {
      var response = request.responseText;
      // alert(response);

      var payment = JSON.parse(response);
      doCheckout(payment, "checkoutProcess.php");
    }
  };
  request.open("POST", "paymentProcess.php", true);
  request.send(f);
}

function doCheckout(payment, path) {
  // Payment completed. It can be a successful failure.
  payhere.onCompleted = function onCompleted(orderId) {
    console.log("Payment completed. OrderID:" + orderId);
    // Note: validate the payment and show success or failure page to the customer

    var f = new FormData();
    f.append("payment", JSON.stringify(payment));

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
      if (request.readyState == 4 && request.status == 200) {
        var response = request.responseText;
        // alert(response);

        var order = JSON.parse(response);

        if (order.resp == "Success") {
          // reload();
          window.location = "invoice.php?orderId=" + order.order_id;
        } else {
          alert(response);
        }
      }
    };
    request.open("POST", path, true);
    request.send(f);
  };

  // Payment window closed
  payhere.onDismissed = function onDismissed() {
    // Note: Prompt user to pay again or show an error page
    console.log("Payment dismissed");
  };

  // Error occurred
  payhere.onError = function onError(error) {
    // Note: show an error page
    console.log("Error:" + error);
  };

  // Show the payhere.js popup, when "PayHere Pay" is clicked
  // document.getElementById("payhere-payment").onclick = function (e) {
  payhere.startPayment(payment);
  // };
}

function buyNow(stockId) {
  // alert(stockId);
  var qty = document.getElementById("qty");

  if (qty.value > 0) {
    // alert("ok");
    var f = new FormData();
    f.append("cart", false);
    f.append("stockId", stockId);
    f.append("qty", qty.value);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
      if (request.readyState == 4 && request.status == 200) {
        var response = request.responseText;
        // alert(response);
        var payment = JSON.parse(response);
        payment.stock_id = stockId;
        payment.qty = qty.value;
        doCheckout(payment, "buyNowProcess.php");
      }
    };
    request.open("POST", "paymentProcess.php", true);
    request.send(f);
  } else {
    // alert("Please Enter Valid Quantity");
    Swal.fire({
      icon: "error",
      title: "Please Enter Valid Quantity",
      
    });
  }
}

function forgetPassword() {
  // alert("ok");
  var email = document.getElementById("e");

  if (email.value != "") {
    var f = new FormData();
    f.append("e", email.value);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
      if (request.readyState == 4 && request.status == 200) {
        var response = request.responseText;
        // alert(response);

        if (response == "Success") {
          document.getElementById("msg").innerHTML =
            "Email Sent! Please Check your email box";
          document.getElementById("msg").className = "alert alert-success";
          document.getElementById("msgDiv").className = "d-block";
          email.value = "";
        } else {
          document.getElementById("msg").innerHTML = response;
          document.getElementById("msg").className = "alert alert-danger";
          document.getElementById("msgDiv").className = "d-block";
        }
      }
    };

    request.open("POST", "forgetPasswordProccess.php", true);
    request.send(f);
  } else {
    alert("Please Enter your valid email");
  }
}

function resetPassword() {
  // alert("ok");
  var vcode = document.getElementById("vcode");
  var np = document.getElementById("np");
  var np2 = document.getElementById("np2");

  var f = new FormData();
  f.append("vcode", vcode.value);
  f.append("np", np.value);
  f.append("np2", np2.value);

  var request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if (request.readyState == 4 && request.status == 200) {
      var response = request.responseText;
      // alert(response);
      if (response == "Success") {
        window.location = "Signin.php";
      } else {
        document.getElementById("msg").innerHTML = response;
        document.getElementById("msgDiv2").className = " d-block";
      }
    }
  };

  request.open("POST", "restPasswordProccess.php", true);
  request.send(f);
}

function loadchart() {
  // alert("ok");
  var ctx = document.getElementById("myChart");

  var request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if (request.readyState == 4 && request.status == 200) {
      var response = request.responseText;
      // alert(response);
      var data = JSON.parse(response);
      new Chart(ctx, {
        type: "doughnut",
        data: {
          labels: data.lables,
          datasets: [
            {
              label: "# of Votes",
              data: data.data,
              borderWidth: 1,
            },
          ],
        },
        options: {
          scales: {
            y: {
              beginAtZero: true,
            },
          },
        },
      });
    }
  };

  request.open("POST", "loadChartProcees.php", true);
  request.send();
}

function printinvc() {
  var originalContent = document.body.innerHTML;
  var printareainvc = document.getElementById("printinvoice").innerHTML;

  document.body.innerHTML = printareainvc;

  window.print();

  document.body.innerHTML = originalContent;
}

function printpurchhis() {
  var originalContent = document.body.innerHTML;
  var printareainvc = document.getElementById("ordhid").innerHTML;

  document.body.innerHTML = printareainvc;

  window.print();

  document.body.innerHTML = originalContent;
}

function printqoute() {
  var originalContent = document.body.innerHTML;
  var printareainvc = document.getElementById("cartBody").innerHTML;

  document.body.innerHTML = printareainvc;

  window.print();

  document.body.innerHTML = originalContent;
}

function signOutadmin() {
  // alert("ok");
  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if (request.readyState == 4 && request.status == 200) {
      var response = request.responseText;
      // alert(response);

      if (response == "Sign Out Succefull") {
       
        window.location = "adminSignIn.php";
      } 
     
    }
  };

  request.open("POST", "signOutAdminProccess.php", true);
  request.send();
}

function checkAdmin() {
  var email = document.getElementById("e");

  var f = new FormData();
  f.append("email", email.value);

  var request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if (request.readyState == 4 && request.status == 200) {
      var response = request.responseText;
      // alert(response);
      if (response == "Success") {
        forgetPassword();
      } else {
        alert(response);
      }
    }
  };
  request.open("POST", "checkAdminProccess.php", true);
  request.send(f);
}

function loadsales(){
  // alert("ok");

  var request = new XMLHttpRequest();
  request.onreadystatechange = function(){
    if (request.readyState == 4 && request.status == 200) {
        var response = request.responseText;
          // alert(response);
          document.getElementById("tb11").innerHTML = response;
    }
  };

  request.open("POST","loadSaleProcess.php",true);
  request.send();

}


