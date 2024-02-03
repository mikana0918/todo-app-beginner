# !/bin/sh

#
# generate SSL certification
#

path=$1
servername=$2

mkdir -p ${path}
openssl genrsa -out ${path}/server.key 2048
openssl req -new -key ${path}/server.key -out ${path}/server.csr -subj '/C=JP/ST=Tokyo/L=Tokyo/O=Example Ltd./OU=Web/CN='${servername}
openssl x509 -in ${path}/server.csr -days 3650 -req -signkey ${path}/server.key -out ${path}/server.crt