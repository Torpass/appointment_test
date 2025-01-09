<?php
    include_once '../../templates/header.php';
    include_once '../../data/daos/LocationDao.php';
    include_once '../../data/Conection.php';
    
    // $conn = new ConexionSQL();
    // $conn = $conn->getConnection();
    
    function generateUUID() {
        return bin2hex(random_bytes(16));
    }
    
    if(isset($_POST['submit'])){
        $id_code = generateUUID();
        $created_at = date('Y-m-d H:i:s');
        $updated_at = date('Y-m-d H:i:s');
        

        $address = $_POST['address'];
        $state= $_POST['state'];
        $city = $_POST['city'];
        $postal_code = $_POST['postal_code'];
        
        try{
            createLocation($id_code, 1, $created_at, $updated_at, $postal_code, $address, $city, $state, 'USA');

            
        }catch(PDOException $e){
            echo $e->getMessage();
        }        
    }

    
    $locations = getAllActiveLocations();
?>


<!-- Modal Insert-->
<div class="modal fade" id="insertModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="insertModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="insertModalLabel">Create a new Location</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <form action="." method="POST">
          <div class="modal-body">
            <div class="form-group">
                <label placeholder=""enter address" for="address">Address</label>
                <input placeholder="enter address" type="text" class="form-control" id="address" name="address" required>
            </div>
            <div class="form-group">
                <label for="address">State</label>
                <input placeholder="enter State" type="text" class="form-control" id="address" name="state" required>
            </div>
            <div class="form-group">
                <label placeholder=""enter address" for="address">City</label>
                <input placeholder="enter City" type="text" class="form-control" id="address" name="city" required>
            </div>
            <div class="form-group">
                <label placeholder=""enter address" for="address">Postal Code</label>
                <input type="text" placeholder="enter postal code"  class="form-control" id="address" name="postal_code" required>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" name="submit" class="btn btn-primary">Save</button>
          </div>
      </form>
    </div>
  </div>
</div>



    <div class="row mt-5">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header flex">
                    <h1>Able locations</h1>
                    <button type="button" class="btn btn-primary float-end mb-2" data-bs-toggle="modal" data-bs-target="#insertModal">
                        Create Location
                    </button>
                </div>
                <div class="card-body">
                    <div class="table-responsive-sm">
                        <table class="table table-striped table-bordered table-hover" id="tablaID">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Address</th>
                                    <th scope="col">Postal Code</th>
                                    <th scope="col">City</th>
                                    <th scope="col">State</th>
                                    <th scope="col">Country</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($locations as $location): ?>
                                    <tr>
                                        <td><?php echo htmlspecialchars($location->getAddress()); ?></td>
                                        <td><?php echo htmlspecialchars($location->getPostalCode()); ?></td>
                                        <td><?php echo htmlspecialchars($location->getCity()); ?></td>
                                        <td><?php echo htmlspecialchars($location->getState()); ?></td>
                                        <td><?php echo htmlspecialchars($location->getCountry()); ?></td>
                                        <td>
                                            <p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil">Update</span></button></p>
                                            <p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash">Delete</span></button></p>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer text-muted">
                    Footer
                </div>
            </div>
        </div>

    


<?php include_once '../../templates/footer.php' ?>