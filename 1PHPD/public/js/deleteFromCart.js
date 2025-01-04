document.querySelectorAll(".delete-from-cart-form").forEach((form) => {
  form.addEventListener("submit", function (e) {
    e.preventDefault();

    fetch(this.action, {
      method: "POST",
      body: new FormData(this),
    })
      .then((response) => response.text())
      .then((data) => {
        alert(data);
        location.reload();
      })
      .catch((error) => {
        console.error("Error:", error);
      });
  });
});

function updateQuantity(movieId, change) {
  event.preventDefault();

  fetch("../model/User.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/x-www-form-urlencoded",
    },
    body: "movieId=" + movieId + "&quantityChange=" + change,
  })
    .then((response) => response.text())
    .then((data) => {
      location.reload();
    })
    .catch((error) => {
      console.error("Error:", error);
    });
}
