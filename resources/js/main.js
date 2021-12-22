/*Menu show and hidden (si, copypasteado porque lo hice yo 😊 )*/

const navMenu = document.getElementById('nav-menu'),
    navToggle = document.getElementById('nav-toggle'),
    navClose = document.getElementById('nav-close')

/*Menu show*/
if (navToggle) {
    navToggle.addEventListener('click', () =>{
        navMenu.classList.add('show-menu')
    })
}

/*Menu hidden*/
if (navClose) {
    navClose.addEventListener('click', () =>{
        navMenu.classList.remove('show-menu')
    })
}

/*-----*/

/*Animaciones main*/

const logBt = document.getElementById('login__button'),
        backBt = document.getElementById('back__button'),
        backDiv = document.getElementById('back-div'),
        main = document.getElementById('main')

if (logBt) {
    logBt.addEventListener('click', () =>{
        logBt.classList.add('slide-out-right')
        main.classList.add('fade-out')

    })
}

if (backBt) {
    backBt.addEventListener('click', () =>{
        backBt.classList.add('slide-out-right')
    })
}

/*-----*/

/*Login animation buttons*/

const logButton = document.getElementById('conectarse'),
        formContainer = document.getElementById('form-container'),
        forgotPwd = document.getElementById('forgot-pwd'),
        createAcc = document.getElementById('create-acc')

if (logButton) {
    logButton.addEventListener('click', () =>{
        formContainer.classList.add('scale-out-center')
    })
}

if (forgotPwd) {
    forgotPwd.addEventListener('click', () =>{
        formContainer.classList.add('rotate-out-ver')
    })
}

if (createAcc) {
    createAcc.addEventListener('click', () =>{
        formContainer.classList.add('rotate-out-center')
    })
}

/*-----*/

/*Aside show and hidden*/

const menuAside = document.getElementById('main-aside'),
        showAside = document.getElementById('show-aside'),
        hideAside = document.getElementById('hide-aside')
    
if (hideAside) {
    hideAside.addEventListener('click', () =>{
        menuAside.classList.add('hide__aside')
        hideAside.classList.add('hide__eye')
    })
}

if (showAside) {
    showAside.addEventListener('click', () =>{
        menuAside.classList.remove('hide__aside')
        hideAside.classList.remove('hide__eye')
    })
}

/*-----*/

/*Login, Create, Recover*/

const logRec = document.getElementById('login-test rec'),
        logCre = document.getElementById('login-test cre'),
        recoverLog = document.getElementById('recover-test log'),
        createLog = document.getElementById('create-test log'),
        createRec = document.getElementById('create-test rec'),
        flipCardInner = document.getElementById('flip-card-inner'),
        loginFlip = document.getElementById('flip-login'),
        recoverFlip = document.getElementById('flip-recover'),
        createFlip = document.getElementById('flip-create')
/*Si, quedó así de feo porque no se me ocurrió otra forma :)*/

if (logRec || logCre) {
    logRec.addEventListener('click', () =>{/*Dentro de recuperar, al hacer click sobre login*/
        flipCardInner.classList.remove('flip-animation')
        setTimeout(function(){ /*El delay es estetico*/
            createFlip.classList.remove('flip-hide')
        },500)
        formContainer.style.height = "650px"
    })
    logCre.addEventListener('click', () =>{/*Dentro de crear, al hacer click sobre login*/
        flipCardInner.classList.remove('flip-animation')
        setTimeout(function(){ /*Delay estetico*/
            recoverFlip.classList.remove('flip-hide')
        },500)
        formContainer.style.height = "650px"
    })
}

if (recoverLog) {
    recoverLog.addEventListener('click', () =>{/*Dentro de login, al hacer click sobre recuperar*/
        flipCardInner.classList.add('flip-animation')
        createFlip.classList.add('flip-hide')
        formContainer.style.height = "500px"
    })
}

if (createLog) {
    createLog.addEventListener('click', () =>{/*Dentro de login, al hacer click sobre crear*/
        flipCardInner.classList.add('flip-animation')
        recoverFlip.classList.add('flip-hide')
        formContainer.style.height = "1000px"
    })
}

/*------*/
