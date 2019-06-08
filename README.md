
### Instructions


Navigate to the build folder and source convenience aliases:

```
cd ./build/dev
. scripts.sh
```

Aliases are as follows, and must be run from `./build/dev`:

```
build - installs vendor libs, creates dev .env
composer - runs composer, use --no-scripts --no-plugins if doing install or update (docker runs as root)
start - starts php dev server, mysql server
stop - shuts down the servers
test - runs phpunit, services must be running for this to work
```

You can access the endpoints at localhost:8080/youtube-search

---

### Notes

Tests may not work if `test` is run straight after `start`. This is because the mysql server takes a while to start and the tests require a database connection.
