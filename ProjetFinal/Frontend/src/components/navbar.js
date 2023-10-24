import React from 'react';
import jwtDecode from 'jwt-decode';

function Navbar() {
    const storedToken = localStorage.getItem('token');

    const handleLogout = () => {
        localStorage.removeItem('token');
        // Ajoutez ici toute autre logique de déconnexion que vous pourriez avoir, comme rediriger vers la page de connexion.
    };

    if (!storedToken) {
        return (
            <nav className="bg-gray-800 p-4 flex justify-between items-center">
                <div className="text-white text-2xl font-bold">
              
                </div>
                <ul className="flex space-x-4">
                    <li><a href="/home" className="text-white hover:text-gray-300">Accueil</a></li>
                    <li><a href="/about" className="text-white hover:text-gray-300">À Propos</a></li>
                    <li><a href="/" className="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Connexion</a></li>
                </ul>
            </nav>
        );
    } else {
        const decodedToken = jwtDecode(storedToken);

        if (decodedToken.role === 'admin') {
            return (
                <nav className="bg-gray-800 p-4 flex justify-between items-center">
                    <div className="text-white text-2xl font-bold">
        
                    </div>
                    <ul className="flex space-x-4">
                        <li><a href="/home" className="text-white hover:text-gray-300">Accueil</a></li>
                        <li><a href="/about" className="text-white hover:text-gray-300">À Propos</a></li>
                        <li><a href="/profil" className="text-white hover:text-gray-300">Profil</a></li>
                        <li><a href="http://localhost:3000/Vue/dashboard_vue.php" className="text-white hover:text-gray-300">Pannel admin</a></li>
                        <li><a onClick={handleLogout} href="/" className="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Déconnexion</a></li>
                    </ul>
                </nav>
            );
        } else {
            return (
                <nav className="bg-gray-800 p-4 flex justify-between items-center">
                    <div className="text-white text-2xl font-bold">
                    </div>
                    <ul className="flex space-x-4">
                        <li><a href="/home" className="text-white hover:text-gray-300">Accueil</a></li>
                        <li><a href="/about" className="text-white hover:text-gray-300">À Propos</a></li>
                        <li><a href="/profil" className="text-white hover:text-gray-300">Profil</a></li>
                        <li><a onClick={handleLogout} href="/" className="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Déconnexion</a></li>
                    </ul>
                </nav>
            );
        }
    }
}

export default Navbar;
