FROM node:22-alpine AS Builder

WORKDIR /app

COPY package.json /app

RUN npm install -d

COPY . /app

CMD ['npm', 'run', 'dev']

expose 5173