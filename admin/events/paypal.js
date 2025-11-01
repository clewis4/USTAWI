// Here I am disabling the paypal button if the user has not enetered any amout yet
function togglePayPalButton() {
  var amount = document.getElementById("amount").value;

  console.log("amount", amount);
  var button = document.getElementById("paypal-button");

  if (amount.trim() !== "") {
    console.log("there is no amount");
    button.disabled = false;
  } else {
    button.disabled = true;
  }
}

function initPayPalButton() {
  paypal
    .Buttons({
      style: {
        shape: "rect",
        color: "gold",
        layout: "vertical",
        label: "paypal",
      },

      createOrder: function (data, actions) {
        var amount = document.getElementById("amount").value;

        return actions.order.create({
          purchase_units: [
            {
              amount: {
                currency_code: "USD",
                value: amount.toString() + ".00",
              },
            },
          ],
        });
      },

      onApprove: function (data, actions) {
        return actions.order.capture().then(function (orderData) {
          document.getElementById("transacion_id").value = orderData.id;

          // Submit the form using java script
          document.getElementById("charity-payment-form").submit();

          // Here we replace the paypal buttons with a success message after
          // a successful contribution
          // const element = document.getElementById("paypal-button-container");
          // element.innerHTML = "";
          // element.innerHTML =
          //   "<h3>Your contribution has been received, Thank you!</h3>";
        });
      },

      onError: function (err) {
        console.log(err);
      },
    })
    .render("#paypal-button-container");

  // // Add event listener to the amount input field to toggle the PayPal button
  // document
  //   .getElementById("amount")
  //   .addEventListener("input", togglePayPalButton);
}
initPayPalButton();
