# 📰 Laravel News App

Uma aplicação de gerenciamento de notícias construída com **Laravel 8.0**, projetada para simplificar o cadastro, organização e busca de notícias em diferentes categorias. Com uma interface estilosa, graças ao Tailwind CSS, e desempenho garantido por uma arquitetura moderna, o **Laravel News App** é a solução ideal para quem precisa de um sistema dinâmico e funcional para gerenciar informações.

---

## 📋 **O Problema que Resolvemos**

Organizar notícias em um sistema eficiente e amigável pode ser desafiador para pequenos portais, blogs ou plataformas de conteúdo. Este projeto resolve isso ao oferecer um sistema robusto e fácil de usar para:

-   **Cadastrar** notícias e categorias.
-   **Buscar** notícias por título ou categoria.
-   **Gerenciar** conteúdos com uma interface moderna e intuitiva.

---

## 🛠️ **Stack de Tecnologias**

![Laravel](https://img.shields.io/badge/Laravel-8.0-red?style=for-the-badge&logo=laravel)
![Tailwind CSS](https://img.shields.io/badge/TailwindCSS-3.0-blue?style=for-the-badge&logo=tailwindcss)
![PHP](https://img.shields.io/badge/PHP-7.4-purple?style=for-the-badge&logo=php)
![MySQL](https://img.shields.io/badge/MySQL-5.7-orange?style=for-the-badge&logo=mysql)
![Docker](https://img.shields.io/badge/Docker-20.10-blue?style=for-the-badge&logo=docker)

---

## 🗂️ **Estrutura de Pastas**

```plaintext
├── app/                  # Lógica de negócios e modelos do Laravel
├── bootstrap/            # Arquivo de inicialização da aplicação
├── config/               # Configurações da aplicação
├── database/             # Migrations e Seeds
├── public/               # Arquivos acessíveis publicamente (index.php, assets)
├── resources/
│   ├── views/            # Arquivos Blade para as views
│   ├── js/               # Arquivos Vue.js
│   └── css/              # Estilização com Tailwind CSS
├── routes/               # Rotas da aplicação
├── storage/              # Logs e arquivos temporários
└── docker-compose.yml    # Configuração de containers
```

## 🧰 Guia de Instalação

### Pré-requisitos

Certifique-se de ter o seguinte instalado:

-   Docker e Docker Compose
-   Git
-   Um navegador moderno para testar

### Passo a Passo

1. Clone este repositório:

```bash
git clone https://github.com/seu-usuario/laravel-news-app.git
cd laravel-news-app
```

2. Configure o arquivo `.env`:

```bash
cp .env.example .env

```

3. Suba os containers:

```bash
docker compose up --build
```

4. Instale as dependências:

```bash
docker exec -it app composer install
```

5.

```bash
docker exec -it app php artisan migrate --seed
```

6. Acesse a aplicação no navegador em:
   `http://localhost:8080`

## 🧪 Testando Localmente

-   Cadastro de Notícias: Utilize a interface para criar categorias e associá-las às notícias.
-   Busca de Notícias: Teste a barra de pesquisa usando títulos ou categorias.

## 🧠 Aprendizados e Desafios

### Aprendizados

-   Configuração de um ambiente Docker completo para Laravel, Blade e MySQL.
-   Integração de frontend moderno (Tailwind) com backend robusto (Laravel).
-   Utilização de migrations e seeds para gestão de banco de dados.

### Desafios

-   Configurar permissões de escrita no diretório storage para o Laravel em um ambiente Dockerizado.
-   Resolver problemas de comunicação entre os containers para uma integração suave.

---

### 🚀 Contribua com este projeto

Encontrou um problema ou tem sugestões? Fique à vontade para abrir um issue ou enviar um pull request. Juntos, podemos melhorar ainda mais! 🛠️

