// Logout
document
    .getElementById("logoutLink")
    .addEventListener("click", function (event) {
        event.preventDefault(); // Mencegah tautan mengarahkan langsung
        document.getElementById("logoutForm").submit(); // Mengirim formulir logout
    });

// Username
$(document).ready(function () {
    $("#username").on("input", function () {
        var username = $(this).val();

        $.ajax({
            url: "/check-username/" + username,
            type: "GET",
            success: function (response) {
                if (response.available) {
                    $(".availability-message")
                        .text("Username tersedia")
                        .css("color", "green");
                } else {
                    $(".availability-message")
                        .text("Username sudah digunakan")
                        .css("color", "red");
                }
            },
        });
    });
});
