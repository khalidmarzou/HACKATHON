<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="/css/output.css">
    <title>Copains</title>
</head>
<body >
<main  class="flex">
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
        <section   class="bg-[#15315C] h-[100vh] w-[80%]">
        <div class=" p-6">
            <div class="">
                <div class="flex justify-between items-center mb-8">
                    <h1 class="text-3xl font-bold text-white">Dashboard</h1>
                    <div class="relative w-full md:w-auto mb-4 md:mb-0 flex gap-5">
                        <input type="text" id="searchInput" placeholder="Search" class="bg-gray-200 rounded-full pl-10 pr-4 py-2 md:w-auto">
                        <div class="mb-4">
                  
                    
                </div>

                <select id="filter" name="filter" class="block w-full ms-4 p-2 border border-gray-300 rounded">
                        <option value="nom">Nom</option>
                        <option value="promotion">Promotion</option>
                        <option value="Filiere">Filiere</option>
                        <option value="Etablissement">Etablissement</option>
                        <option value="Fonction">Fonction</option>
                </select>
                        <span class="absolute left-3 top-2 text-gray-400"><i class="fa-solid fa-magnifying-glass"></i></span>
                    </div>

                    <a class="flex items-center text-3xl hover:text-[#c56464] cursor-pointer" href="/logout">
                        <i class="fa-solid fa-right-from-bracket" style="color: #ff0000;"></i>
                    </a>
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
                <div id="main" class="relative bg-white p-4 rounded-lg shadow overflow-auto h-[58vh] ">
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
    </main>
    <script src="/scripts/manageAdminMain.js" ></script>
    <script src="/scripts/searchInput.js"></script>
</body>
</html>