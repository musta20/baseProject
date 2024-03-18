.RECIPEPREFIX +=
.DEFAULT_GOAL := help
sail := vendor/bin/sail

help:
	@echo "welcome to IT Support"

install:
	@composer install

test:
	php artisan test 

CleanTest:
	php artisan test && rm -rf storage/tenant* &&  rm -rf storage/app/*

fresh: 
	rm -rf  storage/app/public/category/* && rm -rf storage/app/public/services/*  && php artisan migrate:fresh --seed 

# clear: && php artisan storage:link
# php artisan cache:clear && php artisan config:clear &&  php artisan config:clear &&  composer dump-autoload -o && php artisan view:clear 

clearfiles: 
		rm -rf  storage/app/public/category/* && rm -rf storage/app/public/services/* && rm -rf storage/app/public/pdf/*

prod:
	docker --file 'docker-compose-prod.yaml' start 

prodbuild:
	docker --file docker-compose-prod.yaml build -d

profresh: 
	rm -rf storage/tenant* && rm -rf storage/app/*  && @docker exec crm_php php artisan migrate:fresh --seed &&	chmod -R 777 storage && @docker exec crm_php php artisan storage:link