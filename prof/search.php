<!-- Search -->
    <form method="POST" action="">
        <div class="row mb-4">
            <div class="col-md-12 input-group">
                <input 
                    type="text" 
                    name="search" 
                    class="form-control w-75" 
                    placeholder="Kërko nxënësin sipas emrit..." 
                    value="<?= isset($_POST['search']) ? htmlspecialchars($_POST['search']) : ''; ?>"
                >
                <button type="submit" class="btn btn-primary w-25">Search</button>
            </div>
        </div>
    </form>