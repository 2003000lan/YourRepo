<p>Todo list</p>
<a href="0.輸入表單.html">新增待辦事項</a>
<hr />
<table width="200" border="1">
  <tr>
    <td>id</td>
    <td>Job</td>
    <td>Urgent</td>
    <td>Job Content</td>
    <td>-</td>
  </tr>
  <?php
require("dbconfig.php"); // 包含數據庫配置文件

$sql = "select * from todo;";
$stmt = mysqli_prepare($db, $sql); // 預備語句

if ($stmt) {
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    while ($rs = mysqli_fetch_assoc($result)) {
        echo "<tr><td>", $rs['id'],
        "</td><td>", $rs['jobName'],
        "</td><td>", $rs['jobUrgent'],
        "</td><td>", $rs['jobContent'],
        "</td><td><a href='3.editUI.php?id=", $rs['id'], "'>edit</a>",
        "</td></tr>";
    }
} else {
    // 處理 SQL 錯誤
    echo "SQL 錯誤: " . mysqli_error($db);
}

?>

</table>
