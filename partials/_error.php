<style>
    .alert {
  padding: 20px;
  background-color: #f44336;
  color: white;
}

.closebtn {
  margin-left: 15px;
  color: white;
  font-weight: bold;
  float: right;
  font-size: 22px;
  line-height: 20px;
  cursor: pointer;
  transition: 0.3s;
}

.closebtn:hover {
  color: black;
}
</style>

<!-- <div class="alert">
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
  <strong>Danger!</strong> Indicates a dangerous or potentially negative action.
</div> -->

<?php if(count($errors) > 0): ?>
  <div class="">
      <?php foreach ($errors as $error): ?>
        
        <div class="alert">
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
             <?php echo $error ?>
        </div>

    <?php endforeach; ?>
  </div>

<?php endif; ?>
