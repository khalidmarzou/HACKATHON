let type = document.getElementById("types").value


document.getElementById("admin-switch").addEventListener("click",(event)=>{
    document.querySelector("#emaill").setAttribute('placeholder','matricule');
    document.querySelector("#emaill").setAttribute('name','matricule');
    document.querySelector("#emaill").setAttribute('id','matricule');
    
    document.getElementById("types").value ="admin";

    type= "admin";

    document.getElementById("admin-switch").classList.add('hidden');
    
})

function validate(){
    let pass = true
    // declare
    let emaill = document.getElementById("emaill")
    let mdpl = document.getElementById("mdpl")

    let emailvl = emaill.value
    let mdpvl = mdpl.value

    // reset
    mdpl.style.border = "none"
    emaill.style.border = "none"

    //check

    if(!/^\w{3,40}@\w{3,5}\.\w{3}$/.test(emailvl)){
        pass = false
        emaill.style.border = "2px solid red"
    }

    if(!/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/.test(mdpvl) ){
        pass = false
        mdpl.style.border = "2px solid red"
    }


    return pass 
}


document.getElementById("submit-login").addEventListener("click",(event)=>{
    event.preventDefault();
    let bool;

    switch (type){
        case  "laureat":
         bool = validate();
        break;

        case  "admin":
         bool = validateAdmin();
        break;
    }

    if(bool){
        document.querySelector("form").submit();
    }
})


function validateAdmin(){

    let pass = true
    // declare
    let matricule = document.getElementById("matricule")
    let mdpl = document.getElementById("mdpl")

    let matriculev = matricule.value
    let mdpvl = mdpl.value

    // reset
    mdpl.style.border = "none"
    matricule.style.border = "none"

    //check

    if(!/^\d+$/.test(matriculev)){
        pass = false
        matricule.style.border = "2px solid red"
    }

    if(!/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/.test(mdpvl) ){
        pass = false
        mdpl.style.border = "2px solid red"
    }


    return pass 

}