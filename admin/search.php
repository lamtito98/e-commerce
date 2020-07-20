<?php
include 'header.php';
?>

<div class="row">	
	<div class="col-md-12">
		<div class="card mt-3">
			<div class="card-body">
					<ol class="breadcrumb">
					  <li class="breadcrumb-item"><a href="admin.php"> Home</a></li>
					   <li class="breadcrumb-item"><a href="clients.php"> Clients</a></li>
					  <li class="breadcrumb-item active"> <i class="fa fa-map"></i> All Clients</li>
					</ol>
					
					<div class="row">

                        <?php
                        $search = verificationSearch($_POST['search']);
                            
                            $result = afficher_user_search($search);
                        while ($row = mysqli_fetch_array($result)):
                          
                        ?>
                        <div class="col-md-4 col-sm-12 text-center">
                            <div class="card" style="width:100%;margin-bottom:10px">
                                <img src="../include/img/portrait.png"  class="card-img-top" style="height:400px;width:auto;object-fit:cover;">
                                    <div class="card-body" style="min-height:220px;display:flex;flex-direction:column;justify-content:space-between">
                                        <h4 class="card-title" ><?php echo $row["username"];?></h4>
                                        <p class="card-text"><?php echo $row["nom"]; echo " "; echo$row["prenom"];?></p>
                                        <p>
                                            <span><?php echo $row["email"];?></span>
                                        </p>
                                        <a  href="modification.php?id=<?php   echo $row["id_user"]; ?> " class="btn btn-primary">Update</a>
                                        <form action="delete.php" method="POST">
                                            <input type="hidden" name="id" value="<?php   echo $row["id_user"]; ?>" >
                                            <button type="submit" class="btn btn-primary"> Delete </button>
                                        </form>
                                </div>
                            </div>
                        </div>
                        <?php   endwhile ; ?>
                            
                    </div>
				</div>
			</div>
		</div>
	
	</div>
</body>

<?php
    include 'footer.php';
?>