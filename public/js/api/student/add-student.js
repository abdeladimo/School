/// *****************************
/// DEFINE GLOBAL VARIABLES
/// *****************************
var classes = [];
/// *****************************
/// CALL YOUR FUNCTIONS
/// *****************************
$(document).ready(function () {
    getAllData("classes", fillSelectClasses);
    $("select#classes").change(function (e) {
        e.preventDefault();
        let classe = classes.find((classe, index) => {
            return classe.id == $(this).val();
        });
        displaySignNbMaxStudent(classe);
    });
});
/// *****************************
/// DEFINE YOUR FUNCTIONS
/// *****************************
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
/**
 * Show indicator about the capacity of the selected classe
 * @param {object} classe The selected classe
 */
const displaySignNbMaxStudent = (classe) => {
    let lblSignNbMaxStudent = $("label#sign-nb-max-students");
    let totalStudents = classe.students.length;
    lblSignNbMaxStudent.text(`${totalStudents} / ${classe.nb_max_student}`);
    let colorSign = totalStudents > classe.nb_max_student ? "red" : "green";
    lblSignNbMaxStudent.css('color', colorSign);
}
