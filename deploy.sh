git add .
git commit -am "$1"
git push
php vendor/bin/envoy run deploy
