    <div id="menu">
        <ul>
            <li>
            <a <?php if(!isset($_SESSION['user'])){
                    echo 'href="log-in.php"';
                }else{
                    echo 'href="admin.php"';
                }?>><?php if(!isset($_SESSION['user'])){
                    echo 'Log-in/Sign-up';
                }else{
                    echo 'Account';
                }?></a>
                <!--<a href="log-in.php">Log-in/Sign-up</a>-->
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
                <input type="text" placeholder="Search Here">
            </li>
        </ul>
    </div>