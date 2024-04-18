dc := docker-compose -f ./docker-compose.yml

.PHONY:
up:
	$(dc) up -d	

.PHONY:
down:
	$(dc) down

.PHONY:
stop:
	$(dc) stop

.PHONY:
restart:
	$(dc) restart

.PHONY:
build:
	docker compose up -d --build

.PHONY:
ps:
	$(dc) ps

.PHONY:
logs:
	$(dc) logs

.PHONY:
logsf:
	$(dc) logs -f

.PHONY:
mysql-root:
	$(dc) exec -it mysql bash -c "mysql -u root -proot"  