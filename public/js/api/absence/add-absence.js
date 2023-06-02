/// *****************************
/// DEFINE GLOBAL VARIABLES
/// *****************************
var classes = [];
var days = {
    mon: "Lundi",
    tue: "Mardi",
    wed: "Mercredi",
    thu: "Jeudi",
    fri: "Vendredi",
    sat: "Samedi",
    sun: "Dimanche",
};
var currentStartWeek = null;
/// *****************************
/// CALL YOUR FUNCTIONS
/// *****************************
$(document).ready(function () {
    $("button#btn-add-absence").click(addAbsence);
    $("button.btn-navigate").click(navigateDate);
    $("input#selected-date").val(startOfWeek);
    getAllData("classes", fillSelectClasses);
    $("#classes").change(function (e) {
        e.preventDefault();
        let classe = classes.find((classe, index) => {
            return classe.id == $(this).val();
        });
        displayListAbsenceHeader(classe.seances);
        displayListAbsence(classe);
    });
});
/// *****************************
/// DEFINE YOUR FUNCTIONS
/// *****************************
/**
 * Add new absence
 * @param {Event} e Information about the event
 */
const addAbsence = async (e) => {
    e.preventDefault();
    let absences = $("input[type=checkbox]:checked").map(function(){
        let absence = JSON.parse($(this).val());
        return absence;
      }).get();
    let dataToSend = {
        "absences": absences,
        "currentStartWeek": currentStartWeek.toISOString().split('T')[0],
    }
    addData("absences", dataToSend, showDialogResponse);
}
/**
 * Show dialog modal to display server response
 * @param {object} data response from the server that contains new absence
 */
const showDialogResponse = (data) => {
    // let msg = "OK";
    if (data.status == 200) {
        getAllData("classes", fillSelectClasses);
        // alertMsg(msg);
    } else {
        let errors = data.errors;
        console.log(errors);
    }
    window.scrollTo(0, 0);
}
/**
 * Display absence paper for selected classe
 * @param {object} classe Selected classe
 */
const displayListAbsence = (classe) => {
    $("tbody#tbl_absence").empty();
    let clonedCurrentStartWeek = new Date(currentStartWeek.valueOf());
    $.each(classe.students, function (indexInArrayStudents, student) {
        let tr = $(`<tr>`);
        let td_student = $(`<th scope="row">${student.user.nom} ${student.user.prenom}</th>`);
        tr.append(td_student);
        $.each(days, function (indexInArrayDays, day) {
            let td = $(`<td>`);
            let seance_table = $(`<table class="table table-bordered">`);
            let seance_tr_check_absence = $("<tr>");
            $.each(classe.seances, function (indexInArraySeances, seance) {
                if (seance.seance_day == indexInArrayDays) {
                    let td = $("<td>");
                    let absence_date = clonedCurrentStartWeek.toISOString().split('T')[0];
                    let is_absent = checkAbsence(student, seance, absence_date);
                    let checkbox = $(`<input type="checkbox" ${is_absent ? "checked" : ""} value='{"student": ${student.id}, "seance": ${seance.id}, "absence_date": "${absence_date}"}'>`);
                    td.append(checkbox);
                    seance_tr_check_absence.append(td);
                }
            });
            seance_table.append(seance_tr_check_absence);
            td.append(seance_table);
            tr.append(td);
            clonedCurrentStartWeek.setDate(clonedCurrentStartWeek.getDate() + 1);
        });
        $("tbody#tbl_absence").append(tr);
    });
}
const displayListAbsenceHeader = (seances) => {
    $("thead#tbl_absence_header").empty();
    let tr = $("<tr>");
    tr.html(`<th scope="col">Jours / étudient</th>`);
    $.each(days, function (indexInArrayDays, day) {
        let td = $(`<th scope="col">`);
        let seance_table = $(`<table class="table table-bordered">`);
        let seance_tr_head = $("<tr>");
        let td_day = $(`<th scope="col">${day}</th>`);
        seance_tr_head.append(td_day);
        seance_table.append(seance_tr_head);
        let seance_tr_body = $("<tr>");
        $.each(seances, function (indexInArraySeances, seance) {
            if (seance.seance_day == indexInArrayDays) {
                let td = $(`<td>`);
                td.text(`${seance.time_begin} - ${seance.time_end}`);
                seance_tr_body.append(td);
            }
        });
        seance_table.append(seance_tr_body);
        td.append(seance_table);
        tr.append(td);
    });
    $("thead#tbl_absence_header").append(tr);
}
/**
 * Fill the select field with all classes
 * @param {object} data response from the server that contains all classes
 */
const fillSelectClasses = (data) => {
    classes = data.classes;
    $.each(classes, function (indexInArray, classe) {
        let option = $("<option>");
        option.text(`${classe.nom}`);
        option.val(classe.id);
        $("select#classes").append(option);
    });
    $("select#classes").trigger("change");
    // $("select#classes").select2({
    //     placeholder: 'Séléctionner un classe ...',
    // });
}
const startOfWeek = () => {
    let today = new Date();
    let diff = today.getDate() - today.getDay() + (today.getDay() === 0 ? -6 : 1);
    currentStartWeek = new Date(today.setDate(diff));
    return currentStartWeek.toLocaleDateString();
}
const navigateDate = (e) => {
    let direction = $(e.target).data("direction");
    let diff = (direction == `+`) ? 7 : -7;
    currentStartWeek.setDate(currentStartWeek.getDate() + diff);
    $("input#selected-date").val(currentStartWeek.toLocaleDateString());
    $("select#classes").trigger("change");
}
