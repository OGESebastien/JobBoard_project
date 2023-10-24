import React, { useState, useEffect } from 'react';

function JobAdvertisement(props) {
  const [annonceData, setAnnonceData] = useState({ titre: '', description: '' });

  useEffect(() => {
    console.log(props)
  }, [])


  return (
    <div className="p-6 border-2 border-blue-500 rounded-xl shadow-md mb-4">
      <h2 className="text-xl font-bold mb-2">{props.title}</h2>
      <p className="text-gray-700 text-sm mb-2">{props.description}</p>
      <button
        onClick={(e) => {
          props.chooseOffre({
            id: props.id,
            title: props.title,
            description: props.description,
            lieu: props.lieu,
            salaire: props.salaire,
            tempsDeTravail: props.temps_travail,
            domaine: props.domaine,
            type_poste: props.type_poste,
          });
        }}
        className="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
      >
        Learn More
      </button>
    </div>
  );
}

export default JobAdvertisement;
