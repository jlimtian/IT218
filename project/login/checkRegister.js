function checkEmpty(){
    var fname = document.getElementById("fname").value; 
    var lname = document.getElementById("lname").value; 
    var college = document.getElementById("college").value;
    var major = document.getElementById("major").value;
    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;
    if (fname == 0) {
        alert("Enter first name.");
        return false;
    }
    if (lname == 0) {
        alert("Enter last name.");
        return false;
    }
    if (college == 0) {
        alert("Enter college");
        return false;
    }
    if (major == 0) {
        alert("Enter major.");
        return false;
    }
    if (email == 0) {
            alert("Enter email.");
            return false;
    }
    if (password == 0) {
            alert("Enter password");
            return false;
    } 
    return true;
}
