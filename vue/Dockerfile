FROM node:11.12-slim

RUN apt-get -y update \
	&& apt-get install -y git

RUN npm install @vue/cli -g

WORKDIR /vue3cli

RUN apt-get autoremove -y \
    && apt-get autoclean -y \
    && apt-get clean -y \
    && rm -rf /var/lib/apt/lists/*

COPY ./vue3cli/package*.json ./

COPY ./vue3cli .

RUN npm install

RUN npm rebuild node-sass

#RUN npm run build

USER node

CMD ["npm", "run", "serve"]
