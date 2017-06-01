<!DOCTYPE HTML>
<html>
<head>
    <?php include('portfolio_c.php'); ?>
    <title>Logan Martin - Portfolio</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/main.css" />
    <!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
    <!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/custom.css" />
</head>
<body>

<!-- Alert Panel -->
<div id="alert-container"></div>

<!-- Header -->
<div id="header">

    <div class="top">

        <!-- Logo -->
        <div id="logo">
            <span class="image avatar64"><img src="images/avatar_med.png" alt="" /></span>
            <h1 id="title">Logan Martin</h1>
            <p>Software Developer</p>
        </div>

        <!-- Nav -->
        <nav id="nav">
            <ul>
                <li><a href="#top" id="top-link" class="skel-layers-ignoreHref"><span class="icon fa-home">Intro</span></a></li>
                <li><a href="#portfolio" id="portfolio-link" class="skel-layers-ignoreHref"><span class="icon fa-th">Portfolio</span></a></li>
                <li><a href="#about" id="about-link" class="skel-layers-ignoreHref"><span class="icon fa-user">About Me</span></a></li>
                <li><a href="#contact" id="contact-link" class="skel-layers-ignoreHref"><span class="icon fa-envelope">Contact</span></a></li>
            </ul>
        </nav>

    </div>

    <div class="bottom">

        <!-- Social Icons -->
        <ul class="icons">
            <li><a href="https://www.linkedin.com/in/loganrmartin" id="linkedin-link" class="icon fa-linkedin-square" target="_blank"><span class="label">Linkedin</span></a></li>
            <li><a href="https://open.spotify.com/user/logan_martin" id="spotify-link" class="icon fa-spotify" target="_blank"><span class="label">Spotify</span></a></li>
            <li><a href="http://github.com/loganmartin" id="github-link" class="icon fa-github" target="_blank"><span class="label">Github</span></a></li>
            <li><a href="https://www.last.fm/user/Logan-Martin" id="lastfm-link" class="icon fa-lastfm-square" target="_blank"><span class="label">LastFM</span></a></li>
            <li><a href="#contact" class="icon fa-envelope"><span class="label">Email</span></a></li>
        </ul>

    </div>

</div>

<!-- Main -->
<div id="main">
    <!-- Intro -->
    <section id="top" class="one dark cover">
        <div class="container">
            <header>
                <h2 class="alt">Hi! I'm <strong>Logan Martin</strong>, a software developer<br /> and
                    recent Computer Science graduate.</h2>
                <p>This is my personal portfolio site where you can<br /> check out
                my work and get in touch with me.</p>
            </header>

            <footer>
                <a href="#portfolio" class="button scrolly">See My Work!</a>
            </footer>

        </div>
    </section>

    <!-- Portfolio -->
    <section id="portfolio" class="two">
        <div class="container">

            <header>
                <h2>Portfolio</h2>
            </header>

            <p>Take a look at some of the projects that I've worked on. I've built and designed a number of things, including LAMP based web apps,
             mobile apps, games, and more.</p>
            <div class="row">
                <?php echo getProjects(); ?>
                <!--<div class="4u 12u$(mobile)">
                    <article class="item work-item">
                        <img class="image fit" src="images/pic02.jpg" alt="" />
                        <header>
                            <h3>Content-Based Image Retrieval Project</h3>
                        </header>
                        <section class='projDesc'>
                            <p>
                                <b>Date:</b> Fall 2015 <br />
                                <b>Type:</b> HTML, JavaScript <br />
                                <b>Code:</b> <a href="http://github.com/loganmartin/cbir">Github</a> <br />
                            </p>
                        </section>
                    </article>
                    <article class="item work-item">
                        <a href="images/pic03.jpg" class="image fit"><img src="images/pic03.jpg" alt="" /></a>
                        <header>
                            <h3>Rhoncus Semper</h3>
                        </header>
                    </article>
                    <article class="item work-item">
                        <a href="images/pic03.jpg" class="image fit"><img src="images/pic03.jpg" alt="" /></a>
                        <header>
                            <h3>Rhoncus Semper</h3>
                        </header>
                    </article>
                </div>-->
            </div>

        </div>
    </section>

    <!-- About Me -->
    <section id="about" class="three">
        <div class="container">

            <header>
                <h2>About Me</h2>
            </header>

            <a id="aboutme-image" href="#" class="image featured">
                    <img src="images/about3.jpg" alt="" />
            </a>

            <!--<p>Tincidunt eu elit diam magnis pretium accumsan etiam id urna. Ridiculus
                ultricies curae quis et rhoncus velit. Lobortis elementum aliquet nec vitae
                laoreet eget cubilia quam non etiam odio tincidunt montes. Elementum sem
                parturient nulla quam placerat viverra mauris non cum elit tempus ullamcorper
                dolor. Libero rutrum ut lacinia donec curae mus vel quisque sociis nec
                ornare iaculis.</p>-->
                <p>
                    Born and raised in Southern Alberta, Canada; I'm a recent Computer Science graduate
                    interested in all things 'coding'. I started down the path of software development
                    at Lethbridge College where I recieved a diploma in Computer Information Technology in 2013.
                    During my time at the College, I realized my passion for software development,
                    and knew that was the path I wanted to follow.
                    After finishing my diploma I headed to the University of Lethbridge to further my education, graduating with a B.Sc. in Computer Science
                    this last Spring.
                    </br>
                    </br>
                    One area of software development that i'm particularly interested in is <b>Usability</b>. Whether it comes in the form of
                     an intuitive and responsive user interface, an easy to use API, or a well documented code base — it is something that
                      i'm always conscious of, and willing to go the extra mile to get right.</br>
                      The study of cognitive science and how it pertains to software design and usability is something that i'm hoping I can pursue further in my career as a
                       developer.
                    </br>
                    </br>
                    Aside from writing code and making fun things, I'm an avid music listener, gamer, and sports fan.</br>
                    Go Canucks! &#x1F61E;
                    </br>

                </p>

        </div>
    </section>

    <!-- Contact -->
    <section id="contact" class="four">
        <div class="container">

            <header>
                <h2>Contact</h2>
            </header>

            <p>If you would like to get in touch with me, please leave a message below and I'll get
                back to you as soon as possible. If you'd prefer to simply E-Mail me, I can be reached at
                <a href="mailto:contact@loganrmartin.com">contact@loganrmartin.com</a></p>

            <form method="post" action="#">
                <div class="row">
                    <div class="6u 12u$(mobile)"><input id="contact-name" class="contact-field"  type="text" name="name" placeholder="Name" /></div>
                    <div class="6u$ 12u$(mobile)"><input id="contact-email" class="contact-field"  type="text" name="email" placeholder="Email" /></div>
                    <div class="12u$">
                        <textarea id="contact-msg" class="contact-field" name="message" placeholder="Message"></textarea>
                    </div>
                    <div class="12u$">
                        <button id="contact-btn" type="button">Send Message</button>
                        <!--<button id="debug-btn" type="button" onclick="DebugOutput()">Debug</button>-->
                    </div>
                </div>
            </form>

        </div>
    </section>

