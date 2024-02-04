// Logout
document
    .getElementById("loggoutacc")
    .addEventListener("click", function (event) {
        event.preventDefault(); // Mencegah tautan mengarahkan langsung
        document.getElementById("logoutFormHome").submit(); // Mengirim formulir logout
    });
