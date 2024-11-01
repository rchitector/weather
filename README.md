## Starting App Commands

install packages:

```
composer install
```

make ENV file:

```
cp .env.example .env
```

start server:

```
./vendor/bin/sail up -d
```

generate key:

```
./vendor/bin/sail artisan key:generate
```

create tables:

```
./vendor/bin/sail artisan migrate
```

install node nodules:

```
./vendor/bin/sail npm install
```

build assets:

```
./vendor/bin/sail npm run build
```

open app in browser

```
http://0.0.0.0
```

stop server

```
./vendor/bin/sail down
```

## App versions

There are two versions of the application:

- Blade version - uses only Blade templates with minimal JS code.
- Livewire version - uses Livewire components for dynamic data loading.