<p align="center">
  <a href="#-tecnologias">Tecnologias</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
  <a href="#-projeto">Projeto</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
  <a href="#-deploy">Deploy</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
  <a href="#-funcionalidades">Funcionalidades</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
  <a href="#-comandos">Comandos</a>
</p>

## 🚀 Tecnologias
Esse projeto foi desenvolvido com as seguintes tecnologias:

- Backend
  - Laravel
- Frontend
  - Vue 3
  - Vue Router

## Bibliotecas
- Backend
  - [firebase/php-jwt](https://github.com/firebase/php-jwt)

- Frontend
  - [Typescript](https://www.typescriptlang.org/)
  - [Zod](https://zod.dev/)
  - [Vue Router](https://router.vuejs.org/guide/)
  - [Vite](https://vitejs.dev/)
  - [Tailwind](https://tailwindcss.com/)
  - [Vue Toastify](https://www.npmjs.com/package/vue3-toastify)
  - Firebase
  - [js-cookie](https://www.npmjs.com/package/js-cookie)

## 💻 Projeto

 Esse projeto foi desenvolvido para o teste de vaga da Jukebox desenvolvedor Pleno, com o objetivo de testar as capacidades técnicas do candidato.
 Para o Backend eu utilizei o *Repository Pattern* para ter inversão das dependencias e modalização dos componentes para testes.
 No Frontend utilizei o Vite com Vue 3 para fazer o roteamento das páginas, se utilizando da componentização e modularização do código, services e principio da responsabilidade única para modular o código e deixar cada arquivo com sua responsabilidade.


## 🚀 Deploy
 Para o deploy, não tenho uma vps com capacidade para hospedar o projeto :(

## 🎆 Funcionalidades

Essas são as funcionaliadades do projeto: 

- Projeto
  - Dockerização com hot reload

- Backend
  - Criação de usuário.
  - Login de usuário.
  - Autenticação com jwt.
  - Listar tarefas.
  - Deletar tarefas.
  - Editar tarefas.
  - Criação de tarefas.

- Fronted
  - Tratamento de erros.
  - Responsividade Completa.
  - Listagem das tarefas.
  - Notificação firebase. ❌
  - Edição das tarefas. ❌
  - Deletar tarefas. ❌
  - Autenticação.

## ⌨ Comandos

Primeiro comece clonando o repositório, **Importante: Se estiver utilizando o wsl2, clone o projeto dentro do sistema de arquivos do linux, pois o wsl2 não consegue transmitir atualizações de arquivos para o linux**

``` https://github.com/Whoj01/jukebox-test.git  ```

**Vamos rodar os containers do projeto**
Na pasta raiz abra o terminal e escreva o comando:

``` sudo docker compose --env-file=./back-jukebox/.env up -d --build ```

**Frontend**

Vamos voltar uma pasta e entrar no projeto Frontend:

``` cd ../front-jukebox ```

Vamos instalar as dependências, Para que o editor não reclame sobre importações:

``` npm i ```

**Container Backend**
Vamos entrar dentro do container do Laravel para rodar os comandos necessários:

``` sudo docker exec -it projects-app-1 sh ```

Em seguida vamos escrever os comandos necessários:

``` php artisan migrate  ```


 ---

<p>Feito com ❤️ por Josué Dias 👋🏽 Entre em contato!</p>

[![Linkedin Badge](https://img.shields.io/badge/-Josuedias-blue?style=flat-square&logo=Linkedin&logoColor=white&link=https://https://www.linkedin.com/in/nycole-xavier-641271202/)](https://www.linkedin.com/in/josué-dias-271458224/)
