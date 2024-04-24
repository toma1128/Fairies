dc := docker compose -f ./docker-compose.yaml

.PHONY:
up:		#コンテナ立ち上げ
	$(dc) up -d	

.PHONY:
down:	#コンテナ削除
	$(dc) down

.PHONY:	#コンテナ停止
stop:
	$(dc) stop

.PHONY:
restart:	#コンテナリスタート
	$(dc) restart

.PHONY:
build:	#コンテナ構築
	docker compose up -d --build

.PHONY:
mysql-root:	#mysqlのrootログインコマンド
	$(dc) exec -it mysql bash -c "mysql -u root -p -D feya"
	