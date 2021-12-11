
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