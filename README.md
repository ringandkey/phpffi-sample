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



## ビルド
```sh
> mkdir build
> cd build
> cmake ..
> make
```
