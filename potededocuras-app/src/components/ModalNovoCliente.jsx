import React, { useState } from 'react';

function CadastroClienteModal({ aoCadastrar }) {
  const [aberto, setAberto] = useState(false);
  const [form, setForm] = useState({ nome: '', tel: '' });

  const abrirModal = () => setAberto(true);
  const fecharModal = () => setAberto(false);

  const handleChange = (e) => {
    setForm({ ...form, [e.target.name]: e.target.value });
  };

  const handleSubmit = (e) => {
    e.preventDefault();

    fetch('http://127.0.0.1/potededocuras/backend/app/routes/cliente.php', {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify(form),
    })
      .then(res => res.json())
      .then(data => {
        console.log('Cliente cadastrado:', data);
        fecharModal();
        setForm({ nome: '', tel: '' });
        aoCadastrar(); // <-- chama o recarregamento
      })
      .catch(err => console.error('Erro ao cadastrar:', err));
  };

  return (
    <div>
      <button onClick={abrirModal}>Novo Cliente</button>

      {aberto && (
        <div style={estiloOverlay}>
          <div style={estiloModal}>
            <h2>Cadastrar Cliente</h2>
            <form onSubmit={handleSubmit}>
              <input
                name="nome"
                placeholder="Nome"
                value={form.nome}
                onChange={handleChange}
                required
              />
              <br />
              <input
                name="tel"
                placeholder="Telefone"
                value={form.tel}
                onChange={handleChange}
                required
              />
              <br />
              <button type="submit">Salvar</button>
              <button type="button" onClick={fecharModal}>Cancelar</button>
            </form>
          </div>
        </div>
      )}
    </div>
  );
}

// Estilos básicos inline
const estiloOverlay = {
  position: 'fixed',
  top: 0, left: 0, right: 0, bottom: 0,
  backgroundColor: 'rgba(0,0,0,0.5)',
  display: 'flex',
  justifyContent: 'center',
  alignItems: 'center',
  zIndex: 1000
};

const estiloModal = {
  background: '#fff',
  padding: '2rem',
  borderRadius: '8px',
  boxShadow: '0 2px 10px rgba(0,0,0,0.3)',
};

export default CadastroClienteModal;
