document.getElementById("search").addEventListener("input", function (event) {
  var query = event.target.value;

  if (query === "") {
    document.getElementById("search-results").innerHTML = "";
    return;
  }

  fetch("../model/do_search.php?search=" + query)
    .then((response) => response.json())
    .then((data) => {
      document.getElementById("search-results").innerHTML = "";

      var uniqueMovies = [];
      var uniqueMovieIds = [];

      data.forEach(function (movie) {
        if (!uniqueMovieIds.includes(movie.id)) {
          uniqueMovies.push(movie);
          uniqueMovieIds.push(movie.id);
        }
      });

      uniqueMovies.forEach(function (movie) {
        var resultElement = document.createElement("a");
        resultElement.href = "./details.php?id=" + movie.id;
        resultElement.className =
          "max-w-sm rounded-lg bg-gray-900 overflow-hidden shadow-lg m-4 w-full sm:w-1/2 md:w-1/3 lg:w-1/4";

        var imgElement = document.createElement("img");
        imgElement.className = "w-full";
        imgElement.src = movie.image_url;
        imgElement.alt = movie.title;
        resultElement.appendChild(imgElement);

        var divElement = document.createElement("div");
        divElement.className = "px-6 py-4";

        var titleElement = document.createElement("div");
        titleElement.className = "font-bold text-bleu1 text-xl mb-2";
        titleElement.textContent = movie.title;
        divElement.appendChild(titleElement);

        var priceElement = document.createElement("p");
        priceElement.className = "text-bleu2 text-base";
        priceElement.textContent = "$" + movie.price;
        divElement.appendChild(priceElement);

        resultElement.appendChild(divElement);

        document.getElementById("search-results").appendChild(resultElement);
      });
    });
});

document.addEventListener("DOMContentLoaded", function () {
  var urlParams = new URLSearchParams(window.location.search);
  var searchParam = urlParams.get("search");
  if (searchParam) {
    document.getElementById("search").value = searchParam;
    var event = new Event("input", {
      bubbles: true,
      cancelable: true,
    });
    document.getElementById("search").dispatchEvent(event);
  }
});
