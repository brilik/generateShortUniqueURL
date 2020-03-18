document.addEventListener("DOMContentLoaded", load)


function load() {
    var form = document.querySelector('form');
    var list = document.querySelectorAll('.js-item');

    if(form) {
        form.onsubmit = (event) => {
            event.preventDefault() // stop send form
            var data = {
                action: document.querySelector("input[name=action]").value,
            }
            if (document.querySelector("input[name=login]") != null) {
                data.login = document.querySelector("input[name=login]").value
            }
            if (document.querySelector("input[name=password]") != null) {
                data.password = document.querySelector("input[name=password]").value
            }
            if (document.querySelector("input[name=repassword]") != null) {
                data.repassword = document.querySelector("input[name=repassword]").value
            }
            ajax(form, data) // content send to server and get result
        }
    }

    if (list) {
        list.forEach(function (e, i) {
            let id = e.getAttribute('id');
            if(e.querySelector('.js-edit')) {
                e.querySelector('.js-edit').onclick = function () {
                    alert('edit - ' + id)
                }
            }
            if(e.querySelector('.js-remove')) {
                e.querySelector('.js-remove').onclick = function () {
                    let data = {
                        action: 'remove',
                        id: id
                    }
                    ajax(null, data);
                }
            }
        });
    }

}

function ajax(form, data) {
    let ajaxObject = new XMLHttpRequest()
    ajaxObject.open('POST', 'back/ajax.php') // open connection
    ajaxObject.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded') // install format
    ajaxObject.send('obj=' + JSON.stringify(data)) // send POST-request
    ajaxObject.onreadystatechange = function () {
        if (ajaxObject.readyState === 4 && ajaxObject.status === 200) { // get answer success and ready from processing

            // ERROR start
            console.error(
                ajaxObject.responseText
            );
            // eof ERROR
            let resObj = JSON.parse(ajaxObject.responseText)
            // VALIDATION
            if (resObj.res === 'error') {
                if(resObj.login){
                    alert("Error: " + resObj.login)
                } else if(resObj.exist){
                    alert("Error: " + resObj.exist)
                } else if(resObj.password){
                    alert("Error: " + resObj.password)
                }
                else {
                    alert("See error in console browser")
                    console.error(res)
                }
            } else if (resObj.res === 'singup') {
                document.location.href = 'signin'
            } else if (resObj.res === 'singin') {
                document.location.href = 'admin'
            } else if (resObj.res === 'remove') {
                document.getElementById(resObj.id).remove()
                alert('Remove success ID=' + resObj.id)
            }




            else if (resObj.location) {
                document.location.href = resObj.location
            } else if (resObj.action) {
                console.log(res)
            } else if (resObj.result) {
                alert(resObj.result);
            } else {
                createAndShowBlockResult(form, resObj) // create block result and show
                console.log(resObj)
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