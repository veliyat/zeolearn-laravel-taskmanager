var apiUrl = '/api/emailExists';
var email = document.getElementById('email');

//Request the api for whether the email exists
email.addEventListener('blur', function() {
    var requestUrl = apiUrl + '/' + email.value;

    fetch(requestUrl).then(function(data) {

        return data.json();    

    }).then(function(data) {

        if(data.status === 400) {
            alert(data.msg);
        }

    });

});