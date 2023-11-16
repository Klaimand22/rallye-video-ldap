var countDownDate = new Date("Jan 25, 2024 16:30:00").getTime();

function updateCountdown() {
  var now = new Date().getTime();
  var distance = countDownDate - now;

  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  var countdownElement = document.getElementById("countdown");
  countdownElement.innerHTML = days + " Jours " + hours + " Heures " + minutes + " Minutes " + seconds + " Secondes ";

  if (distance < 0) {
    countdownElement.innerHTML = "EXPIRED";
    countdownElement.classList.add("countdown-expired");
  } else {
    requestAnimationFrame(updateCountdown);
  }
}

updateCountdown();
