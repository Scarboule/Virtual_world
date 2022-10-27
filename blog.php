<?php
require_once 'session.php';

$req = $bdd->prepare('SELECT * FROM blog ORDER BY id DESC');

$req->execute();
$blog = $req->fetchAll(PDO::FETCH_ASSOC);

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
    <title>Virtual World - Blog</title>
</head>

<body>
<?php
    include_once 'menu.php'
    ?>

    <div id="searchbox">
        <input type="text" placeholder="Search Here">
    </div>

    <nav id="nav" class="anim-nav">
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
                <a class="active" href="blog.php">Blog</a>
            </li>
            <li>
            <a <?php if(!isset($_SESSION['user'])){
                    echo 'href="log-in.php"';
                }else{
                    echo 'href="admin.php"';
                }?>>
                    <div id="login-icon">
                        <?php echo $data['pseudo']; ?>
                        <i class="fa fa-user" ></i>
                    </div>
                </a>
            </li>
        </ul>
    </nav>

    <?php
    include_once 'background.php'
    ?>

    <main>

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
                            </div>
                        </div>
                    </div>
                    <?php
                }
                ?>
                </div>
            </section>
        

        
        <footer>
        <?php
            include_once 'footer.php'
            ?>
        </footer>

    </main>

    <script src="scripts/main.js"></script>
    <script src="scripts/text_anim.js"></script>
    <script src="scripts/blog_script.js"></script>
</body>

</html>