To Install

```
git clone git@github.com:aportnov77/tournament.git .
```

install vendors
```
docker run --rm --interactive --tty --volume $PWD:/app composer install
```

Run containers
```
./vendor/bin/sail up -d
```

Apply migrations

```
./vendor/bin/sail artisan migrate
```

Open localhost in browser

http://localhost
