<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum</title>
</head>
<body>
    <form action="home.php" method="post">
        <input type="submit" value="home">
    </form>

    <form action="../php/post/add-post.php" method="post">
        <input type="text" placeholder="title" name="postTitle" id="post-title">
        <textarea name="postContent" id="post-content" cols="30" rows="10" placeholder="post content"></textarea>
        <input type="submit" value="create post">
    </form>
</body>
</html>