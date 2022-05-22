FROM node:lts

WORKDIR /var/www/project/frontend
COPY package*.json ./

RUN npm install -g @angular/cli @angular-devkit/build-angular && npm install

EXPOSE 4200

CMD ["npm", "start"]
CMD ng serve --open --host 0.0.0.0 --port 4200 --poll 1