</div>

<!---#######################- Modal Stucture -###############################-->
<div id="portModal" class='modal fade' tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span id="testy" class="modal-close-btn" aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="portModalLabel"></h4>
            </div>
            <div class="modal-body">
                <div id="image-carousel" class="carousel slide" data-ride="carousel">
                  <!-- Indicators -->
                  <ol id="carousel-indicators" class="carousel-indicators">
                    <li data-target="#image-carousel" data-slide-to="0" class="active"></li>
                    <li data-target="#image-carousel" data-slide-to="1"></li>
                  </ol>

                  <!-- Wrapper for slides -->
                  <div id="carousel-items" class="carousel-inner" role="listbox">

                  </div>

                  <!-- Controls -->
                  <a class="left carousel-control" href="#image-carousel" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="right carousel-control" href="#image-carousel" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                  </a>
                </div>
                <div class='modal-desc'>
                    <p class="modal-quick-desc">
                        <div><b>Date: </b><div id="modal-date" class='modal-info-field'> Fall 2015 </div></div>
                        <div><b>Type: </b><div id="modal-type" class='modal-info-field'> HTML, JavaScript </div></div>
                        <div><b>Code: </b><div id="modal-link" class='modal-info-field'> <a href="http://github.com/loganmartin/cbir">Github</a> </div></div>
                    </p>
                        <div id="modal-desc-text" class='modal-long-desc'>
                            <p>A content-based image retrieval system that finds similar images based on a queried image, using either Local Binary Patterns, Color Moments, or a combination of the two.</p>
                        </div>
                </div>
            </div>
            <!--<div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>-->
        </div>
    </div>
</div> <!-- End of Modal -->


<!-- Footer -->
<div id="footer">

    <!-- Copyright -->
    <ul class="copyright">
        <li>&copy; 2017 Logan Martin. All rights reserved.</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
    </ul>

</div>

<!-- Scripts -->
<script src="assets/js/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="assets/js/jquery.scrolly.min.js"></script>
<script src="assets/js/jquery.scrollzer.min.js"></script>
<script src="assets/js/skel.min.js"></script>
<script src="assets/js/util.js"></script>
<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
<script src="assets/js/main.js"></script>
<script src="assets/js/jquery.magnific-popup.min.js"></script>
<script src="assets/js/custom.js"></script>

</body>
</html>
