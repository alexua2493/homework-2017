<?php
if (!empty($_POST['sub']) == "Отправить") {
    $_SESSION['login'] = $_POST['login'];
    $_SESSION['password'] = $_POST['password'];
    $_SESSION['dataBase'] = $_POST['dataBase'];
}

if (!empty($_SESSION['login']) and !empty($_SESSION['password'])) {
    $log = $_SESSION['login'];
    $pass = $_SESSION['password'];
    $qwery = $_SESSION['qwery'];
    $db = $_SESSION['dataBase'];
    try {
        if (!empty($qwery)) :
            $dbh = new PDO("mysql:host=localhost;dbname=$db", "$log", "$pass");
            $res = $dbh->query($qwery);
            $rows = $res->fetchAll(PDO::FETCH_ASSOC);
            if ($rows):?>
                <table border='2' cellspacing="0" style="margin-top: 50px; margin-left: 50px;">
                    <?php foreach ($rows[0] as $key => $value): ?>
                        <th><?php echo $key; ?></th>
                    <?php endforeach; ?>
                    <?php for ($i = 0; $i < count($rows); $i++): ?>
                        <tr>
                            <?php foreach ($rows[$i] as $elem):
                                ?>
                                <td><?php echo $result = $elem . "\n"; ?></td>
                            <?php endforeach; ?>
                        </tr>
                    <?php endfor; ?>
                </table>
            <?php endif;
        endif;
        $dbh = null;
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        die();
    }
}
?>