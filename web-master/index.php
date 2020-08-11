<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>IITU</title>
    <script src="https://kit.fontawesome.com/73cbaad0ce.js"></script>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/main.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,800&display=swap&subset=cyrillic-ext" rel="stylesheet">
    <script src="js/jquery-3.4.1.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue"></script>
    <script src="https://cdn.jsdelivr.net/vue.resource/1.0.3/vue-resource.min.js"></script>
</head>
<body>
    <?php
        include "teachers.php";
        include "partners.php";
        $teachers = teachers_all($db);
        $partners = partners_all($db);
    ?>
    <nav class="navbar navbar-expand-lg navbar-light navbar-expand-md bg-light sticky-top overlay">
        <div class="container-fluid">
            <a href="index.php" class="navbar-brand"><img src="img/logo_new1.png" alt="logo"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
                <span class="navbar-toggler-icon"></span>
                <span class="navbar-toggler-icon"></span>
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto align-items-center">
                    <li class="nav-item active">
                        <a href="#main" class="nav-link">Main</a>
                    </li>
                    <li class="nav-item">
                        <a href="#teachers" class="nav-link">Teachers</a>
                    </li>
                    <li class="nav-item">
                        <a href="#partners" class="nav-link">Partners</a>
                    </li>
                    <li class="nav-item">
                        <a href="#contacts" class="nav-link">Contacts</a>
                    </li>
                    <li class="nav-item">
                        <a href="schedule.php" class="nav-link">Schedule</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <section class="hero-banner text-center" id="main">
        <div class="container">
            <h1>IITU</h1>
            <h3 class="prog">INTERNATIONAL INFORMATION TECHNOLOGY UNIVERSITY</h3>
        </div>
    </section>

    <div class="about-section" id="teachers">
        <h1 class="prepody text-center">Teachers</h1>
        <div class="overlay"></div>
        <div class="card-section">
            <div class="container">
                <div class="row">
                    <?php foreach ($teachers as $t): ?>
                        <div class="col-md-6 col-sm-12 col-lg-4">
                            <div class="lab-card">
                                <div class="icon">
                                    <i class="flaticon-023-flask"></i>
                                </div>
                                <h2><?=$t['name']?> <?=$t['surname']?></h2>
                                <p><i class="fas fa-chalkboard-teacher"></i>  <?=$t['description']?></p>
                                <p><i class="fas fa-at"></i> <?=$t['email']?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>

    <div class="services-section spad bg-gray" id="partners">
        <div class="container">
            <h1 class = "our_partners text-center">Partners</h1>
            <div class="row">
                <?php foreach ($partners as $p): ?>
                    <div class="col-md-6 col-sm-12 col-lg-3">
                        <div class="service">
                            <div class="service-text text-center">
                                <img src="<?=$p['image']?>" class="partners">
                                <p><?=$p['name']?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <div class="contact-section spad fix">
        <div class="container-fluid">
            <div><h2 class="voprosy">Have you got a question?</h2></div>
            <div class="row">
                <!-- contact form -->
                <div class="col-md-6 col-pull" id="question">
                    <form class="form-class" id="con_form" method="POST" @submit.prevent="addQuestion()">
                        <div class="row">
                            <div class="col-sm-6">
                                <input type="text" v-model="form.name" name="name" id="contactName" placeholder="Name" value="">
                            </div>
                            <div class="col-sm-6">
                                <input type="text" v-model="form.email" name="email" id="contactEmail" placeholder="Email" value="">
                            </div>
                            <div class="col-sm-12">
                                <textarea name="message" v-model="form.question" id="contactQuestion" placeholder="Question"></textarea>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <input type="submit" name="question" id="btn-question" class="site-btn" value="Ask a question">
                                </div>
                                <div class="col-6" v-if="success">
                                    <span class="text-success">Thank you! Our manager will contact you as soon as possible. <span>  &hearts;</span></span>
                                </div>
                                <div class="col-6" v-if="error">
                                    <span class="text-danger">Something went wrong.</span>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-6 col-md-offset-1 contact-info col-push">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2906.7786904652253!2d76.90769551548424!3d43.23509947913794!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3883692f027581ad%3A0x2426740f56437e63!2z0JzQtdC20LTRg9C90LDRgNC-0LTQvdGL0Lkg0YPQvdC40LLQtdGA0YHQuNGC0LXRgiDQuNC90YTQvtGA0LzQsNGG0LjQvtC90L3Ri9GFINGC0LXRhdC90L7Qu9C-0LPQuNC5!5e0!3m2!1sru!2skz!4v1561204077518!5m2!1sru!2skz" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>

    <footer class="container-fluid bg-dark" id="contacts">
        <div class="container text-white pt-2">
            <div class="row">
                <div class="col-sm-6">
                    <h4 class="text-white">Address</h4>
                    <p><i class="fas fa-map-marker-alt"></i> Kazakhstan, Almaty st.Zhandossov 34А(Manas)</p>
                    <h6 class="text-white">© IITU 2020</h6>
                </div>
                <div class="col-sm-6 text-right">
                    <h4 class="text-white">Contacts</h4>
                    <p><i class="fas fa-phone"></i> +7(708) 506 09 08</p>
                    <p><i class="fas fa-at"></i> a.bolatbek2000@gmail.com</p>
                </div>
            </div>
        </div>
    </footer>
    <script type="application/javascript" src="js/question.js"></script>
</body>
</html>

