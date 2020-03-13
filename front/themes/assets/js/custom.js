document.addEventListener("DOMContentLoaded", load);


function load() {
    initResultGenerateURL('generate');
}


function initResultGenerateURL(formId){
    let form = document.getElementById(formId) // search form
    let input = form.querySelector('input[type=url]') // search input url

    form.onsubmit = (event) => {
        event.preventDefault(); // stop send form
        let content = input.value // get content
        // content send to server
        // get result
        createAndShowBlockResult(form, 'result from php') // create block result and show
    }
}

function copyToClipboard() {
    var textBox = document.querySelector(".unique-url__result input");
    textBox.select();
    document.execCommand("copy");
    console.log('copied');
}

function createAndShowBlockResult(form, data){
    let result = document.createElement('div')
    let resultForCopy = document.createElement('input')
    let buttonCopyResultToClipboard = document.createElement('button')
    buttonCopyResultToClipboard.className = "btn btn-primary btn-block"
    buttonCopyResultToClipboard.onclick = () => ( copyToClipboard() )
    buttonCopyResultToClipboard.innerText = "Copy"
    resultForCopy.type = "text"
    resultForCopy.classList.add('form-control')
    resultForCopy.setAttribute("value", data)
    resultForCopy.setAttribute('readonly','')
    result.className = 'unique-url__result'
    result.appendChild(resultForCopy)
    result.appendChild(buttonCopyResultToClipboard)

    if( document.querySelector(".unique-url__result") ){
        document.querySelector(".unique-url__result").remove()
    }

    form.appendChild(result) // paste result
}