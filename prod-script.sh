echo 'debconf debconf/frontend select Noninteractive' | sudo debconf-set-selections

apt update -y && apt upgrade -y 

apt install -y \
    php8.2 \
    php8.2-{fpm,cli,bz2,curl,mbstring,intl,xml,zip} \
    nginx \
    postgresql \
    git


a2enconf php8.2-fpm
systemctl disable apache2


rm -rf /var/lib/apt/lists/*

