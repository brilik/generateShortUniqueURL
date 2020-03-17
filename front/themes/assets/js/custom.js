document.addEventListener("DOMContentLoaded", load)


function load() {
    initResultGenerateURL('generate')
}


function initResultGenerateURL(formId) {
    let form = document.getElementById(formId) // search form
    let input = form.querySelector('input[type=url]') // search input url

    form.onsubmit = (event) => {
        event.preventDefault() // stop send form
        let data = {
            action: form.querySelector('input[name=action]').value
        }
        if (document.querySelector("input[name=url]")) {
            data.url = document.querySelector("input[name=url]").value
        }
        ajax(form, data) // content send to server and get result
    }
}

function copyToClipboard() {
    var textBox = document.querySelector(".unique-url__result input")
    textBox.select()
    document.execCommand("copy")
    console.log('copied')
}

function createAndShowBlockResult(form, data) {
    let result = document.createElement('div')
    let resultForCopy = document.createElement('input')
    let buttonCopyResultToClipboard = document.createElement('button')
    buttonCopyResultToClipboard.setAttribute('type', 'button')
    buttonCopyResultToClipboard.className = "btn btn-primary btn-block"
    buttonCopyResultToClipboard.onclick = () => (copyToClipboard())
    buttonCopyResultToClipboard.innerText = "Copy"
    resultForCopy.type = "text"
    resultForCopy.classList.add('form-control')
    resultForCopy.setAttribute("value", data)
    resultForCopy.setAttribute('readonly', '')
    result.className = 'unique-url__result'
    result.appendChild(resultForCopy)
    result.appendChild(buttonCopyResultToClipboard)

    if (document.querySelector(".unique-url__result")) {
        document.querySelector(".unique-url__result").remove()
    }

    form.appendChild(result) // paste result
}

function ajax(form, data) {
    let ajaxObject = new XMLHttpRequest()

    ajaxObject.open('POST', 'back/ajax.php') // open connection
    ajaxObject.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded') // install format
    ajaxObject.send('obj=' + JSON.stringify(data)) // send POST-request
    ajaxObject.onreadystatechange = function () {
        if (ajaxObject.readyState === 4 && ajaxObject.status === 200) { // get answer success and ready from processing
            let resObj = JSON.parse(ajaxObject.responseText)
            if (resObj.res === "test") {
                console.log(resObj)
            } else if (resObj.res === "generate") {
                console.log(resObj)
                createAndShowBlockResult(form, resObj.url) // create block result and show
            } else if (resObj.res === "error") {
                alert("ERROR: " + resObj.url)
            } else {
                alert(resObj.url)
                console.warn(resObj)
            }
        } else {
        }
    }
}