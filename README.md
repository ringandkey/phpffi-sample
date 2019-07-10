# phpffi-sample

## これは何？
php7.4で入ったffi機能のテストです。  
DungeonTemplateLibraryをphpから呼び出し、HTMLのcanvasに表示しています。

環境はubuntu18.04(wsl2)で確認しました。

## PHP7.4のビルド

実際これが一番厄介かもしれません。 
ffiを有効にしてビルドします。
```sh
> wget https://downloads.php.net/~derick/php-7.4.0alpha3.tar.gz
> tar xvzf php-7.4.0alpha3.tar.gz
> cd php-7.4.0alpha3
> ./configure --with-ffi
> make
> sudo make install
```
自前でビルドした場合、php.iniが作られていないかと思います。  
php.iniのテンプレートはphpをビルドしたディレクトリ(今回はphp-7.4.0alpha3)の中に入っています。  
```sh
> ls | grep php.ini
php.ini-development                                            php.ini-production 
```
どこにコピーするかはphp -iで確認できます。  
```sh
> php -i | grep php.ini
Configuration File (php.ini) Path => /usr/local/lib
Loaded Configuration File => /usr/local/lib/php.ini
```
/usr/local/libに作ればいいとわかるので、コピーします。  
```sh
> sudo cp php.ini-development /usr/local/lib/php.ini
```
コピーしたphp.iniにあるffi.enableのコメントアウトを外し、ffi.enable=trueにしたら完了です。

## プロジェクトのビルド
```sh
> mkdir build
> cd build
> cmake ..
> make
```

## 実行

なんらかのwebサーバを立ててももちろん構わないのですが、簡単にphpのビルトインサーバで試してみます。  
maze.htmlやmaze.phpがドキュメントルートになるように実行しています。  
```sh
> php -S 0.0.0.0:8090
```
ポート番号は適当に指定しました。  
windows側から見る場合、ubuntuに割り当てられたipアドレスを確認しておく必要があります。  
```sh
> ifconfig
```
eth0の項目の"inet AAA.BBB.CCC.DDD"の部分です。  
確認したらブラウザのURL欄に  
AAA.BBB.CCC.DDD/maze.html   
と入力してください。  

![maze](https://github.com/ringandkey/images/raw/master/maze.png)

こんなのが画面に出れば成功です。  
リロードするたびに違う迷路が生成されます。  