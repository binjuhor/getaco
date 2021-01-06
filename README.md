#Getaco.com - form builder for marketing team [2018]

This is a project for Marketing team, for converting lead to customer.


#Development

##Pull source code from repo on gitlab.com


======Run project=========
```
run composer update
run php artisan generate:key
run php artisan serve /to run your project
```

========Git Work Folow===========

###Git source code ( All feature and source using dev branch )

Before you create new feature or fix some feature need pull newest source code from server.

```
git pull origin dev
git checkout -b feat/#feature-number //With feature 
git checkout -b fix/#feature-number //With fix feature
```

###After finish code feature function you need merge to dev branch & follow this step

```
git add .
git commit -m "Your message when you finish this feature"
git checkout dev
git pull origin dev
git merge branch_name
```

##With route you need group all function under action

```
Groupname/
/ #go to index() list item
/list #go to list() list item to action ( back end )
/detail #go to detail() view detail items
/add #go to add() add item form
/edit #go to edit() edit item form with data 
/trash #go to trash() trash list
/untrash #go to unTrash() Un trash item
/delete #go to delete() delete from database
```
###Server requirement:
```
php: 7.0.0 ^
Mariadb: 5.5.56
Redis 4.0.9
Elasticsearch ~6.0
nginx 1.13.12
composer 1.6.4
NodeJs 10.0.0
```
###========= Command =============

```
php artisan search:index /Index all lead and customer to Elasticsearch
php artisan search:index {customerID} /Index lead and customer with id {customerID} to Elasticsearch
```