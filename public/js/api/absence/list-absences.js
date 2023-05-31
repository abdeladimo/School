/// *****************************
/// DEFINE GLOBAL VARIABLES
/// *****************************
/// *****************************
/// CALL YOUR FUNCTIONS
/// *****************************
/// *****************************
/// DEFINE YOUR FUNCTIONS
/// *****************************
const checkAbsence = (student, seance, dateToCheck) => {
    if (student.absences.length > 0) {
        return student.absences.find(absence => absence.seance_id === seance.id && absence.absence_date === dateToCheck);
    }
}
