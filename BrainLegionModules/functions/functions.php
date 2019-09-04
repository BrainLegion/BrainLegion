<?
  session_start();
  $GLOBALS['mysqli'] = new mysqli('localhost', 'vh4u14185', 'rzyqpd21', 'vh4u14185_db');
  $GLOBALS['mysqli']->query("SET NAMES 'utf8'");

  function getFromOneTable($table)
  {
    $exampleDB = $GLOBALS['mysqli']->query("SELECT * FROM `".$table."`");
    $ourData;
    while(($row = $exampleDB->fetch_assoc()) != false)
    {
      $ourData[] = $row;
    }
    return $ourData;
  }

  function getFromOneTable_OneCurrentAttribute($table, $attribute)
  {
    $exampleDB = $GLOBALS['mysqli']->query("SELECT `".$attribute."` FROM `".$table."`");
    $ourData;
    while(($row = $exampleDB->fetch_assoc()) != false)
    {
      $ourData[] = $row;
    }
    return $ourData;
  }

  function getFromOneTableWithCondition($table, $attribute, $condition)
  {
    $exampleDB = $GLOBALS['mysqli']->query("SELECT * FROM `".$table."` WHERE `".$attribute."` = '".$condition."'");
    $ourData;
    while(($row = $exampleDB->fetch_assoc()) != false)
    {
      $ourData[] = $row;
    }
    return $ourData;
  }


  function findSmthFromTable($table, $attribute, $value)
  {
    $exampleDB = $GLOBALS['mysqli']->query("SELECT * FROM `".$table."` WHERE `".$attribute."` = '".$value."'");
    $ourData;
    while(($row = $exampleDB->fetch_assoc()) != false)
    {
      $ourData[] = $row;
    }
    return $ourData;
  }

  function getFromOneTableWithTwoCondition($table, $firstAttribute, $secondAttribute, $firstCondition, $secondCondition)
  {
    $exampleDB = $GLOBALS['mysqli']->query("SELECT * FROM `".$table."` WHERE `".$firstAttribute."` = '".$firstCondition."' and `".$secondAttribute."` = '".$secondCondition."'");
    $ourData = [];
    if($exampleDB->num_rows != 0)
    {
      while(($row = $exampleDB->fetch_assoc()) != false)
      {
        $ourData[] = $row;
      }
      return $ourData;
    }
    else
    {
      return 'empty';
    }
  }
?>
