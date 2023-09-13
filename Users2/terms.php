<?php include 'header.php'; ?>


    
<style>
  input.form-control {
    background-color: transparent;
    border: 1px solid #ffdd99;
    box-shadow: none;
    color: white;
  }
  .login {
    background-color: #ffd480;
  }
</style>

    <!-- ======= Book A Table Section ======= -->
    <section id="book-a-table" class="book-a-table mt-5">
      <div class="container mt-3" data-aos="fade-up">

        <div class="section-title">
          <h2>Agree To</h2>
          <p>Agreement to Terms and Conditions</p>
        </div>

        <p style="text-align: justify;">Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio laudantium facere dolorem totam eius repellat reprehenderit neque dolores nostrum voluptatibus eum, impedit nisi quae dolor obcaecati ratione, molestiae fugit tempora esse. Quas incidunt sit at, tempora placeat, culpa iusto id molestias, quasi ullam error odit esse numquam tempore eaque. Dolorem veniam labore, quo ex sit alias eveniet odio, voluptas ipsum optio officia maiores nulla pariatur harum nihil veritatis dolor unde, dolore. Vitae facilis illum aut. Veritatis molestiae similique illum, amet velit, tempore modi ullam dicta molestias odit, sunt architecto veniam? Assumenda sint nemo odio omnis debitis quasi vitae consequuntur id.</p>
        <p style="text-align: justify;">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Consectetur laudantium sapiente nulla quos magnam nostrum fugit impedit officia. Eveniet accusantium provident voluptatem, veniam, aliquid ut iusto aut! Voluptate quod error, saepe, non ducimus nesciunt aliquid id maiores architecto. Earum, ab aut deleniti sapiente doloribus minus corporis recusandae officiis praesentium repellendus!</p>
        <p style="text-align: justify;">Lorem, ipsum dolor sit, amet consectetur adipisicing elit. Omnis aspernatur, quisquam voluptate, illo quasi at incidunt cum, vitae earum laboriosam ullam repellat explicabo rerum, perferendis? Suscipit, dolore numquam. Corporis velit sequi dolorum non consequatur laboriosam eum labore quam harum placeat quos, ea est deserunt ipsa commodi reprehenderit ipsam distinctio, vitae aspernatur tempore quia voluptate facere amet perspiciatis. Molestias accusantium, placeat suscipit dolorum sunt minus itaque magni unde excepturi. Doloribus totam voluptates veritatis inventore alias sequi at. Ratione velit odio libero illum esse nam expedita optio commodi aliquam, dolore dolor cumque placeat ullam incidunt, tenetur corrupti quam quas officia harum nisi aut? Nisi numquam tempore adipisci. Ex odit est, sapiente facere voluptatum excepturi dolor at itaque quod reprehenderit saepe non dolores vitae magnam fugit, explicabo error maiores distinctio aut nemo vel magni recusandae iusto quas natus. Sequi velit delectus ea, quaerat nisi, dolores temporibus ratione excepturi iste obcaecati dicta rem quibusdam.</p>



            

         
          </div>
      </div>
    </section><!-- End Book A Table Section -->

  

<?php include 'footer.php'; ?>


<?php 

  function custom_echo($x, $length)
{
  if(strlen($x)<=$length)
  {
    echo $x;
  }
  else
  {
    $y=substr($x,0,$length) . '...';
    echo $y;
  }
}

?>
