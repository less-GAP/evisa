rm -rf ./public/cpn1234
rm -rf ./public/build
docker-compose -f docker-compose.develop.yml exec admin_dev npm run build
mv  ./modules/Admin/public ./public/cpn1234
docker-compose -f docker-compose.develop.yml exec frontend_dev npm run build
cp -r ./modules/Frontend/public/* ./public/
rm -rf  ./public/hot
