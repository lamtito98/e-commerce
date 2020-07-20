<?php include 'header.php'; ?>


<table class="table table-hover mt-5 mb-5">
<?php foreach($_SESSION as $names => $produit):  ?>
  <thead>
    <tr>
      <th scope="col">Image </th>
      <th scope="col">Product</th>
      <th scope="col">Price</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    <tr class="table-success">
    	<td><img src="include/<?php echo !empty($produit['Products']) ? $produit['Products'] : "---";  ?>">  </td>
      <td><?php echo !empty($produit['titre']) ? $produit['titre'] : "---";  ?> </td>
      <td><?php echo !empty($produit['total']) ? $produit['total'] : "---";  ?> </td>

      <td> 
        <form action="delete.php" method="POST">
          <input type="hidden" name="title" value="<?php echo !empty($produit['titre']) ? $produit['titre'] : "---";  ?>" >
          <input type="hidden" name="id" value="<?php echo !empty($produit['total']) ? $produit['total'] : "---";  ?>" >
          <button type="submit" class="btn btn-primary"><i class="fa fa-trash"> </i> Delete </button>
        </form>
      </td>
    </tr>
<?php endforeach; ?>
    </tbody>
</table>

<button type="button" class="btn btn-success btn-sm">Buy now </button>


<?php include 'footer.php'; ?>