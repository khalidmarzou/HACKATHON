let currentModal = "none";
let signupModal = document.getElementById("signup-modal");
let loginModal = document.getElementById("login-modal");


document.getElementById("signup-btn").addEventListener("click",()=>{
    currentModal = "signup";
    loadModal()
})



document.getElementById("login-btn").addEventListener("click",()=>{
    currentModal = "login";
    loadModal()
})
document.getElementById("start-btn").addEventListener("click",()=>{
    currentModal = "signup";
    loadModal()
})

document.getElementById("close-signup").addEventListener("click",()=>{
  signupModal.style.display = 'none';
})
document.getElementById("close-login").addEventListener("click",()=>{
  loginModal.style.display = 'none';
})






function loadModal(){
    //reset
    signupModal.style.display = "none";
    loginModal.style.display = "none";
    

    switch(currentModal){
        case  "signup":
            signupModal.style.display = "flex";
           
            document.getElementById("login-anchor").addEventListener("click",()=>{
                currentModal = "login";
                loadModal()
            })
            
            
            break;
        case  "login":
            loginModal.style.display = "flex";
            document.getElementById("signup-anchor").addEventListener("click",()=>{
                currentModal = "signup";
                loadModal()
            })
            break;
    }

}


// Get the query string from the URL
const queryString = window.location.search;

// Create a new URLSearchParams object from the query string
const searchParams = new URLSearchParams(queryString);

// Get a specific parameter value by its name
const paramValue = searchParams.get('status');

if(paramValue == 'err'){
    currentModal = "login";
    loadModal()

    document.getElementById("emaill").style.border = "2px red solid";
    document.getElementById("mdpl").style.border = "2px red solid";
    document.getElementById("msg-err").style.display = "block";
}
