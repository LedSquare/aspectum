echo 'debconf debconf/frontend select Noninteractive' | sudo debconf-set-selections

apt update -y && apt upgrade -y 

apt install -y \
    postgresql \
    php8.2 \
    php8.2-{fpm,cli,bz2,curl,mbstring,intl,xml,bcmatch,pgsql} \
    nginx \
    git 

a2enconf php8.2-fpm
systemctl disable apache2

cp ./deploy_local/default /etc/nginx/sites-available/default  
cp ./deploy_local/pg_hba.conf /etc/postgresql/14/main/pg_hba.conf

systemctl restart nginx 
systemctl restart postgresql

rm -rf /var/lib/apt/lists/*

