import React, { useEffect, useState } from 'react';
import '../index.css'
import Navbar from '../components/navbar.js'
import JobAdvertisement from '../components/jobadvertisement.js';
import SearchBar from '../components/searchbar.js';
import Details from '../components/details';
import '../App.css';

function Home() {
  const monToken = localStorage.getItem('token'); // Retrieving the token from local storage
  console.log("test", monToken);

  const [offre, setOffre] = useState({});
  const [listeOffres, setListeOffres] = useState([]);
  const [domaineRecherche, setDomaineRecherche] = useState('');

  useEffect(() => {
    fetch('http://localhost:3000/annonce/annonces-json', {
      method: 'GET',
      headers: {
        'Content-Type': 'application/json',
      }
    })
      .then(response => response.json())
      .then(data => {
        console.log(data);
        if (data.length > 0) {
          setListeOffres(data)
        }
      })
      .catch(error => console.error(error));
  }, []);

  useEffect(() => {
    console.log(offre)
  }, [offre]);

  // Filtrer les annonces en fonction du domaine de recherche
  const annoncesFiltrees = listeOffres.filter(job => {
    if (domaineRecherche.trim() === '') {
      return true; // Si le domaine de recherche est vide, afficher toutes les annonces
    } else {
      return job.domaine.toLowerCase() === domaineRecherche.toLowerCase();
    }
  });

  return (
    <div style={{ backgroundColor: '#f3f4f6', minHeight: '100vh' }}>
      <SearchBar onSearch={(domaine) => setDomaineRecherche(domaine)} />
      <main>
        <div id="listAdds">
          {annoncesFiltrees.map(job => (
            <JobAdvertisement
              key={job.id}
              id={job.id_annonces}
              title={job.titre}
              description={job.description}
              salaire={job.salaire}
              lieu={job.lieu}
              temps_travail={job.temps_travail}
              domaine={job.domaine}
              type_poste={job.type_poste}
              chooseOffre={setOffre}
            />
          ))}
        </div>

        <Details offre={offre} />
      </main>
    </div>
  );
}

export default Home;
