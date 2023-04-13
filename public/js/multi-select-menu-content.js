// Get references to the select menus
var filiereSelect = document.getElementById("filiereSelect");
var semestreSelect = $("#semestreSelect").chosen();
var moduleSelect = $("#moduleSelect").chosen();

// Listen for changes to the 'filière' and 'semestre' select menu
filiereSelect.addEventListener("change", updateSelect);
semestreSelect.change(updateSelect);

// Function to update the select menus bases on the selected 'filière' or 'semestre'
function updateSelect() {
    // Get the selected 'filiere' and 'module'
    var filiere = filiereSelect.value;
    var semestres = $(semestreSelect).val();

    console.log(filiere);
    console.log(semestres);

    if (filiere.length !== 0 && semestres.length !== 0) {
        $.ajax({
            url: "/admin/ajoutetud/get-modules",
            type: 'POST',
            data: {
                'selectedFiliere': filiere,
                'selectedSemestres': semestres,
                '_token': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                console.log(response);
                moduleSelect.html("");

                for (var i = 0; i < response.length; i++) {
                    var option = $("<option>").text(response[i].libelleModule).val(response[i].libelleModule);
                    moduleSelect.append(option);
                }

                moduleSelect.trigger("chosen:updated");
            }
        });

    //     /*var xhr = new XMLHttpRequest();
    //     // Send an AJAX request to get the data for the select menues
    //     xhr.open("GET", "get_select_menu_data.php?filiere=" + filiere + "&semestre=" + semestre);
    //     xhr.onload = function() {
    //         // Parse the JSON response and update the selected menues
    //         modules = JSON.parse(xhr.responseText);
    //         moduleSelect.innerHTML = "";
    //         for (var i = 0; modules.length; i++) {
    //             var option = document.createElement("option");
    //             option.text = semestre[i];
    //             moduleSelect.add(option);
    //         }
    //     };
    //     xhr.send();*/
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
