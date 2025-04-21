import React, { useEffect, useState } from 'react';
import ModalNovoCliente from './ModalNovoCliente';

function SelectClientes() {
  const [clientes, setClientes] = useState([]);
  const [selected, setSelected] = useState('');

  const carregarClientes = () => {
    fetch('http://127.0.0.1/potededocuras/backend/app/routes/cliente.php')
      .then(res => res.json())
      .then(data => setClientes(data))
      .catch(err => console.error('Erro ao carregar clientes:', err));
  };

  useEffect(() => {
    carregarClientes();
  }, []);

  return (
    <div>
      <h2>Selecione um Cliente</h2>
      <div id='boxSelectCliente'>
        <select value={selected} onChange={(e) => setSelected(e.target.value)}>
          {clientes.map(cliente => (
            <option key={cliente.id} value={cliente.id}>
              {cliente.nome}
            </option>
          ))}
        </select>
      </div>
      <ModalNovoCliente aoCadastrar={carregarClientes} />
    </div>
  );
}

export default SelectClientes;
