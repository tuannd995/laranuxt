FROM node:13.7.0-alpine

RUN apk update && apk add --no-cache --virtual .gyp python make g++ && \
    apk add yarn

COPY ./docker-entrypoint.sh /
RUN chmod +x /docker-entrypoint.sh

RUN mkdir /app
WORKDIR /app

