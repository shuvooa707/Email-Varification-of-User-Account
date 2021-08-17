function invite() {
    let email = document.querySelector("#email");
    let _token = document.querySelector("input[name='_token']").value;
    let alertSuccess = document.querySelector(".alert-success");
    let alertDanger = document.querySelector(".alert-danger");
    let overlay = document.querySelector(".overlay");


    if ( !email.value.length ) {
        return;
    }

    let payload = new FormData();

    payload.append("_token", _token);
    payload.append("email", email.value);

    overlay.classList.remove("hide");
    fetch("/sendinvitation",{
        method : "POST",
        body : payload
    })
    .then( r => r.json())
    .then( r => {
        if ( r.msg = "success" ) {
            alertSuccess.innerText = `Invitation Sent To ${email.value}`;
            alertSuccess.classList.remove("hide");
            email.value = "";
            overlay.classList.add("hide");
        } else {
            alertDanger.classList.remove("hide");
            email.value = "";
            overlay.classList.add("hide");
        }
    });
}



function showPreview(files) {
    files.nextElementSibling.src = URL.createObjectURL(files.files[0])
    files.nextElementSibling.classList.remove("hide");

}





//
