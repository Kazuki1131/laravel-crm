# 美容サロンのための顧客管理アプリ『Kartech』
<img width="1672" alt="スクリーンショット 2021-10-03 22 51 10" src="https://user-images.githubusercontent.com/82161767/136414592-e5afc9bd-b5c3-4f01-9f66-e6c3bdb726bc.png">

アプリURL：https://kartech-app.com/

アプリ紹介記事：https://qiita.com/kzk_engineer/items/e00b16bc96d89c78d9bf

## 概要
美容サロン向けに、顧客のさまざまな情報を一元管理できるサービスです。  
顧客の基本情報に加え、お店でとった顧客アンケートの回答情報や来店ごとの接客記録を残せます。  
また、接客記録ではその日提供したサービスを登録することができ、登録された接客記録は自動的に集計され、顧客の平均単価や来店回数が自動的に顧客詳細ページに表示されます。  

## 制作背景
美容サロンを経営している彼女のために制作しました。  
既存で使っていた顧客管理アプリには以下のような課題がありました。

- **顧客管理アプリに毎月数千円の費用が発生してしまっている。**
- **カスタマイズ性がない。例えば、顧客アンケートは店舗によって顧客から集計したい情報が違うため、カスタマイズできた方が良い。**
- **シンプルにUIが使いづらい。もっと簡単に操作できたら嬉しい。**
- **もっと細かく売上状況などを分析できるようにしてほしい。**

## 機能説明
### アンケート作成機能
お客様にアンケートを取りたい場合に便利な機能を用意しました。  
ここでアンケートを登録すると、顧客追加ページに反映され、お客様に情報を入力してもらう際に、一緒にアンケートを取ることができます。  
お客様が回答したアンケートは、顧客詳細ページでいつでも確認することが可能です。
![アンケート](https://user-images.githubusercontent.com/82161767/136556890-6d625652-dc2e-446b-8058-5ad745ceb423.gif)

### 同意書作成機能
サービス提供前に事前に同意を得ておきたい免責事項がある場合に便利なのが、この同意書作成機能です。  
作成した同意書は顧客追加ページに反映されます。  
お客様に情報を入力してもらった後に、免責事項の確認を促し、同意を得ることができます。
![同意書](https://user-images.githubusercontent.com/82161767/136557108-ae68daa8-1e8f-44fb-9c34-5ef91a5bfc6b.gif)


### 顧客の追加機能
お客様に名前や連絡先などの情報を入力いただくことができます。  
また、アンケートや同意書を登録していれば、このページに反映されます。  
安全のために、顧客追加ページはフォーム送信ボタン以外のリンクがないページとして新規タブで開きます。
![顧客追加](https://user-images.githubusercontent.com/82161767/136555126-a5c3b7ce-9342-49f7-9f65-8738147ddfe4.gif)

### 提供メニュー登録機能
お店で提供しているサービスやメニューを登録できます。  
メニューを登録すると、来店記録ページでお客様に提供したメニューを一緒に記録できるようになり、売上の分析に活用できます。
![メニュー追加](https://user-images.githubusercontent.com/82161767/136557207-89785f09-0029-4cac-ae6b-18de9708c840.gif)

### 来店記録（日報）作成機能
接客記録を残すことができます。写真も複数枚投稿できます。  
写真が投稿できると、その日提供したサービスの仕上がりなどを写真として記録できて便利です。  
今後実装予定にはなりますが、来店日と提供サービスを登録することで、期間別や顧客属性別（年代など）に人気メニューや売上の確認、売上の推移の確認などができるようになります。
![来店記録](https://user-images.githubusercontent.com/82161767/136557444-ad169c20-b284-4e42-9240-421f9b71fe24.gif)

### 検索機能
目的の顧客を素早く見つけてもらうために検索機能は必須です。
![検索](https://user-images.githubusercontent.com/82161767/136557614-fef76aa4-d354-4f38-842e-9c5220cfef2f.gif)

## 使用技術とツール
### バックエンド
PHP 7.3.24 / Laravel 6.20.34

### フロントエンド
HTML / CSS / JavaScript / jQuery / Bootstrap

### 開発環境
DockerコンテナにLEMP環境を構築  
Docker 20.10.7 / Docker Compose v2.0.0-beta.6

### 本番環境
EC2にLEMP環境を構築  
mysql 8.0.25  
AWS(EC2, RDS, Route 53, ALB, S3, CloudFront, ACM)

### その他使用ツール
バージョン管理： Git / GitHub  
IDE： Visual Studio Code  
DBクライアント：　Sequel Ace  
ER図, 画面遷移図, インフラ構成図： VScode拡張機能のDraw.io

## 画面遷移図
![画面遷移図 dio](https://user-images.githubusercontent.com/82161767/136579409-6e27fec9-dd7e-4b0a-b8c5-36d089ba8b9b.png)

## ER図
![ER図 dio](https://user-images.githubusercontent.com/82161767/136579434-99683dcd-bfd8-46be-891a-eae09974f9a7.png)

## AWS構成図
![AWS構成図 dio](https://user-images.githubusercontent.com/82161767/136579474-fd929204-3acb-4802-927c-398cea1d4303.png)
