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

        if (!amount) {
          window.alert("Please anter an amout");
          return;
        }

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
          document.getElementById("transaction_id").value = orderData.id;

          // Submit the form using java script
          document.getElementById("charity-payment-form").submit();

          // Here we replace the paypal buttons with a success message after
          // a successful contribution
          const element = document.getElementById("paypal-button-container");
          element.innerHTML = "";
          element.innerHTML =
            "<h3>Your contribution has been received, Thank you!</h3>";
        });
      },

      onError: function (err) {
        console.log(err);
      },
    })
    .render("#paypal-button-container");
}
initPayPalButton();
