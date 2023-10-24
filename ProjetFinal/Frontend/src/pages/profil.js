import React, { useState } from 'react';
import jwtDecode from 'jwt-decode';

const Profile = () => {
    const [currentEmail, setCurrentEmail] = useState('');
    const [newEmail, setNewEmail] = useState('');
    const [currentPassword, setCurrentPassword] = useState('');
    const [newPassword, setNewPassword] = useState('');

    const handleUpdate = () => {
        const token = localStorage.getItem('token');
        const decodedToken = jwtDecode(token);
        const userId = decodedToken.user_id;

        const emailToUpdate = newEmail !== '' ? newEmail : currentEmail;
        const passwordToUpdate = newPassword !== '' ? newPassword : currentPassword;

        fetch('http://localhost:3000/modifier-profil.php', {
            method: 'POST',
            headers: {
                'Authorization': `Bearer ${token}`,
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                userId: userId,
                mail: emailToUpdate,
                password: passwordToUpdate
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                alert('Mise à jour réussie!');
            } else {
                alert('Erreur lors de la mise à jour. Veuillez réessayer.');
            }
        })
        .catch(error => {
            console.error("Erreur détaillée:", error);

            alert('Une erreur est survenue. Veuillez réessayer.');
        });
    };

    return (
        <div className="max-w-md mx-auto m-4 p-6 bg-white rounded-md shadow-md">
            <h2 className="text-2xl font-bold mb-4">Modifier le profil</h2>
            <div className="mb-4">
                <label className="block text-gray-700 text-sm font-bold mb-2" htmlFor="currentEmail">
                    Adresse e-mail actuelle
                </label>
                <input
                    className="w-full px-3 py-2 border rounded-md"
                    type="email"
                    id="currentEmail"
                    value={currentEmail}
                    onChange={(e) => setCurrentEmail(e.target.value)}
                />
            </div>
            <div className="mb-4">
                <label className="block text-gray-700 text-sm font-bold mb-2" htmlFor="newEmail">
                    Nouvelle adresse e-mail
                </label>
                <input
                    className="w-full px-3 py-2 border rounded-md"
                    type="email"
                    id="newEmail"
                    value={newEmail}
                    onChange={(e) => setNewEmail(e.target.value)}
                />
            </div>
            <div className="mb-4">
                <label className="block text-gray-700 text-sm font-bold mb-2" htmlFor="currentPassword">
                    Mot de passe actuel
                </label>
                <input
                    className="w-full px-3 py-2 border rounded-md"
                    type="password"
                    id="currentPassword"
                    value={currentPassword}
                    onChange={(e) => setCurrentPassword(e.target.value)}
                />
            </div>
            <div className="mb-4">
                <label className="block text-gray-700 text-sm font-bold mb-2" htmlFor="newPassword">
                    Nouveau mot de passe
                </label>
                <input
                    className="w-full px-3 py-2 border rounded-md"
                    type="password"
                    id="newPassword"
                    value={newPassword}
                    onChange={(e) => setNewPassword(e.target.value)}
                />
            </div>
            <button
                className="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                onClick={handleUpdate}
            >
                Mettre à jour
            </button>
        </div>
    );
};

export default Profile;
