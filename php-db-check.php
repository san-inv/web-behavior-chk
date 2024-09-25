
<?php
// データベース接続情報
$servername = "localhost";
$username = "root";
$password = "18871887yy";
$dbname = "wordpress";

// データベースに接続
$conn = new mysqli($servername, $username, $password, $dbname);

// 接続エラーチェック
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQLクエリの実行
$sql = "SELECT * FROM wp_options";
//$sql = "SHOW TABLES";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // テーブルのヘッダーを出力
    echo "<table border='1'>
    <tr>";
    
    // カラム名を取得してヘッダーに表示
    $field_info = $result->fetch_fields();
    foreach ($field_info as $field) {
        echo "<th>" . $field->name . "</th>";
    }
    echo "</tr>";

    // データ行の出力
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        foreach($row as $value) {
            echo "<td>" . $value . "</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

// データベース接続を閉じる
$conn->close();
?>
