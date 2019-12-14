function checkEmpty(){
    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;
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
