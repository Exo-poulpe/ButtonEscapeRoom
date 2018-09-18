<?php
session_start();
//session_destroy();
//unset($_SESSION['listBin']);
if (!isset($_SESSION['listBin'])) {
  header("Location: serveur.php");
}
  $listBin = $_SESSION['listBin'];
  $hex = $_SESSION['hex'];
  $solution = $_SESSION['solution'];
//var_dump($listBin);
header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Date dans le passé
?>
<!DOCTYPE html>
<html>
<head>

  <title>Bouton</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
  <table border="solid" class="Table" id="TableSol1">
    <tr>
      <?php
      if (isset($solution)){
      for ($i=0; $i < count($solution); $i++) {if ($i == 1) {
        print('</tr></table><table border="solid"  class="Table"id="TableSol2"><tr>');
      } ?>
      <td>
        <?php print($solution[$i]); ?>
      </td>
    <?php }

    } ?>
    </tr>
  </table>
  <table border="solid" class="Table" id="TablePow1"  >
    <tr>
      <?php
      for ($i=3; $i >= 0; $i--) { ?>
        <td>2<sup><?php print($i); ?></sup></td>
        <?php
      }
      ?>
    </tr>
  </table>
  <table border="solid" class="Table" id="TablePow2"  >
    <tr>
      <?php
      for ($i=3; $i >= 0; $i--) { ?>
        <td>2<sup><?php print($i); ?></sup></td>
        <?php
      }
      ?>
    </tr>
  </table>
  <table border="solid" id="Table1"  class="Table">
    <tr>

      <?php
      if (isset($listBin)){
      for ($i=0; $i < count($listBin); $i++) {if ($i == 4) {
        print('</tr></tabl><table border="solid" id="Table2" class="Table"><tr>');
      } ?>
      <td>
        <?php print($listBin[$i]); ?>
      </td>
    <?php }

    } ?>
    </tr>
  </table>
    <table border="solid" id="TableHex1" class="Table">
      <tr>
        <?php
        if (isset($hex)){
        for ($i=0; $i < count($hex); $i++) {if ($i == 1) {
          print('</tr></tabl><table border="solid" id="TableHex2" class="Table"><tr>');
        } ?>
        <td>
          <?php print($hex[$i]); ?>
        </td>
      <?php }

      } ?>
      </tr>
    </table>


  <form method="post" action="serveur.php">
    <input type="submit" value="0" name="Button" id="B0" class="Button"/>
    <input type="submit" value="1" name="Button" id="B1" class="Button"/>
    <input type="submit" value="X" name="Delete" id="X" class="Button"/>
  </form>

</body>

</html>
