import { useState, useEffect } from "react";
import Modal from "react-modal";
import jwtDecode from 'jwt-decode';

export default function Details({ offre }) {
  const [modalIsOpen, setModalIsOpen] = useState(false);
  const [formData, setFormData] = useState({
    name: '',
    email: '',
    surname: '',
    message: ''
  });

  const storedToken = localStorage.getItem('token');

  const openModal = () => {
    setModalIsOpen(true);
  };

  const closeModal = () => {
    setModalIsOpen(false);
  };

  const handleInputChange = (e) => {
    const { name, value } = e.target;
    setFormData({ ...formData, [name]: value });
  };

  const handleSubmit = async (e) => {
    e.preventDefault();
    
    let dataToSend = {
      pers_annonce_concerne: formData.email,
      courriel_envoye: formData.message
    };

    await fetch('http://localhost:3000/Vue/createInfoRelative.php', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json'
      },
      body: JSON.stringify(dataToSend)
    });

    setFormData({
      name: '',
      email: '',
      surname: '',
      message: ''
    });

    closeModal();
  };

  useEffect(() => {
    if (storedToken) {
      const decodedToken = jwtDecode(storedToken);
      setFormData(prevFormData => ({
        ...prevFormData,
        name: decodedToken.prenom,
        surname: decodedToken.nom,
        email: decodedToken.email
      }));
    }
  }, [storedToken]);
  
  return (
    <div id="details" className="border-2 border-teal-600 rounded-xl p-6 mt-8">
      {offre.id ? (
        <div>
          <h3 className="text-2xl font-bold mb-4">Titre : {offre.title}</h3>
          <p className="text-lg mb-2">Description : {offre.description}</p>
          <p className="text-lg mb-2">Salaire : {offre.salaire}€/mois</p>
          <p className="text-lg mb-2">Lieu de travail : {offre.lieu}</p>
          <p className="text-lg mb-2">Temps de travail : {offre.tempsDeTravail}h/semaine</p>
          <p className="text-lg mb-2">Domaine : {offre.domaine}</p>
          <p className="text-lg mb-2">Poste demandé : {offre.type_poste}</p>
          <button
            className="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-4"
            onClick={openModal}
          >
            Apply
          </button>
          <Modal
            isOpen={modalIsOpen}
            onRequestClose={closeModal}
            style={{
              content: {
                top: '50%',
                left: '50%',
                right: 'auto',
                bottom: 'auto',
                marginRight: '-50%',
                transform: 'translate(-50%, -50%)'
              }
            }}
          >
            <h2 className="text-2xl mb-4">Apply</h2>
            <form onSubmit={handleSubmit} className="grid grid-cols-1 gap-4 items-center">
              <input
                type="text"
                name="name"
                value={formData.name}
                onChange={handleInputChange}
                placeholder="Name"
                className="p-2 rounded border w-full"
              />
              <div className="grid grid-cols-2 gap-4 w-full">
                <input
                  type="text"
                  name="surname"
                  value={formData.surname}
                  onChange={handleInputChange}
                  placeholder="Surname"
                  className="p-2 rounded border w-full"
                />
                <input
                  type="email"
                  name="email"
                  value={formData.email}
                  onChange={handleInputChange}
                  placeholder="Email"
                  className="p-2 rounded border w-full"
                />
              </div>
              <textarea
                name="message"
                value={formData.message}
                onChange={handleInputChange}
                placeholder="Message"
                className="p-2 rounded border w-full"
                style={{ gridColumn: '1 / span 2' }}
              />
              <div className="flex justify-end">
                <button
                  type="submit"
                  className="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-4 w-1/2 mr-2"
                >
                  Send
                </button>
                <button
                  className="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded mt-4 w-1/2 ml-2"
                  onClick={closeModal}
                >
                  Close
                </button>
              </div>
            </form>
          </Modal>
        </div>
      ) : (
        <div className="text-lg">Veuillez sélectionner une offre d'emploi.</div>
      )}
    </div>
  );
}
