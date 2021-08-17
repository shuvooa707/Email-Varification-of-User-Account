function verify() {
    let pin = [...document.querySelectorAll("#pins input")].reduce((acc, e)=>{
        return acc + e.value;
    },'');
    console.log(pin);
    let _token = document.querySelector("input[name='_token']").value;

    let payload = new FormData();
    payload.append("_token", _token);
    payload.append("pin", pin);

    fetch("/profile/verify", {
        method : "post",
        body : payload
    })
    .then( r => r.json())
    .then( r => {
        if ( r.msg == "vsuccess" ) {
            window.location = "/profile";
        } else {

        }
    });
}

//
