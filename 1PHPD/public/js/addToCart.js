document.querySelectorAll(".add-to-cart-form").forEach((form) => {
  form.addEventListener("submit", function (e) {
    e.preventDefault();

    fetch(this.action, {
      method: "POST",
      body: new FormData(this),
    })
      .then((response) => response.text())
      .then((data) => {
        alert(data);
      })
      .catch((error) => {
        console.error("Error:", error);
      });
  });
});
