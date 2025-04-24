import React, { useEffect, useState } from 'react';
import ProdutoCard from './ProdutoCard';

function ListaProdutos({ clienteId }) {
  const [produtos, setProdutos] = useState([]);

  useEffect(() => {
    if (!clienteId) return;

    fetch(`http://127.0.0.1/potededocuras/backend/app/routes/produto.php?cliente_id=${clienteId}`)
      .then(res => res.json())
      .then(data => setProdutos(data))
      .catch(err => console.error('Erro ao carregar produtos:', err));
  }, [clienteId]); // ← atualiza sempre que mudar o cliente

  return (
    <div>
      <h2>Produtos Disponíveis</h2>
      <div style={estiloGrid}>
        {produtos.map(produto => (
          <ProdutoCard key={produto.id} produto={produto} clienteId={clienteId} />
        ))}
      </div>
    </div>
  );
}

const estiloGrid = {
  display: 'flex',
  flexWrap: 'wrap',
  gap: '16px',
};

export default ListaProdutos;
