
let manage = document.getElementById("manage");
let exports = document.getElementById("export");




manage.addEventListener("click",manageMove)


function switchStyles(activeSpan, inactiveSpan) {
    
    // Add active styles to the clicked element
       activeSpan.className= ''
       activeSpan.classList.add('flex', 'items-center' ,'p-2' , 'hover:text-[#00A3A6]','hover:cursor-pointer');
        

        // Remove active styles from the previously active span
        inactiveSpan.className= ''
        inactiveSpan.classList.add('flex' , 'items-center' ,  'p-2' , 'bg-[#00A3A6]' ,  'text-white' , 'rounded-r-md', 'hover:cursor-pointer');
        
}



exports.addEventListener("click",exportMove)


function manageMove(){
    document.querySelector('main').innerHTML = `
    <!-- part aside page  -->
        <aside class="bg-gray-300 text-[#15315C] h-[100vh] flex flex-col  w-[20%] items-center  ">
            <a class="h-[35%] w-[80%] flex justify-center items-center">
                <img class="h-[70%] w-70%]" src="/views/asset/materiels/Logo_ofppt-removebg-preview.png" />
            </a>
            <ul class="w-[80%]">
            <li class="mb-4" id="manage">
                        <span id="man-span"  class="flex items-center p-2 bg-[#00A3A6] text-white rounded-r-md hover:cursor-pointer">
                        <i class="fa-regular fa-address-card text-2xl"></i>
                        <span class="ml-4">Manage</span>
</span>
                    </li>
                    <li class="mb-4" id="export">
                        <span id="ex-span"  class="flex items-center p-2  hover:text-[#00A3A6] hover:cursor-pointer">
                        <i class="fa-solid fa-file-export text-2xl"></i>
                        <span class="ml-6 ">Export</span>
</span>
                    </li>
                    
                </ul>
        </aside>
        <!-- part section info -->
        <section  class="bg-[#15315C] h-[100vh] w-[80%]">
        <div class=" p-6">
            <div>
                <div class="flex justify-between items-center mb-8 ">
                    <h1 class="text-3xl font-bold text-white">Dashboard</h1>
                    <div class="relative w-full md:w-auto mb-4 md:mb-0 flex gap-5">
                        <input type="text" id="searchInput" placeholder="Search" class="bg-gray-200 rounded-full pl-10 pr-4 py-2 md:w-auto">
                        <select id="filter" name="filter" class="block w-full ms-4 p-2 border border-gray-300 rounded">
                        <option value="nom">Nom</option>
                        <option value="promotion">Promotion</option>
                        <option value="Filiere">Filiere</option>
                        <option value="Etablissement">Etablissement</option>
                        <option value="Fonction">Fonction</option>
                </select>
                        <span class="absolute left-3 top-2 text-gray-400"><i class="fa-solid fa-magnifying-glass"></i></span>
                        
                    </div>

                    <div class="flex items-center h-[15px]">
                    <img src="asset/materiels/photo.jpg" class="rounded-full ml-4 h-10 " alt="Profile Picture">
                    </div>
                </div>
                </div>
                <div id="stat" class="grid grid-cols-3 gap-4 mb-8">
                    <div class="bg-white p-4 rounded-lg shadow">
                    <div class="text-xl font-bold" id="adminName"></div>
                    <div class="text-gray-400" id="matricule"></div>
                    </div>
                    <div class="bg-white p-4 rounded-lg shadow">
                    <div class="text-xl font-bold" id="countUsers"></div>
                    <div class="text-gray-400">Total Users</div>
                    </div>
                    <div class="bg-white p-4 rounded-lg shadow">
                    <div class="text-xl font-bold" id="countPendingUsers"></div>
                    <div class="text-gray-400">Users en attend</div>
                    </div>
                </div>
                <div  id="main" class="relative bg-white p-4 rounded-lg shadow overflow-auto h-[58vh] ">
                    <table class="w-full">
                    <thead class="">
                    <tr class="text-left border-b-4 border-gray-600">
                        <th class="pb-2">Name</th>
                        <th class="pb-2">Etablissement</th>
                        <th class="pb-2">Filiere</th>
                        <th class="pb-2">Promotion</th>
                        <th class="pb-2">Actions</th>
                    </tr>
                    </thead>
                    <tbody id="userTableBody">
                        
                    </tbody>
                    </table>
                </div>
                </div>
        </section>

    `

    document.getElementById('manage').addEventListener("click",manageMove)

    switchStyles(document.getElementById('ex-span'),document.getElementById('man-span'));

    document.querySelector('#export').addEventListener("click",exportMove)
    importData(true);

    document.getElementById('searchInput').addEventListener("keydown", Search);


    
}




