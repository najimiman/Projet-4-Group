import './App.css';
import Header from './components/Header';

function App() {
  return (
    <div className="App">
      <header className="App-header">
        <p>
          Tableau de bord d'état d'avancement
        </p>
      </header>
      <div className='container'>
        <Header />
      </div>
    </div>
  );
}

export default App;
