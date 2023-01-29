
        <!-- Sidebar Start -->
        <?php
            $query = mysqli_query($conn, "SELECT * FROM `admin` ");
            $row = mysqli_fetch_assoc($query);
            ?>
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-light navbar-light">
                <a href="index.php" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary text-uppercase"><i class="fa fa-hashtag me-2"></i>marcilim</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="img/logo.png" alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0"><?=$row['name']?></h6>
                        <span style="font-size: small;"><?=$row['email']?></span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="index.php" class="nav-item nav-link active"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    <a href="DepositRequest.php" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Deposit Requests</a>
                    <a href="WithdrawRequest.php" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Withdraw Requests</a>
                    <a href="allUsers.php" class="nav-item nav-link"><i class="fa fa-keyboard me-2"></i>All Users</a>
                   
                    
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->
