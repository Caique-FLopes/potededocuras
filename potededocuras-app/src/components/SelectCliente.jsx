import React, { useEffect, useState } from "react";

function SelectCliente({ onSelectCliente }) {
  const [clientes, setClientes] = useState([]);

  useEffect(() => {
    fetch("http://127.0.0.1/potededocuras/backend/app/routes/cliente.php")
      .then((res) => res.json())
      .then((data) => setClientes(data));
  }, []);

  const handleChange = (e) => {
    const clienteId = parseInt(e.target.value);
    onSelectCliente(clienteId);
  };

  return (
    <select onChange={handleChange}>
      <option value="">Selecione um cliente</option>
      {clientes.map((cliente) => (
        <option key={cliente.id} value={cliente.id}>
          {cliente.nome}
        </option>
      ))}
    </select>
  );
}

export default SelectCliente;
