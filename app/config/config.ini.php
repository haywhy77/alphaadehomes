<?php die();
[globals]

AUTOLOAD=app/inc/|app/controllers/|app/models/
HOME="https://staging.knowdemwell.org"

PROTOCOL="http://"
UI=app/views/
MAN_UPLOADS=ui/uploads/manifestos/
CAND_UPLOADS=ui/uploads/candidates/
ASSETS = ui
EMAIL = app/email/
DOWNLOAD = ui/download/
PASSPORT = ui/passport/
JOB_URL= "../jobs.php"

SECRET_KEY = "secret_key"
JWT_TTL = 60

DEBUG=3
ESCAPE=0
CACHE = true
SERIALIZER = php
LOGS = app/logs/



db_dns=mysql:host=localhost;port=3306;dbname=
db_name=knowthemwell
db_user=root
dns=localhost;
db_pass="Adedeji27@"



business="KnowDemWell"


TZ = Europe/english
dictionary paths
LOCALES = app/dict/


HIGHLIGHT = false


DEV = true

password_hash_engine = md5
password_md5_salt = jK$N!Lx5hvvvtyhbhc7477r47rf4^T^$T^$$&Y&y37^**%&%&&%JJfvbfrhfbvhvbrhy

timestamps = true

smtp_host="mail.deenservices.com"
smtp_username="no-reply@deenservices.com"
smtp_pw="Deenservices"
smtp_port="465"
smtp_user="no-reply@deenservices.com"