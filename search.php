<?php 
        include 'header.php';
        include './connection/connection.php'
?>


    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <h3 class="text-center">Search Note</h3>
                <br>

                <form method="POST">
                    <div class="form-group">
                        <input name="search" type="text" class="form-control">
                    </div>
    
                    <button type="submit" class="btn btn-primary">Search</button>
                </form>
                
            </div>
        </div>

        <div id="table-content">
            <div class="row">
                <div class='col-md-12'>    
                    <br> 
                    <table class="table">   
                        <thead class="thead-dark">
                            <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Title</th>
                            <th scope="col">Date</th>
                            <th scope="col">View</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                                if(isset($_POST['search'])){
                                    
                                    $keyword = $_POST['search'];
                                    
                                    $query = "SELECT * FROM container WHERE id LIKE '%$keyword%' OR title LIKE '%$keyword%'"; 
                                    
                                    $result = mysqli_query($link, $query);

                                    if(mysqli_num_rows($result) > 0){

                                        while($row = mysqli_fetch_array($result)){
                                            
                                            $id = $row['id'];
                                            $title = $row['title'];
                                            $date = $row['date'];

                                            echo "
                                                    <tr>
                                                        <td>$id</th>
                                                        <td>$title</td>
                                                        <td>$date</td>
                                                        <td><a href='view.php?showId=$id'><button type='button' class='btn btn-info'><i class='fas fa-eye'></i></button></a></td>
                                                        <td><a href='edit.php?updateId=$id'><button type='button' class='btn btn-success'><i class='fas fa-edit'></i></button></a></td>
                                                        <td><a href='list.php?deleteId=$id'><button name='delete' type='button' class='btn btn-danger'><i class='fas fa-trash-alt'></i></button></a></td>
                                                    </tr>
                                            ";
                                        }
                                    }else{
            
                                        echo "
                                                <tr>
                                                    <td colspan='6'>No Data Found</td>
                                                </tr>
                                        ";
                                    }

                                }
                            ?>
                        </tbody>              
                    </table>


                    
                </div>
            </div>
        </div>

    </div>



<?php include 'footer.php' ?>