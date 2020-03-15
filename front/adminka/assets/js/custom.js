document.addEventListener("DOMContentLoaded", load)


function load() {
    var form = document.querySelector('form');

    form.onsubmit = (event) => {
        event.preventDefault() // stop send form
        var action = document.getElementById('action').value
        var data = {
            action: document.querySelector("#signup input[name=action]").value,
            login: document.querySelector("#signup input[name=login]").value,
            password: document.querySelector("#signup input[name=password]").value
        }
        if(action === 'singup'){
            ajax(form, data)
        }
        // let content = input.value // get content
        // ajax(form, content) // content send to server and get result
    }

}

function ajax(form, data) {
    let ajaxObject = new XMLHttpRequest()
    let send = ''
    if(data.action === 'generate'){
        send = 'action=' + encodeURIComponent(data) + 'url=' + encodeURIComponent(data);
    } else if(data.action === 'signup'){
        send = 'action=' + encodeURIComponent(data) + 'login=' + encodeURIComponent(data.login) + '&password=' + encodeURIComponent(data.password);
    } else if(data.action === 'signin'){
        send = 'action=' + encodeURIComponent(data) + 'login=' + encodeURIComponent(data.login) + '&password=' + encodeURIComponent(data.password) + '&repassword=' + encodeURIComponent(data.password);
    }
    ajaxObject.open('POST', 'back/ajax.php') // open connection
    ajaxObject.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded') // install format
    ajaxObject.send(send) // send POST-request
    ajaxObject.onreadystatechange = function () {
        if (ajaxObject.readyState === 4 && ajaxObject.status === 200) { // get answer success and ready from processing
            let res = JSON.parse(ajaxObject.responseText)
            if (res.location) {
                document.location.href = res.location
            } else if (res.result) {
                alert(res.result);
            } else {
                createAndShowBlockResult(form, res) // create block result and show
                console.log(res)
            }
        } else {
        }
    }
}

function ajaxRegistration(form, data) {
    let ajaxObject = new XMLHttpRequest()

    ajaxObject.open('POST', 'back/ajax.php') // open connection
    ajaxObject.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded') // install format
    ajaxObject.send('login=' + encodeURIComponent(data) + '&password') // send POST-request
    ajaxObject.onreadystatechange = function () {
        if (ajaxObject.readyState === 4 && ajaxObject.status === 200) { // get answer success and ready from processing
            let res = JSON.parse(ajaxObject.responseText)
            if (res.location) {
                document.location.href = res.location
            } else if (res.result) {
                alert(res.result);
            } else {
                createAndShowBlockResult(form, res) // create block result and show
                console.log(res)
            }
        } else {
        }
    }
}