function exportMove(){
    if (document.getElementById('stat')){
        document.getElementById('stat').remove();
    }
   
    document.getElementById('main').classList.replace('h-[58vh]','h-[80vh]')
    document.getElementById('main').classList.add('overflow-hidden')
    document.getElementById('main').innerHTML = `
    <div class="flex justify-center ms-48 mt-36 items-start h-screen w-[70%]">
        <div class= "bg-gray-100 p-6 rounded-lg shadow-md w-full">
            <h2 class="text-2xl font-bold mb-4">Choose Export Type</h2>
            <form id="exportForm" action="/controllers/export.php" method="post">
                <div class="mb-4">
                    <label for="exportType" class="block text-lg font-medium mb-2">Export Type:</label>
                    <select id="exportType" name="exportType" class="block w-full p-2 border border-gray-300 rounded">
                        <option value="csv">CSV</option>
                        <option value="pdf">PDF</option>
                    </select>
                </div>
                <button type="submit"  class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-700">
                    Export
                </button>
            </form>
        </div>
    </div>

    `
    switchStyles(document.getElementById('man-span'),document.getElementById('ex-span'));
  

    document.getElementById('searchInput').addEventListener("keydown", Search);
    


}


function Search(event){
    
    if (event.key === 'Enter' || event.keyCode === 13) {

        let filter = document.getElementById('filter').value;
        changeSkeleton(true);

        

        //add x
        let x = document.createElement("i");
        x.id = "close-main";
        x.classList.add("text-[#00A3A6]" ,  "hover:text-[#378f91]" , "hover:cursor-pointer" ,"absolute" , "right-3", "top-4" ,"fas" ,"fa-times" )
        
        document.getElementById("main").prepend(x)

        x.addEventListener('click',()=>{
            changeSkeleton(true);
            imporData(true);
        })

        // remove stat

        if(document.getElementById("stat")){
        document.getElementById("stat").remove()
        }
        

        document.getElementById('main').classList.remove('h-[58vh]')
        document.getElementById('main').classList.add('h-[80vh]')

        let xhr = new XMLHttpRequest()
        
        xhr.open("POST", "/api/apiSearchLaureat.php", true);
    xhr.setRequestHeader("Content-Type", "application/json");

    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            const data = JSON.parse(xhr.responseText);
            console.log(data)
           
            if(data.length != 0){
            data.forEach(user => {
                document.getElementById('userTableBody').innerHTML += `
                                <tr onclick="" class="border-b">
                                    <td class="py-2  underline "><a  href="?id=${user.Identifiant}" >${user.nom} ${user.Prenom}</a></td>
                                    <td class="py-2">${user.Etablissement}</td>
                                    <td class="py-2">${user.Filiere}</td>
                                    <td class="py-2">${user.promotion}</td>
                                    
                                </tr>

                            `;
                
            });

        }else{
            
            document.getElementById('userTableBody').remove();
            document.getElementById('main').classList.add('flex','items-center' , 'justify-center')
            document.getElementById('main').innerHTML = `<div class=" text-center">
            <h1 class="text-6xl font-bold text-gray-800">404</h1>
            <p class="text-xl text-gray-600 mt-4">Page Not Found</p>
            <p class="text-gray-500 mt-2">Sorry, the page you are looking for does not exist.</p>
        </div>`
        }


            
        }
    };

    

    xhr.send(JSON.stringify({type: filter , val:event.currentTarget.value}));

    
    }
}


function importData(a){
    const xhr = new XMLHttpRequest();

    xhr.open("POST", "/api/apiManage.php", true);
    xhr.setRequestHeader("Content-Type", "application/json");

    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            const data = JSON.parse(xhr.responseText);
            document.getElementById('adminName').textContent = data.adminName;
            document.getElementById('matricule').textContent = 'Matricule : ' + data.adminMatricul;
            document.getElementById('countUsers').textContent = data.countUsers;
            document.getElementById('countPendingUsers').textContent = data.countPendingUsers;
            if(a == true){
            data.prendingUsers.forEach(user => {
                document.getElementById('userTableBody').innerHTML += `
                                <tr class="border-b">
                                    <td class="py-2">${user.nom} ${user.Prenom}</td>
                                    <td class="py-2">${user.Etablissement}</td>
                                    <td class="py-2">${user.Filiere}</td>
                                    <td class="py-2">${user.promotion}</td>
                                    <td class="py-2">
                                        <button class="bg-green-500 text-white py-1 px-2 rounded mr-2" onclick="accepter(event, ${user.Identifiant})">Accepter</button>
                                        <button class="bg-red-500 text-white py-1 px-2 rounded" onclick="rejeter(event, ${user.Identifiant})">Rejeter</button>
                                    </td>
                                </tr>

                            `;
                
            });}
        }
    };

    xhr.send();
}


document.addEventListener('DOMContentLoaded',function(){
    importData(true);
})

function accepter(event, id){
    let currentElement = event.target.parentElement.parentElement;
    const xhr = new XMLHttpRequest();

    xhr.open("POST", "/api/accepter.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhr.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {
            // send email nchaalh
            if(this.responseText == 'success'){
                currentElement.remove();
                importData(false);
            }
        }}
    let data = 'Identifiant=' + encodeURIComponent(id);
    xhr.send(data);
}

function rejeter(event, id){
    let currentElement = event.target.parentElement.parentElement;
    const xhr = new XMLHttpRequest();

    xhr.open("POST", "/api/rejeter.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhr.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {
            // send email nchaalh
            if(this.responseText == 'success'){
                currentElement.remove();
                importData(false);
            }
        }}
    let data = 'Identifiant=' + encodeURIComponent(id);
    xhr.send(data);
}





