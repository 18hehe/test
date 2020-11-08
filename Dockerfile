FROM nginx:alpine
WORKDIR /xampp/htdocs/hyrabil
COPY . .

CMD ["nginx", "index.php"]