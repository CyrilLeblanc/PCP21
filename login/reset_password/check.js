function checkForm(){
    let password = document.getElementById('password').value;
    let verif_password = document.getElementById('verif_password').value;

    if (password == verif_password)
    {
        return true;
    }

    document.getElementById("message").removeAttribute("hidden");
    return false;
}