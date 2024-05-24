// declaration variable aside


loadSouvenir()

let btnProfile = document.getElementById('btnProfile');
let btnSouvenirs = document.getElementById('btnSouvenirs');
let btnAvis = document.getElementById('btnAvis');
let btnSearch = document.getElementById('btnSearch');

document.addEventListener("DOMContentLoaded",()=>{
   const urlParams = new URLSearchParams(window.location.search);

if (!urlParams.has('status') && urlParams.get('status') != 'inserted') {
   btnProfile.focus()
   document.getElementById('viewProfile').classList.remove("hidden")
}
})

// script views

btnProfile.addEventListener("click",()=>{
   document.getElementById('titreEtat').innerText="Profile"
    document.getElementById('viewProfile').classList.remove("hidden")
   document.getElementById('viewSouvenir').classList.add("hidden")
   document.getElementById('viewAvis').classList.add("hidden")
   document.getElementById('viewSearch').classList.add("hidden")
})
btnSouvenirs.addEventListener("click",()=>{
   document.getElementById('titreEtat').innerText="Souvenirs"
   document.getElementById('viewSouvenir').classList.remove("hidden")
   document.getElementById('viewProfile').classList.add("hidden")
   document.getElementById('viewAvis').classList.add("hidden")
   document.getElementById('viewSearch').classList.add("hidden")
})
btnAvis.addEventListener("click",()=>{
   document.getElementById('titreEtat').innerText="Avis"
   document.getElementById('viewAvis').classList.remove("hidden")
   document.getElementById('viewSouvenir').classList.add("hidden")
   document.getElementById('viewProfile').classList.add("hidden")
   document.getElementById('viewSearch').classList.add("hidden")
})
btnSearch.addEventListener("click",()=>{
   document.getElementById('titreEtat').innerText="Searching"
   document.getElementById('viewSearch').classList.remove("hidden")
   document.getElementById('viewSearch').classList.add("flex")
   document.getElementById('viewAvis').classList.add("hidden")
   document.getElementById('viewSouvenir').classList.add("hidden")
   document.getElementById('viewProfile').classList.add("hidden")
})
// Part js Souvenir
document.getElementById('addSouvenirBtn').addEventListener('click', function(event) {


   const form = document.getElementById('addSouvenirForm');
   form.classList.toggle('hidden');
});

document.getElementById('cancelBtn').addEventListener('click', function() {
   const form = document.getElementById('addSouvenirForm');
   form.classList.add('hidden');
});

document.querySelector('form').addEventListener('submit', function(event) {
   event.preventDefault();

   const fileInput = document.getElementById('souvenirPhoto');
   const gallery = document.getElementById('souvenirGallery');

   const file = fileInput.files[0];

   if (file) {
       const reader = new FileReader();
       reader.onload = function(e) {
           const newDiv = document.createElement('div');
           newDiv.classList.add('relative');

           const newImg = document.createElement('img');
           newImg.src = e.target.result;
           newImg.classList.add('rounded-lg', 'w-full');
           newImg.alt = 'Souvenir';

           newDiv.appendChild(newImg);
           gallery.appendChild(newDiv);
       };
       reader.readAsDataURL(file);
   }

   

   fileInput.value = '';
   descriptionInput.value = '';
   document.getElementById('addSouvenirForm').classList.add('hidden');
});
// Part js profile
document.getElementById('editProfileBtn').addEventListener('click', function() {
   document.getElementById('editProfileForm').classList.remove('hidden');
});
document.getElementById('cancelEditBtn').addEventListener('click', function() {
   document.getElementById('editProfileForm').classList.add('hidden');
});

document.getElementById('editPhotoBtn').addEventListener('click', function() {
   document.getElementById('editPhotoForm').classList.remove('hidden');
});
document.getElementById('cancelPhotoEditBtn').addEventListener('click', function() {
   document.getElementById('editPhotoForm').classList.add('hidden');
});
// Part js Avis
document.getElementById('addReviewBtn').addEventListener('click', function() {
   const form = document.getElementById('addReviewForm');
   form.classList.toggle('hidden');
});

