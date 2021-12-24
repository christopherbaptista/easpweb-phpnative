<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="https://img.icons8.com/color/48/000000/story-book.png"/>
    <style>
        .section-head {
            font-size: 1.4rem;
            font-weight: 600;
            margin-bottom: 1rem;
        }
        .graph-content {
            border-radius: 15px;
            box-shadow: var(--shadow);
            padding: 1rem;
            background-color: #fff;
        }
        .graph-head {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .graph-head select {
            outline: none;
            background-color: #f5f5f5;
            height: 35px;
            border-radius: 10px;
            padding: 0 1rem;
            border: none;
        }
    </style>
</head>
<body>

    <!-- Dashboard -->
    <div class="d-flex flex-column flex-lg-row h-lg-full bg-surface-secondary">
        
        <?php
            include("header.php");
        ?>
    
        <!-- Main content -->
        <div class="h-screen flex-grow-1 overflow-y-lg-auto">
            <!-- Header -->
            <header class="bg-surface-primary border-bottom pt-6">
                <div class="container-fluid">
                    <div class="mb-npx">
                        <div class="row align-items-center">
                            <div class="col-sm-6 col-12 mb-4 mb-sm-0">
                                <!-- Title -->
                                <h1 class="h2 mb-0 ls-tight">Dashboard</h1>
                            </div>
                        </div>
                        <!-- Nav -->
                        <ul class="nav nav-tabs mt-4 overflow-x border-0">
                            <li class="nav-item ">
                                <a href="#" class="nav-link active">Day</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link font-regular">Month</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link font-regular">Year</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </header>
            <!-- Main -->
            <main class="py-6 bg-surface-secondary">
                <div class="container-fluid">
                    <!-- Card stats -->
                    <div class="row g-6 mb-6">
                        <div class="col-xl-3 col-sm-6 col-12">
                            <div class="card shadow border-0">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <span class="h6 font-semibold text-muted text-sm d-block mb-2">Students</span>
                                            <span class="h3 font-bold mb-0">800</span>
                                        </div>
                                        <div class="col-auto">
                                            <div class="icon icon-shape bg-tertiary text-white text-lg rounded-circle">
                                                <i class="bi bi-person-fill"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-2 mb-0 text-sm">
                                        <span class="badge badge-pill bg-soft-danger text-danger me-2">
                                            <i class="bi bi-arrow-down me-1"></i>-5%
                                        </span>
                                        <span class="text-nowrap text-xs text-muted">Since last semester</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-sm-6 col-12">
                            <div class="card shadow border-0">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <span class="h6 font-semibold text-muted text-sm d-block mb-2">Teachers</span>
                                            <span class="h3 font-bold mb-0">50</span>
                                        </div>
                                        <div class="col-auto">
                                            <div class="icon icon-shape bg-primary text-white text-lg rounded-circle">
                                                <i class="bi bi-vector-pen"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-2 mb-0 text-sm">
                                        <span class="badge badge-pill bg-soft-success text-success me-2">
                                            <i class="bi bi-arrow-up me-1"></i>+18%
                                        </span>
                                        <span class="text-nowrap text-xs text-muted">Since last semester</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-sm-6 col-12">
                            <div class="card shadow border-0">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <span class="h6 font-semibold text-muted text-sm d-block mb-2">Parents</span>
                                            <span class="h3 font-bold mb-0">1.600</span>
                                        </div>
                                        <div class="col-auto">
                                            <div class="icon icon-shape bg-info text-white text-lg rounded-circle">
                                                <i class="bi bi-people-fill"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-2 mb-0 text-sm">
                                        <span class="badge badge-pill bg-soft-success text-success me-2">
                                            <i class="bi bi-arrow-up me-1"></i>+10%
                                        </span>
                                        <span class="text-nowrap text-xs text-muted">Since last semester</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-sm-6 col-12">
                            <div class="card shadow border-0">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <span class="h6 font-semibold text-muted text-sm d-block mb-2">Study Material</span>
                                            <span class="h3 font-bold mb-0">12.600</span>
                                        </div>
                                        <div class="col-auto">
                                            <div class="icon icon-shape bg-warning text-white text-lg rounded-circle">
                                                <i class="bi bi-book-half"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-2 mb-0 text-sm">
                                        <span class="badge badge-pill bg-soft-success text-success me-2">
                                            <i class="bi bi-arrow-up me-1"></i>+23%
                                        </span>
                                        <span class="text-nowrap text-xs text-muted">Since last semester</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <h3 class="section-head">Graph</h3>
                    <div class="graph-content">
                        <div class="graph-head">
                            <p class="pb-5 graphtag">
                                <svg width="8" height="8" viewBox="0 0 8 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="4" cy="4" r="3" stroke="#109CF1" stroke-width="2" />
                                </svg>
                                Student Today's Attendance
                            </p>
                            <div class="graph-select">
                                <select name="" id="">
                                <option value="">January</option>
                                <option value="">February</option>
                                <option value="">March</option>
                                <option value="">April</option>
                                <option value="">May</option>
                                <option value="">June</option>
                                <option value="">July</option>
                                <option value="">August</option>
                                <option value="">September</option>
                                <option value="">October</option>
                                <option value="">November</option>
                                <option value="">December</option>
                                </select>
                            </div>
                        </div>
                        <div class="graph">
                            <img width="80%" class="img-graph" src="https://raw.githubusercontent.com/ShoshaTheTarnegolet/Dashboard-Project/80ca03eb6004ebaf7f2bb13122e677d4c0449aa5/img/deals_graphic.svg" alt="" />
                        </div>
                    </div>
                </div>
            </main>
            
        </div>
    </div>
</body>
</html>

