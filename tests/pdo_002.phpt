--TEST--
PDO Common: PDO::FETCH_NUM
--SKIPIF--
<?php # vim:ft=php
if (!extension_loaded('pdo')) die('skip');
require_once 'pdo_test.inc';
PDOTest::skip();
?>
--FILE--
<?php
require_once 'pdo_test.inc';
$db = PDOTest::factory();

$db->exec('CREATE TABLE cubrid_test(id int NOT NULL PRIMARY KEY, val VARCHAR(10))');
$db->exec("INSERT INTO cubrid_test VALUES(1, 'A')");
$db->exec("INSERT INTO cubrid_test VALUES(2, 'B')");
$db->exec("INSERT INTO cubrid_test VALUES(3, 'C')");

$stmt = $db->prepare('SELECT * FROM cubrid_test');
$stmt->execute();

var_dump($stmt->fetchAll(PDO::FETCH_NUM));
?>
--EXPECT--
array(3) {
  [0]=>
  array(2) {
    [0]=>
    string(1) "1"
    [1]=>
    string(1) "A"
  }
  [1]=>
  array(2) {
    [0]=>
    string(1) "2"
    [1]=>
    string(1) "B"
  }
  [2]=>
  array(2) {
    [0]=>
    string(1) "3"
    [1]=>
    string(1) "C"
  }
}
