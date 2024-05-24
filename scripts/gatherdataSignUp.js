function validate1() {
    return new Promise((resolve) => {
        let pass = true;

        let nom = document.getElementById("nom");
        let prenom = document.getElementById("prenom");
        let email = document.getElementById("email");
        let mdp = document.getElementById("mdp");
        let remdp = document.getElementById("re-mdp");

        let nomv = nom.value;
        let prenomv = prenom.value;
        let emailv = email.value;
        let mdpv = mdp.value;
        let remdpv = remdp.value;

        // reset
        nom.style.border = "none";
        prenom.style.border = "none";
        email.style.border = "none";
        mdp.style.border = "none";
        remdp.style.border = "none";

        if (!/^[a-zA-Z]{3,30}$/.test(nomv)) {
            pass = false;
            nom.style.border = "2px solid red";
        }

        if (!/^[a-zA-Z]{3,30}$/.test(prenomv)) {
            pass = false;
            prenom.style.border = "2px solid red";
        }

        if (!/^\w{3,40}@\w{3,5}\.\w{3}$/.test(emailv)) {
            pass = false;
            email.style.border = "2px solid red";
        }

        let xhtr = new XMLHttpRequest();
        xhtr.open('POST', '/api/verifyEmailApi.php', true);
        xhtr.setRequestHeader('Content-Type', 'application/json');

        xhtr.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                if (this.responseText == "true") {
                    pass = false;
                    email.style.border = "2px solid red";
                }

                if (!/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/.test(mdpv) || mdpv !== remdpv) {
                    pass = false;
                    mdp.style.border = "2px solid red";
                    remdp.style.border = "2px solid red";
                }

                resolve(pass);
            }
        };

        xhtr.send(JSON.stringify({ 'email': emailv }));
    });
}



function validate2(){
    let pass = true;

    let promotion = document.getElementById("promotion")
    let filiere = document.getElementById("filiere")
    let etablissement = document.getElementById("etablissement")
    let Tel = document.getElementById("Tel")
   

    let promotionv = promotion.value
    let filierev = filiere.value
    let etablissementv = etablissement.value
    let Telv = Tel.value

    //reset
    promotion.style.border = "none"
    filiere.style.border = "none"
    etablissement.style.border = "none"
    Tel.style.border = "none"

    if(!/^\d{4}$/.test(promotionv)){
        pass = false
        promotion.style.border = "2px solid red"
    }

    if(filierev =="none"){
        pass = false
        filiere.style.border = "2px solid red"
    }
    if(etablissementv =="none"){
        pass = false
        etablissement.style.border = "2px solid red"
    }
    if(!/^0(6|7)\d{8}$/.test(Telv)){
        pass = false
        Tel.style.border = "2px solid red"
    }

    return pass 

}




