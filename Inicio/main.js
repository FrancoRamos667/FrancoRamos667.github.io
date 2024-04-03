document.addEventListener("DOMContentLoaded", function() {
  const modoOscuroBtn = document.getElementById("modo-oscuro-btn");

  modoOscuroBtn.addEventListener("click", function() {
      document.body.classList.toggle("modo-oscuro");
  });
});
