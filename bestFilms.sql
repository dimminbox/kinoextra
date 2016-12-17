truncate table best_films;

insert into best_films(id,image,year,url, visited, rating)
select `film`.`id` AS `id`,`film`.`image` AS `image`,`film`.`year` AS `year`,`film`.`url` AS `url`,`film`.`visited` AS `visited`,(select if((count(0) > 50),round((sum(`estimation_film`.`estimate`) / count(0)),2),0) from `estimation_film` where (`estimation_film`.`model_id` = `film`.`id`)) AS `rating` from `film` where ((`film`.`visited` > 2000) and (`film`.`active` = 1)) order by (select if((count(0) > 50),round((sum(`estimation_film`.`estimate`) / count(0)),2),0) from `estimation_film` where (`estimation_film`.`model_id` = `film`.`id`)) desc limit 0,50;

update film
set rating = (select if((count(0) > 20),round((sum(`estimation_film`.`estimate`) / count(0)),2),0) from `estimation_film` where (`estimation_film`.`model_id` = `film`.`id`))
 where ((`film`.`visited` > 2000) and (`film`.`active` = 1));