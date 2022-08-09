import { Routes, Route } from "react-router-dom";
import Home from "./components/Home";
import ShrimpPrice from "./components/ShrimpPrice";
import ShrimpPriceDetail from './components/ShrimpPriceDetail';
import './styles/App.css';

const App = () => {
  return (
    <Routes>
      <Route path='/' element={<Home />}/>
      <Route path='/harga-udang' element={<ShrimpPrice />}/>
      <Route path='/harga-udang/:id' element={<ShrimpPriceDetail />}/>
    </Routes>
  );
}

export default App;
