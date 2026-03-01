<?php
// データベース接続情報
$servername = "localhost";
$username = "root";
$password = "*********";
$dbname = "wordpress";

// データベースに接続
$conn = new mysqli($servername, $username, $password, $dbname);

// 接続エラーチェック
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// データベース内の全テーブルを取得
$tables_query = "SHOW TABLES";
$tables_result = $conn->query($tables_query);

if ($tables_result->num_rows > 0) {
    while($table_row = $tables_result->fetch_array()) {
        $table_name = $table_row[0];
        
        echo "<h2>テーブル: " . htmlspecialchars($table_name) . "</h2>";
        
        // 各テーブルの内容を取得
        $sql = "SELECT * FROM `" . $table_name . "`";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            // テーブルのヘッダーを出力
            echo "<table border='1'><tr>";
            
            // カラム名を取得してヘッダーに表示
            $field_info = $result->fetch_fields();
            foreach ($field_info as $field) {
                echo "<th>" . htmlspecialchars($field->name) . "</th>";
            }
            echo "</tr>";
            
            // データ行の出力
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                foreach($row as $value) {
                    echo "<td>" . htmlspecialchars($value) . "</td>";
                }
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "このテーブルにはデータがありません。";
        }
        
        echo "<br><br>";
    }
} else {
    echo "データベースにテーブルが見つかりません。";
}

// データベース接続を閉じる
$conn->close();
?>

