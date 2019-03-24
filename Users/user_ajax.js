/*
 * Ce fichier contient les fonctions qui vont créer des requêtes AJAX pour
 * gerer les articles : creation, affichage, modification, suppression.
 */

/* 
 * Cette fonction transmet les données du formulaire en AJAX
 * pour la création d'un article, puis elle met à jour l'affichage 
 * de la page avec les données du nouvel article. 
 */


//*! --------- Function for CREATION -------- */

function createUser() {

  // AJAX : 1ere étape : création de l'objet XMLHttpRequest
  var xhr = new XMLHttpRequest();

  // AJAX : 2éme étape : création de la fonction de rappel
  // cette fonction n'est appellée qu'aprés avoir reçu la réponse du serveur
  // XMLHttpRequest =objet qui permet d’envoyer une requête HTTP vers le serveur
  xhr.onreadystatechange = function () {

    // on traite le cas ou la requête à finie d'être initialisée 
    // et que la répose du serveur est valide
    if (xhr.readyState == 4 && xhr.status == 200) {

      // Parent's Child creation
      var child = document.createElement("p");
      var content = document.getElementById("firstname").value + " " + document.getElementById("lastname").value + " " + document.getElementById("email").value;
      child.innerHTML = content;
    


      //Setting up an alert type for troubleshooting:  alert(document.getElementById("comment").value);
      // Parent creation
      var parent = document.getElementById("parentNewUser");
      parent.appendChild(child);

    }
  };

  // AJAX :  3ème étape : création de la requête AJAX et initialisation des paramettres à transmettre 
  xhr.open('POST', 'create_user.php');

  var data = new FormData();
  data.append('first', document.getElementById("firstname").value);
  data.append('last', document.getElementById("lastname").value);
  data.append('address', document.getElementById("email").value);

  // AJAX : 4ème étape : envoi de la requête avec les paramettres
  xhr.send(data);
}



//*! ------ Function for READ --------- */

function readUser(id) {

  // AJAX : 1ere étape : création de l'objet XMLHttpRequest
  var xhr = new XMLHttpRequest();

  // AJAX : 2éme étape : création de la fonction de rappel
  // cette fonction n'est appellée qu'aprés avoir reçu la réponse du serveur
  xhr.onreadystatechange = function () {

    // on traite le cas ou la requête à finie d'être initialisée 
    // et que la répose du serveur est valide
    if (xhr.readyState == 4 && xhr.status == 200) {

      // DOM and JS
      var user = JSON.parse(xhr.responseText);
      document.getElementById("firstname").value = user.firstname;
      document.getElementById("lastname").value = user.lastname;
      document.getElementById("email").value = user.email;
      document.getElementById("id_user").value = user.id;
      // alert(document.getElementById("comment").value);

    }
  };

  // AJAX :  3ème étape : création de la requête AJAX et initialisation des paramettres à transmettre 
  xhr.open('POST', 'read_user.php');

  var data = new FormData();
  data.append('id', id);
  // data.append('lastname', document.getElementById("lastname").value);
  // data.append('email', document.getElementById("email").value);

  // AJAX : 4ème étape : envoi de la requête avecles paramettres
  xhr.send(data);

}


//*! ---- Function for DELETE --------------*/

function deleteUser(id) {

  // AJAX : 1ere étape : création de l'objet XMLHttpRequest
  var xhr = new XMLHttpRequest();

  // AJAX : 2éme étape : création de la fonction de rappel
  // cette fonction n'est appellée qu'aprés avoir reçu la réponse du serveur
  xhr.onreadystatechange = function () {

    // on traite le cas ou la requête à finie d'être initialisée 
    // et que la répose du serveur est valide
    // && = concatenation
    if (xhr.readyState == 4 && xhr.status == 200) {


      var parent = document.getElementById("parentNewUser");
      var noeud_user = document.getElementById("user_"+id);

      parent.removeChild(noeud_user);
    }
  };

  // AJAX :  3ème étape : création de la requête AJAX et initialisation des paramettres à transmettre 
  xhr.open('POST', 'delete_user.php');

  var data = new FormData();
  data.append('id', id);
  // data.append('lastname', document.getElementById("lastname").value);
  // data.append('email', document.getElementById("email").value);

  // AJAX : 4ème étape : envoi de la requête avecles paramettres
  xhr.send(data);
}


// *! -------- UPDATE ------------*/

function updateUser() {

  // AJAX : 1ere étape : création de l'objet XMLHttpRequest
  var xhr = new XMLHttpRequest();

  // AJAX : 2éme étape : création de la fonction de rappel
  // cette fonction n'est appellée qu'aprés avoir reçu la réponse du serveur
  xhr.onreadystatechange = function () {

    // on traite le cas ou la requête à finie d'être initialisée 
    // et que la répose du serveur est valide
    if (xhr.readyState == 4 && xhr.status == 200) {

 
      var user = JSON.parse(xhr.responseText);
      var id = user.id;
      var firstname = user.firstname;
      var lastname = user.lastname;
      var email = user.email;


      var bob = document.getElementById("user_"+id);
      bob.innerHTML = firstname + " " + lastname + " " + email;

      bob.innerHTML = bob.innerHTML+"<input type='button' onclick='createUser>Create(User_"+id+")'>";
      bob.innerHTML += "<button type='button' onclick='createUser>Create</button>(User_"+id+")'>";


      bob.setAttribute("id","user_"+id);

    }
  };

  // AJAX :  3ème étape : création de la requête AJAX et initialisation des paramettres à transmettre 
  xhr.open('POST', 'update_user.php');

  var data = new FormData();
  data.append('id', document.getElementById("id_user").value);
  data.append('lastname', document.getElementById("lastname").value);
  data.append('email', document.getElementById("email").value);
  data.append('firstname', document.getElementById("firstname").value);

  // AJAX : 4ème étape : envoi de la requête avecles paramettres
  xhr.send(data);
}