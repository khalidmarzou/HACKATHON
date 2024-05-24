<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="/css/output.css">
    <link rel="stylesheet" href="/css/slides.css">
    <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/intersect@3.x.x/dist/cdn.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <title>Copains</title>
</head>
<body class="text-white font-body w-[100%] bg-[url('/views/asset/materiels/bg.avif')] bg-no-repeat bg-cover   bg-center ">
    <?php require dirname(__DIR__) . '/views/partials/Login.php'?>
    <?php require dirname(__DIR__) . '/views/partials/Signup.php'?>
    <header class="flex h-[13vh] justify-between  p-4 px-10 items-center">
        <!-- logo -->
        <a class="h-24 w-24" href="#">
            <img src="/views/asset/materiels/Logo_ofppt-removebg-preview.png" class="relative top-3" />
        </a>
        <!-- button headers -->
        <div class="flex gap-5 items-center text-lg font-bold  ">
        <!-- button login & signUp -->
        <div class="flex gap-5">
        <a href="#">
                <button id="signup-btn"
                class="align-middle select-none font-sans font-bold text-center  transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none py-2 px-10 rounded bg-[#00A3A6] hover:bg-[#2d8c8e] text-white shadow-md shadow-gray-900/10 hover:shadow-lg hover:shadow-gray-900/20 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none"
                type="button">
                signUp
                </button>
        </a>
        <a href="#">
                <button id="login-btn"
                class="align-middle select-none font-sans font-bold text-center  transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none py-2 px-10 rounded bg-[#15315C] hover:bg-[#274571] text-white shadow-md shadow-gray-900/10 hover:shadow-lg hover:shadow-gray-900/20 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none"
                type="button">
                LogIn
              </button>
        </a>
        </div>
        </div>
    </header>
 
    <!-- part main -->
    <main class="w-100%">
        <!-- part about -->
        <section class="h-[55vh] mb-10 flex">
            <div class="container flex md:flex-row flex-col items-end justify-between w-full px-8 ">
            <div class="lg:flex-grow md:w-1/2 lg:pr-24 md:pr-16 flex flex-col md:items-start md:text-left mb-16 md:mb-0 items-center text-center w-[50%]">
               <p class="mb-8 leading-relaxed w-[100%] text-justify text-xl"><span class="text-5xl text-[#15315C] font-extrabold">Copains<span class="text-[#0d192b]"> D'avant</span></span>
                    the first network platform dedicated to connecting graduates from OFPPT. Our mission is to create a lasting bond between alumni, fostering lifelong relationships and professional connections.</p>
               <button id="start-btn"
                 class="w-[250px] text-xl font-sans font-bold text-center uppercase transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none py-3 px-6 rounded-md bg-[#00A3A6] text-white shadow-md shadow-gray-900/10 hover:shadow-lg hover:shadow-gray-900/20 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none"
                 type="button">Get started</button>
            </div>
            <div class="w-[50%] h-full flex items-center justify-center">
                <img src="/views/asset/materiels/undraw_Friends_online_re_r7pq.svg" class="w-[70%]" alt="">
            </div>
            </div>
        </section>
        <!-- part details -->
        <section class="h-[30vh] w-[80%] flex justify-center ml-auto mr-auto items-center">
            <!-- details containers -->
            <div class=" w-[80%] h-[70%] bg-gray-100 shadow-lg flex justify-evenly items-center rounded-lg">
                <!-- numbers of users -->
                <div class="flex justify-center items-center h-[80%] w-[30%] text-5xl text-[#15315C]">
              <i class="fa-solid fa-users"></i>
              <p class="ml-3"> 
                <span class="text-5xl font-extrabold">
                    <span class=""><?php echo $countLaureats ?></span>+
                </span>
              </p>
            </div>
            <!-- numbers of sevenir  -->
            <div class="flex justify-center items-center h-[80%] w-[30%] border-l-2 border-l-gray text-5xl text-[#15315C]">
            <i class="fa-solid fa-people-roof"></i>
              <p class="ml-3"><span class="text-5xl font-extrabold">
                    <span class=""><?php echo $countAvis ?></span>+
             </span></p>
            </div>
            <!-- number of avis -->
            <div class="flex justify-center items-center h-[80%] w-[30%] border-l-2 border-l-gray text-5xl text-[#15315C]">
            <i class="fa-solid fa-comments"></i>
              <p class="ml-3"><span class="text-5xl font-extrabold">
                    <span class=""><?php echo $countSouvenirs ?></span>+
             </span></p>
            </div>
        </section>
        <script>

        </script>
        <!-- part partner -->
        <section class="  mt-8">
    <div class="p-6 border text-[#15315C] bg-gray-50 ">
        <h2 class="mb-2 text-3xl font-extrabold tracking-tight leading-tight pb-5 text-center md:text-4xl">You’ll be in good company</h2>
        <div class="grid grid-cols-2 gap-8 bg-gray-50 w-full text-gray-500 sm:gap-12 md:grid-cols-3 lg:grid-cols-6">
            <a href="#" class="flex justify-center items-center">
                <img src="/views/asset/materiels/intellico.png" alt="intellico.img">                                                                                  
            </a>
            <a href="#" class="flex justify-center items-center h-[120px] w-[120px] ">
                <img src="/views/asset/materiels/attijariWafaBank.png" alt="attijaiWafaBank.img">                                                                                  
            </a>
            <a href="#" class="flex justify-center items-center w-[120px] ">
                <img src="/views/asset/materiels/ynov.png" alt="intellico.img">                                                                                  
            </a>
            <a href="#" class="flex justify-center items-center">
                <img src="/views/asset/materiels/mega-removebg-preview.png" alt="intellico.img">                                                                                  
            </a>
            <a href="#" class="flex justify-center items-center">
                <img src="/views/asset/materiels/mondiaPolis-removebg-preview.png" alt="intellico.img">                                                                                  
            </a>
            <a href="#" class="flex justify-center items-center">
                <img src="/views/asset/materiels/involys-removebg-preview.png" alt="intellico.img">                                                                                  
            </a>
        </div>
    </div>
       </section>
       <!-- part Avis -->
       <section id="avis" class="h-[70vh] mt-5 flex flex-col items-center justify-start gap-4 w-[100%]  overflow-x-hidden">
            <h2 class="text-3xl tracking-tight sm:text-4xl p-5">What Our Users Are Saying</h2>
            <div id="slides" class="controls flex justify-center h-[70%] text-[#15315C] font-bold">

        <?php 
        if(count($last10AVis) == 0){
            echo <<<EOT
                    
                            <div class=" active flex justify-between px-6 h-full bg-white items-center" id="slide-none">

                                

                                <div class="h-full w-full flex flex-col justify-center items-center">

                                    <h1 class="text-5xl text-red-600 font-normal ">Pas d'avis</h1>

                                

                                </div>
                            </div>
                EOT;

        }else{
        $count = 0;
            foreach($last10AVis as $avis){
                $count += 1;
                $basedImage =  base64_encode($avis->content);
                echo <<<EOT
                    
                            <div class="slide active flex justify-between px-6 h-full bg-white items-center" id="slide-$count">
                                <div class="w-[200px] h-[200px]">
                                    <img src="data:image/png;base64, $basedImage" class="avatar w-full h-full" alt="User 1 Avatar" />
                                </div>
                                <div class="h-full w-[70%] flex flex-col justify-center">

                                    <h1 class="text-3xl font-normal">{$avis -> nom} {$avis -> prenom}</h1>

                                    <p class="font-light text-center text-xl">" $avis->Avis "</p>

                                </div>
                            </div>
                EOT;
            
                }    }
        ?>
        </div>

                
        </section>
    </main>
        <footer class="w-full text-white p-5 bg-[#15315C]">
        <div class="container mx-auto flex justify-evenly mt-20 p-5">
            <!-- Colonne 2 -->
            <div class="w-[60%] px-4 mb-4">
                <h2 class="text-xl font-bold mb-4">Contact</h2>
                <ul>
                    <li><a href="#" class="block hover:text-gray-300  ">Email : contact@ofppt.ma</a></li>
                    <li><a href="#" class="block hover:text-gray-300">Tel : +212 (05) 22 63 44 44</a></li>
                    <li><a href="#" class="block hover:text-gray-300 text-left">Adresse : 20 270 Route Nouaceur, Sidi Maârouf - Casablanca</a></li>
                </ul>
            </div>

            <!-- Colonne 2 -->
            <div class="w-full sm:w-1/2 md:w-1/4 lg:w-1/6 px-4">
                <h2 class="text-xl font-bold mb-4">Réseaux sociaux</h2>
                <ul>
                    <li class="flex align-items"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                            fill="currentColor" class="bi bi-facebook mt-1" viewBox="0 0 16 16">
                            <path
                                d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951" />
                        </svg><a href="https://www.facebook.com/ofppt.page.officielle/?locale=fr_FR" target="_blank" class="block hover:text-gray-300 ml-2">Facebook</a></li>
                    <li class="flex align-items"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                            fill="currentColor" class="bi bi-twitter-x mt-1" viewBox="0 0 16 16">
                            <path
                                d="M12.6.75h2.454l-5.36 6.142L16 15.25h-4.937l-3.867-5.07-4.425 5.07H.316l5.733-6.57L0 .75h5.063l3.495 4.633L12.601.75Zm-.86 13.028h1.36L4.323 2.145H2.865z" />
                        </svg><a href="#" target="_blank" class="block hover:text-gray-300 ml-2">Twitter</a></li>
                    <li class="flex align-items"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                            fill="currentColor" class="bi bi-instagram mt-1 " viewBox="0 0 16 16">
                            <path
                                d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.9 3.9 0 0 0-1.417.923A3.9 3.9 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.9 3.9 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.9 3.9 0 0 0-.923-1.417A3.9 3.9 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599s.453.546.598.92c.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.5 2.5 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.5 2.5 0 0 1-.92-.598 2.5 2.5 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233s.008-2.388.046-3.231c.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92s.546-.453.92-.598c.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92m-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217m0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334" />
                        </svg><a href="https://www.instagram.com/ofppt.officiel?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==" class="block hover:text-gray-300 ml-2">Instagram</a></li>
                </ul>
            </div>
        </div>
        <hr class="w-4/5 mt-2 mx-auto">
        <div class="text-center m-2">
            <p>&copy; 2024 OFPPT </p>
        </div>
    </footer>

    
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js"></script>
    <script src="/scripts/gatherdataSignUp.js" ></script>
    <script src="/scripts/manageModals.js" ></script>
    <script src="/scripts/validatelogin.js" ></script>
    <script src="/scripts/index.js"></script>
    
</body>
</html>