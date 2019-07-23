<?php
    /**
     * GLOBAL
     * gitアカウントのメールアドレス
     * ログインパスワード
     * githubのアカウント名
     * 削除したいユーザー
     * を入力してください。
     */
    $Email = '';
    $PASS = '';
    $USER = '';
    $DELTE_USER = '';


    /**
     * 下記のAPIを実行し、api.jsonを作成してください。別途アクセストークンが必要です。
     * curl  "https://api.github.com/user/repos?access_token={token}&per_page=100&page=1&sort=created" > api.json
     */
    
    $url = './api.json';
    $json = file_get_contents($url);
    $json = mb_convert_encoding($json, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
    $arr = json_decode($json,true);
    echo $count = count($arr);


    for ($i = 0; $i < $count; ++$i) {
        $repoName = $arr[$i]['name'];

        $cmd = "curl -X DELETE -u $Email:$PASS 'https://api.github.com/repos/$USER/$repoName/collaborators/$DELTE_USER'";
        echo $repoName;
        echo exec($cmd);
    }
?>




