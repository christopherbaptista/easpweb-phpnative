<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="https://img.icons8.com/color/48/000000/story-book.png"/>
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
                    <div class="mb-5">
                        <div class="row align-items-center">
                            <div class="col-sm-6 col-12 mb-4 mb-sm-0">
                                <!-- Title -->
                                <h1 class="h2 mb-0 ls-tight">Invoice</h1>
                            </div>
                            <!-- Actions -->
                            <div class="col-sm-6 col-12 text-sm-end">
                                <div class="mx-1">
                                    <?php
                                        // Load file koneksi.php
                                        include "koneksi.php";
                                        
                                        if (in_array("admin", $_SESSION['admin_akses'])) {
                                            echo "
                                            <a class=\"text-heading font-semibold mx-2\" href=\"#\">
                                                Admin
                                            </a>
                                            <img alt=\"...\" src=\"https://images.unsplash.com/photo-1608976328267-e673d3ec06ce?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=3&w=256&h=256&q=80\" class=\"avatar avatar-sm rounded-circle me-2\">
                                            ";
                                        } else if (in_array("guru", $_SESSION['admin_akses'])) {
                                            echo "
                                            <a class=\"text-heading font-semibold mx-2\" href=\"#\">
                                                Teacher
                                            </a>
                                            <img alt=\"...\" src=\"https://images.unsplash.com/photo-1610878722345-79c5eaf6a48c?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=3&w=256&h=256&q=80\" class=\"avatar avatar-sm rounded-circle me-2\">
                                            ";
                                        } else if (in_array("siswa", $_SESSION['admin_akses'])) {
                                            echo "
                                            <a class=\"text-heading font-semibold mx-2\" href=\"#\">
                                                Siswa
                                            </a>
                                            <img alt=\"...\" src=\"https://images.unsplash.com/photo-1612422656768-d5e4ec31fac0?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=3&w=256&h=256&q=80\" class=\"avatar avatar-sm rounded-circle me-2\">
                                            ";
                                        } else if (in_array("parent", $_SESSION['admin_akses'])) {
                                            echo "
                                            <a class=\"text-heading font-semibold mx-2\" href=\"#\">
                                                Parent
                                            </a>
                                            <img alt=\"...\" src=\"https://images.unsplash.com/photo-1502823403499-6ccfcf4fb453?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=3&w=256&h=256&q=80\" class=\"avatar avatar-sm rounded-circle me-2\">
                                            ";
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <!-- Nav -->
                        <div class="nav nav-tabs mt-4 overflow-x border-0">
                            <?php if (in_array("admin", $_SESSION['admin_akses']) || in_array("guru", $_SESSION['admin_akses'])) { ?>
                                <a href="simpan_invoice.php" class="d-inline-flex mx-1" style="color: #95CD41">
                                    <span class=" pe-2">
                                        <i class="bi bi-plus"></i>
                                    </span>
                                    <span>Tambah Tagihan Sekolah</span>
                                </a>
                            <?php } ?>
                        </div>
                        
                    </div>
                </div>
            </header>
            <!-- Main -->
            <main class="py-6 bg-surface-secondary">
                <div class="container-fluid">
                    
                    <div class="card shadow border-0 mb-7">
                        <div class="card-header">
                            <h5 class="mb-0">All Invoices</h5>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover table-nowrap">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">Invoice Details</th>
                                        <th scope="col">Invoice Amount</th>
                                        <th scope="col">Due Date</th>
                                        <th scope="col">Status</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        // Load file koneksi.php
                                        include "koneksi.php";
                                        // Buat query untuk menampilkan semua data tagihan
                                        $sql = $koneksi->prepare("SELECT * FROM invoice");
                                        $sql->execute(); // Eksekusi querynya
                                        while($data = $sql->fetch()){ // Ambil semua data dari hasil eksekusi $sql
                                            echo "<tr>";
                                            echo "
                                            <td>
                                                <img alt=\"...\" src='images/".$data['foto']."' class=\"avatar avatar-sm rounded-circle me-2\">
                                                <a class=\"text-heading font-semibold\" href=\"#\">
                                                    ".$data['nama_invoice']."
                                                </a>
                                            </td>";
                                            echo "<td>".$data['jumlah']."</td>";
                                            echo "<td>".$data['tanggal']."</td>";
                                            
                                            if ( $data['invoice_status'] == "Paid" ) { 
                                                echo "
                                                <td>
                                                    <span class=\"badge badge-lg badge-dot\">
                                                        <i class=\"bg-success\"></i>".$data['invoice_status']."
                                                    </span>
                                                </td>";
                                            } else { 
                                                echo "
                                                <td>
                                                    <span class=\"badge badge-lg badge-dot\">
                                                        <i class=\"bg-danger\"></i>".$data['invoice_status']."
                                                    </span>
                                                </td>";
                                            } 

                                            if (in_array("admin", $_SESSION['admin_akses'])) {
                                                echo "
                                                <td class=\"text-end\">
                                                    <a href='ubah_invoice.php?id=".$data['id']."' class=\"btn d-inline-flex btn-sm btn-neutral border-base mx-1\">
                                                        <span class=\" pe-2\">
                                                            <i class=\"bi bi-pencil\"></i>
                                                        </span>
                                                        <span>Edit</span>
                                                    </a>
                                                    <a href='invoice_hapus.php?id=".$data['id']."'>
                                                        <button type=\"button\" class=\"btn btn-sm btn-square btn-neutral text-danger-hover\">
                                                            <i class=\"bi bi-trash\"></i>
                                                        </button>
                                                    </a>
                                                </td>";
                                            } else if (in_array("parent", $_SESSION['admin_akses'])) {
                                                echo "
                                                <td class=\"text-end\">
                                                    <a href=\"#\" class=\"btn btn-sm btn-neutral\">View</a>
                                                </td>";
                                            }
                                            echo "</tr>";
                                        }
                                    ?>
                                    
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer border-0 py-5">
                            <span class="text-muted text-sm">Showing 3 items out of 3 results found</span>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>
</html>