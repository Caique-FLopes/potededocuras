import React from 'react';

function ProdutoCard({ produto }) {
  return (
    <div style={estiloCard}>
      <h3>{produto.nome}</h3>
      <p>Preço: R$ {produto.preco}</p>
      <p>{produto.descricao}</p>
    </div>
  );
}

const estiloCard = {
  border: '1px solid #ccc',
  borderRadius: '8px',
  padding: '12px',
  width: '200px',
  boxShadow: '2px 2px 6px rgba(0,0,0,0.1)',
};

export default ProdutoCard;
