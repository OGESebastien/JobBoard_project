import './index.css';
import Home from './pages/home.js';
import Login from './pages/login';
import Registration from './pages/registration.js'
import { BrowserRouter, Routes, Route } from "react-router-dom";
import UserPage from "./pages/userpage";
import Apropos from './pages/apropos';
import Navbar from './components/navbar';
import Profile from './pages/profil';

const App = () => {
  return (
    <BrowserRouter>
    <Navbar />
    <Routes>
      <Route path="/registration" element={<Registration />} />
      <Route path="/home" element={<Home />} />
      <Route path="/" element={<Login />} />
      <Route path="/userpage" element={<UserPage />} />
      <Route path="/about" element={<Apropos />} /> 
      <Route path="/profil" element={<Profile />} />
    </Routes>
  </BrowserRouter>
  );
};

export default App;
