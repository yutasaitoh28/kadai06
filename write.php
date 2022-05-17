<?php
    $ans1 = $_POST["ans1"];
    $ans2 = $_POST["ans2"];
    $ans3 = $_POST["ans3"];
    $ans4 = $_POST["ans4"];
    $correct = 0;
    if (!empty($_POST)) {
        echo "<h1>クイズが完了しました！</h1>";
        if ($ans1 == 5) {
            $correct++;
        } else {
            echo "<p>足し算が不正解</p>";
        } 
        if ($ans2 == 4) {
            $correct++;
        } else {
            echo "<p>引き算が不正解</p>";
        } 
        if ($ans3 == 48) {
            $correct++;
        } else {
            echo "<p>掛け算が不正解</p>";
        } 
        if ($ans4 == 5) {
            $correct++;
        } else {
            echo "<p>割り算が不正解</p>";
        } 
        echo "<p class='result'>$correct 問正解しました。</p>";
        $grade = ($correct / 4) * 100;
        if ($correct == 0) {
            echo "<p>まだまだです</p>";
        } elseif ($correct == 1) {
            echo "<p>もう少し頑張りましょう</p>";
        } elseif ($correct == 2) {
            echo "<p>まだ頑張れます</p>";
        } elseif ($correct == 3) {
            echo "<p>あとひと頑張り</p>";
        } else {
            echo "<p>合格です</p>";
        }
    } else {
        echo "<p>クイズを完了してください。</p>";
    }

    // 記入時間
    $time = date('Y/m/d H:i:s');
    $result = <<< EOM
        {$correct}点
    EOM;

    // ファイルを開く
    $file = fopen('data/data.txt', 'a');

    // ファイルに書き込み
    fwrite($file, $time . $result . "\n");

    //ファイルに保存
    fclose($file);

?>

<html>

<head>
    <meta charset="utf-8">
    <style>
        .result {
            color: red;
        }
    </style>
    <title>結果</title>
</head>

<body>
    <ul>
        <li><a href="read.php">過去の結果を見る</a></li>
        <li><a href="quiz.php">クイズに戻る</a></li>
    </ul>
</body>

</html>
