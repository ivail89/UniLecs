<?php
/**
 * Created by PhpStorm.
 * User: Иван
 * Date: 18.10.2018
 * Time: 18:03
 */
  try{
    $pdo = new PDO('mysql:host=localhost;dbname=unilecs', 'root', '');
  }
  catch (PDOException $e){
    echo "Невозможно установить соединение с БД";
  }
  echo "Победители по группам: <br/>";
  $query = "SELECT GroupName, Club, MAX(Points) FROM task_131 GROUP BY GroupName";
  $db = $pdo->query($query);
  $teams = $db->fetchAll();
  foreach ($teams as $team)
    echo $team['GroupName'].' | '.$team['Club'].' | '.$team['MAX(Points)'].'<br/>';
?>

