function validateDate(){
    var dd = today.getDate();
    var mm = today.getMonth()+1; //Jan is 0
    var yyyy = today.getFullYear();
    var today = new Date(yyyy+'-'+mm+"-"+dd);

    var bday = document.getElementById("bday");

    if (bday < today){
        return false;
    }
}
