<?php include "common_pages/conn.php";?>
<section class="content">

    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">About the CARTOON SAVER</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
        </div>

        <div class="card-body">
            <!-- CARTOONLARLA ALAKALI BILGI -->
            <p>Cartoon Saver is a platform dedicated to providing information about various cartoons. Here, you can explore details about your favorite cartoons, including their release date, IMDb rating, and descriptions.</p>
            <br>
            <h4>WARNING!</h4>
            <!-- YAPILMASI GEREKEN AÇIKLAMALAR -->
            <p>Before exploring the cartoons, please make sure to log in to get access to all features and enjoy a seamless experience.</p>
        </div>

        <!-- /.card-body -->
        <div class="card-footer">
          
        </div>
        <!-- /.card-footer-->
    </div>
    <!-- /.card -->

    <?php if(isset($_SESSION['login']) && $_SESSION['login'] === true) { ?>
        <div class="info">
            <br><br><br>
            <p style="font-size:40px; text-align:center; color:#606a73;">⇓ ⇓ ⇓ Explore the latest cartoons ⇓ ⇓ ⇓</p>
            <br><br><br><br>
        </div>
    <?php } else { ?>
        <div class="info">
            <br><br><br>
            <p style="font-size:40px; text-align:center; color:#606a73;">You must log in to explore more</p>
            <br><br><br><br>
        </div>
    <?php } ?>

    <!-- Cartoon Information Table -->
    <div class="row" id="cartoon_info">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Cartoon Information Table</h3>

                    <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- /.card-header -->
                <div class="card-body table-responsive p-0" style="height: 300px;">
                    <table class="table table-head-fixed text-nowrap">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Release Date</th>
                                <th>IMDb Rating</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = "SELECT * FROM cartoons";
                            $result = mysqli_query($conn, $query);

                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>";
                                echo "<td>".$row['name']."</td>";
                                echo "<td>".$row['description']."</td>";
                                echo "<td>".$row['release_date']."</td>";
                                echo "<td>".$row['imdb']."</td>";
                                echo "</tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            </div>
            </section>
