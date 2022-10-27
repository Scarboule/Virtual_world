<?php 
    session_start();
    require_once 'config.php';
    if(!isset($_SESSION['user'])){
        header('Location:index.php');
        die();
    }
    $req = $bdd->prepare('SELECT * FROM utilisateurs WHERE token = ?');
    $req->execute(array($_SESSION['user']));
    $data = $req->fetch();

    $req = $bdd->prepare('SELECT * FROM blog ORDER BY id DESC');

    $req->execute();
    $blog = $req->fetchAll(PDO::FETCH_ASSOC);

?>
<?php

$req = $bdd->prepare('SELECT * FROM feedbacks ORDER BY comment_date DESC LIMIT 10');

$req->execute();
$feedbacks = $req->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css">
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="img/VRW.png">
    <title>Virtual World - Home</title>
</head>

<body>
    <?php
    include_once 'menu.php'
    ?>

    <div id="searchbox">
        <input type="text" placeholder="Search Here">
    </div>

    <nav class="anim-nav">
        <div id="logo-img">
            <img src="img/bluetitlelogo.png" alt="mainlogo">
        </div>
        <div id="menu-icon">
            <i class="fas fa-bars"></i>
        </div>
        <ul>
            <li>
                <div id="search-icon">
                    <i class="fas fa-search"></i>
                </div>
            </li>
            <li>
                <a href="index.php">Home</a>
            </li>
            <li>
                <a href="offers.php">Offers</a>
            </li>
            <li>
                <a href="blog.php">Blog</a>
            </li>
            <li>
                <a class="active" href="admin.php">
                    <div id="login-icon">
                        <?php echo $data['pseudo']; ?>
                        <i class="fa fa-user" ></i>
                    </div>
                </a>
            </li>
            <li>
        </ul>
    </nav>

    <?php
    include_once 'background.php'
    ?>

    <main>
        <div class="separation"></div>

        <h1 style="text-align: center;">Admin page</h1>

        <form id="log-out" action="handle_log-out.php" method="post">
            <input name="log-out" type="hidden">
            <button type="submit">Log out</button>
        </form>

        <div class="separation"></div>

            <h2>Feedbacks :</h2>

            <?php
            foreach($feedbacks as $feedback){
                echo "<div class='feedback'>";
                echo 'User : '. $feedback['pseudo'] . '<br>';
                echo 'Rating : '. $feedback['rating'] .'/5' . '<br><br>';
                echo $feedback['comment'] . '<br>';

                echo '<form action="delete_comment.php" method="post">
                    <input name="remove" type="hidden" value="'. $feedback['id'] .'">
                    <button type="submit">Remove comment</button>
                    </form>';

                echo "</div>";
            }
        ?>
        <div class="separation"></div>

            <section>
                <div id="game-section">
                    <h1>Blog Articles</h1>
                    <div>
                        <button id="all_btn">all</button>
                        <button id="red_btn">red</button>
                        <button id="blue_btn">blue</button>
                        <button id="yellow_btn">yellow</button>
                    </div>
                </div>
                <div id="games_caroussel">
                <?php
                foreach($blog as $article){
                    ?>
                    <div class="article <?php echo $article['type'];?>">
                        <img src="<?php echo $article['image'];?>" alt="game">
                        <div>
                            <div class="article_title">
                                <h2>
                                    <?php
                                    echo $article['title'];
                                    ?>
                                </h2>
                                <span class="<?php echo $article['type'];?>_dot"></span>
                                <form action="delete_blog.php" method="post">
                    <input name="remove" type="hidden" value="<?php echo $article['id']?>">
                    <button type="submit">Remove article</button>
                    </form>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                ?>
                </div>
            </section>

        <div class="separation"></div>

        <h2>Add Article</h2>

        <form id="blog_form" action="handle_blog.php" method="post" enctype="multipart/form-data">
            <div>
                <label for="title">Title :</label>
                <input name="title" type="text" required>
            </div>
            <div>
                <label for="type">Type :</label>
                <select name="type">
                    <option value="red" selected>Red</option>
                    <option value="blue">Blue</option>
                    <option value="yellow">Yellow</option>
                </select>
            </div>
            <div>
                <label for="image">Image :</label>
                <input type="file" name="image" required>
            </div>
            <div>
                <label for="content">content :</label>
                <textarea name="content" required></textarea><br>
            </div> 
            <input type="submit">
        </form>

        <div class="separation"></div>

        <footer>
            <?php
            include_once 'footer.php'
            ?>
        </footer>

    </main>

    <script src="scripts/main.js"></script>
    <script src="scripts/index_scripts.js"></script>
    <script src="scripts/blog_script.js"></script>
</body>

</html>