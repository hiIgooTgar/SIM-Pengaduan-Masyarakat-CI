// pop up pegawai
function times() {
	var modal = document.getElementById("myModal");
	modal.style.display = "none";
}

function openModal(nik) {
	var modal = document.getElementById("myModal" + nik);
	modal.style.display = "block";
}

function closeModal(nik) {
	var modal = document.getElementById("myModal" + nik);
	modal.style.display = "none";
}

window.onclick = function (event) {
	if (event.target.classList.contains("modal")) {
		var modal = event.target;
		var nik = modal.id.replace("myModal", "");
		closeModal(nik);
	}
};

// =================

// <!-- pop up badgets javascript -->
const popup = document.getElementById("popup-badgets");
const popupImage = document.getElementById("popup-image-badgets");
const closePopup = document.getElementById("close-popup-badgets");

const popupTriggers = document.querySelectorAll(".popup-trigger");

popupTriggers.forEach((trigger) => {
	trigger.addEventListener("click", () => {
		const imageURL = trigger.getAttribute("src");
		popupImage.src = imageURL;
		popup.style.display = "flex";
	});
});

popup.addEventListener("click", (event) => {
	if (event.target === popup) {
		popup.style.display = "none";
	}
});

closePopup.addEventListener("click", () => {
	popup.style.display = "none";
});
