<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

A aplicação utiliza docker para ambiente de desenvolvimento com o pacote do Laravel sail 
ao clonar a aplicação execute o comando 

`docker run --rm \ 
    -u "$(id -u):$(id -g)" \
    -v $(pwd):/var/www/html \
    -w /var/www/html \
    laravelsail/php81-composer:latest \
    composer install --ignore-platform-reqs
` para poder instalar as dependencias do composer, após isso é possível subir os container com o comando `./vendor/bin/sail up -d` ( consultar documentação do laravel sail)

De ínicio foi usado o template argon dashboard 2 ( https://demos.creative-tim.com/argon-dashboard/pages/dashboard.html) para os estilos.

O projeto foi desenvolvido apenas para fazer um benchmark do teste avaliativo para vaga de programador usando recursos básicos do framework laravel e teve um total de tempo gasto de 8.5 horas total incluindo testes de feature, modelagem e não foi usado qualquer pacote para o desenvolvimente além dos fornecidos pelo framework.
https://nutritious-felidae-cd4.notion.site/Backend-Teste-para-candidatos-vaga-d07a44070a214f4ca06764b2ca9977fd

O teste pedia:
# Regras

- Prazo de sete dias corridos a partir do envio do teste. Após o término do prazo, pode-se submeter o código **mesmo que incompleto**.
- O sistema deve ser feito utilizando utilizando o framework PHP Laravel (versão 5+) e com o banco de dados MySQL.
- O código deve estar disponível no GitHub, Gitlab ou Bitbucket.
- Deve ter o “Readme” com as instruções.

# Diferenciais

- Implementar a camada de Front-End utilizando a biblioteca javascript Bootstrap e ser responsiva.
- Uso de Vue.js.
- API Rest JSON para todos os CRUDS.

# **Instruções**

Desenvolver um sistema de controle de alunos de uma escola. O sistema deverá conter as seguintes funcionalidades:

## Cadastro de alunos

- Deve ter a listagem com busca, cadastro, edição e exclusão de aluno.
- Campos: ID, nome, telefone, e-mail, data de nascimento e gênero.
- Campos obrigatórios: Nome e E-mail.
- Um aluno pode estar ligado a muitas turmas.

## Cadastro de turmas

- Deve ter a listagem com busca, cadastro, edição e exclusão das turmas.
- Campos: Ano, nível de ensino (fundamental, médio), série e turno.
- Uma turma deve estar ligada a uma escola.

## Cadastro de escolas

- Deve ter a listagem com busca, cadastro, edição e exclusão da escola.
- Campos: ID, nome da escola, endereço.
- Campos obrigatórios: Nome e Endereço.
- Uma escola deve:
    - Ter várias turmas.
    - Exibir o total de alunos.

## **Tabelas necessárias:**

- Alunos
- Turmas
- Escolas
- Alunos de Turmas

Além disso, a implementação deste modelo em um banco de dados relacional deve ser realizada levando em consideração os seguintes requisitos:

- O banco de dados deve ser criado utilizando Migrations do framework Laravel, e também utilizar Seeds e Factorys para popular as informações no banco de dados.
- Implementação das validações necessárias na camada que julgar melhor.

## **Tecnologias a serem utilizadas**

Devem ser utilizadas as seguintes tecnologias:

- HTML
- CSS
- Javascript
- Framework Laravel (PHP)

### **Boa sorte!**

### **Finalizando**

- Suba a sua proposta para o projeto que você criou no GitHub, Gitlab ou Bitbucket. Exemplo: [https://github.com/seuNome](https://github.com/seuNome);
- Envie-nos o link do seu projeto no prazo de até 7 dias. Exemplo: [https://github.com/seuNome/test-BackEnd.git](https://github.com/seuNome/test-frontEnd.git)
- Aguarde o contato.



