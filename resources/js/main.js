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