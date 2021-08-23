$conposer install コマンドをうつ
$php artisan key:generate
.env.exampleを複製
複製した.env.exampleファイルを.envに名前変更
.envファイルの情報変更

APP_NAME=babytalk
APP_ENV=develop
APP_KEY=xxxxx

DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=xxxx
DB_USERNAME=xxxx
DB_PASSWORD=xxxx

MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=xxxx
MAIL_PASSWORD=xxxx
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=xxxx
MAIL_FROM_NAME=babytalk

AWS_ACCESS_KEY_ID=xxxx
AWS_SECRET_ACCESS_KEY=xxxx
AWS_DEFAULT_REGION=xxxx
AWS_BUCKET=xxxx
AWS_USE_PATH_STYLE_ENDPOINT=false

