<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="./css/database.css">
    <?php include 'head.php'; ?>
</head>
<body>
    <!-- fontawesome-->
    <script src="https://kit.fontawesome.com/de998ff9a0.js" crossorigin="anonymous"></script>
    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- header -->
    <?php include 'header.php'; ?>

    <!-- 內容 -->
    <section id="manege">
        <div class="sidebar">
            <ul>
                <li><a href="#"><i class="fa-solid fa-bars-progress"></i>Index</a></li>
                <li><a href="#"><i class="fa-solid fa-database"></i>Database</a></li>
                <li><a href="#"><i class="fa-solid fa-right-from-bracket"></i>Log out</a></li>
            </ul>
        </div>
        <div class="content_wrapper">
            <div class="logintime">Hi! Someone Login Time:</div>
            <div class="content">
                <div class="pageGroup">
                    <a href="#" class="btn">Search data</a>
                    <a href="#" class="btn">insert data</a>
                </div>
                <!--search data -->
                <form id="searchInput">                  
                    <div class="inputGroup">
                        <input type="text" class="Search" placeholder="Models Search" name="Search">
                        <a href="#" class="btn fa-solid fa-magnifying-glass"></a>
                    </div>    
                </form>
                <table id="datamsg">
                    <thead>
                        <tr >
                            <th>Models</th>
                            <th>Body Design</th>
                            <th>Max Power (hp)</th>
                            <th>0-60mph</th>
                            <th>Top track speed (mph)</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>911 Carrera</td>
                            <td>Coupe</td>
                            <td>379</td>
                            <td>4</td>
                            <td>182</td>
                            <td>
                                <a href="#" class="btn fa-solid fa-pen-to-square"></a>
                                <a href="#" class="btn fa-solid fa-trash"></a>
                            </td>
                        </tr>
                        <tr>
                            <td>911 Carrera</td>
                            <td>Coupe</td>
                            <td>379</td>
                            <td>4</td>
                            <td>182</td>
                            <td>
                                <a href="#" class="btn fa-solid fa-pen-to-square"></a>
                                <a href="#" class="btn fa-solid fa-trash"></a>
                            </td>
                        </tr>
                        <tr>
                            <td>911 Carrera</td>
                            <td>Coupe</td>
                            <td>379</td>
                            <td>4</td>
                            <td>182</td>
                            <td>
                                <a href="#" class="btn fa-solid fa-pen-to-square"></a>
                                <a href="#" class="btn fa-solid fa-trash"></a>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <!-- insert data -->
                <form action="post" id="insert">
                    <h1>Insert into Database</h1>
                    <div class="inputGroup">
                        <label for="Models">Models</label>
                        <input type="text" name="Models" id="Models" placeholder="Carrera">
                    </div>
                    <div class="inputGroup">
                        <label for="BodyDesign">Body Design</label>
                        <input type="text" name="BodyDesign" id="BodyDesign"  placeholder="Coupe">
                    </div>
                    <div class="inputGroup">
                        <label for="MaxPower">Max Power</label>
                        <input type="text" name="MaxPower" id="MaxPower" placeholder="379">
                    </div>
                    <div class="inputGroup">
                        <label for="0_60mph">0-60mph</label>
                        <input type="text" name="0_60mph" id="0_60mph" placeholder="4">
                    </div>
                    <div class="inputGroup">
                        <label for="TopSpeed">Top track speed (mph)</label>
                        <input type="text" name="TopSpeed" id="TopSpeed" placeholder="182">
                    </div>
                    <div class="btn_group">
                        <button class="btn" type="reset">Reset</button>
                        <button class="btn" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </section>


    <!-- footer -->
    <?php include 'footer.php'; ?>
</body>
</html>