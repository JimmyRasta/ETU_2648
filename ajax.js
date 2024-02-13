function submitForm() {
    var formData = $("#saisieForm").serialize();

    $.ajax({
        type: "POST",
        url: "traitement_cueillettes.php", // Pointez vers le script PHP de traitement
        data: formData,
        success: function(response) {
            $("#result").html(response);
        }
    });
}
