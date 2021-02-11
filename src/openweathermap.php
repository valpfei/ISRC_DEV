<?php
/**
 * PHP version 7.2.19

 * @category ISRC_DEV
 * @package  OpenWeatherMap
 * @author   Valentin Pfeil <valentin.pfeil@ecole-air.fr>
 * @license  MIT (https://opensource.org/licenses/MIT)
 * @link     https://ecole-air.fr
 */

/**
 * Chargement des dépendances et des modules
 */

require __DIR__ . '/../vendor/autoload.php';

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

use Cmfcmf\OpenWeatherMap;
use Cmfcmf\OpenWeatherMap\Exception as OWMException;
use Http\Factory\Guzzle\RequestFactory;
use Http\Adapter\Guzzle6\Client as GuzzleAdapter;

/**
 * Création d'une circulation de documentation
 */ 
$log = new Logger('name');
$log->pushHandler(new StreamHandler('../log/your.log', Logger::WARNING));
$log->pushHandler(new StreamHandler('../log/general.log'));

/**
 * Ajout des informations sur les infos
 * Excludé: $log->date.timezone('Europe/Berlin');
 */
$log->debug('Debug');
$log->warning('Foo');
$log->error('Bar');

/**
 * Chargement du fichier de configuration
 * Excludé: $cfg = include 'owm_cfg.php';
 */
 $ini = parse_ini_file('owm_cfg.ini');


/**
 * Création du générateur de requête HTTP
 */
$httpRequestFactory = new Http\Factory\Guzzle\RequestFactory();
/**
 * Création du pseudo-navigateur
 */
$httpClient = new GuzzleHttp\Client();
/**
 * Création de l’objet représentant l’objet OpenWeatherMap pour un
 * utilisateur identifié par sa clé API(remplacer API_KEY par votre clé)
 */
$owm = new Cmfcmf\OpenWeatherMap($ini['db_api'], $httpClient, $httpRequestFactory);
/**
 * Récupération de l’objet « weather » pour la ville de Salon-de-
 * Provence en mode métrique et en français
 */
$weather = $owm->getWeather($ini['db_city'], $ini['db_ms'], $ini['db_lang']);

/**
 * Affiche en mode débogage le contenu d’une variable – ici un objet et
 * donc sa structure
 */
/**
 * BACKUP: var_dump($weather);
 */ 
echo PHP_EOL;

echo " CITY ";
echo $weather->city->name;
echo " ID ";
echo $weather->city->id;
echo " TEMPERATURE ";
echo $weather->temperature;

/**
 * Fin du fichier
 */

$log->debug('End');

echo PHP_EOL;
echo 'DIR: ';
echo __DIR__;
echo PHP_EOL;

?>