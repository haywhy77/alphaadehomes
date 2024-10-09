<?php die();
[globals]

AUTOLOAD=app/inc/|app/controllers/|app/models/
HOME="https://alphaadehomes.co.uk"

PROTOCOL="http://"
UI=app/views/
MAN_UPLOADS=ui/uploads/manifestos/
CAND_UPLOADS=ui/uploads/candidates/
ASSETS = ui
EMAIL = app/email/
MENU = app/menu/
DOWNLOAD = ui/download/
PROPERTY = ui/properties/


SECRET_KEY = "secret_key"
JWT_TTL = 60

DEBUG=3
ESCAPE=0
CACHE = true
SERIALIZER = php
LOGS = app/logs/



db_dns=mysql:host=localhost;port=3306;dbname=
db_name=alphaadehomes
db_user=root
dns=localhost;
db_pass=""



business="Alphaade Homes"
powered="iCode Resources"


TZ = Europe/english
dictionary paths
LOCALES = app/dict/


HIGHLIGHT = false


DEV = true

password_hash_engine = md5
password_md5_salt = jK$N!Lx5hvvvtyhbhc7477r47rf4^T^$T^$$&Y&y37^**%&%&&%JJfvbfrhfbvhvbrhy

timestamps = true

smtp_host="mail.alphaadehomes.co.uk"
smtp_username="no-reply@alphaadehomes.co.uk"
smtp_pw="Alphaade77_"
smtp_port="465"
smtp_user="no-reply@alphaadehomes.co.uk"