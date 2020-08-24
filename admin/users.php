<?php include_once "adminincludes/header.php" ?>

<div id="content" class="wrappwer">

    <!--==========Sidebar Section============-->
    <?php include_once "adminincludes/sidebar.php" ?>
    <!--===============Main Content Section==================-->
    <div class=" top-content container-fluid" >
        <h3 class="h4 m-2">Users</h3>
        <hr>
        <div class="clearfix">
            <div class="float-left">
                <select class="float-left" name="" id="">
                <option value="">10</option>
                <option value="">20</option>
                <option value="">30</option>
                <option value="">50</option>
                <option value="">50</option>
            </select>
            </div>
            <div class="float-right">
            <a href=""><span><i class="fa fa-download mr-1"></i>Download File</span></a>
            </div>
        </div>
        <br>
        <div>
            <form class="form-inline float-left">
                <input class="form-control mr-sm-1" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-sm my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
       

        <div class="table-responsive " id="user-tbl">
            <table class="table table-responsive  table-striped|table-dark|table-bordered|table-borderless|table-hover|table-sm" id="tbl-user">
            <caption>List of users</caption>
            <thead class="thead-dark|thead-light " style="display=flex" id="tbl-user-head">
                <tr>
                <th scope="col" width="10%" class="text-center">ID</th>
                <th scope="col" width="10%" class="text-center">IMAGE</th>
                <th scope="col" width="10%" class="text-center">NAME</th>
                <th scope="col" width="10%" class="text-center">EMAIL</th>
                <th scope="col" width="10%" class="text-center">PHONE</th>
                <th scope="col" width="10%" class="text-center">OTP VEREFIED</th>
                <th scope="col" width="7%" class="text-center">FLAGGED</th>
                <th scope="col" width="10%" class="text-center">JOIN ON</th>
                <th scope="col" width="7%" class="text-center">STATUS</th>
                <th scope="col" width="16%" class="text-center">ACTION</th>
                </tr>
            </thead>
            <tbody id="tbl-user-body">
                <tr>
                    <td>10000000</td>
                    <td><img class="img-fluid" src="../asset/images/blog-img-06.jpg" alt=""></td>
                    <td>Abullah Rahman</td>
                    <td>Rahman@gmail.com</td>
                    <td>01835472379</td>
                    <td>Yes</td>
                    <td>No</td>
                    <td>3:40 PM ,20/2/2020</td>
                    <td><input type="checkbox" checked data-toggle="toggle" data-size="xs"></td>
                    <td><a class="btn btn-info" href="">Edit</a><a class="btn btn-sm btn-info" href="">Reset Password</a></td>
                </tr>
                <tr>
                    <td>10000000</td>
                    <td><img class="img-fluid" src="../asset/images/blog-img-06.jpg" alt=""></td>
                    <td>Abullah Rahman</td>
                    <td>Rahman@gmail.com</td>
                    <td>01835472379</td>
                    <td>Yes</td>
                    <td>No</td>
                    <td>3:40 PM ,20/2/2020</td>
                    <td><input type="checkbox" checked data-toggle="toggle" data-size="xs"></td>
                    <td><a class="btn btn-info" href="">Edit</a><a class="btn btn-sm btn-info" href="">Reset Password</a></td>
                </tr>
                <tr>
                    <td>10000000</td>
                    <td><img class="img-fluid" src="../asset/images/blog-img-06.jpg" alt=""></td>
                    <td>Abullah Rahman</td>
                    <td>Rahman@gmail.com</td>
                    <td>01835472379</td>
                    <td>Yes</td>
                    <td>No</td>
                    <td>3:40 PM ,20/2/2020</td>
                    <td><input type="checkbox" checked data-toggle="toggle" data-size="xs"></td>
                    <td><a class="btn btn-info" href="">Edit</a><a class="btn btn-sm btn-info" href="">Reset Password</a></td>
                </tr>
                <tr>
                    <td>10000000</td>
                    <td><img class="img-fluid" src="../asset/images/blog-img-06.jpg" alt=""></td>
                    <td>Abullah Rahman</td>
                    <td>Rahman@gmail.com</td>
                    <td>01835472379</td>
                    <td>Yes</td>
                    <td>No</td>
                    <td>3:40 PM ,20/2/2020</td>
                    <td><input type="checkbox" checked data-toggle="toggle" data-size="xs"></td>
                    <td><a class="btn btn-info" href="">Edit</a><a class="btn btn-sm btn-info" href="">Reset Password</a></td>
                </tr>
            </tbody>
            </table>
        </div>
    </div>
    
    

</div>
<!--============Footer Section================-->
<?php include_once "adminincludes/footer.php" ?> 