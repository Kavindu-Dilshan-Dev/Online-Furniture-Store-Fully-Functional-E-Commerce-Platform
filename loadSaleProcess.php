<?php

include "connection.php";

$rs = Database::search("SELECT `order_id`,`order_date`,`amount` FROM `order_history` ");

$num = $rs->num_rows;

for ($i = 0; $i < $num; $i++) {

    $d = $rs->fetch_assoc();
?>

    <tr>
        <th scope="row"><?php echo $d["order_id"]?></th>
        <td><?php echo $d["order_date"]?></td>
        <td><?php echo $d["amount"]?></td>

    </tr>

<?php

}

?>