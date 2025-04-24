import React, { useState } from 'react';

function ProdutoCard({ produto, clienteId }) {
  const [quantidade, setQuantidade] = useState(produto.quantidade || 0);
  const [timer, setTimer] = useState(null);
  console.log(produto)
  const atualizarVenda = (novaQuantidade) => {
    if (!clienteId) return;
    console.log({
        id_cliente: clienteId,
        id_produto: produto.id,
        quantidade: novaQuantidade
      });
    fetch('http://127.0.0.1/potededocuras/backend/app/routes/vendas.php', {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify({
        id_cliente: clienteId,
        id_produto: produto.id,
        quantidade: novaQuantidade
      })
    })
      .then(res => res.json())
      .catch(err => console.error('Erro ao atualizar venda:', err));
  };

  const alterarQuantidade = (valor) => {
    const novaQtd = parseInt(quantidade) + valor;
    setQuantidade(novaQtd);

    if (timer) clearTimeout(timer);
    const novoTimer = setTimeout(() => atualizarVenda(novaQtd), 1500);
    setTimer(novoTimer);
  };

  return (
    <div style={cardStyle} clienteId={clienteId}>
      <img src={produto.imagem_url} alt={produto.nome} style={{ width: '100%', height: 150, objectFit: 'cover' }} />
      <h3>{produto.nome}</h3>
      <p>R$ {Number(produto.valor).toFixed(2)}</p>
      <div style={controlStyle}>
        <button onClick={() => alterarQuantidade(-1)}>-</button>
        <span>{quantidade}</span>
        <button onClick={() => alterarQuantidade(1)}>+</button>
      </div>
    </div>
  );
}

const cardStyle = {
  border: '1px solid #ccc',
  borderRadius: '8px',
  padding: '16px',
  width: '180px',
  textAlign: 'center',
  backgroundColor: '#f9f9f9',
};

const controlStyle = {
  display: 'flex',
  justifyContent: 'center',
  alignItems: 'center',
  gap: '8px',
  marginTop: '8px'
};

export default ProdutoCard;
