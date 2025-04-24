import { useState } from "react";
import ListaProdutos from "./components/ListaProdutos";
import SelectUsers from "./components/SelectCliente";

function App() {
  const [clienteSelecionado, setClienteSelecionado] = useState(null);

  return (
    <main>
      <SelectUsers onSelectCliente={setClienteSelecionado} />
      {clienteSelecionado && <ListaProdutos clienteId={clienteSelecionado} />}
    </main>
  );
}

export default App;
