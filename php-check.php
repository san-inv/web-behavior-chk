<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>シンプルPHPサンプル</title>
</head>
<body>
    <h1>PHPの基本機能サンプル</h1>
    <!-- コメント -->

    <?php
    // 1. 変数の使用
    $name = "太郎";
    echo "<p>こんにちは、{$name}さん！</p>";
    // 2. 配列の使用
    $fruits = ["りんご", "バナナ", "オレンジ"];
    echo "<p>好きな果物：" . $fruits[1] . "</p>";
    // 3. ループの使用
    echo "<ul>";
    foreach ($fruits as $fruit) {
        echo "<li>{$fruit}</li>";
    }
    echo "</ul>";
    // 4. 条件分岐
    $time = date("H");
    if ($time < 12) {
        echo "<p>おはようございます！</p>";
    } elseif ($time < 18) {
        echo "<p>こんにちは！</p>";
    } else {
        echo "<p>こんばんは！</p>";
    }
    // 5. 関数の定義と使用
    function add($a, $b) {
        return $a + $b;
    }
    $result = add(5, 3);
    echo "<p>5 + 3 = {$result}</p>";
    ?>

</body>
</html>
