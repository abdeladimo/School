/// *****************************
/// DEFINE GLOBAL VARIABLES
/// *****************************
/// *****************************
/// CALL YOUR FUNCTIONS
/// *****************************
$(document).ready(function () {
    getAllData("classes", fillSelectAllClasses);
    $("#classes-filter").change(function (e) {
        e.preventDefault();
        let dataToSend = {
            "filter": "classe",
            "classe": $(this).val(),
        };
        getAllData("seances", getAllSeances, dataToSend);
    });
});
/// *****************************
/// DEFINE YOUR FUNCTIONS
/// *****************************
/**
 * Retrieve all seances from the server
 * @param {object} data response from the server that contains all seances
 */
const getAllSeances = (data) => {
    $("tbody#tbl_seance").empty();
    seances = data.seances;
    days = {
        mon: "Lundi",
        tue: "Mardi",
        wed: "Mercredi",
        thu: "Jeudi",
        fri: "Vendredi",
        sat: "Samedi",
        sun: "Dimanche",
    };
    $.each(seances, function (indexInArray, seance) {
        let tr = $(`<tr>`);
        let td_time = $(`<td>`);
        let td_content = $(`<div class="input-group">
                                <input type="time" disabled class="form-control ms-1" value="${seance.time_begin}">
                                <input type="time" disabled class="form-control" value="${seance.time_end}">
                            </div>`);
        td_time.html(td_content);
        tr.append(td_time);
        $.each(days, function (indexInArray, day) {
            let td = $(`<td>`);
            if (seance.seance_day == indexInArray) {
                td.html(`<div class="col mb-2">${seance.prof.user.nom} - ${seance.salle.salle_number}</div>`);
            }
            else {
                td.html(`<div class="col mb-2">-</div>`);
            }
            tr.append(td);
        });
        $("tbody#tbl_seance").append(tr);
    });
}
/**
 * Fill the select field with all classes
 * @param {object} data response from the server that contains all classes
 */
const fillSelectAllClasses = (data) => {
    let classes = data.classes;
    $("select#classes-filter").empty();
    $.each(classes, function (indexInArray, classe) {
        let option = $("<option>");
        option.text(`${classe.nom}`);
        option.val(classe.id);
        $("select#classes-filter").append(option);
    });
    $("select#classes-filter").trigger("change");
    // $("select#classes").select2({
    //     placeholder: 'Séléctionner un classe ...',
    // });
}
