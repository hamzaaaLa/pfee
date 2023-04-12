// Get references to the select menus
var filiereSelect = document.getElementById("filiereSelect");
var semestreSelect = document.getElementById("semestreSelect");
var moduleSelect = document.getElementById("moduleSelect");

// Listen for changes to the 'filière' and 'semestre' select menu
filiereSelect.addEventListener("change", updateSelect);
semestreSelect.addEventListener("change", updateSelect);

// Function to update the select menus bases on the selected 'filière' or 'semestre'
function updateSelect() {
    // Get the selected 'filiere' and 'module'
    var filiere = filiereSelect.value;
    var semestre = semestreSelect.value;

    /*if(filiere.length !== 0 && semestre.length === 0) {
        var xhr = new XMLHttpRequest();
        // Send an AJAX request to get the data for the select menues
        xhr.open("GET", "get_select_menu_data.php?filiere=" + filiere);
        xhr.onload = function() {
            // Parse the JSON response and update the selected menues
            semestre = JSON.parse(xhr.responseText);
            semestreSelect.innerHTML = "";
            for (var i = 0; semestre.length; i++) {
                var option = document.createElement("option");
                option.text = semestre[i];
                semestreSelect.add(option);
            }
        };
        xhr.send();
    }*/
    if (filiere.length !== 0 && semestre.length !== 0) {
        var xhr = new XMLHttpRequest();
        // Send an AJAX request to get the data for the select menues
        xhr.open("GET", "get_select_menu_data.php?filiere=" + filiere + "&semestre=" + semestre);
        xhr.onload = function() {
            // Parse the JSON response and update the selected menues
            var modules = JSON.parse(xhr.responseText);
            moduleSelect.innerHTML = "";
            for (var i = 0; modules.length; i++) {
                var option = document.createElement("option");
                option.text = semestre[i];
                moduleSelect.add(option);
            }
        };
        xhr.send();
    }

}

function sendData() {
    var filiereValues = $('#filiereSelect').val();
    var semestreValues = $('#semestreSelect').val();
    var moduleValues = $('#moduleSelect').val();

    $.ajax({
        url: '',
        type: 'POST',
        data: {
            'filiereValues': filiereValues,
            'semestreValues': semestreValues,
            'moduleValues': moduleValues
        }
    });

}
