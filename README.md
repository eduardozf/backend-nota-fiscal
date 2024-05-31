# Desafio de Backend Pleno

Este é um conjunto de projetos desenvolvidos como parte de um desafio para entrevista de Backend Pleno. Cada repositório contém uma parte específica da solução completa para lidar com notas fiscais. Para instruções específicas de execução e detalhes de cada projeto, consulte os respectivos repositórios.

## Backend Nota Fiscal
Este repositório contém a lógica e a infraestrutura para emissão e validação de notas fiscais.

### Instruções de Execução
1. Clone o repositório:
   ```
   git clone https://github.com/eduardozf/backend-nota-fiscal.git
   ```

2. Baixe o arquivo `docker-compose.yml` personalizado [aqui](https://gist.github.com/eduardozf/3d90d2c21b7a31d9a3fdbc18a08864d6#file-docker-compose-yml).

3. Certifique-se de que o Docker Engine esteja em execução.

4. Navegue até a pasta raiz do projeto e execute:
   ```
   docker-compose up
   ```

### Funcionalidades Principais
- Armazenamento utilizando SQLite e ORM Laravel (Eloquent)
- Implementação de fluxo assíncrono para processamento de notas em segundo plano
- Utilização de filas por banco de dados para processamento assíncrono
- Desenvolvimento em PHP com Laravel
- Validação de campos
- Rotas para inserção e pesquisa de notas fiscais
- Condição de recebimento

---

## Microserviço Veracidade de Notas
Este repositório contém um microserviço simples para verificar a veracidade das notas fiscais.

### Requisitos Macro
- Desenvolvimento em Node.js
- Funcionalidade simples (Entrada -> Verificação -> Retorno)

---

## Frontend Consulta de Notas
Este repositório contém o frontend para consulta de veracidade de notas fiscais.

### Requisitos Macro
- Interface simples
- Desenvolvido com Vue.js ou HTML/JavaScript
- Pesquisa de nota fiscal por chave
- Pesquisa realizada após pressionar o botão
- Comunicação com o Backend via HTTP

### Estilização e Experiência do Usuário
- Utilização do Tailwind CSS para estilização eficiente e visualmente agradável
- Destaque da barra de pesquisa com a cor principal da marca
- Implementação de biblioteca de Toast para notificações de pesquisa

---


