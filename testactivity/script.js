const sound = document.getElementById("dogSound");
const popup = document.getElementById("popupMessage");
const buttonGroup = document.getElementById("buttonGroup");

function showPopup(message, color = '#4caf50') {
  popup.textContent = message;
  popup.style.color = color;
  popup.classList.add("show");

  setTimeout(() => {
    popup.classList.remove("show");
  }, 2500);
}

function playDogSound() {
  sound.currentTime = 0;
  sound.play();
  buttonGroup.classList.remove("show");
  showPopup("Great! You heard the dog barking! 🐶🔊", '#4caf50');
}

sound.addEventListener('ended', () => {
  buttonGroup.classList.add("show");
});

function nextAnimal() {
  showPopup("Next animal coming soon! 🐾", '#2196f3');
}

function skipAnimal() {
  showPopup("You skipped this one! ⏭️", '#ff9800');
}
