<?php
    session_start();
    if (isset($_POST['logout']) && $_POST['logout'] == true):
        $_SESSION['authorization'] = false;
        $_SESSION['login'] = '';
        $_SESSION['password'] = '';
        $_SESSION['dbname'] = '';
        $_POST['textarea'] = '';
    endif;
    
$textarea = $_POST['textarea'];
$password = $_POST['password'];
$login = $_POST['login'];
$db = $_POST['dbname'];
    if (isset($_POST['login'])):
        try {
            $dbh = new PDO('mysql:host=localhost;dbname=' . $db, $login, $password);
            $_SESSION['authorization'] = true;
            $_SESSION['login'] = $_POST['login'];
            $_SESSION['password'] = $_POST['password'];
            $_SESSION['dbname'] = $_POST['dbname'];
            $dbh = null;
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
        }
    endif;
    
    if ($_SESSION['authorization'] == true): ?>
        <form action="" method="post">
            <p><label>Введите код запроса:<br/></p>
            <p><textarea rows="4" cols="150" name="textarea"><?php echo $textarea; ?></textarea></p>
            <input type="submit" value="Запросить данные"> или <input type="submit" name="logout" value="Выйти"> 
        </form>
<?php
    else:
?>
        <form action="" method="post">
            <p><label>Логин:<input type="text" name="login"></label></p>
            <p><label>Пароль:<input type="password" name="password"></label></p>
            <p><label>Имя базы данных:<input type="text" name="dbname"></label></p>
            <input type="submit" value="Отправить">
        </form>

<?php endif;
$login = $_SESSION['login'];
$password = $_SESSION['password'];
$db = $_SESSION['dbname'];
if ($textarea):
    try {
        $dbh = new PDO('mysql:host=localhost;dbname=' . $db, $login, $password);            
            $result = $dbh->query($textarea);
            if ($result):
                $rows = $result->fetchAll();
                $rowcount = $result->rowCount();
                print "<p>Количество записей:" . $rowcount . "</p>";
                foreach (array_keys($rows[0]) as $column):
                    if (!is_numeric($column)):
                        $columns[] = $column;
                    endif;
                endforeach;
                if ($columns):?>
                <table style="width: 100%" border="1">
                    <tr>
                    <?php foreach ($columns as $column): ?>
                    <th><?php echo $column; ?></th>
                    <?php endforeach ?>
                    </tr>
                    <?php foreach ($rows as $row): ?>
                        <tr>
                            <?php foreach ($columns as $column): ?>
                                <td><?php echo $row[$column]; ?></td>
                            <?php endforeach ?>
                        /tr>
                    <?php endforeach ?>
                </table>
            <?php
            endif;  
            endif;  
            $dbh = null;
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }   
endif;
?>

<pre>
<?php 
// print_r($_SESSION);
// print_r($textarea); 
//print_r($result);
// print_r($login);
?>
</pre>