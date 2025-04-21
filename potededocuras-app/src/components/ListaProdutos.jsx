import React, { useEffect, useState } from 'react';
import ProdutoCard from './ProdutoCard';

function ListaProdutos() {
  const [produtos, setProdutos] = useState([]);

  useEffect(() => {
    fetch('http://127.0.0.1/potededocuras/backend/app/routes/produto.php')
      .then(res => res.json())
      .then(data => setProdutos(data))
      .catch(err => console.error('Erro ao carregar produtos:', err));
  }, []);

  return (
    <div>
      <h2>Produtos Disponíveis</h2>
      <div style={estiloGrid}>
        {produtos.map(produto => (
          <ProdutoCard key={produto.id} produto={produto} />
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
