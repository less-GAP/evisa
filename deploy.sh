git add .
git commit -am "deploy"
git push
php vendor/bin/envoy run deploy
