<?php
require_once 'session.php';

$req = $bdd->prepare('SELECT * FROM feedbacks ORDER BY comment_date DESC LIMIT 3');

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

    <nav id="nav">
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
                <a class="active" href="index.php">Home</a>
            </li>
            <li>
                <a href="offers.php">Offers</a>
            </li>
            <li>
                <a href="blog.php">Blog</a>
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
        <div class="genre">
            <div class="simu">
                <img src="img/icone-digital-data.png" alt="simu">
                <h2>Simulation</h2>
                <a>Want to know how it feel to be a pilot, a super hero, or a cat ? You are free to be whatever you want. Choice is yours.</a>
            </div>
            <div class="avent">
                <img src="img/aventureicone.png" alt="avnt">
                <h2>aventure</h2>
                <a>A lot of great adventures and skills challenges are waiting for you, in a variety of virtuals immersives worlds. </a>
            </div>
            <div class="commu">
                <img src="img/n_22px-Community_Noun_project_.png" alt="commu">
                <h2>community</h2>
                <a>Play with your friend, familly, or people around the world.Do Coop and share your experience, or try out some competitive games.</a>
            </div>
        </div>

        <div class="separation"></div>

        <section class="presentation">
            <div class="spitch">
                <h1>Unique experiences are waiting for you</h1>
                <h2>The place to experiment and enjoy a variety of exclusive VR games.</h2>
                <h2>Get access to 30+ games with a single subscription.</h2>
                <h2>New games will be regularly released.</h2>
                <button id="btn-join">SUBSCRIBE NOW</button>
                <div id="myModal">
                    <div class="modal-content">
                        <span class="close">&times;</span>
                        <form action="handle_modal.php" method="post">
                            <h2>Subscribe to the beta</h2>       
                            <div>
                                <input id="mail" type="email" name="email" placeholder="Email" required="required">
                            </div>
                            <div>
                                <button type="submit">Subscribe</button>
                            </div> 
                        </form>
                    </div>
                </div>
            </div>
            <div>
                <img id="vr-img" src="img/273006129_456821402812636_2567816201896222956_n.jpg" alt="vrgame">
            </div>
        </section>

        <div class="separation"></div>

        <section>
            <div id="game-section">
                <h1>Popular games</h1>
                <a href="#">See all games</a>
            </div>
            <div id="games_caroussel">
                <div class="game">
                    <img src="img/beats-saber-pack-imagine-dragons-2.png" alt="game">
                    <div>
                        <h2>Game 1</h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora, voluptate illum error laborum aspernatur nam recusandae sunt architecto quo perspiciatis explicabo fugit tenetur cum consectetur?</p>
                    </div>
                </div>
                <div class="game">
                    <img src="img/beats-saber-pack-imagine-dragons-2.png" alt="game">
                    <div>
                        <h2>Game 2</h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora, voluptate illum error laborum aspernatur nam recusandae sunt architecto quo perspiciatis explicabo fugit tenetur cum consectetur?</p>
                    </div>
                </div>
                <div class="game">
                    <img src="img/beats-saber-pack-imagine-dragons-2.png" alt="game">
                    <div>
                        <h2>Game 3</h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora, voluptate illum error laborum aspernatur nam recusandae sunt architecto quo perspiciatis explicabo fugit tenetur cum consectetur?</p>
                    </div>
                </div>
            </div>
        </section>
        
        <div class="separation"></div>

        <h2>Last feedbacks :</h2>
            <?php
            foreach($feedbacks as $feedback){
                echo "<div class='feedback'>";
                echo 'User : '. $feedback['pseudo'] . '<br>';
                echo 'Rating : '. $feedback['rating'] .'/5' . '<br><br>';
                echo $feedback['comment'] . '<br>';
                echo "</div>";
            }
            ?>
        <div class="separation"></div>

        <footer>
            <?php
            include_once 'footer.php'
            ?>
        </footer>

    </main>

    <script src="scripts/main.js"></script>
    <script src="scripts/text_anim.js"></script>
    <script src="scripts/index_scripts.js"></script>
</body>

</html>