document.getElementById('cancelReviewBtn').addEventListener('click', function() {
   const form = document.getElementById('addReviewForm');
   form.classList.add('hidden');
});

document.querySelector('form').addEventListener('submit', function(event) {
   event.preventDefault();

   const reviewText = document.getElementById('reviewText').value;
   const reviewHistory = document.getElementById('reviewHistory');

   if (reviewText) {
       const newDiv = document.createElement('div');
       newDiv.classList.add('review', 'bg-gray-100', 'p-4', 'rounded-lg', 'mb-4', 'relative');

       const newP = document.createElement('p');
       newP.textContent = reviewText;

       const deleteBtn = document.createElement('button');
       deleteBtn.textContent = 'Supprimer';
       deleteBtn.classList.add('deleteReviewBtn', 'absolute', 'top-2', 'right-2', 'bg-red-500', 'text-white', 'py-1', 'px-2', 'rounded');
       deleteBtn.addEventListener('click', function(event) {
        

       });

       newDiv.appendChild(newP);
       newDiv.appendChild(deleteBtn);
       reviewHistory.appendChild(newDiv);
       document.querySelector("form").submit()

   }

  
   document.getElementById('reviewText').value = '';
   document.getElementById('addReviewForm').classList.add('hidden');
   
});

document.querySelectorAll('.deleteReviewBtn').forEach(function(btn) {
   btn.addEventListener('click', function() {
      const xhr = new XMLHttpRequest();
      xhr.open('POST', '/controllers/delete.avis.php', true);
      xhr.setRequestHeader('Content-Type', 'application/json');

      xhr.onreadystatechange = function(event) {
          if (xhr.readyState === 4 && xhr.status === 200) {
              if(this.responseText == "Ok"){
               const review = btn.parentElement;
               review.remove();

              }
          }
      };

      const data = JSON.stringify({ identifiant : event.currentTarget.value });
      xhr.send(data);
       
   });
});

const urlParams = new URLSearchParams(window.location.search);

if (urlParams.has('status') && urlParams.get('status') === 'inserted') {
   document.getElementById('viewProfile').className = "hidden"
   document.getElementById('viewAvis').className = "hidden"
   document.getElementById('titreEtat').innerText="Souvenirs"
   document.getElementById('viewSouvenir').classList.remove("hidden")
   


    
} 


function supprimerSouvenir(event){
   const xhr = new XMLHttpRequest();
   xhr.open('POST', '/api/deleteSouvenir.api.php', true);

   xhr.onreadystatechange = function() {
       if (xhr.readyState === 4) {
           if (xhr.status === 200) {
               console.log(this.responseText)
               loadSouvenir();

           } else {
               console.error('Error:', xhr.status);
           }
       }
   };

   xhr.onerror = function() {
       console.error('Network Error');
   };

   xhr.send(JSON.stringify({"id":event.currentTarget.id}));
}


function loadSouvenir() {
   const xhr = new XMLHttpRequest();
   xhr.open('POST', '/api/getSouvenir.api.php', true);

   xhr.onreadystatechange = function() {
       if (xhr.readyState === 4) {
           if (xhr.status === 200) {
               let gallery = document.getElementById("souvenirGallery").innerHTML = ''
               JSON.parse(this.responseText).forEach((item)=>{
                  document.getElementById("souvenirGallery").innerHTML += `<div class="relative group">
                  <img  src="data:image/png;base64,${item.content}" class="rounded-lg w-full" alt="Souvenir 1">
                  <i onclick=supprimerSouvenir(event) id="${item.identifiant_souvenir}" class="fa-solid fa-trash-can absolute top-2 right-3 text-2xl text-red-500 opacity-0 group-hover:opacity-100 cursor-pointer"></i>
              </div>`
               })

           } else {
               console.error('Error:', xhr.status);
           }
       }
   };

   xhr.onerror = function() {
       console.error('Network Error');
   };

   xhr.send();
}






