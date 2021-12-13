let dashBtn = document.getElementById('dashboard');
let dashOpt = document.getElementById('dash_opt');

dashBtn.addEventListener("click", (e) => {
    e.preventDefault();
    if (dashOpt.style.visibility == 'visible') {
        dashOpt.style.visibility = 'hidden';
    } else {
        dashOpt.style.visibility = 'visible';
    }
})


const patientForm = document.getElementById('patient_details');
const patientBtn = document.getElementById('add_patient');
patientBtn.addEventListener("click", (e) => {
    e.preventDefault();
    if (patientForm.style.visibility == 'visible') {
        patientForm.style.visibility = 'hidden';
    } else {
        patientForm.style.visibility = 'visible';
    }
})

const editForm = document.getElementById('edit_patient_div');
const editBtn = document.getElementById('edit_pat');

editBtn.addEventListener("click", (e) => {
    e.preventDefault();
    if (editForm.style.visibility == 'visible') {
        editForm.style.visibility = 'hidden';

    } else {
        editForm.style.visibility = 'visible';
        const searchForm = document.getElementById('search_result');
        const searchBtn = document.getElementById('search_btn');

        searchBtn.addEventListener("click", (e) => {
            e.preventDefault();
            searchForm.style.display = "none";
            //fetchdat();
            searchForm.style.display = "block";

        })
    }
})