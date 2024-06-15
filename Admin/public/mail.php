

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Mail</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Mail</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
  
    <section class="content">
        <div class="container-fluid">
            
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        
                        <?php
                            if(isset($tb)){
                                echo "<h3 style='color:red; text-align:center; margin-top:20px' >".$tb."</h3>";
                            }
                            
                        ?>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Mail</th>                                                                         
                                        <th scope="col">Thao tác</th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                    <?php
                                        
                                
                                        $i=1;
                                        foreach ($mail_list as $item) {
                                            extract($item);
                                            
                                            $sent="<a href='index.php?page=config&id=".$id."' >Gửi mail</a>";                                                                                                                           
                                            echo' <tr>
                                                    <td>'.$i.'</td>
                                                    <td>'.$email.'</td>   
                                                    <td>'.$sent.'</td>                                                                                          
                                                </tr>
                                                ';
                                                $i++;
                                                
                                        }                                        
                                        $_SESSION['mail'] = $i-1;   
                                    ?>
                               
                                
                                </tbody>                               
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->



