setInterval(function () {
    $("#refresh").load(location.href + " #refresh>*", "");
}, 1000); // seconds to wait, miliseconds
setInterval(function () {
    $("#refresh2").load(location.href + " #refresh2>*", "");
}, 1000); // seconds to wait, miliseconds

function valueChange() {
    document.getElementById('myInput').value = 'yes';
}
function valueChange2() {
    document.getElementById('myInput').value = 'no';
}

function reload() {
    location.reload();
}

function goToRegistration() {
    document.getElementById('registrationForm').style.display = 'block';
    document.getElementById('login').style.display = 'none';
}

//------------------------------------------------------------------------------


//$('#tinder2').load(function () {
//    $('#loading').hide();
//});

//document.getElementById('tinder2').ready = hideLoading();
//document.getElementById('tinder').ready = hideLoading();
//function hideLoading(){
//    document.getElementById("loading").style.display = "none";
//}



// danger!! unable to go back ;)
//        history.pushState(null, null, window.location.href);
//
//        window.addEventListener('popstate', function (event) {
//            // The popstate event is fired each time when the current history entry changes.
//            history.pushState(null, null, window.location.href);
//        }, false);


// clear chrome history
//        if (window.history.replaceState) {
//            window.history.replaceState(null, null, window.location.href);
//        }