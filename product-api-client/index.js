const axios = require('axios');

// Endpoint para obter detalhes da API
axios.get('http://localhost:8000/')
  .then(response => {
    console.log(response.data);
  })
  .catch(error => {
    console.error(error);
  });

// Endpoint para atualizar um produto
axios.put('http://localhost:8000/products/123', { /* dados do produto a serem atualizados */ })
  .then(response => {
    console.log(response.data);
  })
  .catch(error => {
    console.error(error);
  });

// Endpoint para excluir um produto
axios.delete('http://localhost:8000/products/123')
  .then(response => {
    console.log(response.data);
  })
  .catch(error => {
    console.error(error);
  });

// Endpoint para obter um produto específico
axios.get('http://localhost:8000/products/123')
  .then(response => {
    console.log(response.data);
  })
  .catch(error => {
    console.error(error);
  });

// Endpoint para listar todos os produtos
axios.get('http://localhost:8000/products')
  .then(response => {
    console.log(response.data);
  })
  .catch(error => {
    console.error(error);
  });
