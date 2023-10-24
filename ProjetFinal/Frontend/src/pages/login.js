import React, { useState } from 'react';
import { Link } from 'react-router-dom';
import jwtDecode from 'jwt-decode';


  export default function Login() {
    const [password, setpassword] = useState("");
    const [email, setemail] = useState("");
  
    function submitForm(e) {
      e.preventDefault();
      console.log("Tentative de connexion avec : Email =", email, "et Password =", password);
      
      fetch('http://localhost:3000/connexion/', {
        method: 'POST',
        body: JSON.stringify({
            loginEmail: email,
            loginPassword: password
        })
    })
    .then(response => {
        return response.text(); // Récupérez le texte brut
    })
    .then(text => {
        try {
            return JSON.parse(text); // Essayez de le convertir en JSON
        } catch (error) {
            console.error('Erreur lors de la conversion en JSON:', text);
            throw new Error('Réponse invalide du serveur');
        }
    })
    .then(data => {
      console.log("Données reçues du backend : ", data);
  
      // Vérification si nous avons un token dans les données
      if (data.token) {
          console.log('Token enregistré avec succès:', data.token);
  
          // Stockage du token dans le localStorage
          localStorage.setItem('token', data.token);
  
          // Pour vérifier si le token est correctement stocké
          const storedToken = localStorage.getItem('token'); 
          console.log("Token récupéré depuis le localStorage:", storedToken);
  
          // Vérification du rôle de l'utilisateur à partir du token
          try {
              const decodedToken = jwtDecode(storedToken);
              if (decodedToken.role === 'admin') {
                  console.log('Cet utilisateur est un administrateur.');
              } else {
                  console.log('Cet utilisateur est un utilisateur lambda.');
              }


              console.log('Prénom de l\'utilisateur:', decodedToken.prenom);
              console.log('ID de l\'utilisateur:', decodedToken.user_id);
              console.log('Nom de l\'utilisateur:', decodedToken.nom);
              
          } catch (error) {
              console.error("Erreur lors de la décodage du token:", error);
          }
  
          // Redirection vers la page d'accueil
          window.location.replace('/home');
      } else if (data.error) {
          console.error("Erreur lors de la connexion :", data.error);
      }
  })
  .catch(error => {
      console.error("Erreur lors de la requête de connexion :", error);
      alert('Identifiant ou mot de passe incorrect');
  });
  
    }

  return (
    <div className="flex items-center justify-center h-screen flex-col">
      <form
        onSubmit={submitForm}
        className="m-4 p-6 max-w-sm bg-white rounded-xl shadow-md flex flex-col"
      >
        <label htmlFor="loginEmail">Email :</label>
        <input
          onChange={(e) => setemail(e.target.value)}
          type="email"
          id="loginEmail"
          name="loginEmail"
          required
          className="border rounded-md p-2 mb-4"
        />

        <label htmlFor="loginPassword">Mot de passe :</label>
        <input
          onChange={(e) => setpassword(e.target.value)}
          type="password"
          id="loginPassword"
          name="loginPassword"
          required
          className="border rounded-md p-2 mb-4"
        />

        <input
          type="submit"
          value="Se connecter"
          className="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
        />
      </form>

      <p className="mt-4">
        Vous n'avez pas de compte ?{' '}
        <Link to="/registration" className="text-blue-500 underline">
          Inscrivez-vous ici
        </Link>
      </p>
    </div>
  );
}
