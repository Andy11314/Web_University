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
                    <a href="index.php" class="nav-link">Main</a>
                </li>
                <li class="nav-item">
                    <a href="schedule.php" class="nav-link">Schedule</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="about-section" id="schedule">
    <h1 class="prepody text-center">Schedule</h1>
    <div class="overlay"></div>
    <div>
        <div class="container">
            <div class="row">
                <label for="course" class="ml-3">Course</label>
                <select id="course" class="ml-1" name="course" v-model="course" @change="fetchSpeciality">
                    <option value=""></option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select>
                <label for="speciality" class="ml-3">Speciality</label>
                <select id="speciality" class="ml-1" name="speciality" v-model="speciality" @change="fetchGroup">
                    <option value=""></option>
                    <option :value="speciality.id" v-for="speciality in specialities">{{speciality.name}}</option>
                </select>
                <label for="group" class="ml-3">Group</label>
                <select id="group" class="ml-1" name="group" v-model="group" @change="fetchSchedule">
                    <option value=""></option>
                    <option :value="group.id" v-for="group in groups">{{group.name}}</option>
                </select>
            </div>
            <div class="row mt-3">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Monday</th>
                            <th>Tuesday</th>
                            <th>Wednesday</th>
                            <th>Thursday</th>
                            <th>Friday</th>
                            <th>Saturday</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <div v-for="lesson in schedule[0]" class="border p-2">
                                    <p><i class="fas fa-clock"></i> {{lesson.time}}</p>
                                    <p><i class="fas fa-book"></i> {{lesson.subject}}</p>
                                    <p><i class="fas fa-chalkboard-teacher"></i> {{lesson.teacher}}</p>
                                    <p><i class="fas fa-map-marker"></i> {{lesson.location}}</p>
                                </div>
                            </td>
                            <td>
                                <div v-for="lesson in schedule[1]" class="border p-2">
                                    <p><i class="fas fa-clock"></i> {{lesson.time}}</p>
                                    <p><i class="fas fa-book"></i> {{lesson.subject}}</p>
                                    <p><i class="fas fa-chalkboard-teacher"></i> {{lesson.teacher}}</p>
                                    <p><i class="fas fa-map-marker"></i> {{lesson.location}}</p>
                                </div>
                            </td>
                            <td>
                                <div v-for="lesson in schedule[2]" class="border p-2">
                                    <p><i class="fas fa-clock"></i>{{lesson.time}}</p>
                                    <p><i class="fas fa-book"></i> {{lesson.subject}}</p>
                                    <p><i class="fas fa-chalkboard-teacher"></i> {{lesson.teacher}}</p>
                                    <p><i class="fas fa-map-marker"></i> {{lesson.location}}</p>
                                </div>
                            </td>
                            <td><div v-for="lesson in schedule[3]" class="border p-2">
                                    <p><i class="fas fa-clock"></i> {{lesson.time}}</p>
                                    <p><i class="fas fa-book"></i> {{lesson.subject}}</p>
                                    <p><i class="fas fa-chalkboard-teacher"></i> {{lesson.teacher}}</p>
                                    <p><i class="fas fa-map-marker"></i> {{lesson.location}}</p>
                                </div></td>
                            <td>
                                <div v-for="lesson in schedule[4]" class="border p-2">
                                    <p><i class="fas fa-clock"></i> {{lesson.time}}</p>
                                    <p><i class="fas fa-book"></i> {{lesson.subject}}</p>
                                    <p><i class="fas fa-chalkboard-teacher"></i> {{lesson.teacher}}</p>
                                    <p><i class="fas fa-map-marker"></i> {{lesson.location}}</p>
                                </div>
                            </td>
                            <td>
                                <div v-for="lesson in schedule[5]" class="border p-2">
                                    <p><i class="fas fa-clock"></i> {{lesson.time}}</p>
                                    <p><i class="fas fa-book"></i> {{lesson.subject}}</p>
                                    <p><i class="fas fa-chalkboard-teacher"></i> {{lesson.teacher}}</p>
                                    <p><i class="fas fa-map-marker"></i> {{lesson.location}}</p>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
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
<script type="application/javascript" src="js/schedule.js"></script>
</body>
</html>