document.getElementById("submit-1").addEventListener("click", async(event)=>{
    event.preventDefault();
    let bool = await validate1();

    console.log(bool)

    if(bool){
        nom.setAttribute('type', 'hidden');
        prenom.setAttribute('type', 'hidden');
        email.setAttribute('type', 'hidden');
        document.querySelector("[name='hide']").value = document.getElementById("mdp").value;
        mdp.parentElement.remove();
        document.getElementById("re-mdp").parentElement.remove();

       console.log(document.getElementById("submit-1"))
       document.getElementById("submit-1").remove()

        


        document.getElementById("form").innerHTML += `

            <div class="space-y-6 mb-5">
            <div class="">
                    <select id="promotion" name="promotion" class=" text-black block w-sm text-sm font-medium transition duration-75 border border-gray-800 rounded px-3 shadow-sm h-9 focus:border-blue-600 focus:ring-1 focus:ring-inset focus:ring-blue-600 bg-none" >
                    <option value="none">Choose Promotion </option>
                </select>            
            </div>
            </div>

            <input type="hidden" name="hide-promotion" id ="hide-promotion">

            <div class="space-y-6 mb-5">
            <div class="">
                    <select id="filiere" name="filiere" class="text-black block w-sm text-sm font-medium transition duration-75 border border-gray-800 rounded px-3 shadow-sm h-9 focus:border-blue-600 focus:ring-1 focus:ring-inset focus:ring-blue-600 bg-none" >
                    <option value="none">Choose Filiere </option>
                </select>            
            </div>
            </div>

            <input type="hidden" name="hide-filiere" id ="hide-filiere">

            <div class="space-y-6 mb-5" >
            <div class="">
                    <select id="etablissement" name="etablissement" class="text-black block w-auto text-sm font-medium transition duration-75 border border-gray-800 rounded shadow-sm h-9 focus:border-blue-600 focus:ring-1 focus:ring-inset focus:ring-blue-600 bg-none" >
                    <option value="none">Choose Etablissement </option>
                </select>            
            </div>
            </div>

            <input type="hidden" name="hide-etablissement" id ="hide-etablissement">

            <div class="space-y-6 mb-5">
            <div class="">
                <input id="Tel" name="Tel" class=" w-full text-sm text-gray-600  px-4 py-3 bg-gray-200 focus:bg-gray-100 border  border-gray-200 rounded focus:outline-none focus:border-[#48aeb0]" type="tel" placeholder="Tel">
            </div>
            </div>



            <div>
				<button type="submit" id="submit-2" class="w-full flex justify-center bg-[#00A3A6] hover:bg-[#378f91]  text-gray-100 p-3  rounded tracking-wide font-semibold  cursor-pointer transition ease-in duration-500">
							<i class=" text-white text-lg fa-solid fa-arrow-right"></i>
              </button>
				</div>

        
        `

        //load select

        loadSelect();

        // add event

        document.getElementById("submit-2").addEventListener("click",(event)=>{
            event.preventDefault();
            let bool = validate2();


            if(bool){
            event.preventDefault();
            document.getElementById("hide-promotion").value = document.getElementById("promotion").value;
            document.getElementById("hide-filiere").value =  document.getElementById("filiere").value;
            document.getElementById("hide-etablissement").value = document.getElementById("etablissement").value;

            document.getElementById("promotion").remove();
            document.getElementById("filiere").remove();
            document.getElementById("etablissement").remove()
            document.getElementById("Tel").setAttribute('type', 'hidden');
            event.currentTarget.classList.add("hidden");
            



            
             document.getElementById("form").innerHTML += `
             <div class="space-y-6">
             <div class="space-y-6">
                 <div class="">
                     <input id="fonction" name="fonction" class=" w-full text-sm text-gray-600  px-4 py-3 bg-gray-200 focus:bg-gray-100 border  border-gray-200 rounded-lg focus:outline-none focus:border-[#48aeb0]" type="text" placeholder="Fonction">
               </div>
             </div>

             <div class="space-y-6">
             <div class="space-y-6">
                 <div class="">
                     <input id="employeur" name="employeur" class=" w-full text-sm text-gray-600  px-4 py-3 bg-gray-200 focus:bg-gray-100 border  border-gray-200 rounded-lg focus:outline-none focus:border-[#48aeb0]" type="text" placeholder="Employeur">
               </div>
             </div>

             <div class="space-y-6">
             <div class="space-y-6">
                 <div class="">
                     <input id="photo" name="photo" class=" w-full text-sm text-gray-600  px-4 py-3 bg-gray-200 focus:bg-gray-100 border  border-gray-200 rounded-lg focus:outline-none focus:border-[#48aeb0]" type="file"   accept="image/*">
               </div>
             </div>

             <div>
             <button type="submit" id="submit-3" class="w-full flex justify-center bg-[#00A3A6] hover:bg-[#378f91]  text-gray-100 p-3  rounded-lg tracking-wide font-semibold  cursor-pointer transition ease-in duration-500">
                         Submit
           </button>
             </div>
        `
         
         

        // event send data
                    document.getElementById("submit-3").addEventListener("click",(event)=>{
                        event.preventDefault()
                        document.getElementById("form").submit();
                    })



    
            }
        

        })
        
    }


})

let date = new Date()
let currentYear = date.getFullYear()


function loadSelect(){
    //load promotion
    for(let i=currentYear ;i>1973; i-- ){
        document.getElementById("promotion").innerHTML += `  <option value="${i}">${i} </option>`
    }

    // ajax

    let xhr = new XMLHttpRequest();

    xhr.open('GET', '/api/publicApi.php', true);

    xhr.onreadystatechange = function(){
        if( this.readyState == 4 && this.status == 200){
            let filiere = JSON.parse(this.responseText).filiere
            let efp = JSON.parse(this.responseText).EFP
            

             // load filiere
             filiere.forEach(element => {
                document.getElementById("filiere").innerHTML += `<option value="${element.CodeF}">${element.LibelleF} </option>`;

                
             });



            // load 
            efp.forEach(element => {
                
                document.getElementById("etablissement").innerHTML += `<option value="${element.CodeE}">${element.LibelleE} </option>`;
            });





        }

    }


    xhr.send();

   
}
