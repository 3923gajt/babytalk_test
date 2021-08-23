# babytalk

## 概要

育児中の過ごし方やご飯の量など、情報共有できるコミュニティサイト

## 使い方

アカウント作成し、新規投稿や各ユーザーの投稿が閲覧できます。
気になった投稿にはコメントもできます。

## 開発環境

laravel 8.0
MySQL
AWS(S3)

## clone後に実行すること

cloneしたら下記を実行

○ライブラリのインストール
→下記のコマンドを実行
　　$conposer install 

○.env.exampleを複製
複製した.env.exampleファイルを.envに名前変更
→下記のコマンドを実行
　　　$php artisan key:generate

○.envファイルの情報変更
→下記の環境変数を設定

APP_NAME=babytalk
APP_ENV=develop
APP_KEY=xxxxx

DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=xxxx
DB_USERNAME=xxxx
DB_PASSWORD=xxxx

↓Gmailで各自設定
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=xxxx
MAIL_PASSWORD=xxxx
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=xxxx
MAIL_FROM_NAME=babytalk

↓AWSの登録が必要　使用量に応じて課金される（S3）
AWS_ACCESS_KEY_ID=xxxx
AWS_SECRET_ACCESS_KEY=xxxx
AWS_DEFAULT_REGION=xxxx
AWS_BUCKET=xxxx
AWS_USE_PATH_STYLE_ENDPOINT=false

○migrationファイルからテーブル作成
→下記のコマンドを実行
 $php artisan maigrate　

○seederで初期値を登録（prefectureテーブル・babyage_scopeテーブル）
→下記のコマンドを実行
$php artisan db:seed

○サーバーの起動
→下記のコマンドを実行(MAMPを使用してもよい)
$php artisan serve
