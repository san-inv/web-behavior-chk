<?php
session_start();

// タスクを保存するためのセッション配列を初期化
if (!isset($_SESSION['tasks'])) {
    $_SESSION['tasks'] = array();
}

// タスクの追加
if (isset($_POST['addTask'])) {
    $task = $_POST['task'];
    if (!empty($task)) {
        $_SESSION['tasks'][] = array('task' => $task, 'completed' => false);
    }
}

// タスクの完了/未完了の切り替え
if (isset($_GET['toggle'])) {
    $taskId = $_GET['toggle'];
    $_SESSION['tasks'][$taskId]['completed'] = !$_SESSION['tasks'][$taskId]['completed'];
}

// タスクの削除
if (isset($_GET['delete'])) {
    $taskId = $_GET['delete'];
    unset($_SESSION['tasks'][$taskId]);
    $_SESSION['tasks'] = array_values($_SESSION['tasks']); // インデックスを再整理
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>シンプルタスク管理</title>
</head>
<body>
    <h1>タスク管理</h1>
    <!-- タスク追加フォーム -->
    <form method="post">
        <input type="text" name="task" placeholder="新しいタスクを入力">
        <input type="submit" name="addTask" value="タスクを追加">
    </form>
    <!-- タスク一覧 -->
    <h2>タスク一覧</h2>
    <ul>

    <?php foreach ($_SESSION['tasks'] as $taskId => $taskInfo): ?>
        <li>
            <?php echo $taskInfo['completed'] ? '<s>' : ''; ?>
            <?php echo htmlspecialchars($taskInfo['task']); ?>
            <?php echo $taskInfo['completed'] ? '</s>' : ''; ?>
            [<a href="?toggle=<?php echo $taskId; ?>">
                <?php echo $taskInfo['completed'] ? '未完了' : '完了'; ?>
            </a>]
            [<a href="?delete=<?php echo $taskId; ?>">削除</a>]
        </li>
    <?php endforeach; ?>

    </ul>
</body>
</html>
