<?php
 session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="/css/output.css">
    <title>Copains</title>
</head>
<body>
    <main class="flex">
        <!-- part aside page  -->
        <aside class="bg-gray-200 text-[#15315C] h-[100vh] flex flex-col w-[20%] items-center">
            <a class="h-[35%] w-[80%] flex justify-center items-center">
                <img class="h-[70%] w-70%]" src="/views/asset/materiels/Logo_ofppt-removebg-preview.png" />
            </a>
            <ul class="w-[80%]">
                <li class="mb-4">
                    <a href="#" id="btnProfile" class=" flex items-center p-2 rounded-r-md hover:text-[#00A3A6] focus:text-white focus:bg-[#00A3A6] w-[80%] ">
                        <i class="fa-regular fa-user text-2xl"></i>
                        <span class="ml-6">Profil</span>
                    </a>
                </li>
                <li class="mb-4">
                    <a href="#" id="btnSouvenirs" class="flex items-center rounded-r-md p-2 hover:text-[#00A3A6] focus:text-white focus:bg-[#00A3A6] w-[80%]  ">
                        <i class="fa-solid fa-people-roof text-2xl"></i>
                        <span class="ml-4">Souvenirs</span>
                    </a>
                </li>
                <li class="mb-4">
                    <a href="#" id="btnAvis" class="flex items-center p-2 rounded-r-md hover:text-[#00A3A6] focus:text-white focus:bg-[#00A3A6] w-[80%] ">
                        <i class="fa-solid fa-comments text-2xl "></i>
                        <span class="ml-4">Avis</span>
                    </a>
                </li>
                <li class="mb-4">
                    <a href="#" id="btnSearch" class="flex items-center p-2 rounded-r-md hover:text-[#00A3A6] focus:text-white focus:bg-[#00A3A6] w-[80%] ">
                        <i class="fa-solid fa-magnifying-glass text-2xl"></i>
                        <span class="ml-4">Search</span>
                    </a>
                </li>
            </ul>
        </aside>
        <!-- part section info -->
        <section class="bg-[#15315C] h-[100vh] w-[80%] overflow-auto bg-[url('/views/asset/materiels/bg.avif')] bg-no-repeat bg-cover   bg-center ">
            <div class="p-6 ">
                <div class="flex justify-between items-center mb-8">
                    <h1 id="titreEtat" class="text-3xl w-[160px] font-bold text-white">Souvenirs</h1>
                    <a class="flex items-center text-3xl hover:text-[#c56464] cursor-pointer" href="/logout">
                        <i class="fa-solid fa-right-from-bracket" style="color: #ff0000;"></i>
                    </a>
                </div>
                <?php require dirname(__DIR__).'/api/avis.api.php'?>
                <!-- part avis -->
                <div id="viewAvis" class="bg-white p-6 rounded-lg shadow mb-8 hidden ">
                    <h2 class="text-2xl font-bold mb-4">Historique des Avis</h2>
                    <button id="addReviewBtn" class="bg-blue-500 text-white py-2 px-4 rounded mb-4">Ajouter un Avis</button>
                    <div id="addReviewForm" class="hidden mb-8">
                        <form method="POST" action="/controllers/create.avis.php">
                            <div class="mb-4">
                                <label for="reviewText" class="block text-gray-700">Votre avis :</label>
                                <textarea id="reviewText" class="bg-gray-200 rounded-lg pl-4 py-2 w-full" rows="4" name="avis" ></textarea>
                            </div>
                            <div class="flex justify-evenly w-[30%]">
                                <button type="submit" id="btn-sub" class="bg-green-500 text-white py-2 px-4 rounded">Enregistrer</button>
                                <button type="button" id="cancelReviewBtn" class="bg-red-500 text-white py-2 px-4 rounded">Annuler</button>
                            </div>
                        </form>
                    </div>
                    <div id="reviewHistory">
                        <?php foreach($test as $t):?>
                        <div class='review bg-gray-100 p-4 rounded-lg mb-4 relative'>
                            <p><?php echo $t->Avis; ?></p>
                            <button value="<?php echo $t->identifiant_avis; ?>" class='deleteReviewBtn absolute top-2 right-2 mt-1 bg-red-500 text-white py-1 px-2 rounded'>Supprimer</button>
                        </div>
                        <?php endforeach ;?>
                    </div>
                </div>
                <!-- part Profile -->
                <div id="viewProfile" class="hidden">
                <div class="bg-white p-6 rounded-lg shadow mb-8">
                    <h2 class="text-2xl font-bold mb-4">Photo de Profil</h2>
                    <div class="flex items-center">
                        <?php

                            $db -> query('SELECT content FROM profile_pic WHERE Identifiant = :id');
                            $db -> bind(':id', $_SESSION['userInfo'] -> Identifiant);
                            $db -> execute();
                            $contentImage = $db -> single();
                            $image =  base64_encode($contentImage ->content);

                        ?>
                        <img id="profileImage" src="data:image/png;base64, <?= $image ?>" class="rounded-full h-20 w-20 mr-4" alt="Profile Picture">
                        <button id="editPhotoBtn" class="bg-blue-500 text-white py-2 px-4 rounded">Modifier Photo</button>
                    </div>
                </div>
                <div id="editPhotoForm" class="bg-white p-6 rounded-lg shadow mb-8 hidden">
                    <h2 class="text-2xl font-bold mb-4">Modifier Photo de Profil</h2>
                    <form id="form1" action="/api/updateImage.api.php" method="POST" enctype="multipart/form-data">
                        <div class="mb-4">
                            <label for="profilePhoto" class="block text-gray-700">Choisir une nouvelle photo :</label>
                            <input type="file" accept="image/*" name="updatePhoto" id="profilePhoto" class="bg-gray-200 rounded pl-4 py-2 w-full">
                        </div>
                        <button type="submit" class="bg-green-500 text-white py-2 px-4 rounded">Enregistrer</button>
                        <button type="button" id="cancelPhotoEditBtn" class="bg-red-500 text-white py-2 px-4 rounded ml-2">Annuler</button>
                    </form>
                </div>  
                <?php  require dirname(__DIR__) . "/controllers/getTel.php"; ?>
                <div class="bg-white p-6 rounded-lg shadow">
                    <h2 class="text-2xl font-bold mb-4">Informations Personnelles</h2>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-gray-700">Nom :</label>
                            <input type="text" id="profileName" class="bg-gray-200 rounded pl-4 py-2 w-full" value="<?= $_SESSION['userInfo'] -> nom . ' ' . $_SESSION['userInfo'] -> Prenom?>" disabled>
                        </div>
                        <div>
                            <label class="block text-gray-700">Email :</label>
                            <input type="email" id="profileEmail" class="bg-gray-200 rounded pl-4 py-2 w-full" value="<?= $_SESSION['userInfo'] -> email ?>" disabled>
                        </div>
                        <div>
                            <label class="block text-gray-700">Téléphone :</label>
                            <input type="text" id="profilePhone" class="bg-gray-200 rounded pl-4 py-2 w-full" value="<?= $Tela->Tel?>" disabled>
                        </div>
                    </div>
                    <button id="editProfileBtn" class="bg-blue-500 text-white py-2 px-4 rounded mt-4">Modifier Profil</button>
                </div>
                <div id="editProfileForm" class="bg-white p-6 rounded-lg shadow mt-8 hidden">
                    <h2 class="text-2xl font-bold mb-4">Modifier les Informations</h2>
                    <form  id="formpf"   action="/controllers/editTel.php" method="POST">
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label for="name" class="block text-gray-700">Nom :</label>
                                <input type="text" id="name" class="bg-gray-200 rounded pl-4 py-2 w-full" value="<?= $_SESSION['userInfo'] -> nom . ' ' . $_SESSION['userInfo'] -> Prenom?>" disabled>
                            </div>
                            <div>
                                <label for="email" class="block text-gray-700">Email :</label>
                                <input type="email" id="email" class="bg-gray-200 rounded pl-4 py-2 w-full" value="<?= $_SESSION['userInfo'] -> email ?>" disabled>
                            </div>
                            <div>
                              
                                <label for="phone" class="block text-gray-700">Téléphone :</label>
                                <input type="text" id="phone" name="phones" class="bg-gray-200 rounded pl-4 py-2 w-full" value="<?= $Tela->Tel?>">
                            </div>
                        </div>
                        <button type="submit" id="submitEditBtn" class="bg-green-500 text-white py-2 px-4 rounded mt-4">Enregistrer</button>
                        <button type="button" id="cancelEditBtn" class="bg-red-500 text-white py-2 px-4 rounded mt-4 ml-2">Annuler</button>
                    </form>
                </div>
                </div>
                <!-- part souvenir -->
                <div id="viewSouvenir" class="bg-white p-6 rounded-lg shadow mb-8 hidden ">
                    <h2 class="text-2xl font-bold mb-4">Galerie de Souvenirs</h2>
                    <button id="addSouvenirBtn" class="bg-blue-500 text-white py-2 px-4 rounded mb-4">Ajouter un Souvenir</button>
                    <div id="addSouvenirForm" class="hidden mb-8">
                        <form action="/controllers/create.souvenir.php" enctype="multipart/form-data" method="POST">
                            <div class="mb-4">
                                <label for="souvenirPhoto" class="block text-gray-700">Choisir une photo :</label>
                                <input type="file" id="souvenirPhoto" name="souvenirPhoto" accept="image/*" class="bg-gray-200 rounded-full pl-4 py-2 w-full">
                            </div>
                            <div class="flex justify-evenly w-[30%]">
                                <button type="submit" class="bg-green-500 text-white py-2 px-4 rounded">Enregistrer</button>
                                <button type="button" id="cancelBtn" class="bg-red-500 text-white py-2 px-4 rounded">Annuler</button>
                            </div>
                        </form>
                    </div>
                    <div id="souvenirGallery" class="grid grid-cols-3 gap-4">
                        
                        </div>
                </div>
                <!-- part Search -->
                <div id="viewSearch" class="bg-white p-6 rounded-lg shadow h-[80vh] hidden flex-col gap-5 overflow-auto">
                            
                        
                    <form class="max-w-md mx-auto flex gap-5 w-[100%] justify-between items-center">   
                        <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only ">Search</label>
                        <div class="relative w-[70%]">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                                </svg>
                            </div>
                            <input type="search" id="default-search" class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 " placeholder="Search By Name, promotion..." required />
                            <button type="submit" id="search" class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 ">Search</button>
                        </div>
                        <select name="filter" id="filter" class="p-1 px-3 outline-none">
                            <option value="laureat">Laureat</option>
                            <option value="souvenir">Souvenir</option>
                        </select>
                    </form>

                    <div id="view" class=" flex flex-wrap gap-5"></div>


                </div>
            </div>
        </section>
    </main>
    <script src=/scripts/user.script.js ></script>
    <script>

        document.addEventListener('DOMContentLoaded',function(){
            let data = JSON.stringify({
            type : 'all'
            })
            let xhr = new XMLHttpRequest();
            xhr.open("POST", '/api/apiSearchLaureat.php', true);
            xhr.onload = function () {
                if (xhr.status === 200) {
                    loadView(JSON.parse(xhr.responseText));
                }
            };
            xhr.onerror = function () {
                console.error("Error occurred while sending the request.");
            };
            xhr.send(data);
        })
        
        function loadView(arr) {
            const currentType = document.getElementById('filter').value;
            if (currentType === 'laureat') {
                const tableContainer = document.getElementById('tableContainer');
                const table = document.createElement('table');
                table.classList.add('min-w-full', 'divide-y', 'divide-gray-200');

                
                const thead = document.createElement('thead');
                thead.classList.add('bg-gray-50');
                const headerRow = document.createElement('tr');
                const headers = ['Nom', 'Prenom', 'Filiere','Promotion', 'Email'];
                headers.forEach(headerText => {
                    const th = document.createElement('th');
                    th.classList.add('px-6', 'py-3', 'text-left', 'text-xs', 'font-medium', 'text-gray-500', 'uppercase', 'tracking-wider');
                    th.textContent = headerText;
                    headerRow.appendChild(th);
                });
                thead.appendChild(headerRow);
                table.appendChild(thead);

                
                const tbody = document.createElement('tbody');
                tbody.classList.add('bg-white', 'divide-y', 'divide-gray-200');
                arr.forEach(data => {
                    const row = document.createElement('tr');
                    row.innerHTML += `
                                        <td>${data.nom}</td><td>${data.Prenom}</td><td>${data.Filiere}</td><td>${data.promotion}</td><td>${data.email}</td>
                                        `
                    row.classList.add('px-6', 'py-4', 'whitespace-nowrap');
                    tbody.appendChild(row);
                });
                table.appendChild(tbody);

                document.getElementById('view').innerHTML = '';
                document.getElementById('view').appendChild(table);
            }else{
                document.getElementById('view').innerHTML = '';
                arr.forEach(item => {
                    
                    document.getElementById('view').innerHTML += `
                    <img src="data:image/png;base64, ${item.content}" class="avatar w-[20%]" title="${item.nom + ' ' + item.Prenom}" />
                                                                `
                })
                
            }
        }


        document.getElementById('search').onclick =function(event){
            event.preventDefault();
            if (document.getElementById('filter').value == 'laureat'){
                let data = JSON.stringify({
                type : 'nom',
                val : document.getElementById('default-search').value
                })
                let xhr = new XMLHttpRequest();
                xhr.open("POST", '/api/apiSearchLaureat.php', true);
                xhr.onload = function () {
                    if (xhr.status === 200) {
                        loadView(JSON.parse(xhr.responseText));
                    }
                };
                xhr.onerror = function () {
                    console.error("Error occurred while sending the request.");
                };
                xhr.send(data);
        }else{
                let data = JSON.stringify({
                    type : 'souvenir',
                    val : document.getElementById('default-search').value
                    })
                    let xhr = new XMLHttpRequest();
                    xhr.open("POST", '/api/apiSearchLaureat2.php', true);
                    xhr.onload = function () {
                        if (xhr.status === 200) {
                            loadView(JSON.parse(xhr.responseText));

                        }
                    };
                    xhr.onerror = function () {
                        console.error("Error occurred while sending the request.");
                    };
                    xhr.send(data);
        }
    }
    </script>
</body>
</html>
