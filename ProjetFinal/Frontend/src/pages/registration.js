import React from 'react';
import { Link } from 'react-router-dom';

export default function Registration() {

  const handleSubmit = (e) => {
    e.preventDefault();
    const form = e.target;
    console.log(form)
   const name = form.querySelector('input[name="registerName"]').value;
    const prenom = form.querySelector('input[name="registerPrenom"]').value;
    const email = form.querySelector('input[name="registerEmail"]').value;
    const password = form.querySelector('input[name="registerPassword"]').value;


    fetch('http://localhost:3000/inscription/register', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        'Accept': 'application/json'
      },

      
      body: JSON.stringify({
        registerName: name,
        registerPrenom: prenom,
        registerEmail: email,
        registerPassword: password,
      })
    })
    .then(response => {
      console.log(response);
      return response.json();
    })
    .then(data => {
      if (data.success === true) {
        window.location.replace('/')
      }
      console.log(data);
      alert('Les informations sont incorrects')
    })
    .catch(error => console.error(error));
  };

  return (
    <div className="flex items-center justify-center h-screen flex-col">
      <form
        onSubmit={handleSubmit}
        className="m-4 p-6 max-w-sm bg-white rounded-xl shadow-md flex flex-col"
      >
        <label htmlFor="registerName">Nom :</label>
        <input
          type="text"
          id="registerName"
          name="registerName"
          required
          className="border rounded-md p-2 mb-4"
        />

        <label htmlFor="registerPrenom">Prénom :</label>
        <input
          type="text"
          id="registerPrenom"
          name="registerPrenom"
          required
          className="border rounded-md p-2 mb-4"
        />

        <label htmlFor="registerEmail">Email :</label>
        <input
          type="email"
          id="registerEmail"
          name="registerEmail"
          required
          className="border rounded-md p-2 mb-4"
        />

        <label htmlFor="registerPassword">Mot de passe :</label>
        <input
          type="password"
          id="registerPassword"
          name="registerPassword"
          required
          className="border rounded-md p-2 mb-4"
        />

        <input
          type="submit"
          value="S'inscrire"
          className="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
        />
      </form>
      <p className="text-center mt-4">
        Vous êtes déjà inscrit ?{' '}
        <Link to="/" className="text-blue-500 underline">
          Cliquez ici pour vous connecter
        </Link>
      </p>
    </div>
  );
}
