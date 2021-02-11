# ISRC_DEV
Devoir ISRC 2021


Explication du fichier owm_cfg.ini:

Par le code (exemple):
$ini = parse_ini_file('app.ini');
Il est possible à charger les contenues dans le tableau $ini. Ce ligne doit se trouver dans le fichier openweathermap.php.

Les contenues:

[database]
db_api = <API_KEY>: Ici doit être le clé API, par exemple <e9d68e84b76416f0610fe123a1d61123>
db_city = <Ville>: Ici doit être la donnée de ville, par exemple <Berlin>
db_ms = <Système metric>: Ici doit être le système metric, par exemple <Metric> 
db_lang = <Pays>: Ici doit être la donnée de Pays, par exemple <Allemagne>

L'appel des données est fait par:
$ini['db_api'], exemple: echo $ini['db_api'];