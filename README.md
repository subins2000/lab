```
pack build demos-subins-app --path . --builder heroku/buildpacks:20
``` 

Run:
```
docker run demos-subins-app -e CLEARDB_DATABASE_URL='mysql://ramanan:mocha@localhost:3306/demos?reconnect=true'
```