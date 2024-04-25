
const login1 = document.querySelector("#loginBtn1");
const dialog1 = document.querySelector("#loginDialog_employee");
const closeBtn1 = document.querySelector("#closeBtn1"); 
const login2 = document.querySelector("#loginBtn2");
const dialog2 = document.querySelector("#loginDialog_customer");
const closeBtn2 = document.querySelector("#closeBtn2"); 

login1.addEventListener('click', (event) => {
    dialog1.showModal();
    event.preventDefault();
});

login2.addEventListener('click', (event) => {
    dialog2.showModal();
    event.preventDefault();
});

closeBtn1.addEventListener('click', (event) => { 
    dialog1.close();
});

closeBtn2.addEventListener('click', (event) => { 
    dialog2.close();
});
