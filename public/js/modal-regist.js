// Modal Register
// JavaScript untuk mengontrol modal
const openModalButton = document.getElementById("openModal");
const closeModalButton = document.getElementById("closeModal");
const modal = document.getElementById("registrationModal");
const body = document.body; // Dapatkan referensi ke elemen body

openModalButton.addEventListener("click", () => {
    modal.classList.remove("hidden");
    body.classList.add("overflow-hidden"); // Tambahkan class overflow-hidden pada body
});

closeModalButton.addEventListener("click", () => {
    modal.classList.add("hidden");
    body.classList.remove("overflow-hidden"); // Hapus class overflow-hidden pada body
});
