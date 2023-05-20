/// *****************************
/// DEFINE GLOBAL VARIABLES
/// *****************************
/// *****************************
/// CALL YOUR FUNCTIONS
/// *****************************
$(document).ready(function () {
    toggleDisplay("none");
    $("button#btn-add-seance").click(addSeance);
    $("#time-begin, #time-end, #seance-day").change(function (e) {
        e.preventDefault();
        checkAvailability();
    });
});
/// *****************************
/// DEFINE YOUR FUNCTIONS
/// *****************************
/**
 * Add new seance
 * @param {Event} e Information about the event
 */
const addSeance = async (e) => {
    e.preventDefault();
    let time_begin = $("input#time-begin").val();
    let time_end = $("input#time-end").val();
    let day = $("select#seance-day").val();
    if (day == "" || time_begin == "" || time_end == "" || time_begin > time_end) {
        alert(`S'il vous plaît remplir les champs des heures et/ou séléctionner un jour.`);
        return;
    } else {
        let dataToSend = {
            "time_begin": time_begin,
            "time_end": time_end,
            "day": day,
            "prof": $("select#profs").val(),
            "classe": $(`select#classes`).val(),
            "room": $("select#rooms").val(),
        }
        addData("seances", dataToSend, showDialogResponse);
    }
}
/**
 * Show dialog modal to display server response
 * @param {object} data response from the server that contains new seance
 */
const showDialogResponse = (data) => {
    let msg = data.msg;
    if (data.status == 200) {
        let seance = data.result;
        checkAvailability();
        $("select#classes-filter").trigger("change");
        // alertMsg(msg);
    } else if (data.status == 409) {
        // alertMsg(msg, "danger");
    } else {
        let errors = data.errors;
        console.log(errors);
    }
    window.scrollTo(0, 0);
}
/**
 * Fill the select field with all profs
 * @param {object} data response from the server that contains all profs
 */
const fillSelectProfs = (data) => {
    let profs = data.profs;
    $.each(profs, function (indexInArray, prof) {
        let option = $("<option>");
        option.text(`${prof.user.nom} ${prof.user.prenom}`);
        option.val(prof.id);
        $("select#profs").append(option);
    });
    // $("select#profs").select2({
    //     placeholder: 'Séléctionner un prof ...',
    // });
}
/**
 * Fill the select field with all classes
 * @param {object} data response from the server that contains all classes
 */
const fillSelectClasses = (data) => {
    let classes = data.classes;
    $.each(classes, function (indexInArray, classe) {
        let option = $("<option>");
        option.text(`${classe.nom}`);
        option.val(classe.id);
        $("select#classes").append(option);
    });
    // $("select#classes").select2({
    //     placeholder: 'Séléctionner un classe ...',
    // });
}
/**
 * Fill the select field with all salles
 * @param {object} data response from the server that contains all salles
 */
const fillSelectSalles = (data) => {
    let salles = data.salles;
    $.each(salles, function (indexInArray, salle) {
        let option = $("<option>");
        option.text(`${salle.salle_number}`);
        option.val(salle.id);
        $("select#rooms").append(option);
    });
    // $("select#rooms").select2({
    //     placeholder: 'Séléctionner un salle ...',
    // });
}
/**
 * Get all availables profs, classes and rooms.
 * @returns 
 */
const checkAvailability = () => {
    let time_begin = $("input#time-begin").val();
    let time_end = $("input#time-end").val();
    let day = $("select#seance-day").val();
    if (day == "" || time_begin == "" || time_end == "" || time_begin > time_end) {
        $(".alert").removeClass("d-none");
        toggleDisplay("none");
        return;
    } else {
        $(".alert").addClass("d-none");
        toggleDisplay("");
        let dataToSend = {
            "time_begin": time_begin,
            "time_end": time_end,
            "day": day,
        }
        $("#profs, #rooms, #classes").empty();
        getAllData("available-profs", fillSelectProfs, dataToSend);
        getAllData("available-classes", fillSelectClasses, dataToSend);
        getAllData("available-salles", fillSelectSalles, dataToSend);
    }
}
/**
 * Toogle display for select inputs.
 * @returns 
 */
const toggleDisplay = (value) => {
    $(".reste").css("display", value);
}
