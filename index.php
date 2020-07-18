<?php
include 'header.php';
?>
    <div class="row">
         <div class="col-md-3">
            <div class="card mt-3">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-header bg-light"><i class="fa fa-map"></i>  Top Produits</h4>
                        <div class="row">
                            <?php
                        
                        $result = top_produit();
                        while ($row = mysqli_fetch_array($result)): 
                        ?>
                       
                        <?php   endwhile ; ?>
                        </div >
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="card mt-3">
                <div class="card-body">
                    <h4 class="card-header bg-light"><i class="fa fa-map"></i>  Produits
                    </h4>

                    <div class="row ">

                        <?php
                        
                        $result = afficher_produits();
                        while ($row = mysqli_fetch_array($result)): 
                        ?>
                        <div class="col-md-4 col-sm-12 text-center">
                            <div class="card" style="width:100%;margin-bottom:10px">
                                <img src="include/<?php echo $row["images"];?>"  class="card-img-top" style="height:400px;width:auto;object-fit:cover;">
                                <div class="card-body" style="min-height:220px;display:flex;flex-direction:column;justify-content:space-between">
                            <h4 class="card-title" ><?php echo $row["nom_produit"];?></h4>
                            <p class="card-text"><?php echo $row["desc_courte_produit"];?></p>
                            <p>
                                <span class="badge badge-success"><?php echo '$'.$row["prix"].' US';?></span>
                            </p>
                            <a  href="detail.php?id=<?php   echo $row["id_produit"]; ?> " class="btn btn-primary">Details</a>
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