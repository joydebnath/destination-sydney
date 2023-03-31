# Destination Sydney

This is a web application built with Laravel and Nuxt 3, which serves as the backend and frontend respectively.
Requirements

- PHP >= 8.1
- Composer
- Node.js >= 16.x
- NPM

## Installation

1. Clone the repository or download the zip file.
2. Navigate to the root directory of the project and run `npm run api:install` to install PHP dependencies.
3. Rename .`env.example` file to `.env` and update credentials if needed.
4. Set/Update **ATLAS_API_KEY** environment variable in `.env` file.
5. Run `npm run api:key` to generate a unique application key.
6. You don't need to run migration as database is not required.
7. Run `npm run api:up` to start the backend servers.
8. Run `npm run api:down` to shutdown the backend servers
9. Run `npm run web:install` to install frontend dependencies.
10. Run `npm run web:dev` to compile frontend assets.


## Setup

Make sure to install the dependencies:

```bash
# install backend dependencies
npm run api:install

# generate backend unique key
npm run api:key

# install frontend dependencies
npm run web:install
```

## Development Server

Start the web server on `http://localhost:3000` and the api server on `http://localhost:8081`

```bash
# start web server
npm run web:dev

# start api server
npm run api:up

# shutdown api server
npm run api:down
```


