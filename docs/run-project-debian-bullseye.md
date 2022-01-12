# Instalando PHP

### How to Install PHP 8.1 on Debian 11 Bullseye
Conteúdo original: https://www.linuxcapable.com/how-to-install-php-8-1-on-debian-11-bullseye/

#### Update Operating System
Update your Debian operating system to make sure all existing packages are up to date:

```sudo apt update && sudo apt upgrade -y```

#### Install Required Dependencies

```sudo apt-get install ca-certificates apt-transport-https software-properties-common lsb-release -y```

#### Import Ondřej Surý PHP Repository | Import & Install GPG key:

```sudo wget -O /etc/apt/trusted.gpg.d/php.gpg https://packages.sury.org/php/apt.gpg```

#### Import & Install Repository:

```sudo sh -c 'echo "deb https://packages.sury.org/php/ $(lsb_release -sc) main" > /etc/apt/sources.list.d/php.list'```

Next, refresh your APT repository list to reflect the changes.

```sudo apt update```

After running the update command, you may notice some packages require updating, make sure to do this before continuing.

```sudo apt ugprade```

#### Install PHP 8.1 with Nginx Option

```sudo apt install php8.1 php8.1-fpm php8.1-cli -y```

Once installed, the PHP-FPM service is automatically started, and you can check the status to make sure it’s running ok.

```sudo systemctl status php8.1-fpm```

You will need to edit your Nginx server block and add the example below for Nginx to process the PHP files.
Below, example for all server blocks that process PHP files that need the location ~ .php$ added.

```
server {
# … some other code
location ~ .php$ {
include snippets/fastcgi-php.conf;
fastcgi_pass unix:/run/php/php8.1-fpm.sock;
}
```

Test Nginx to make sure you have no errors with the adjustments made with the code above; enter the following.

```sudo nginx -t```

Example output:

```
nginx: the configuration file /etc/nginx/nginx.conf syntax is ok
nginx: configuration file /etc/nginx/nginx.conf test is successful
```

Restart Nginx service for installation to be complete.

```sudo systemctl restart nginx```

As a reminder to see what version of PHP 8.1 is installed on your system, use the following command.

```php --version```

Example output:

```
PHP 8.1.1 (cli) (built: Dec 20 2021 21:35:13) (NTS)
Copyright (c) The PHP Group
Zend Engine v4.1.1, Copyright (c) Zend Technologies
    with Zend OPcache v8.1.1, Copyright (c), by Zend Technologies
```
