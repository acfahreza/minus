   {
       <br>
       "<?= $title; ?>": [
<br>
                    <?php $i = 1; ?>
                    <?php foreach ($list as $r) : ?>
           
          
     {
    "id": "<?= $r['id']; ?>",<br>
    "name": "<?= $r['name']; ?>",<br>
    "email": "<?= $r['email']; ?>",<br>
    "image": "<?= $r['image']; ?>",<br>
    "role_id": "<?= $r['role_id']; ?>",<br>
    "is_active": "<?= $r['is_active']; ?>",<br>
    "date_created": "<?= $r['date_created']; ?>"<br>
    },
    <br>
                   
                  
                    <?php endforeach; ?>
  
   }               




