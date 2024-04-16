dc := docker-compose -f ./docker-compose.yml

.PHONY:
up:
	$(dc) up -d	

.PHONY:
down:
	$(dc) down

.PHONY:
restart:
	$(dc) restart

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
mysql2:
	$(dc) exec -it mysql bash -c "mysql -u root -proot"  