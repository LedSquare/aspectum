echo 'debconf debconf/frontend select Noninteractive' | sudo debconf-set-selections

apt update -y && apt upgrade -y 

apt install -y \
    php8.2 \
    php8.2-{fpm,cli,bz2,curl,mbstring,intl,xml} \
    nginx 

a2enconf php8.2-fpm

rm -rf /var/lib/apt/lists/*

