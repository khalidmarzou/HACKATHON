<div  id="signup-modal" style=" backdrop-filter: blur(2px); display:none;"
	class="fixed   items-center  w-full h-full p-3    min-h-screen  sm:flex sm:flex-row  justify-center bg-transparent rounded-md shadow-xl">
	
	<div class="relative flex justify-center self-center  z-10">
	<i id="close-signup" class="text-[#00A3A6]  hover:text-[#378f91] hover:cursor-pointer absolute right-3 top-4 fas fa-times"></i>
		<div class="p-12 bg-white mx-auto rounded-md w-96 ">
			<div class="mb-7">
				<h3 class="font-semibold text-2xl text-gray-800">Sign up</h3>
				<p  class="text-gray-400">Already have an account? <span
						class="text-sm text-[#00A3A6] hover:text-[#378f91] hover:cursor-pointer" id="login-anchor">login </span></p>
			</div>
			<form id="form" action="/controllers/register.php" method="POST" enctype="multipart/form-data" >
			<div class="space-y-6">
				<div class="space-y-6">
					<div class="">
						<input id="nom" name="nom" class=" w-full text-sm text-gray-600  px-4 py-3 bg-gray-200 focus:bg-gray-100 border  border-gray-200 rounded-lg focus:outline-none focus:border-[#48aeb0]" type="text" placeholder="Nom">
				  </div>
				</div>
	
				<div class="space-y-6">
					<div class="">
						<input id="prenom" name="prenom" class=" w-full text-sm text-gray-600  px-4 py-3 bg-gray-200 focus:bg-gray-100 border  border-gray-200 rounded-lg focus:outline-none focus:border-[#48aeb0]" type="text" placeholder="Prenom">
				  </div>
				  </div>
	
				<div class="space-y-6">
					<div class="">
						<input id="email" name="email" class=" w-full text-sm text-gray-600  px-4 py-3 bg-gray-200 focus:bg-gray-100 border  border-gray-200 rounded-lg focus:outline-none focus:border-[#48aeb0]" type="email" placeholder="Email">
				  </div>
				</div>


					<div class="relative" x-data="{ show: true }">
						<input placeholder="Password" id="mdp" name="mdp" :type="show ? 'password' : 'text'" class="text-sm text-gray-600 px-4 py-3 rounded-lg w-full bg-gray-200 focus:bg-gray-100 border border-gray-200 focus:outline-none focus:border-[#48aeb0]">
						<div class="flex items-center absolute inset-y-0 right-0 mr-3  text-sm leading-5">

							<svg @click="show = !show" :class="{'hidden': !show, 'block':show }"
								class="h-4 text-[#00A3A6]" fill="none" xmlns="http://www.w3.org/2000/svg"
								viewbox="0 0 576 512">
								<path fill="currentColor"
									d="M572.52 241.4C518.29 135.59 410.93 64 288 64S57.68 135.64 3.48 241.41a32.35 32.35 0 0 0 0 29.19C57.71 376.41 165.07 448 288 448s230.32-71.64 284.52-177.41a32.35 32.35 0 0 0 0-29.19zM288 400a144 144 0 1 1 144-144 143.93 143.93 0 0 1-144 144zm0-240a95.31 95.31 0 0 0-25.31 3.79 47.85 47.85 0 0 1-66.9 66.9A95.78 95.78 0 1 0 288 160z">
								</path>
							</svg>

							<svg @click="show = !show" :class="{'block': !show, 'hidden':show }"
								class="h-4 text-[#00A3A6]" fill="none" xmlns="http://www.w3.org/2000/svg"
								viewbox="0 0 640 512">
								<path fill="currentColor"
									d="M320 400c-75.85 0-137.25-58.71-142.9-133.11L72.2 185.82c-13.79 17.3-26.48 35.59-36.72 55.59a32.35 32.35 0 0 0 0 29.19C89.71 376.41 197.07 448 320 448c26.91 0 52.87-4 77.89-10.46L346 397.39a144.13 144.13 0 0 1-26 2.61zm313.82 58.1l-110.55-85.44a331.25 331.25 0 0 0 81.25-102.07 32.35 32.35 0 0 0 0-29.19C550.29 135.59 442.93 64 320 64a308.15 308.15 0 0 0-147.32 37.7L45.46 3.37A16 16 0 0 0 23 6.18L3.37 31.45A16 16 0 0 0 6.18 53.9l588.36 454.73a16 16 0 0 0 22.46-2.81l19.64-25.27a16 16 0 0 0-2.82-22.45zm-183.72-142l-39.3-30.38A94.75 94.75 0 0 0 416 256a94.76 94.76 0 0 0-121.31-92.21A47.65 47.65 0 0 1 304 192a46.64 46.64 0 0 1-1.54 10l-73.61-56.89A142.31 142.31 0 0 1 320 112a143.92 143.92 0 0 1 144 144c0 21.63-5.29 41.79-13.9 60.11z">
								</path>
							</svg>

						</div>
					</div>


					<div class="relative" x-data="{ show: true }">
						<input placeholder="Re-password" id="re-mdp" name="re-mdp" :type="show ? 'password' : 'text'" class="text-sm text-gray-600 px-4 py-3 rounded-lg w-full bg-gray-200 focus:bg-gray-100 border border-gray-200 focus:outline-none focus:border-[#48aeb0]">
						<div class="flex items-center absolute inset-y-0 right-0 mr-3  text-sm leading-5">

							<svg @click="show = !show" :class="{'hidden': !show, 'block':show }"
								class="h-4 text-[#00A3A6]" fill="none" xmlns="http://www.w3.org/2000/svg"
								viewbox="0 0 576 512">
								<path fill="currentColor"
									d="M572.52 241.4C518.29 135.59 410.93 64 288 64S57.68 135.64 3.48 241.41a32.35 32.35 0 0 0 0 29.19C57.71 376.41 165.07 448 288 448s230.32-71.64 284.52-177.41a32.35 32.35 0 0 0 0-29.19zM288 400a144 144 0 1 1 144-144 143.93 143.93 0 0 1-144 144zm0-240a95.31 95.31 0 0 0-25.31 3.79 47.85 47.85 0 0 1-66.9 66.9A95.78 95.78 0 1 0 288 160z">
								</path>
							</svg>

							<svg @click="show = !show" :class="{'block': !show, 'hidden':show }"
								class="h-4 text-[#00A3A6]" fill="none" xmlns="http://www.w3.org/2000/svg"
								viewbox="0 0 640 512">
								<path fill="currentColor"
									d="M320 400c-75.85 0-137.25-58.71-142.9-133.11L72.2 185.82c-13.79 17.3-26.48 35.59-36.72 55.59a32.35 32.35 0 0 0 0 29.19C89.71 376.41 197.07 448 320 448c26.91 0 52.87-4 77.89-10.46L346 397.39a144.13 144.13 0 0 1-26 2.61zm313.82 58.1l-110.55-85.44a331.25 331.25 0 0 0 81.25-102.07 32.35 32.35 0 0 0 0-29.19C550.29 135.59 442.93 64 320 64a308.15 308.15 0 0 0-147.32 37.7L45.46 3.37A16 16 0 0 0 23 6.18L3.37 31.45A16 16 0 0 0 6.18 53.9l588.36 454.73a16 16 0 0 0 22.46-2.81l19.64-25.27a16 16 0 0 0-2.82-22.45zm-183.72-142l-39.3-30.38A94.75 94.75 0 0 0 416 256a94.76 94.76 0 0 0-121.31-92.21A47.65 47.65 0 0 1 304 192a46.64 46.64 0 0 1-1.54 10l-73.61-56.89A142.31 142.31 0 0 1 320 112a143.92 143.92 0 0 1 144 144c0 21.63-5.29 41.79-13.9 60.11z">
								</path>
							</svg>

						</div>
					</div>

					<input type="hidden" name="hide">

					<div>
						<button type="submit" id="submit-1" class="w-full flex justify-center bg-[#00A3A6] hover:bg-[#378f91]  text-gray-100 p-3  rounded-lg tracking-wide font-semibold  cursor-pointer transition ease-in duration-500">
							<i class=" text-white text-lg fa-solid fa-arrow-right"></i>
              </button>
					</div>
				</form>

					
				</div>
				
			</div>
		</div>
	
	</div>