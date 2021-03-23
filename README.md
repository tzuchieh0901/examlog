## 驗證方式

* Clone 專案

	```
	$ git clone https://github.com/tzuchieh0901/examlog
	```

* 修改 `composer.json` 中的 `[GitHub帳號]` 成為各位的帳號 例如：`tzuchieh0901`

* 執行以下指令

	```
	$ composer install
	$ php run.php
	```

* 正確結果

	```
	info
	notice
	notice
	critical
	info
	error
	notice
	```

* 想法
	```
	寫個套件，能讓composer下載
	再來建立 LoggerInterface介面 和Logger類別使程式可以順利執行run.php
	```
