$(document).ready(function() {
    if ($("#example").length) {
        $("#example").DataTable({
            language: {
                url: '/Bigotitos/js/es-ES.json' 
            }
        });
    } else {
        console.error("La tabla con ID 'example' no existe.");
    }
});

